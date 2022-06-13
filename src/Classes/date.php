<?php
date_default_timezone_set('Etc/UTC');

class Date {
	public $current_time;
    private $format = 'Y-m-d H:i:s';
    private $timezone = 'UTC';

    public function __construct() {
		$date = new DateTime();
		$this->current_time = $date->getTimestamp();
    }

    public function get_from_unix($unix, $date_format = '') {
	    if(!ctype_digit($unix)) {
		    $unix = strtotime($unix);
	    }
		
        if($date_format!='') {
            $this->format = $date_format;
        }

        return date($this->format, $unix).' '.$this->timezone;
    }

    // @ return the dates from "00:00" to "00:00 AM/PM"
    public function get_readable_time($time) {
        $time = date("g:i a", strtotime($time));

        return $time;
    }

    // @ return the dates from "m/d/yyyy" to "Month Day of Year"
    public function get_readable_date($date, $type = '') {
        $date = new DateTime($date);

        if($type == 'year') {
            $date = $date->format('M').' '.$date->format('d').' of '.$date->format('Y');
        }
        elseif($type == 'month') {
            $date = $date->format('M').' '.$date->format('d');
        }
        else {
            $date = $date->format('d');
        }
    
        return $date;
    }

    /**
     * Get a relative date
     *
     * $depth = 1 // 3 months ago
     * $depth = 2 // 3 months and 1 day ago
     * $depth = 3 // 3 months, 1 day and 20 hours ago
     * $depth = 4 // 3 months, 1 day, 20 hours and 2 minutes ago
     */
    public function get_relative_time($unix, $depth = 1) {
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
}
?>