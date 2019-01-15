<?php
/*
 * Makes a call to the specified client using the Twilio REST API.
 */
include('./vendor/autoload.php');
include('./config.php');

$identity = 'alice';
$callerNumber = '19786205652';
$callerId = 'client:quick_start';
$to = isset($_GET["to"]) ? $_GET["to"] : "";
if (!isset($to) || empty($to)) {
  $to = isset($POST["to"]) ? $_POST["to"] : "";
}
$ACCOUNT_SID = 'AC8ab3c778835e6fca5bc5586277c422ea';
$API_KEY = 'SK865aec8203fe410a525b0c0e79e4129b';
$API_KEY_SECRET = 'QyicHIKRlURn3KuIk17oirU3wI7XxW3Q';
//$PUSH_CREDENTIAL_SID = 'CRe1791a6c31e7e7036ff849b3c561b699';

$client = new Twilio\Rest\Client($API_KEY, $API_KEY_SECRET, $ACCOUNT_SID);

$call = NULL;
if (!isset($to) || empty($to)) {
  $call = $client->calls->create(
    'client:alice', // Call this number
    $callerId,      // From a valid Twilio number
    array(
      'url' => 'https://calldilly.herokuapp.com/incoming.php'
    )
  );
} else if (is_numeric($to)) {
  $call = $client->calls->create(
    $to,           // Call this number
    $callerNumber, // From a valid Twilio number
    array(
      'url' => 'https://calldilly.herokuapp.com/incoming.php'
    )
  );
} else {
  $call = $client->calls->create(
    'client:'.$to, // Call this number
    $callerId,     // From a valid Twilio number
    array(
      'url' => 'https://calldilly.herokuapp.com/incoming.php'
    )
  );
}

print $call.sid;
