<?php
// Get the PHP helper library from https://twilio.com/docs/libraries/php
require_once 'vendor/autoload.php'; // Loads the library
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VoiceGrant;

// Required for all Twilio access tokens
$twilioAccountSid = 'AC877bfda2457808ef1730e26c927e08cd';
$twilioApiKey = 'SK04a9d7849410958a262310ad12df2964';
$twilioApiSecret = 'kRmbWcPOAsWYe54p07Cj6XtlLYsiIQxq';
 
$PUSH_CREDENTIAL_SID = 'CRe1791a6c31e7e7036ff849b3c561b699';
// Required for Voice grant
$outgoingApplicationSid = 'AP4b094f2ff0e05347303b34e69e8bcac0';
 
// An identifier for your app - can be anything you'd like
$identity = "john_doe";

// Create access token, which we will serialize and send to the client
$token = new AccessToken(
    $twilioAccountSid,
    $twilioApiKey,
    $twilioApiSecret,
    3600,
    $identity
);

// Create Voice grant
$voiceGrant = new VoiceGrant();
$voiceGrant->setOutgoingApplicationSid($outgoingApplicationSid);

// Optional: add to allow incoming calls
$voiceGrant->setIncomingAllow(true);

// Add grant to token
$token->addGrant($voiceGrant);

// render token to string
echo $token->toJWT();

?>
