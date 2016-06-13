<div class="conty_bg">

<div class="inner">

<div id="layout">

	<ul class="breadcrumb">

    	<li><a href="./">Home</a></li>

        <li>About us</li>

    </ul>

    <div class="row">

    	<h2 class="heading">About Us</h2>
		<?php
        $data=array(
        'select'=>'*',	
        'where'=>'about_id',          
        'where_value'=>1,	
        );
        $resulet= $me->select(ABOUT,$data);
        ?>
        <p class="hero-text"><?php echo $resulet[0]['about_content'] ?></p>

      <!--    <div class="lp-cols-4">

        <h3 class="small_heading">Your online savings destination</h3>

        <p class="hero-text">Pellentesque sed dolor. Aliquam congue fermentum nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pel lentesque vitae turpis tristique, feugiat nisl eget, pellentesque ipsum. Proin ullamcorper laoreet erat ac convall is. Cras sodales justo sit amet leo pellentesque, non porta mi aliquet. Nulla laoreet et metus a posuere ntege eget ante ferm entum, accumsan odio nec, feugiat sem. Nullam venenatis auctor neque</p>

        </div>

        <div class="lp-cols-4 offset-2">

       	 <h3 class="small_heading">The best offers from the best stores</h3>

        	<ul class="list">

              <li><a href="#">Proin ullamcorper laoreet erat ac convall is. Cras sodales justo sit amet leo pellentesque, non porta mi aliquet. Nulla laoreet et metus a posuere ntege eget ante ferm entum, accumsan</a></li>          

              <li><a href="#">Cras sodales justo sit amet leo pellentesque, non porta mi aliquet. Nulla laoreet et metus a posuere ntege eget ant eferm entum, accumsan odio nec, feugiat sem. Nullam venenatis auctor neque</a></li>          

              <li><a href="#">Cras sodales justo sit amet leo pellentesque, non porta mi aliquet</a></li>          

              <li><a href="#">Nulla laoreet et metus a posuere ntege eget ante ferm entum, accumsan</a></li>          

            </ul>

        </div>

      <h2 class="heading">Our Team</h2>

        <div class="lp-cols-4">

        <figure>

        	<img src="images/page2_img1.jpg" />

        </figure>

        <p class="hero-text">Pellentesque sed dolor. Aliquam congue fermentum nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pel lentesque vitae turpis tristique, feugiat nisl eget, pellentesque ipsum. Proin ullamcorper.</p>

        <p class="r-more"><a href="#">Read More</a></p>

        </div>

        <div class="lp-cols-4 offset-2">

        <h3 class="small_heading">The best offers from the best stores</h3>

        	<ul class="list">

              <li><a href="#">Proin ullamcorper laoreet erat ac convall is. Cras sodales justo sit amet leo pellentesque, non porta mi aliquet. Nulla laoreet et metus a posuere ntege eget ante ferm entum, accumsan</a></li>          

              <li><a href="#">Cras sodales justo sit amet leo pellentesque, non porta mi aliquet. Nulla laoreet et metus a posuere ntege eget ant eferm entum, accumsan odio nec, feugiat sem. Nullam venenatis auctor neque</a></li>          

              <li><a href="#">Cras sodales justo sit amet leo pellentesque, non porta mi aliquet</a></li>          

              <li><a href="#">Nulla laoreet et metus a posuere ntege eget ante ferm entum, accumsan</a></li>          

            </ul>

        </div>-->

    </div>

    

    <div class="spacer"></div>

</div>

</div>

</div>