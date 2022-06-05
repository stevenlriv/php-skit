<?php
/**
 * Safe SQL Update
 * 
 * $table_name is the mysql table name
 * $extra is for extra sql at the end
 * $query which could be a value or an array. Last array unit is the 'WHERE' for the update. Currently 1 is supported.
 * 		The query array is based on
 * 			- 'column' which its the database column to be queried
 * 			- 'value' which its the value to be searched
 * 
 * 		Example:
 * 			
 * 			array(
 *				0 => array('column' => 'short_description', 'value' => $short_description)
 *              1 => array('column' => 'id_record', 'value' => $id_record)
 *			)
 */
function update_mysql_data($table_name, $extra = '', $query = '') {
	global $db;

    $array_count = count($query);
	$bind_param_type = '';
	$bind_param_values = array();
	$build_query = '';

    if(is_array($query)) {
	    foreach($query as $id => $value) {
            // remove WHERE from the build_query
            if($id != $array_count-1) {
			    $build_query = $build_query." `{$value['column']}` = ?,";
            }

		    if(is_numeric($value['value'])) {
			    $bind_param_type = $bind_param_type . "i";
		    }
		    else {
			    $bind_param_type = $bind_param_type . "s";
		    }

		    array_push($bind_param_values, $value['value']);
	    }
    }
    // remove last comma
    $build_query = substr($build_query, 0, -1);
    
	$q = $db->prepare ( "UPDATE $table_name SET $build_query WHERE {$query[$array_count-1]['column']} = ? $extra" );

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
	elseif($array_count > 12) {
		die('The function delete_mysql_data() needs to be expanded to more than 12 bind_param_values');
	}

    if($q->execute()) {
        return true;
    }
    echo $q->error;
	$q->close();

	return false;
}
?>