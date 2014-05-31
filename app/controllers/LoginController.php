<?php

class LoginController extends BaseController {


	public function loginForm()
	{
		return View::make('login');
	}
  
  public function loginSubmit()
	{
		echo "Username = " . Input::get('username') . " | Password = " . Input::get('password');
	}

}
