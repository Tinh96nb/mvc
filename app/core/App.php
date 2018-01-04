<?php

/**
* core app ex request
*/		
class App
{
	protected $controller = 'home';
	protected $method     = 'index';
	protected $params     = [];

	function __construct()
	{
		$url = $this->parseURL();
		if(file_exists( INC_ROOT. '/app/controllers/'. $url[0] .'.php')){
			$this->controller = $url[0];
			unset($url[0]);
		}
		require_once  INC_ROOT . '/app/controllers/'. $this->controller .'.php';
		
		$this->controller = new $this->controller;
		
		if (isset($url[1])) {
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);	
			}
		}

		$this->params = $url ? array_values($url) : [];
		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	public function parseURL()
	{
		if(isset($_GET['url'])) {
			/* 
			rtrim(str): loai bo ki tu // lien tiep
			filter_santize_url : bo html.
			 */
			return $url = explode('/', filter_var( rtrim($_GET['url'],'/'), FILTER_SANITIZE_URL));
		}
	}
}