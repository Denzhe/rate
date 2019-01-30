<?php

	use \helpers\form,
	\core\error;

echo Helpers\Form::open(array('method' => 'post'));
echo 'Username: '.Helpers\Form::input(array('name' => 'username'));
echo '<br/>Password: '.Helpers\Form::input(array('type' => 'password', 'name' => 'password'));
echo '<br/>';
echo Helpers\Form::input(array('type' => 'submit', 'value' => 'Submit', 'name' => 'submit'));
echo Helpers\Form::close();

$fb = new Facebook\Facebook(['app_id' => '605876436238684',
	'app_secret' => 'fba7daf8e3c41a258a3563e735861332',
	'default_graph_version' => 'v2.6',]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes']; // optional
$loginUrl = $helper->getLoginUrl('http://rate.imagehut.co.za/login-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';

?>