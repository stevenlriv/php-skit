<?php
function unix_to_date($unix, $date_format = '') {
	if($date_format == '') {
		$date_format = 'Y-m-d H:i:s';
	}

	return date($date_format, $unix)." UTC";
}

/**
 * Get a relative date
 *
 * get_relative_time($unix, 1); // 3 months ago
 * get_relative_time($unix, 2); // 3 months and 1 day ago
 * get_relative_time($unix, 3); // 3 months, 1 day and 20 hours ago
 * get_relative_time($unix, 4); // 3 months, 1 day, 20 hours and 2 minutes ago
 */
function get_relative_time($unix, $depth = 1) {
	if(!ctype_digit($unix)) {
		$unix = strtotime($unix);
	}

	$units = array(
		"year" => 31104000,
		"month" => 2592000,
		"week" => 604800,
		"day" => 86400,
		"hour" => 3600,
		"minute" => 60,
		"second" => 1
	);

	$plural = "s";
	$conjugator = " and ";
	$separator = ", ";
	$suffix1 = " ago";
	$suffix2 = " left";
	$now = "now";
	$empty = "";

	$timediff = time()-$unix;
	if($timediff == 0) return $now;
	if($depth < 1) return $empty;

	$max_depth = count($units);
	$remainder = abs($timediff);
	$output = "";
	$count_depth = 0;
	$fix_depth = true;

	foreach($units as $unit=>$value) {
		if($remainder>$value && $depth-->0) {
			if($fix_depth) {
				$max_depth -= ++$count_depth;
				if($depth>=$max_depth) $depth=$max_depth;
				$fix_depth = false;
			}
			$u = (int)($remainder/$value);
			$remainder %= $value;
			$pluralise = $u>1?$plural:$empty;
			$separate = $remainder==0||$depth==0?$empty:
						($depth==1?$conjugator:$separator);
			$output .= "{$u} {$unit}{$pluralise}{$separate}";
		}
		$count_depth++;
	}

	return $output.($timediff<0?$suffix2:$suffix1);
}
?>