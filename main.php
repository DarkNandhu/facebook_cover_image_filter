<?php
	require "fbsdk/src/Facebook/autoload.php";
	session_start();
	$fb = new Facebook\Facebook([
	  'app_id'                => '1672753366315837',
	  'app_secret'            => 'd7aa73f10e4d09535c5f96d9f381f813',
	  'default_graph_version' => 'v2.5',
	]);
?>