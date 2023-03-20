<?php
require_once( 'lib/Facebook/FacebookSession.php');
require_once( 'lib/Facebook/FacebookRequest.php' );
require_once( 'lib/Facebook/FacebookResponse.php' );
require_once( 'lib/Facebook/FacebookSDKException.php' );
require_once( 'lib/Facebook/FacebookRequestException.php' );
require_once( 'lib/Facebook/FacebookRedirectLoginHelper.php');
require_once( 'lib/Facebook/FacebookAuthorizationException.php' );
require_once( 'lib/Facebook/GraphObject.php' );
require_once( 'lib/Facebook/GraphUser.php' );
require_once( 'lib/Facebook/GraphSessionInfo.php' );
require_once( 'lib/Facebook/Entities/AccessToken.php');
require_once( 'lib/Facebook/HttpClients/FacebookCurl.php' );
require_once( 'lib/Facebook/HttpClients/FacebookHttpable.php');
require_once( 'lib/Facebook/HttpClients/FacebookCurlHttpClient.php');
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphUser;
use Facebook\GraphSessionInfo;
use Facebook\FacebookHttpable;
use Facebook\FacebookCurlHttpClient;
use Facebook\FacebookCurl;
session_start();
if(isset($_REQUEST['logout'])){
unset($_SESSION['fb_token']);
}
$app_id = '1672753366315837';
$app_secret = 'd7aa73f10e4d09535c5f96d9f381f813';
$redirect_url='http://www.uddeshah.com/fbstatus/fblogin1.php';
FacebookSession::setDefaultApplication($app_id,$app_secret);
$helper = new FacebookRedirectLoginHelper($redirect_url);
$sess = $helper->getSessionFromRedirect();
if(isset($_SESSION['fb_token'])){
$sess = new FacebookSession($_SESSION['fb_token']);
}
if(isset($sess)){
$_SESSION['fb_token']=$sess->getToken();
$request = new FacebookRequest($sess,'GET','/me');
$response = $request->execute();
$graph = $response->getGraphObject(GraphUser::classname());
$name = $graph->getName();
$id = $graph->getId();
$image = 'https://graph.facebook.com/'.$id.'/picture?width=300';
str_replace("width=300","width=2000",$image);
$d=Date("dmyhis");
file_put_contents("img/".$d.".jpg", file_get_contents($image));
imagepng(imagecreatefromjpeg("img/".$d.".jpg"),"img/".$d.".png");
unlink("img/".$d.".jpg");
header('location:http://www.uddeshah.com/fbstatus/img.php?source='.$d);
}else{
echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><h1><center><a href="'.$helper->getLoginUrl(array('email','publish_actions')).'" style="color:white">Login with Facebook</a></center></h1>';
}?>
<body background="bg.jpg">
</body>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- filter -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-5749773922911013"
     data-ad-slot="4948132686"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>










	
