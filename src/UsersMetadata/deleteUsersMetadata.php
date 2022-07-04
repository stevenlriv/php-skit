<?php
function delete_users_metadata_by_meta_key($meta_key, $id_user) {
    $array = array(
        0 => array('column' => 'meta_key', 'condition' => 'AND', 'command' => '=', 'value' => $meta_key),
        1 => array('column' => 'id_user', 'condition' => 'AND', 'command' => '=', 'value' => $id_user)
    );

    if(delete_users_metadata($array)) {
        return true;
    }

    return false;
}

function delete_users_metadata_by_id_meta($id_meta, $id_user) {
    $array = array(
        0 => array('column' => 'id_meta', 'condition' => 'AND', 'command' => '=', 'value' => $id_meta),
        1 => array('column' => 'id_user', 'condition' => 'AND', 'command' => '=', 'value' => $id_user)
    );

    if(delete_users_metadata($array)) {
        return true;
    }

    return false;
}

function delete_users_metadata_by_id_user($id_user) {
    $array = array(
        0 => array('column' => 'id_user', 'condition' => 'AND', 'command' => '=', 'value' => $id_user)
    );

    if(delete_users_metadata($array)) {
        return true;
    }

    return false;
}

function delete_users_metadata_by_id($id_meta) {
    $array = array(
        0 => array('column' => 'id_meta', 'condition' => 'AND', 'command' => '=', 'value' => $id_meta)
    );

    if(delete_users_metadata($array)) {
        return true;
    }

    return false;
}

function delete_users_metadata($array) {
    global $db;

    if(delete_mysql_data($db, 'users_meta', '', $array)) {
        return true;
    }
    
    return false;
}
?>