<?php
 
/*
 * Creates an access token with VoiceGrant using your Twilio credentials.
 */
require_once 'vendor/autoload.php';
include('./vendor/autoload.php');
include('./config.php');
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VoiceGrant;
// Use identity and room from query string if provided
$identity = isset($_GET["identity"]) ? $_GET["identity"] : NULL;
if (!isset($identity) || empty($identity)) {
  $identity = isset($_POST["identity"]) ? $_POST["identity"] : "alice";
}
print_r($PUSH_CREDENTIAL_SID);
exit();
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
$grant->setIncomingAllow(true);
$token->addGrant($grant);
print_r($token);
echo $token->toJWT();
?>
