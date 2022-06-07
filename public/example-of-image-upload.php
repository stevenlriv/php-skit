<?php
require_once './src/Core/_coreRequired.php';
require_once './public/actions/imageUpload.php';
require_once './public/templates/alertMessages.php';
?>
<a href="/"><< Go Back To Homepage</a> <br /><br />

Example of image upload! <br /><br />

<?php
$alert_messages->print($alert_messages_template);
?>

<?php $form_cache->start_form('POST', 'imageUpload', 'enctype="multipart/form-data"'); ?>
    <div>
        <label>Select image</label>
        <?php $form_cache->print_input('file', 'file_data'); ?>
    </div>

    <br />

    <?php $form_cache->print_button('Upload image!'); ?>
<?php $form_cache->end_form($alert_messages->is_success()); ?>