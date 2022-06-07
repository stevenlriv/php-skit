<?php
function hide_address($address) {
	$address = substr($address, 0, 6).'...'.substr ($address, -4);

	return $address;
}
?>