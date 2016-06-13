<?php include('head.php');
if($_GET['action']=="add")
{
	mysql_query("insert into ".TOPICS." set status='1',topic_name='".$_POST['topic_name']."'");
	header("location:topics.php");
}
if($_GET['action']=="delete")
{
	$data=array("where"=>"topic_id","where_value"=>$_GET['topic_id']);
	$me->delete(TOPICS,$data);
	header("location:topics.php");
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
                                <i class="glyph-icon icon-paste"></i>
                                Dashboard
                            </a>
                          <!--  <a href="javascript:;" title="Elements">
                                <i class="glyph-icon icon-laptop"></i>
                                Elements
                            </a>-->
                            <span class="current">
                                Topics
                            </span>
                        </div>
                        <div class="float-right">
                            
                            <div class="dropdown">
                                <a href="javascript:;" class="btn medium bg-blue" title="Example dropdown" data-toggle="dropdown">
                                    <span class="button-content">
                                        <i class="glyph-icon icon-plus float-left"></i>
                                        <i class="glyph-icon icon-caret-down float-right"></i>Add New
                                    </span>
                                </a>
                                <div class="dropdown-menu pad0A float-right">
                                    <div class="medium-box">
                                        <div class="bg-gray text-transform-upr font-size-12 font-bold font-gray-dark pad10A">Add New Topic</div>
                                        <div class="pad10A">
                                           
                                            <div class="divider mrg10T mrg10B"></div>

                                                <form id="demo-form" action="<?php $_SERVER['PHP_SELF']?>?action=add" class="col-md-12" method="post">
                                                    <div class="form-row">
                                                        <div class="form-label col-md-4">
                                                            <label for="">
                                                                Topic Name:
                                                                
                                                            </label>
                                                        </div>
                                                        <div class="form-input col-md-8">
                                             <input type="text" id="topic_name" name="topic_name" >
                                                        </div>
                                                    </div>
                                                  
                                                    <div class="form-row">
                                                       <div class="form-input col-md-4 mrg20L">
                            <button type="submit" class="btn large primary-bg text-transform-upr font-bold font-size-11 radius-all-4" id="demo-form-valid" title="Validate!">
                                <span class="button-content">
                                    Add
                                </span>
                            </button>
                            </div>
                                                    </div>

                                                </form>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- #page-breadcrumb-wrapper -->
                    
                    <div id="page-content">
                    <div id="response"></div>
					<div id="respon" class="infobox clearfix infobox-close-wrapper success-bg mrg20B col-md-6" style="display:none;"><a href="#" title="Close Message" class="glyph-icon infobox-close icon-remove"></a>Topics Saved Successfully</div>
<div class="clearfix"></div>
	<!--<div class="example-box col-md-6 col-md-offset-3">
    <div class="example-code clearfix">-->
<div class="content-box box-toggle mrg10T mrg10L mrg10R  ">
            <h3 class="content-box-header ui-state-default">
               
                <i class="glyph-icon icon-plus mrg10L toggle-button"></i>
                <span class="float-left toggle-button">All Topics</span>
         
            </h3><!--scrollable-content scrollable-medium-->
            <div class="content-box-wrapper " style="">
        <ul class="sortable-elements">
        <?php
		$data=array(
				  'select'=>'*',	
				  'where'=>'',          
				  'where_value'=>'',	
				  'orderby'=>'serial',		
				  'order'=>'asc',		
				  'start_limit'=>'0',	
				  'end_limit'=>'10000000'		
				   );
				 $resulet= $db->select(TOPICS,$data);
				 $sl=1;
				/* echo '<pre>';
				 print_r($resulet);die;*/
				 
				 foreach($resulet as $v)
				 {
					//echo $v['topic_id'].'<br>';
			  ?>
            <li id="topic_id_<?php echo $v['topic_id']?>" class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B ">
                <i class="glyph-icon icon-caret-right"></i>
                <span id="t_<?php echo $v['topic_id']?>"><?php echo $v['topic_name']?></span>
               <div class="float-right"> 
               <i class="glyph-icon icon-pencil mrg10R tooltip-button" title="Edit" style="cursor:pointer;" id=<?php echo $v['topic_id']?>></i>
                <a class="font-gray-dark" href="<?php $_SERVER['PHP_SELF']?>?action=delete&topic_id=<?php echo $v['topic_id']?>" onClick="javascript:var message=confirm('Do you really want to delete');if(message==true){return true;}else {return false;}">
                <i class="glyph-icon icon-clock-os mrg10R  tooltip-button" title="Delete"></i>
                </a>
                <i id="<?php echo $v['topic_id']?>" class="glyph-icon mrg10R  tooltip-button <?php $me->status($v['status'])?> status set_<?php echo $v['topic_id']?>" title="<?php if($v['status']==1){echo "Active";}else{echo "Inactive";}?>" style="cursor:pointer;"></i></div>
                <div style="display:none;" id="shw_<?php echo $v['topic_id']?>"> 
                      <div class="form-row">  
                         <div class="form-input col-md-4">
                          <input type="text" id="topic_<?php echo $v['topic_id']?>" name="topic_name" value="<?php echo $v['topic_name']?>" >
                          </div>
                         <a title="" class="btn medium primary-bg abc" style="cursor:pointer;" id="<?php echo $v['topic_id']?>">
            <span class="button-content">Save</span>
        </a> 
                          </div>
                    
                          
                           
                                                        
                                                        
                                                    
 </div>
            </li>
            <?php }?>
        
        </ul>
</div></div>
 <!--   </div>
</div>-->




                	</div><!-- #page-content -->
	            </div><!-- #page-main -->
            </div><!-- #page-main-wrapper -->
        </div><!-- #page-wrapper -->

    </body>
    <script type="text/javascript">
    
 $(document).ready(function(event) {
	  $('.icon-pencil').click(function(event) {
		$editid=$(this).attr('id');
		//alert($editid);
		$('#shw_'+$editid).toggle(500);
    })  ;
	// edit/////
 $(".abc").click(function(event) {
	$id=$(this).attr('id');
	 $topic=$('#topic_'+$id).val();
	// alert($topic);
	 $.ajax({
            type : 'GET',
            url : 'ajax.php',
            dataType : 'html',
            data: {topic_name : $topic,topic_id:$id,val:"topic"},
            success : function(data){ 
			$('#t_'+$id).html($topic);
            //$('#response').html(data);
			$('#shw_'+$id).toggle(500);	
            }
			   
        });
	 	
 });
 
 /////status
 $(".status").click(function(event){
	$id=$(this).attr('id');
     $.ajax({
            type : 'GET',
            url : 'ajax.php',
            dataType : 'html',
            data: {topic_id:$id,val:"status"},
            success : function(data){ 
			if(data==0)
			{
				//$('.set_'+$id).fadeOut(500);
				$('.set_'+$id).removeAttr( "data-original-title" );
				$('.set_'+$id).removeClass('icon-exclamation font-red');
				
				$('.set_'+$id).attr('data-original-title', 'Active');
				//$('.set_'+$id).css('display','none');
				$('.set_'+$id).fadeIn(500);
				$('.set_'+$id).addClass('icon-check font-green');
			}
			else
			{
				
				//$('.set_'+$id).fadeOut(500);
				$('.set_'+$id).removeAttr( "data-original-title" );
				$('.set_'+$id).removeClass('icon-check font-green');
				
				$('.set_'+$id).attr('data-original-title', 'Inactive');
				//$('.set_'+$id).css('display','none');
				$('.set_'+$id).fadeIn(500);
				$('.set_'+$id).addClass('icon-exclamation font-red');
			}
				
            }
			   
        });	
 });
 
 });
////////////////Save serial order
$(function() {
		$('.sortable-elements').sortable({
			axis: 'y',
			stop: function (event, ui) {
				var data = $(this).sortable('serialize');
				//alert(data);
				// POST to server using $.post or $.ajax
				$.ajax({
					type: 'POST',
					url: 'saveorder.php',
					data: { 
						theorder: data
					},
            success : function(data){ 
			//alert(data);
           // $('#respon').fadeIn(500);

            }
				});
			}
		});
	});
	
</script>
</html>
