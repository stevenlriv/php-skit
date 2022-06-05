<?php
function update_config($id_config, $short_description = '', $value = '') {
    if($short_description!='') {
        $array[] = array('column' => 'short_description', 'value' => $short_description);
    }
    if($value!='') {
        $array[] = array('column' => 'value', 'value' => $value);
    }
    $array[] = array('column' => 'id_config', 'value' => $id_config);

    if(update_mysql_data('configs', '', $array)) {
        return true;
    }

    return false;
}
?>