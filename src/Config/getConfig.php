<?php
function get_config_by_key($value, $memcached_expiration = '') {
    return get_record('config_key', $value, $memcached_expiration);
}

function get_config_by_id($value, $memcached_expiration = '') {
    return get_record('id_config', $value, $memcached_expiration);
}

function get_config($column, $value, $memcached_expiration = '') {
    $array = array(
        0 => array('column' => $column, 'condition' => 'AND', 'command' => '=', 'value' => $value)
    );

    return get_all_configs('', 'LIMIT 1', $array, $memcached_expiration);
}

function get_all_configs($type = 'all', $extra = '', $query = '', $memcached_expiration = '') {
    global $db;

    return select_mysql_data($db, 'configs', $type, $extra, $query, $memcached_expiration);
}
?>