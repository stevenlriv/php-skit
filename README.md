# PHP Skit

A simple php toolset to launch almost any project in less than 24 hours.

## Installation

### For production installation

Install php-skit on an app deployment enviroment like Digital Ocean. Follow the steps below:

1. Set debug to false on "config/debug.php"

2. Generate new private keys. You can learn below how to do it.

3. Update the configuration variables that are not enviroment variables. They can be found on "config/general.php"

4. Upload MySQL.sql to your database 

5. Remove "config/_debugEnviromentVariables.php"

6. Deploy to Digital Ocean

7. Make sure to add every single enviroment variable to Digital Ocean app. Examples of all required enviroment variables can be found in "config/_debugEnviromentVariables.php".

8. Done!

### For local installation

Make sure these files are in a php server like MAMP PRO and follow the steps below:

1. Install all required libraries running "composer install" on the root server

2. Update the configuration variables that are not enviroment variables. They can be found on "config/general.php"

3. Upload MySQL.sql to your database

4. Edit all the enviroment variables on "config/_debugEnviromentVariables.php"

5. Done!

## How to generate new keys

Key generation must be done in a local server and added directly to your production app development enviroment. On the public/index.php file add the following code:

```bash
    use \ParagonIE\Halite\KeyFactory;
    use \ParagonIE\Halite\HiddenString;
    $encryptionKey = KeyFactory::generateEncryptionKey();
    $key_hex = KeyFactory::export($encryptionKey)->getString();

    echo $key_hex;
```

Then take the key generated and use it for one of them. You will need to do this 3 times, 1 for every single key needed.

## Folder/Files Structure

- config/: script configuration before deployment, most are enviroment variables
- public/: php/html files that are included from index.php and templates for some classes
- src/: all php files required for the toolset to work
- index.php: web server router

## MySQL

- users
        - status:
                - 1: active users
        - refered_by: id user that refered this person
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

- add usser IP to new records - json decode for array then encode with two arrays: data, iprequest
- PHP REST API tokens
- Cron Jobs Pub/Pub System
        - different servers submit actions to be performed by 100s of workers 
        - those actions stays there until the workers are able to perform them successfully 
        - once a worker grab one, they lock it and if they cant do it they unlock it again to let it available for other workers 
        - once the action is perform the right data is stored in the pertinent database and the metadata of the action is send to Schedulers metadata
        - buffer — currently in the buffer
        - pending—picked off by the cronjob and added to SQS to be scheduled
        - processing—picked off by a worker and currently being processed
        - analytics/sent—finished sending and is viewable in analytics (analytics checking has its own state machine)
        - Publish(topic, message)
        - Subscribe(topic) stream<message>
- Stripe
- Coinbase Commerce
- Login with Solana wallet