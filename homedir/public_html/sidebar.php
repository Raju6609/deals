<div class="conty_right">

<div class="share_deal">

<h2><a href="<?php echo $me->template_url('share-deal.php#Share a Deal');?>">POST A DEAL</a></h2>



<div class="gift_div">

<p class="gift_txt">Guaranteed Gifts for Hot Deals</p>

<img src="images/gift.png" /></div>

</div>



<div class="hottest_deal">

<h2 class="heading">Hottest Deals</h2>



<p class="more"><a href="">See all</a></p>







<div id="tabs1">

<ul>

<li><a href="#tabs-1">Today</a></li>

<li><a href="#tabs-2">Week</a></li>

<li><a href="#tabs-3">Month</a></li>

</ul>

<div id="tabs-1">

<ul class="today_deal">

<?php

$day_sql=mysql_query("SELECT * FROM ".DEALS." WHERE DATE( `last_voted_at` ) = CURDATE( ) AND `deal_hot_count` >=1

LIMIT 0 , 30");

//echo $day_sql;die;

$day_num=mysql_num_rows($day_sql);

//echo $day_num;

if($day_num>0){

while($day_row=mysql_fetch_array($day_sql))

{

?>

	<li><a href="<?php echo $me->template_url('deal-details.php?deal='.$day_row['deal_slug']."&".$day_row['deal_id']);?>" title="<?php echo $day_row['deal_title']?>"><span><?php echo $day_row['deal_hot_count']?>&deg;</span> <?php echo $day_row['deal_title']?></a></li>

	<?php }}else{?>

    No Deal Yet For Today

    <?php }?>

</ul>

</div>

<div id="tabs-2">

<ul class="today_deal">

<?php

$week_sql=mysql_query("SELECT  * FROM ".DEALS." WHERE YEARWEEK( `last_voted_at` ) = YEARWEEK(CURRENT_DATE ) and `deal_hot_count` >=1 LIMIT 0 , 30");

$week_num=mysql_num_rows($week_sql);

if($week_num>0){

while($week_row=mysql_fetch_array($week_sql))

{

?>

	<li><a href="<?php echo $me->template_url('deal-details.php?deal='.$week_row['deal_slug']."&".$week_row['deal_id']);?>" title="<?php echo $week_row['deal_title']?>"><span><?php echo $week_row['deal_hot_count']?>&deg;</span> <?php echo $week_row['deal_title']?></a></li>

	<?php }}else{?>

    No Deal Yet For This Week

    <?php }?>	

</ul>

</div>

<div id="tabs-3">

<ul class="today_deal">

<?php

$month_sql=mysql_query("SELECT * FROM ".DEALS." WHERE YEAR( `last_voted_at` ) = YEAR( CURDATE( ) ) AND MONTH( `deal_modify_date` ) = MONTH( CURDATE( ) ) AND `deal_hot_count` >=1

LIMIT 0 , 30");

$month_num=mysql_num_rows($month_sql);

if($month_num>0){

while($month_row=mysql_fetch_array($month_sql))

{

?>

	<li><a href="<?php echo $me->template_url('deal-details.php?deal='.$month_row['deal_slug']."&".$month_row['deal_id']);?>" title="<?php echo $month_row['deal_title']?>"><span><?php echo $month_row['deal_hot_count']?>&deg;</span> <?php echo $month_row['deal_title']?></a></li>

	<?php }}else{?>

    No Deal Yet For THis Month

    <?php }?>	

	

</ul>

</div>

</div>



</div>


<?php /*?>
<div class="offer"><img src="<?php echo $me->template_url('images/offer.png')?>" /> <img src="<?php echo $me->template_url('images/offer1.jpg')?>" /></div><?php */?>



<div class="newsletter">

<h2>Receive the latest hot deals &amp; News Letter by email!</h2>



<form class="signup" id="news_letter" method="post"><input class="newsletter_textbox" name="news_email" placeholder="Enter your email address" type="email" required="required" /> <input class="sub_btn" name="submit" type="submit" value="Subscribe" /><span class="news_loader" id="res"></span></form>

</div>

</div>