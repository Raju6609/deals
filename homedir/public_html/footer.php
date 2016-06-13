 <div class="footer">

<div class="share">

<div class="share_inner">

<h2>Share happiness with your loved ones</h2>



<ul class="share_link">

	<li><a href=""><img src="images/fb.jpg" />Facebook</a></li>

	<li><a href=""><img src="images/g+.jpg" />Google Plus</a></li>

	<li><a href=""><img src="images/p.jpg" />Pinterest</a></li>

	<li><a href=""><img src="images/twt.jpg" />Twitter</a></li>

	<li><a href=""><img src="images/rss.jpg" />Rss</a></li>

</ul>

</div>

</div>



<div class="inner">

<div class="spacer"></div>

<ul class="fot_menu">

	<li><a href="<?php echo $me->template_url('about.php');?>">About</a></li>

	<li><a href="<?php echo $me->template_url('help.php');?>">Help</a></li>

	<li><a href="<?php echo $me->template_url('contact.php');?>">Contact</a></li>

<!--	<li><a href="">Custom Settings</a></li>-->

	<li><a href="<?php echo $me->template_url('privacy.php');?>">Privacy Policy</a></li>

	<li><a href="<?php echo $me->template_url('#tabs-2');?>">Hot Deals Top Ten</a></li>

	<!--<li><a href="">Developer API</a></li>

	<li><a href="">Merchant List</a></li>-->

	<li><a href="">Popular Tags </a></li>

	<!--<li><a href="">Jobs</a></li>-->

    <?php if(!isset($_SESSION['user']['user_id'])){?>

	<li style="color:#FFF;"><a href="<?php echo $me->template_url('login.php');?>">Login </a></li>

    <?php }?>

</ul>



<a class="footer_logo" href="<?php echo $me->template_url();?>"><img alt="" src="images/footer_logo.png" /></a>



<p class="copyright">Copyright @ 2014 hot Deals. All rights reserved.</p>



<p class="copyright" style="margin-bottom:20px;">Powered by :<a href="http://codetechinfo.in/">Codetechinfo.in</a></p>

</div>

</div>

</div>



	<!--<script src="<?php //echo $me->template_url('js/amazingcarousel.js');?>"></script>-->

    <!--<script src="<?php //echo $me->template_url('js/initcarousel-1.js');?>">-->

    </script>

	<script src="<?php echo $me->template_url('js/SpryTabbedPanels.js');?>" type="text/javascript"></script>

    <script src="<?php echo $me->template_url('js/slugify.js');?>" type="text/javascript"></script>

   

<script src="<?php echo $me->template_url('js/deal.js');?>" type="text/javascript"></script>





  <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

 <script type="text/javascript">

  function scrollPageTo(myTarget, topPadding) {

    if (topPadding == undefined) {

        topPadding = 0;

    }

    var moveTo = $(myTarget).offset().top - topPadding;

    $('html, body').stop().animate({

        scrollTop: moveTo

    }, 1000);

  }

</script>



<script>

jQuery(function($) {

  $('#deal_slug').slugify('#deal_title'); // Type as you slug

});

</script>

 <script>

$(function() {

$( "#tabs,#tabs1" ).tabs({

beforeLoad: function( event, ui ) {

ui.jqXHR.error(function() {

ui.panel.html(

"Couldn't load this tab. We'll try to fix this as soon as possible. " +

"If this wouldn't be a demo." );

});

}

});

});

</script>

<script type="text/javascript" src="admin/assets/js/minified/jquery.livequery.js"></script>

<script type="text/javascript" src="admin/assets/js/minified/jquery.timeago.js"></script>

<script>

$(document).ready(function(){

$(".timeago").livequery(function() 

{ 

	$(this).timeago(); 

});	

});



function popitup(url) {

newwindow=window.open(url,'name','height=500,width=500');

if (window.focus) {newwindow.focus()}

return false;

}

</script>

<!--//////msg tab////-->

  <script src="<?php echo $me->template_url('js/jquery.hashchange.min.js')?>" type="text/javascript"></script>

  <script src="<?php echo $me->template_url('js/jquery.easytabs.min.js')?>" type="text/javascript"></script>

 <script type="text/javascript">

    $(document).ready( function() {

      $('#tab-container').easytabs();

    });

  </script>

   <script src="https://maps.googleapis.com/maps/api/js"></script>

 <script>

      function initialize() {

        var map_canvas = document.getElementById('map_canvas');

        var map_options = {

          center: new google.maps.LatLng(44.5403, -78.5463),

          zoom: 8,

          mapTypeId: google.maps.MapTypeId.ROADMAP

        }

        var map = new google.maps.Map(map_canvas, map_options)

      }

      google.maps.event.addDomListener(window, 'load', initialize);

    </script>

    <script type="text/javascript" src="<?php echo $me->template_url('js/jquerypp.custom.js')?>"></script>

		<script type="text/javascript" src="<?php echo $me->template_url('js/jquery.elastislide.js')?>"></script>

		<script type="text/javascript">

			

			$( '#carousel' ).elastislide();

			

		</script>

<!-- End of head section HTML codes -->

</body>

</html>