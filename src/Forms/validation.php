<?php
function is_email($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } 
    
    return false;
}

function is_image($file_data) {
    if(empty($file_data['name'])) {
        return false;
    }

    if (exif_imagetype($file_data['tmp_name']) == IMAGETYPE_PNG || exif_imagetype($file_data['tmp_name']) == IMAGETYPE_JPEG || exif_imagetype($file_data['tmp_name']) == IMAGETYPE_GIF) {
       return true;
    }

    return false;
}
?>