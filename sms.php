<?php
// Get the PHP helper library from twilio.com/docs/php/install
require_once '/path/to/vendor/autoload.php'; // Loads the library
use Twilio\Rest\Client;
// Your Account Sid and Auth Token from twilio.com/user/account
$sid = "AC877bfda2457808ef1730e26c927e08cd";
$token = "f172487eed89428a85a80f8799fe122c";
$client = new Client($sid, $token);
$client->messages->create(
  "+16518675309",
  array(
    'from' => "+14388342203",
    'body' => "Tomorrow's forecast in Financial District, San Francisco is Clear.",
    'mediaUrl' => "https://climacons.herokuapp.com/clear.png",
  )
);
