<script src="<?php echo base_url(); ?>plugins/sticky-element.js"></script> 
<script src="<?php echo base_url(); ?>plugins/jquery.shorten-master/src/jquery.shorten.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/overlay-loader/loadingoverlay.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/overlay-tools/overlay-tool.min.js"></script>

<link href="<?php echo base_url();?>plugins/slim-image-upload-and-ratio-cropping-plugin/example/css/slim.min.css" rel="stylesheet" type="text/css" />



<!-- each overlay is initialized with this single JavaScript call -->
<script>
  	$(function() {
    	//$("button[rel]").overlay({mask: '#9a9b9b', effect: 'apple', closeOnClick: false});
    	$("a[rel]").overlay({mask: '#9a9b9b', effect: 'apple', top:'15%', non:'disable', closeOnClick: false});
    });
  							
</script>

<script language="javascript">
$(document).ready(function() {
	jQuery.noConflict();
	$(".comment").shorten({
		moreText: 'read more',
    	lessText: 'read less',
    	showChars: 150
	
	});

 });
</script>

<script language="javascript">
$(document).ready(function() {
 	jQuery.noConflict();
 	$("#sidebar").stick_in_parent({
   		offset_top: 102
	});
 });
</script>

<script language="javascript">
$(document).ready(function() {
 	jQuery.noConflict();
 	$("#section").stick_in_parent({
   		offset_top: 102
	});
 });
</script>


<script>
$(document).ready(function () {
   
    $('ul').sortable({
        axis: 'y',
        stop: function (event, ui) {
	        var listdata = $(this).sortable('serialize');
            
            $.ajax({
                    type: 'post',
            		url: 'http://localhost/neo4j-moviedb/web/sorting',
            		data: listdata,
            		success: function (data) {
              	
         			//alert(data);
         			$('span').text(listdata);
          			
            	}
            });
	}
    });
});
</script>




<script>
// Generate list of year drop-down
$(document).ready(function () {
   var myselect = document.getElementById("year"),
    startYear = new Date().getFullYear()
    count = 25;
  
	(function(select, val, count) {
  		do {
    select.add(new Option(val--, count--), null);
  		} while (count);
	})(myselect, startYear, count);
});
</script>


<script>
// Generate list of year drop-down
$(document).ready(function () {
   var myselect1 = document.getElementById("year1"),
    endYear = new Date().getFullYear()
    count = 25;
  
	(function(select, val, count) {
  		do {
    select.add(new Option(val--, count--), null);
  		} while (count);
	})(myselect1, endYear, count);
});
</script>




<header id="header">

<div class="slim"
     	data-service="<?php echo base_url(); ?>plugins/slim-image-upload-and-ratio-cropping-plugin/example/async.php?user_id=<?php echo $user_id;?>"
     	data-ratio="36:9"
     	data-min-size="1040,300"
     	data-max-file-size="2"
     	data-save-initial-image="true"
     	data-service="http://localhost/careercolony/profile/profile_background"> 
    	<img  src="<?php echo base_url();?>profile-images/profileBackground/jbjbjbkjytfdyt.jpg">
    	<input type="file" name="slim[]"/>

 	
</div>



                	<nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                    
                        <div class="navbar-header">
							
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainNav">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                          <span class="navbar-brand img-square" width="150" href="#">
                          
                          <img class="img-responsive" src="<?php echo base_url();?>assets/images/6.jpg">
                          <span>
                          
                          <span class="site-name"><b><?php echo $firstname.' '.$lastname; ?></b></span>
                          <span class="site-description"><?php echo $profile_title; ?></span>
                        </div>
                    
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="mainNav" >
                          <ul class="nav main-menu navbar-nav">
                            <li><a href="p_home" class="text-info strong"><i class="fa fa-home"></i> HOME</a></li>
                            <li><a href="p_about" class="text-info strong"><i class="fa fa-home"></i> ABOUT US</a></li>
                            <li><a href="p_careers" class="text-info strong"><i class="fa fa-home"></i> PRODUCTS & SERVICES</a></li>
                            <li><a href="p_careers" class="text-info strong"><i class="fa fa-home"></i> CAREERS</a></li>
                            <li><a href="p_gallery" class="text-info strong"><i class="fa fa-image"></i> EVENTS</a></li>
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
				



	
				<div class="widget innerAll inner-2x bg-info" >
					
							
							<div class="row">
								<div class="col-md-12">

									<div class="row">
										<div class="col-md-4 social-links">
										
										<a href="#"><i class="fa icon-briefcase-2 fa-lg"></i></a> <b>Add Experience</b>, you verify that
										</div>
										
										<div class="col-md-4 social-links">
										<a href="#"><i class="fa icon-graduation fa-lg"></i></a> <B>Add Education</B> the continue button, you verify
										</div>
										
										<div class="col-md-4 social-links">
										<a href="#"><i class="fa fa-file-text-o fa-lg"></i></a> <B>Upload CV </B>the continue button, you verify that
										</div>
										
										<p>&nbsp;&nbsp;</p>
										
										<div class="pull-right"><i class="fa  fa-lg icon-chevron-down-thick"></i> Add More Sections</div>
									</div>


									
								</div>
							</div>
					</div>
				
							
				


