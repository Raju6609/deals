<div class="conty_bg">

    	<div class="inner">

        	<div class="share_area">

            	<div class="share_header">

                	<h2>Share a Deal Here</h2>

                    <!--<ul class="social_share">

                    	<li><a href=""><img src="images/f1.png" /></a></li>

                        <li><a href=""><img src="images/t1.png" /></a></li>

                        <li><a href=""><img src="images/p1.png" /></a></li>

                    </ul>-->

               </div>

               

               <form class="share_form" id="share_frm" method="post" enctype="multipart/form-data">

              

               <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);}?>

            

               	<div class="left_form">

                	<div class="row dealurl">

                    	<label class="label">Deal URL *</label>

                        <span class="error_txt del_text"></span>

                       	<input name="deal_url" id="deal_url" type="text" class="txtfield full" />

                    </div>

                    <div class="row dealdealtitle">

                    	<label class="label">Title *</label>

                        <span class="error_txt">This field is require</span>

                       	<input name="deal_title" id="deal_title" type="text" class="txtfield full" placeholder="Remember to include the price and merchant name" />

                        <input name="deal_slug" type="hidden" id="deal_slug" value="" />

                    </div>

                    <div class="row dealprice">

                    	<label class="label">Price (£) *</label>

                        <span class="error_txt del_price"></span>

                       	<input name="deal_price" id="deal_price" type="text" class="txtfield half" placeholder="0" />

                        <span class="if">(enter 0 if this does not have a price)</span>

                    </div>

                    <div class="row del_topic">

                    	<label class="label">Topic *</label>

                        <span class="error_txt">This field is require</span>

                       	<select name="deal_topic" id="deal_topic" class="select_box full">

                        <option value="" checked="checked">------Select a topic-----</option>

                          <?php 

					      $data=array(

						  'select'=>'*',	

						  'orderby'=>'serial',		

						  'order'=>'asc',		

						  'start_limit'=>'0',	

						  'end_limit'=>'10000000'		

						   );

					  $resulet= $me->select(TOPICS,$data);

				      foreach($resulet as $v){?>

                <option value="<?php echo $v['topic_id']?>"><?php echo $v['topic_name']?></option>

				<?php }?>

                        

                       </select>

                        

                    </div>

                    <div class="row">

                    	<label class="label">Description</label>

                       	<textarea name="deal_desc" cols="" rows="" class="txtfield full height"></textarea>

                    </div>

                    <!--<div class="row">

                    	<label class="label">

                        <input name="deal_rcv_email_update" type="checkbox" value="yes" checked  class="check_box"/>

                        <span class="check_txt">Receive email updates for replies</span>

                        </label>

                    </div>-->

                   <!-- <div class="row">

                    	<p class="dont">You don't need an account to share a deal. Just enter your email address. We'll keep it private.</p>

                    </div>

                    <div class="row">

                    	<label class="label">Email</label>

                       	<input name="deal_email" type="text" value="" class="txtfield full" placeholder="" />

                    </div>-->

                    <div class="row">

                    	<input name="dealsubmit" type="submit" value="SUBMIT DEAL" class="login_btn" />

                        <span class="require"> * Required field</span>

                    </div>

                </div>

                <div class="right_form">

                	<h2 class="optional">Optional fields</h2>

                    <div class="row">

                    	<!--<div class="upload_pic_box">

                        

                            upload an image

                        </div>-->

                        <label class="label">Upload Image....</label>

                        <input name="deal_image" type="file" class="file" />

                       <!-- <label class="label">OR</label>

                        <input name="" type="text" class="txtfield full" placeholder="enter an image url" />-->

                    </div>

                    <div class="row">

                    <label class="label">Tags</label>

                    <input name="deal_tag" type="text" class="txtfield full" placeholder="" />

                    </div>

                    <div class="row">

                    <label class="date_label">

                    <span  class="date_span">Start Date</span>

                    <input name="deal_start_date" type="text" class="txtfield full" id="datepicker" />

                    </label>

                    <label class="date_label">

                    <span  class="date_span">End Date</span>

                    <input name="deal_end_date" type="text" class="txtfield full" id="datepicker1" />

                    </label>

                    </div>

                </div>

               </form>

            </div>

        </div>

    </div>