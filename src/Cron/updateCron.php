<?php
function update_cron($name, $next_run) {
    $array[] = array('column' => 'next_run', 'value' => $next_run);
    $array[] = array('column' => 'name', 'value' => $name);

    if(update_mysql_data('crons', '', $array)) {
        $record = array("name=$name", "next_run=$next_run");
        new_record('Update cron', $record);
        return true;
    }

    return false;
}
?>