<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes xd
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('signup', 'UserController@signup');

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'UserController@login');
});

Route::group([
    'middleware' => 'auth:api'
  ], function() {
    Route::get('logout', 'UserController@logout');
    Route::get('user', 'UserController@user');
    Route::group([
        'prefix' => 'orders'
        ], function () {
            Route::get('/', 'OrderController@orders');
            Route::get('user/{id}', 'OrderController@order');
            Route::post('create', 'OrderController@create');
            Route::post('bulk', 'OrderController@bulk');
        });
    Route::group([
        'prefix' => 'menu-items'
        ], function () {
            Route::get('/', 'MenuItemController@menuItems');
            Route::post('create', 'MenuItemController@create');
            Route::post('update/{id}', 'MenuItemController@update');
            Route::post('delete/{id}', 'MenuItemController@delete');
        });
    Route::group([
        'prefix' => 'menu-types'
        ], function () {
            Route::get('/', 'MenuTypeController@menuTypes');
            Route::post('create', 'MenuTypeController@create');
            Route::post('update/{id}', 'MenuTypeController@update');
            Route::post('delete/{id}', 'MenuTypeController@delete');
        });
    Route::group([
        'prefix' => 'coupons'
        ], function () {
            Route::get('/', 'CouponController@coupons');
            Route::post('create', 'CouponController@create');
            Route::post('update/{id}', 'CouponController@update');
            Route::post('delete/{id}', 'CouponController@delete');
        });
});

Route::fallback(function () {
    return response()->json([
        'message' => 'Unauthorized action.'], 404);
});
