<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/src/Core/required.php'; 
?>
Home Page!
<br />
<br />
<a href="/example-of-pagination">Go to Example of Pagination</a>
<br />
<br />
<a href="/example-of-contact-form">Go to Example of Contact Form</a>
<br />
<br />
<a href="/example-of-image-upload">Go to Example of Single Image Upload</a>
<br />
<br />
<a href="/example-of-user-page">Go to Example of User Page (if not logged in, will take you back to home page)</a>
<br />
<br />
<?php

//update_nonce(3);


$nonce = get_user_by_id(3)['nonce'];
$nonce = text_decryption($nonce, USER_KEY);
$pieces = explode('|', $nonce);
//print_r($pieces);

if($user->login_with_email_code('lolo@gmail.com', '146372')) {
    echo 'true';
}
else {
    echo 'false';
}


?>