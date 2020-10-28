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
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('books', BookController::class);
    Route::resource('magazines', MagazineController::class);
    Route::resource('newspapers', NewspaperController::class);
    Route::resource('issues', IssueController::class);

    Route::get('/returns', 'ReturnedController@index')->name('return');
    Route::get('/latereturns', 'LateReturnedController@index')->name('latereturn');
    Route::get('/issued/yearly', 'HomeController@issuedYearly')->name('issued.yearly');
    Route::get('/issued/daily', 'HomeController@issuedDaily')->name('issued.daily');

    Route::get('/issued/data', 'HomeController@data')->name('issued.data');

    Route::get('/report/monthly', 'ReportController@monthlyReport')->name('monthly.report');
    Route::get('/report/datamonthly', 'ReportController@dataMonthly')->name('monthly.data');

});


