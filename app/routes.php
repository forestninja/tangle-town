<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


// Display the Laravel default "you have arrived" message when someone goes to the root url.
Route::get('/', function()
{
	return View::make('hello');
});


Route::get('/login', 'LoginController@loginForm');
Route::post('/login', 'LoginController@loginSubmit');
Route::get('/register', 'RegistrationController@registrationForm');
Route::post('/register', 'RegistrationController@registrationSubmit');
Route::get('/update-user', array('before' => 'login-check', 'uses' => 'UpdateUserController@updateUserForm'));
Route::post('/update-user', 'UpdateUserController@updateUserSubmit');
Route::get('/logout', function()
	{
		Sentry::logout();
		return Redirect::to('/');
	});


Route::filter('login-check', function()
{
    if (!Sentry::check())
    {
        return Redirect::to('/login');
    }
});


Route::get('/create-pattern', array('before' => 'login-check', 'uses' => 'PatternController@patternCreateForm'));

