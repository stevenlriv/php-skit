<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/src/Core/required.php';
?>
<a href="/"><< Go Back To Homepage</a> <br /><br />

Example of pagination! <br /><br />

<?php
if(is_array($pagination->get_query())) {
    foreach($pagination->get_query() as $id => $value) {
        echo "{$value['id_record']} is {$value['short_description']}<br />";
    }
}

$pagination->print(); 
?>