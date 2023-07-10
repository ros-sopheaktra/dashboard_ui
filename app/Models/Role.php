<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Permission\Models\Permission as SpatiePermission;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Role extends Model
{
    use HasFactory;

    /**
     * Table name
     * @var String.
     */
    protected $table = 'roles';

    /**
     * Primary key.
     * @var String
     */
    protected $primaryKey = 'id';

    /**
     * The attribute that are mass assignable.
     * @var Array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',

    ];

    /**
     * ################################
     *     Modules Helper functions
     * ################################
     */
        // Role Helper Module Functions [BEGIN]
            /**
             * Get all role records from database.
             * @return ObjectRespond [ data: data_result, message: result_message ]
             */
            public static function getRoles(){
                $respond = (object)[];

                try {
                    $roles = SpatieRole::all();

                    $respond->data    = $roles;
                    $respond->message = 'Succesful getting all role records from database';
                } catch ( Exception $ex ) {
                    $respond->data    = false;
                    $respond->message = 'Problem occured while trying to get role records from database!';
                }

                return $respond;
            }

            /**
             * Get specific role record based on given id parameter from database.
             * @param Integer $id
             * @return ObjectRespond [ data: data_result, message: result_message ]
             */
            public static function getRole($id){
                $respond = (object)[];

                try {
                    $role = SpatieRole::findOrFail($id);

                    $respond->data    = $role;
                    $respond->message = 'Role record found';
                } catch ( ModelNotFoundException $ex ) {
                    $respond->data    = false;
                    $respond->message = 'Role record not found!';
                }

                return $respond;
            }
        // Role Helper Module Functions [END]

        // Permission Helper Module Functions [BEGIN]
            /**
             * Get all permission records from database.
             * @return ObjectRespond [ data: data_result, message: result_message ]
             */
            public static function getPermissions(){
                $respond = (object)[];
                
                try {
                    $permissions = SpatiePermission::all();

                    $respond->data    = $permissions;
                    $respond->message = 'Succesful getting permission records from database';
                } catch ( Exception $ex ) {
                    $respond->data    = false;
                    $respond->message = 'Problem occured while trying to get permission records from database!';
                }

                return $respond;
            }

            /**
             * Get specific permission record based 
             * on given id parameter from database.
             * @param Integer $id
             * @return ObjectRespond [ data: data_result, message: result_message ]
             */
            public static function getPermission($id){
                $respond = (object)[];

                try {
                    $permission = SpatiePermission::findOrFail($id);

                    $respond->data    = $permission;
                    $respond->message = 'Permission record found';
                } catch ( ModelNotFoundException $ex ) {
                    $respond->data    = false;
                    $respond->message = 'Permission record not found!';
                }

                return $respond;
            }

            /**
             * Validate permission records based on 
             * given array of permission ids parameter.
             * @param Array $permissionsIdArr
             * @return RespondObject [ data: data_result, message: result_message ] 
             */
            public static function getArrPermissions($permissionsIdArr){
                $respond = (object)[];

                $permissions = Permission::find($permissionsIdArr);
                if( $permissions == null ){
                    $respond->data    = false;
                    $respond->message = 'Permission ids is invalid, unable to get data!';

                    return $respond;
                }

                $arrayLength = count($permissionsIdArr);
                if( $arrayLength != count($permissions) ){
                    $respond->data    = false;
                    $respond->message = 'One of the permission id not found!';

                    return $respond;
                }

                $respond->data    = $permissions;
                $respond->message = 'Succesful getting all permission records based on given array of ids from database';

                return $respond;
            }

            /**
             * Get permission records based on given arary 
             * of permission names parameter from database.
             * @param Array $permissionNameArr
             * @return ObjectRespond [ data: data_result, message: result_message ]
             */
            public static function getArrPermissionsByName($permissionNameArr){
                $respond = (object)[];

                // validate empty array
                $arrLength = count($permissionNameArr);
                if( $arrLength <= 0 ){
                    $respond->data    = false;
                    $respond->message = 'Unable to create role on empty permissions!';

                    return $respond;
                }

                // get records
                try {
                    $permissions = Permission::whereIn( 'name', $permissionNameArr )->get();

                    $respond->data    = $permissions;
                    $respond->message = 'Succesful getting all permission records based on array of permission names';
                } catch ( ModelNotFoundException $ex ) {
                    $respond->data    = false;
                    $respond->message = 'One of the given permission is invalide or incorrect provided, unable to create role!';
                }

                return $respond;
            }
        // Permission Helper Module Functions [END]

    /**
     * ########################
     *     Helper functions
     * ########################
     */
        /**
         * Validate regex value of alphanumeric with 
         * whitespace only sting with name provided as parameter.
         * @param String $name
         * @return ObjectRespond [ data: data_result, message: result_message ] 
         */
        protected static function checkValidString($name){
            $respond = (object)[
                'data'    => $name,
                'message' => 'String is valid',
            ];

            if( !preg_match( "/^[a-zA-Z0-9' ]*$/", $name ) ){
                $respond->data    = false;
                $respond->message = 'String is invalid!';
            }

            return $respond;
        }

    /**
     * #######################
     *      Relationships
     * #######################
     */
        /**
         * Many roles to many users pivot table relationship.
         * @return App\Models\User
         */
        public function users() {
            return $this->belongsToMany(
                User::class,
                'user_role_bridges',
                'role_id',
                'user_id',
            );
        }

    /**
     * #####################################
     *     Requests Validation Functions
     * #####################################
     */
        /**
         * Validation requests data submit from front-end.
         * @param \Illuminate\Http\Request $request
         * @return ObjectRespond [ data: data_result, message: result_message ] 
         */
        public static function checkReuqestValidation($request){
            $respond = (object)[
                'data'    => true,
                'message' => 'All requests data are valid',
            ];

            // validate name
            $nameResult = self::checkValidString($request['name']);
            if( !$nameResult->data ){
                $respond->data    = false;
                $respond->message = 'Role name invalid! Only alphanumeric with whitespace are available!';

                return $respond;
            }
            $name = $nameResult->data;

            $respond->name = strtolower($name);

            return $respond;
        }

        /**
         * Get mandatory modules for role store and update methods of role controller.
         * @param \Illuminate\Htpp\Request $request
         * @param Integer $roleId [ default 0 ]
         * 
         * @return ObjectRespond [ data: data_result, message: result_message ]
         */
        public static function getMandatoryModulesOfRoleStoreAndUpdate( $request, $roleId=0 ){
            $respond = (object)[
                'data'    => true,
                'message' => 'Succesful getting all mandatory modules',
            ];

            // get role record on id != 0
            $role = null;
            if( $roleId > 0 ){
                $role = self::getRole($roleId);
                if( !$role->data ){
                    return $role;
                }
                $role = $role->data;
            }

            // get permission records
            $permissions = self::getArrPermissionsByName($request['permissionsCheckbox']);
            if( !$permissions->data ){
                return $permissions;
            }
            $permissions = $permissions->data;

            $respond->role        = $role;
            $respond->permissions = $permissions;

            return $respond;
        }

}
