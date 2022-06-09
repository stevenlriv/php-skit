<?php
function get_record($id_record) {
    $array = array(
        0 => array('column' => 'id_record', 'condition' => 'AND', 'command' => '=', 'value' => $id_record)
    );

    return get_all_records('', 'LIMIT 1', $array);
}

function get_all_records($type = 'all', $extra = '', $query = '') {
    return select_mysql_data('records', $type, $extra, $query);
}
?>