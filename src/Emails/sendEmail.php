<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function send_email_default_settings($to_email, $to_name, $subject, $body) {
    if(send_email(SITE_NAME, EMAIL_REPLY_TO, $to_email, $to_name, $subject, $body)) {
        return true;
    }
    return false;
}

function send_email($from_name, $from_email, $to_email, $to_name, $subject, $body, $bootstrap_email_template = 1, $attachment = '') {
    if(empty($from_name) or !is_email($from_email) or !is_email($to_email) or empty($to_name) or empty($subject) or empty($body)) {
        return false;
    }
    
    // Lower case emails
    $from_email = strtolower($from_email);  
    $to_email = strtolower($to_email); 
    
    // Get the content from the body for non template purposes
    $content = $body;
    if(!empty($body['content'])) {
        $content = $body['content'];
    }
    
    $mail = new PHPMailer(true);
    $mail->CharSet = 'utf-8';

    if(SMTP=="true") {
        $mail->isSMTP();
        
        $mail->SMTPDebug = 0;
        $mail->Host = SMTP_HOST;
        $mail->Port = SMTP_PORT;
        
        if(SMTP_TLS=="true") {
            $mail->SMTPSecure = 'tls';
        }
        
        if(SMTP_USERNAME!='' && SMTP_PASSWORD!='') {
            $mail->SMTPAuth = true;
            $mail->Username = SMTP_USERNAME;
            $mail->Password = SMTP_PASSWORD;
        }
    }

    $mail->setFrom($from_email, $from_name);
    $mail->addAddress($to_email, $to_name);

    $mail->Subject = $subject;

    $mail->isHTML(true);
    if($bootstrap_email_template==1) {
        $mail->Body = standard_template($subject, $body);
    }
    else {
        $mail->Body = $content;
    }
    $mail->AltBody = $content;

    if(!empty($attachment)) {
        $mail->addAttachment($attachment);
    }
    
    $record = array("from name=$from_name", "from email=$from_email", "to email=$to_email", "to name=$to_name", "subject=$subject", "body=$mail->AltBody");

    if($mail->send()) {
        new_record('Email Sent', $record);
        return true;
    }
    
    new_record('Email Failed To Be Sent', $record);
    return false;
}
?>