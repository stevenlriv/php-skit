<?php
function new_users_metadata($id_user, $meta_key, $meta_value) {
    global $db;

    if(get_user_metadata_by_meta_key($id_user, $meta_key)) {
        return false;
    }

    $array = array(
        0 => array('column' => 'id_user', 'value' => $id_user),
        1 => array('column' => 'meta_key', 'value' => $meta_key),
        2 => array('column' => 'meta_value', 'value' => $meta_value),
    );

    if(insert_mysql_data($db, 'users_meta', $array)) {
        $record = array("id_user=$id_user", "meta_key=$meta_key", "meta_value=$meta_value");
        new_record('New user metadata', $record);
        return true;
    }

    return false;
}
?>