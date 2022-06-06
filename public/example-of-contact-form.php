<?php
require_once './src/Core/_coreRequired.php';
require './public/actions/contact-form.php';
?>
<a href="/"><< Go Back To Homepage</a> <br /><br />

Example of contact form! <br /><br />

<?php
show_alert_messages();
?>

<form method="POST">
    <div>
        <label>First name</label>
        <input type="text" name="first_name">
    </div>

    <br />

    <div>
        <label>Last name</label>
        <input type="text" name="last_name">
    </div>

    <br />

    <div>
        <label>Email</label>
        <input type="email" name="email">
    </div>

    <br />

    <div>
        <label>Message</label>
        <textarea name="message" rows="8"></textarea>
    </div>

    <br />

    <button type="submit" name="submit">Send Message</button>
</form>