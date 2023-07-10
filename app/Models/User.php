<?php

namespace App\Models;

use Exception;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'is_customer',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * ########################
     *     Helper Function
     * ########################
     */
    // Role Module Helper Functions [BEGIN]
            /**
             * Get all role records from database.
             * @return ObjectRespond [ data: data_result, message: result_message ] 
             */
            public static function getRoles() {
                $respond = (object)[];

                try {
                    $roles = Role::all();

                    $respond->data    = $roles;
                    $respond->message = 'Succesful getting role records from database';
                } catch ( Exception $e ) {
                    $respond->data    = false;
                    $respond->message = 'Problem occured while trying to get role records from database!';
                }

                return $respond;
            }

            /**
             * Get specific role record based on 
             * given id pass as parameter from database.
             * @param Integer $id
             * @return ObjectRespond [ data: data_result, message: result_message ] 
             */
            public static function getRole($id) {
                $respond = (object)[];

                try {
                    $role = Role::findOrFail($id);

                    $respond->data    = $role;
                    $respond->message = 'Role record found';
                } catch ( ModelNotFoundException $e ) {
                    $respond->data    = false;
                    $respond->message = 'Role record not found!';
                }

                return $respond;
            }
        // Role Module Helper Functions [END]

        // Permission Module Helper Functions [BEGIN]
            /**
             * Get all permission all records from database.
             * @return ObjectRespond [ data: data_result, message: result_message ] 
             */
            public static function getPermissions() {
                $respond = (object)[];

                try {
                    $permissions = Permission::all();

                    $respond->data    = $permissions;
                    $respond->message = 'Succesful getting all permission records from database';
                } catch ( Exception $e ) {
                    $respond->data    = false;
                    $respond->message = 'Problem occured while trying to get permission records from database!';
                }

                return $respond;
            }

            /**
             * Get specific permission record based 
             * on given id pass as parameter from database.
             * @param Integer $id
             * @return ObjectRespond [ data: data_result, message: result_message ] 
             */
            public static function getPermission($id) {
                $respond = (object)[];

                try {
                    $permission = Permission::findOrFail($id);

                    $respond->data    = $permission;
                    $respond->message = 'Permission record found';
                } catch ( ModelNotFoundException $e ) {
                    $respond->data    = false;
                    $respond->message = 'Permission record not found!';
                }

                return $respond;
            }

            /**
             * Get all permission records based on 
             * given array of permission id from database.
             * @param Array $permissionsIdArr
             * @return ObjectRespond [ data: data_result, message: result_message ] 
             */
            public static function getArrPermissions($permissionsIdArr){
                $respond = (object)[];

                // get records
                $permissions = self::getPermission($permissionsIdArr);
                if( !$permissions->data ){
                    $permissions->message = 'Permission ids is invalid, enable to get data!';

                    return $permissions;
                }
                $permissions = $permissions->data;

                // validate if all the permission are math
                $arrayLength = count($permissionsIdArr);
                if( $arrayLength != count($permissions) ){
                    $respond->data    = false;
                    $respond->message = 'One of the permission id not found!';

                    return $respond;
                }

                $respond->data    = $permissions;
                $respond->message = 'All permission ids are found';

                return $respond;
            }
        // Permission Module Helper Functions [END]

    /**
     * ########################
     *      Relationships
     * ########################
     */

        /**
         * One user to one website customer relationship.
         * @return App\Model\WebsiteCustomers
         */
        public function websiteCustomer()
        {
            return $this->hasOne(WebsiteCustomers::class);
        }

        /**
         * One user to one dashboard customer relationship.
         * @return App\Model\DashboardCustomers
         */
        public function dashboardCustomer()
        {
            return $this->hasOne(DashboardCustomers::class);
        }

        /**
         * One user to many log histories relationship.
         * @return App\Models\LogHistory
         */
        public function logHistories(){
            return $this->hasMany(
                LogHistory::class,
                'user_id',
            );
        }

        /**
         * Many users to many log histories relationship (Polymorphic).
         * @return App\Models\LogHistory
         */
        public function logHistoryables(){
            return $this->morphToMany(
                LogHistory::class,
                'historyables',
            );
        }

}
