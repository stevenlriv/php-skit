<?php
require './src/Core/_coreRequired.php';

$pagination = new Pagination(get_all_records('count'));
$query = get_all_records('all', "LIMIT {$pagination->get_offset()}, {$pagination->get_records_per_page()}");
?>

Example of pagination! <br /><br />

<?php
foreach($query as $id => $value) {
    echo "{$value['id_record']} is {$value['short_description']}<br />";
}

$pagination->print(); 
?>