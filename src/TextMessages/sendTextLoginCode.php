<?php
function send_text_login_code($to_number, $code) {
    $body = 'Your '.SITE_NAME.' code is: '.$code.'. Don\'t share this code with anyone.';
    if(send_text_default_settings($to_number, $body)) {
        return true;
    }
    return false;
}
?>