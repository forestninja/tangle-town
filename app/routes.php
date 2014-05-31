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

// Display the returned text when someone goes to /test. Not sure why it works without the / as well as with it.
Route::get('test', function()
{
    return 'Test!';
});

// When someone visits /login, go into the LoginController.php and look for the loginForm function/method, which says to display the login form view.
Route::get('/login', 'LoginController@loginForm');

// When someone submits the login form, it keeps you at the /login url, but it calls loginSubmit instead, so the page refreshes and displays the results of submission.
Route::post('/login', 'LoginController@loginSubmit');

// When someone visits /register go to the RegistrationController.php and look for the registrationForm function/method, which displays the registration form view.
Route::get('/register', 'RegistrationController@registrationForm');

// When someone submits the registration form, it keeps you at the /register url, but calls registrationSubmit instead, which displays the results of registration submission.
Route::post('/register', 'RegistrationController@registrationSubmit');

