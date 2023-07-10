<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
|
| Here is where you can register dashcustomerboard routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "customer" middleware group. Now create something great!
|
*/

/*
 | #####################
 |    Authentication
 | #####################
 |
 | Here is where you register all dashboard authentication routers.
 | 
 */
Route::namespace('Auth')->group(function(){
    Route::get('/login', 'CustomerDashboardLoginController@showDashboardCustomerLogin')->middleware('guest')->name('customers-login');
    Route::post('/login', 'CustomerDashboardLoginController@dashboardCustomerLogin')->middleware('guest')->name('cus-auth-login');
    Route::post('/logout', 'CustomerDashboardLoginController@destroy')->middleware('auth')->name('customers-logout');
});

/*
 | ############### 
 |    Dashboard
 | ############### 
 | Here is where you register all dashboard module routers.
 | 
 */
Route::middleware('auth')->namespace('Customers')->group(function(){
    // Dashboard Router [BEGIN]
        Route::get('/', 'DashboardController@index');
    // Dashboard Router [END]

});