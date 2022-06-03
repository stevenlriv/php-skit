<?php
require '../../config/debug.php';
if( DEBUG ) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require '../../config/_debugEnviromentVariables.php';
}

require '../../config/privateKeys.php';
require '../../config/database.php';
require 'MySQL.php';
require 'privateKeys.php';

if ( version_compare(PHP_VERSION, '8.0.0') <= 0 ) {
    die('To run this code we need at least PHP version 8.0.0');
}

if ( !isset($_SESSION) ) { session_start(); }
?>