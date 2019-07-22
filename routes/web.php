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
    Route::resource( '/income', 'IncomeController' );
    Route::resource( '/expense', 'ExpenseController' );

    Route::group( [ 'prefix' => 'report', 'as' => 'report.' ], function () {
        Route::get( '/', 'ReportsController@index' )->name( 'index' );
        Route::get( '/daily', 'ReportsController@daily_income_expense' )->name( 'daily' );
        Route::get( '/monthly', 'ReportsController@monthly_income_expense' )->name( 'monthly' );
    } );
} );
