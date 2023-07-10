<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register dashboard routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "dashboard" middleware group. Now create something great!
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
    Route::get('/login', 'DashboardLoginController@showDashboardLogin')->middleware('guest')->name('dashboard-login');
    Route::post('/login', 'DashboardLoginController@dashboardLogin')->middleware('guest')->name('login');
    Route::post('/logout', 'DashboardLoginController@destroy')->middleware('auth')->name('logout');
});

/*
 | ############### 
 |    Dashboard
 | ############### 
 | Here is where you register all dashboard module routers.
 | 
 */
Route::middleware('auth')->namespace('Dashboard')->group(function(){
    // Dashboard Router [BEGIN]
        Route::get('/', 'DashboardController@index')->name('dashboard');
    // Dashboard Router [END]

});