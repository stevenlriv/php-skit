<?php
$date = new Date();
$user = new User();
$http = new HttpURI();
$api = new RestAPI();
$mysql_api = new MySQLRestAPI();
$jwt = new SkitJWT();
$form_cache = new FormCache();
$alert_messages = new AlertMessages();
$SEO = new SEO(SITE_NAME, $http->get_domain_url(), $http->get_uri());
$file = new Files(DO_KEY, DO_SECRETS, DO_REGION, DO_ENDPOINT, DO_BUCKET, DO_CLIENT_URL);
?>