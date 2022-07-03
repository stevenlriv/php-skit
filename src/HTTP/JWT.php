<?php
// @ https://datatracker.ietf.org/doc/html/rfc7519#section-4.1

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class SkitJWT {
    private $http;
    private $date;
    private $payload;
    private $user;
    private $encryption;
    private $expiration_in_seconds = 60*60*24*30;
    public $array_token = array();

    public function __construct() {
        $this->http = new HttpURI();
        $this->date = new Date();
        $this->user = new User();
        $this->encryption = new Encryption(USER_KEY);
    }

    public function encode($login_method, $login_method_id, $login_verification) {
        $this->payload($login_method, $login_method_id, $login_verification, $this->expiration_in_seconds);

        if($token = JWT::encode($this->payload, base64_encode(GENERAL_KEY), 'HS512')) {
            return $token;
        }
        return false;
    }

    public function is_authenticated() {
        $auth_token = '';
        if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
            $auth_token = $_SERVER['HTTP_AUTHORIZATION'];
        } elseif (isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION'])) {
            $auth_token = $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
        }

        if (!preg_match('/Bearer\s(\S+)/', $auth_token, $matches)) {
            return false;
        }
        
        // No token was able to be extracted from the authorization header
        if(empty($matches[1])) {
            return false;
        }

        try {
            $this->array_token = $this->decode($matches[1]);

            if( 
                $this->array_token['iss'] !== $this->http->get_domain_no_http_url() || 
                $this->array_token['nbf'] > time() || 
                $this->array_token['exp'] < time()
            ) {
                return false;
            }

            if($this->user->login($this->array_token['login_method'], $this->array_token['login_method_id'], $this->array_token['login_verification'])) {
                return true;
            }
        } 
        catch (Exception $e) {
            //echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        return false;
    }

    private function decode($token) {
        if($object = JWT::decode($token, new Key(base64_encode(GENERAL_KEY), 'HS512'))) {
            $array = (array) $object;
            $array['login_method'] = $this->encryption->text_decrypt($array['login_method']);
            $array['login_method_id'] = $this->encryption->text_decrypt($array['login_method_id']);
            $array['login_verification'] = $this->encryption->text_decrypt($array['login_verification']);

            return $array;
        }
        return false;
    }

    private function payload($login_method, $login_method_id, $login_verification, $expiration_in_seconds = '') {
        if($expiration_in_seconds=='') {
            $expiration_in_seconds = 60*60*24;
        }

        $this->payload = [
            'iss'  => $this->http->get_domain_no_http_url(),          
            'iat'  => time(),           
            'nbf'  => time(),   
            'exp'  => time()+$expiration_in_seconds,                          
            'login_method' => $this->encryption->text_encrypt($login_method),  
            'login_method_id' => $this->encryption->text_encrypt($login_method_id),                     
            'login_verification' => $this->encryption->text_encrypt($login_verification),          
        ];
    }
}
?>