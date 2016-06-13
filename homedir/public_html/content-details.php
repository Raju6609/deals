<?php

$user_id="";

if(isset($_SESSION['user']['user_id']))

{

$user_id=$_SESSION['user']['user_id'];

}

$data=array(

	'select'=>'*',	

	'where'=>'deal_slug',          

	'where_value'=>$_GET['deal'],	

	);

	$resulet= $me->select(DEALS,$data); 

	//echo $me->deal_url($_GET['deal']);

	

	

		$hot_sql = mysql_query("SELECT COUNT(*) FROM  ".VOTE." WHERE user_id = ".$user_id." and deal_id = ".$resulet[0]['deal_id']." and vote='h'");

        $hot_count = @mysql_result($hot_sql, 0); 

		$cold_sql = mysql_query("SELECT COUNT(*) FROM  ".VOTE." WHERE user_id = ".$user_id." and deal_id = ".$resulet[0]['deal_id']." and vote ='c' ");

		$cold_count = @mysql_result($cold_sql, 0); 

?>

<div class="conty_bg">

    	<div class="inner">

        	<div class="share_area">

            	<ul class="breadcrumb">

                    <li><a href="./">Home</a>>></li>

                    <li><a href="<?php echo $me->template_url('topic-deal.php?topic='.$resulet[0]['deal_topic']);?>">

	<?php  $topic=array('select'=>'topic_name','where'=>'topic_id','where_value'=>$resulet[0]['deal_topic']);

			$gettopic= $me->select(TOPICS,$topic);

			echo $gettopic[0]['topic_name']?></a>>></li>

                    <li><a  class="active"><?php echo substr($resulet[0]['deal_title'],0,50);?> </a></li>

               </ul>

               <div class="conty_left">

               	<div class="thread-content-wrapper">

                  <div class="voting-controls v_<?php echo $resulet[0]['deal_id']?> <?php if($hot_count>=1 || $cold_count>=1){echo "voting-controls-opacity";}?>" >

<a class="<?php if($user_id){echo "hot";}?> vote_hot h_<?php echo $resulet[0]['deal_id']?>" style="cursor:<?php if($hot_count>=1 || $cold_count>=1){echo "not-allowed";}else{?>pointer;<?php }?>" id="<?php echo $resulet[0]['deal_id']?>" <?php if(!$user_id){?> href="login.php"<?php }?>>

<div id="gethot_<?php echo $resulet[0]['deal_id']?>"><div class="voting-controls-hot">

<p class="hot_deg"><?php echo $resulet[0]['deal_hot_count']?>&deg;</p>

</div></div>

</a>



<a class="<?php if($user_id){echo "cold";}?> vote_cold h_<?php echo $resulet[0]['deal_id']?>" style="cursor:<?php if($hot_count>=1 || $cold_count>=1){echo "not-allowed";}else{?>pointer;<?php }?>" id="<?php echo $resulet[0]['deal_id']?>" <?php if(!$user_id){?> href="login.php"<?php }?>><div class="voting-controls-cold"></div></a>

