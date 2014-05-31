<?php

class PatternController extends BaseController {


	public function patternCreateForm()
	{
		return View::make('create-pattern');
	}

  public function patternCreateSubmit()
	{
    echo "Pattern Created!";
  }
}
