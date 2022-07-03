<?php
define ( 'MYSQL_HOST', getenv('MYSQL_HOST') );
define ( 'MYSQL_USER', getenv('MYSQL_USER') );
define ( 'MYSQL_PASSWORD', getenv('MYSQL_PASSWORD') );
define ( 'MYSQL_DATABASE', getenv('MYSQL_DATABASE') );
define ( 'MYSQL_PORT', getenv('MYSQL_PORT') );

define ( 'MYSQL_HOST_SECONDARY', getenv('MYSQL_HOST_SECONDARY') );
define ( 'MYSQL_USER_SECONDARY', getenv('MYSQL_USER_SECONDARY') );
define ( 'MYSQL_PASSWORD_SECONDARY', getenv('MYSQL_PASSWORD_SECONDARY') );
define ( 'MYSQL_DATABASE_SECONDARY', getenv('MYSQL_DATABASE_SECONDARY') );
define ( 'MYSQL_PORT_SECONDARY', getenv('MYSQL_PORT_SECONDARY') );

define( 'DO_KEY', getenv('DO_KEY') );
define( 'DO_SECRETS', getenv('DO_SECRETS') );
define( 'DO_REGION', getenv('DO_REGION') );
define( 'DO_ENDPOINT', getenv('DO_ENDPOINT') );
define( 'DO_BUCKET', getenv('DO_BUCKET') );
define( 'DO_CLIENT_URL', getenv('DO_CLIENT_URL') );

define( 'GENERAL_KEY', getenv('GENERAL_KEY') );
define( 'COOKIES_KEY', getenv('COOKIES_KEY') );
define( 'USER_KEY', getenv('USER_KEY') );

define( 'SMTP', getenv('SMTP') );
define( 'SMTP_TLS', getenv('SMTP_TLS') );
define( 'SMTP_HOST', getenv('SMTP_HOST') );
define( 'SMTP_USERNAME', getenv('SMTP_USERNAME') );
define( 'SMTP_PASSWORD', getenv('SMTP_PASSWORD') );
define( 'SMTP_PORT', getenv('SMTP_PORT') );

define( 'TWILIO_SID', getenv('TWILIO_SID') );
define( 'TWILIO_TOKEN', getenv('TWILIO_TOKEN') );

define( 'INFURA_KEY', getenv('INFURA_KEY') );
define( 'INFURA_NETWORK', getenv('INFURA_NETWORK') );
define( 'INFURA_ENDPOINT', getenv('INFURA_ENDPOINT') );
?>