<?php
function delete_config($id_config) {
    $array = array(
        0 => array('column' => 'id_config', 'condition' => 'AND', 'command' => '=', 'value' => $id_config)
    );

    if(delete_mysql_data('configs', '', $array)) {
        return true;
    }

    return false;
}
?>