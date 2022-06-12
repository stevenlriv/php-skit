<?php
require './src/Core/core.php';

switch ($http->get_uri()) {
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
            require './public/actions/contactForm.php';
            require './public/templates/alertMessages.php';
            require './public/templates/header.php';
            require './public/example-of-contact-form.php';
            require './public/templates/footer.php';
        ob_end_flush();
        break;
    case '/example-of-image-upload' :
        $SEO->set('Example of Image Upload');
        ob_start("ob_html_compress");
            require './public/actions/imageUpload.php';
            require './public/templates/alertMessages.php';
            require './public/templates/header.php';
            require './public/example-of-image-upload.php';
            require './public/templates/footer.php';
        ob_end_flush();
        break;
    case '/example-of-pagination' :
        $SEO->set('Example of Pagination');
        ob_start("ob_html_compress");
            $pagination = new Pagination(get_all_records('count'));
            require './public/templates/pagination.php';
            $pagination->set_query(get_all_records('all', "LIMIT {$pagination->get_offset()}, {$pagination->get_records_per_page()}"));

            require './public/templates/header.php';
            require './public/example-of-pagination.php';
            require './public/templates/footer.php';
        ob_end_flush();
        break;
    case '/login' :
        $http->no_user_logged_in();
        $SEO->set('Login');
        ob_start("ob_html_compress");
            require './public/templates/header.php';
            require './public/example-of-login.php';
            require './public/templates/footer.php';
        ob_end_flush();
        break;
    case '/reset-password' :
        $http->no_user_logged_in();
        $SEO->set('Reset Password');
        ob_start("ob_html_compress");
            require './public/templates/header.php';
            require './public/example-of-reset-password.php';
            require './public/templates/footer.php';
        ob_end_flush();
        break;
    case '/example-of-user-page' :
        $http->need_user_logged_in();
        $SEO->set('Example of User Page');
        ob_start("ob_html_compress");
            require './public/templates/header.php';
            require './public/example-of-user-page.php';
            require './public/templates/footer.php';
        ob_end_flush();
        break;
    case '/logout' :
        $http->user_logout();
        break;
    case (substr_count($http->get_uri(), "/api/") > 0) :
        $api->add_allow_tables('GET|POST|PUT', 'usr_meta', 'users_meta', 'id_user');
        $api->run();
        break;
    default :
        http_response_code(404);
        new_record('404 Page Visit', $http->get_full_uri());

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