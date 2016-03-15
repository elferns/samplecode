<?php

include 'private/system/constants.php';
include 'private/system/db.class.php';

/**
* @param $className
*/
function __autoload($className)
{

	if(strpos($className, '_model') === false) {
		$fileName = GLOBAL_CLASS_PATH . ucfirst($className) . ".php";
	} else {
		$fileName = GLOBAL_MODEL_PATH . ucfirst($className) . ".php";
	}
	include($fileName);

}

class App
{

	/**
	 * App constructor.
	 */
	public function __construct()
	{
		//TODO
	}

	/**
	 * load the class
     */
	public static function load()
	{

		$outType = 'HTML';

		if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])
			&& strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

			header('content-type: application/json; charset=utf-8');
			header("access-control-allow-origin: *");
			$outType = 'JSON';
			if (is_array($_POST)){
				foreach ($_POST as $k=>$v) {
					if ($this->_isJsonString($v)) {
						$_POST[ $k ] = json_decode( $v, true );
					}
				}
			}
		}

		// params to get the class name and function name
		$queryParams = (isset($_GET['xQ']) && !empty($_GET['xQ'])) ? $_GET['xQ'] : "";
		if($queryParams){
			$queryParams 	= explode("/", $queryParams);
			$controller 	= $queryParams[0];
			$action 		= (empty($queryParams[1])) ? DEFAULT_FUNCTION : $queryParams[1];
		}else{
			$controller 	= DEFAULT_CONTROLLER;
			$action 		= DEFAULT_FUNCTION;
		}

		$classObj 	= new $controller($controller, $action, $queryParams);
		$params 	= array_merge($_GET, $_POST);

		if ((int)method_exists($controller, $action)) {
			$returnStr = call_user_func_array(array($classObj, $action), array($params));
		}else{
			$returnStr = "Page not found";
		}

		echo $returnStr;
	}

	/**
	 * @param $str
	 * @return bool
	 */
	function _isJsonString($str)
	{
		try {
			$jObject = json_decode($str);
		} catch(Exception $e) {
			return false;
		}
		return (is_object($jObject)) ? true : false;
	}

}