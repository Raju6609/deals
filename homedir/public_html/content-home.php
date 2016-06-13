<?php $user_id=$_SESSION['user']['user_id'];
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
		$limit = 15;
		$startpoint = ($page * $limit) - $limit;
?>

<div class="conty_bg">

<div class="inner">

<div class="conty_left">

<p class="top_tab_txt">Hot Deals June 2014</p>

<div id="tabs">

<ul>

<li><a href="#tabs-1">NEW</a></li>

<li><a href="#tabs-2">HOT</a></li>

</ul>

<div id="tabs-1">



<?php 

	$data=array(

	'select'=>'*',	

	'where'=>'',          

	'where_value'=>'',	

	'orderby'=>'deal_id',		

	'order'=>'desc',		

	'start_limit'=>"$startpoint",	
	'end_limit'=>"$limit"	

	);

	$resulet= $me->select(DEALS,$data);

	$sl=1;

	foreach($resulet as $v)

	{

		$hot_sql = mysql_query("SELECT COUNT(*) FROM  ".VOTE." WHERE user_id = ".$user_id." and deal_id = ".$v['deal_id']." and vote='h'");

        $hot_count = mysql_result($hot_sql, 0); 

		$cold_sql = mysql_query("SELECT COUNT(*) FROM  ".VOTE." WHERE user_id = ".$user_id." and deal_id = ".$v['deal_id']." and vote ='c' ");

		$cold_count = @mysql_result($cold_sql, 0); 

		

	

?>

<div class="thread-content-wrapper">

<!--voting-controls-opacity-->

<div class="voting-controls v_<?php echo $v['deal_id']?> <?php if($hot_count>=1 || $cold_count>=1){echo "voting-controls-opacity";}?>" >

<a class="<?php if(isset($_SESSION['user']['user_id']))

{?>hot h_<?php }?><?php  echo $v['deal_id']?>" style="cursor:<?php if($hot_count>=1 || $cold_count>=1){echo "not-allowed";}else{?>pointer;<?php }?>" id="<?php echo $v['deal_id']?>" <?php if(!isset($_SESSION['user']['user_id'])){?> href="login.php" <?php }?>>

<div id="gethot_<?php echo $v['deal_id']?>"><div class="voting-controls-hot">

<p class="hot_deg"><?php echo $v['deal_hot_count']?>&deg;</p>

</div></div>

</a>



<a class="cold h_<?php echo $v['deal_id']?>" style="cursor:<?php if($hot_count>=1 || $cold_count>=1){echo "not-allowed";}else{?>pointer;<?php }?>" id="<?php echo $v['deal_id']?>" <?php if(!isset($_SESSION['user']['user_id'])){?> href="login.php" <?php }?>><div class="voting-controls-cold"></div></a>

</div>



<div class="thread-content">

<h2 class="title"><a href="<?php echo $me->template_url('deal-details.php?deal='.$v['deal_slug']."&".$v['deal_id']);?>">

<?php echo $v['deal_title']?></a></h2>



<h2 class="txt"><?php echo $v['deal_desc']?></h2>



<p class="comment">	<a href="<?php echo $me->template_url('deal-details.php?deal='.$v['deal_slug']."&".$v['deal_id']);?>"><?php echo $v['deal_coment_count']?> Comments</a></p>



<div class="user_bg">

<p class="posted_by" >Posted 

 <span class="timeago" title='<?php  echo $v['deal_modify_date'] ?>'></span> by:</p>

<?php $user=array('select'=>'*','where'=>'user_id','where_value'=>$v['user_id']);

			$getusername= $me->select(USERS,$user);?>

<a href="profile.php?user_id=<?php echo $v['user_id']?>"><p class="user">

<img src="<?php echo $getusername[0]['profile_picture_url']?>" /><?php echo $getusername[0]['name']?>



            </p></a>

<?php if($v['last_voted_at']!='0000-00-00 00:00:00'){ ?>

<p class="time_one">Last Voted <span class="timeago" title='<?php  echo $v['last_voted_at'] ?>'>></span></p>

<?php }?>

</div>

</div>



<div class="deal-links">

<div class="deal_pic"><a href="<?php echo $me->template_url('deal-details.php?deal='.$v['deal_slug']."&".$v['deal_id']);?>" ><img src="<?php echo $v['deal_image_url']?>" /></a></div>

<a class="get_deal" href="view.php?d=<?php echo $v['deal_id']?>" target="_blank" >Get Deal</a></div>



</div>

<?php }echo $me->pager(DEALS,$limit,$page);?>



