<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/src/Core/required.php'; 

$cron = new Cron();

$cron->set('This loop', '/cron/firstFile.php');
$cron->set('This loop', '/cron/secondFile.php');

$cron->run('This loop', 1, true);
?>