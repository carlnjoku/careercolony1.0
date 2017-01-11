<script src="<?php echo base_url(); ?>plugins/sticky-element.js"></script> 
<script src="<?php echo base_url(); ?>plugins/bluckUI.js"></script> 
<style>
    .slim {
        border-radius: 0.5rem;
        width:230px;
        height:230px;
    }
    .photo{
        border-radius: 0.5rem;
    }

   .modal-backdrop
    {
        opacity:0.9 !important;
    }


    .modalchat.in  .modal-backdrop{ background-color: #000; }

    #ajax {
        top:0%;
        right:16%;
        outline: none;
    }

    body.modal-open {
    overflow: hidden;
    position: fixed;
}

.indicator{
    position:relative;
    right:65px;
    top: -3px;
}



</style>

<style type="text/css">
    	
.bg-white {
  background-color: #fff;
}

.friend-list {
  list-style: none;
margin-left: -40px;

}

.friend-list li {
  border-bottom: 1px solid #eee;
}

.friend-list li a img {
  float: left;
  width: 45px;
  height: 45px;
  margin-right: 0px;
}

 .friend-list li a {
  position: relative;
  display: block;
  padding: 10px;
  transition: all .2s ease;
  -webkit-transition: all .2s ease;
  -moz-transition: all .2s ease;
  -ms-transition: all .2s ease;
  -o-transition: all .2s ease;
}

.friend-list li.active a {
  background-color: #f1f5fc;
}

.friend-list li a .friend-name, 
.friend-list li a .friend-name:hover {
  color: #777;

}

.friend-list li a .last-message {
  width: 65%;
  white-space: nowrap;
  text-overflow: ellipsis;
  overflow: hidden;
}

.friend-list li a .time {
  position: absolute;
  top: 10px;
  right: 8px;
}

small, .small {
  font-size: 85%;
}

.friend-list li a .chat-alert {
  position: absolute;
  right: 8px;
  top: 27px;
  font-size: 10px;
  padding: 3px 5px;
}

.chat-message {
  padding: 60px 20px 115px;
}

.chat {
    list-style: none;
    margin: 0;
}

.chat-message{
    background: #f9f9f9;  
}

.chat li img {
  width: 45px;
  height: 45px;
  border-radius: 50em;
  -moz-border-radius: 50em;
  -webkit-border-radius: 50em;
}

img {
  max-width: 100%;
}

.chat-body {
  padding-bottom: 20px;
}

.chat li.left .chat-body {
  margin-left: 70px;
  background-color: #fff;
}

.chat li .chat-body {
  position: relative;
  font-size: 11px;
  padding: 10px;
  border: 1px solid #f1f5fc;
  box-shadow: 0 1px 1px rgba(0,0,0,.05);
  -moz-box-shadow: 0 1px 1px rgba(0,0,0,.05);
  -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
}

.chat li .chat-body .header {
  padding-bottom: 5px;
  border-bottom: 1px solid #f1f5fc;
}

.chat li .chat-body p {
  margin: 0;
}

.chat li.left .chat-body:before {
  position: absolute;
  top: 10px;
  left: -8px;
  display: inline-block;
  background: #fff;
  width: 16px;
  height: 16px;
  border-top: 1px solid #f1f5fc;
  border-left: 1px solid #f1f5fc;
  content: '';
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
}

.chat li.right .chat-body:before {
  position: absolute;
  top: 10px;
  right: -8px;
  display: inline-block;
  background: #fff;
  width: 16px;
  height: 16px;
  border-top: 1px solid #f1f5fc;
  border-right: 1px solid #f1f5fc;
  content: '';
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
}

.chat li {
  margin: 15px 0;
}

.chat li.right .chat-body {
  margin-right: 50px;
  background-color: #fff;
}

.chat-box {
  position: fixed;
  bottom: 0;
  left: 344px;
  right: 0;
  padding: 10px;
  border-top: 1px solid #eee;
  transition: all .5s ease;
  -webkit-transition: all .5s ease;
  -moz-transition: all .5s ease;
  -ms-transition: all .5s ease;
  -o-transition: all .5s ease;
}

.primary-font {
  color: #3c8dbc;
}

a:hover, a:active, a:focus {
  text-decoration: none;
  outline: 0;
}
</style>


<style>



header {
  /*box-shadow: inset 1px 1px 60px 3px rgba(0,0,0,0.5), inset 1px 1px 60px 3px rgba(0,0,0,0.5);*/

 -moz-box-shadow: 0 2px 24px  rgba(0, 0, 0, 0.3);
 -webkit-box-shadow: 0 2px 24px  rgba(0, 0, 0, 0.3); 
 box-shadow: 0 2px 24px  rgba(0, 0, 0, 0.3);

  margin:   0px auto 30px;
  height:   393px;
  position: relative;
  width:    100%;
}

figure.profile-banner {
  background: rgba(0, 0, 0, .9);
  left:     0;
  overflow: hidden;
  position: absolute;
  top:      0;
  z-index:  1;
  
  
}

