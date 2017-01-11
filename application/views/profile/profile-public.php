<script src="<?php echo base_url(); ?>plugins/jquery.shorten-master/src/jquery.shorten.min.js"></script> 
<script src="<?php echo base_url(); ?>plugins/sticky-element.js"></script>  

<link href="<?php echo base_url();?>/plugins/tooltip/themes/2/tooltip.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url();?>/plugins/tooltip/themes/2/tooltip.js" type="text/javascript"></script>
    <style type="text/css">
            
        #span4 img {cursor:pointer;margin:20px;}   
    </style>


<script>
$(document).ready(function(){
    $("#hide").click(function(){
        $("p").fadeOut('3000');
        event.preventDefault();
    });
    $("#show").click(function(){
        $("p").fadeIn('3000');
    });
});
</script>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "block";
    }
}
</script>


<style>
.addExpHeader{width: 100%;
width: 100%;
height: 55px;

padding: 10px;

font-family: inherit;
color: #F5F2F2;
text-align: left;
font-size: 19px;
background-color:#2c5c84;
letter-spacing: 0em;
-webkit-border-radius: 7px 7px 0px 0px;
-moz-border-radius: 7px 7px 0px 0px;
border-radius: 7px 7px 0px 0px;


-moz-box-shadow: 0px 0px 0px 0px rgba(227, 227, 227, 0.98);
-webkit-box-shadow: 0px 0px 0px 0px rgba(227, 227, 227, 0.98);
box-shadow: 0px 0px 0px 0px rgba(227, 227, 227, 0.98);

}
.addExpBody{
width: 100%;
height: 100%;
background: rgba(247, 248, 249, 0.1);
border: 1px #EBEBEB solid;
border-top:none;

padding: 10px;
padding-top: 20px;

font-family: inherit;
color: #000000;
text-align: left;
font-size: 12px;

line-height: 1.2;

-moz-box-shadow: 0px 4px 0px 0px rgba(232, 232, 232, 0.69);
-webkit-box-shadow: 0px 4px 0px 0px rgba(232, 232, 232, 0.69);
box-shadow: 0px 4px 0px 0px rgba(232, 232, 232, 0.69);
margin-bottom:70px;
}
.social-links a{
    text-align: center;
	float: left;
	width: 36px;
	height: 36px;
	border: 1px solid #FFFFFF;
	border-radius: 100%;
	margin-right: 7px; /*space between*/

} 
.social-links a i{
	font-size: 20px;
    line-height: 38px;
	color: #FFFFFF;
}

</style>



<?php if(isset($profile)) : foreach($profile as $key => $rows) : ?>
		<?php
			
			
			$user_id = $rows['user_id'];
			$firstname = $rows['firstname'];
			$lastname = $rows['lastname'];
			$email = $rows['email'];
			$profile_organiisation = $rows['profile_organiisation'];
			$profile_title = $rows['profile_title'];
			$profile_picture = $rows['profile_picture'];
			$employment_status = $rows['employment_status'];
			$validation = $rows['validation'];
			$country = $rows['country'];
			$industry = $rows['industry'];
			
	
	
		?>
		
		
		
		<?php endforeach ; ?>
		<?php else :?>
		<h3> No records1 found </h3>
		<?php endif; ?>

<header id="header">

  <div class="bg-editor"></div>

  <div class="slider">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo base_url();?>uploads/profile_banner/default.jpg">
    </div>
  </div>
</div>

<div id="mask"></div>
                	</div><!--slider-->
                	<nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                    
                        <div class="navbar-header">
							
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainNav">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                          <a class="navbar-brand img-circle" width="150" href="#"><img class="img-responsive" src="<?php echo base_url();?>assets/images/16.jpg"></a>
                          <div class="social-links" style="position:relative; top:-80px; color:#fff; left:150px" >
    							<a href="#"><i class="fa fa-facebook"></i></a>
    							<a href="#"><i class="fa fa-twitter fa-lg"></i></a>
    							<a href="#"><i class="fa fa-google-plus fa-lg"></i></a>
    							<a href="#"><i class="fa fa-pinterest fa-lg"></i></a>
						  </div>
                          <span  class="site-name"><b><?php echo $firstname.' '.$lastname; ?></b></span>
                          <span class="site-description"><?php echo $profile_title; ?></span>
                          
                        </div>
                    
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="mainNav" >
                          <ul class="nav main-menu navbar-nav">
                            <li><a href="p_about" class="text-info strong"><i class="fa fa-home"></i> CONTACTS</a></li>
                            <li><a href="p_careers" class="text-info strong"><i class="fa fa-home"></i> CONNECTIONS</a></li>
                            <li><a href="p_gallery" class="text-info strong"><i class="fa fa-image"></i> FOLLOWING</a></li>
                            <li><a href="p_follow" class="text-info strong"><i class="fa fa-plus"></i> FOLLOW</a></li>
                       
                          </ul>
                          
                           <ul class="nav  navbar-nav navbar-right">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                          </ul>
                        </div><!-- /.navbar-collapse -->
					</nav>
                    
                </header><!--/#HEADER-->

