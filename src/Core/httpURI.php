<?php
$http_uri = $_SERVER['REQUEST_URI'];

if (substr_count($http_uri, "?") > 0) {
    $pieces = explode("?", $http_uri);
    $http_uri = $pieces[0];
}
?>