<?php 
///////////twitter
if (array_key_exists("tlogin", $_GET)) {
    $oauth_provider = $_GET['oauth_provider'];
    if ($oauth_provider == 'twitter') {
        header("Location: login-twitter.php");
    } 
}


//////////////////////////////facebook
require 'src/config.php';
require 'src/facebook.php';
// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => $config['App_ID'],
  'secret' => $config['App_Secret'],
  'cookie' => true
));
if(isset($_GET['logout']))       
{
    $url = 'https://www.facebook.com/logout.php?next=' . urlencode('http://demo.phpgang.com/facebook_login_graph_api/') .
      '&access_token='.$_GET['tocken'];
    session_destroy();
    header('Location:'.$url);
}
if(isset($_GET['fbTrue']))
{
    $token_url = "https://graph.facebook.com/oauth/access_token?"
       . "client_id=".$config['App_ID']."&redirect_uri=" . urlencode($config['callback_url'])
       . "&client_secret=".$config['App_Secret']."&code=" . $_GET['code']; 

     $response = file_get_contents($token_url);
     $params = null;
     parse_str($response, $params);

     $graph_url = "https://graph.facebook.com/me?access_token=" 
       . $params['access_token'];

     $fuser = json_decode(file_get_contents($graph_url));
     $extra ="?logout=1&tocken=".$params['access_token']; 

    // $content = $fuser;
/*echo '<pre>';
print_r($fuser);die;*/
	$pic_url="https://graph.facebook.com/".$fuser->id."/picture?type=large";
	  $facebook_user=mysql_query("select * from ".USERS." where email='".$fuser->email."'");

	 if(mysql_num_rows($facebook_user)==0)
	{
		
	mysql_query("insert into ".USERS." set name='".$fuser->name."',user_name='".$fuser->email."',email='".$fuser->email."',profile_picture='".$fuser->id."',profile_picture_url='".$pic_url."',log_type='f',joindate=NOW()");;
	
			$s=mysql_query("select * from ".USERS." where user_id=".mysql_insert_id());
			$resulet=mysql_fetch_assoc($s);
			 $SessionArray=array();
			  foreach($resulet as $k=>$v)
			  {
				 $SessionArray[$k]=$v; 
			  }

			  $_SESSION['user']=$SessionArray;
				header("location:./");

	}
	else
	{
		$u=mysql_query("update ".USERS." set name='".$fuser->name."',user_name='".$fuser->email."',email='".$fuser->email."',profile_picture='".$fuser->id."',profile_picture_url='".$pic_url."',log_type='f',joindate=NOW() where email='".$fuser->email."'");
		//echo $u;die;
		$resulet=mysql_fetch_assoc(mysql_query("select * from ".USERS." where email='".$fuser->email."'"));
		$SessionArray=array();

			  foreach($resulet as $k=>$v)

			  {
				 $SessionArray[$k]=$v; 
			  }

			  $_SESSION['user']=$SessionArray;
			  header("location:./");

	}
}
///////////////
require_once 'src/Google_Client.php';
require_once 'src/contrib/Google_Oauth2Service.php';
$client = new Google_Client();
$client->setApplicationName("Google UserInfo PHP Starter Application");

$oauth2 = new Google_Oauth2Service($client);

if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['token'] = $client->getAccessToken();
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
  return;
}

if (isset($_SESSION['token'])) {
 $client->setAccessToken($_SESSION['token']);
}

if (isset($_REQUEST['logout'])) {
  unset($_SESSION['token']);
  $client->revokeToken();
}

