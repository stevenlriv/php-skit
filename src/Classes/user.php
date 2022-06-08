<?php
class User {
    private $is_logged_in = false;

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
        // set all the public variables if the user is logged in using
        // check_if_user_is_logged_in()
    }

    public function is_logged_in() {
        if($this->is_logged_in) {
            return true;
        }

        return false;
    }

    public function get_metadata() {

    }

    public function new_user_with_password() {

    }

    public function new_user_with_email_code() {

    }

    public function new_user_with_phone_code() {

    }

    public function new_user_with_web3_wallet() {

    }

    public function login_with_password() {

    }

    public function login_with_email_code() {

    }

    public function login_with_phone_code() {

    }

    public function two_factor_verification() {

    }

    public function reset_password_with_email() {

    }

    public function reset_password_with_phone() {

    }

    public function logout() {
        // logout the user
    }
    
    private function check_if_user_is_logged_in() {
        
    }
}
?>