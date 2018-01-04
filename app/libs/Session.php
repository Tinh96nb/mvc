<?php 

class Session
{
	private static $start = false;

	public static function start()
	{
		if( self::$start == false ){
			session_start();
			self::$start= true;
		}
	}

	public static function exists( $key ){
        return (isset($_SESSION[$key])) ? true : false;
    }

	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	public static function get($key)
	{
		if(self::exists($key))
            return $_SESSION[$key];
        return false;
	}

	public static function delete($key){
        if(self::exists($key)){
            unset($_SESSION[$key]);
        }
    }

	public static function destroy($key)
	{
		session_destroy();
	}
}