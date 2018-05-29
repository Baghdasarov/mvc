<?php
    ini_set('display_errors',1);
    session_start();

    define('APPROOT', dirname(dirname(__FILE__)));
    define('URLROOT', '');
    define('SITENAME', 'MVC');

    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'root');
    define('DB_NAME', 'mvc_test');

    include_once ('helper.php');
