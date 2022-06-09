<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/src/Core/required.php';

$alert_messages->set_template_color_array(
    array(
        "red" => "",
        "orange" => "",
        "green" => "",
        "blue" => ""
    )
);

$alert_messages->set_template_header('<p>');
$alert_messages->set_template_footer('</p>');
?>