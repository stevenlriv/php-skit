<?php
require './src/Core/core.php';

switch ($http->get_uri()) {
    case $http->flexible_uri("/api/v1/login") :
        $api->no_auth_needed();
        $api->set_uri("/api/v1/login");


            $api->add_allow_routes('POST', 'password', 'internal_password');
            $response['password']['POST'] = false;
            if($api->get_current_route() == 'password') {
                if(!empty($_POST['email']) && !empty($_POST['password']) && $user->login_with_password($_POST['email'], $_POST['password'])) {
                    $response['password']['POST'] = $jwt->encode('by_password', $user->email, $user->password_hash);
                }
            }
            $api->set_responses('POST', 'password', $response['password']['POST'], $response['password']['POST'], 'Failed to log in');
            
        $api->run();
        break;
    case '/api/v1/login/phone' :
        $api->no_auth_needed();
        $api->set_uri("/api/v1/login");


            $api->add_allow_routes('POST', 'phone', 'internal_phone');
            $response['phone']['POST'] = false;
            if($api->get_current_route() == 'phone') {
                if(!empty($_POST['phone']) && $user->send_text_message_with_code($_POST['phone'])) {
                    $response['phone']['POST'] = true;
                }
            }
            $api->set_responses('POST', 'phone', $response['phone']['POST'], 'Login code was sent', 'Failed to send code');



        $api->run();
        break;
    case $http->flexible_uri("/api/v1/db/") :
        $mysql_api->set_uri("/api/v1/db/");
            $mysql_api->add_allow_tables('GET', 'records', 'records', 'id_record', 'id_record');
        $mysql_api->run();
        break;
    case $http->flexible_uri("/api/v1/") :
        $api->set_uri("/api/v1/");


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
        header('Location: /api/v1/');
        break;
}
$db->close();
?>