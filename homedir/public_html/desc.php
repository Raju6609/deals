<?php 
if(isset($_SESSION['user']['user_id']))
{
	$user_id=$_SESSION['user']['user_id'];
}
else
{
	$user_id=$_GET['user_id'];
}
//echo $user_id;die;
$get_user_data=array(
	'select'=>'*',	
	'where'=>'user_id',          
	'where_value'=>$user_id,	
	'start_limit'=>'0',	
	'end_limit'=>'1'		
	);
	$get_user= $me->select(USERS,$get_user_data);

if(isset($_SESSION['user']['user_id']) && isset($_GET['p']) && $_SESSION['user']['user_id']==$_GET['user_id'])
{?>
<div class="lp-cols-2">     
    <p class="title_tag_right"><a ><span>Change Your Description</span> <img src="images/edit.jpg" id="clickimg" /></a></p>
   <span class="description"> <textarea name="desc" id="desc" cols="" rows="" class="conct_txt_field_edit"><?php echo $get_user[0]['about_me']?></textarea><a id="d_save">Save</a></span>
   <p class="title_tag_right"><a ><span>Change Your Location</span> <img src="images/edit.jpg" id="clickimg_1" /></a></p>
  <span class="location"> <textarea name="" id="loc" cols="" rows="" class="conct_txt_field_edit_1"><?php echo $get_user[0]['location']?></textarea><a id="l_save">Save</a></span>
   </div>
   <?php }else{?>
   <div class="lp-cols-2" style="background:none !important;">     
    
   <p class="title_tag_right">&nbsp;</p>

   </div>
   <?php }?>