<div class="container-777">
		
		
		
			<!-- 2 Column Grid / One Fourth & Three Fourth -->
			<div class="row">

				<!-- One Fourth Column -->
				<div class="col-md-8">
				
					
					
		
	
					

<div class="widget innerAll inner-2x" id="experience">

<span class="toolti" onmouseover="tooltip.pop(this, '#demo2_tip', {position:0, cssClass:'no-padding'})">
    Content from another element
</span> 
<div style="display:none;">
    <div id="demo2_tip">
        
        <img class="img-responsive" src="<?php echo base_url(); ?>uploads/company_banner/banner5.jpg" />
        <h3>SEO Friendly</h3>
        The tooltip content is from another element in the page. This approach is <b>Search Engine Friendly</b>.
    </div>
</div>
	<div class="row">
		<div class="col-md-12">
			<div class="widget-body padding-none">
				<ul class="timeline-activity list-unstyled">
					<li class="active">
						<i class="list-icon fa fa-briefcase"></i>
						<div class="block block-inline">
							<div class="" style="position:relative; top:-10px">
								<h4 class="strong">Work Experience</h4>
							</div>
						</div>
					</li>
					
					<?php if(isset($experience)) : foreach($experience as $key => $rows) : ?>
					<?php
			
			
						$user_id = $rows['user_id'];
						$workID = $rows['workID'];
						$employername = $rows['employername'];
						$position = $rows['position'];
						$industry = $rows['industry'];
						$start_month = $rows['start_month'];
						$start_year = $rows['start_year'];
						$city = $rows['city'];
						$country = $rows['country'];
						$jobDescription =$rows['job_description'];
						
					?>
					
					<li>
						<i class="list-icon" style="font-size:12px">6yrs</i>
						<div class="block block-inline">
							<div class="" style="position:relative; top:10px">
								<div class="col-md-12">
									<h5 style="color:#000" class="strong" onmouseover="tooltip.pop(this, '#demo2_tip', {position:0, cssClass:'no-padding'})"><?php echo 'Sales and Marketing'; ?> </h5> <img class="pull-right" style="position:relative; top:-30px" src="<?php echo base_url();?>uploads/57c898e725107.png" width="40" alt="Image">
									<div style="font-size:14px" class="strong text-info"><?php echo 'Flavoursoft Consulting'; ?></div>
									<div><?php echo 'Lagos, Nigeria'; ?></div>
									<div><span class="label label-default"><?php echo 'Mar 2001-2010'; ?></span></div>
									<div style="margin-top:5px; color:#000" class="comment"><?php echo $jobDescription; ?></div>
								</div>
							</div>
						</div>
					</li>
					
					<?php endforeach ; ?>
					<?php else :?>
					<li> <div style="padding-left:35px; font-size:18px;"><i class="fa fa-exclamation-circle"></i> No work records found</div> </li>
					<?php endif; ?>
					<li>
						<i class="list-icon" style="font-size:12px">4yrs</i>
						<div class="block block-inline">
							<div class="" style="position:relative; top:10px">
								<div class="col-md-12">
									<h4><?php echo 'Managing Director'; ?> </h4> <img class="pull-right" style="position:relative; top:-30px" src="<?php echo base_url();?>uploads/57cd2cedb5bbc.png" width="40" alt="Image">
									<div style="font-size:14px" class="strong text-info"><?php echo 'Cvdump Resources Limited'; ?></div>
									<div><?php echo 'Lagos, Nigeria'; ?></div>
									<div><?php echo 'Mar 2001-2010'; ?></div>
									<div style="color:#000000"><?php echo 'Brand development, web site traffic growth, web site UI and advertising revenue. Developed brand strategy and statistics systems. 
									Strategic Consulting, including business plan & sales strategy development.
									'; ?></div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<i class="list-icon" style="font-size:12px">1yrs</i>
						<div class="block block-inline">
							<div class="" style="position:relative; top:10px">
								<div class="col-md-12">
									<h4><?php echo 'Project Manager'; ?> </h4> <img class="pull-right" style="position:relative; top:-30px" src="<?php echo base_url();?>uploads/57c5648e67fd8.png" width="40" alt="Image">
									<div style="font-size:14px" class="strong text-info"><?php echo 'Blueshell Technologies LTD'; ?></div>
									<div><?php echo 'Victoria IslandLagos, Nigeria'; ?></div>
									<div><?php echo 'Mar 2001-2010'; ?></div>
									<div style="color:#000000"><?php echo 'Brand development, web site traffic growth, web site UI and advertising revenue. Developed brand strategy and statistics systems. 
									Advising new businesses on formation of corporations and business structures, drafting privacy policies and structuring commercial transactions.'; ?>
									
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
							
		
							</div>
							
			
							
				   
				
					</div>

