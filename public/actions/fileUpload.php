<?php
require_once './src/Core/_coreRequired.php';
require './src/Forms/getPostVariables.php';

if(isset($submit)) {
    if(empty($_FILES['file_data']['tmp_name'])) {
        $alert_messages->new_error('Please choose an image to upload');
    }

    if(!is_image($_FILES['file_data'])) {
        $alert_messages->new_error('Please choose a supported image format (png, jpg or gif)');
    }

    if(!$alert_messages->is_error()) {
        if($files->upload_file($_FILES['file_data'], 'example-folder-name')) {
            new_record('A new image was uploaded!', 'URL is '.$files->get_last_file_url());
            $alert_messages->new_success('Well done! Your image was uploaded!');
        }
        else {
            $alert_messages->new_error('An error occured, please try again later');
        }
    }
}
?>