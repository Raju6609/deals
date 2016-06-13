<div class="conty_bg">

<div class="inner">

<div id="layout">

	<ul class="breadcrumb">

    	<li><a href="./">Home</a></li>

        <li>Privacy Policy</li>

    </ul>

    <div class="row">

    	<h2 class="heading">Privacy Policy</h2>

        <!--<h3 class="sm-heading">Pellentesque sed dolor. Aliquam congue fermentum nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pel lentesque vitae turpis tristique, feugiat nisl eget, pellentesque ipsum. Proin ullamcorper laoreet erat ac convall is.</h3>-->

        <?php
        $data=array(
        'select'=>'*',	
        'where'=>'privacy_id',          
        'where_value'=>1,	
        );
        $resulet= $me->select(PRIVACY,$data);
        ?>
        <p class="hero-text"><?php echo $resulet[0]['privacy_content'] ?></p>  

    </div>

     

    

    

    <div class="spacer"></div>

</div>

</div>

</div>