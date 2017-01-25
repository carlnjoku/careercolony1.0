<!DOCTYPE html>
<!--[if lt IE 7]> <html class="front ie lt-ie9 lt-ie8 lt-ie7 fluid top-full"> <![endif]-->
<!--[if IE 7]>    <html class="front ie lt-ie9 lt-ie8 fluid top-full sticky-top"> <![endif]-->
<!--[if IE 8]>    <html class="front ie lt-ie9 fluid top-full sticky-top"> <![endif]-->
<!--[if gt IE 8]> <html class="front ie gt-ie8 fluid top-full sticky-top"> <![endif]-->
<!--[if !IE]><!--><html class="front fluid top-full sticky-top"><!-- <![endif]-->
<head>
    <title><?php echo $title; ?></title>
   
    <!-- Meta -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />

        <!--[if lt IE 9]><link rel="stylesheet" href="../assets/components/library/bootstrap/css/bootstrap.min.css" /><![endif]-->
   
    
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/skins/module.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/front/module.front.page.index.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/skins/module.admin.page.index.css" />
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin/module.admin.page.social_activity.min.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/skins/module.admin.page.social.min.css" />
   
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/skins/module.admin.page.form_elements.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/skins/module.admin.page.ratings.min.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/skins/module.admin.page.pricing_tables.min.css" />
   
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/skins/widgets.css" />
   
   
    <link rel="shortcut icon" href="<?php echo base_url();?>favicon.ico">
   

<script type="text/javascript" src="<?php echo base_url(); ?>js_tooltip/js/imagesloaded/imagesloaded.pkgd.min.js"></script>


<script src="<?php echo base_url(); ?>bootstrap-filestyle/src/bootstrap-filestyle.min.js"></script>

  
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->



<script src="<?php echo base_url(); ?>/assets/components/library/jquery/jquery.min.js?v=v2.1.0"></script>
<script src="<?php echo base_url(); ?>plugins/sticky-element.js"></script>  



<script src="<?php echo base_url(); ?>assets/components/library/jquery/jquery.min.js?v=v2.1.0"></script>
<script src="<?php echo base_url(); ?>assets/components/library/jquery/jquery-migrate.min.js?v=v2.1.0"></script>
<script src="<?php echo base_url(); ?>assets/components/library/modernizr/modernizr.js?v=v2.1.0"></script>
<script src="<?php echo base_url(); ?>assets/components/plugins/less-js/less.min.js?v=v2.1.0"></script>
<script src="<?php echo base_url(); ?>assets/components/modules/admin/charts/flot/assets/lib/excanvas.js?v=v2.1.0"></script>
<script src="<?php echo base_url(); ?>assets/components/plugins/browser/ie/ie.prototype.polyfill.js?v=v2.1.0"></script>

<script src="<?php echo base_url(); ?>assets/components/library/bootstrap/js/bootstrap.min.js?v=v2.1.0"></script>


<script src="<?php echo base_url(); ?>assets/components/library/jquery-ui/js/jquery-ui.min.js?v=v2.1.0"></script>
<script src="<?php echo base_url(); ?>assets/components/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js?v=v2.1.0"></script>   
<script src="https://use.fontawesome.com/bb94c2f28d.js"></script>


<style>
.scrollx{
    color: white;
    left: 10px;
    top:10px;
    height:430px;
    overflow-x: hidden;
    overflow-y: auto;
}
</style>

<style type="text/css">
   
    .content_seachbox{
        width:900px;
        margin:0 auto;
    }
    #searchid
    {
        width:280px;
        border:solid 1px #000;
        padding:10px;
        font-size:14px;
        background-color:#f3f3f3;
    }
    #result_seachbox
    {
        position:absolute;
        width:500px;
        padding:10px;
        display:none;
        margin-top:-1px;
        border-top:0px;
        overflow:hidden;
        border:1px #CCC solid;
        background-color: white;
    }
    .show
    {
        padding:10px;
        border-bottom:1px #999 dashed;
        font-size:15px;
        height:50px;
    }
    .show:hover
    {
        background:#4c66a4;
        color:#FFF;
        cursor:pointer;
    }
   
    .twitter-color
    {
    color:#00aced;
   
    }
   
    .facebook-color
    {
    color:#3b5998;
   
    }
   
    .linkedin-color
    {
    color:#007bb6;
   
    }
   
    .google-plus-color
    {
    color:#dd4b39;
   
    }
