<?php
function new_cron($name, $next_run) {
    if(get_cron_by_name($name)) {
        return false;
    }

    $array = array(
        0 => array('column' => 'name', 'value' => $name),
        1 => array('column' => 'next_run', 'value' => $next_run),
    );

    if(insert_mysql_data('crons', $array)) {
        return true;
    }

    return false;
}
?>