</div>



<div id="tabs-2">

<?php 

	$hot_data=array(

	'select'=>'*',	

	'where'=>'deal_hot_count',          

	'where_value'=>'>= 1',	

	'orderby'=>'deal_id',		

	'order'=>'desc',		

	'start_limit'=>'0',	

	'end_limit'=>'10000000'		

	);

	$hot_resulet= $me->select(DEALS,$hot_data);

	foreach($hot_resulet as $hot_v)

	{

		$hot_sql = mysql_query("SELECT COUNT(*) FROM  ".VOTE." WHERE user_id = ".$user_id." and deal_id = ".$hot_v['deal_id']." and vote='h'");

        $hot_count = mysql_result($hot_sql, 0); 

		$cold_sql = mysql_query("SELECT COUNT(*) FROM  ".VOTE." WHERE user_id = ".$user_id." and deal_id = ".$hot_v['deal_id']." and vote ='c' ");

		$cold_count = @mysql_result($cold_sql, 0); 

?>

<div class="thread-content-wrapper">

<div class="voting-controls v_<?php echo $hot_v['deal_id']?> <?php if($hot_count>=1 || $cold_count>=1){echo "voting-controls-opacity";}?>" >

<a class="vote_hot h_<?php echo $hot_v['deal_id']?>" style="cursor:<?php if($hot_count>=1 || $cold_count>=1){echo "not-allowed";}else{?>pointer;<?php }?>" id="<?php echo $hot_v['deal_id']?>">

<div id="gethot_<?php echo $hot_v['deal_id']?>"><div class="voting-controls-hot">

<p class="hot_deg"><?php echo $hot_v['deal_hot_count']?>&deg;</p>

</div></div>

</a>



<a class="vote_cold h_<?php echo $hot_v['deal_id']?>" style="cursor:<?php if($hot_count>=1 || $cold_count>=1){echo "not-allowed";}else{?>pointer;<?php }?>" id="<?php echo $hot_v['deal_id']?>"><div class="voting-controls-cold"></div></a>

</div>



<div class="thread-content">

<h2 class="title"><a href="<?php echo $me->template_url('deal-details.php?deal='.$hot_v['deal_slug']."&".$hot_v['deal_id']);?>"><?php echo $hot_v['deal_title']?></a></h2>



<h2 class="txt"><?php echo $hot_v['deal_desc']?></h2>



<p class="comment"><a href="<?php echo $me->template_url('deal-details.php?deal='.$hot_v['deal_slug']."&".$hot_v['deal_id']);?>"><?php echo $hot_v['deal_coment_count']?> Comments</p></a>



<div class="user_bg">

<p class="posted_by timeago" title='<?php  echo $hot_v['deal_modify_date'] ?>'></p>

<?php 

			$hot_user=array('select'=>'name','where'=>'user_id','where_value'=>$hot_v['user_id']);

			$get_hotusername= $me->select(USERS,$hot_user);?>

<a href="profile.php?user_id=<?php echo $hot_v['user_id'].'#'.$get_hotusername[0]['name']?>"><p class="user"><?php

			echo $get_hotusername[0]['name']?></p></a>



<?php if($hot_v['last_voted_at']!='0000-00-00 00:00:00'){ ?>

<p class="time_one">Last Voted <span class="timeago" title='<?php  echo $hot_v['last_voted_at'] ?>'>></span></p>

<?php }?>

</div>

</div>



<div class="deal-links">

<div class="deal_pic"><a href="<?php echo $me->template_url('deal-details.php?deal='.$hot_v['deal_slug']."&".$hot_v['deal_id']);?>"><img src="<?php echo $hot_v['deal_image_url']?>" /></a></div>

<a class="get_deal" href="view.php?d=<?php echo $hot_v['deal_id']?>" target="_blank" >Get Deal</a></div>

</div>

<?php }echo $me->pager_hot(DEALS,$limit,$page);?>



</div>



</div>

<!---->

</div>



<?php $this->sidebar();?>

</div>

</div>

