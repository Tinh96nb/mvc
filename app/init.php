<?php
define('INC_ROOT', dirname(__DIR__));

// Require composer autoloader
require_once INC_ROOT . '/vendor/autoload.php';
// Require Session
require_once INC_ROOT . '/app/libs/Session.php';

// require core files
require_once INC_ROOT . '/app/core/App.php';
// Require Controller main
require_once INC_ROOT . '/app/core/Controller.php';
// Require database component
require_once INC_ROOT . '/app/database.php';

//Root URL 
define('HTTP_ROOT',
    'http://'.$_SERVER['HTTP_HOST'].
    str_replace(
        $_SERVER['DOCUMENT_ROOT'],
        '',
        str_replace('\\', '/', INC_ROOT).'/public'
    )
);