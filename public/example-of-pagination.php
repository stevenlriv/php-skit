<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/src/Core/required.php';

$pagination = new Pagination(get_all_records('count'));
require './public/templates/pagination.php';

$query = get_all_records('all', "LIMIT {$pagination->get_offset()}, {$pagination->get_records_per_page()}");
?>
<a href="/"><< Go Back To Homepage</a> <br /><br />

Example of pagination! <br /><br />

<?php
foreach($query as $id => $value) {
    echo "{$value['id_record']} is {$value['short_description']}<br />";
}

$pagination->print(); 
?>