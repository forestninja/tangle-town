<?php

class RegistrationController extends BaseController {


	public function registrationForm()
	{
		return View::make('register');
	}

  public function registrationSubmit()
	{
    try
    {
      // Create the user
      $user = Sentry::createUser(array(
        'first_name'    => Input::get('first_name'),
        'last_name'    => Input::get('last_name'),
        'email'    => Input::get('email'),
        'password' => Input::get('password'),
        'activated'   => true,
        'permissions' => array(
            'user.create' => -1,
            'user.delete' => -1,
            'user.view'   => 1,
            'user.update' => 1,
        ),
      ));
    }
    catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
    {
      echo 'Login field is required.';
    }
    catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
    {
      echo 'Password field is required.';
    }
    catch (Cartalyst\Sentry\Users\UserExistsException $e)
    {
      echo 'User with this login already exists.';
    }

    echo "Registered!";

  }
}