</div>

                    <div class="thread-content_deails">

                    	<h2 class="title"><?php echo $resulet[0]['deal_title'];?></h2>

     					<div class="row">

                        	<div class="user_nm_bg">

                            <?php 

			$user=array('select'=>'*','where'=>'user_id','where_value'=>$resulet[0]['user_id']);

			$getusername= $me->select(USERS,$user);?>

                            <p class="user"><a href="profile.php?user_id=<?php echo $resulet[0]['user_id'] ?>"><img src="<?php echo $getusername[0]['profile_picture_url']?>" />

			<?php echo $getusername[0]['name']?></a></p>

                           <!-- <span class="designation">[Designation]</span>-->

                            </div>

                            <div class="time_bg">

                            	<?php if($resulet[0]['last_voted_at']!='0000-00-00 00:00:00'){ ?>

<p class="time">Last Voted <span class="timeago" title='<?php  echo $resulet[0]['last_voted_at'] ?>'></span></p>

<?php }?>

                            </div>

                        </div>

                        <div class="row">

                        	<div class="other_bg">

                            	<ul class="all_ul">

                                	<li>

                                    	<p class="share_txt">Share This Deal :</p>

                                        <ul class="share_ul">

                                        	<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $me->deal_url($_GET['deal'])?>" onclick="return popitup(this.href)"><img src="images/fb1.png" /></a></li>

                                            <li><a href="https://twitter.com/home?status=<?php echo $me->deal_url($_GET['deal'])?>" onclick="return popitup(this.href)"><img src="images/twt1.png" /></a></li>

                                            <li><a href="https://plus.google.com/share?url=<?php echo $me->deal_url($_GET['deal'])?>" onclick="return popitup(this.href)"><img src="images/g+1.png" /></a></li>

                                        </ul>

                                    </li>

                                   <!-- <li class="review"><a href="">Write a Review</a></li>-->

                                    <?php if(!isset($_SESSION['user']['user_id'])){?>

                                    <li><a href="javascript:void(o)" id="clickme">Subscribe to Comments</a></li><?php }?>

                                    

                                    <li><a href="javascript:void(o)"  onclick="scrollPageTo('.scrollTarget', 150)">Quote</a></li>

                                    

                                </ul>

                            </div>

                        </div>

                        <div class="row">

                        	<div class="details_header_bg">

                            	<h2>Deal Details</h2>

                                <!--<div class="rating">

                                	<p class="rating_txt">Your Rating</p>

                                    <img src="images/star.jpg" />

                                </div>-->

                            </div>

                            <p class="details_txt"><?php echo $resulet[0]['deal_desc']?>

