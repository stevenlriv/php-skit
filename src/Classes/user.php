<?php
use \ParagonIE\Halite\{
	KeyFactory,
    Password,
	HiddenString,
	Symmetric\Crypto as Symmetric
};

class User {
    private $encryption_key = USER_KEY;
    private $is_logged_in = false;
    private $cookie = 'UEMP';
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

    public function __construct($id_user = '') {
        
        //with id_user you can pull any user data, it does not has to be logged in
        ///////

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

    public function get_metadata_by_key($meta_key) {
        return get_user_metadata_by_meta_key($this->id_user, $meta_key);
    }

    public function login_with_password($email, $password) {
        $encryption = new Encryption($this->encryption_key);
        $user = get_user_by_email($email);

		if($user) {
            if($encryption->validate_user_password($password, $user['password'])) {
                $encryption->rehash_password($user['id_user'], $password, $user['password']);

				if(new_cookie($this->cookie, 'password|'.$user['email'].'|'.$user['password'], time()+60*60*24*45)) {
					return true;
                }
			} 
		}

		return false;
    }

    public function login_with_email_code($email, $code) {
        $user = get_user_by_email($email);

		if($user) {
            if($this->validate_code($user['nonce'], $code)) {
                update_nonce($user['id_user']);
                $user = get_user_by_id($user['id_user']); // get new nonce for cookie
				if(new_cookie($this->cookie, 'email_code|'.$user['email'].'|'.$user['nonce'], time()+60*60*24*45)) {
					return true;
                }
			} 
		}

		return false;
    }

    public function login_with_phone_code($phone_number, $code) {
        $user = get_user_by_phone_number($phone_number);

		if($user) {
            if($this->validate_code($user['nonce'], $code)) {
                update_nonce($user['id_user']);
                $user = get_user_by_id($user['id_user']); // get new nonce for cookie
				if(new_cookie($this->cookie, 'phone_code|'.$user['phone_number'].'|'.$user['nonce'], time()+60*60*24*45)) {
					return true;
                }
			} 
		}

		return false;
    }

    public function login_with_eth_address() {
        //update_nonce($id_user)
        //get_user_by_eth_address($value)
    }

    public function login_with_sol_address() {
        //update_nonce($id_user)
        //get_user_by_sol_address($value)
    }

    public function send_email_with_code($email) {
    }

    public function send_text_message_with_code($phone_number) {
    }

    public function two_factor_verification() {
    }

    public function change_password($email, $new_password, $old_password) {
        $encryption = new Encryption($this->encryption_key);
        $user = get_user_by_email($email);

		if($user) {
            if($encryption->validate_user_password($old_password, $user['password'])) {
                if(update_password($user['id_user'], $new_password)) {
                    return true;
                }
			} 
		}

		return false;
    }

    public function reset_password() {
    }

    public function logout() {
		if($this->is_logged_in) {
			if(delete_cookie($this->cookie)) {
				return true;
			}
		}

		return false;
    }

    private function validate_code($nonce, $input) {
        $encryption = new Encryption($this->encryption_key);
        $nonce = $encryption->text_decrypt($nonce);
        $pieces = explode('|', $nonce);

        $code = $pieces[0];
        $time = $pieces[1]; 

        // code expires in 30 min
        if($input==$code && $time+60*30>time()) {
            return true;
        }

        return false;
    }
    
    private function is_user_cookie() {
		if( get_cookie ( 'USMP' ) && !empty(get_cookie( 'USMP' )) ) {
			$cookie = get_cookie ( 'USMP' );
			$pieces = explode('|', $cookie);

			$email = $pieces[0];
			$password_hash = $pieces[1];

			$q = $db->prepare ( "SELECT * FROM xvls_users WHERE email = ? LIMIT 1" );
			$q->bind_param ( 's', $email );
			$q->execute();
			$result = $q->get_result();

			while ( $o = $result->fetch_array(MYSQLI_ASSOC) ) {
				if ( $email == $o['email'] && $password_hash == $o['password'] ) {
					return $o;
				}
			}

		}
		return false;
    }
}
?>