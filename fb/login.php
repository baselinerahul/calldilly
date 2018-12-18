<?

$fb = new Facebook\Facebook([
  'app_id' => '496175707541599', // Replace {app-id} with your app id
  'app_secret' => 'c104c2722cb29b09a772ad55ce00d95a',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://calldilly.herokuapp.com/fb/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';

?>
