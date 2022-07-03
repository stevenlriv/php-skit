<?php
require $_SERVER['DOCUMENT_ROOT'].'/config/debug.php';

ini_set('file_uploads', 0);
ini_set('session.cookie_secure', 1);
ini_set('session.use_trans_sid', 0);
ini_set('session.use_strict_mode', 1);
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);

if( DEBUG == true ) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    if (file_exists('./config/_debugEnviromentVariables.php')) {
        require './config/_debugEnviromentVariables.php';
    }
}
else {
    error_reporting(0); 
    ini_set('expose_php', 0);
    ini_set('log_errors', 1);
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
}
?>