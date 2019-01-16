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
$twilioAccountSid = 'AC3d1de74dcd2cf7937d48a2f7b3b8ddf5';
$twilioApiKey = 'SK889d08e08efb39528cbb64acbcac16d7';
$twilioApiSecret = '7EVi02Y77YUD3jbqLHZuaddczBFYvHcc';
 
$PUSH_CREDENTIAL_SID = 'CR421c2cb346639257cc36ee7fb6def11d';
// Required for Voice grant
$outgoingApplicationSid = 'APde30372c6aca4f75b4243876d6a0b9dd';
 
 
 
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
/*
 * Creates an access token with VoiceGrant using your Twilio credentials.

 * require_once 'vendor/autoload.php';
include('./vendor/autoload.php');
include('./config.php');
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VoiceGrant;
// Use identity and room from query string if provided
$identity = isset($_GET["identity"]) ? $_GET["identity"] : NULL;
if (!isset($identity) || empty($identity)) {
  $identity = isset($_POST["identity"]) ? $_POST["identity"] : "alice";
}
// Create access token, which we will serialize and send to the client
$token = new AccessToken($ACCOUNT_SID, 
                         $API_KEY, 
                         $API_KEY_SECRET, 
                         3600, 
                         $identity
);
// Grant access to Video
$grant = new VoiceGrant();
$grant->setOutgoingApplicationSid($APP_SID);
$grant->setPushCredentialSid($PUSH_CREDENTIAL_SID);
$token->addGrant($grant);
echo $token->toJWT();
 */
?>
