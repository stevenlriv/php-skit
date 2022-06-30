<?php
require './src/Core/core.php';

switch ($http->get_uri()) {
    case '/api/login' :
        echo 'login';
        break;
    case $http->flexible_uri("/api/db/") :
        $mysql_api->set_uri("/api/db/");
        $mysql_api->add_allow_tables('GET', 'records', 'records', 'id_record', 'id_record');
        $mysql_api->run();
        break;
    case $http->flexible_uri("/api/") :
        $api->set_uri("/api/");
        $api->add_allow_routes('GET', 'records', 'internal_records');
            $response['records']['GET'] = false;
            if($api->get_current_route() == 'records') {
                if($api->get_current_route_value() == 1) {
                    $response['records']['GET'] = json_encode('{"name":"John", "age":30, "car":null}');
                }
            }
            $api->set_responses('GET', 'records', $response['records']['GET']);
        $api->run();
        break;
    default :
        header('Location: /api/');
        break;
}
$db->close();
?>