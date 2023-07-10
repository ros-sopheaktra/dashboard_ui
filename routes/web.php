<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Route::namespace('Auth')->group(function(){
//     // login route
//     // Route::get('/login', 'WebsiteLoginController@ShowFormLogin')->middleware('guest')->name('show_form_login');
//     // Route::post('/login', 'WebsiteLoginController@webLogin')->middleware('guest')->name('web_login');
//     // // Route::post('/logout', 'WebsiteLoginController@logout')->middleware('auth')->name('logout');

//     // // register route
//     // Route::get('/register', 'WebsiteRegisterController@ShowFormRegister')->name('show_form_register');
//     // Route::post('/store', 'WebsiteRegisterController@register')->middleware('guest')->name('register');
// });


// // Customer Dashboard Router [BEGIN]
// Route::namespace('Customers')->group(function(){
//     // home
//     // Route::get('/', 'HomeController@index');
// });
