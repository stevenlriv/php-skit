<?php
require './src/Core/core.php';

switch ($http->get_uri()) {
    case '/' :
        echo generate_not_secure_random_numbers(10).'<br /><br />';
        break;
    case $http->flexible_uri("/api/v1/login") :
        $api->no_auth_needed();
        $api->set_uri("/api/v1/login");
            // '/api/v1/logins/password'
            $api->add_allow_routes('POST', 'password', 'internal_password');
            $api->set_messages('POST', 'password', '[response]', 'Failed to log in');
            if($api->get_current_route() == 'password') {
                if(!empty($_POST['email']) && !empty($_POST['password']) && $user->login_with_password($_POST['email'], $_POST['password'])) {
                    $api->set_responses('POST', 'password', $jwt->encode('by_password', $user->email, $user->password_hash));
                }
            }
            // '/api/v1/logins/phone'
            $api->add_allow_routes('POST', 'phone', 'internal_phone');
            $api->set_messages('POST', 'phone', 'Login code was sent', 'Failed to send code');
            if($api->get_current_route() == 'phone') {
                if(!empty($_POST['phone']) && $user->send_text_message_with_code($_POST['phone'])) {
                    $api->set_responses('POST', 'phone', true);
                }
            }
            // '/api/v1/logins/phone_verify'
            $api->add_allow_routes('POST', 'phone_verify', 'internal_phone_verify');
            $api->set_messages('POST', 'phone_verify', '[response]', 'Failed to log in');
            if($api->get_current_route() == 'phone_verify') {
                if(!empty($_POST['phone']) && !empty($_POST['code']) && $user->login_with_phone_code($_POST['phone'], $_POST['code'])) {
                    $api->set_responses('POST', 'phone_verify', $jwt->encode('by_phone_code', $user->phone_number, $user->nonce));
                }
            }
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
            if($api->get_current_route() == 'records') {
                if($api->get_current_route_value() == 1) {
                    $api->set_responses('GET', 'records', json_encode('{"name":"John", "age":30, "car":null}'));
                }
            }
        $api->run();
        break;
    default :
        header('Location: /api/v1/');
        break;
}
$db->close();
?>