<?php
/**
* 
*/
class Controller
{
	/*
	 * Load file model
	 */
	public function model($model)
	{
		require_once INC_ROOT .'/app/models/'. $model .'.php';
		return new $model();
	}
	/*
	 * Load file helper
	 */
	public function helper($helper)
	{
		require_once INC_ROOT . '/app/libs/'. $helper .'_Helper.php';
		return new $helper;
	}
	/*
	 * Load file view
	 */
	public function view($view, $datas = [], $require = true)
	{
		if( $require ){
			require_once INC_ROOT .'/app/views/partials/header.php';
			require_once INC_ROOT .'/app/views/'. $view .'.php';
		} else {
			require_once INC_ROOT .'/app/views/'. $view .'.php';
		}
	}
}