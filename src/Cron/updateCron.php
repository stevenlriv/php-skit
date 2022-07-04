<?php
function update_cron($name, $next_run) {
    global $use_db_secondary;

    $array[] = array('column' => 'next_run', 'value' => $next_run);
    $array[] = array('column' => 'name', 'value' => $name);

    $use_db_secondary = true;
    if(update_mysql_data('crons', '', $array)) {
        $record = array("name=$name", "next_run=$next_run");
        new_record('Update cron', $record);
        return true;
    }

    return false;
}
?>