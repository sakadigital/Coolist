<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

// Route::group(['middleware' => ['web']], function () {
// 	Route::controller('/','TestController');
// });

Route::group(['middleware' => 'web'], function () {
	Route::group(['prefix' => 'dashboard'], function () {
		Route::get('/', 'DashboardController@index');
		Route::group(['prefix' => 'companies'], function () {
		    Route::get('/', 'CompaniesController@index');
		    Route::get('add', 'CompaniesController@getAdd');
		    Route::post('add', 'CompaniesController@postAdd');
		    Route::get('update/{id}', 'CompaniesController@getUpdate');
		    Route::post('update/{id}', 'CompaniesController@postUpdate');
		    Route::delete('delete/{id}', 'CompaniesController@delete');
		});

		Route::group(['prefix' => 'company_domains'], function () {
		    Route::get('/', 'CompanyDomainsController@index');
		    Route::get('add', 'CompanyDomainsController@getAdd');
		    Route::post('add', 'CompanyDomainsController@postAdd');
		    Route::get('update/{id}', 'CompanyDomainsController@getUpdate');
		    Route::post('update/{id}', 'CompanyDomainsController@postUpdate');
		    Route::delete('delete/{id}', 'CompanyDomainsController@delete');
		});

		Route::group(['prefix' => 'roles'], function () {
		    Route::get('/', 'RolesController@index');
		    Route::get('add', 'RolesController@getAdd');
		    Route::post('add', 'RolesController@postAdd');
		    Route::get('update/{id}', 'RolesController@getUpdate');
		    Route::post('update/{id}', 'RolesController@postUpdate');
		    Route::delete('delete/{id}', 'RolesController@delete');
		});

		Route::group(['prefix' => 'status_types'], function () {
		    Route::get('/', 'StatusTypesController@index');
		    Route::get('add', 'StatusTypesController@getAdd');
		    Route::post('add', 'StatusTypesController@postAdd');
		    Route::get('update/{id}', 'StatusTypesController@getUpdate');
		    Route::post('update/{id}', 'StatusTypesController@postUpdate');
		    Route::delete('delete/{id}', 'StatusTypesController@delete');
		});
		Route::group(['prefix' => 'users'], function () {
		    Route::get('/', 'UsersController@index');
		    Route::get('add', 'UsersController@getAdd');
		    Route::post('add', 'UsersController@postAdd');
		    Route::get('update/{id}', 'UsersController@getUpdate');
		    Route::post('update/{id}', 'UsersController@postUpdate');
		    Route::delete('delete/{id}', 'UsersController@delete');
		});
	});
});
