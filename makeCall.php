<?php
include('./vendor/autoload.php');
include('./config.php');

$callerId = 'client:quick_start';
$to = isset($_POST["to"]) ? $_POST["to"] : "";
if (!isset($to) || empty($to)) {
  $to = isset($_GET["to"]) ? $_GET["to"] : "";
}
$callerNumber = '14388342203';

$response = new Twilio\Twiml();
if (!isset($to) || empty($to)) {
  $response->say('Congratulations! You have just made your first call! Good bye.');
} else if (is_numeric($to)) {
  $dial = $response->dial(
    array(
  	  'callerId' => $callerNumber
  	));
  $dial->number($to);
} else {
  $dial = $response->dial(
    array(
       'callerId' => $callerId
    ));
  $dial->client($to);
}
print $response;
