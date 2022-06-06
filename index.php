<?php
require './src/Core/core.php';

switch ($http_uri) {
    case '/' :
        $SEO = array(
            "title" => "",
            "description" => "",
            "imageURL" => "",
            "http_uri" => $http_uri,
        );
        ob_start("ob_html_compress");
            require './public/template/header.php';
            require './public/index.php';
            require './public/template/footer.php';
        ob_end_flush();
        break;
    case '/example-of-pagination' :
        $SEO = array(
            "title" => "Example of Pagination",
            "description" => "",
            "imageURL" => "",
            "http_uri" => $http_uri,
        );
        ob_start("ob_html_compress");
            require './public/template/header.php';
            require './public/example-of-pagination.php';
            require './public/template/footer.php';
        ob_end_flush();
        break;
    default :
        $SEO = array(
            "title" => "Oops! Page not found",
            "description" => "",
            "imageURL" => "",
            "http_uri" => $http_uri,
        );
        http_response_code(404);

        new_record('New 404 Page Visit', $_SERVER['REQUEST_URI']);

        ob_start("ob_html_compress");
            require './public/404.php';
        ob_end_flush();
        break;
}

$db->close();
?>