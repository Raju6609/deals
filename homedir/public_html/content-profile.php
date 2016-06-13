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

   		<?php  

$this->userdescription();?>

  	<div class="username_bg"><h2 class="user_name"><?php  /*if(isset($_SESSION['user']['name'])){echo $_SESSION['user']['name'];} */ echo $get_user[0]['name']?></h2>

    <p class="title_tag"><?php echo $get_user[0]['about_me']?></p>

    </div>

    <div class="main_active_area">

    <div class="module_form_profile">

    	<div class="row">

        	<h2 class="main_heading">Activity (0) <span><a href="#">View all</a></span></h2>

            <p class="main_active_txt">You currently have no Activity.</p>

        </div>

        <div class="row">

        	<h2 class="main_heading">Subscribed Threads (0) <span><a href="#">View all</a></span></h2>

            <p class="main_active_txt">You are not subscribed to any threads. </p>

        </div>

        <div class="row">

        	<h2 class="main_heading">Saved Deals (0) <span><a href="#">View all</a></span></h2>

            <p class="main_active_txt">You currently have no Activity.</p>

        </div>

        <div class="row">

        	<h2 class="main_heading">Following Users<span><a href="#">View all</a></span></h2>

            <p class="main_active_txt">You are not following any users. </p>

        </div>

    </div>

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