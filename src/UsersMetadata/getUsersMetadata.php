<?php
function get_user_metadata_value_by_meta_key($id_user, $meta_key, $memcached_expiration = '') {
    $array = get_user_metadata_by_meta_key($id_user, $meta_key, $memcached_expiration);
    if(is_array($array)) {
        return $array['meta_value'];
    }

    return false;
}
function get_user_metadata_by_meta_key($id_user, $meta_key, $memcached_expiration = '') {
    $array = array(
        0 => array('column' => 'id_user', 'condition' => 'AND', 'command' => '=', 'value' => $id_user),
        1 => array('column' => 'meta_key', 'condition' => 'AND', 'command' => '=', 'value' => $meta_key)
    );

    return get_all_users_metadata('', '', $array, $memcached_expiration);
}

function get_all_metadata_by_id_user($value, $memcached_expiration = '') {
    $array = array(
        0 => array('column' => 'id_user', 'condition' => 'AND', 'command' => '=', 'value' => $value)
    );

    return get_all_users_metadata('all', '', $array, $memcached_expiration);
}

function get_all_users_metadata($type = 'all', $extra = '', $query = '', $memcached_expiration = '') {
    global $db;

    return select_mysql_data($db, 'users_meta', $type, $extra, $query, $memcached_expiration);
}
?>