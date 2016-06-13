<div class="latest">
<div class="inner">
<h2>Latest Hot Deals</h2>


<ul id="carousel" class="elastislide-list">
<?php 
/*$where='>= 10';
$where=preg_split('/[\s,]+/', $where, 3);
echo $where[0];die;*/
	$data=array(
	'select'=>'*',	
	'where'=>'deal_hot_count',          
	'where_value'=>'>= 1',	
	'orderby'=>'deal_id',		
	'order'=>'desc',		
	'start_limit'=>'0',	
	'end_limit'=>'10000000'		
	);
	$resulet= $me->select(DEALS,$data);
	
	//$sl=1;
	foreach($resulet as $v)
	{
?>
	<li><span class="deg"><?php echo $v['deal_hot_count']?>&deg;</span><a href="#"><img src="<?php echo $v['deal_image_url']?>" style="height:108px;" alt="<?php echo $v['deal_title'];?>" /></a><span class="deal_title"><a href="<?php echo $me->template_url('deal-details.php?deal='.$v['deal_slug']."&".$v['deal_id']);?>"><?php echo substr($v['deal_title'],0,20);?></a></span></li>
			<?php
	}
?>		
	</ul>

</div>
</div>