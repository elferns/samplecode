<?php

/**
 * Created by PhpStorm.
 * User: elita
 * Date: 3/14/2016
 * Time: 8:29 PM
 */
class db
{

	private static $lnObj;

	/**
	 * db constructor.
     */
	function __construct()
	{

		$this->software 	= 'mysql';
		$this->dbserver 	= 'localhost';
		$this->database 	= 'bookings';
		$this->dbusername 	= 'root';
		$this->dbpassword 	= '';

		$this->connectServer();

	}

	/**
	 * database connection
     */
	private function connectServer()
	{
		if (!self::$lnObj)
		{
			try
			{
				self::$lnObj = new PDO(
					$this->software.':host='.$this->dbserver.';dbname='.$this->database.';charset=utf8',
					$this->dbusername,
					$this->dbpassword
				);
				self::$lnObj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$lnObj->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				self::$lnObj->query("SET CHARACTER SET utf8");
			}
			catch (PDOException $e)
			{
				$this->connect_error();
			}
		}
	}

	/**
	 * display error message when db connection is not success
	 */
	private function connect_error()
	{
		ob_end_clean();

		header('HTTP/1.1 503 Service Temporarily Unavailable');
		header('Status: 503 Service Temporarily Unavailable');
		header('Retry-After: 600');
		echo '<h1>Server is currently down for maintenance. Please try again later.</h1>';

		exit;
	}
}