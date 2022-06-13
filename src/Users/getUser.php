<?php
function get_user_by_referral($value, $memcached_expiration = '') {
    $encryption = new Encryption(GENERAL_KEY);
    $value = $encryption->text_decrypt($value);

    return get_user('id_user', $value, $memcached_expiration);
}

function get_user_by_sol_address($value, $memcached_expiration = '') {
    return get_user('sol_address', $value, $memcached_expiration);
}

function get_user_by_eth_address($value, $memcached_expiration = '') {
    return get_user('eth_address', $value, $memcached_expiration);
}
function get_user_by_username($value, $memcached_expiration = '') {
    return get_user('username', $value, $memcached_expiration);
}
function get_user_by_phone_number($value, $memcached_expiration = '') {
    return get_user('phone_number', $value, $memcached_expiration);
}

function get_user_by_email($value, $memcached_expiration = '') {
    $value = strtolower($value);
    if(!is_email($value)) {
        return false;
    }

    return get_user('email', $value, $memcached_expiration);
}

function get_user_by_id($value, $memcached_expiration = '') {
    return get_user('id_user', $value, $memcached_expiration);
}

function get_user($column, $value, $memcached_expiration = '') {
    $array = array(
        0 => array('column' => $column, 'condition' => 'AND', 'command' => '=', 'value' => $value)
    );

    return get_all_users('', 'LIMIT 1', $array, $memcached_expiration);
}

function get_all_users($type = 'all', $extra = '', $query = '', $memcached_expiration = '') {
    return select_mysql_data('users', $type, $extra, $query, $memcached_expiration);
}
?>