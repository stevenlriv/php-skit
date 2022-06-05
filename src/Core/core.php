<?php
define ( 'CORE', true );

date_default_timezone_set('Etc/UTC');

require './config/debug.php';
if( DEBUG ) {
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
require './config/emails.php';

require './src/Core/privateKeys.php';
require './src/Core/MySQL.php';
require './src/Core/httpURI.php';
require './src/Core/alertMessages.php';

require './src/Functions/baseURL.php';
require './src/Functions/dates.php';
require './src/Functions/encryption.php';
require './src/Functions/htmlCompress.php';
require './src/Functions/randomString.php';
require './src/Functions/SEO.php';
require './src/Functions/textSanitation.php';
require './src/Functions/textValidation.php';

require './src/Emails/template.php';
require './src/Emails/sendEmail.php';

require './src/MySQL/select.php';
require './src/MySQL/insert.php';
require './src/MySQL/update.php';
require './src/MySQL/delete.php';

require './src/Records/newRecord.php';
require './src/Records/updateRecord.php';
require './src/Records/deleteRecord.php';

if ( !isset($_SESSION) ) { session_start(); }
?>