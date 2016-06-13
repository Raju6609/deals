<?php 

include('admin/config/connection.php');

//session_start();

$me->loginauthentication();

$content->get_header();



if(isset($_POST['loginform']))

{

	$sql="select * from ".USERS." where user_name='".mysql_real_escape_string($_POST['uname'])."' or email='".mysql_real_escape_string($user)."' and pass='".mysql_real_escape_string($_POST['pass'])."' and status=1";

		//echo $sql;die;

		$query=mysql_query($sql);

		$num=mysql_num_rows($query);

		$row=mysql_fetch_assoc($query);

		  if($num>0)

		  {

			  $SessionArray=array();

			  foreach($row as $k=>$v)

			  {

				 $SessionArray[$k]=$v; 

			  }

			  $_SESSION['user']=$SessionArray;

			 // echo '<pre>';

			 // print_r($_SESSION['user']);

			  header("location:".$_SERVER['HTTP_REFERER']);

		  }

		  else

		  {

			  $_SESSION['msg']="<div class=\"s-error\">Invalid Login ID/Password</div>";

		  }

	

	

	//$login=$me->userlogin($_POST['uname'],$_POST['pass']);

	 //header("location:".$_SERVER['HTTP_REFERER']);

}
if(isset($_POST['forgetpass']))
{
	$sql=mysql_query("SELECT * FROM ".USERS." WHERE `email`='".$_POST['getpass']."'");
	$row=mysql_fetch_assoc($sql);
	if($row['log_type']=='f')
	{
		$p="Sorry You Have Used This Email With Your Facebook Acount.So Please Try To Login With Facebook.";
	}
	elseif($row['log_type']=='g')
	{
		$p="Sorry You Have Used This Email With Your Google Acount.So Please Try To Login With Google.";
	}
	elseif($row['log_type']=='t')
	{
		$p="Sorry You Have Used This Email With Your Twitter Acount.So Please Try To Login With Twitter.";
	}
	else
	{
		$p=$row['pass'];
	}
				if(mysql_num_rows($sql) > 0)
				{
	$m="Dear ".$row['name'].",<br><br>Thank you For Contact With Us.Your Password is Given Bellow.Please login and Enjoy Your Acount.<br><br>Password:".$p."<br><br>Thanks & Regards<br>Hot Deals Team<br>http://codetechinfo.in/php/deals/";
	$me->mailer($_POST['getpass'],"desihotdeals@gmail.com","Hot Deals Forgot Password",$m);	
	$_SESSION['msg']="<div class=\"success\">Password Hasbeen Sent To Your Mail.</div>";
	header("location:login.php?fpass=1");exit;
				}
				else
				{
					$_SESSION['msg']="<div class=\"s-error\">Please Type a Valid Email.</div>";
					header("location:login.php?fpass=1");exit;
				}
}
//echo "facebook login url".$loginUrl;

$getcontent->get_login();

$content->get_footer();

?>