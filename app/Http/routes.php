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
  return view('welcome');
});

Route::get('home', 'HomeController@index');

Route::post('upload', 'UploadController@upload');

Route::delete('upload', 'UploadController@delete');

Route::post('create', 'LeadFormController@post');

Route::get('form', 'LeadFormController@index');

Route::get('form/create', 'LeadFormController@create');

Route::get('form/{id}', 'LeadFormController@show');

Route::post('lead', 'LeadController@post');

Route::get('lead', 'LeadController@index');

Route::get('lead/{id}', 'LeadController@show');

Route::get('invite', 'SubscriptionController@invite');

Route::post('subscribe', 'SubscriptionController@subscribe');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);
