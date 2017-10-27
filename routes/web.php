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
    Route::get('/users/{user_id}/edit', 'UserController@get_user');
    Route::post('/users/{user_id}/update', 'UserController@update_user');
    /* Vendor Management */
    Route::get('/vendors', 'UserController@get_vendors');
    Route::get('/vendors/{vendor_id}/edit', 'UserController@get_vendor');
    Route::post('/vendors/{vendor_id}/update', 'UserController@update_vendor');
    /* Category Management */
    Route::get('/categories', 'CategoryController@index');
    Route::get('/categories/{category_id}/edit', 'CategoryController@get_category');
    Route::post('/categories/{category_id}/update', 'CategoryController@update_category');

    /* Studio Management */
    Route::get('/studios', 'StudioController@index');
    Route::get('/studios/{studio_id}/edit', 'StudioController@get_studio');
    Route::post('/studios/{studio_id}/update', 'StudioController@update_studio');
    /* Activity Management */
    Route::get('/activities', 'ActivityController@index');
    Route::get('/activities/{activity_id}/edit', 'ActivityController@get_activity');
    Route::post('/activities/{activity_id}/update', 'ActivityController@update_activity');
    /* Transaction Management */
    Route::get('/transactions', 'UserController@get_transactions');
    /* Reservation Management */
    Route::get('/reservations', 'ReservationController@index');
    // Route::get('/reservations/{reservation_id}/edit', 'ReservationController@get_reservation');
    // Route::get('/reservations/{reservation_id}/update', 'ReservationController@update_reservation');
    Route::get('/reservations/{reservation_id}/cancel', 'ReservationController@cancel_reservation');
    /* Setting Management */
    Route::get('/setting', 'ManagementController@index');
    Route::get('/setting/{admin_id}/edit', 'ManagementController@get_admin');
    Route::post('/setting/{admin_id}/update', 'ManagementController@update_setting');
    /* Faq Management */
    Route::get('/faq', 'ManagementController@get_faqs');
    Route::get('/faq/add', 'ManagementController@get_faq');
    Route::post('/faq/create', 'ManagementController@update_faq');
    Route::get('/faq/{faq_id?}/edit', 'ManagementController@get_faq');
    Route::post('/faq/{faq_id?}/update', 'ManagementController@update_faq');
    Route::get('/faq/{faq_id}/delete', 'ManagementController@delete_faq');
    /* Contact us Management */
    Route::get('/support', 'ManagementController@get_supports');
    Route::get('/support/{contact_id}/edit', 'ManagementController@get_support');
    Route::post('/support/{contact_id}/update', 'ManagementController@update_support');
    Route::get('/support/{contact_id}/delete', 'ManagementController@delete_support');

});
