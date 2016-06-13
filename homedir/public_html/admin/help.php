<?php include('head.php');
if(isset($_POST['update']))
{
	
	$data=array("help_content"=>mysql_real_escape_string($_POST['ab']));
	$f=array("help_id"=>1);
	$me->update(HELP,$data,$f);
	header("location:help.php");
}
?>

    <body class="fixed-sidebar fixed-header">
        

        <div id="loading" class="ui-front loader ui-widget-overlay bg-white opacity-100">
            <img src="assets/images/loader-dark.gif" alt="">
        </div>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div id="page-wrapper" class="demo-example">

            <?php include('sidebar.php');?><!-- #page-sidebar -->
            
            <div id="page-main">

                <div id="page-main-wrapper">

                    <?php include('header.php');?> <!-- #page-header -->
					<div id="page-breadcrumb-wrapper">
                        <div id="page-breadcrumb">
                            <a href="dashboard.php" title="Dashboard">
                                <i class="glyph-icon icon-users"></i>
                                Dashboard
                            </a>
                          <!--  <a href="javascript:;" title="Elements">
                                <i class="glyph-icon icon-laptop"></i>
                                Elements
                            </a>-->
                            <span class="current">
                               Help
                            </span>
                        </div>
                        
                    </div> <!-- #page-breadcrumb-wrapper -->
                    
                    <div id="page-content">
                 
					
					<div class="content-box box-toggle mrg10T mrg10L mrg10R  ">
            <h3 class="content-box-header ui-state-default">
               
                <i class="glyph-icon icon-plus mrg10L toggle-button"></i>
                <span class="float-left toggle-button">Help Content</span>
         
            </h3><!--scrollable-content scrollable-medium-->
            <div class="content-box-wrapper " style="">
        <div class="form-row pad0B row">
            
                <div class="form-input col-md-12">
                <?php
				$getadata=array(
				  'select'=>'*',	
				  'where'=>'help_id',          
				  'where_value'=>1,	
				   );
				  $updated= $db->select(HELP,$getadata);
			
				?>
                    <form method="post">
<textarea class="large-textarea" name="ab"><?php echo $updated[0]['help_content']?></textarea>
                     <div class="form-input col-md-3 mrg20T">

                           <button type="submit" class="btn medium primary-bg text-transform-upr font-bold font-size-11 radius-all-4" id="demo-form-valid" title="Validate!" name="update">

                                <span class="button-content">

                                   <!--<i class="glyph-icon icon-upload"></i>--> Save Changes

                                </span>

                            </button>
                </div>
</form>
            </div>
</div></div>
    				
					



                	</div><!-- #page-content -->
	            </div><!-- #page-main -->
            </div><!-- #page-main-wrapper -->
        </div><!-- #page-wrapper -->

    </body>
    
<script>
    
</script>
</html>
