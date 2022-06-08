<?php
/*
    The script below will help you generate a key and then you can add it to your enviroment variables

    require 'src/vendor/autoload.php';

    use \ParagonIE\Halite\KeyFactory;
    use \ParagonIE\Halite\HiddenString;
    $encryptionKey = KeyFactory::generateEncryptionKey();
    $key_hex = KeyFactory::export($encryptionKey)->getString();

    echo $key_hex;
*/
if( !defined('GENERAL_KEY') || !defined('COOKIES_KEY') || !defined('USER_KEY') ) {
    die ('Keys are missing, generate them before continuing');
}
?>