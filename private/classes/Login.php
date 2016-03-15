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

		print_r($params);
		$email 		= trim($params['inputEmail']);
		$password 	= trim($params['inputPassword']);

		//TODO login functionality
	}
}