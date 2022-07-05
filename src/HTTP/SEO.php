<?php
class SEO {
    private $site_name;
    private $site_url;
    private $http_uri;
    private $canonical_url;

    private $title;
    private $description;
    private $extra_title;
    private $imageURL;
    private $http;

    public function __construct() {
        $this->http = new HttpURI();
        
        $this->site_name = SITE_NAME;
        $this->site_url = $this->http->get_domain_url();
        $this->http_uri = $this->http->get_uri();

        $this->canonical_url = $this->site_url.$this->http_uri;
    }

    public function set($title = '', $description = '', $extra_title = '', $imageURL = '') {
        $this->title = $title;
        $this->description = $description;
        $this->extra_title = $extra_title;

        if($imageURL!='') {
            $this->imageURL = $imageURL;
        }
    }

    public function print_title() {
        if($this->extra_title!='') { 
            echo $this->extra_title." &bull; "; 
        }	 
        if($this->title!='') { 
            echo $this->title." &bull; "; 
        }

        echo $this->site_name;
    }

    public function print() {
        echo '<meta name="description" content="'.$this->description.'" />';

        echo '<link rel="canonical" href="'.$this->canonical_url.'" />';
    
        echo '<meta property="og:title" content="'.$this->title.'" />';
        echo '<meta property="og:type" content="website" />';
        echo '<meta property="og:description" content="'.$this->description.'" />';
        echo '<meta property="og:image" content="'.$this->imageURL.'" />';
        echo '<meta property="og:url" content="'.$this->canonical_url.'" />';
    }
}
?>