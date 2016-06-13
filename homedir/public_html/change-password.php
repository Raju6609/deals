<?php
include('admin/config/connection.php');
$content->get_header();
if(isset($_POST['change_pass']))
{
	$oldpass=$_POST['old_pass'];
	$pass=$_POST['pass'];
	$c_pass=$_POST['c_pass'];
	$data=array(
	'select'=>'pass',	
	'where'=>'pass',          
	'where_value'=>$oldpass,	
	);
	$resulet= $me->select(USERS,$data);
	if($resulet[0]['pass']!=$oldpass)
	{
		$_SESSION['msg']="<div class=\"s-error\">Sorry Old Password Not Match!</div>";
		header("location:".$_SERVER['PHP_SELF']."?user_id=".$_SESSION['user']['user_id']."&p=t");
		exit();
	}
		elseif($pass!=$c_pass)
	{
		$_SESSION['msg']="<div class=\"s-error\">Sorry Confirm Password Not Match!</div>";
		header("location:".$_SERVER['PHP_SELF']."?user_id=".$_SESSION['user']['user_id']."&p=t");
		exit();
	}
	else
	{
		$u=mysql_query("update ".USERS." set pass='".$pass."' where user_id=".$_SESSION['user']['user_id']);
		$_SESSION['msg']="<div class=\"success\">PasswordChanged Successfully</div>";
		header("location:".$_SERVER['PHP_SELF']."?user_id=".$_SESSION['user']['user_id']."&p=t");
		exit();
	}
	
}
$getcontent->get_password();
$content->get_footer();
?>