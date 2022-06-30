<?php
class HttpURI {
    private $full_uri;
    private $uri;
    private $user;

    public function __construct() {
        global $user;

        $this->full_uri = $_SERVER['REQUEST_URI'];
        $this->uri = $this->full_uri;
        $this->user = $user;

        if (substr_count($this->uri, "?") > 0) {
            $pieces = explode("?", $this->uri);
            $this->uri = $pieces[0];
        }
    }

    public function match_uri($uri) {
        if($this->compare_uri($uri, false)) {
            return true;
        }
        return false;
    }

    public function flexible_uri($uri) {
        if($this->compare_uri($uri, true)) {
            return true;
        }
        return false;
    }

    public function user_logout() {
        $this->user->logout();
        header('Location: /');
    }

    public function no_user_logged_in() {
        if($this->user->is_logged_in()) {
            if(isset($_GET['redirrect'])) {
                header('Location: '.$this->get_domain_url.$_GET['redirrect']);
            }
            else {
                header('Location: /');
            }
        }
    }

    public function need_user_logged_in() {
        if(!$this->user->is_logged_in()) {
            header('Location: /login?redirrect='.$this->full_uri);
        }
        elseif(isset($_GET['redirrect']) && $this->user->is_logged_in()) {
            header('Location: '.$this->get_domain_url.$_GET['redirrect']);
        }
    }

    public function get_full_uri() {
        return $this->get_domain_url().'/'.$this->full_uri;
    }

    public function get_uri() {
        return $this->uri;
    }

    public function get_domain_url() {
	    $url = $this->base_url(TRUE);
	    $url = substr($url, 0, -1);

	    return $url;
    }

    public function get_domain_no_http_url() {
        $url = $this->base_url(NULL, NULL, TRUE)['host'];

	    return $url;
    }

    private function compare_uri($uri, $remainder_left) {
        $request = str_replace($uri, '', $this->uri);

        if(substr_count($this->get_uri(), $uri) > 0) {
            if(!$remainder_left && $request!='') {
                return false;
            }
            return true;
        }
        return false;
    }
    /**
     * Get the base URL
     *
     * base_url() will produce something like: http://domain.com/admin/users/
     * base_url(TRUE) will produce something like: http://domain.com/
     * base_url(TRUE, TRUE); || echo base_url(NULL, TRUE), will produce something like: http://domain.com/admin/
     * base_url(NULL, NULL, TRUE) will produce something like:
     *		array(3) {
     *			["scheme"] => string(4) "http"
     * 			["host"] => string(12) "domain.com"
     *			["path"] => string(35) "/admin/users/"
     *		}
     */
    private function base_url($atRoot = FALSE, $atCore = FALSE, $parse = FALSE) {
        if (isset($_SERVER['HTTP_HOST'])) {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = $_SERVER['HTTP_HOST'];
            $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

            $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), -1, PREG_SPLIT_NO_EMPTY);
            $core = $core[0];

            $tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
            $end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
            $base_url = sprintf( $tmplt, $http, $hostname, $end );
        }
        else {
            $base_url = 'http://localhost/';
        }

        if ($parse) {
            $base_url = parse_url($base_url);
            if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
        }

        return $base_url;
    }
}
?>