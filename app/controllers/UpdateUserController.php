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
    $user->first_name = Input::get('first_name');
    $user->last_name = Input::get('last_name');
    $user->email = Input::get('email');
    $user->password = Input::get('password');  

    // Update the user
    if ($user->save())
      {
        echo "Updated!";
        echo $user->first_name;
        echo $user->last_name;
        echo $user->email;
        echo $user->password;
      }
    else
      {
        echo "Not Updated.";
        echo $user->first_name;
        echo $user->last_name;
        echo $user->email;
        echo $user->password;
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