<?php
// Get the PHP helper library from https://twilio.com/docs/libraries/php
require_once './vendor/autoload.php'; // Loads the library
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VoiceGrant;

// Required for all Twilio access tokens
$twilioAccountSid = 'AC877bfda2457808ef1730e26c927e08cd';
$twilioApiKey = 'SKd06e37ab01f0c855ffa85ab6d0cccbc7';
$twilioApiSecret = '3XwEC81PIpBtRkvpdTKusgWlSTfkofd4';

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
aler
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
