<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //current date time now
        $now = Carbon::now();

        /**
         * Users Data
         * 
         * @var array
         */
        $users = [
            // admin (username = admin, password = 'admin123')
            [
                'name'              => env('SUPER_ADMIN_NAME'),
                'username'          => env('SUPER_ADMIN_USERNAME'),
                'email'             => env('SUPER_ADMIN_EMAIL'),
                'email_verified_at' => $now,
                'password'          => Hash::make(env('SUPER_ADMIN_PASSWORD')),
                'is_customer'       => false,
            ],

            // customer
            [
                'name'              => 'Customer Customer',
                'username'          => 'customer',
                'email'             => 'customer@gmail.com',
                'email_verified_at' => $now,
                'password'          => Hash::make('customer123'),
            ],

        ];

        // foreach to create user in db
        foreach($users as $user){
            User::create($user);
        }
    }
}