</style>







</head>
<body>



</head>
<body>

   
    <!-- Main Container Fluid -->
    <div class="container-fluid" >
       
        <!-- Content -->
        <div id="content">
       
        <!-- Top navbar -->
        <div class="navbar main hidden-print">
           
            <div class="secondary" >
                <div class="container-960">
               
                    <!-- Brand -->
                    <a href="#"><img class="pull-left" style="position:relative; top:10px" src="<?php echo base_url();?>img/logo.png"></a>
             <span style="color:#f3f3f3"> </span>
               
               <script>
        $(document).ready(function(e){
    		$('.search-panel .dropdown-menu').find('a').click(function(e) {
			e.preventDefault();
			var param = $(this).attr("href").replace("#","");
			var concept = $(this).text();
			$('.search-panel span#search_concept').text(concept);
			$('.input-group #search_param').val(param);
			});
		});
	</script>     
                 
        <div class="col-xs-5 col-xs-offset-2 pull-right">
		    <div class="input-group">
                <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                    	<span id="search_concept">Search by</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#people"><i class="fa fa-user"></i>&nbsp;People</a></li>
                      <li><a href="#jobs"><i class="fa fa-briefcase"></i>&nbsp;Jobs</a></li>
                      <li><a href="#companies"><i class="fa fa-building"></i>&nbsp;Companies</a></li>
                      <li><a href="#groups"><i class="fa fa-users"></i>&nbsp;Groups</a></li>
                      <li><a href="#post"><i class="fa fa-file"></i>&nbsp;Post</a></li>
                      <li><a href="#projects"><i class="fa fa-desktop"></i>&nbsp;Projects</a></li>
                      <li class="divider"></li>
                      <li><a href="#all"><i class="fa fa-search"></i>&nbsp;All</a></li>
                    </ul>
                </div>
                <input type="hidden" name="search_param" value="all" id="search_param">         
                <input type="text" class="form-control" name="x" placeholder="Search people, jobs, project...">
                <span class="input-group-btn">
                    <button class="btn btn-inverse" type="button"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </div>
                   
                 
                </ul>
                                           
                       
                    <div class="clearfix"></div>
                   
                </div>
            </div>
           
            <div class="container-960">
           
            <!-- Menu Toggle Button -->
            <button type="button" class="btn btn-navbar navbar-toggle visible-xs">
                <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
            </button>
            <!-- // Menu Toggle Button END -->
           
            <ul class="topnav pull-left">
               
                <li class="dropdown dd-1">
                    <a href="<?php echo base_url(); ?>home/frontpage"><i></i>Home</a>
                </li>
               
                <li class="dropdown dd-1">
                    <a href="index.html?lang=en" data-toggle="dropdown"><i></i>My Profile <span class="caret"></span></a>
                    <ul class="dropdown-menu pull-left">
                        <li><a href="<?php echo base_url(); ?>profile/profile_p" class="glyphicons user text-small"><i></i> View Profile</a></li>
                        <li><a href="<?php echo base_url(); ?>profile/edit_profile" class="glyphicons edit text-small"><i></i> Edit Profile</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/myjobs/importCV" class="glyphicons disk_import text-small"><i></i> Import CV</a></li>
                    </ul>
                </li>
               
                <li class="dropdown dd-1">
                    <a href="index.html?lang=en" data-toggle="dropdown"><i></i>Jobs <span class="caret"></span></a>
                    <ul class="dropdown-menu pull-left">
                        <li><a href="<?php echo base_url(); ?>index.php/myjobs/jobs" class="glyphicons search text-small"><i></i> Search Jobs</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/myjobs/saved_jobs" class="glyphicons floppy_disk text-small"><i></i> Saved Jobs</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/myjobs/job_alert" class="glyphicons alarm text-small"><i></i> Job Alert</a></li>
                        <li><a href="<?php echo base_url(); ?>user/login" class="glyphicons alarm text-small"><i></i> Login</a></li>
                        <li><?php echo anchor("myjobs/applications/$user_id", '<i></i>Applications', 'class="glyphicons briefcase text-small"');?></li>
                    </ul>
                </li>
               
                <li class="dropdown dd-1">
                    <a href="index.html?lang=en" data-toggle="dropdown"><i></i>Business <span class="caret"></span></a>
                    <ul class="dropdown-menu pull-left">
                        <li><a href="<?php echo base_url(); ?>company/chk_if_exists" class="glyphicons search text-small"><i></i> Companies</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/myjobs/saved_jobs" class="glyphicons floppy_disk text-small"><i></i> Investment</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/myjobs/job_alert" class="glyphicons alarm text-small"><i></i>Colony / Group</a></li>
                        <li><a href="<?php echo base_url(); ?>project/home" class="glyphicons display text-small"><i></i>Projects</a></li>
                        
                    </ul>
                </li>
               
                <li class="dropdown dd-1">
                    <a href="index.html?lang=en" data-toggle="dropdown"><i></i>Market Places <span class="caret"></span></a>
                    <ul class="dropdown-menu pull-left">
                        <li><a href="<?php echo base_url(); ?>index.php/myjob/view_profile" class="glyphicons dashboard text-small"><i></i> Candidate</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/employers/edit_profile" class="glyphicons charts text-small"><i></i> Employer</a></li>
                    </ul>
                </li>
               
                <li class="dropdown dd-1">
                    <a href="index.html?lang=en" data-toggle="dropdown"><i></i>Academy</a>
                </li>
               
               
               
               
               
                <li><a href="#" id="" class="glyphicons envelope ajax-messages" data-tipped-options="ajax: {data: { artist: 'norahjone' }}"><i></i><span ></span></a></li>
               
               
                <li><a href="#" id="" class="glyphicons flag ajax-artist" data-tipped-options="ajax: {data: { artist: 'norahjones' }}"><i></i><span ></span></a></li>
               
                <li class="dropdown dd-1">
                <a href="http://cvdump.com/newcvdump/index.php/myjobs/products" style="color:#ffd02c">UPGRADE</a>
                <ul class="dropdown-menu pull-left">
                        <li><a href="<?php echo base_url(); ?>index.php/myjob/view_profile" class="glyphicons dashboard text-small"><i></i> My Account</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/employers/edit_profile" class="glyphicons charts text-small"><i></i> Job Alert</a></li>
                    </ul>
               
                </li>   
                <!--
                <?php if(isset($result1)) : foreach($result1 as $key => $rows1) : ?>
                <?php
                    $photo = $rows1['42'];
                    $firstname = $rows1['FirstName'];
                ?>
                -->

     
                 
   
               
            </ul>
           
            <!-- Top Menu Right -->
            <ul class="topnav pull-right border-none visible-lg">
               
            <span style="top:78" ><?php echo '<img class="square" width="30" src="'.base_url().'/uploads/'.$photo.'" onerror="this.src=\'http://localhost/careercolony/uploads/avatar.jpg\'" />'; ?> </span>
   
       
            <li class="dropdown dd-1">
                        <a href="index.html?lang=en" data-toggle="dropdown"><i></i> <?php echo $firstname; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu pull-left">
                            <li><a href="<?php echo base_url(); ?>myjobs/settings" class="glyphicons cogwheel text-small"><i></i> Settings</a></li>
                            <li><a href="<?php echo base_url(); ?>myjobs/edit_profile" class="glyphicons life_preserver text-small"><i></i> Support</a></li>
                            <li><a href="<?php echo base_url(); ?>myjobs/logout" class="glyphicons life_preserver text-small"><i></i> Logout</a></li>
                        </ul>
                </li>
   
               
     
                  <?php endforeach ; ?>
                <?php else :?>
                <h3> No records found </h3>
                <?php endif; ?>
               
           
               
            </ul>
           
           
            <div class="clearfix"></div>
            <!-- // Top Menu Right END -->
           
            </div>
           
        </div>
        <!-- Top navbar END -->
       
       
<div id="landing_2">   


   