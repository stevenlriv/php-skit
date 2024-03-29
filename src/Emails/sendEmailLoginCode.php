<?php
function send_email_login_code($to_email, $to_name, $nonce, $code) {
    $http = new HttpURI();
    $encryption = new Encryption();
    $token = $encryption->encrypt($nonce);

    $url = $http->get_domain_url().'/login?email='.$to_email.'&token='.$token;

    if(isset($_GET['redirrect'])) {
        $url = $url.'&redirrect='.$_GET['redirrect'];
    }

    $subject = SITE_NAME.' Login Verification (code: "'.$code.'")';
    $body = array(
        'content' => 'Hello '.$to_name.', <br /><br />We have received a login attempt with the following code:',
        'content_below_button' => 'Or copy and paste this URL into a new tab of your browser:<br /><br />'.$url,
        'card' => $code,
        'button_link' => $url,
        'button_text' => 'Click here to login',
    );
    if(send_email_default_settings($to_email, $to_name, $subject, $body)) {
        return true;
    }
    return false;
}
?>