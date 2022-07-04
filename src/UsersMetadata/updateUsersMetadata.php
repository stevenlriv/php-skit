<?php
function update_users_metadata_by_meta_key($meta_key, $id_user, $meta_value) {
    $id_meta = get_user_metadata_by_meta_key($id_user, $meta_key)['id_meta'];

    if(update_users_metadata_by_id($id_meta, $meta_value, $id_user)) {
        return true;
    }

    return false;
}

function update_users_metadata_by_id($id_meta, $meta_value, $id_user = '') {
    global $db;

    $array[] = array('column' => 'meta_value', 'value' => $meta_value);
    $array[] = array('column' => 'id_meta', 'value' => $id_meta);

    if(update_mysql_data($db, 'users_meta', '', $array)) {
        $record = array("id_user=$id_user", "meta_key=$meta_key", "meta_value=$meta_value");
        new_record('Update user metadata', $record);
        return true;
    }

    return false;
}
?>