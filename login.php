
<?php
require_once 'Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '743406762526596', // Replace {app-id} with your app id
  'app_secret' => '22c139670ec6c776c0daeff067ac3954',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost/arsyadfb/upload_images/index.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
?>