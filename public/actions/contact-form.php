<?php
require_once './src/Core/_coreRequired.php';
require './src/Forms/postVariablesSanitation.php';

if(isset($submit)) {
    $alert_messages['success'] = 'Yes!!';
    $alert_messages['error'] = 'No!!';
}
?>