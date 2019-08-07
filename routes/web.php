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
    Route::get( '/users', 'UsersController@index' )->name( 'user.index' );
    Route::get( '/users/{user}', 'UsersController@show' )->name( 'user.show' );
    Route::get( '/users/{user}/permission', 'UsersController@permission' )->name( 'user.permission' );
    Route::put( '/users/{user}/permission', 'UsersController@update_permission' )->name( 'user.permission-update' );
    Route::get( '/users/{user}/change-password', 'UsersController@change_password' )->name( 'user.change-password' );
    Route::put( '/users/{user}/change-password', 'UsersController@update_password' )->name( 'user.update-password' );
    Route::delete( '/users/{user}', 'UsersController@destroy' )->name( 'user.destroy' );
    
    Route::resource( '/collection', 'CollectionsController' );
    Route::resource( '/expense', 'ExpenseController' );
    Route::resource( '/meal', 'MealsController' );
    
    Route::group( [ 'prefix' => 'report', 'as' => 'report.' ], function () {
        Route::get( '/', 'ReportsController@index' )->name( 'index' );
        Route::get( '/daily', 'ReportsController@daily_income_expense' )->name( 'daily' );
        Route::get( '/monthly-meal', 'ReportsController@monthly_meal_report' )->name( 'monthly-meal' );
    } );
} );
