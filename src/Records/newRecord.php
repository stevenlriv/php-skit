<?php
function new_record($short_description, $value) {
    $array = array(
        0 => array('column' => 'short_description', 'value' => xss_prevention($short_description)),
        1 => array('column' => 'value', 'value' => xss_prevention($value)),
    );

    if(insert_mysql_data('records', $array)) {
        return true;
    }

    return false;
}
?>