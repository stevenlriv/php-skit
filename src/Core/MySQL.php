<?php
// Primary Mysql database connection
$db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE, MYSQL_PORT);
$db->set_charset('utf8mb4');

if($db->connect_errno) { 
    die('Error while connecting to database: '.$db->connect_error);
}

// Secondary Mysql database connection
if(!empty(MYSQL_HOST_SECONDARY) && !empty(MYSQL_USER_SECONDARY) && !empty(MYSQL_PASSWORD_SECONDARY) && !empty(MYSQL_DATABASE_SECONDARY) && !empty(MYSQL_PORT_SECONDARY)) {
    $db_secondary = new mysqli(MYSQL_HOST_SECONDARY, MYSQL_USER_SECONDARY, MYSQL_PASSWORD_SECONDARY, MYSQL_DATABASE_SECONDARY, MYSQL_PORT_SECONDARY);
    $db_secondary->set_charset('utf8mb4');

    if($db_secondary->connect_errno) { 
        die('Error while connecting to database: '.$db_secondary->connect_error);
    }
}
?>