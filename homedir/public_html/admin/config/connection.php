<?php

ob_start();

session_start();

include("config.php");

include("define.php");

include("extra.php");

include("functions.php");

include("content.php");

$f=new functns;

$con= new sql_connect;

$db=new custom_query;

$me= new myfunction;

$content= new allcontents;

$getcontent= new main_concontent;
$con->getconnect();
/*require 'facebook.php';
	$facebook = new Facebook(array(
  'appId'  => '613331932053999',
  'secret' => '67ca1bf4c03ee0481ed13099676141de',
));
$user = $facebook->getUser();
if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
	
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}
$deal_user = $facebook->api('/me');
if ($user) {
	 //$logoutUrl;
	echo "<pre>";
print_r($deal_user);
echo "</pre>";
/*die;*/
/*	$here = 'http://codetechinfo.in/php/deals/admin/config/connection.php';
	$next = preg_replace('~#.*$~s', '', $here);
	$next = preg_replace('~\?.*$~s', '', $next);
	$next = preg_replace('~/[^/]*$~s', '/logout.php', $next);
    $logoutUrl = $facebook->getLogoutUrl(array('next' => $next));
    $facebook_user=mysql_query("select * from ".USERS." where user_name='".$deal_user['username']."'");
   // echo $facebook_user;die;
   $location=$deal_user['location']['name'];
   //echo $facebook_user;die;
   $pic_url="https://graph.facebook.com/".$user."/picture?type=large";
   //$n=mysql_num_rows($facebook_user);
  // echo $n;die;
    if(mysql_num_rows($facebook_user)==0)
	{
		
	mysql_query("insert into ".USERS." set name='".$deal_user['name']."',user_name='".$deal_user['username']."',email='".$deal_user['username']."',profile_picture='".$user."',profile_picture_url='".$pic_url."',joindate=NOW()");
	
			$s=mysql_query("select * from ".USERS." where user_id=".mysql_insert_id());
			//echo $s;die;
			$resulet=mysql_fetch_assoc($s);
			//print_r($resulet);
			 $SessionArray=array();
			  foreach($resulet as $k=>$v)
			  {
				 $SessionArray[$k]=$v; 
			  }

			  $_SESSION['user']=$SessionArray;
				//header("location:http:./");
		//$_SESSION['user']['user_id']=

	}
	else
	{
		$u=mysql_query("update ".USERS." set set name='".$deal_user['name']."',user_name='".$deal_user['username']."',profile_picture='".$user."',profile_picture_url='".$pic_url."',joindate=NOW() where email='".$deal_user['username']."'");
		//echo $u;die;
		$resulet=mysql_fetch_assoc(mysql_query("select * from ".USERS." where email='".$deal_user['username']."'"));
		$SessionArray=array();

			  foreach($resulet as $k=>$v)

			  {
				 $SessionArray[$k]=$v; 
			  }

			  $_SESSION['user']=$SessionArray;
			  header("location:http://codetechinfo.in/php/deals/");

	}
	
  
} else {
	$here = 'http://codetechinfo.in/php/deals/admin/config/connection.php';
	$next = preg_replace('~#.*$~s', '', $here);
	$next = preg_replace('~\?.*$~s', '', $next);
	$next = preg_replace('~/[^/]*$~s', '/index.php', $next);
	//global $statusUrl;
	//global $loginUrl;
  $statusUrl = $facebook->getLoginStatusUrl();
  $loginUrl = $facebook->getLoginUrl(array('next' => $next));
}*/
//define("FURL",$loginUrl);
?>


