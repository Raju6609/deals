<?php include('head.php');?>

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

                    
                    <div id="page-content">
                    

<h4 class="heading-1 clearfix">
    <div class="heading-content">
        Dashboard panels
        <small>
            Dashboard panels are used to show different types of statistics and data.
        </small>
    </div>
    <div class="clear"></div>
    <div class="divider"></div>
</h4>



<h3>
    Line charts
</h3>
<p class="font-gray-dark">
    You can use whatever background color you want form the helper classes.
</p>

<div class="example-box">
    <div class="example-code">

        <div class="row">

            <div class="col-md-4">

                <div class="dashboard-panel content-box remove-border bg-blue-alt">
                    <div class="content-box-wrapper">
                        <div class="header">
                            Monthly evolution
                            <span>July - December 2013</span>
                        </div>
                        <div class="sparkline-big">183,579,180,311,405,342,579,405,450,311,180,311,450,302,370,210</div>
                    </div>
                    <div class="button-pane">
                        <div class="heading medium">
                            Overdue orders
                        </div>
                        <a href="javascript:;" class="medium btn bg-blue float-right tooltip-button" data-placement="top" title="Remove comment">
                            <i class="glyph-icon icon-plus"></i>
                        </a>
                    </div>
                </div>

            </div>

            <div class="col-md-4">

                <div class="dashboard-panel content-box remove-border bg-green">
                    <div class="content-box-wrapper">
                        <div class="header">
                            Weekly forecast
                            <span>November 2013 - December 2013</span>
                        </div>
                        <div class="sparkline-big">183,579,180,311,240,180,311,450,302,370,210,610</div>
                    </div>
                    <div class="button-pane">
                        <div class="heading medium">
                            Exchange rate
                        </div>
                        <a href="javascript:;" class="medium btn bg-green float-right tooltip-button" data-placement="top" title="Remove comment">
                            <i class="glyph-icon icon-reply"></i>
                        </a>
                    </div>
                </div>

            </div>

            <div class="col-md-4">

                <div class="dashboard-panel content-box remove-border bg-orange">
                    <div class="content-box-wrapper">
                        <div class="header">
                            Yearly forecast
                            <span>2013 - 2014</span>
                        </div>
                        <div class="sparkline-big">183,579,180,311,240,180,311,450,302,370,210,610</div>
                    </div>
                    <div class="button-pane">
                        <div class="heading medium">
                            New visitors
                        </div>
                        <a href="javascript:;" class="medium btn bg-black float-right tooltip-button" data-placement="left" title="Remove comment">
                            <i class="glyph-icon icon-cog"></i>
                        </a>
                    </div>
                </div>

            </div>

        </div>

    </div>
    
</div>


<h3>
    Bar charts
</h3>
<p class="font-gray-dark">
    These examples use the Sparklines bars charts. Just like the line charts dashboard panels, you can use whatevery background color you want.
</p>

<div class="example-box">
    <div class="example-code">

        <div class="row">

            <div class="col-md-4">

                <div class="dashboard-panel bg-white content-box">
                    <div class="content-box-wrapper">
                        <div class="header">
                            Monthly evolution
                            <span>July - December 2013</span>
                        </div>
                        <div class="center-div sparkline-bar-big-color">183,579,180,311,405,342,579,405,311,311,450,302,370,510,405,342,579,405,311,311,450,302,370,510</div>
                    </div>
                    <div class="button-pane">
                        <div class="heading medium">
                            Overdue orders
                        </div>
                        <a href="javascript:;" class="medium btn bg-blue float-right tooltip-button" data-placement="top" title="Remove comment">
                            <i class="glyph-icon icon-plus"></i>
                        </a>
                    </div>
                </div>

            </div>

            <div class="col-md-4">

                <div class="dashboard-panel content-box remove-border bg-blue">
                    <div class="content-box-wrapper">
                        <div class="header">
                            Weekly forecast
                            <span>November 2013 - December 2013</span>
                        </div>
                        <div class="center-div sparkline-bar-big">579,180,311,405,342,579,405,311,311,450,302,370,510,405,342,579,405,311,311,450,302,370,510</div>
                    </div>
                    <div class="button-pane">
                        <div class="heading medium">
                            Exchange rate
                        </div>
                        <a href="javascript:;" class="medium btn bg-green float-right tooltip-button" data-placement="top" title="Remove comment">
                            <i class="glyph-icon icon-reply"></i>
                        </a>
                    </div>
                </div>

            </div>

            <div class="col-md-4">

                <div class="dashboard-panel content-box remove-border bg-red">
                    <div class="content-box-wrapper">
                        <div class="header">
                            Yearly forecast
                            <span>2013 - 2014</span>
                        </div>
                        <div class="center-div sparkline-bar-big">183,579,180,311,230,311,405,342,230,302,405,230,405,342,579,405,311,405,342,230,302,405,230,405,342,579,405</div>
                    </div>
                    <div class="button-pane">
                        <div class="heading medium">
                            New visitors
                        </div>
                        <a href="javascript:;" class="medium btn bg-black float-right tooltip-button" data-placement="left" title="Remove comment">
                            <i class="glyph-icon icon-cog"></i>
                        </a>
                    </div>
                </div>

            </div>

        </div>

    </div>
    
</div>


                	</div><!-- #page-content -->
	            </div><!-- #page-main -->
            </div><!-- #page-main-wrapper -->
        </div><!-- #page-wrapper -->

    </body>
</html>
