<?php
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

    public function login_with_password() {

    }

    public function login_with_email_code() {
        //update_nonce($id_user)
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

    public function two_factor_verification() {

    }

    public function reset_password() {
        //update_password($id_user, $password)
    }

    public function logout() {
        // logout the user
    }
    
    private function check_if_user_is_logged_in() {
        
    }
}
?>