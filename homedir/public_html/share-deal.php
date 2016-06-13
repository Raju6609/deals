<?php 
include('admin/config/connection.php');
$me->loginverification('login.php');
$content->get_header();

if(isset($_POST['dealsubmit']))
{
	date_default_timezone_set("Asia/Kolkata");
	$data=array();
	$check_slug_qry=mysql_query("select count(deal_slug) as slug_count from ".DEALS." where deal_slug='".$_POST['deal_slug']."'");//
	$slug_row=mysql_fetch_array($check_slug_qry);//echo $slug_row['slug_count'];die;
	if($slug_row['slug_count']>=1)
	{
		$data['deal_slug']=$_POST['deal_slug']."-1";
	}
	else
	{
		$data['deal_slug']=$_POST['deal_slug'];
	}
	
	
	
		foreach($_POST as $k=>$v)
		{
			if($k!='dealsubmit' && $k!='deal_image' && $k!='deal_slug')
			{
				$data[$k]=mysql_real_escape_string($v);
			}
		}
		//date_default_timezone_set("Asia/Kolkata");
		$data['deal_modify_date']=date("Y-m-d H:i:s");
		$data['deal_status']=1;
		if(isset($_SESSION['user']['user_id']))
		{
		$data['user_id']=$_SESSION['user']['user_id'];
		}
		if(is_uploaded_file($_FILES['deal_image']['tmp_name']))
		{
		$data['deal_image']=$f->sharepicture($_FILES['deal_image'],'images/deal/');
		$data['deal_image_url']=$me->template_url('images/deal/'.$data['deal_image']);
		}
		else
		{
		$data['deal_image']='noimage.png';
		$data['deal_image_url']=$me->template_url('images/noimage.png');
			
		}
		//echo '<pre>';
//		print_r($data);die;
		$deal=$db->insert(DEALS,$data);
		if($deal)
		{
			$activity=array(
			"user_id"=>$_SESSION['user']['user_id'],
			"type"=>"Share Deal",
			"deal_id"=>mysql_insert_id(),
			"last_visit"=>date("Y-m-d H:i:s")
			);	
			$db->insert(ACTIVITY,$activity);	
		$_SESSION['msg']="<div class=\"success\">Submited Successfully</div>";
		}
		else
		{
			$_SESSION['msg']="<div class=\"s-error\">Error Please Check</div>";
		}
}
$getcontent->share_deal();
$content->get_footer();
?>