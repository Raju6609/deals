<?php include('head.php');

if($_GET['action']=="delete")

{

	$data=array("where"=>"deal_id","where_value"=>$_GET['deal_id']);

	$me->delete(DEALS,$data);

	header("location:deal.php");

}

if(isset($_POST['updatedeal']))
{
	$data=array();
	foreach($_POST as $k=>$v)
	{
		if($k!='deal_image' && $k!='updatedeal' && $k!='hdn_img' && $k!='hdn_id')
		{
			$data[$k]=$v;
		}
	}
	if(is_uploaded_file($_FILES['deal_image']['tmp_name']))
		{
		$data['deal_image']=$f->sharepicture($_FILES['deal_image'],'../images/deal/');
		$data['deal_image_url']=$me->template_url('images/deal/'.$data['deal_image']);
		}
		else
		{
		$data['deal_image']=$_POST['hdn_img'];
		$data['deal_image_url']=$me->template_url('images/deal/'.$_POST['hdn_img']);
			
		}
	/*	echo '<pre>';
		print_r($data);die;*/
		$fild=array("deal_id"=>$_POST['hdn_id']);
	$me->update(DEALS,$data,$fild);
	header("location:deal.php");
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

                                Deals

                            </span>

                        </div>

                        

                    </div> <!-- #page-breadcrumb-wrapper -->

                    

                    <div id="page-content">

                 

					<?php if($_GET['action']=="edit"){

				  $updatedata=array(

				  'select'=>'*',	

				  'where'=>'deal_id',          

				  'where_value'=>$_GET['deal_id'],	

				   );

				  $updateresulet= $db->select(DEALS,$updatedata);

						?>

                    	<div class="content-box box-toggle mrg10T mrg10L mrg10R  ">

            <h3 class="content-box-header ui-state-default">

               

                <i class="glyph-icon icon-plus mrg10L toggle-button"></i>

                <span class="float-left toggle-button"><?php //echo $updateresulet[0]['name']?></span>

            </h3>

            <div class="content-box-wrapper " style="">

      <form method="post" enctype="multipart/form-data">
      <input name="hdn_id" type="hidden" value="<?php echo $updateresulet[0]['deal_id']?>">
      <div class="form-row">

                <div class="form-label col-md-2">

                    <label class="label-description" for="">

                        Deal Url:

                    </label>

                </div>

                <div class="form-input col-md-4">

                    <input type="text"  name="deal_url" placeholder="Deal Url" value="<?php echo $updateresulet[0]['deal_url']?>">

                </div>

            </div>

            <div class="form-row">

                <div class="form-label col-md-2">

                    <label class="label-description" for="">

                       Title:

                    </label>

                </div>

                <div class="form-input col-md-4">

                    <input type="text"  name="deal_title" placeholder="Deal Title" value="<?php echo $updateresulet[0]['deal_title']?>">

                </div>

            </div>

            <div class="form-row">

                <div class="form-label col-md-2">

                    <label class="label-description" for="">

                      Deal Price:

                    </label>

                </div>

                <div class="form-input col-md-4">

                    <input type="text"  name="deal_price" placeholder="Deal Price" value="<?php echo $updateresulet[0]['deal_price']?>">

                </div>

            </div>
            
            <div class="form-row">

                <div class="form-label col-md-2">

                    <label class="label-description" for="">

                      Topic:

                    </label>

                </div>

                <div class="form-input col-md-4">
                <select name="deal_topic" id="deal_topic" class="custom-select">
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
                <option value="<?php echo $v['topic_id']?>" <?php if($v['topic_id']==$updateresulet[0]['deal_topic']){echo "selected";}?>><?php echo $v['topic_name']?></option>
				<?php }?>
                        
                       </select>

                    

                </div>

            </div>
            
            <div class="form-row">

                <div class="form-label col-md-2">

                    <label class="label-description" for="">

                      Deal Desc:

                    </label>

                </div>

                <div class="form-input col-md-4">
<textarea name="deal_desc" cols="" rows="" class="txtfield full height"><?php echo $updateresulet[0]['deal_desc']?></textarea>
                    

                </div>

            </div>
			<div class="form-row">

                <div class="form-label col-md-2">

                    <label class="label-description" for="">

                      Deal Tag:

                    </label>

                </div>

                <div class="form-input col-md-4">

                    <input type="text"  name="deal_tag" placeholder="Deal Price" value="<?php echo $updateresulet[0]['deal_tag']?>">

                </div>

            </div>
            <div class="form-row">

                <div class="form-label col-md-2">

                    <label class="label-description" for="">

                      Start Date:

                    </label>

                </div>

                <div class="form-input col-md-4">
 
                    <input type="text" class="fromDate"  name="deal_start_date" placeholder="Deal Price" value="<?php echo $updateresulet[0]['deal_start_date']?>">

                </div>

            </div>
            <div class="form-row">

                <div class="form-label col-md-2">

                    <label class="label-description" for="">

                      End Date:

                    </label>

                </div>

                <div class="form-input col-md-4">
 
                    <input type="text" class="toDate"  name="deal_end_date" placeholder="End Date" value="<?php echo $updateresulet[0]['deal_end_date']?>">

                </div>

            </div>
            <div class="form-row">

                <div class="form-label col-md-2">

                    <label class="label-description" for="">

                      Deal Image:

                    </label>

                </div>

                <div class="form-input col-md-4">
<img src="<?php echo $updateresulet[0]['deal_image_url']?>" width="50" height="50"/>
           <input type="hidden"  name="hdn_img"  value="<?php echo $updateresulet[0]['deal_image']?>">
		<input name="deal_image" type="file">
                </div>

            </div>
           

            <div class="form-row">

                <div class="form-label col-md-2">

                    <label class="label-description" for="">

                      &nbsp;

                    </label>

                </div>

            <div class="form-input col-md-3">



                           <button type="submit" class="btn medium primary-bg text-transform-upr font-bold font-size-11 radius-all-4" id="demo-form-valid" title="Validate!" name="updatedeal">



                                <span class="button-content">



                                   <!--<i class="glyph-icon icon-upload"></i>--> Save Changes



                                </span>



                            </button>



                            </div>

           </div>
</form>

            </div></div>

                    <?php }else{?>

					<div class="content-box box-toggle mrg10T mrg10L mrg10R  ">

            <h3 class="content-box-header ui-state-default">

               

                <i class="glyph-icon icon-plus mrg10L toggle-button"></i>

                <span class="float-left toggle-button">All Deals</span>

         

            </h3><!--scrollable-content scrollable-medium-->

            <div class="content-box-wrapper " style="">

        <table width="1086" class="table" id="example1">

	<thead>

		<tr>

			<th width="70">Sl.</th>

			<th width="139">Deal Tag</th>

			<th width="179">Posted By</th>

			<th width="196">Email</th>

			<th width="142">Deal Image</th>

            <th width="132">Posted Date</th>

            <th width="96">Status</th>

            <th width="96">Action</th>

		</tr>

	</thead>

	<tbody>

       <?php

		$data=array(

				  'select'=>'*',	

				  'where'=>'',          

				  'where_value'=>'',	

				  'orderby'=>'deal_id',		

				  'order'=>'desc',		

				  'start_limit'=>'0',	

				  'end_limit'=>'10000000'		

				   );

				 $resulet= $db->select(DEALS,$data);

				 $sl=1;

				 foreach($resulet as $v)

				 {

			  ?>

		<tr>

			<td align="center"><?php echo $sl++;?></td>

			<td align="center"><?php echo $v['deal_tag']?></td>

			<td align="center"><?php 

			$user=array('select'=>'name','where'=>'user_id','where_value'=>$v['user_id']);

			$getusername= $db->select(USERS,$user);

			echo $getusername[0]['name']?>

            </td>

			<td align="center"><?php echo $v['deal_email']?></td>

			<td align="center" class="center"><img src="<?php echo $v['deal_image_url']?>" height="60" width="60"/></td>

            <td align="center" class="center">

			<div class='timeago' title='<?php  echo $v['deal_modify_date'] ?>'</div>

			<?php 

			

			

			// $date=strtotime($v['deal_modify_date']);

//echo date('jS M  Y',$date);?></td>

            <td align="center"><?php $me->userstatus($v['deal_status'])?></td>

            <td align="center">

            <a class="btn small bg-yellow tooltip-button" title="" data-placement="top" href="javascript:;" data-original-title="View Details">

<i class="glyph-icon icon-search"></i>

</a>

             <a data-placement="top" class="btn small bg-blue-alt tooltip-button" href="<?php $_SERVER['PHP_SELF']?>?action=edit&deal_id=<?php echo $v['deal_id']?>" data-original-title="Edit">

                 <i class="glyph-icon icon-edit"></i>

                  </a>

                 <a data-placement="top" class="btn small bg-red tooltip-button" href="<?php $_SERVER['PHP_SELF']?>?action=delete&deal_id=<?php echo $v['deal_id']?>" onClick="javascript:var message=confirm('Do you really want to delete');if(message==true){return true;}else {return false;}" data-original-title="Remove">

                  <i class="glyph-icon icon-remove"></i>

                  </a>

           </td>

		</tr>

        <?php }?>

	</tbody>

	

</table>

</div></div>

    				<?php }?>

					







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

