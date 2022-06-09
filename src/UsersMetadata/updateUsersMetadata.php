<?php
function update_users_metadata_by_meta_key($meta_key, $id_user, $meta_value) {
    $id_meta = get_user_metadata_by_meta_key($id_user, $meta_key)['id_meta'];

    if(update_users_metadata_by_id($id_meta, $meta_value)) {
        return true;
    }

    return false;
}

function update_users_metadata_by_id($id_meta, $meta_value) {
    $array[] = array('column' => 'meta_value', 'value' => $meta_value);
    $array[] = array('column' => 'id_meta', 'value' => $id_meta);

    if(update_mysql_data('users_meta', '', $array)) {
        return true;
    }

    return false;
}
?>