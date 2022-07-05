<?php
function new_user_with_password($email, $password) {
    if(new_user(1, '', '', '', '', $email, '', '', $password, '', '', 0)) {
        return true;
    }

    return false;
}

function new_user_with_email_code($email) {
    if(new_user(1, '', '', '', '', $email, '', '', '', '', '', 0)) {
        return true;
    }

    return false;
}

function new_user_with_phone_code($phone_number) {
    if(new_user(1, '', '', '', '', '', '', $phone_number, '', '', '', 0)) {
        return true;
    }

    return false;
}

function new_user_with_eth_address($eth_wallet) {
    if(new_user(1, '', '', '', '', '', $eth_wallet, '', '', '', '', 0)) {
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
                    $phone_number = '',
                    $password = '',
                    $nonce = '',
                    $two_factor_verification = '',
                    $permission = '',
                    $referred_by = 0) {
    global $db, $user;

    $cookie_referral = get_cookie($user->cookie_referral);
    if($cookie_referral) {
        $referred_by = $cookie_referral;
    }

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

    if($phone_number!='' && get_user_by_phone_number($phone_number)) {
        return false;
    }

    if($password!='') {
        $password = $user->encryption->generate_user_password($password);
    }
    if($two_factor_verification!='') {
        $two_factor_verification = $user->encryption->encrypt($two_factor_verification);
    }

    if($nonce=='') {
        $nonce = generate_not_secure_random_numbers(6).'|'.time();
        $nonce = $user->encryption->encrypt($nonce);
    }

    $array = array(
        0 => array('column' => 'status', 'value' => $status),
        1 => array('column' => 'first_name', 'value' => $first_name),
        2 => array('column' => 'last_name', 'value' => $last_name),
        3 => array('column' => 'display_name', 'value' => $display_name),
        4 => array('column' => 'username', 'value' => $username),
        5 => array('column' => 'email', 'value' => $email),
        6 => array('column' => 'eth_address', 'value' => $eth_address),
        8 => array('column' => 'phone_number', 'value' => $phone_number),
        9 => array('column' => 'password', 'value' => $password),
        10 => array('column' => 'nonce', 'value' => $nonce),
        11 => array('column' => 'two_factor_verification', 'value' => $two_factor_verification), 
        12 => array('column' => 'permission', 'value' => $permission), 
        13 => array('column' => 'referred_by', 'value' => $referred_by)
    );

    if(insert_mysql_data($db, 'users', $array)) {
        $record = array(  
                    "status=$status", 
                    "first_name=$first_name",
                    "last_name=$last_name", 
                    "display_name=$display_name",
                    "username=$username", 
                    "email=$email",
                    "eth_address=$eth_address", 
                    "phone_number=$phone_number", 
                    "password=$password",
                    "nonce=$nonce", 
                    "two_factor_verification=$two_factor_verification",
                    "permission=$permission",
                    "referred_by=$referred_by"
        );
        new_record('New user', $record);
        return true;
    }

    return false;
}
?>