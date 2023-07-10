<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardCustomers extends Model
{
    use HasFactory;

    /**
     * Table name
     * @var String.
     */
    protected $table = 'dashboard_customers';

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
        'dashboard_type',
        'dashboard_name',
        'host_name',
        'user_id',

    ];

    /**
     * ########################
     *     Helper Function
     * ########################
    */


    /**
     * ########################
     *      Relationships
     * ########################
    */
    /**
     * One dashboard customer to one user relationship.
     * @return App\Model\User
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
