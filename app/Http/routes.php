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

Route::get('job', function(){
  return view('job')->withSteps([
    'Something about a tree',
    'Something about your face',
    'This is seriously easy',
    'This is another thing',
    'If we do tons does it slow it down',
    'Lets just do 2 more',
    'Okay, now only one more',
    'I am the last one... then get yo address on.'
  ]);
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);