if ($client->getAccessToken()) {
  $guser = $oauth2->userinfo->get();

  $content = $guser;
 $google_user=mysql_query("select * from ".USERS." where email='".$content['email']."'");
	//echo $google_user;die;
	 if(mysql_num_rows($google_user)==0)
	{
		
	mysql_query("insert into ".USERS." set name='".$content['name']."',user_name='".$content['email']."',email='".$content['email']."',profile_picture='".$content['picture']."',profile_picture_url='".$content['picture']."',log_type='g',joindate=NOW()");
	
			$sg=mysql_query("select * from ".USERS." where user_id=".mysql_insert_id());
			$g_resulet=mysql_fetch_assoc($sg);
			 $SessionArray=array();
			  foreach($g_resulet as $k=>$v)
			  {
				 $SessionArray[$k]=$v; 
			  }

			  $_SESSION['user']=$SessionArray;
			  $_SESSION['token'] = $client->getAccessToken();
				//header("location:./");

	}
	else
	{
		$u=mysql_query("update ".USERS." set name='".$content['name']."',user_name='".$content['email']."',email='".$content['email']."',profile_picture='".$content['picture']."',profile_picture_url='".$content['picture']."',log_type='g',joindate=NOW() where email='".$content['email']."'");
		//echo $u;die;
		$resulet=mysql_fetch_assoc(mysql_query("select * from ".USERS." where email='".$content['email']."'"));
		$SessionArray=array();

			  foreach($resulet as $k=>$v)

			  {
				 $SessionArray[$k]=$v; 
			  }

			  $_SESSION['user']=$SessionArray;
			//  header("location:./");

	}
/////////////////////////////////////////

//echo $content['email'];
  
  
} else {
  $authUrl = $client->createAuthUrl();
  define("GURL",$authUrl);
}

///////////////////////////////////////
//session_start();

if(isset($_POST['login']))

{

	$login=$me->userlogin($_POST['user'],$_POST['pass']);

}
 //echo $_SERVER['HTTP_REFERER'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<?php $this->head();?>

<body>

<div class="wrapper">

<div class="header">

<div class="inner">

<div class="logo"><a href="<?php echo $me->template_url();?>"><img alt="Logo" src="<?php echo $me->template_url('images/logo.png');?>" /></a></div>



<div class="header_right">

<div class="hed_right_top">

<form class="top_form" action="search.php" method="post"><input class="search_box" name="s" placeholder="Search Here..." type="text" required="required" /> <input class="search_btn" name="submit" type="submit" /></form>



<ul class="top_btn">

<?php if(!isset($_SESSION['user']['user_id'])){?>

	<li><a class="active" id="clcksignup" >Sign Up</a></li>

	<li class="login"><a id="clickme">Login</a></li>

    <?php }else{?>

    <li class="after_login_user_info"><a id="profdisplay">Welcome!  <?php echo $_SESSION['user']['name']?><img src="images/d1.png" /></a></li>

    <?php }?>

</ul>

<div class="user_login_div">

	<a href="<?php echo $me->template_url('profile.php?user_id='.$_SESSION['user']['user_id'].'&p=t');?>" class="user_profile_link">

	<?php if(isset($_SESSION['user']['sex']) && $_SESSION['user']['sex']=="male"){?><img src="images/m.png" /><?php }else{?> <img src="images/profile.png" /><?php }?>My Profile</a>
<?php 
/*if(isset($_SESSION['user']['log_type']) && $_SESSION['user']['log_type']=='f')
{
*/	
	//echo $extra;
?>
<!--<a href="<?php echo $extra ?>">Logout</a>-->
<?php
/*}
else
{*/
?>
    <a href="logout.php" class="logout_link">Logout</a>
<?php //}?>
</div>



     <div id="popup">

                    <div class="pop_inner">

                    <h2>Welcome To Hot Deals!</h2>

                    <a class="cross">x</a>

                    <form class="module_form" id="signup" method="post">

                    <div class="row nm">

              <!--       <label class="label">Name</label>-->

                     <span class="error_txt">This field is require</span>

                        <input name="name" id="nam" type="text" placeholder="Name" class="search_box" />

                     </div>

                   <div class="row unam"><!-- <label class="label">User Name</label>-->

                       <span class="error_txt">This field is require</span>

                        <input name="user_name" id="user_name" type="text" placeholder="User Name" class="search_box" /></div>

                        <div class="row pas">

                        <!--<label class="label">Password</label>-->

                        <span class="error_txt">This field is require</span>

                   <input name="pass" type="password" id="pass" placeholder="Password" class="search_box" />

                   </div>

                       <div class="row eid"> <!--<label class="label">Email</label>-->

                       <span class="error_txt txttt"></span>

                        <input name="email" id="email" type="text" placeholder="Email Address" class="search_box" /></div>

                       <!--<div class="row gender"> <label class="label">Gender</label>

                       <span class="error_txt">This is Require Field</span>

                         <input name="sex" id="sex" type="radio" value="male" /><span class="sex">Male</span> <input name="sex" id="sex" type="radio" value="female" /><span class="sex">Female</span>

                        </div>-->

                         <div class="chek_bg">

                         <p class="check trm"><input name="terms" id="terms" type="checkbox" value="yes" class="chkbox" />

                            <label class="label_rem">I have read and acknowledged the <a href="#">Rules & Regulations</a> </label><span class="error_txt flot-left">Please Check Rules & Regulations</span>

                            </p>

                         <p class="check"><input name="newslater_subscriber" type="checkbox" value="yes" class="chkbox" />

                            <label class="label_rem">Send me the HOT DEALS community newsletter & hotdeals</label></p>  

                         </div>  

                             <input name="signup" value="Sign Up" type="submit" class="login_btn" />

                            

                    

                   

                   <div class="spacer"></div>

                    </div>

                    <div class="pop_bottom">

                     <div class="pop_inner">

                        

                         

                         <div id="respon" style="  float: left;margin: 4px 0 0 15px;"></div>

                         </form>

                            <div class="connect">

                                <p class="signin">Connect with your other accounts:</p>

                                <ul class="conect_pic_sm">
                                    <li><a href="https://www.facebook.com/dialog/oauth?client_id=<?php echo CLIENT ?>&redirect_uri=<?php echo CURL ?>&scope=email,user_likes,publish_stream"><img src="images/fb.jpg"></a></li>
                                    <li><a href="?tlogin&oauth_provider=twitter"><img src="images/twt.jpg"></a></li>
                                    <li><a href="<?php echo $authUrl?>"><img src="images/g+.jpg"></a></li>
								</ul>

                            </div>

                        </div>

                      

                       

                    </div>

      

    </div>



