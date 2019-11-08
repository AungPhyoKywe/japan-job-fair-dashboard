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
    return view('dashboard');
});

Route::get('/report','CvReportController@index')->name('report');

Route::get('/cv_report','CvReportController@report')->name('cv_report');

Route::post('/search','CvReportController@search')->name('search');
