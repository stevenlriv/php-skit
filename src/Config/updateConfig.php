<?php
function update_config($id_config, $config_key = '', $value = '') {
    global $db;

    if($config_key!='') {
        $array[] = array('column' => 'config_key', 'value' => $config_key);
    }
    if($value!='') {
        $array[] = array('column' => 'value', 'value' => $value);
    }
    $array[] = array('column' => 'id_config', 'value' => $id_config);

    if(update_mysql_data($db, 'configs', '', $array)) {
        $record = array("id_config=$id_config", "config_key=$config_key", "value=$value");
        new_record('Update config', $record);
        return true;
    }

    return false;
}
?>