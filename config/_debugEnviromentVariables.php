<?php
// Primary Mysql database connection details
putenv('MYSQL_HOST=localhost');
putenv('MYSQL_USER=root');
putenv('MYSQL_PASSWORD=root');
putenv('MYSQL_DATABASE=new_db');
putenv('MYSQL_PORT=8889');

// Secondary Mysql database connection details
putenv('MYSQL_HOST_SECONDARY=localhost');
putenv('MYSQL_USER_SECONDARY=root');
putenv('MYSQL_PASSWORD_SECONDARY=root');
putenv('MYSQL_DATABASE_SECONDARY=secondary_db');
putenv('MYSQL_PORT_SECONDARY=8889');

// Send grid or any other SMTP provider
putenv('SMTP=true');
putenv('SMTP_TLS=true');
putenv('SMTP_HOST=smtp.sendgrid.net');
putenv('SMTP_USERNAME=apikey');
putenv('SMTP_PASSWORD=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');
putenv('SMTP_PORT=587');

// Your Account SID and Auth Token from twilio.com/console
putenv('TWILIO_SID=');
putenv('TWILIO_TOKEN=');

// Digital ocean spaces for images uploads or any other provider
putenv('DO_KEY=');
putenv('DO_SECRETS=');
putenv('DO_REGION=sfo3');
putenv('DO_ENDPOINT=https://sfo3.digitaloceanspaces.com');
putenv('DO_BUCKET=php-skit');
putenv('DO_CLIENT_URL=https://php-skit.sfo3.digitaloceanspaces.com');

// Infura
putenv('INFURA_KEY=');
putenv('INFURA_NETWORK=mainnet');
putenv('INFURA_ENDPOINT=');

// Private keys
putenv('GENERAL_KEY=31400400c9880e5024a72e4d079c91488aae733a1d027494ba7fec30789bb4e53291540369443cd146d72be522575d5c708e01cd3128b63243fbf2f02fa47e158fe5b40e86deb093e1e03855672383582960ac2be78442cba280884699f13a1d01fe318a');
putenv('COOKIES_KEY=31400400f6a5f89186ac17d6bd8cd2619cadee9badbf401e8bddf35131243d47e6ca5cd22c2cf7bf3c78c66d7119c0001a9680bdf62edec4bbf4161c3194bb9569ab71676c2e0dcd871a6cbdefc4d6a5aa545b42698944036ac1ae98428da7bd21bee245');
putenv('USER_KEY=314004001ef2851a4a72f31216eeadea43ac4dea1898904d1e5c9ca4c958b0849b902cf41cc641c7a416f7956db5cc062cc2f246a6b4b48cf18ef0c3d69c4f17271ac8017a2546a13c51ab667519ba1022a8c0d5811acb1e6741f53148ed395e43cedbd3');
?>