<?php
include('admin/config/connection.php');
$getcontent->get_content();

//ob_start();

require("twitter/twitteroauth.php");

require 'twconfig.php';

//require 'config/functions.php';

//session_start();



if (!empty($_GET['oauth_verifier']) && !empty($_SESSION['oauth_token']) && !empty($_SESSION['oauth_token_secret'])) {

    // We've got everything we need

    $twitteroauth = new TwitterOAuth(YOUR_CONSUMER_KEY, YOUR_CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);

// Let's request the access token

    $access_token = $twitteroauth->getAccessToken($_GET['oauth_verifier']);

// Save it in a session var

    $_SESSION['access_token'] = $access_token;

// Let's get the user's info

    $user_info = $twitteroauth->get('account/verify_credentials');

// Print user's info

/*    echo '<pre>';

    print_r($user_info);

    echo '</pre><br/>';
die;*/
    if (isset($user_info->error)) {

        // Something's wrong, go back to square 1  

        header('Location: login-twitter.php');

    } else {

	   $twitter_otoken=$_SESSION['oauth_token'];

	   $twitter_otoken_secret=$_SESSION['oauth_token_secret'];

	   $email='';
		/*echo '<pre>';
		print_r($user_info);die;*/
       $_SESSION['twitter_id']= $user_info->id;
	   //$name=explode(' ',$user_info->name);
       $_SESSION['name'] = $user_info->name;
	   $_SESSION['lname'] = $name[1];
       $_SESSION['username'] = $user_info->name;
	   $_SESSION['picurl']=$user_info->profile_image_url;
	   $_SESSION['link']=$user_info->screen_name;
       $_SESSION['email']=$user_info->email;
	   $_SESSION['location']=$user_info->location;
	   $twitter_user=mysql_query("select * from ".USERS." where user_name='".$user_info->screen_name."'");
	   if(mysql_num_rows($twitter_user)==0)
	   {
	$twit_qry=mysql_query("insert into ".USERS." set name='".$_SESSION['name']."',user_name='".$_SESSION['link']."',email='".$_SESSION['email']."',profile_picture='".$_SESSION['picurl']."',profile_picture_url='".$_SESSION['picurl']."',log_type='t',joindate=NOW()");
		   
$s=mysql_query("select * from ".USERS." where user_id=".mysql_insert_id());
			$resulet=mysql_fetch_assoc($s);
			 $SessionArray=array();
			  foreach($resulet as $k=>$v)
			  {
				 $SessionArray[$k]=$v; 
			  }
			  $_SESSION['user']=$SessionArray;
	   }
	    else
		{
			mysql_query("update ".USERS." set name='".$_SESSION['name']."',user_name='".$_SESSION['link']."',email='".$_SESSION['email']."',profile_picture='".$_SESSION['picurl']."',profile_picture_url='".$_SESSION['picurl']."',log_type='t',joindate=NOW() where user_name='".$_SESSION['link']."'");
		//echo $u;die;
$resulet=mysql_fetch_assoc(mysql_query("select * from ".USERS." where user_name='".$_SESSION['link']."'"));
		$SessionArray=array();
			  foreach($resulet as $k=>$v)

			  {
				 $SessionArray[$k]=$v; 
			  }

			  $_SESSION['user']=$SessionArray;
		}
       header("Location:http://desihotdeals.com/");

      }

} else {

    // Something's missing, go back to square 1

    header('Location: login-twitter.php');

}

?>

