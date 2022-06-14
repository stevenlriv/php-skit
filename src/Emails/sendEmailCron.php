<?php
function send_email_cron($cron_name, $body) {

    $subject = SITE_NAME.' Cron Jobs Report For "'.$cron_name.'"';
    if(send_email_default_settings(CRON_EMAIL_FOR_REPORTS, 'Admin', $subject, $body)) {
        return true;
    }
    return false;
}
?>