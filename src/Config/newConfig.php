<?php
function new_config($config_key, $value) {
    global $db;

    if(get_config_by_key($config_key)) {
        return false;
    }

    $array = array(
        0 => array('column' => 'config_key', 'value' => $config_key),
        1 => array('column' => 'value', 'value' => $value),
    );

    if(insert_mysql_data($db, 'configs', $array)) {
        return true;
    }

    return false;
}
?>