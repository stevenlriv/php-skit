<?php
function get_config($id_config) {
    $array = array(
        0 => array('column' => 'id_config', 'condition' => 'AND', 'command' => '=', 'value' => $id_config)
    );

    return get_all_configs('', 'LIMIT 1', $array);
}

function get_all_configs($type = 'all', $extra = '', $query = '') {
    return select_mysql_data('configs', $type, $extra, $query);
}
?>