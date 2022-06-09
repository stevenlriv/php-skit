<?php
use \ParagonIE\Halite\{
	KeyFactory,
    Password,
	HiddenString,
	Symmetric\Crypto as Symmetric
};

function generate_user_password($password) {
    $key = KeyFactory::importEncryptionKey(new HiddenString(USER_KEY));
    $password = Password::hash(new HiddenString($password), $key);

    return $password;
}

function text_encryption($text, $encryption_key = '') {
    if($encryption_key == '') {
        $encryption_key = GENERAL_KEY;
    }

    $key = KeyFactory::importEncryptionKey(new HiddenString($encryption_key));
    $text = new HiddenString($text);

    $cipher = Symmetric::encrypt($text, $key);

    return $cipher;
}

function text_decryption($cipher, $encryption_key = '') {
    if($encryption_key == '') {
        $encryption_key = GENERAL_KEY;
    }

    $key = KeyFactory::importEncryptionKey(new HiddenString($encryption_key));
    $text = Symmetric::decrypt($cipher, $key);

    return $text->getString();
}
?>