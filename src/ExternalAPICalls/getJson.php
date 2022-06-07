<?php
function get_array_from_json($json) {
    $array = json_decode($json, true);

    return $array;
}

function get_array_from_json_api($api_url) {
    $json = get_json_from_api($api_url);
    $array = get_array_from_json($json);

    return $array;
}

function get_array_from_json_api_using_curl($api_url, $post_content = '') {
    $json = get_json_from_api_using_curl($api_url, $post_content = '');
    $array = get_array_from_json($json);

    return $array;
}

function get_json_from_api($api_url) {
    $json = file_get_contents($api_url);

    return $json;
}

function get_json_from_api_using_curl($api_url, $post_content = '') {
    $curl = curl_init($api_url);

    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));

    if(!empty($post_content)) {
        $post_to_api = json_encode($post_content);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_to_api);
    }

    $json_response = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    if($status!=200) {
        print("Error: call to URL $api_url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
        return false;
    }
    curl_close($curl);

    return $json_response;
}
?>