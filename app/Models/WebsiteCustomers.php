<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteCustomers extends Model
{
    use HasFactory;

    /**
     * Table name
     * @var String.
     */
    protected $table = 'website_customers';

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
        'day',
        'month',
        'year',
        'point',
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
     * One website customer to one user relationship.
     * @return App\Model\User
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
