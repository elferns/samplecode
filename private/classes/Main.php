<?php

/**
 * Created by PhpStorm.
 * User: elita
 * Date: 3/14/2016
 * Time: 8:29 PM
 */
class Main
{

	/**
	 * Main constructor.
     */
	function __construct()
	{
		//TODO
	}

	/**
	 * @param $fileName
	 * @param array $vars
	 * @return string
	 */
	public function loadView($fileName, $vars = array())
	{

		ob_start();
		$bufferContent = '';
		$fileName = GLOBAL_VIEW_PATH . $fileName . '.php';
			if(file_exists($fileName)){

				foreach($vars as $k=>$v){
					$$k = $v;
				}

				//Include file
				@include($fileName);
				$bufferContent = ob_get_contents();

			}
		@ob_end_clean();
		return $bufferContent;

	}

	/**
	 * @param array $vars
     */
	function loadTemplate($vars = array())
	{

		$varsArr = array();
		foreach($vars as $k=>$v){
			$varsArr[$k] = $v;
		}
		echo $this->loadView('layout', $varsArr);

	}

	/**
	 * @param $url
     */
	function redirect($url='')
	{

		header('Location: '.BASE_URL.$url);
		exit;

	}
}