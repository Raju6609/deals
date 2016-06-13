<?php
include('config/connection.php');
$con->getconnect();
error_reporting(0);
$val=$_GET['val'];
			switch($val)
			{
				case "topic":
				$data=array();
				$data['topic_name']=$_GET['topic_name'];
				$field=array('topic_id'=>$_GET['topic_id']);
			    $update=$db->update(TOPICS,$data,$field);
				if($update)
				{echo "Successful";}else{echo "Unsuccessful";}break;
				case "status":
				$updatedata=array();
				$data=array(
				  'select'=>'status',	
				  'where'=>'topic_id',          
				  'where_value'=>$_GET['topic_id']	
				   );
				 $resulet= $db->select(TOPICS,$data);
				 if($resulet[0]['status']==1){
				 $updatedata['status']=0;}else{$updatedata['status']=1;}
				 $field=array('topic_id'=>$_GET['topic_id']);
			     $update=$db->update(TOPICS,$updatedata,$field);
				 echo $resulet[0]['status'];
				 break;
			}

?>