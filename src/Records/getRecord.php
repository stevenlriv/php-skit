<?php
function get_record_by_id($value, $memcached_expiration = '') {
    return get_record('id_record', $value, $memcached_expiration);
}

function get_record($column, $value, $memcached_expiration = '') {
    $array = array(
        0 => array('column' => $column, 'condition' => 'AND', 'command' => '=', 'value' => $value)
    );

    return get_all_records('', 'LIMIT 1', $array, $memcached_expiration);
}

function get_all_records($type = 'all', $extra = '', $query = '', $memcached_expiration = '') {
    global $db_secondary;

    return select_mysql_data($db_secondary, 'records', $type, $extra, $query, $memcached_expiration);
}
?>