<div class="widget innerAll inner-2x" id="Education">
	<div class="row">
		<div class="col-md-12">
			<div class="widget-body padding-none">
				<ul class="timeline-activity list-unstyled">
					<li class="active">
						<i class="list-icon fa icon-graduation"></i>
						<div class="block block-inline">
							<div class="" style="position:relative; top:-10px">
								<h4 class="strong">Education</h4>
							</div>
						</div>
					</li>
					<li>
						<i class="list-icon" style="font-size:12px">6yrs</i>
						<div class="block block-inline">
							<div class="" style="position:relative; top:10px">
								<div class="col-md-12">
									<h4><?php echo 'Sales and Marketing'; ?> </h4>
									<div style="font-size:14px" class="strong text-primary"><?php echo 'Flavoursoft Consulting'; ?></div>
									<div><?php echo 'Lagos, Nigeria'; ?></div>
									<div><?php echo 'Mar 2001-2010'; ?></div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<i class="list-icon" style="font-size:12px">4yrs</i>
						<div class="block block-inline">
							<div class="" style="position:relative; top:10px">
								<div class="col-md-12">
									<h4><?php echo 'Managing Director'; ?> </h4>
									<div style="font-size:14px" class="strong text-primary"><?php echo 'Cvdump Resources Limited'; ?></div>
									<div><?php echo 'Lagos, Nigeria'; ?></div>
									<div><?php echo 'Mar 2001-2010'; ?></div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<i class="list-icon" style="font-size:12px">1yrs</i>
						<div class="block block-inline">
							<div class="" style="position:relative; top:10px">
								<div class="col-md-12">
									<h4><?php echo 'Project Manager'; ?> </h4>
									<div style="font-size:14px" class="strong text-primary"><?php echo 'Blueshell Technologies LTD'; ?></div>
									<div><?php echo 'Victoria IslandLagos, Nigeria'; ?></div>
									<div><?php echo 'Mar 2001-2010'; ?></div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
							
	</div>
</div>
					
				
</div>
<!-- // One Fourth Column END -->
				
				
				
				
				
				<!-- Three Fourth Column -->
		<div class="col-md-4" id="sidebar">
			
			<div class="widget">
				<h5 class="innerAll margin-none border-bottom strong">Profile Analytics</h5>
					<div class="display-block media margin-none innerAll">
					
					<br>
					Boost Your connection section 
					</div>
								
			</div>
			
			<div class="widget">
				
					<div class="display-block media margin-none innerAll">
					<img src="<?php echo base_url();?>banners/banner_img2.jpg">
					</div>
								
			</div>
			
			
			
		</div>
		
		<script>
 			$("#sidebar").stick_in_parent({
   			 	offset_top: 120
			});
		</script>
				<!-- // Three Fourth Column END -->
				
			</div>
			<!-- // 2 Column Grid / One Fourth & Three Fourth -->

</div>	

<script language="javascript">
$(document).ready(function() {
	
	$(".comment").shorten({
		moreText: 'read more',
    	lessText: 'read less',
    	showChars: 150
	
	});

 });
</script>
