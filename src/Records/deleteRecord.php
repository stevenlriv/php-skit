<?php
function delete_record($id_record) {
    global $use_db_secondary;

    $array = array(
        0 => array('column' => 'id_record', 'condition' => 'AND', 'command' => '=', 'value' => $id_record)
    );

    $use_db_secondary = true;
    if(delete_mysql_data('records', '', $array)) {
        return true;
    }

    return false;
}
?>