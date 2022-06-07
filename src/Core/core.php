<?php
define ( 'CORE', true );

if ( !isset($_SESSION) ) { session_start(); }
date_default_timezone_set('Etc/UTC');

require './config/debug.php';
if( DEBUG == true ) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if (file_exists('./config/_debugEnviromentVariables.php')) {
        require './config/_debugEnviromentVariables.php';
    }
}

require './src/vendor/autoload.php';

require './config/site.php';
require './config/privateKeys.php';
require './config/database.php';
require './config/SMTP.php';
require './config/twilio.php';
require './config/DigitalOcean.php';

require './src/Core/privateKeys.php';
require './src/Core/MySQL.php';
require './src/Core/httpURI.php';

require './src/Functions/baseURL.php';
require './src/Functions/dates.php';
require './src/Functions/encryption.php';
require './src/Functions/htmlCompress.php';
require './src/Functions/randomString.php';
require './src/Functions/textMessage.php';

require './src/Classes/pagination.php';
require './src/Classes/alertMessages.php';
require './src/Classes/SEO.php';
require './src/Classes/formCache.php';
require './src/Classes/files.php';

require './src/Forms/sanitation.php';
require './src/Forms/validation.php';

require './src/Emails/standardTemplate.php';
require './src/Emails/sendEmail.php';

require './src/MySQL/insert.php';
require './src/MySQL/select.php';
require './src/MySQL/update.php';
require './src/MySQL/delete.php';

require './src/Records/newRecord.php';
require './src/Records/getRecord.php';
require './src/Records/updateRecord.php';
require './src/Records/deleteRecord.php';

require './src/Config/newConfig.php';
require './src/Config/getConfig.php';
require './src/Config/updateConfig.php';
require './src/Config/deleteConfig.php';

require './src/Cookies/newCookie.php';
require './src/Cookies/getCookie.php';
require './src/Cookies/deleteCookie.php';

$form_cache = new FormCache();
$alert_messages = new AlertMessages();
$files = new Files();
$SEO = new SEO(SITE_NAME, get_domain_url(), $http_uri);
?>