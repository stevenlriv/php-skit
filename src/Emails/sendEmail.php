<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function send_email($from_name, $from_email, $to_email, $to_name, $subject, $body, $bootstrapemail_template = true, $attachment = '') {
    if(empty($from_name) or !is_email($from_email) or !is_email($to_email) or empty($to_name) or empty($subject) or empty($body)) {
        return false;
    }
    
    // Lower case emails
    $from_email = strtolower($from_email);  
    $to_email = strtolower($to_email); 
    
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
    if($bootstrapemail_template) {
        $mail->Body = bootstrapemail_template($subject, $body);
    }
    else {
        $mail->Body = $body;
    }
    $mail->AltBody = $body;

    if(!empty($attachment)) {
        $mail->addAttachment($attachment);
    }
    
    $record = array("from name=$from_name", "from email=$from_email", "to email=$to_email", "to name=$to_name", "subject=$subject", "body=$mail->AltBody");

    if($mail->send()) {
        new_record('Email Was Successfully Sent', json_encode($record));

        return true;
    }
    
    new_record('Email Failed To Be Sent', json_encode($record));
    return false;
}
?>