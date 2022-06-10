<?php
use Twilio\Rest\Client;

function send_text_message($to_number, $from_number, $body) {
    $sid = TWILIO_SID;
    $token = TWILIO_TOKEN;

    $client = new Client($sid, $token);

    if($client->messages->create( $to_number,
        [
            // A Twilio phone number you purchased at twilio.com/console
            'from' => $from_number,
            'body' => $body
        ]
    )) {
        return true;
    }

    return false;
}
?>