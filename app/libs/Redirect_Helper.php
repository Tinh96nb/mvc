<?php
/**
* 
*/
class Redirect
{
	function url($url, $permanent = false)
	{
	    header('Location: ' . $url, true, $permanent ? 301 : 302);

	    exit();
	}
}
