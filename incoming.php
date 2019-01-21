<?php
/*
 * Creates an endpoint that plays back a greeting.
 */
include('./vendor/autoload.php');
include('./config.php');
$response = new Twilio\Twiml();
$response->say('You have received your first inbound call.');
print $response;