<div id="div1">



<?php if(isset($_SESSION['error'])){

	echo "<span style=\"color:#fff;margin-left: 107px;\">".$_SESSION['error']."</span>";

	

	unset($_SESSION['error']);

	?> 

<script type="text/javascript">

$(document).ready(function() { //alert(123)

$("#clickme" ).on("click",function() {

	//

	$( "#div1" ).slideToggle("slow");

	

});//end of login toogle function

$("#clickme").trigger("click");

});

</script>

<?php }?>

<form class="login_form" action="" method="post"><!--<label class="label">Username</label>--> <input class="newsletter_textbox" name="user" type="text" placeholder="Username" /> <!--<label class="label">Password</label>--> <input class="newsletter_textbox" name="pass" type="password"  placeholder="Password" /> <input class="chkbox" name="" type="checkbox" value="" /> <label class="label_rem">Remember me</label> <input class="login_btn" name="login" type="submit" value="LOG IN" />

<p class="forgot"><a href="login.php?fpass=1">Forgot your password</a></p>

</form>

</div>

</div>



<div class="hed_right_bottom">

<ul class="navigation_wrap">

	<li><a <?php if(basename($_SERVER['PHP_SELF'])=="index.php"){?>class="acttive"<?php }?> href="<?php echo $me->template_url()?>">Home</a></li>

    <?php

		$data=array(

				  'select'=>'*',	

				  'orderby'=>'serial',		

				  'order'=>'asc',		

				  'start_limit'=>'0',	

				  'end_limit'=>'10000000'		

				   );

				 $resulet= $me->select(TOPICS,$data);

				

				/* echo '<pre>';

				 print_r($resulet);die;*/

				 $sl=1;

				 foreach($resulet as $v)

				 { 

					 ?>

	<li><a href="<?php echo $me->template_url('topic-deal.php?topic='.$v['topic_id']."&m=".$sl++);?>" <?php if(isset($_GET['m']) && $_GET['m']==$v['serial']){?> class="acttive" <?php }?>><?php echo $v['topic_name']?></a></li>

	<?php }?>

</ul>

<span class="all">all</span>

<ul class="all_menu">

<?php

		$alldata=array(

				  'select'=>'*',	

				  'orderby'=>'serial',		

				  'order'=>'asc',		

				  'start_limit'=>'0',	

				  'end_limit'=>'10000000'		

				   );

				 $allresulet= $me->select(TOPICS,$alldata);

				 $sl=1;

				/* echo '<pre>';

				 print_r($resulet);die;*/

				 

				 foreach($allresulet as $vall)

				 {

					 ?>

    <li><a href="<?php echo $me->template_url('topic-deal.php?topic='.$vall['topic_id']."&m=".$sl++);?>"><?php echo $vall['topic_name']?></a></li>

	<?php }?>

</ul>

</div>

</div>

</div>



<div class="spacer"></div>

</div>