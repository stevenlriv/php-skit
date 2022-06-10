<?php
use \ParagonIE\Halite\{
	KeyFactory,
    Password,
	HiddenString,
	Symmetric\Crypto as Symmetric
};

class User {
    private $is_logged_in = false;
    private $array = array();

    public $id_user;
    public $status;
    public $first_name;
    public $last_name;
    public $display_name;
    public $username;
    public $email;
    public $eth_address;
    public $sol_address;
    public $phone_number;
    public $password;
    public $nonce;
    public $two_factor_verification;
    public $date;

    public function __construct() {
        $this->check_if_user_is_logged_in();

        if($this->is_logged_in) {
            // set all the public variables if the user is logged in
        }
    }

    public function is_logged_in() {
        if($this->is_logged_in) {
            return true;
        }

        return false;
    }

    public function get_some_name() {
        // get some type of name for the user based on the data available in the database
        // best one will be first name and or display name
        return 'Cat';
    }

    public function get_metadata() {

    }

    public function login_with_password($email, $password) {
		$email = strtolower($email);  

		if(!is_email($email)) {
		    return false;
		}
		$password = xss_prevention($password);
        $user = get_user_by_email($email);

		if($user) {
            if(validate_user_password($password, $user['password'])) {
                rehash_password($user['id_user'], $password, $user['password']);

				if(new_cookie('UEMP', 'password|'.$email.'|'.$user['password'], time()+60*60*24*45)) {
					return true;
                }
			} 
		}

		return false;
    }

    public function login_with_email_code($email, $code) {
		$email = strtolower($email);  

		if(!is_email($email)) {
		    return false;
		}
        $user = get_user_by_email($email);

		if($user) {
            if($this->validate_code($user['nonce'], $code)) {
				if(new_cookie('UEMP', 'email_code|'.$email.'|'.$user['password'], time()+60*60*24*45)) {
                    update_nonce($user['id_user']);
					return true;
                }
			} 
		}

		return false;
    }

    public function login_with_phone_code() {
        //update_nonce($id_user)
        //get_user_by_phone_number($value)
    }

    public function login_with_eth_address() {
        //update_nonce($id_user)
        //get_user_by_eth_address($value)
    }

    public function login_with_sol_address() {
        //update_nonce($id_user)
        //get_user_by_sol_address($value)
    }

    public function send_email_with_code() {

    }

    public function send_text_message_with_code() {
        
    }

    public function two_factor_verification() {

    }

    public function reset_password() {
        //update_password($id_user, $password)
    }

    public function logout() {
		if($this->is_logged_in) {
			if(delete_cookie('UEMP')) {
				return true;
			}
		}

		return false;
    }

    private function validate_code($nonce, $input) {
        $nonce = text_decryption($nonce, USER_KEY);
        $pieces = explode('|', $nonce);

        $code = $pieces[0];
        $time = $pieces[1]; 

        // code expires in 30 min
        if($input==$code && $time+60*30>time()) {
            return true;
        }

        return false;
    }
    
    private function check_if_user_is_logged_in() {
        
    }
}
?>