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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::post('upload', 'UploadController@upload');

Route::delete('upload', 'UploadController@delete');

Route::get('create', function(){
  return view('create');
});

Route::get('job', function(){
  return view('job')->withSteps([
    'Take a photo of your front yard.',
    'Take a photo of your side yard.',
    'Take a photo of your back yard.'
  ]);
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);
