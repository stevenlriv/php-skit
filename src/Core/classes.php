<?php
$date = new Date();
$user = new User();
$http = new HttpURI();
$api = new RestAPI();
$jwt = new SkitJWT();
$form_cache = new FormCache();
$alert_messages = new AlertMessages();
$SEO = new SEO();
$file = new Files(DO_KEY, DO_SECRETS, DO_REGION, DO_ENDPOINT, DO_BUCKET, DO_CLIENT_URL);
?>