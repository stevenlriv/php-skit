<?php
use OTPHP\TOTP;

class OTP {
    private $encryption_key = USER_KEY;
    private $encryption;
    private $qr_image_base64;
    private $secret;
    private $site_name = SITE_NAME;

    public function __construct() {
        $this->encryption = new Encryption($this->encryption_key);
    }

    public function get_secret() {
        return $this->secret;
    }

    public function get_image_base64() {
        return $this->qr_image_base64;
    }

    public function verify_user_login($secret, $input) {
        $secret = $this->encryption->text_decrypt($secret);

        if($this->verify($secret, $input)) {
            return true;
        }

        return false;
    }

    public function verify($secret, $input) {
        $otp = TOTP::create($secret); 
    
        if($otp->verify($input)) {
            return true;
        }
        return false;
    }

    public function create($label) {
        $http = new HttpURI();
        $qr = new QR();
    
        $otp = TOTP::create(); 
        $this->secret = $otp->getSecret();

        $otp->setLabel($label);
        $otp->setIssuer($this->site_name);
    
        if($qr->create($otp->getProvisioningUri())) {
            $this->qr_image_base64 = $qr->get_image_base64();
            return true;
        }

        return false;
    }
}
?>