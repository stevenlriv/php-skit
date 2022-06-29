<?php
require './src/Core/core.php';

switch ($http->get_uri()) {
    case '/' :
        header('Location: /api/');
        break;
    case (substr_count($http->get_uri(), "/api/db/") > 0) :
        $mysql_api->set_uri("/api/db/");
        //$mysql_api->add_allow_tables('GET', 'records', 'records', 'id_record');
        //$mysql_api->run();
        break;
    case (substr_count($http->get_uri(), "/api/") > 0) :
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