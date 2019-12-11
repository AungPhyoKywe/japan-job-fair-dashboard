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
    return view('backend.dashboard.dashboard');
});
Route::resource('country','CountryController');
Route::resource('users','UsersController');
Route::get('users/destroy/{id}','UsersController@destroy');
Route::get('/report','CvReportController@index')->name('report');

Route::get('/cvreport/get-data/datatable','CvReportController@report')->name('cv_report');
Route::get('/users/get-data/datatable','UsersController@report')->name('users.users_report');
Route::get('/country/get-data/datatable','CountryController@getData')->name('country.get-data');
Route::post('/users/get-data/datatable','UsersController@report')->name('users.users_report');
Route::post('/search','CvReportController@search')->name('cv_report.search');
