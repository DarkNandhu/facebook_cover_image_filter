<?php
	require "main.php";
	 $a=$_GET['source'];
	if (isset($_SESSION['fb_token'])) {
	  try {
	 	
          ?>
    
    <form method = "post" action ="photo.php">
        <input type = "text" name = "photo" value="http://www.uddeshah.com/fbstatus/img/<?php echo $a; ?>.png" hidden>
<img src="http://www.uddeshah.com/fbstatus/img/<?php echo $a; ?>.png" height="300" width="300"><br><br><Br>
        <textarea rows="10" cols="50" name = "message">#New_Start
Wish you all a very happy new year
Filter URL:http://ibevy.co.in/fbstatus
Website URL:http://ibevy.co.in
</textarea><br><br>
        <button type="submit" style="border:none;background:transparent"> <img src="th.jpg"></button>
    </form>

            <?php
          
	  } catch( Facebook\Exceptions\FacebookSDKException $e ) {
	    echo $e->getMessage();
	    exit;
	  }
	}
	else{
		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['email', 'user_posts', 'publish_actions'];
		$callback    = 'http://www.uddeshah.com/fbstatus/fblogin1.php';
		$loginUrl    = $helper->getLoginUrl($callback, $permissions);
		echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
	}
?>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- filter -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-5749773922911013"
     data-ad-slot="4948132686"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>