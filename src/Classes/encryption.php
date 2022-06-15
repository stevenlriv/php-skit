<?php
use Elliptic\EC;
use kornrunner\Keccak;

use \ParagonIE\Halite\{
	KeyFactory,
    Password,
	HiddenString,
	Symmetric\Crypto as Symmetric
};

class Encryption {
    private $halite_key;

    public function __construct($private_key = GENERAL_KEY) {
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
    
    public function verify_sol_signature($message, $signature, $address) {
        //$$message = pack("c*", ...$message);
        //$address = unpack('c*', $address); //address to bytes

        if(sodium_crypto_sign_verify_detached($message, $signature, $address)) {
            return true;
        }
        
        return false;
    }

    public function verify_ethereum_signature($message, $signature, $address) {
        $msglen = strlen($message);
        $hash   = Keccak::hash("\x19Ethereum Signed Message:\n{$msglen}{$message}", 256);
        $sign   = ["r" => substr($signature, 2, 64), 
                   "s" => substr($signature, 66, 64)];
        $recid  = ord(hex2bin(substr($signature, 130, 2))) - 27; 
        if ($recid != ($recid & 1)) 
            return false;
    
        $ec = new EC('secp256k1');
        $pubkey = $ec->recoverPubKey($hash, $sign, $recid);
    
        return $address == $this->public_ethereum_key_to_address($pubkey);
    }

    private function public_ethereum_key_to_address($pubkey) {
        return "0x" . substr(Keccak::hash(substr(hex2bin($pubkey->encode("hex")), 1), 256), 24);
    }
}
?>