<?php

if(isset($_GET['user_id']))

{

	$user_id=$_GET['user_id'];

}

/*if(isset($_SESSION['user']['user_id']))

{

	$user_id=$_SESSION['user']['user_id'];

}

else

{

	$user_id=$_GET['user_id'];

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

<div class="conty_bg">

<div class="inner">

<div id="layout">

   <?php $this->userleftbar();?>

   <div class="helpful_right">

   	<?php $this->userdescription();?>

  	<div class="username_bg"><h2 class="user_name"><?php  /*if(isset($_SESSION['user']['name'])){echo $_SESSION['user']['name'];} */ echo $get_user[0]['name']?></h2>

    <p class="title_tag"><?php echo $get_user[0]['about_me']?></p></div>

    <div class="main_active_area">

    	<form id="" class="module_form_profile" method="post">

        <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];}unset($_SESSION['msg']);?>

           <div class="row">

             <label class="label_profile">Old Password</label>

             <input type="password" class="profile_txt_box" placeholder="Old Password" id="" name="old_pass" required="required">

           </div>

           <div class="row">

             <label class="label_profile">New Password</label>

             <input type="password" class="profile_txt_box" placeholder="New Password" id="" name="pass" required="required">

           </div>

           <div class="row">

             <label class="label_profile">Confirm New Password</label>

             <input type="password" class="profile_txt_box" placeholder="Confirm New Password" id="" name="c_pass" required="required">

           </div>

           <div class="row">

            	<input class="btn_send offset-3 " type="submit" value="SAVE CHANGES" name="change_pass">

                <input class="btn_clear offset-2" type="reset" value="CLEAR CHANGES" name="reset">

            </div>

        </form>

        <div class="share_deal_profile">

		<h2><a href="<?php echo $me->template_url('share-deal.php#Share a Deal');?>">POST A DEAL</a></h2>

        <div class="gift_div_profile">

            <p class="gift_txt_profile">Guaranteed Gifts for Hot Deals</p>

            <img src="images/gift.png" />

        </div>

        </div>

    </div>

   </div>

<div class="spacer"></div>

</div>

</div>

</div>