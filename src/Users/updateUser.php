<?php
function update_password($id_user, $password) {
    if(update_user($id_user, '', '', '', '', '', '', '', '', '', $password, '', '')) {
        return true;
    }

    return false;
}

// used for email/phone code verification and web3 wallets login
function update_nonce($id_user) {
    if(update_user($id_user, '', '', '', '', '', '', '', '', '', '', generate_not_secure_random_numbers(6), '')) {
        return true;
    }

    return false;
}

function update_user(   $id_user = '',
                        $status = '', 
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
    if($status!='') {
        $array[] = array('column' => 'status', 'value' => $status);
    }
    if($first_name!='') {
        $array[] = array('column' => 'first_name', 'value' => $first_name);
    }
    if($last_name!='') {
        $array[] = array('column' => 'last_name', 'value' => $last_name);
    }
    if($display_name!='') {
        $array[] = array('column' => 'display_name', 'value' => $display_name);
    }
    if($username!='') {
        if(get_user_by_username($username) && get_user_by_username($username)['id_user']!=$id_user) {
            return false;
        }
        $array[] = array('column' => 'username', 'value' => $username);
    }
    if($email!='') {
        if(!is_email($email)) {
            return false;
        }
        if(get_user_by_email($email) && get_user_by_email($email)['id_user']!=$id_user) {
            return false;
        }
        $array[] = array('column' => 'email', 'value' => $email);
    }
    if($eth_address!='') {
        if(get_user_by_eth_address($eth_address) && get_user_by_eth_address($eth_address)['id_user']!=$id_user) {
            return false;
        }
        $array[] = array('column' => 'eth_address', 'value' => $eth_address);
    }
    if($sol_address!='') {
        if(get_user_by_sol_address($sol_address) && get_user_by_sol_address($sol_address)['id_user']!=$id_user) {
            return false;
        }
        $array[] = array('column' => 'sol_address', 'value' => $sol_address);
    }
    if($phone_number!='') {
        if(get_user_by_phone_number($phone_number) && get_user_by_phone_number($phone_number)['id_user']!=$id_user) {
            return false;
        }
        $array[] = array('column' => 'phone_number', 'value' => $phone_number);
    }
    if($password!='') {
        $password = generate_user_password($password);
        $array[] = array('column' => 'password', 'value' => $password);
    }
    if($nonce!='') {
        $nonce = $nonce.'|'.time();
        $nonce = text_encryption($nonce, USER_KEY);
        $array[] = array('column' => 'nonce', 'value' => $nonce);
    }
    if($two_factor_verification!='') {
        $two_factor_verification = text_encryption($two_factor_verification, USER_KEY);
        $array[] = array('column' => 'two_factor_verification', 'value' => $two_factor_verification);
    }
    $array[] = array('column' => 'id_user', 'value' => $id_user);

    if(update_mysql_data('users', '', $array)) {
        return true;
    }

    return false;
}
?>