<?php
require_once './src/Core/_coreRequired.php';
require_once './public/templates/pagination.php';

$pagination = new Pagination(get_all_records('count'));
$query = get_all_records('all', "LIMIT {$pagination->get_offset()}, {$pagination->get_records_per_page()}");
?>
<a href="/"><< Go Back To Homepage</a> <br /><br />

Example of pagination! <br /><br />

<?php
foreach($query as $id => $value) {
    echo "{$value['id_record']} is {$value['short_description']}<br />";
}

$pagination->print($pagination_template); 
?>