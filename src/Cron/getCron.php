<?php
function get_cron_by_name($value, $memcached_expiration = '') {
    return get_cron('name', $value, $memcached_expiration);
}

function get_cron($column, $value, $memcached_expiration = '') {
    $array = array(
        0 => array('column' => $column, 'condition' => 'AND', 'command' => '=', 'value' => $value)
    );

    return get_all_crons('', 'LIMIT 1', $array, $memcached_expiration);
}

function get_all_crons($type = 'all', $extra = '', $query = '', $memcached_expiration = '') {
    global $use_db_secondary;

    $use_db_secondary = true;
    return select_mysql_data('crons', $type, $extra, $query, $memcached_expiration);
}
?>