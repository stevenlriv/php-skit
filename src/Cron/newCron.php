<?php
function new_cron($name, $next_run) {
    global $use_db_secondary;
    
    if(get_cron_by_name($name)) {
        return false;
    }

    $array = array(
        0 => array('column' => 'name', 'value' => $name),
        1 => array('column' => 'next_run', 'value' => $next_run),
    );

    $use_db_secondary = true;
    if(insert_mysql_data('crons', $array)) {
        return true;
    }

    return false;
}
?>