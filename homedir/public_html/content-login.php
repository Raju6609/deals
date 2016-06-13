<?php


?>
<div class="conty_bg">

    	<div class="inner">
			<?php if($_GET['fpass']){?>
            <div class="conty_left">

				<h2 class="login_header" style="margin-bottom:15px;">Foget Password</h2>

                   <form class="login_form" method="post"><?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);}?>

                	<div class="row text_box_bg">

                    	<img src="images/email.png" />

                        <input name="getpass" type="email" class="search_box" placeholder="Type Your Mail To get Password" required="required"/>

                    </div>
                     <div class="row">

                     <input name="forgetpass" type="submit" value="Get Password" class="login_btn_new">

                     </div>

                     <div class="row">

                     

                     </div>

                </form>

                

  			</div>
            <?php }else{?>
        	<div class="conty_left">

				<h2 class="login_header">Log into HOT DEALS</h2>

                <div class="or_using login_with">

                    <p class="or_txt">Login with your social account</p>
<?php echo '<a href="https://www.facebook.com/dialog/oauth?client_id='.CLIENT.'&redirect_uri='.CURL.'&scope=email,user_likes,publish_stream"><img src="images/facebook.png" class="conect_pic" /></a>';?>
                   <!-- <a href="<?php //echo $loginUrl;?>" class="conect_pic"><img src="images/facebook.png" /></a>-->

                    <a href="?tlogin&oauth_provider=twitter" class="conect_pic"><img src="images/twitter.png" /></a>
                       <a href="<?php echo GURL?>" class="conect_pic"><img src="images/g+.png" /></a>

                </div>

                <p class="new_or">OR</p>

                <p class="new_or">Login with your hot deals account</p>

                 

                <form class="login_form" method="post"><?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);}?>

                	<div class="row text_box_bg">

                    	<img src="images/email.png" />

                        <input name="uname" type="text" class="search_box" placeholder="Username"/>

                    </div>

                    <div class="row text_box_bg">

                    	<img src="images/lock_1.png" />

                        <input name="pass" type="password" class="search_box" placeholder="Password"/>

                    </div>

                    <!--<div class="row">

                    <label>

                    <input name="" type="checkbox" value="" checked="">

                     <span class="check_txt">Receive email updates for replies</span>

                     </label>

                     </div>-->

                     <div class="row">

                     <input name="loginform" type="submit" value="LOG IN" class="login_btn_new">

                     </div>

                     <div class="row">

                     <span class="check_txt"><a href="?fpass=1">Forgot your password</a></span>

                     </div>

                </form>

                <div class="row">

                	<p class="not_yet">Not a Member Yet?</p>

                    <p class="not_yet_txt">It's free and easy to join hot deals.</p>

                    <p class="not_yet_txt">Escape from the marketing messages and ads that surround us and get genuine advice from other people about hot deals.</p>

                    <p class="not_yet_txt">Membership is 100% Free. There is no need to pay retail price. Join the hot deals community now.</p>

                </div>

  			</div>
			<?php }?>
            <?php $this->sidebar();?>

        </div>

    </div>

    