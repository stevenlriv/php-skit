<?php
function new_record($short_description, $value) {
    global $db_secondary;
    
    $json = json_encode( 
        array(
            'ip_requester' => get_ip_requester(),
            'data' => $value,
        )
    );
    $array = array(
        0 => array('column' => 'short_description', 'value' => xss_prevention($short_description)),
        1 => array('column' => 'value', 'value' => $json),
    );

    if(insert_mysql_data($db_secondary, 'records', $array)) {
        return true;
    }

    return false;
}
?>