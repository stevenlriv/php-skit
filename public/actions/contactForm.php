<?php
require_once './src/Core/_coreRequired.php';
require './src/Forms/postVariablesSanitation.php';

if(isset($submit)) {
    if(empty($first_name)) {
        $alert_messages->new_error('Please enter your first name');
    }

    if(empty($last_name)) {
        $alert_messages->new_error('Please enter your last name');
    }

    if(empty($email)) {
        $alert_messages->new_error('Please enter your email');
    }

    if(!is_email($email)) {
        $alert_messages->new_error('Please enter a valid email');
    }

    if(empty($message)) {
        $alert_messages->new_error('Please enter your message');
    }

    if(!$alert_messages->is_error()) {
        if(new_record('New message was recorded!', 'The message was '.$message)) {
            $alert_messages->new_success('Well done! Your message was sent!');
        }
        else {
            $alert_messages->new_error('An error occured, please try again later');
        }
    }
}
?>