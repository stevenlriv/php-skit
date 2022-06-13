<?php
/**
 * Safe SQL Select
 * 
 * $table_name is the mysql table name
 * $type values are 'all' to get an array of all result and 'count' to renturn a query count, by default will return the first result
 * $extra is for extra sql that does not need to be validated, for example 'LIMIT 1' or 'ORDER BY id_interval DESC LIMIT 1'
 * $query which could be a value or an array
 * 		The query array is based on
 * 			- 'column' which its the database column to be queried
 * 			- 'condition' which can be sql AND, OR, IN, NOT IN	
 * 			- 'command' which its the type of query like '=' or 'LIKE'
 * 			- 'value' which its the value to be searched
 * 			- 'loose' whis is used to add '%value%' to create a loose match in sql
 * 
 * 		Example:
 * 			
 * 			array(
 *				0 => array('column' => 'short_description', 'condition' => 'AND', 'command' => '=', 'value' => $short_description, 'loose' => false)
 *			)
 */
function select_mysql_data($table_name, $type = '', $extra = '', $query = '', $memcached_expiration = '') {
	global $db;

	$bind_param_type = '';
	$bind_param_values = array();
	$build_query = '';

    if(is_array($query)) {
	    foreach($query  as $id => $value) {
		    // for the first one, we dont use the condition, instead we use "WHERE"
		    if($id==0) {
			    $build_query = $build_query."WHERE {$value['column']} {$value['command']} ?";
		    }
		    else {
			    $build_query = $build_query." {$value['condition']} {$value['column']} {$value['command']} ?";
		    }

		    if(is_numeric($value['value'])) {
			    $bind_param_type = $bind_param_type . "i";
		    }
		    else {
			    $bind_param_type = $bind_param_type . "s";
		    }

		    if(isset($value['loose']) && $value['loose']==true) {
			    $value['value'] = "%{$value['value']}%";
		    }

		    array_push($bind_param_values, $value['value']);
	    }
    }
	$query_string = "SELECT * FROM $table_name $build_query $extra";

	if($memcached_expiration!='') {
		$cache = new Cache('select_mysql_data', 'sm_');

		$memcache_key = $query_string.$bind_param_type.implode('_', $bind_param_values);
		$data = $cache->get($memcache_key);

		if($data) {
			return $data;
		}
	}

	$q = $db->prepare($query_string);

	$array_count = count($bind_param_values);
	if($array_count == 1) {
		$q->bind_param ( $bind_param_type, $bind_param_values[0] );	
	}
	elseif($array_count == 2) {
		$q->bind_param ( $bind_param_type, $bind_param_values[0], $bind_param_values[1] );
	}
	elseif($array_count == 3) {
		$q->bind_param ( $bind_param_type, $bind_param_values[0], $bind_param_values[1], $bind_param_values[2] );
	}
	elseif($array_count == 4) {
		$q->bind_param ( $bind_param_type, $bind_param_values[0], $bind_param_values[1], $bind_param_values[2], $bind_param_values[3] );
	}
	elseif($array_count == 5) {
		$q->bind_param ( $bind_param_type, $bind_param_values[0], $bind_param_values[1], $bind_param_values[2], $bind_param_values[3], $bind_param_values[4] );
	}
	elseif($array_count == 6) {
		$q->bind_param ( $bind_param_type, $bind_param_values[0], $bind_param_values[1], $bind_param_values[2], $bind_param_values[3], $bind_param_values[4], $bind_param_values[5] );
	}
	elseif($array_count == 7) {
		$q->bind_param ( $bind_param_type, $bind_param_values[0], $bind_param_values[1], $bind_param_values[2], $bind_param_values[3], $bind_param_values[4], $bind_param_values[5], $bind_param_values[6] );
	}
	elseif($array_count == 8) {
		$q->bind_param ( $bind_param_type, $bind_param_values[0], $bind_param_values[1], $bind_param_values[2], $bind_param_values[3], $bind_param_values[4], $bind_param_values[5], $bind_param_values[6], $bind_param_values[7] );
	}
	elseif($array_count == 9) {
		$q->bind_param ( $bind_param_type, $bind_param_values[0], $bind_param_values[1], $bind_param_values[2], $bind_param_values[3], $bind_param_values[4], $bind_param_values[5], $bind_param_values[6], $bind_param_values[7], $bind_param_values[8] );
	}
	elseif($array_count == 10) {
		$q->bind_param ( $bind_param_type, $bind_param_values[0], $bind_param_values[1], $bind_param_values[2], $bind_param_values[3], $bind_param_values[4], $bind_param_values[5], $bind_param_values[6], $bind_param_values[7], $bind_param_values[8], $bind_param_values[9]  );
	}
	elseif($array_count == 11) {
		$q->bind_param ( $bind_param_type, $bind_param_values[0], $bind_param_values[1], $bind_param_values[2], $bind_param_values[3], $bind_param_values[4], $bind_param_values[5], $bind_param_values[6], $bind_param_values[7], $bind_param_values[8], $bind_param_values[9], $bind_param_values[10]  );
	}
	elseif($array_count == 12) {
		$q->bind_param ( $bind_param_type, $bind_param_values[0], $bind_param_values[1], $bind_param_values[2], $bind_param_values[3], $bind_param_values[4], $bind_param_values[5], $bind_param_values[6], $bind_param_values[7], $bind_param_values[8], $bind_param_values[9], $bind_param_values[10], $bind_param_values[11]  );
	}
	elseif($array_count == 13) {
		$q->bind_param ( $bind_param_type, $bind_param_values[0], $bind_param_values[1], $bind_param_values[2], $bind_param_values[3], $bind_param_values[4], $bind_param_values[5], $bind_param_values[6], $bind_param_values[7], $bind_param_values[8], $bind_param_values[9], $bind_param_values[10], $bind_param_values[11], $bind_param_values[12]  );
	}
	elseif($array_count == 14) {
		$q->bind_param ( $bind_param_type, $bind_param_values[0], $bind_param_values[1], $bind_param_values[2], $bind_param_values[3], $bind_param_values[4], $bind_param_values[5], $bind_param_values[6], $bind_param_values[7], $bind_param_values[8], $bind_param_values[9], $bind_param_values[10], $bind_param_values[11], $bind_param_values[12], $bind_param_values[13]  );
	}
	elseif($array_count == 15) {
		$q->bind_param ( $bind_param_type, $bind_param_values[0], $bind_param_values[1], $bind_param_values[2], $bind_param_values[3], $bind_param_values[4], $bind_param_values[5], $bind_param_values[6], $bind_param_values[7], $bind_param_values[8], $bind_param_values[9], $bind_param_values[10], $bind_param_values[11], $bind_param_values[12], $bind_param_values[13], $bind_param_values[14]  );
	}
	elseif($array_count == 16) {
		$q->bind_param ( $bind_param_type, $bind_param_values[0], $bind_param_values[1], $bind_param_values[2], $bind_param_values[3], $bind_param_values[4], $bind_param_values[5], $bind_param_values[6], $bind_param_values[7], $bind_param_values[8], $bind_param_values[9], $bind_param_values[10], $bind_param_values[11], $bind_param_values[12], $bind_param_values[13], $bind_param_values[14], $bind_param_values[15]  );
	}
	elseif($array_count == 17) {
		$q->bind_param ( $bind_param_type, $bind_param_values[0], $bind_param_values[1], $bind_param_values[2], $bind_param_values[3], $bind_param_values[4], $bind_param_values[5], $bind_param_values[6], $bind_param_values[7], $bind_param_values[8], $bind_param_values[9], $bind_param_values[10], $bind_param_values[11], $bind_param_values[12], $bind_param_values[13], $bind_param_values[14], $bind_param_values[15], $bind_param_values[16]  );
	}
	elseif($array_count == 18) {
		$q->bind_param ( $bind_param_type, $bind_param_values[0], $bind_param_values[1], $bind_param_values[2], $bind_param_values[3], $bind_param_values[4], $bind_param_values[5], $bind_param_values[6], $bind_param_values[7], $bind_param_values[8], $bind_param_values[9], $bind_param_values[10], $bind_param_values[11], $bind_param_values[12], $bind_param_values[13], $bind_param_values[14], $bind_param_values[15], $bind_param_values[16], $bind_param_values[17]  );
	}
	elseif($array_count == 19) {
		$q->bind_param ( $bind_param_type, $bind_param_values[0], $bind_param_values[1], $bind_param_values[2], $bind_param_values[3], $bind_param_values[4], $bind_param_values[5], $bind_param_values[6], $bind_param_values[7], $bind_param_values[8], $bind_param_values[9], $bind_param_values[10], $bind_param_values[11], $bind_param_values[12], $bind_param_values[13], $bind_param_values[14], $bind_param_values[15], $bind_param_values[16], $bind_param_values[17], $bind_param_values[18]  );
	}
	elseif($array_count == 20) {
		$q->bind_param ( $bind_param_type, $bind_param_values[0], $bind_param_values[1], $bind_param_values[2], $bind_param_values[3], $bind_param_values[4], $bind_param_values[5], $bind_param_values[6], $bind_param_values[7], $bind_param_values[8], $bind_param_values[9], $bind_param_values[10], $bind_param_values[11], $bind_param_values[12], $bind_param_values[13], $bind_param_values[14], $bind_param_values[15], $bind_param_values[16], $bind_param_values[17], $bind_param_values[18], $bind_param_values[19]  );
	}
	elseif($array_count > 20) {
		die('The function select_mysql_data() needs to be expanded to more than 20 bind_param_values');
	}

	$q->execute();
	$result = $q->get_result();

	$sql_data = '';
    if($type=='all') {
        $sql_data = $result->fetch_all(MYSQLI_ASSOC);
    }
    elseif($type=='count') {
		$sql_data = $result->num_rows;
	}
    else {
        $sql_data = $result->fetch_array(MYSQLI_ASSOC);
    }

	if($sql_data && $sql_data!='') {
		if($memcached_expiration!='') {
			$cache->set($memcache_key, $sql_data, $memcached_expiration);
		}
		return $sql_data;
	}
	$q->close();

	return false;
}
?>