</p>

                        </div>

                    </div> 

                </div>

               </div>

               <div class="conty_right">

               	<div class="deal-links_details">

                    	<div class="deal_pic">

                        	<a href="view.php?d=<?php echo $resulet[0]['deal_id']?>" target="_blank"><img src="<?php echo $resulet[0]['deal_image_url']?>"></a>

                        </div>

                        <a href="view.php?d=<?php echo $resulet[0]['deal_id']?>" target="_blank" class="get_deal">Get Deal</a>

                    </div>

                <!--<div class="row">

                	<p class="more_deal">More from Stud Earrings</p>

                    <p class="more_exmpl"><a href="#">Lorem ipsum</a></p>

                </div>-->

                <div class="row">

                	<p class="more_deal">Deal Tags :</p>

                    <p class="tag"><a href="#"><?php echo $resulet[0]['deal_tag']?></a></p>

                </div>

               </div>

               <div class="spacer"></div>

               <div class="comment_area">

               	<div class="details_header_bg">

                   <h2>All Comments(<?php echo $resulet[0]['deal_coment_count'];?>)</h2>

                    <a href="javascript:void(o)" onclick="scrollPageTo('.scrollTarget', 150)"><p class="post_comments">Post a comment</p></a>   

                </div>

                <?php 

				

				$comments=array(

				'select'=>'*',	

				'where'=>'deal_id',          

				'where_value'=>$resulet[0]['deal_id']	

				);

				$get_comment= $me->select(COMMENT,$comments); 

				$num=$me->num_row(COMMENT,$comments);

				if($num>0){

				foreach($get_comment as $user)

				{

				$users=array('select'=>'*',	

				'where'=>'user_id',          

				'where_value'=>$user['user_id']	);

				$get_user_info= $me->select(USERS,$users); 

				?>

                <div class="comment_box">

                	<div class="user_pic">

                    	<a href="profile.php?user_id=<?php echo $get_user_info[0]['user_id'];if($user_id){echo '&p=t';}?>"><img src="<?php echo $get_user_info[0]['profile_picture_url']?>" /></a>

                    </div>

                    <div class="comment_txt_area">

                    	<div class="user_nm_area">

                        	<a href="profile.php?user_id=<?php echo $get_user_info[0]['user_id'];if($user_id){echo '&p=t';}?>"><p class="user_nm"><?php echo $get_user_info[0]['name'];?><!--<span class="">[CEO]</span>--></p></a>

                            <p class="post_time timeago" title="<?php echo $user['commented_at'];?>"></p>

                        </div>

                        <p class="comment_details"><?php echo $user['comments'];?></p>

                    </div>

                </div>

                <?php }}else{?>

               <div class="comment_box">

                	<div class="user_pic">

                    	&nbsp;

                    </div>

                    <div class="comment_txt_area">

                    	<div class="user_nm_area">

                        	<p class="user_nm">&nbsp;</p>

                            <p class="post_time">&nbsp;</p>

                        </div>

                        <p class="comment_details"> No Comments Yet for this deal.</p>

                    </div>

                </div>

               <?php }?>

                <!-- 

                <div class="comment_box">

                	<div class="user_pic">

                    	<a href="#"><img src="images/user1.jpg" /></a>

                    </div>

                    <div class="comment_txt_area">

                    	<div class="user_nm_area">

                        	<p class="user_nm">Jas Nmmau<span class="">[CEO]</span></p>

                            <p class="post_time">14 hours, 47 minutes ago</p>

                        </div>

                        <p class="comment_details">It's Fashion Friday at Cents of Style and they have some really adorable earrings on sale for as low as $3.32 per pair plus FREE shipping with promo code MAY50 at checkout</p>

                    </div>

                </div>

                <div class="comment_box">

                	<div class="user_pic">

                    	<a href="#"><img src="images/user1.jpg" /></a>

                    </div>

                    <div class="comment_txt_area">

                    	<div class="user_nm_area">

                        	<p class="user_nm">Jas Nmmau<span class="">[CEO]</span></p>

                            <p class="post_time">14 hours, 47 minutes ago</p>

                        </div>

                        <p class="comment_details">It's Fashion Friday at Cents of Style and they have some really adorable earrings on sale for as low as $3.32 per pair plus FREE shipping with promo code MAY50 at checkout</p>

                    </div>

                </div>

                <div class="comment_box">

                	<div class="user_pic">

                    	<a href="#"><img src="images/user1.jpg" /></a>

                    </div>

                    <div class="comment_txt_area">

                    	<div class="user_nm_area">

                        	<p class="user_nm">Jas Nmmau<span class="">[CEO]</span></p>

                            <p class="post_time">14 hours, 47 minutes ago</p>

                        </div>

                        <p class="comment_details">It's Fashion Friday at Cents of Style and they have some really adorable earrings on sale for as low as $3.32 per pair plus FREE shipping with promo code MAY50 at checkout</p>

                    </div>

                </div>-->

                 <div class="spacer"></div>

               </div>

               

               <div class="comment_area scrollTarget" id="ccc">

               <!--<a name="Coment"></a>-->

               	<div class="details_header_bg">

                   <h2>Post a Comment</h2>     

                </div>

                	<div class="comment_left">

                    	<img src="images/post_user_pic.jpg" alt="" />

                    </div>

                    <div class="comment_right">

                    	<form class="post_comment_form" <?php if(isset($_SESSION['user']['user_id'])){?> style="width:100%;" <?php }?> method="post">

                        <input type="hidden" name="deal_id" value="<?php echo $resulet[0]['deal_id']?>" />

                        	<!--<div class="row">

                            	<label class="label">Email</label>

                                <input name="" type="text" class="textfield" placeholder="Your Email Id" />

                            </div>-->

                            <div class="row">

                            	<label class="label">Comment</label>

                                <textarea name="comments" cols="" rows="" placeholder="Your Comment" class="textfield height"></textarea>

                            </div>

                            <!--<div class="row">

                            	<label>

                                <input name="" type="checkbox" value="" checked />

                                <span class="check_txt">Receive email updates for replies</span>

                                </label>

                            </div>-->

                            <div class="row">

                            <?php if(!isset($_SESSION['user']['user_id'])){?> <input name="" type="button" value="POST COMMENT" class="post_btn disabled" disabled="disabled" /> <?php }else{?>

                            	<input name="submit" type="submit" value="POST COMMENT" class="post_btn"  /><?php }?>

                            </div>

                        </form>

                        <?php if(!isset($_SESSION['user']['user_id'])){?>

                        <!--<div class="or_using">

                        	<p class="or">---------------OR---------------</p>

                            <p class="or_txt">comment using your social account</p>

                            <a href="" class="conect_pic full"><img src="images/facebook.png" /></a>

                            <a href="" class="conect_pic full"><img src="images/twitter.png" /></a>

                        </div>-->

                        <?php }?>

                    </div>

                <div class="spacer"></div>

               </div>

            </div>

        </div>

    </div>