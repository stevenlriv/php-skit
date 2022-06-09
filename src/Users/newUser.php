<?php
function new_user(  $status = 1, 
                    $first_name = '', 
                    $last_name = '', 
                    $display_name = '', 
                    $username = '', 
                    $email = '', 
                    $eth_address = '',
                    $sol_address = '',
                    $phone_number = '',
                    $password = '',
                    $nonce = '',
                    $two_factor_verification = '') {
    $array = array(
        0 => array('column' => 'status', 'value' => $status),
        1 => array('column' => 'first_name', 'value' => $first_name),
        2 => array('column' => 'last_name', 'value' => $last_name),
        3 => array('column' => 'display_name', 'value' => $display_name),
        4 => array('column' => 'username', 'value' => $username),
        5 => array('column' => 'email', 'value' => $email),
        6 => array('column' => 'eth_address', 'value' => $eth_address),
        7 => array('column' => 'sol_address', 'value' => $sol_address),
        8 => array('column' => 'phone_number', 'value' => $phone_number),
        9 => array('column' => 'password', 'value' => $password),
        10 => array('column' => 'nonce', 'value' => $nonce),
        11 => array('column' => 'two_factor_verification', 'value' => $two_factor_verification),
    );

    if(insert_mysql_data('users', $array)) {
        return true;
    }

    return false;
}
?>