<?php if(isset($_SESSION['user']['user_id'])){$user_id=$_SESSION['user']['user_id'];}?>

<div class="conty_bg">

<div class="inner">

<div class="conty_left">



<div id="tabs">



<div id="tabs-1">

<?php 

$s=trim($_POST['s']);

if($s!="")

{

	$val=$s;

	$search_qry=mysql_query("select * from ".DEALS." where deal_url like '%".$val."%' or deal_title like '%".$val."%' or deal_desc like '%".$val."%' order by deal_id desc");





//echo $search_qry;die;

if(mysql_num_rows($search_qry)>0){

while($v=mysql_fetch_array($search_qry))

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

<div class="deal_pic"><a href="view.php?d=<?php echo $v['deal_id']?>" target="_blank"><img src="<?php echo $v['deal_image_url']?>" /></a></div>

<a class="get_deal" href="view.php?d=<?php echo $v['deal_id']?>" target="_blank">Get Deal</a></div>

</div>

<?php }}else{?><div class="search_result"><span>No Data Found</span>

<form class="top_form" style="height:44px;" action="search.php" method="post"><input class="again_search" name="s" placeholder="Search Here..." type="text" /> <input class="search_btn again_search_btn" name="submit" type="submit" /></form>

</div><?php }?>

</div>



</div>

<?php if(mysql_num_rows($search_qry)>0){?>

<div class="pagination">

<ul class="pager">

	<li><a href="">&lt;</a></li>

	<li><a href="">1</a></li>

	<li><a class="selected" href="">2</a></li>

	<li><a href="">3</a></li>

	<li><a href="">4</a></li>

	<li><a href="">5</a></li>

	<li><a href="">6</a></li>

	<li><a href="">&gt;</a></li>

</ul>

</div>

<?php }}?>

</div>



<?php $this->sidebar();?>

</div>

</div>

