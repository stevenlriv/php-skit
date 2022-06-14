<?php
define ( 'CORE', true );
if(!isset($_SESSION)) { session_start(); }

require './src/Core/debug.php';
require './src/vendor/autoload.php';

require './config/general.php';
require './config/privateKeys.php';
require './config/database.php';
require './config/SMTP.php';
require './config/Twilio.php';
require './config/DigitalOcean.php';
require './config/Web3.php';

require './src/Core/privateKeys.php';
require './src/Core/MySQL.php';
require './src/Classes/encryption.php';
require './src/Classes/cache.php';

require './src/MySQL/insert.php';
require './src/MySQL/select.php';
require './src/MySQL/update.php';
require './src/MySQL/delete.php';

require './src/Functions/getIPRequester.php';
require './src/Functions/htmlCompress.php';
require './src/Functions/randomString.php';

require './src/Cookies/newCookie.php';
require './src/Cookies/getCookie.php';
require './src/Cookies/deleteCookie.php';

require './src/Classes/date.php';
require './src/Classes/httpURI.php';
require './src/Classes/pagination.php';
require './src/Classes/alertMessages.php';
require './src/Classes/SEO.php';
require './src/Classes/formCache.php';
require './src/Classes/files.php';
require './src/Classes/QR.php';
require './src/Classes/OTP.php';
require './src/Classes/restAPI.php';

require './src/Records/newRecord.php';
require './src/Records/getRecord.php';
require './src/Records/updateRecord.php';
require './src/Records/deleteRecord.php';

require './src/Config/newConfig.php';
require './src/Config/getConfig.php';
require './src/Config/updateConfig.php';
require './src/Config/deleteConfig.php';

require './src/Forms/sanitation.php';
require './src/Forms/validation.php';

require './src/Emails/standardTemplate.php';
require './src/Emails/sendEmail.php';
require './src/Emails/sendEmailLoginCode.php';
require './src/Emails/sendEmailPasswordReset.php';
require './src/Emails/sendEmailCron.php';

require './src/TextMessages/sendText.php';
require './src/TextMessages/sendTextLoginCode.php';

require './src/ExternalAPICalls/getJson.php';
require './src/ExternalAPICalls/getHtmlElement.php';

require './src/Web3/address.php';
require './src/Web3/ChainLink.php';
require './src/Web3/decimals.php';
require './src/Web3/ethereumSmartContract.php';

require './src/Users/newUser.php';
require './src/Users/getUser.php';
require './src/Users/updateUser.php';

require './src/UsersMetadata/newUsersMetadata.php';
require './src/UsersMetadata/getUsersMetadata.php';
require './src/UsersMetadata/updateUsersMetadata.php';
require './src/UsersMetadata/deleteUsersMetadata.php';

require './src/Cron/newCron.php';
require './src/Cron/getCron.php';
require './src/Cron/updateCron.php';

require './src/Classes/user.php';
require './src/Classes/cron.php';
require './src/Core/classes.php';
?>