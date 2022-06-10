<?php
function new_user_with_password($email, $password) {
    if(new_user(1, '', '', '', '', $email, '', '', '', $password, '', '')) {
        return true;
    }

    return false;
}

function new_user_with_email_code($email) {
    if(new_user(1, '', '', '', '', $email, '', '', '', '', '', '')) {
        return true;
    }

    return false;
}

function new_user_with_phone_code($phone_number) {
    if(new_user(1, '', '', '', '', '', '', '', $phone_number, '', '', '')) {
        return true;
    }

    return false;
}

function new_user_with_eth_address($eth_wallet) {
    if(new_user(1, '', '', '', '', '', $eth_wallet, '', '', '', '', '')) {
        return true;
    }

    return false;
}

function new_user_with_sol_address($sol_wallet) {
    if(new_user(1, '', '', '', '', '', '', $sol_wallet, '', '', '', '')) {
        return true;
    }

    return false;
}

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

    $encryption = new Encryption(USER_KEY);

    if($phone_number!='') {
        $phone_number = clean_phone_number($phone_number);
    }

    if($email!='') {
        $email = strtolower($email); 
    }

    if($username!='') {
        $username = strtolower($username); 
    }

    if($username!='' && get_user_by_username($username)) {
        return false;
    }

    if($email!='' && !is_email($email)) {
        return false;
    }
    if($email!='' && get_user_by_email($email)) {
        return false;
    }

    if($eth_address!='' && get_user_by_eth_address($eth_address)) {
        return false;
    }

    if($sol_address!='' && get_user_by_sol_address($sol_address)) {
        return false;
    }

    if($phone_number!='' && get_user_by_phone_number($phone_number)) {
        return false;
    }

    if($password!='') {
        $password = $encryption->generate_user_password($password);
    }
    if($two_factor_verification!='') {
        $two_factor_verification = $encryption->text_encrypt($two_factor_verification);
    }

    if($nonce=='') {
        $nonce = generate_not_secure_random_numbers(6).'|'.time();
        $nonce = $encryption->text_encrypt($nonce);
    }
    
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