<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function(){
// 	return 'Wellcome to sakadigital documentation';
// });

Route::group(['middleware' => ['api']], function() {
	    Route::controller('companies', 'ApiCompaniesController');
		Route::controller('companydomains', 'ApiCompanyDomainsController');
		Route::controller('roles', 'ApiRolesController');
		Route::controller('statustypes', 'ApiStatusTypesController');
		Route::controller('users', 'ApiUsersController');
});