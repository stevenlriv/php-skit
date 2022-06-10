<?php
function new_users_metadata($id_user, $meta_key, $meta_value) {

    if(get_user_metadata_by_meta_key($id_user, $meta_key)) {
        return false;
    }

    $array = array(
        0 => array('column' => 'id_user', 'value' => $id_user),
        1 => array('column' => 'meta_key', 'value' => $meta_key),
        2 => array('column' => 'meta_value', 'value' => $meta_value),
    );

    if(insert_mysql_data('users_meta', $array)) {
        return true;
    }

    return false;
}
?>