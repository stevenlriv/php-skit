<?php
function get_user_metadata_value_by_meta_key($id_user, $meta_key) {
    $array = get_user_metadata_by_meta_key($id_user, $meta_key);
    if(is_array($array)) {
        return $array['meta_value'];
    }

    return false;
}
function get_user_metadata_by_meta_key($id_user, $meta_key) {
    $array = array(
        0 => array('column' => 'id_user', 'condition' => 'AND', 'command' => '=', 'value' => $id_user),
        1 => array('column' => 'meta_key', 'condition' => 'AND', 'command' => '=', 'value' => $meta_key)
    );

    return get_all_users_metadata('', '', $array);
}

function get_all_metadata_by_id_user($value) {
    $array = array(
        0 => array('column' => 'id_user', 'condition' => 'AND', 'command' => '=', 'value' => $value)
    );

    return get_all_users_metadata('all', '', $array);
}

function get_all_users_metadata($type = 'all', $extra = '', $query = '') {
    return select_mysql_data('users_meta', $type, $extra, $query);
}
?>