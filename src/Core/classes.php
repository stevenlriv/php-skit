<?php
$qr = new QR();
$otp = new OTP();
$http = new HttpURI();
$form_cache = new FormCache();
$alert_messages = new AlertMessages();
$SEO = new SEO(SITE_NAME, $http->get_domain_url(), $http->get_uri());
$file = new Files(DO_KEY, DO_SECRETS, DO_REGION, DO_ENDPOINT, DO_BUCKET, DO_CLIENT_URL);
?>