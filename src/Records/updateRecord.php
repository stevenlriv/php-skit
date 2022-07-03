<?php
function update_record($id_record, $short_description = '', $value = '') {
    global $use_db_secondary;

    if($short_description!='') {
        $array[] = array('column' => 'short_description', 'value' => $short_description);
    }
    if($value!='') {
        $array[] = array('column' => 'value', 'value' => $value);
    }
    $array[] = array('column' => 'id_record', 'value' => $id_record);

    $use_db_secondary = true;
    if(update_mysql_data('records', '', $array)) {
        return true;
    }

    return false;
}
?>