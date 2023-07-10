<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;

    /**
     * Table name.
     * @var string
     */
    protected $table = 'permissions';

    /**
     * Primary key.
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attribute that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',

    ];

    /**
     * #####################
     *     Relationships
     * #####################
     */
        // many permissions to many users relationship.
        // (povit table user_permission_bridges)
        public function users(){
            return $this->belongsToMany(
                User::class,
                'user_permission_bridges',
                'permission_id',
                'user_id',
            );
        }
}
