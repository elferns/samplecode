<?php

/**
 * Created by PhpStorm.
 * User: elita
 * Date: 3/14/2016
 * Time: 8:29 PM
 */
class Login_model
{

	/**
	 * Login constructor.
     */
	function __construct()
	{
		$db = new db();
		$this->db = db::$lnObj;
	}


	/**
	 * @param $params
	 *
	 * @return bool
	 */
	public function checkUser($params)
	{

		$resObj = $this->db->prepare(
			"SELECT id
             FROM users
             WHERE email = :email AND password = :password"
		);
		$resObj->bindValue(':email', $params['email'], PDO::PARAM_STR);
		$resObj->bindValue(':password', sha1($params['password']), PDO::PARAM_STR);
		$resObj->execute();
		$result = $resObj->rowCount();

		if($result > 0){
			return true;
		}

		return false;
	}
}