<?php 

if(isset($_GET['user_id']))

{

	$user_id=$_GET['user_id'];

}

/*else

{

if(isset($_SESSION['user']['user_id']))

{

	 $user_id=$_SESSION['user']['user_id'];

}

}*/

/*else

{

	 

}*/

//echo $user_id;die;

$get_user_data=array(

	'select'=>'*',	

	'where'=>'user_id',          

	'where_value'=>$user_id,	

	'start_limit'=>'0',	

	'end_limit'=>'1'		

	);

	$get_user= $me->select(USERS,$get_user_data);

?>

<div class="helpful_left">

   	<div class="profile_pic">

    	<a ><img id="prof_img" src="<?php /*if(isset($_SESSION['user']['profile_picture_url'])){echo $_SESSION['user']['profile_picture_url'];}*/echo $get_user[0]['profile_picture_url']?>" />

        	<?php if(isset($_SESSION['user']['user_id'])){?><p class="ed_pic" style="cursor:pointer !important">Edit Picture</p>

            <form  method="post" enctype="multipart/form-data" id="prof_pic">

<input name="profile_picture" type="file" id="profile_picture" class="edt_pic" style="cursor:pointer !important" />

<input type="hidden" name="himg" id="himg" value="<?php echo $_SESSION['user']['profile_picture']?>" />

</form> <?php }?>

        </a>

    </div>

    <div class="all_desc">

    	<p class="joined">Joined : <span class="timeago" title='<?php /*if(isset($_SESSION['user']['joindate'])){ echo $_SESSION['user']['joindate'];}*/echo$get_user[0]['joindate'] ?>'></span></p><p class="joined">Last Activity : 

        <span class="timeago" title='<?php  echo $me->last_activity($user_id) ?>'></span> </p>

        <p class="joined">Location : <span id="ltext"><?php echo $get_user[0]['location'] ?></span></p>

        <div class="status_div">

        <p class="status">Status</p>

        <p class="stat_txt">Deals Posted :<?php echo $me->deal_posted($user_id)?></p>

        <p class="stat_txt">Post Views : <?php echo $me->post_view($user_id)?></p>

        <p class="stat_txt">Comments : <?php echo $me->user_comment($user_id)?></p>

        </div>

        

        <ul class="settings">

        	<li><a  href="<?php echo $me->template_url('profile.php?user_id='.$_SESSION['user']['user_id'].'&p=t');?>" class="activity <?php if(basename($_SERVER['PHP_SELF'])=='profile.php'){echo "active";}?>">Activity</a></li>

            <?php 

if(isset($_SESSION['user']['user_id']) && isset($_GET['p']) && $_SESSION['user']['user_id']==$_GET['user_id'])

{?>

            <li><a href="<?php echo $me->template_url('setting.php?user_id='.$_SESSION['user']['user_id'].'&p=t');?>" class="setng <?php if(basename($_SERVER['PHP_SELF'])=='setting.php'){echo "active";}?>">Settings</a></li>
<?php if(isset($_SESSION['user']['w']) && $_SESSION['user']['w']=='w'){?>
             <li><a href="<?php echo $me->template_url('change-password.php?user_id='.$_SESSION['user']['user_id'].'&p=t');?>" class="pwd <?php if(basename($_SERVER['PHP_SELF'])=='change-password.php'){echo "active";}?>">Change Password</a></li>
             <?php }?>

            <li><a href="<?php echo $me->template_url('private-message.php?user_id='.$_SESSION['user']['user_id'].'&p=t');?>" class="msg <?php if(basename($_SERVER['PHP_SELF'])=='private-message.php'){echo "active";}?>">Private Messages</a></li>

            <?php }else{?>

            <li>&nbsp;</li>

             <li>&nbsp;</li>

         

             

            <?php }?>

        </ul>



    </div>

    <div class="spacer"></div>

   </div>