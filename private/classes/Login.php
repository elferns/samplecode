<?php

/**
 * Created by PhpStorm.
 * User: elita
 * Date: 3/14/2016
 * Time: 8:29 PM
 */
class Login extends Main
{

	/**
	 * Login constructor.
     */
	function __construct()
	{
		//TODO
		$this->model = new login_model();
	}

	/**
	 *
     */
	public function index()
	{

		$loginVars['form_action'] = "login/authenticate";
		$loginContent = $this->loadView('login', $loginVars);
		$contentVars['content'] = $loginContent;
		$this->loadTemplate($contentVars);

	}

	/**
	 * @param $params
	 */
	public function authenticate($params)
	{
        //TODO - server side validation
		$check['email'] 		= trim($params['inputEmail']);
		$check['password'] 		= trim($params['inputPassword']);

		$userCount = $this->model->checkUser($check);
		if($userCount)
			echo "Welcome to booking portal";
		else
			$this->redirect();
	}
}