<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 fluid top-full sidebar sidebar-full"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 fluid top-full sticky-top sidebar sidebar-full"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 fluid top-full sticky-top sidebar sidebar-full"> <![endif]-->
<!--[if gt IE 8]> <html class="ie gt-ie8 fluid top-full sticky-top sidebar sidebar-full"> <![endif]-->
<!--[if !IE]><!--><html class="fluid top-full sticky-top sidebar sidebar-full"><!-- <![endif]-->
<head>
        <title>Member Login - Careercolony</title>
   
    <!-- Meta -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
   
    <!--
    **********************************************************
    In development, use the LESS files and the less.js compiler
    instead of the minified CSS loaded by default.
    **********************************************************
    <link rel="stylesheet/less" href="../assets/less/admin/module.admin.page.signup.less" />
    -->
   
        <!--[if lt IE 9]><link rel="stylesheet" href="../assets/components/library/bootstrap/css/bootstrap.min.css" /><![endif]-->
    <link rel="stylesheet" href="../assets/css/admin/module.admin.page.signup.min.css" />
   
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
 	<link rel="shortcut icon" href="<?php echo base_url();?>favicon.ico">
    <script src="../assets/components/library/jquery/jquery.min.js?v=v2.1.0"></script>
	<script src="../assets/components/library/jquery/jquery-migrate.min.js?v=v2.1.0"></script>
	<script src="../assets/components/library/modernizr/modernizr.js?v=v2.1.0"></script>
	<script src="../assets/components/plugins/less-js/less.min.js?v=v2.1.0"></script>
	<script src="../assets/components/modules/admin/charts/flot/assets/lib/excanvas.js?v=v2.1.0"></script>
	<script src="../assets/components/plugins/browser/ie/ie.prototype.polyfill.js?v=v2.1.0"></script>   

</head>
<style>
html {
  background: url(../img/bg_login.jpg) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

#form-content {
	width: 30%;
	height: 70%;
	position: absolute;
	top:0;
	bottom: 0;
	left: 0;
	right: 0;
	
	margin: auto;
}



</style>
<body class="login ">
   
    <!-- Wrapper -->
    <div id="form-content" style="position:fixed; opacity: 0.88; filter: alpha(opacity=88); /* For IE8 and earlier */">
   
            <!-- Form Wizard / Widget Pills -->
<div class="wizard" >
    <div class="widget widget-tabs widget-wizard-pills widget-tabs-responsive">
   
       
        <div class="widget-body">
           
           <?php echo $msg_first_name; ?>
            <!-- Form -->
                    <?php echo validation_errors(); ?>         
                    <?php echo form_open(base_url() .'user/validate_login');?>
                        <label>Username </label>
                        <?php echo form_input(array('id'=>'email', 'name'=>'email', 'value'=>"", 'class'=>'form-control margin-none', 'placeholder'=>'Your Username')) ;?>
                        <label>Password </label>
                        <?php echo form_password(array('id'=>'password', 'name'=>'password', 'class'=>'form-control margin-none', 'placeholder'=>'Your Password')) ;?>
                       
                        <div class="text-right innerTB">
                            <a href="">forgot your password?</a>
                        </div>
                       
                        <div class="row">
                            <div class="col-md-8">
                                <div class="uniformjs"><label class="checkbox"><input type="checkbox" value="remember-me">Remember me</label></div>
                            </div>
                            <div class="col-md-4 center">
                                <?php echo form_submit(array('id'=>'submit', 'value'=>'Sign in now', 'class'=>'btn btn-block btn-primary')) ;?>
                            </div>
                        </div>
                       
                    <?php echo form_close();?>
                    <!-- // Form END -->
           
        </div>
    </div>
</div>
<!-- // Form Wizard / Widget Pills END -->
           
    </div>

<!-- // Wrapper END -->




    <!-- Global -->
    <script>
    var basePath = '',
        commonPath = '../assets/',
        rootPath = '../',
        DEV = false,
        componentsPath = '../assets/components/';
   
    var primaryColor = '#4a8bc2',
        dangerColor = '#b55151',
        infoColor = '#74a6d0',
        successColor = '#609450',
        warningColor = '#ab7a4b',
        inverseColor = '#45484d';
   
    var themerPrimaryColor = primaryColor;
    </script>
   
    <script src="../assets/components/library/bootstrap/js/bootstrap.min.js?v=v2.1.0"></script>
    <script src="../assets/components/plugins/slimscroll/jquery.slimscroll.js?v=v2.1.0"></script>
    <script src="../assets/components/plugins/breakpoints/breakpoints.js?v=v2.1.0"></script>
    <script src="../assets/components/modules/admin/forms/elements/uniform/assets/lib/js/jquery.uniform.min.js?v=v2.1.0"></script>
    <script src="../assets/components/modules/admin/forms/elements/uniform/assets/custom/js/uniform.init.js?v=v2.1.0"></script>
    <script src="../assets/components/core/js/core.init.js?v=v2.1.0"></script>   
</body>
</html>
