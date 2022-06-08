<?php
use OTPHP\TOTP;

class OTP {
    private $qr_image_uri;
    private $secret;

    public function __construct() {
    }

    public function get_secret() {
        return $this->secret;
    }

    public function get_image_uri() {
        return $this->qr_image_uri;
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
        $otp->setIssuer(SITE_NAME);
    
        if($qr->create($otp->getProvisioningUri())) {
            $this->qr_image_uri = $qr->get_image_uri();
            return true;
        }

        return false;
    }
}
?>