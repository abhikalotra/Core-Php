<?php
include_once("inc/facebook.php"); //include facebook SDK
 
######### edit details ##########
$appId = '1477002762532210'; //Facebook App ID
$appSecret = '5a4beb70a1da297c3339e4fdb4048c14'; // Facebook App Secret
$return_url = 'http://122.160.233.58/abhi/coffee-shop/adminpanel/post-to-fb-wall/process.php';  //return url (url to script)
$homeurl = 'http://122.160.233.58/abhi/coffee-shop/adminpanel/post-to-fb-wall/';  //return to home
$fbPermissions = 'publish_stream,manage_pages';  //Required facebook permissions
##################################

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret
));

$fbuser = $facebook->getUser();
?>