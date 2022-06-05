<?php
function delete_record($id_record) {
    $array = array(
        0 => array('column' => 'id_record', 'condition' => 'AND', 'command' => '=', 'value' => $id_record)
    );

    if(delete_mysql_data('records', '', $array)) {
        return true;
    }

    return false;
}
?>