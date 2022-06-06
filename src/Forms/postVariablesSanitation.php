<?php
$postValues = array();
foreach($_POST as $name => $value) {
    $postValues[$name] = xss_prevention($value);
}
extract($postValues);
?>