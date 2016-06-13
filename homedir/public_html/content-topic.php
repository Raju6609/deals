<?php if(isset($_SESSION['user']['user_id'])){$user_id=$_SESSION['user']['user_id'];}
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
		$limit = 3;
		$startpoint = ($page * $limit) - $limit;

?>

<div class="conty_bg">

<div class="inner">

<div class="conty_left">

<ul class="breadcrumb">

                    <li><a href="./">Home</a>>></li>

                    <li>

	<?php  $topic=array('select'=>'topic_name','where'=>'topic_id','where_value'=>$_GET['topic']);

			$gettopic= $me->select(TOPICS,$topic);

			echo $gettopic[0]['topic_name']?></li>

                    

               </ul>

<!--<p class="top_tab_txt">Hot Deals June 2014</p>-->

<div id="tabs">

<?php

	$data=array(

	'select'=>'*',	

	'where'=>'deal_topic',          

	'where_value'=>$_GET['topic'],	

	'orderby'=>'deal_modify_date',		

	'order'=>'desc',		

	'start_limit'=>"$startpoint",	
	'end_limit'=>"$limit"		

	);

	$resulet= $me->select(DEALS,$data);

	$num=$me->num_row(DEALS,$data);

	if($num>0){

?>

<ul>

<li><a href="#tabs-1">NEW</a></li>

<li><a href="#tabs-2">HOT</a></li>

</ul>

<?php }?>

<div id="tabs-1">



<?php 



	if($num>0){

	foreach($resulet as $v)

	{

		$hot_sql = @mysql_query("SELECT COUNT(*) FROM  ".VOTE." WHERE user_id = ".$user_id." and deal_id = ".$v['deal_id']." and vote='h'");

        $hot_count = @mysql_result($hot_sql, 0); 

		$cold_sql = @mysql_query("SELECT COUNT(*) FROM  ".VOTE." WHERE user_id = ".$user_id." and deal_id = ".$v['deal_id']." and vote ='c' ");

		$cold_count = @mysql_result($cold_sql, 0); 

?>

<div class="thread-content-wrapper">

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



<p class="comment">	<?php echo $v['deal_coment_count']?> Comments</p>



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

<div class="deal_pic"><a href="<?php echo $me->template_url('deal-details.php?deal='.$v['deal_slug']."&".$v['deal_id']);?>"><img src="<?php echo $v['deal_image_url']?>" /></a></div>

<a class="get_deal" href="view.php?d=<?php echo $v['deal_id']?>" target="_blank">Get Deal</a></div>

</div>

<?php }}else{?>

<div class="thread-content-wrapper">

<div class="thread-content">

<h2 class="title" style="text-align:center;">No Deal Yet.</h2>

</div>

</div>

<?php }echo $me->pager_topic(DEALS,$limit,$page,$_GET['topic'],$_GET['m'])?>

</div>

<div id="tabs-2">

<?php 

	$hot_data=array(

	'select'=>'*',	

	'where'=>'deal_hot_count',          

	'where_value'=>'>= 1',	

	'and'=>'deal_topic',          

	'and_value'=>$_GET['topic'],

	'orderby'=>'deal_id',		

	'order'=>'desc',		

	'start_limit'=>"$startpoint",	
	'end_limit'=>"$limit"		

	);

	$hot_resulet= $me->select(DEALS,$hot_data);

	$hot_num=$me->num_row(DEALS,$hot_data);

	if($hot_num>0){

	foreach($hot_resulet as $hot_v)

	{

		$hot_sql = @mysql_query("SELECT COUNT(*) FROM  ".VOTE." WHERE user_id = ".$user_id." and deal_id = ".$hot_v['deal_id']." and vote='h'");

        $hot_count = @mysql_result($hot_sql, 0); 

		$cold_sql = @mysql_query("SELECT COUNT(*) FROM  ".VOTE." WHERE user_id = ".$user_id." and deal_id = ".$hot_v['deal_id']." and vote ='c' ");

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



<p class="comment"><?php echo $hot_v['deal_coment_count']?> Comments</p>



<div class="user_bg">

<p class="posted_by" >Posted 

 <span class="timeago" title='<?php  echo $hot_v['deal_modify_date'] ?>'></span> by:</p>

<?php $user=array('select'=>'*','where'=>'user_id','where_value'=>$hot_v['user_id']);

			$getusername= $me->select(USERS,$user);?>

<a href="profile.php?user_id=<?php echo $hot_v['user_id']?>"><p class="user">

<img src="<?php echo $getusername[0]['profile_picture_url']?>" /><?php echo $getusername[0]['name']?>



            </p></a>

<?php if($hot_v['last_voted_at']!='0000-00-00 00:00:00'){ ?>

<p class="time_one">Last Voted <span class="timeago" title='<?php  echo $hot_v['last_voted_at'] ?>'>></span></p>

<?php }?>

</div>

</div>



<div class="deal-links">

<div class="deal_pic"><a href="<?php echo $me->template_url('deal-details.php?deal='.$hot_v['deal_slug']."&".$hot_v['deal_id']);?>"><img src="<?php echo $hot_v['deal_image_url']?>" /></a></div>

<a class="get_deal" href="view.php?d=<?php echo $hot_v['deal_id']?>" target="_blank">Get Deal</a></div>

</div>

<?php }}else{?>

<div class="thread-content-wrapper">

<div class="thread-content">

<h2 class="title" style="text-align:center;">No Hot Deal Yet For This Topic.</h2>

</div>

</div>

<?php }echo $me->pager_topic_hot(DEALS,$limit,$page,$_GET['topic'],$_GET['m']);?>

</div>

</div>



</div>



<?php $this->sidebar();?>

</div>

</div>