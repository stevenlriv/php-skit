<?php
require './src/Core/core.php';

switch ($http->get_uri()) {
    case '/api/login' :
        $api->set_headers('POST');

        $response = array();
        if(!empty($_POST['email']) && !empty($_POST['password']) && $user->login_with_password($_POST['email'], $_POST['password'])) {
            $response['success'] =  array(
                'status' => '200',
                'title' => 'Success',
                'detail' => $jwt->encode('by_password', $user->email, $user->password_hash)
            );
        }
        else {
            http_response_code(400);
            $response['errors'] =  array(
                'status' => '400',
                'title' => 'Failed',
                'detail' => 'Failed to log in'
            );
        }

        echo json_encode($response);
        break;
    case $http->flexible_uri("/api/db/") :
        $mysql_api->set_uri("/api/db/");
        $mysql_api->add_allow_tables('GET', 'records', 'records', 'id_record', 'id_record');
        $mysql_api->run(true);
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
        $api->run(true);
        break;
    default :
        header('Location: /api/');
        break;
}
$db->close();
?>