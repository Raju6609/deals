<?php
include('admin/config/connection.php');
$content->get_header();
if(isset($_POST['submit']))
{
	$data=array();
	foreach($_POST as $k=>$v)
	{
		if($k!='submit')
		{
			$data[$k]=mysql_real_escape_string(strip_tags($v));
		}
	}
	date_default_timezone_set("Asia/Kolkata");
	$data['commented_at']=date("Y-m-d H:i:s");
	$data['user_id']=$_SESSION['user']['user_id'];
/*	echo '<pre>';
	print_r($data);die;*/
	$db->insert(COMMENT,$data);
	$latest_id=mysql_insert_id();
	$count=array(
	'select'=>'count(*) as total_coment',	
	'where'=>'deal_id',          
	'where_value'=>$_POST['deal_id']
	);
	$activity=array(
	"user_id"=>$_SESSION['user']['user_id'],
	"type"=>"Comment a Deal",
	"deal_id"=>$_POST['deal_id'],
	"last_visit"=>date("Y-m-d H:i:s")
	);	
	$db->insert(ACTIVITY,$activity);
	 $total_coment=$db->select(COMMENT,$count);
	// echo $total_coment[0]['total_coment'];die;
	 $updae_deal=array();
	 $updae_deal['deal_coment_count']=$total_coment[0]['total_coment'];
	 $field=array('deal_id'=>$_POST['deal_id']);
	 $update=$db->update(DEALS,$updae_deal,$field);

}
	$getcontent->details_deal();
	$content->get_footer();
?>