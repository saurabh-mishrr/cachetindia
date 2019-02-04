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

Route::get('userdesk','UserDashboardController@index');
Auth::routes([
   'reset' => false,
   'verify' => false,
   'register' => false,
]);

Route::get('/home', 'HomeController@index')->name('home');


// these are backends routes.
Route::namespace('Backends')->group(function() {
	Route::resource("filetrail","FileTrailController", [
		'names' => [
			'create' => 'salary.create',
		]
	]);
	Route::get('/upload-salary-slips/{id}', 'FileTrailController@salarySlipUploadPage')->name('upload-salary-slips');
	Route::post('/upload-salary-slips', 'FileTrailController@uploadSalarySlips')->name('upload-slips');
});

Route::resource("/events","EventController");

Route::resource("/gallery","EventGalleryController");
