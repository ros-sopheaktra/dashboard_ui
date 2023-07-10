<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        /**
         * ========================================
         *      All Modules Permission Seeder 
         * ========================================
         */


        /**
         * ========================================
         *      Attach Permissions to Roles Seeder
         * ========================================
        */

        //  Give Permission to [ Super Admin Role ] [BEGIN]
            // give permissions to role
            $superAdminRole = Role::where('name', 'super admin')->get()->first();
            $superAdminRole->givePermissionTo( Permission::all() );
            // assign role to user
            $superAdminUser = User::where('username', env('SUPER_ADMIN_USERNAME'))->get()->first();
            $superAdminUser->assignRole('super admin');
        //  Give Permission to [ Super Admin Role ] [END] 

    }
}
