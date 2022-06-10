<?php
function get_user_by_sol_address($value) {
    return get_user('sol_address', $value);
}

function get_user_by_eth_address($value) {
    return get_user('eth_address', $value);
}
function get_user_by_username($value) {
    return get_user('username', $value);
}
function get_user_by_phone_number($value) {
    return get_user('phone_number', $value);
}

function get_user_by_email($value) {
    $value = strtolower($value);
    if(!is_email($value)) {
        return false;
    }

    return get_user('email', $value);
}

function get_user_by_id($value) {
    return get_user('id_user', $value);
}

function get_user($column, $value) {
    $array = array(
        0 => array('column' => $column, 'condition' => 'AND', 'command' => '=', 'value' => $value)
    );

    return get_all_users('', 'LIMIT 1', $array);
}

function get_all_users($type = 'all', $extra = '', $query = '') {
    return select_mysql_data('users', $type, $extra, $query);
}
?>