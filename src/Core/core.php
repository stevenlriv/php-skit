<?php
define ( 'CORE', true );

require './config/debug.php';
if( DEBUG ) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if (file_exists('./config/_debugEnviromentVariables.php')) {
        require './config/_debugEnviromentVariables.php';
    }
}

require './src/vendor/autoload.php';

require './config/privateKeys.php';
require './config/database.php';

require './src/Core/MySQL.php';
require './src/Core/privateKeys.php';
require './src/Core/httpURI.php';
require './src/Core/alertMessages.php';

if ( version_compare(PHP_VERSION, '8.0.0') <= 0 ) {
    die('To run this code we need at least PHP version 8.0.0');
}

if ( !isset($_SESSION) ) { session_start(); }
?>