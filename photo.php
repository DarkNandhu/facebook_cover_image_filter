<?php
    require "main.php";

    if(isset($_SESSION['fb_token'])){
        $data = array(
            message => $_POST['message'],
            source => $fb->fileToUpload($_POST['photo'])    
        );
        $res = $fb->post('/me/photos', $data, $_SESSION['fb_token']);
header('location:http://www.facebook.com');
    }
?>