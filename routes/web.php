<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('authentication.login'); 
    });
    Route::POST('/register','RegistrationController@register');
	Route::POST('/login',"LoginController@Login");
	Route::POST('/logout',"LoginController@Logout");

Route::group(['middleware' => 'admin' || 'Superadmin'], function(){
	Route::get('/backend','BackendController@Backend');
	Route::get('/manageusers',"UsersController@ManageUsers");
	Route::get('/roles',"RolesController@rolePage");
	Route::POST('/roles',"RolesController@CreateRoles");
	Route::get('/manageroles',"RolesController@ManageRoles");
	Route::get('/postroles/{id}/{role}',"RolesController@PostRole");
	Route::get('/Removeroles/{id}/{role}',"RolesController@RemoveRole");
	Route::get('/activate/{email}/{activationCode}',"ActivationController@activate");
	Route::get('/CreateOrganization',"OrganizationController@CreateOrganizations");
	Route::POST('/NewOrganization',"OrganizationController@NewOrganizations");
	Route::get('/manageOrganization',"OrganizationController@manageOrganizations");
	Route::POST('/CreateUserOrg',"OrganizationController@CreateUserOrg");
	Route::get('/VieworganizationUsers/{id}',"OrganizationController@VieworganizationUsers");

});


