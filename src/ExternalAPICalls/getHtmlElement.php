<?php
function get_html_element_by_id($website_url, $html_id) {
    $context = stream_context_create(
        array(
            "http" => array(
                "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
            )
        )
    );

    $html = file_get_contents($website_url, false, $context);
    libxml_use_internal_errors(true); // hide errors

    $page = new DOMDocument();
    $page->loadHTML($html);

    $text = $page->getElementById($html_id);
    $text = xss_prevention($text->nodeValue);

    return $text;
}
?>