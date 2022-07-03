<?php
require './src/Core/core.php';

switch ($http->get_uri()) {
    case '/' :
        if(new_user_with_phone_code('+17875183880')) {
            echo 'yes';
        }
        else {
            echo 'no';
        }
        break;
    case $http->flexible_uri("/api/v1/logins") :
        $api->no_auth_needed();
        $api->set_uri("/api/v1/logins");

            // '/api/v1/logins/password'
            $response = false;
            $api->add_allow_routes('POST', 'password', 'internal_password');
            if($api->get_current_route() == 'password') {
                if(!empty($_POST['email']) && !empty($_POST['password']) && $user->login_with_password($_POST['email'], $_POST['password'])) {
                    $response = $jwt->encode('by_password', $user->email, $user->password_hash);
                }
            }
            $api->set_responses('POST', 'password', $response, $response, 'Failed to log in');
            
            // '/api/v1/logins/phone'
            $response = false;
            $api->add_allow_routes('POST', 'phone', 'internal_phone');
            if($api->get_current_route() == 'phone') {
                if(!empty($_POST['phone']) && $user->send_text_message_with_code($_POST['phone'])) {
                    $response = true;
                }
            }
            $api->set_responses('POST', 'phone', $response, 'Login code was sent', 'Failed to send code');

            // '/api/v1/logins/phone_verify'
            $response = false;
            $api->add_allow_routes('POST', 'phone_verify', 'internal_phone_verify');
            if($api->get_current_route() == 'phone_verify') {
                if(!empty($_POST['phone']) && !empty($_POST['code']) && $user->login_with_phone_code($_POST['phone'], $_POST['code'])) {
                    $response = $jwt->encode('by_phone_code', $user->phone_number, $user->nonce);
                }
            }
            $api->set_responses('POST', 'phone_verify', $response, $response, 'Failed to log in');
        $api->run();
        break;
    case $http->flexible_uri("/api/v1/db/") :
        $mysql_api->set_uri("/api/v1/db/");
            $mysql_api->add_allow_tables('GET', 'records', 'records', 'id_record', 'id_record');
        $mysql_api->run();
        break;
    case $http->flexible_uri("/api/v1/") :
        $api->set_uri("/api/v1/");
            $response = false;
            $api->add_allow_routes('GET', 'records', 'internal_records');
            if($api->get_current_route() == 'records') {
                if($api->get_current_route_value() == 1) {
                    $response = json_encode('{"name":"John", "age":30, "car":null}');
                }
            }
            $api->set_responses('GET', 'records', $response);
        $api->run();
        break;
    default :
        header('Location: /api/v1/');
        break;
}
$db->close();
?>