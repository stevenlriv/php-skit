<?php
$db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE, MYSQL_PORT);
$db->set_charset('utf8mb4');

if($db->connect_errno) { 
    die('Error while connecting to database: '.$db->connect_error);
}
?>