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

Route::get( '/', function () {
    return view( 'welcome' );
} )->middleware( 'guest' );

Auth::routes();

Route::group( [ 'middleware' => 'auth' ], function () {
    Route::get( '/home', 'HomeController@index' )->name( 'home' );
    Route::get( '/about', 'HomeController@about' )->name( 'about' );
    Route::get( '/user/{user}/permission', 'UsersController@permission' )->name( 'user.permission' );
    Route::put( '/user/{user}/permission', 'UsersController@update_permission' )->name( 'user.permission-update' );
    Route::get( '/user/{user}/change-password', 'UsersController@change_password' )->name( 'user.change-password' );
    Route::put( '/user/{user}/change-password', 'UsersController@update_password' )->name( 'user.update-password' );
    Route::resource( 'user', 'UsersController' );
    
    Route::resource( '/collection', 'CollectionsController' );
    Route::resource( '/expense', 'ExpenseController' );
    Route::resource( '/meal', 'MealsController' );
    
    Route::group( [ 'prefix' => 'report', 'as' => 'report.' ], function () {
        Route::get( '/', 'ReportsController@index' )->name( 'index' );
        Route::get( '/daily', 'ReportsController@daily_income_expense' )->name( 'daily' );
        Route::get( '/monthly-meal', 'ReportsController@monthly_meal_report' )->name( 'monthly-meal' );
        Route::get( '/monthly-all', 'ReportsController@monthly_all_report' )->name( 'monthly-all' );
    } );
} );
