<?php
function get_canonical_url($http_uri = '') {
    $url = get_domain_url();

    return $url.$http_uri;
}

function title_SEO($array) {
    if(!empty($array['extra_title'])) { 
        echo $array['extra_title']." &bull; "; 
    }	 
    if(!empty($array['title'])) { 
        echo $array['title']." &bull; "; 
    }

    echo SITE_NAME;
}

function print_SEO($array) {
    title_SEO($array);
    echo '<meta name="description" content="'.$array['description'].'">';

    echo '<link rel="canonical" href="'.get_canonical_url($array['http_uri']).'" />';

    echo '<meta property="og:title" content="'.$array['title'].'" />';
    echo '<meta property="og:type" content="website" />';
    echo '<meta property="og:description" content="'.$array['description'].'" />';
    echo '<meta property="og:image" content="'.$array['imageURL'].'" />';
    echo '<meta property="og:url" content="'.get_canonical_url($array['http_uri']).'" />';
}
?>