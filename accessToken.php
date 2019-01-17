<?php
// Get the PHP helper library from https://twilio.com/docs/libraries/php
require_once 'vendor/autoload.php'; // Loads the library
/*
 * Creates an access token with VoiceGrant using your Twilio credentials.
 */
include('./vendor/autoload.php');
include('./config.php');
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VoiceGrant;
// Required for all Twilio access tokens
$twilioAccountSid = 'AC8ab3c778835e6fca5bc5586277c422ea';
$twilioApiKey = 'SK865aec8203fe410a525b0c0e79e4129b';
$twilioApiSecret = 'QyicHIKRlURn3KuIk17oirU3wI7XxW3Q';
 
$PUSH_CREDENTIAL_SID = 'CRd3f184432e9f7a72b01f4bfad55502d6';
// Required for Voice grant
$outgoingApplicationSid = 'APbef1c183bb8a4d31ad53127da7b480ab';
 
 
// An identifier for your app - can be anything you'd like
$identity = "john_doe";
// Use identity and room from query string if provided
$identity = isset($_GET["identity"]) ? $_GET["identity"] : NULL;
if (!isset($identity) || empty($identity)) {
  $identity = isset($_POST["identity"]) ? $_POST["identity"] : "alice";
}
// Create access token, which we will serialize and send to the client
$token = new AccessToken(
    $twilioAccountSid,
    $twilioApiKey,
    $twilioApiSecret,
    3600,
    $identity
$token = new AccessToken($ACCOUNT_SID, 
                         $API_KEY, 
                         $API_KEY_SECRET, 
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
// Grant access to Video
$grant = new VoiceGrant();
$grant->setOutgoingApplicationSid($APP_SID);
$grant->setPushCredentialSid($PUSH_CREDENTIAL_SID);
$token->addGrant($grant);
echo $token->toJWT();
?>
