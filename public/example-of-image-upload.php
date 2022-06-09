<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/src/Core/required.php';
require './public/actions/imageUpload.php';
require './public/templates/alertMessages.php';
?>
<a href="/"><< Go Back To Homepage</a> <br /><br />

Example of image upload! <br /><br />

<?php
$alert_messages->print();
?>

<?php $form_cache->start_form('POST', 'imageUpload', 'enctype="multipart/form-data"'); ?>
    <div>
        <label>Select image</label>
        <?php $form_cache->print_input('file', 'file_data'); ?>
    </div>

    <br />

    <?php $form_cache->print_button('Upload image!'); ?>
<?php $form_cache->end_form($alert_messages->is_success()); ?>