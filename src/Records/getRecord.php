<?php
function get_record_by_id($value) {
    return get_record('id_record', $value);
}

function get_record($column, $value) {
    $array = array(
        0 => array('column' => $column, 'condition' => 'AND', 'command' => '=', 'value' => $value)
    );

    return get_all_records('', 'LIMIT 1', $array);
}

function get_all_records($type = 'all', $extra = '', $query = '') {
    return select_mysql_data('records', $type, $extra, $query);
}
?>