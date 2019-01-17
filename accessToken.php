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
$twilioAccountSid = 'AC877bfda2457808ef1730e26c927e08cd';
$twilioApiKey = 'SK6477ccec45c09d9f476dcc2b92b49c0e';
$twilioApiSecret = '9KU9HRPJ3b6RXXbBXkLOt29ghVPkCUhn';
 
$PUSH_CREDENTIAL_SID = 'CRc62674116d636c79a4e14f5858c0158e';
// Required for Voice grant
$outgoingApplicationSid = 'AP4b094f2ff0e05347303b34e69e8bcac0';
// $ACCOUNT_SID = 'AC877bfda2457808ef1730e26c927e08cd'; 
//$API_KEY = 'SK6477ccec45c09d9f476dcc2b92b49c0e';
//$API_KEY_SECRET = '9KU9HRPJ3b6RXXbBXkLOt29ghVPkCUhn';
//$PUSH_CREDENTIAL_SID = 'CRc62674116d636c79a4e14f5858c0158e';
//$APP_SID = 'AP4b094f2ff0e05347303b34e69e8bcac0';
 
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
