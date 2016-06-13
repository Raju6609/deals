<?php
include('admin/config/connection.php');
$con->getconnect();
	$a=mysql_query("select deal_view_count from ".DEALS." where deal_id=".$_GET['d']);
	//echo $a;
$r=@mysql_fetch_assoc($a);
if($r['deal_view_count']==0 || $r['deal_view_count']=='')
{
	mysql_query ("update ".DEALS." set deal_view_count='1' where deal_id=".$_GET['d']);
}
else
{
$view=$r['deal_view_count']+1;
//echo $view;die;
mysql_query("update ".DEALS." set deal_view_count='".$view."' where deal_id=".$_GET['d']);	
}
	$data=array(
	'select'=>'deal_url',	
	'where'=>'deal_id',          
	'where_value'=>$_GET['d'],	
	'start_limit'=>'0',	
	'end_limit'=>'1'		
	);
	$resulet= $db->select(DEALS,$data);
if(isset($_SESSION['user']['user_id']))
{
	$v=array("user_id"=>$_SESSION['user']['user_id'],"deal_id"=>$_GET['d']);
	$db->insert(POSTVIEW,$v);
}
	header("location:".$resulet[0]['deal_url']);
?>