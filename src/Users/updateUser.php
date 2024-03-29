<?php
function remove_two_factor($id_user) {
    if(update_two_factor_verification($id_user, 'delete')) {
        return true;
    }

    return false;
}

function update_two_factor_verification($id_user, $two_factor_verification) {
    if(update_user($id_user, '', '', '', '', '', '', '', '', '', '', $two_factor_verification)) {
        return true;
    }

    return false;
}

function update_password($id_user, $password) {
    if(update_user($id_user, '', '', '', '', '', '', '', '', $password, '', '')) {
        return true;
    }

    return false;
}

// used for email/phone code verification and web3 wallets login
function update_nonce($id_user) {
    if(update_user($id_user, '', '', '', '', '', '', '', '', '', generate_not_secure_random_numbers(6), '')) {
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
                        $phone_number = '',
                        $password = '',
                        $nonce = '',
                        $two_factor_verification = '',
                        $permission = '',
                        $referred_by = '') {
                            
    global $db, $user;

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
        $username = strtolower($username); 
        if(get_user_by_username($username) && get_user_by_username($username)['id_user']!=$id_user) {
            return false;
        }
        $array[] = array('column' => 'username', 'value' => $username);
    }
    if($email!='') {
        $email = strtolower($email); 
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
    if($phone_number!='') {
        $phone_number = clean_phone_number($phone_number);
        if(get_user_by_phone_number($phone_number) && get_user_by_phone_number($phone_number)['id_user']!=$id_user) {
            return false;
        }
        $array[] = array('column' => 'phone_number', 'value' => $phone_number);
    }
    if($password!='') {
        $password = $user->encryption->generate_user_password($password);
        $array[] = array('column' => 'password', 'value' => $password);
    }
    if($nonce!='') {
        $nonce = $nonce.'|'.time();
        $nonce = $user->encryption->encrypt($nonce);
        $array[] = array('column' => 'nonce', 'value' => $nonce);
    }
    if($two_factor_verification!='') {
        if($two_factor_verification=='delete') {
            $two_factor_verification = '';
        }
        else {
            $two_factor_verification = $user->encryption->encrypt($two_factor_verification);
        }
        $array[] = array('column' => 'two_factor_verification', 'value' => $two_factor_verification);
    }
    if($permission!='') {
        $array[] = array('column' => 'permission', 'value' => $permission);
    }
    if($referred_by!='') {
        $array[] = array('column' => 'referred_by', 'value' => $referred_by);
    }
    $array[] = array('column' => 'id_user', 'value' => $id_user);

    if(update_mysql_data($db, 'users', '', $array)) {
        $record = array(  
                    "id_user=$id_user", 
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
        new_record('Update user', $record);
        return true;
    }

    return false;
}
?>