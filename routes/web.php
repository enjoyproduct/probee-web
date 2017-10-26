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
    return view('auth/login');
});

/**
 * Authentication URIs
 */
Auth::routes();
Route::group(['namespace' => 'Auth'], function () {
    Route::get('/login', 'LoginController@login');
    Route::get('/auth/logout', '\App\Http\Controllers\Auth\LoginController@logout');
    Route::get('/register/verify/{confirmation_code}', 'RegisterController@confirm');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    
    /* User Management */
    Route::get('/users', 'UserController@get_users');

    /* Vendor Management */
    Route::get('/vendors', 'UserController@get_vendors');

    /* Category Management */
    Route::get('/categories', 'CategoryController@index');
    /* Studio Management */
    Route::get('/studios', 'StudioController@index');
    /* Activity Management */
    Route::get('/activities', 'ActivityController@index');
    /* Transaction Management */
    Route::get('/transactions', 'UserController@get_transactions');
    /* Reservation Management */
    Route::get('/reservations', 'ReservationController@index');
    /* Setting Management */
    Route::get('/setting', 'ManagementController@index');
    /* Faq Management */
    Route::get('/faq', 'ManagementController@get_faq');
    /* Contact us Management */
    Route::get('/support', 'ManagementController@get_support');

});
