<?php
use \ParagonIE\Halite\{
	KeyFactory,
	Cookie,
	HiddenString
};

function get_cookie($name) {
	$key = KeyFactory::importEncryptionKey(new HiddenString(COOKIES_KEY));
	$cookie = new Cookie($key);

	return $cookie->fetch($name);
}
?>