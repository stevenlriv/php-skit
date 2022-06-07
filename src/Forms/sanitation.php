<?php
function xss_prevention($text) {
	$text = trim($text);
	$text = strip_tags($text);
	$text = htmlspecialchars($text);
	$text = htmlentities($text, ENT_QUOTES, 'UTF-8');

	return $text;
}

function dash_per_word($text) {
	$text = preg_replace('~[^\\pL0-9]+~u', '-', $text);
	$text = trim($text, "-");
	$text = iconv("utf-8", "us-ascii//TRANSLIT", $text);
	$text = strtolower($text);
	$text = preg_replace('~[^-a-z0-9]+~', '', $text);

	return $text;
}
?>