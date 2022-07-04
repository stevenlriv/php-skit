<?php
function delete_config_by_key($value) {
    return delete_config('config_key', $value);
}

function delete_config_by_id($value) {
    return delete_config('id_config', $value);
}

function delete_config($column, $value) {
    global $db;

    $array = array(
        0 => array('column' => $column, 'condition' => 'AND', 'command' => '=', 'value' => $value)
    );

    if(delete_mysql_data($db, 'configs', '', $array)) {
        return true;
    }

    return false;
}
?>