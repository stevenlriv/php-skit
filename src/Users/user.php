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
    private $cookie_referral = 'USRF';
    private $cookie_expiration = 60*60*24*45;
    private $array;
    private $encryption;

    public $id_user;
    public $status;
    public $first_name;
    public $last_name;
    public $display_name;
    public $username;
    public $email;
    public $eth_address;
    public $phone_number;
    public $password_hash;
    public $nonce;
    public $two_factor_verification;
    public $permission;
    public $referred_by;
    public $date;

    public function __construct($id_user = '') {
        $this->encryption = new Encryption($this->encryption_key);

        // Lets check if the user is already logged in
        $this->is_user_cookie();

        // If not logged in, and the url is an email + token
        if(!$this->is_logged_in && isset($_GET['email']) && isset($_GET['token'])) {
            $encryption = new Encryption(GENERAL_KEY);
            $nonce = $encryption->decrypt($_GET['token']);
            $pieces = $this->get_nonce($nonce);
            $code = $pieces[0];

            $this->login_with_email_code($_GET['email'], $code);
        }

        // Lets set up a referrer cookie
        if(!$this->is_logged_in && isset($_GET['referrer'])) {
            $user = get_user_by_referral($_GET['referrer']);

            if($user) {
                if(!get_cookie($this->cookie_referral)) {
                    new_record('Visitor referred by user', $user['id_user']);
                    new_cookie($this->cookie_referral, $user['id_user'], time()+$this->cookie_expiration);
                }
            }
        }
    }

    public function is_logged_in() {
        if($this->is_logged_in) {
            return true;
        }

        return false;
    }

    public function get_some_name() {
        if($this->display_name) {
            $name = $this->display_name;
        }
        elseif($this->first_name) {
            $name = $this->first_name;
        }
        elseif($this->last_name) {
            $name = $this->last_name;
        }
        elseif($this->username) {
            $name = $this->username;
        }
        else {
            $name = 'puzzle';
        }

        return $name;
    }

    public function get_metadata_by_key($meta_key) {
        return get_user_metadata_by_meta_key($this->id_user, $meta_key);
    }

    public function login_with_password($email, $password) {
        $user = get_user_by_email($email);

		if($user) {
            if($this->encryption->validate_user_password($password, $user['password'])) {
                $this->encryption->rehash_password($user['id_user'], $password, $user['password']);

				if(new_cookie($this->cookie, 'by_password|'.$user['email'].'|'.$user['password'], time()+$this->cookie_expiration)) {
                    new_record('User login with password', $user['id_user']);
                    $this->login_house_keeping($user);

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
				if(new_cookie($this->cookie, 'by_email_code|'.$user['email'].'|'.$user['nonce'], time()+$this->cookie_expiration)) {
                    new_record('User login with email and code', $user['id_user']);
                    $this->login_house_keeping($user);

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
				if(new_cookie($this->cookie, 'by_phone_code|'.$user['phone_number'].'|'.$user['nonce'], time()+$this->cookie_expiration)) {
                    new_record('User login with phone and code', $user['id_user']);
                    $this->login_house_keeping($user);

					return true;
                }
			} 
		}

		return false;
    }

    public function login_with_eth_address($eth_address, $signature) {
        $user = get_user_by_eth_address($eth_address);

		if($user) {
            $pieces = $this->get_nonce($user['nonce']);
            $code = $pieces[0];

            if($encryption->verify_ethereum_signature($code, $signature, $eth_address)) {
                update_nonce($user['id_user']);
                $user = get_user_by_id($user['id_user']); // get new nonce for cookie
				if(new_cookie($this->cookie, 'by_eth_address|'.$user['eth_address'].'|'.$user['nonce'], time()+$this->cookie_expiration)) {
                    new_record('User login with eth_address', $user['id_user']);
                    $this->login_house_keeping($user);

					return true;
                }
            }
		}

		return false;
    }

    public function send_email_with_code($email) {
        $user = get_user_by_email($email);

		if($user) {
            update_nonce($user['id_user']);

            $user = get_user_by_id($user['id_user']); // get new nonce to send
            $this->array = $user;
            $this->set_user_data();

            $pieces = $this->get_nonce($user['nonce']);
            $code = $pieces[0];

			if(send_email_login_code($user['email'], $this->get_some_name(), $user['nonce'], $code)) {
				return true;
            }
		}

		return false;
    }

    public function send_email_for_password_reset($email) {
        $user = get_user_by_email($email);

		if($user) {
            update_nonce($user['id_user']);

            $user = get_user_by_id($user['id_user']); // get new nonce to send
            $this->array = $user;
            $this->set_user_data();

            $pieces = $this->get_nonce($user['nonce']);
            $code = $pieces[0];

			if(send_email_password_reset($user['email'], $this->get_some_name(), $user['nonce'], $code)) {
				return true;
            }
		}

		return false;
    }

    public function send_text_message_with_code($phone_number) {
        $user = get_user_by_phone_number($phone_number);

		if($user) {
            update_nonce($user['id_user']);

            $user = get_user_by_id($user['id_user']); // get new nonce to send
            $pieces = $this->get_nonce($user['nonce']);
            $code = $pieces[0];

			if(send_text_login_code($user['phone_number'], $code)) {
				return true;
            }
		}

		return false;
    }

    public function set_two_factor_verification($id_user, $input, $secret) {
        $user = get_user_by_id($id_user);

        if($user) {
            $otp = new OTP();
            if($otp->verify($secret, $input)) {
                if(update_two_factor_verification($user['id_user'], $secret)) {
                    new_record('User set two factor verification', $user['id_user']);
                    return true;
                }
            }
        }

        return false;
    }

    public function verify_two_factor_verification($id_user, $input) {
        $user = get_user_by_id($id_user);

        if($user) {
            $otp = new OTP();
            if($otp->verify_user_login($user['two_factor_verification'], $input)) {
                return true;
            }
        }

        return false;
    }

    public function reset_password($email, $new_password, $token) {
        $user = get_user_by_email($email);

        $encryption = new Encryption(GENERAL_KEY);
        $token = $encryption->decrypt($token);

		if($user) {
            $pieces = $this->get_nonce($user['nonce']);
            $code = $pieces[0];

			if($this->validate_code($user['nonce'], $code)) {
                if(update_password($user['id_user'], $new_password)) {
                    new_record('User reset password', $user['id_user']);
				    return true;
                }
            }
		}

        return false;
    }

    public function change_password($email, $new_password, $old_password) {
        $user = get_user_by_email($email);

		if($user) {
            if($this->encryption->validate_user_password($old_password, $user['password'])) {
                if(update_password($user['id_user'], $new_password)) {
                    new_record('User change password', $user['id_user']);
                    return true;
                }
			} 
		}

		return false;
    }

    public function get_referral_code($id_user = '') {
        if($id_user == '' && $this->is_logged_in) {
            $id_user = $this->id_user;
        }

        $encryption = new Encryption(GENERAL_KEY);
        $encrypted_id_user = $encryption->encrypt($id_user);

        return $encrypted_id_user;
    }

    public function login($login_method, $login_method_id, $login_verification) {
        if($login_method=='by_password') {
            $user = get_user_by_email($login_method_id);
            $verification = $user['password'];
        }
        elseif($login_method=='by_email_code') {
            $user = get_user_by_email($login_method_id);
            $verification = $this->get_nonce($user['nonce'])[0];
            $login_verification = $this->get_nonce($login_verification)[0];
        }
        elseif($login_method=='by_phone_code') {
            $user = get_user_by_phone_number($login_method_id);
            $verification = $this->get_nonce($user['nonce'])[0];
            $login_verification = $this->get_nonce($login_verification)[0];
        }
        elseif($login_method=='by_eth_address') {
            $user = get_user_by_eth_address($login_method_id);
            $verification = $this->get_nonce($user['nonce'])[0];
            $login_verification = $this->get_nonce($login_verification)[0]; 
        }

        if($login_verification==$verification) {
            $this->login_house_keeping($user);
            return true;
        }

        return false;
    }

    public function logout() {
		if($this->is_logged_in) {
			if(delete_cookie($this->cookie)) {
                new_record('User logout', $user['id_user']);
				return true;
			}
		}

		return false;
    }

    private function login_house_keeping($user) {
        $this->array = $user;
        $this->set_user_data();
        $this->is_logged_in = true;
    }

    private function validate_code($nonce, $input) {
        $pieces = $this->get_nonce($nonce);
        $code = $pieces[0];
        $time = $pieces[1]; 

        // code expires in 30 min
        if($input==$code && $time+60*30>time()) {
            return true;
        }

        return false;
    }
    
    private function is_user_cookie() {
        $cookie = get_cookie($this->cookie);
		if($cookie) {
			$pieces = explode('|', $cookie);

			$login_method = $pieces[0];
			$login_method_id = $pieces[1];
            $login_verification = $pieces[2];

            if($this->login($login_method, $login_method_id, $login_verification)) {
                return true;
            }
		}
		return false;
    }

    private function set_user_data() {
        if(is_array($this->array)) {
            $this->id_user = $this->array['id_user'];
            $this->status = $this->array['status'];
            $this->first_name = $this->array['first_name'];
            $this->last_name = $this->array['last_name'];
            $this->display_name = $this->array['display_name'];
            $this->username = $this->array['username'];
            $this->email = $this->array['email'];
            $this->eth_address = $this->array['eth_address'];
            $this->phone_number = $this->array['phone_number'];
            $this->password_hash = $this->array['password'];
            $this->nonce = $this->array['nonce'];
            $this->two_factor_verification = $this->array['two_factor_verification'];
            $this->permission = $this->array['permission'];
            $this->referred_by = $this->array['referred_by'];
            $this->date = $this->array['date'];
        }
    }

    private function get_nonce($hash) {
        $nonce = $this->encryption->decrypt($hash);

        return explode('|', $nonce);
    }
}
?>