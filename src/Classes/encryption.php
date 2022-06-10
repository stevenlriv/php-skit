<?php
use \ParagonIE\Halite\{
	KeyFactory,
    Password,
	HiddenString,
	Symmetric\Crypto as Symmetric
};

class Encryption {
    private $halite_key;

    public function __construct($private_key) {
        $this->halite_key = KeyFactory::importEncryptionKey(new HiddenString($private_key));
    }

    public function rehash_password($id_user, $password, $hash) {
        if(Password::needsRehash($hash, $this->halite_key, KeyFactory::INTERACTIVE)) {
            update_password($id_user, $password);
        }
    }
    
    public function validate_user_password($password, $hash) {
        if(Password::verify(new HiddenString($password), $hash, $this->halite_key)) {
            return true;
        }
    
        return false;
    }
    
    public function generate_user_password($password) {
        $password = Password::hash(new HiddenString($password), $this->halite_key);
    
        return $password;
    }
    
    public function text_encrypt($text) {
        $text = new HiddenString($text);
    
        $cipher = Symmetric::encrypt($text, $this->halite_key);
    
        return $cipher;
    }
    
    public function text_decrypt($cipher) {
        $text = Symmetric::decrypt($cipher, $this->halite_key);
    
        return $text->getString();
    }
}
?>