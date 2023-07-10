<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\LogHistory;
use Spatie\Permission\Models\Role as SpatieRole;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get records
        $roles = Role::getRoles();
        if( !$roles->data ){
            return back()->with('error', $roles->message);
        }
        $roles = $roles->data;

        return view('dashboard.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.role.add');
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get permission records
        $permissions = Role::getArrPermissionsByName($request['permissionsCheckbox']);
        if( !$permissions->data ){
            return back()->with('error', $permissions->message);
        }
        $permissions = $permissions->data;

        // validate requests data
        $requestValidResult = Role::checkReuqestValidation($request);
        if( !$requestValidResult->data ){
            return back()->with('error', $requestValidResult->message);
        }
        $name = $requestValidResult->name;
        
        // create record
        try {
            DB::beginTransaction();
            
            // create role
            $role = new SpatieRole([
                'name' => $name,
            ]);
            $role->save();

            // attach permission to role
            foreach( $permissions as $permission ){
                $role->givePermissionTo($permission->name);
            }

            // create log history
            $currentUser = auth()->user();
            $logHistory  = new LogHistory([
                'log_header'      => 'create role',
                'permission_slug' => 'view role_history',
                'username'        => $currentUser->username,
                'user_id'         => $currentUser->id,
                'description'     => 'Role [ '.ucwords($role->name).' ] was created on [ '.Carbon::now().' ] by ' . $currentUser->username . ' user',
            ]);
            $logHistory->save();
        } catch ( QueryException $queryEx ) {
            DB::rollBack();

            $queryEx->errorInfo[1] == 1062 ? 
                $message = 'Role name already exist, please choose another name and create again!' : 
                $message = 'Problme occured while trying to create role record to database!';

            return back()->with('error', $message);
        }
        DB::commit();

        return redirect()
            ->route('role-list')
            ->with('success', 'Role record created successfully');
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get record
        $role = Role::getRole($id);
        if( !$role->data ){
            return back()->with('error', $role->message);
        }
        $role = $role->data;

        // permissions that belong to current role
        $permissionNameArr = [];
        foreach( $role->permissions as $permission ){
            array_push( $permissionNameArr, $permission->name );
        }
        $permissionNameArr = json_encode( $permissionNameArr );

        return view('dashboard.role.edit', compact(
                'role', 'permissionNameArr'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // get mandatory modules
        $mandatoryModules = Role::getMandatoryModulesOfRoleStoreAndUpdate( $request, $id );
        if( !$mandatoryModules->data ){
            return back()->with('error', $mandatoryModules->message);
        }
        $role        = $mandatoryModules->role;
        $permissions = $mandatoryModules->permissions;

        // valid all request
        $requestValidResult = Role::checkReuqestValidation($request);
        if( !$requestValidResult->data ){
            return back()->with('error', $requestValidResult->message);
        }
        $name = $requestValidResult->name;

        // update record
        try {
            DB::beginTransaction();

            // update role
            $role->name = $name;

            // detach all permissions of current role
            foreach( $role->permissions as $oldPermission ){
                $role->revokePermissionTo( $oldPermission->name );
            }

            // re-attach permission to role
            foreach( $permissions as $newPermission ){
                $role->givePermissionTo( $newPermission->name );
            }
            $role->save();

            // create log history
            $currentUser = auth()->user();
            $logHistory = new LogHistory([
                'log_header'      => 'edit role',
                'permission_slug' => 'view role_history',
                'username'        => $currentUser->username,
                'user_id'         => $currentUser->id,
                'description'     => 'Role [ '.ucwords($role->name).' ] was edited on [ '.Carbon::now().' ] by ' . $currentUser->username . ' user',
            ]);
            $logHistory->save();
        } catch ( QueryException $queryEx ) {
            DB::rollBack();

            $queryEx->errorInfo[1] == 1062 ? 
                $message = 'Role name already exist!' : 
                $message = 'Problem occured while trying to update role record to database!';

            return back()->with('error', $message);
        }
        DB::commit();

        return redirect()
            ->route('role-list')
            ->with('success', 'Role record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get record
        $role = Role::getRole($id);
        if( !$role->data ){
            return back()->with('error', $role->message);
        }
        $role = $role->data;

        // delete record
        try {
            DB::beginTransaction();

            $role->delete();

            // create log history
            $currentUser = auth()->user();
            $logHistory  = new LogHistory([
                'log_header'      => 'delete role',
                'permission_slug' => 'view role_history',
                'username'        => $currentUser->username,
                'user_id'         => $currentUser->id,
                'description'     => 'Role [ '.ucwords($role->name).' ] was deleted on [ '.Carbon::now().' ] by ' . $currentUser->username . ' user',
            ]);
            $logHistory->save();
        } catch ( Exception $ex ) {
            DB::rollBack();

            return back()->with('error', 'Problem occured while trying to delete role recored from database!');
        }
        DB::commit();

        return redirect()
            ->route('role-list')
            ->with('success', 'Role record deleted successfully');
    }
}
