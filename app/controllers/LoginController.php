<?php

class LoginController extends BaseController {


	public function loginForm()
	{
		return View::make('login');
	}
  
  public function loginSubmit()
	{
    try
    {
      // Login credentials
      $credentials = array(
        'email'    => Input::get('email'),
        'password' => Input::get('password'),
      );

      // Authenticate the user
      $user = Sentry::authenticate($credentials, false);
    }
    
    catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
    {
      echo 'Login field is required.';
    }
    catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
    {
      echo 'Password field is required.';
    }
    catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
    {
      echo 'Wrong password, try again.';
    }
    catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
    {
      echo 'User was not found.';
    }
    catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
    {
      echo 'User is not activated.';
    }

    echo "Logged In!";

  }
}
