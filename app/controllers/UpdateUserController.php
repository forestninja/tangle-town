<?php

class UpdateUserController extends BaseController {


	public function updateUserForm()
	{
    return View::make('update-user');
	}

  public function updateUserSubmit()
	{
  try
    {
    // Get the current user
    $user = Sentry::getUser();


    // Update the user details
    $user->profile_pic = Input::get('profile_pic');
    $user->first_name = Input::get('first_name');
    $user->last_name = Input::get('last_name');
    $user->email = Input::get('email');
    $user->username = Input::get('username');
    $user->password = Input::get('password');  

    // Update the user
    if ($user->save())
      {
        echo 'Updated!', "<br />", $user->profile_pic, "<br />", $user->first_name, "<br />", $user->last_name, "<br />", $user->email, "<br />", $user->username, "<br />", $user->password;
      }
    else
      {
        echo 'Not Updated.', "<br />", $user->profile_pic, "<br />", $user->first_name, "<br />", $user->last_name, "<br />", $user->email, "<br />", $user->username, "<br />", $user->password;
      }
    }
    catch (Cartalyst\Sentry\Users\UserExistsException $e)
    {
      echo 'User with this login already exists.';
    }
    catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
    {
      echo 'User was not found.';
    }

  }
}