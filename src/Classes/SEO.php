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

    function __construct($site_name, $site_url, $http_uri, $imageURL = '') {
        $this->site_name = $site_name;
        $this->site_url = $site_url;
        $this->http_uri = $http_uri;
        $this->imageURL = $imageURL;

        $this->canonical_url = $site_url.$http_uri;
    }

    function set($title = '', $description = '', $extra_title = '', $imageURL = '') {
        $this->title = $title;
        $this->description = $description;
        $this->extra_title = $extra_title;

        if($imageURL!='') {
            $this->imageURL = $imageURL;
        }
    }

    function print_title() {
        if($this->extra_title!='') { 
            echo $this->extra_title." &bull; "; 
        }	 
        if($this->title!='') { 
            echo $this->title." &bull; "; 
        }
    }

    function print() {
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