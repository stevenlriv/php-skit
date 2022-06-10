# PHP Skit

A simple php toolset to launch almost any project in less than 24 hours.

## Folder/Files Structure

- config/ script configuration before deployment. Most are enviroment variables
- public/ php/html files that are included from index.php and templates for some classes
- src/ all php files required for the toolset to work
- index.php web server router

## Installation

### For production installation

Install php-skit on an app deploment enviroment like Digital Ocean. Follow the steps below:

1. Set debug to false on "config/debug.php"

2. Generate new private keys. You can learn below how to do it.

3. Update the rest of the configuration variables that are not enviroment variables. They can be found on "config/general.php"

4. Make sure to add every single enviroment variable to that app enviroment. All required enviroment variables can be found in "config/_debugEnviromentVariables.php". On production this file will not work.

5. Upload MySQL.sql to your database & remove "config/_debugEnviromentVariables.php"

### For local installation

Make sure these files are in a php server like MAMP PRO and follow the steps below:

1. Install all required libraries running "composer install" on the root server

2. Edit all the enviroment variables on "config/_debugEnviromentVariables.php"

3. Update the rest of the configuration variables that are not enviroment variables. They can be found on "config/general.php"

4. Upload MySQL.sql to your database & remove "config/_debugEnviromentVariables.php"

## How to generate new keys

Key generation must be done in a local server and added directly to your production app development enviroment. On the public/index.php file add the following code:

```bash
    use \ParagonIE\Halite\KeyFactory;
    use \ParagonIE\Halite\HiddenString;
    $encryptionKey = KeyFactory::generateEncryptionKey();
    $key_hex = KeyFactory::export($encryptionKey)->getString();

    echo $key_hex;
```

Then take the key generated and use it for one of them. You will need to do this 3 times.

## MySQL

- users
        - status:
                - 1: active users
- users_meta: metadata for the users
        - cookies_track: used to track messages hidden showed to users
        - time_zone: users time zone
        - profile_bio
        - profile_image
        - email_verified: used to verify the user email verification on demand
        - phone_number_verified: used to get the status of the user phone verification on demand
- configs: script configuration that could be updated using an UI in the frontend
- records: records any data action in the script

## Other Tools

- Generate Favicons for your header on [RealFaviconGenerator](https://realfavicongenerator.net/)

## Next Integrations

- Referal system for users [table update]
- PHP REST API for json connections to backend like from react native
- Metrics, track clicks on links and buttons and visitors, etc
- 12 failed login 24 hour reset
- Login with Solana wallet
- Stripe
- Coinbase Commerce