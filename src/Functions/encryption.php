<?php
use \ParagonIE\Halite\{
	KeyFactory,
	HiddenString,
	Symmetric\Crypto as Symmetric
};

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