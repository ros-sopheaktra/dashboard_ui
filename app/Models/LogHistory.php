<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use Spatie\Permission\Models\Role as ModelsRole;

use Exception;
use Throwable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LogHistory extends Model
{
    use HasFactory;

    /**
     * Table name.
     * @var String
     */
    protected $table = 'log_histories';

    /**
     * Primary key.
     * @var Integer
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     * @var Array
     */
    protected $fillable = [
        'user_id',
        'username',
        'log_header',
        'description',
        'permission_slug',
        
    ];

    /**
     * ###############################
     *    Modules Helper Functions
     * ###############################
     */
        // Log History Helper Function [BEGIN]
            /**
             * Get all log history records from database.
             * @param Integer $numberOfPagination (default 15)
             * @return ObjectRespond [ data: date_result, message: result_message ]
             */
            public static function getLogHistories($numberOfPagination=15){
                $respond = (object)[];

                try {
                    $logHistories = LogHistory::orderBy('created_at', 'DESC')->paginate($numberOfPagination);

                    $respond->data    = $logHistories;
                    $respond->message = 'Successful getting all log history records from database';
                } catch ( Exception $ex ) {
                    $respond->data    = false;
                    $respond->message = 'Problem occured while trying to get log history records from database!';
                }

                return $respond;
            }

            /**
             * Get specific log history record by id or by log_header parameter from database.
             * @param String $attribute
             * @param String $queryBy [ id, header ]
             * 
             * @return ObjectRespond [ data: date_result, message: result_message ]
             */
            public static function getLogHistory( $attribute, $queryBy ){
                $respond = (object)[];

                try {
                    $queryBy == 'header' ? 
                        $logHistory = LogHistory::where('log_header', $attribute)->get() : 
                        $logHistory = LogHistory::findOrFail($attribute);

                    $respond->data    = $logHistory;
                    $respond->message = 'Log history record found';
                } catch ( ModelNotFoundException | Throwable $ex ) {
                    $respond->data    = false;
                    $respond->message = 'Log history record not found!';
                }

                return $respond;
            }

            /**
             * Get collections of log history records by given 
             * header permission collection parameter of log_header.
             * @param Collection $headerPermissionsCollection
             * @return ObjectRespond [ data: date_result, message: result_message ]
             */
            public static function findArrOfLogHistoryLogHeader($headerPermissionsCollection){
                $respond = (object)[];

                try {
                    $logHistoryRecords = new Collection();

                    foreach( $headerPermissionsCollection as $permissionLogHeader ){
                        $tempLogHistory = LogHistory::where( 'permission_slug', $permissionLogHeader )->get();

                        if( count($tempLogHistory) ) {
                            foreach( $tempLogHistory as $item ) {
                                $logHistoryRecords->push($item);
                            }
                        }
                    }
                    
                    $respond->data    = $logHistoryRecords;
                    $respond->message = 'Sucecsful getting log history records';
                } catch ( ModelNotFoundException | Throwable $e ) {
                    $respond->data    = false;
                    $respond->message = 'Problem occured while trying to get log history records!';
                }

                return $respond;
            }

            /**
             * Get all loghistory based records on given number of pagination  from database.
             * @param Integer $numberOfPagination (default 15)
             * @return ObjectRespond [ data: data_result, message: result_message ]
             */
            public static function getLogHistoryBaseOnPagination($numberOfPagination=15)
            { 
                $respond = (object)[];

                try {
                    $logHistories = LogHistory::getLogHistories($numberOfPagination);
                    $logHistories = $logHistories->data;
                    $totalRecords = $logHistories->total();

                    if( $totalRecords > 1000 ){
                        $numberDeleteRecorde = $totalRecords - 1000;
                        $dataNeedToDelete    = self::all()->take($numberDeleteRecorde);

                        LogHistory::destroy($dataNeedToDelete);
                    }

                    $respond = $logHistories;
                    $respond->message = 'Successful getting all log history records from database';
                } catch ( Exception $ex ) {
                    $respond->data    = false;
                    $respond->message = 'Problem occured while trying to get all log history records from database!';
                }

                return $respond;
            }
        // Log History Helper Function [END]

        // Permission Helper Functions [BEGIN]
            /**
             * Get current logged in user permissions by pluck 
             * on the the name of permissions available from the current role.
             * @return ObjectRespond [ data: data_result, mesage: result_message ]
             */
            public static function getLoggedInUserPermissions(){
                $respond = (object)[];

                try {
                    $currentUser = auth()->user();
                    $permissions = $currentUser->roles->first()->permissions->pluck('name');

                    // get user log_history permissions]
                    $historyLogPermissions = new Collection();
                    foreach( $permissions as $permissions ){
                        if( strpos( $permissions, '_history' ) ){
                            $historyLogPermissions->push($permissions);
                        }
                    }

                    $respond->data    = $historyLogPermissions;
                    $respond->message = 'Successful getting permissions of current user';
                } catch ( Exception | Throwable $e ) {
                    $respond->data    = false;
                    $respond->message = 'Problem occured while trying to get current user permissions, try to logged in again!';
                }

                return $respond;
            }
        // Permission Helper Functions [END]

    /**
     * ###################
     *    Relationships
     * ###################
     */
        /**
         * Many log histories to one user relationship.
         * @return App\Models\User
         */
        public function user(){
            return $this->belongsTo(
                User::class,
                'user_id',
            );
        }

        /**
         * Many log histories to many customers (Polymorphic).
         * @return App\Models\Customer
         */
        public function customers(){
            return $this->morphedByMany(
                Customer::class,
                'historyables',
            );
        }

        /**
         * Many log histories to many roles (Polymorphic).
         * @return Spatie/Permission/Models/Role
         */
        public function roles(){
            return $this->morphedByMany(
                ModelsRole::class,
                'historyables',
            );
        }

        /**
         * Many log histories to many users (Polymorphic).
         * @return App\Models\User
         */
        public function users(){
            return $this->morphedByMany(
                User::class,
                'historyables',
            );
        }

}
