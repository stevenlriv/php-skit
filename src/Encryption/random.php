<?php
function generate_not_secure_random_numbers($length = 10) {
	$number = random_int('1'.str_repeat(0, $length-1), str_repeat(9, $length));
	
	return $number;
}

function generate_not_secure_random_string($length = 10) {
	$length_in_bytes = ceil($length/2);
	$random_string_in_bytes = random_bytes($length_in_bytes);

	return bin2hex($random_string_in_bytes);
}
?>