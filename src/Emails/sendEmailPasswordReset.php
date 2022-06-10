<?php
function send_email_password_reset($to_email, $to_name, $nonce, $code) {
    $http = new HttpURI();
    $encryption = new Encryption(GENERAL_KEY);
    $token = $encryption->text_encrypt($nonce);

    $url = $http->get_domain_url().'/reset-password?email='.$to_email.'&token='.$token;

    $subject = SITE_NAME.' Password Reset';
    $body = array(
        'content' => 'Hello '.$to_name.', <br /><br />We have received a password reset attempt. Click the button below to reset your password.',
        'content_below_button' => 'Or copy and paste this URL into a new tab of your browser:<br /><br />'.$url,
        'button_link' => $url,
        'button_text' => 'Click here to reset password',
    );
    if(send_email_default_settings($to_email, $to_name, $subject, $body)) {
        return true;
    }
    return false;
}
?>