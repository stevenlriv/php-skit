<?php
use \ParagonIE\Halite\{
	KeyFactory,
	Cookie,
	HiddenString
};

/**
 * Create a Cookie
 *
 * Notes:
 *   $expire - Expiration date (24 hours from now by default; time()+60*60*24*30 for 30 days)
 *   $path - Path to be used on ('/' is global)
 *   $domain - Domain of the cookie to be used on (blank for actual)
 *   $secure - If true only create cookies on HTTPS request
 *   $http - If true disable cookie use via JavaScript
 */
function new_cookie($name, $value, $expire = '') {
	global $http;

	$key = KeyFactory::importEncryptionKey(new HiddenString(COOKIES_KEY));
	$cookie = new Cookie($key);

	if(empty($expire)) {
	    $expire = time()+60*60*24;
	}

	$path = '/';
	$domain = $http->get_domain_no_http_url();
	$secure = true;
	$http_only = true;
        
	if($cookie->store($name, $value, $expire, $path, $domain, $secure, $http_only)) {
		return true;
	}
        
	return false;
}
?>