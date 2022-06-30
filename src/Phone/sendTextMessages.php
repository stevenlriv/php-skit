<?php
use Twilio\Rest\Client;

function send_text_default_settings($to_number, $body) {
    if(send_text_message($to_number, TWILIO_CUSTOM_PHONE_NUMBER, $body)) {
        return true;
    }
    return false;
}

function send_text_message($to_number, $from_number, $body) {
    $record = array("from number=$from_number", "to number=$to_number", "body=$body");
    
    $client = new Client(TWILIO_SID, TWILIO_TOKEN);
    if($client->messages->create( $to_number,
        [
            // A Twilio phone number you purchased at twilio.com/console
            'from' => $from_number,
            'body' => $body
        ]
    )) {
        new_record('Phone Text Sent', $record);
        return true;
    }

    new_record('Phone Text Failed To Be Sent', $record);
    return false;
}
?>