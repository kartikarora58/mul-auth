<?php

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
    return view('welcome');
});

Auth::routes();
Route::prefix('admin')->group(function(){
   Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
   Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
   Route::get('/home','AdminController@index')->name('admin.home');
   Route::post('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
});
Route::prefix('vendor')->group(function(){
    Route::get('/login','Auth\VendorLoginController@showLoginForm')->name('vendor.login');
    Route::post('/login','Auth\VendorLoginController@login')->name('vendor.login.submit');
    Route::get('/home','VendorController@index')->name('vendor.home');
    Route::post('/logout','Auth\VendorLoginController@logout')->name('vendor.logout');
    Route::get('/register','Auth\VendorRegisterController@showRegisterForm')->name('vendor.register');
    Route::post('/register','Auth\VendorRegisterController@register')->name('vendor.register.submit');
});
Route::get('/home', 'HomeController@index')->name('home');
