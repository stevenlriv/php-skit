<?php
function show_alert_messages() {
    global $alert_messages;

    if(!empty($alert_messages['error'])) {
        $color = 'red';
        $alert = $alert_messages['error'];
    }
    elseif(!empty($alert_messages['danger'])) {
        $color = 'orange';
        $alert = $alert_messages['danger'];
    }
    elseif(!empty($alert_messages['success'])) {
        $color = 'green';
        $alert = $alert_messages['success'];
    }
    elseif(!empty($alert_messages['info'])) {
        $color = 'blue';
        $alert = $alert_messages['info'];
    }

    if(!empty($alert_messages['error']) || !empty($alert_messages['danger']) || !empty($alert_messages['success']) || !empty($alert_messages['info'])) {
        echo '<p style="color:'.$color.'">'.$alert.'</p>';
    }
}






?>