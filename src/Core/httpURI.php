<?php
$http_uri = $_SERVER['REQUEST_URI'];

if (substr_count($request, "?") > 0) {
    $pieces = explode("?", $request);
    $http_uri = $pieces[0];
}
?>