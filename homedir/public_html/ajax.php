<?php

//session_start();

include('admin/config/connection.php');

$con->getconnect();

$val=$_GET['action'];

date_default_timezone_set("Asia/Kolkata");

if(isset($_SESSION['user']['user_id']))

{

	$user_id=$_SESSION['user']['user_id'];

}

	//$data=array();

			$hot_sql = @mysql_query("SELECT COUNT(*) FROM  ".VOTE." WHERE user_id= ".$user_id." and deal_id = ".$_GET['deal_id']." and vote ='h' ");

		   $hot_count = @mysql_result($hot_sql, 0); 

		   $cold_sql = @mysql_query("SELECT COUNT(*) FROM  ".VOTE." WHERE user_id = ".$user_id." and deal_id = ".$_GET['deal_id']." and vote ='c' ");

		$cold_count = @mysql_result($cold_sql, 0); 
$from="debabrata@codetechinfo.in";
switch ($val)

{

	case "SignUp":

	//echo "Hello";die(0);

	$data=array();

	foreach($_POST as $k=>$v)

	{

		if($k!='signup' && $k!='terms')

		{

			$data[$k]=$v;

		}

	}

	if($_POST['newslater_subscriber'])

	{

	$news_l=array("news_email"=>$_POST['email']);

	$db->insert(NEWSLETTER,$news_l);

	}

	if($_POST['sex']=="male")

	{

		$data['profile_picture']="male.png";

		$data['profile_picture_url']=$me->template_url('images/user/male.png');

	}

		else if($_POST['sex']=="female")

	{

		$data['profile_picture']="female.png";

		$data['profile_picture_url']=$me->template_url('images/user/female.png');

	}

	$data['joindate']=date("Y-m-d H:i:s");
	$data['log_type']='w';
	//echo '<pre>';print_r($data);die;

	$va=$db->insert('users',$data);

	echo "Sign Up Successful";
	$m="Dear ".$_POST['name'].",<br><br>Thank you For Sign Up With us We Will Get In Touch With You.<br><br>Thanks & Regards<br>Hot Deals Team<br>http://codetechinfo.in/php/deals/";
	$me->mailer($_POST['email'],$from,"Hot Deals Registration",$m);
	break;//////////////////////////////////End OF Signup Function

	

	case "contact":

	$data=array();

	foreach($_POST as $k=>$v)

	{

		if($k!='signup' && $k!='terms')

		{

			$data[$k]=$v;

		}

	}

	$data['contactdate']=date("Y-m-d H:i:s");

	$va=$db->insert(CONTACT,$data);
	$m="Dear ".$_POST['name'].",<br><br>Thank you For Contact With us We Will Get In Touch With You.<br><br>Thanks & Regards<br>Hot Deals Team<br>http://codetechinfo.in/php/deals/";
	$me->mailer($_POST['email'],$from,"Hot Deals Contact",$m);
	echo "Saved Successfully";

	break;

	

	case "vote-for-hot":

	$date=date("Y-m-d H:i:s");

	if(($hot_count == 0) && ($cold_count == 0)){

			mysql_query("INSERT INTO ".VOTE." set deal_id=".$_GET['deal_id'].", user_id=".$user_id.",vote='h',voted_at='".$date."'");

		}

		if($cold_count == 1){

			mysql_query("UPDATE ".VOTE." SET vote = 'c' WHERE deal_id = ".$_GET['deal_id']." and user_id =".$user_id);

		}

        $rate_hot_count = mysql_query("SELECT COUNT(*) FROM  ".VOTE." WHERE deal_id = ".$_GET['deal_id']." and vote = 'h'");

        $rate_hot_count = mysql_result($rate_hot_count, 0);  

        $rate_cold_count = mysql_query("SELECT COUNT(*) FROM  ".VOTE." WHERE deal_id = ".$_GET['deal_id']." and vote = 'c'");

        $rate_cold_count = mysql_result($rate_cold_count, 0); 

		mysql_query ("update ".DEALS." set deal_hot_count='".$rate_hot_count."',last_voted_at='".$date."' where deal_id='".$_GET['deal_id']."'");

		echo '<div class="voting-controls-hot">

<p class="hot_deg">'.$rate_hot_count.'&deg;</p>

</div>';

	break;

	

	

	

	case "vote-for-cold":

	$date=date("Y-m-d H:i:s");

	if(($hot_count == 0) && ($cold_count == 0)){

		mysql_query("INSERT INTO ".VOTE." set deal_id=".$_GET['deal_id'].", user_id=".$user_id.",vote='c',voted_at='".$date."'");

		}

		if($hot_count == 1){

			mysql_query("UPDATE ".VOTE." SET vote = 'c' WHERE deal_id =".$_GET['deal_id']." and user_id =".$user_id);

		}

        $rate_hot_count = mysql_query("SELECT COUNT(*) FROM  ".VOTE." WHERE deal_id = ".$_GET['deal_id']." and vote = 'h'");

        $rate_hot_count = mysql_result($rate_hot_count, 0);  

        $rate_cold_count = mysql_query("SELECT COUNT(*) FROM  ".VOTE." WHERE deal_id = ".$_GET['deal_id']." and vote = 'c'");

        $rate_cold_count = mysql_result($rate_cold_count, 0); 

		$hot=($rate_hot_count-1);

		mysql_query("update ".DEALS." set hot_cold_count='".$rate_cold_count."',last_voted_at='".$date."',deal_hot_count='".$hot."' where deal_id='".$_GET['deal_id']."'"); 

		echo '<div class="voting-controls-hot">

<p class="hot_deg">'.$hot.'&deg;</p>

</div>';

	break;

	

	case "newsletter":

	$data=array();

	$fetch=array(

	'select'=>'email',	

	'where'=>'email',          

	'where_value'=>$_POST['news_email'],

	'and'=>'newslater_subscriber',

	'and-value'=>1	

	);

	$news_fetch=array(

	'select'=>'news_email',	

	'where'=>'news_email', 

	'where_value'=>$_POST['news_email'],         

	);

	$news_user= $me->num_row(NEWSLETTER,$news_fetch); 

	$user= $me->num_row(USERS,$fetch);

	if($user>0 || $news_user>0)

	{

		echo 0;

	}

	else

	{

	foreach($_POST as $k=>$v)

	{

		if($k!='submit')

		{

			$data[$k]=$v;

		}

	}

	$va=$db->insert(NEWSLETTER,$data);
$m="Dear ".$_POST['news_email'].",<br><br>Thank you For Subscribed With Us We Will Get In Touch With You.<br><br>Thanks & Regards<br>Hot Deals Team<br>http://codetechinfo.in/php/deals/";
	$me->mailer($_POST['news_email'],$from,"Hot Deals News Letter Subscription",$m);
	echo 1;

	}

	break;

	case "profileicon":////////Change Profile Picture

	

	$data=array();

	$field=array("user_id"=>$user_id);

		if(is_uploaded_file($_FILES['profile_picture']['tmp_name']))

		{

		$data['profile_picture']=$f->picture($_FILES['profile_picture'],'images/user/');

		$data['profile_picture_url']=$me->template_url('images/user/'.$data['profile_picture']);

		$t=$db->update(USERS,$data,$field);

		if($t)

		{

			$s=mysql_query("select * from ".USERS." where user_id=".$user_id);

			$resulet=mysql_fetch_assoc($s);

			 $SessionArray=array();

			  foreach($resulet as $k=>$v)

			  {

				 $SessionArray[$k]=$v; 

			  }

			  $_SESSION['user']=$SessionArray;

			 @unlink('images/user/'.$_POST['himg']);

			$a=array('im'=>$data['profile_picture'],'im_url'=>$data['profile_picture_url']);

			echo json_encode($a);

		}

		else

		{

			echo "no";

		}

		}

		

	break;

	

	case "description":

	$data=array();

	$field=array("user_id"=>$user_id);

	$data['about_me']=$_GET['descr'];

	$t=$db->update(USERS,$data,$field);

	//print_r($field);die;

	if($t)

	{

		echo $_GET['descr'];

	}

	else

	{

		"Not";

	}

	//echo 

	break;

	

	case "location":

	$data=array();

	$field=array("user_id"=>$user_id);

	$data['location']=$_GET['loc'];

	$t=$db->update(USERS,$data,$field);

	//print_r($field);die;

	if($t)

	{

		echo $_GET['loc'];

	}

	else

	{

		"Not";

	}

	//echo 

	break;

}

?>