<!-- Start Experience -->	
<div class="widget innerAll inner-2x" id="experience">




	<div class="row">
		<div class="col-md-12" id="position">
			<div class="widget-body padding-none">
				<ul class="timeline-activity list-unstyled">
					<li class="active">
						<i class="list-icon fa fa-briefcase"></i>
						<div class="block block-inline">
							<div class="" style="position:relative; top:-10px">
								<h4 class="strong">Work Experience</h4>  
							</div>
						</div>
						
						<div class="icon-add pull-right"><a rel="#addExperience" href="#" href='javascript:void(0);' href="#"><i class="fa fa-plus fa-lg"></i></a></div> 
				
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
						<div id="list<?php echo $workID; ?>">
						<i class="list-icon" style="font-size:12px">6yrs</i>
						<div class="block block-inline">
							<div class="" style="position:relative; top:10px">
								<div class="col-md-12">
								
									<h4 class="pull-left margin-none innerR"><?php echo $position; ?> &nbsp;<a href='javascript:void(0);' onclick="return editExp(<?php echo $workID; ?>);" >  <i class="fa text-faded fa-pencil"></i></a>  &nbsp;<a href="#">  <i class="fa text-faded fa-trash"></i></a>  &nbsp;<a href="#">  <i class="fa text-faded fa-sort"></i></a></h4>
									<div style="clear:both"></div>
									<div style="font-size:14px" class="strong text-primary"> <?php echo $employername; ?> </div>
									<div><?php echo $city.', '.$country; ?></div>
									<div><?php echo 'Mar 2001-2010'; ?></div>
									<div style="margin-top:5px; color:#000" class="comment more"><?php echo $jobDescription; ?></div>
								</div>
							</div>
						</div>
						</div>
						
						<div class="col-md-12" style="display:none" id="editExperience<?php echo $workID; ?>">

					
					<div class="editHeader bg-info">Edit ( <?php echo $position; ?> ) <i style="color:#FFFFFF" class="close fa icon-delete-symbol"></i></div>
							<div class="editBody">
									
										<form id="editExp<?php echo $workID;?>" class="form-horizontal">
										<input class="form-control" id="user_id" name="user_id" value="<?php echo $user_id; ?>" type="hidden" />
										<input class="form-control" id="workID" name="workID" value="<?php echo $workID; ?>" type="hidden" />
											<div class="inner-form-edit">
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="position">Job Title</label>
												<div class="col-md-6"><input class="form-control" id="position" name="position" value="<?php echo $position; ?>" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="employername">Company</label>
												<div class="col-md-6"><input class="form-control" id="employername" name="employername" value="<?php echo $employername; ?>" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="indutry">Industry</label>
												<div class="col-md-4"><input class="form-control" id="indutry" name="indutry" value="<?php $indutry; ?>" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="city">City</label>
												<div class="col-md-6"><input class="form-control" id="city" name="city" value="<?php echo $city; ?>" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="country">Country</label>
												<div class="col-md-6"><input class="form-control" id="country" name="country" value="<?php echo $country; ?>" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											
											<!-- Group -->
										<div class="form-group">
												<label class="col-md-3 control-label">Period</label>
												<div class="col-md-8">
													<select class="" id="start_month" name="start_month" >
														<option value="">Month</option>
														<option value="">Jan</option>
														<option value="">Feb</option>
														<option value="">Mar</option>
														<option value="">Apr</option>
														<option value="">May</option>
														<option value="">Jun</option>
														<option value="">Jul</option>
														<option value="">Aug</option>
														<option value="">Sep</option>
														<option value="">Oct</option>
														<option value="">Nov</option>
														<option value="">Nov</option>
														
						                          
													</select>
													<select id="year1" name="year1"></select>
													
													&nbsp;&nbsp;To &nbsp;&nbsp;
													<select class="" id="end_month" name="end_month" >
														<option value="">Month</option>
														<option value="">Jan</option>
														<option value="">Feb</option>
														<option value="">Mar</option>
														<option value="">Apr</option>
														<option value="">May</option>
														<option value="">Jun</option>
														<option value="">Jul</option>
														<option value="">Aug</option>
														<option value="">Sep</option>
														<option value="">Oct</option>
														<option value="">Nov</option>
														<option value="">Nov</option>
														
						                          
													</select>
													<select class="" id="end_year" name="end_year" >
													
													</select>
													
												</div>
											</div>
					
					
								<!-- Group -->
								<div class="form-group">
						<label class="col-md-3 control-label" for="firstname">Job Description</label>
						<div class="col-md-8">
							<textarea placeholder="Enter your job description here....." id="companydescription" name="companydescription" class="wysihtml5 form-control"  rows="4"><?php echo $jobDescription; ?></textarea>
							
						</div>
					</div>
								<!-- // Group END -->
					
				<hr style="border-color:#bfbebe">
					
				</div>  <!-- // End of inner-form -->
				
				<!-- Form actions -->
			
				<label class="col-md-3 control-label" for="controls"></label>
				<input type="button" value="Save" id="submit" name="" class="btn btn-info" onclick="editExperience(<?php echo $workID; ?>);" />
				<button type="button" class="btn btn-default"><i class="fa fa-times"></i> Close</button>
				<div style="clear:both"></div>
				<p></p>
			
			<!-- // Form actions END -->	
			
			<div style="clear:both"></div>		
									
									
			</form>
		
		</div>
	</div>
						
					</li>
					
					<?php endforeach ; ?>
					<?php else :?>
					<li> <div style="padding-left:35px; font-size:18px;"><i class="fa fa-exclamation-circle"></i> No work records found</div> </li>
					<?php endif; ?>
									
					
					
				</ul>
			</div>
		</div>
							
	
								
								
					
	<div class="col-md-12" style="display:none" id="addExperience" style="margin-top:40px">

					<div class="modalHeader bg-info">Add Experience <i style="color:#FFFFFF" class="close fa icon-delete-symbol"></i> </div>
							
						<div class="modalBody">
							
										<form id="addExp" name="addExp" class="form-horizontal">
											<div class="inner-form">
											<input class="form-control" id="user_id" name="user_id" value="<?php echo $user_id;?>" type="hidden" />
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="job title">Job Title</label>
												<div class="col-md-6"><input class="form-control" id="position" name="position" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="employername">Company</label>
												<div class="col-md-6"><input class="form-control" id="employername" name="employername" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="city">City</label>
												<div class="col-md-6"><input class="form-control" id="city" name="city" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="country">Country</label>
												<div class="col-md-6"><input class="form-control" id="country" name="country" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="industry">Industry</label>
												<div class="col-md-4"><input class="form-control" id="industry" name="industry" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
										<div class="form-group">
												<label class="col-md-3 control-label">Period</label>
												<div class="col-md-8">
													<select class="" id="start_month" name="start_month" >
														<option value="">Month</option>
														<option value="01">Jan</option>
														<option value="02">Feb</option>
														<option value="03">Mar</option>
														<option value="04">Apr</option>
														<option value="05">May</option>
														<option value="06">Jun</option>
														<option value="07">Jul</option>
														<option value="08">Aug</option>
														<option value="09">Sep</option>
														<option value="10">Oct</option>
														<option value="11">Nov</option>
														<option value="12">Dec</option>
														
						                          
													</select>
													<select id="year" name="from_year"></select>
													
													
													&nbsp;&nbsp;To &nbsp;&nbsp;
													<select class="" id="end_month" name="end_month" >
														<option value="">Month</option>
														<option value="01">Jan</option>
														<option value="02">Feb</option>
														<option value="03">Mar</option>
														<option value="04">Apr</option>
														<option value="05">May</option>
														<option value="06">Jun</option>
														<option value="07">Jul</option>
														<option value="08">Aug</option>
														<option value="09">Sep</option>
														<option value="10">Oct</option>
														<option value="11">Nov</option>
														<option value="12">Dec</option>
														
						                          
													</select>
													<select id="year" name="to_year"></select>
													
												</div>
											</div>
					
					
								<!-- Group -->
								<div class="form-group">
						<label class="col-md-3 control-label" for="firstname">Description</label>
						<div class="col-md-8">
							<textarea placeholder="Enter your job description here....." id="job_description" name="job_description" class="wysihtml5 form-control"  rows="4"></textarea>
							
						</div>
					</div>
								<!-- // Group END -->
					
				<hr style="border-color:#616263">
					
				</div>
				
				<!-- Form actions -->
			<div class="form-group">
				<label class="col-md-3 control-label"></label>
				<div class="input-group">
				<span><input type="submit" class="btn btn-info" id="submit" value="Save And Another Exp"></span> 
				&nbsp; <span style="margin-top:15px" id="loading"></span> <span class="text-success strong" style="font-size:18px" id="saved"></span> 
				</div>
	
			</div>
			<!-- // Form actions END -->	
			
			
			<div style="clear:both"></div>		
		</form>
									
									
									
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
		
		
		
		
		
		
				<!-- // Three Fourth Column END -->
				
			</div>
			<!-- // 2 Column Grid / One Fourth & Three Fourth -->

</div>	

<script type="text/javascript" src="<?php echo base_url();?>/plugins/slim-image-upload-and-ratio-cropping-plugin/example/js/slim.kickstart.min.js"></script>