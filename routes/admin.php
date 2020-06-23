<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//### auth admin  ###//

Route::get('login', 'Auth\LoginController@showAdminLoginForm')->name('admin.login');
Route::post('login', 'Auth\LoginController@adminLogin');
Route::get('register', 'Auth\RegisterController@showAdminRegisterForm')->name('admin.register');
Route::post('register', 'Auth\RegisterController@createAdmin');

// Route url
Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {
        //### start dashboard   ###//
  Route::get('/', 'DashboardController@index')->name('admin.dashboard');
        //### end dashboard   ###//


});


