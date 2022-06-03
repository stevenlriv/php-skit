<?php
require './src/Core/core.php';

switch ($http_uri) {
    case '/' :
        $seo = array(
            "title" => "",
            "description" => "",
            "http_uri" => $http_uri,
        );
        ob_start("ob_html_compress");
            // home content
            echo 'home /';
        ob_end_flush();
        break;
    case '' :
        $seo = array(
            "title" => "",
            "description" => "",
            "http_uri" => $http_uri,
        );
        ob_start("ob_html_compress");
            // home content
            echo 'home no /';
        ob_end_flush();
        break;
    case '/logout' :
        // user logout functions here

        header('Location: /');
        break;
    default :
        http_response_code(404);
        $seo = "404";

        ob_start("ob_html_compress");
            require './public/404.php';
        ob_end_flush();
        break;
}

$db->close();
?>