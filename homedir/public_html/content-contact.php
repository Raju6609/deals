<div class="conty_bg">
<div class="inner">
<div id="layout">
	<ul class="breadcrumb">
    	<li><a href="./">Home</a></li>
        <li>Contact us</li>
    </ul>

    <div class="layout_left">
    	<h2>Find Us</h2>
        <div id="map_canvas"></div>
        <h2>Message Us</h2>
        <form class="contact_form">
        	<div class="row">
            	<label>Your Name :</label>
                <input name="name" type="text" class="conct_txt_field" placeholder="Your name" required />
            </div>
            <div class="row">
            	<label>Your Email :</label>
                <input name="email" type="email" class="conct_txt_field" placeholder="Your Email Address" required />
            </div>
            <div class="row">
            	<label>Subject :</label>
                <input name="sub" type="text" class="conct_txt_field" placeholder="Your Subject" required />
            </div>
            <div class="row">
            	<label>Your Comments :</label>
                <textarea name="comment" cols="" rows="" class="conct_txt_field text_area" placeholder="Your Comments" required ></textarea>
            </div>
            <div class="row">
            	<input class="btn_send " type="submit" value="SEND MESSAGE" name="submit">
                <input class="btn_clear offset-2" type="reset" value="CLEAR MESSAGE" name="">
            </div><div id="resn"  style="float: left;margin-bottom: 0;margin-left: 276px;margin-top: -69px; width: 284px;"></div>
        </form>
    </div>
    <?php $this->sidebar();?>
    <div class="spacer"></div>
</div>
</div>
</div>