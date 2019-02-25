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


Route::get('userdesk','UserDashboardController@index')->middleware(['auth', 'check-permission:admin']);
//Route::get('userdesk','UserDashboardController@index');
Auth::routes([
   'reset' => false,
   'verify' => false,
]);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::resource("events","EventController");

Route::get('/', 'HomeController@index')->name('home')->middleware(['auth', 'check-permission:admin|accounts']);

Route::get('/register', 'Auth\RegisterController@addUserToLdap')->name('register')->middleware(['auth', 'check-permission:admin']);

Route::post('/register', 'Auth\RegisterController@create')->name('register')->middleware(['auth', 'check-permission:admin']);

// these are backends routes.
Route::namespace('Backends')->group(function() {
	Route::group(['middleware' => ['auth']], function() {

		

		Route::resource("filetrail","FileTrailController", [
			'names' => [
				'create' => 'salary.create',
			]
		])->middleware('check-permission:accounts');

		Route::get('/upload-salary-slips/{id}', 'FileTrailController@salarySlipUploadPage')->name('upload-salary-slips')->middleware('check-permission:accounts');

		Route::post('/upload-salary-slips', 'FileTrailController@uploadSalarySlips')->name('upload-slips')->middleware('check-permission:accounts');
	});
});

//Route::resource("/events","EventController")->middleware(['auth', 'check-permission:admin']);

Route::resource("/events","EventController");

Route::resource("/wishes","EmplyoeeBirthWishseController");

Route::resource("/gallery","EventGalleryController");

Route::resource("/achievement","AchievementController");

Route::post('/uploadimage','UserDashboardController@uploadimage')->middleware(['auth', 'check-permission:admin']);

Route::get('/downloadSalary','UserDashboardController@downloadSalary')->middleware(['auth', 'check-permission:admin']);