<?php
include('admin/config/connection.php');
$content->get_header();
if(isset($_POST['save']))
{
	$data=array();
	foreach($_POST as $k=>$v)
	{
		if($k!='save')
		{
			$data[$k]=$v;
		}
	}
	$id=array("user_id"=>$_SESSION['user']['user_id']);
	$me->update(USERS,$data,$id);
	$s=mysql_query("select * from ".USERS." where user_id=".$_SESSION['user']['user_id']);
			$resulet=mysql_fetch_assoc($s);
			 $SessionArray=array();
			  foreach($resulet as $key=>$val)
			  {
				 $SessionArray[$key]=$val; 
			  }
			  $_SESSION['user']=$SessionArray;
			  $_SESSION['msg']="<div class=\"success\">Save Changed Successfully</div>";
		  header("location:".$_SERVER['PHP_SELF']."?user_id=".$_SESSION['user']['user_id']."&p=t");exit();
}
$getcontent->get_setting();
$content->get_footer();
?>