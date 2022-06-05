<?php
function new_config($short_description, $value) {
    $array = array(
        0 => array('column' => 'short_description', 'value' => $short_description),
        1 => array('column' => 'value', 'value' => $value),
    );

    if(insert_mysql_data('configs', $array)) {
        return true;
    }

    return false;
}
?>