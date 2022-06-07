<?php
require './src/Core/core.php';

switch ($http_uri) {
    case '/' :
        ob_start("ob_html_compress");
            require './public/templates/header.php';
            require './public/index.php';
            require './public/templates/footer.php';
        ob_end_flush();
        break;
    case '/example-of-contact-form' :
        $SEO->set('Example of Contact Form');
        ob_start("ob_html_compress");
            require './public/templates/header.php';
            require './public/example-of-contact-form.php';
            require './public/templates/footer.php';
        ob_end_flush();
        break;
    case '/example-of-image-upload' :
        $SEO->set('Example of Image Upload');
        ob_start("ob_html_compress");
            require './public/templates/header.php';
            require './public/example-of-image-upload.php';
            require './public/templates/footer.php';
        ob_end_flush();
        break;
    case '/example-of-pagination' :
        $SEO->set('Example of Pagination');
        ob_start("ob_html_compress");
            require './public/templates/header.php';
            require './public/example-of-pagination.php';
            require './public/templates/footer.php';
        ob_end_flush();
        break;
    default :
        http_response_code(404);
        new_record('New 404 Page Visit', $_SERVER['REQUEST_URI']);

        $SEO->set('Oops! Page not found');
        ob_start("ob_html_compress");
            require './public/templates/header.php';
            require './public/404.php';
            require './public/templates/footer.php';
        ob_end_flush();
        break;
}

$db->close();
?>