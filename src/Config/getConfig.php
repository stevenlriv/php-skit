<?php
function get_config($id_config) {
    $array = array(
        0 => array('column' => 'id_config', 'condition' => 'AND', 'command' => '=', 'value' => $id_config)
    );

    return select_mysql_data('configs', '', 'LIMIT 1', $array);
}

function get_all_configs() {
    return select_mysql_data('configs', 'all');
}
?>