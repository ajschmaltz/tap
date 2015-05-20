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

use App\LeadForm;

Route::get('/', function(){
  return redirect('form/1');
});

Route::get('home', 'HomeController@index');

Route::post('upload', 'UploadController@upload');

Route::delete('upload', 'UploadController@delete');

Route::post('create', 'LeadFormController@post');

Route::get('create', 'LeadFormController@create');

Route::get('form/{id}', 'LeadFormController@show');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);
