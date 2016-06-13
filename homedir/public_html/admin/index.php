<?php
include('config/connection.php');
$con->getconnect();
error_reporting(0);
$msg='';
$f->loginvalidate();
if(isset($_POST['login']))
{

	$login=$f->adminlogin($_POST['uname'],$_POST['pass']);
	if($login=="not")
	{
		$msg='<div class="infobox clearfix infobox-close-wrapper error-bg mrg20B"><a href="#" title="Close Message" class="glyph-icon infobox-close icon-remove"></a>Invalid Username/Password</div>';
	}
	if($login=="yes")
	{
		header("location:dashboard.php");
	}
}
?>
<!DOCTYPE html>
    <html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Admin Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Favicons -->

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/icons/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/icons/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/icons/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/images/icons/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="assets/images/icons/favicon.png">

        <link rel="stylesheet" type="text/css" href="assets/css/minified/aui-production.min.css">


        <link id="layout-theme" rel="stylesheet" type="text/css" href="assets/themes/minified/agileui/color-schemes/layouts/default.min.css">
        <link id="elements-theme" rel="stylesheet" type="text/css" href="assets/themes/minified/agileui/color-schemes/elements/default.min.css">
        <link rel="stylesheet" type="text/css" href="assets/themes/minified/agileui/responsive.min.css">
        <link rel="stylesheet" type="text/css" href="assets/themes/minified/agileui/animations.min.css">
    

    </head>
    <body>
        <div id="login-page" class="mrg25B">

            <div id="page-header" class="clearfix">
                <div id="page-header-wrapper" class="clearfix">
                    <div id="header-logo">
                       Admin Panel <i class="opacity-80">v1.01</i>
                    </div>
                    

                </div>
            </div><!-- #page-header -->

        </div>
<img src="assets/images/login-bg.png" class="login-img" alt="">
<div class="ui-widget-overlay bg-black opacity-60"></div>
        <div class="pad20A mrg25T">
            <div class="row mrg25T">

                <form action="<?php $_SERVER['PHP_SELF']?>" class="col-md-4 center-margin form-vertical mrg25T" method="post">

                    <div class="ui-dialog modal-dialog mrg25T" id="login-form" style="position: relative !important;">
                        <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
                            <span class="ui-dialog-title">Admin Login</span>
                        </div>
                        <div class="pad20A pad0B ui-dialog-content ui-widget-content">
                            <?php echo $msg; ?>
                            <div class="form-row">
                                <div class="form-label col-md-2">
                                    <label for="">
                                        Username:
                                    </label>
                                </div>
                                <div class="form-input col-md-10">
                                    <div class="form-input-icon">
                                        <i class="glyph-icon icon-user ui-state-default"></i>
                                        <input placeholder="User Name" type="text" name="uname" id="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-label col-md-2">
                                    <label for="">
                                        Password:
                                    </label>
                                </div>
                                <div class="form-input col-md-10">
                                    <div class="form-input-icon">
                                        <i class="glyph-icon icon-unlock-alt ui-state-default"></i>
                                        <input placeholder="Password" type="password" name="pass" id="">
                                    </div>
                                </div>
                            </div>

                            <!--<div class="form-row">
                                <div class="form-checkbox-radio col-md-6">
                                    <input type="checkbox" class="custom-checkbox" name="remember-password" id="remember-password">
                                    <label for="remember-password" class="pad5L">Remember password?</label>
                                </div>
                                <div class="form-checkbox-radio text-right col-md-6">
                                    <a href="#" class="switch-button" switch-target="#login-forgot" switch-parent="#login-form" title="Recover password">Forgot your password?</a>
                                </div>
                            </div>-->
                        </div>
                        <div class="ui-dialog-buttonpane text-center">
                            <button type="submit" class="btn large primary-bg text-transform-upr font-bold font-size-11 radius-all-4" id="demo-form-valid" name="login" title="Validate!">
                                <span class="button-content">
                                    Login
                                </span>
                            </button>
                        </div>
                    </div>

                    <div class="ui-dialog mrg15T hide" id="login-forgot" style="position: relative !important;">
                        <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
                            <span class="ui-dialog-title">Recover password</span>
                        </div>
                        <div class="pad20A ui-dialog-content ui-widget-content">
                            <div class="form-row">
                                <div class="form-label col-md-2">
                                    <label for="">
                                        Email address:
                                    </label>
                                </div>
                                <div class="form-input col-md-10">
                                    <div class="form-input-icon">
                                        <i class="glyph-icon icon-envelope-o ui-state-default"></i>
                                        <input placeholder="Email address" type="text" name="" id="">
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="ui-dialog-buttonpane text-center">
                            <button type="submit" class="btn large primary-bg radius-all-4" id="demo-form-valid" onclick="javascript:$(&apos;#demo-form&apos;).parsley( &apos;validate&apos; );" title="Validate!">
                                <span class="button-content">
                                    Recover Password
                                </span>
                            </button>
                           
                        </div>
                    </div>

                </form>

            </div>

        </div>


        <div id="page-footer-wrapper" class="login-footer">
            <div id="page-footer">
        	    Copyright &copy; 2014 - Codetech
            </div>
        </div><!-- #page-footer-wrapper -->

    </body>
       <script type="text/javascript" src="assets/js/minified/aui-production.min.js"></script>
</html>
