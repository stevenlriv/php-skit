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

if($user->verify_two_factor_verification(4, 'ss')) {
    echo 'TRUE';
}
else {
    echo 'FALSE';
}

/*
if($user->set_two_factor_verification(4, '160060', 'XS7BTLIQGJBAYU2CFQHPZPXKDO23NSLFIEV3JSLKIMDCJ3LUHVRVWBGGMN3KIC6TSRTTY65JXDKOMS6BYTEKHPKTAFCG2VLXWG4AFGA')) {
    echo 'TRUE';
}
else {
    echo 'FALSE';
}*/

/*
$otp = new OTP(); 
$otp->create('steven@neftify.com');
echo '<img src="'.$otp->get_image_uri().'" />';
echo '<br /><br />';
echo $otp->get_secret();*/

?>