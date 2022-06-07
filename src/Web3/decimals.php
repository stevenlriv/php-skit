<?php
function wei_to_eth($value) {
	return get_number_from_decimals(18, $value);
}

function get_number_from_decimals($decimal_amount, $value) {
	$dividend = (string) $value;
	$divisor = (string) '1'. str_repeat('0', $decimal_amount);

	return bcdiv($value, $divisor, $decimal_amount);
}
?>