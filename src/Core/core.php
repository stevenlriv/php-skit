<?php
define ( 'CORE', true );

require './src/Core/debug.php';
require './src/vendor/autoload.php';

require './config/general.php';
require './src/Core/config.php';

require './src/Cache/cache.php';
require './src/Core/MySQL.php';
require './src/Core/privateKeys.php';

require './src/Encryption/encryption.php';
require './src/Encryption/random.php';

require './src/MySQL/insert.php';
require './src/MySQL/select.php';
require './src/MySQL/update.php';
require './src/MySQL/delete.php';

require './src/Cookies/newCookie.php';
require './src/Cookies/getCookie.php';
require './src/Cookies/deleteCookie.php';

require './src/Date/date.php';

require './src/HTTP/httpURI.php';
require './src/HTTP/RestAPI.php';
require './src/HTTP/MySQLRestAPI.php';
require './src/HTTP/JWT.php';
require './src/HTTP/SEO.php';

require './src/Records/getIPRequester.php';
require './src/Records/newRecord.php';
require './src/Records/getRecord.php';
require './src/Records/updateRecord.php';
require './src/Records/deleteRecord.php';

require './src/Config/newConfig.php';
require './src/Config/getConfig.php';
require './src/Config/updateConfig.php';
require './src/Config/deleteConfig.php';

require './src/Forms/alertMessages.php';
require './src/Forms/formCache.php';
require './src/Forms/sanitation.php';
require './src/Forms/validation.php';

require './src/Emails/standardTemplate.php';
require './src/Emails/sendEmail.php';
require './src/Emails/sendEmailLoginCode.php';
require './src/Emails/sendEmailPasswordReset.php';
require './src/Emails/sendEmailCron.php';

require './src/Phone/sendTextMessages.php';
require './src/Phone/sendTextLoginCode.php';

require './src/ExternalAPICalls/getJson.php';
require './src/ExternalAPICalls/getHtmlElement.php';

require './src/Web3/address.php';
require './src/Web3/ChainLink.php';
require './src/Web3/decimals.php';
require './src/Web3/ethereumSmartContract.php';

require './src/Users/QR.php';
require './src/Users/OTP.php';
require './src/Users/user.php';
require './src/Users/newUser.php';
require './src/Users/getUser.php';
require './src/Users/updateUser.php';

require './src/UsersMetadata/newUsersMetadata.php';
require './src/UsersMetadata/getUsersMetadata.php';
require './src/UsersMetadata/updateUsersMetadata.php';
require './src/UsersMetadata/deleteUsersMetadata.php';

require './src/Cron/cron.php';
require './src/Cron/newCron.php';
require './src/Cron/getCron.php';
require './src/Cron/updateCron.php';

require './src/PublicHelper/pagination.php';
require './src/PublicHelper/htmlCompress.php';

require './src/Files/files.php';

require './src/Core/classes.php';
?>