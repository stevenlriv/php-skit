<?php
function get_config_by_id($value) {
    return get_record('id_config', $value);
}

function get_config($column, $value) {
    $array = array(
        0 => array('column' => $column, 'condition' => 'AND', 'command' => '=', 'value' => $value)
    );

    return get_all_configs('', 'LIMIT 1', $array);
}

function get_all_configs($type = 'all', $extra = '', $query = '') {
    return select_mysql_data('configs', $type, $extra, $query);
}
?>