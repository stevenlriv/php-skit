<?php
function unix_to_date($unix, $date_format = '') {
	if($date_format == '') {
		$date_format = 'Y-m-d H:i:s';
	}
	
    return gmdate($date_format, $unix)." GMT";
}
?>