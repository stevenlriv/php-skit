<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/src/Core/required.php'; 

use \ParagonIE\Halite\KeyFactory;
use \ParagonIE\Halite\HiddenString;

$encryptionKey_1 = KeyFactory::generateEncryptionKey();
$key_hex_1 = KeyFactory::export($encryptionKey_1)->getString();

$encryptionKey_2 = KeyFactory::generateEncryptionKey();
$key_hex_2 = KeyFactory::export($encryptionKey_2)->getString();

$encryptionKey_3 = KeyFactory::generateEncryptionKey();
$key_hex_3 = KeyFactory::export($encryptionKey_3)->getString();

echo "Key 1: ".$key_hex_1."<br /><br /><br />";
echo "Key 2: ".$key_hex_2."<br /><br /><br />";
echo "Key 3: ".$key_hex_3."<br /><br /><br />";
?>