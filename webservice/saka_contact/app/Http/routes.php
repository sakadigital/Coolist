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

Route::group(['prefix' => 'companies'], function () {
    Route::get('/', 'CompaniesController@index');
    Route::get('add', 'CompaniesController@getAdd');
    Route::post('add', 'CompaniesController@postAdd');
    Route::get('update/{id?}', 'CompaniesController@getUpdate');
    Route::post('update/{id?}', 'CompaniesController@postUpdate');
    Route::delete('delete/{id?}', 'CompaniesController@delete');
});