figure.profile-picture {
  background-position: center center;
  background-size: cover;
  border: 1px #D0D0D0 solid;
  border-radius: 1px;
  bottom: -1px;
  
  height: 80px;
  left: 120px;
  position: absolute;
  width: 80px;
  z-index: 3;
  
}

div.profile-stats {
  bottom: 0;
  left: 0;
  padding: 15px 15px 15px 220px;
  position: absolute;
  right: 0;
  z-index: 2;
}

div.profile-stats ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

div.profile-stats ul li {
  color: #000000;
  display: block;
  float: left;
  font-size: 24px;
  margin-right: 30px;
  
}

div.profile-stats li span {
  display: block;
  font-size: 16px;
  font-weight: normal;
}

div.profile-stats a.follow {
  display: block;
  float: right;color: #ffffff;
  margin-top: 5px;
  text-decoration: none;
  
  /* This is a copy and paste from Bootstrap */
  background-color: #49afcd;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
  background-color: #49afcd;
  background-image: -moz-linear-gradient(top, #5bc0de, #2f96b4);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#5bc0de), to(#2f96b4));
  background-image: -webkit-linear-gradient(top, #5bc0de, #2f96b4);
  background-image: -o-linear-gradient(top, #5bc0de, #2f96b4);
  background-image: linear-gradient(to bottom, #5bc0de, #2f96b4);
  background-repeat: repeat-x;
  border-color: #2f96b4 #2f96b4 #1f6377;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff5bc0de', endColorstr='#ff2f96b4', GradientType=0);
  filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
  display: inline-block;
  padding: 4px 12px;
  margin-bottom: 0;
  font-size: 14px;
  line-height: 20px;
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
  border-radius: 4px;
}

div.profile-stats a.follow.followed {
  
  /* Once again copied from Boostrap */
  color: #ffffff;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
  background-color: #5bb75b;
  background-image: -moz-linear-gradient(top, #62c462, #51a351);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#62c462), to(#51a351));
  background-image: -webkit-linear-gradient(top, #62c462, #51a351);
  background-image: -o-linear-gradient(top, #62c462, #51a351);
  background-image: linear-gradient(to bottom, #62c462, #51a351);
  background-repeat: repeat-x;
  border-color: #51a351 #51a351 #387038;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff62c462', endColorstr='#ff51a351', GradientType=0);
  filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
}

header>h1 {
  bottom: -50px;
  color: #354B63;
  font-size: 20px;
  left: 340px;
  position: absolute;
  z-index: 5;
}

#navigation ul li.active-link>a{
     text-decoration:underline;
     color:YOUR-LINK-COLOR;
 }
</style>

<header>
            <figure class="slim_banner" >
                
                <div  id="profile_banner">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                    <img  class="img-responsive"src="<?php echo base_url();?>uploads/company_banner/office2.jpg">
                                </div>
                                <div class="item">
                                    <img src="<?php echo base_url();?>uploads/company_banner/office1.jpg">
                                </div>
                                
                            </div>
                        

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="fa fa-angle-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="fa fa-angle-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                   
                    
                </div>
                
            </figure>

                        
            <figure class="profile-picture" 
                style="background-image: url('<?php echo base_url();?>uploads/logo_flavour.png')">
            </figure>

                        
            <div class="profile-stats" id="menubar">
                        <ul>
                            <li><?php echo 'Blueshell Technologies' ?>    <span><?php echo 'Lagos', ' Nigeria'; ?></span></li>
                            <li id="navigation">
                                <ul style="position:relative; top:20px; left:50px;">
                                    <li><span><a id="home" href="javascript:;" class="text-info"><i class="fa fa-home"></i> Activities</a></span></li>
                                    <li><span><a id="about" href="javascript:;" class="text-info"><i class="fa fa-calendar"></i> About Us</a></span></li>
                                    <li><span><a id="services" href="javascript:;" class="text-info"><i class="fa fa-product-hunt"></i> Services</a></span></li>
                                    <li><span><a id="events" href="javascript:;" class="text-info"><i class="fa fa-picture-o"></i> Events</a></span></li>
                                    <li><span><a id="careers" href="javascript:;" class="text-info"><i class="fa fa-briefcase"></i> Post Jobs</a></span></li>
                                </ul>
                                
                            </li>
                        </ul>
                        
                        
            </div>
</header>



<div class="container-777">
		
		
		
			<!-- 2 Column Grid / One Fourth & Three Fourth -->
			<div class="row">

				<!-- One Fourth Column -->
				<div class="col-md-8" id="load-page">
			
				</div>
				<!-- // One Fourth Column END -->
				
				
				<!-- Three Fourth Column -->
		<div class="col-md-4" id="sidebar">
    <div class="widget  padding-none">
				<div class="widget-body padding-none">
				<h5 class="innerAll bg-primary text-white margin-bottom-none">Choose Category:</h5>
				
				<ul class="list-group list-group-1 margin-none borders-none">
					<li class="list-group-item border-top-none"><a href="courses_listing.html?lang=en"><span class="badge pull-right bg-primary ">30</span><i class="fa fa-exclamation-circle"></i>&nbsp; New Job Post</a></li>
					<li class="list-group-item"><a href="courses_listing.html?lang=en"><span class="badge pull-right bg-primary ">2</span><i class="fa fa-ticket"></i>&nbsp; Create Post</a></li>
					<li class="list-group-item"><a href="courses_listing.html?lang=en"><i class="fa fa-spinner"></i>&nbsp; Create a Project</a></li>
          <li class="list-group-item"><a href="courses_listing.html?lang=en"><i class="fa fa-spinner"></i>&nbsp; Events</a></li>
				
				</ul>
				</div>
			</div>
    
      <!-- Widget -->
			<div class="widget">
      <h5 class="innerAll margin-none border-bottom strong">Page Analytics <span class="pull-right"> <i class="fa fa-eye"></i><a href="#">View Detail</a></span></h5>
      
				<div class="row row-merge">
					<div class="col-md-4 bg-gray">
						<div class="innerAll inner-2x text-center">
							<div class="sparkline" sparkHeight="65" data-colors="#cacaca, #74a6d0,#609450,#cacaca">1,4,3,8</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="innerAll">
							<ul class="list-unstyled">
								<li class="innerAll half"><i class="fa fa-fw fa-square text-info"></i> <span class="strong">5,931</span> Page Visitors</li>
								<li class="innerAll half"><i class="fa fa-fw fa-square text-success"></i> <span class="strong">402</span> Followerss</li>
								<li class="innerAll half"><i class="fa fa-fw fa-square text-muted"></i> <span class="strong">15,120</span> Post Views</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- //End Widget -->

			<div class="widget">
				
					<div class="display-block media margin-none innerAll">
					<img src="<?php echo base_url();?>banners/banner_img1.jpg">
					</div>
								
			</div>
			
			<div class="widget">
				<h5 class="innerAll margin-none border-bottom strong">Google Adwords</h5>
					<div class="display-block media margin-none innerAll">
					New adverts here
					</div>
								
			</div>
			
		</div>
				<!-- // Three Fourth Column END -->
				
			</div>
			<!-- // 2 Column Grid / One Fourth & Three Fourth -->

</div>	

<script>
 			$("#sidebar").stick_in_parent({
   			 	offset_top: 120
			});
		</script>



<script>
// Load default company home page
$(document).ready(function(){
        var coyID = '<?php echo $this->uri->segment(3);?>';
        var loadUrl = '<?php echo base_url();?>company/edit_home/'+coyID;
        $("#load-page").load(loadUrl);
});
</script>



<script>
$(document).ready(function(){
    $("#home").click(function(){
        var coyID = '<?php echo $this->uri->segment(3);?>';
        var loadUrl = '<?php echo base_url();?>company/edit_home/'+coyID;
        $("#load-page").load(loadUrl);
    });

    $("#about").click(function(){
        var loadUrl = '<?php echo base_url();?>company/p_about';
        $("#load-page").load(loadUrl);
    });


    $("#services").click(function(){
        var loadUrl = '<?php echo base_url();?>company/p_services';
        $("#load-page").load(loadUrl);
    });

    $("#events").click(function(){
        var loadUrl = '<?php echo base_url();?>company/p_events';
        $("#load-page").load(loadUrl);
    });

    $("#careers").click(function(){
        var loadUrl = '<?php echo base_url();?>company/p_careers';
        $("#load-page").load(loadUrl);
    });
});
</script>



<script src="<?php echo base_url(); ?>assets/components/modules/admin/charts/flot/assets/lib/jquery.flot.js?v=v2.1.0"></script>
<script src="<?php echo base_url(); ?>assets/components/modules/admin/charts/flot/assets/lib/jquery.flot.resize.js?v=v2.1.0"></script>
<script src="<?php echo base_url(); ?>assets/components/modules/admin/charts/flot/assets/lib/plugins/jquery.flot.tooltip.min.js?v=v2.1.0"></script>
<script src="<?php echo base_url(); ?>assets/components/modules/admin/charts/flot/assets/custom/js/flotcharts.common.js?v=v2.1.0"></script>
<script src="<?php echo base_url(); ?>assets/components/modules/admin/charts/flot/assets/custom/js/flotchart-line-2.init.js?v=v2.1.0"></script>
<script src="<?php echo base_url(); ?>assets/components/modules/admin/charts/flot/assets/custom/js/flotchart-bars-horizontal.init.js?v=v2.1.0"></script>
<script src="<?php echo base_url(); ?>assets/components/modules/admin/charts/flot/assets/custom/js/flotchart-mixed-1.init.js?v=v2.1.0"></script>
<script src="<?php echo base_url(); ?>assets/components/modules/admin/charts/easy-pie/assets/lib/js/jquery.easy-pie-chart.js?v=v2.1.0"></script>
<script src="<?php echo base_url(); ?>assets/components/modules/admin/charts/easy-pie/assets/custom/easy-pie.init.js?v=v2.1.0"></script>
<script src="<?php echo base_url(); ?>assets/components/modules/admin/charts/sparkline/jquery.sparkline.min.js?v=v2.1.0"></script>
<script src="<?php echo base_url(); ?>assets/components/modules/admin/charts/sparkline/sparkline.init.js?v=v2.1.0"></script>


           




