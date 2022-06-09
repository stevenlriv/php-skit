<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/src/Core/required.php';
require './public/actions/contactForm.php';
require './public/templates/alertMessages.php';
?>
<a href="/"><< Go Back To Homepage</a> <br /><br />

Example of contact form! <br /><br />

<?php
$alert_messages->print();
?>

<?php $form_cache->start_form('POST', 'contactForm'); ?>
    <div>
        <label>First name*</label>
        <?php $form_cache->print_input('text', 'first_name'); ?>
    </div>

    <br />

    <div>
        <label>Last name*</label>
        <?php $form_cache->print_input('text', 'last_name'); ?>
    </div>

    <br />

    <div>
        <label>Email*</label>
        <?php $form_cache->print_input('email', 'email'); ?>
    </div>

    <br />

    <div>
        <label>Message*</label>
        <?php $form_cache->print_input('textarea', 'message', 'rows="8" cols="50"'); ?>
    </div>

    <br />

    <?php $form_cache->print_button('Send Message'); ?>
<?php $form_cache->end_form($alert_messages->is_success()); ?>