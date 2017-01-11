

<style>
// CSS for camera icon in share link section
.notification {
    
	height:400px; 
	width:600px; 
	margin:10% 20% 40% 15%; 
	z-index:20; 
	position:fixed; 
	top:5px;
	
	border: 1px rgb(89,89,89) solid;

background: rgb(81, 196, 241);

-moz-box-shadow:  0px 0px 0px 1px rgb(128,128,128);
-webkit-box-shadow:  0px 0px 0px 1px rgb(128,128,128);
box-shadow:  0px 0px 0px 1px rgb(128,128,128);
}

.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}

#textarea {
    -moz-appearance: textfield-multiline;
    -webkit-appearance: textarea;
    border: 1px solid gray;
    font: medium -moz-fixed;
    font: -webkit-small-control;
    height: 28px;
    overflow: auto;
    padding: 2px;
    resize: both;
    width: 400px;
}

</style>


<?php if(isset($userdetails)) : foreach($userdetails as $key => $rows) : ?>
		<?php

					
			$firstname = $rows['firstname'];
			$lastname = $rows['lastname'];
			$profile_picture = $rows['profile_picture'];
			$profile_title = $rows['profile_title'];
			$profile_organiisation = $rows['profile_organiisation'];
			
			$employment_status = $rows['employment_status'];
			$email = $rows['email'];
			$latitude = $rows['latitude'];
			$longitude = $rows['longitude'];
			$postal_code = $rows['postal_code'];
			$ip = $rows['ip'];
			$country = $rows['country'];
			$validation = $rows['validation'];
			$industry = $rows['industry'];
	
		?>
		
		
		<?php endforeach ; ?>
		<?php else :?>
		<h3> No records found </h3>
		<?php endif; ?>
		
		

<div class="container-960 innerT">
<?php if($validation == '0')
	{ 
		echo "<div class ='notification' style='height:400px; 
		width:600px; 
		margin:10% 20% 40% 15%; 
		z-index:20; 
		position:fixed; 
		top:5px;
	
		padding:30px;
		color:#FFFFFF;
		border: 0px rgb(89,89,89) solid;
		background: rgb(22, 95, 124);
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;' > <h2 class='innerTB text-white strong'> Almost done $firstname ! </h2> <br>We're almost there! We just need you to confirm your email address. Check your <b> $email </b>account or request a <a style='color:#ffffff' href='http://localhost/careercolony1.0/start/email_confirm'>new confirmation link.</a></div>";
	}
	else
	{
		echo '';
	}
?>


<script type="text/javascript">
// Tooltip for notification
  $(document).ready(function() {
    Tipped.create('.ajax-artist', {
      ajax: {
        url: 'http://localhost/careercolony/myjobs/jobs1',
        type: 'post'
      },
      skin: 'light',
      size: 'large',
      radius: false,
      position: 'topleft'
    });
  });
</script>

<?php if($validation =="0") {echo '<div class="row" style="-webkit-filter: blur(6px); filter:blur(3px)">';} else {echo '<div class="row">';}	?>
		
		<div class="col-md-8">
		
	<div class="widget widget-heading-simple widget-body-white">
	<div class="widget-body padding-none">
		<div class="row row-merge">
			<div class="col-md-3">
				<div class="innerAll center">
				
				<!--<?php echo '<img  class="img-circle" width="100" alt="" src="'.base_url().'/uploads/'.$profile_picture.'" onerror="this.src=\'http://localhost/careercolony/uploads/default_avatar.jpg\'" class="img-circle" width="100" alt="" />'; ?> -->
				<img class="img-circle" src="../assets/images/people/80/4.jpg" alt="photo" width="100">
				</div>
			</div>
			<div class="col-md-9">
				<div class="innerAll muted">
					<a href="" class="pull-right"><i class="fa fa-edit"></i> Update Profile</a>
					<h4 class="strong muted"><?php echo $firstname.' '.$lastname  ; ?></a></h4>
					<ul class="list-unstyled fa-ul margin-bottom-none" >
						<li style="postion:relative; left:-28px" class="text-info"> 
						<?php 
							if($employment_status =='student') { echo 'A student of <b> '.$profile_title.'</b>';}
							else{echo '<b>'.$profile_title.'<b/>';}
						?> 
						</li>
						<li style="postion:relative; left:-28px">
						<?php 
							if($employment_status =='unemployed'){echo 'Worked @ '.$profile_organiisation;}
							elseif($employment_status =='student'){ echo '@ ' .$profile_organiisation;}
							else{ echo 'Working @ '.$profile_organiisation;} 
						?>
						</li>
						
						<li style="postion:relative; left:-28px"> &nbsp;</li>
						
					</ul>
					
				
					<!-- Stats Widget -->
					<a href="" class=" widget-stats-2 widget-stats-easy-pie txt-single">
						<div data-percent="50" class="easy-pie warning"><span class="value">50</span>%</div>
						<span class="txt">Completed</span>
						<div class="clearfix"></div>
						<div style="postion:relative; left:-28px;  margin-top:5px"><a href="">Update your profile to increase visibility</a></div>
					</a>
					
					
					
				
				</div>
			</div>
		</div>
	</div>
</div>


	<div class="widget activity-line">
	<div class="widget-body padding-none">
		<div class="share">
			<textarea class="form-control" rows="2" placeholder="Share something you find interesting..."></textarea>
			
			<div class="share-buttons">
				
				
				<div class="fileUpload btn">
    				<i class="fa fa-camera"></i>
    				<input type="file" class="upload" />
				</div>
				
			</div>	
			<a class="btn btn-primary  btn-sm pull-right">Share</a>
		</div>
	</div>
</div>

<div class="widget activity-line">
	<div class="widget-body padding-none">
		
		
		<div class="innerAll">
			<h4>Build Your Network</h4>
			<p class="text-info strong">Connect with colleagues and professionals in your area.</p>
		</div>
		
		<!-- Widget -->
		<div class="col-md-4 coby">
					<div class="widget" style="min-height:250px">
						
						<div class="bg-primary text-center innerAll">
							<div class="innerTB center">
									<img class="img-circle" width="100" src="http://localhost/careercolony/uploads/default_avatar.jpg" alt="" >
									
							</div>
						</div>	
						
						
						<div class="row row-merge">
							<div class="col-md-12">
								<div class="text-center innerAll">
									<h5>Mojisola Alabi <b>(MAA)</b>
									
									<p class="text-info strong" style="height:40px">Software Developer</p>
									
							<a href="" class="ajax-artist" data-tipped-options="ajax: {data: { artist: 'norahjones' }}"><i class="fa fa-fw icon-venn-diagram text-info"></i> 358</a>
							
<span class='ajax-artist' data-tipped-options="ajax: {data: { artist: 'norahjones' }}">Norah Jones</span>
<span class='ajax-artist' data-tipped-options="ajax: {data: { artist: 'theglitchmob' }}">The Glitch Mob</span>

<script type="text/javascript">
  $(document).ready(function() {
    Tipped.create('.ajax-artist', {
      ajax: {
        url: 'artist.php',
        type: 'post'
      },
      skin: 'light',
      size: 'large',
      radius: false,
      position: 'topleft'
    });
  });
</script>
		
								</div>
								<center><a class="outline_b" style="position:relative; bottom:10px">Connect</a></center>
							</div>
							
						</div>
					</div>
		</div>
		<!-- //Widget -->
		
		
		<!-- Widget -->
		<div class="col-md-4">
					<div class="widget" style="min-height:250px">
						<div class="bg-primary text-center innerAll">
							<div class="innerTB center">
									<img class="img-circle" width="100" src="<?php echo base_url(); ?>img/people/19.jpg" alt="" >
									
							</div>
						</div>
						<div class="row row-merge">
							<div class="col-md-12">
								<div class="text-center innerAll">
									<h5>Kunle Ajakaye <b>(Msc)</b>
									
									<p class="text-info strong" style="height:40px">Database Administration </p>
									<a href=""><i class="fa fa-fw icon-venn-diagram text-info"></i> 168</a>
									
									
									
								</div>
								<center><a class="outline_b" style="position:relative; bottom:10px">Connect</a></center>
								
							</div>
							
						</div>
					</div>
		</div>
		<!-- //Widget -->
		
		
		
		<!-- Widget -->
		<div class="col-md-4">
					<div class="widget" style="min-height:250px">
						<div class="bg-primary text-center innerAll">
							<div class="innerTB center">
									<img class="img-circle" width="100" src="<?php echo base_url(); ?>img/people/18.jpg" alt="" >
							</div>
						</div>
						
						<div class="row row-merge">
							<div class="col-md-12">
								<div class="text-center innerAll">
									<h5>James Amadi <b>(BSc)</b>
									
									<p class="text-info strong" style="height:40px">Social Media Manager </p>
									<a href=""><i class="fa fa-fw icon-venn-diagram text-info"></i> 28</a>
									
							</div>
							<center><a href="" class="outline_b" style="position:relative; bottom:10px">Connect</a></center>
								</div>
							
						</div>
					</div>
		</div>
		<!-- //Widget -->
		
		
		
		<div class="clearfix"></div>
		
		
	</div>

	<center><a class="btn btn-info" href="">Get more connections</a></center>
	<p style="height:30px"></p>
</div>

<div class="widget activity-line">
	<div class="widget-body padding-none">
		
		
		<div class="innerAll">
			<h4>Recommended Jobs</h4>
		</div>
		<div class="clearfix"></div>
	</div>
</div>


<div class="row">
	
	<div class="col-md-2">
		<img src="<?php echo base_url(); ?>img/mtn.jpg" alt="image" class="img-rounded img-responsive" />
	</div>
	<div class="col-md-10">
		<div class="widget widget-heading-simple widget-body-white">
	<div class="widget-body padding-none">
		
		<div class="innerAll">
			<div class="muted separator bottom">
				<div class="pull-right label label-default"> <em>3 days ago</em></div>
				<h5 class="strong muted text-uppercase"><i class="fa fa-user "></i> Adrian Demian</h5>
				<span>on <a href="#">Quick Admin Template</a><span>
			</div>
			<p class="margin-none">Make use of a super basic HTML template, or dive into a few examples we've started for you. We encourage folks to iterate on these examples and not simply use them as an end result.</p>
		</div>
		<div class="bg-inverse">
			<img src="<?php echo base_url(); ?>img/interview_training.png" class="img-responsive" />
		</div>
		<div class="bottom-social border-bottom innerAll half bg-gray">
			<a href=""><i class="fa fa-comment"></i> Comment</a> 
			<a href=""><i class="fa fa-share"></i> Share Post</a>
		</div>
		
		<div class="innerAll">
			<ul class="list-group social-comments margin-none">
				<li class="list-group-item">
					<img src="../assets/images/avatar-36x36.jpg" alt="Avatar" class="pull-left" />
				 	<div class="user-info">
					 	<div class="row">
					 		<div class="col-md-3">
						 		<a href="">Adrian Demian</a> 
						 		<abbr>4 days ago</abbr>
						 	</div>
							<div class="col-md-9">
					 			<span> Wow... nice post</span>
					 	 	</div>
					 	 </div>
				 	</div>
				</li>
				<li class="list-group-item">
					<img src="<?php echo base_url(); ?>assets/images/avatar-36x36.jpg" alt="Avatar" class="pull-left">
					<div class="user-info">
						<div class="row">
						 	<div class="col-md-3">
							 	<a href="">Adrian Demian</a> 
							 	<abbr>4 days ago</abbr>
							</div>
							<div class="col-md-9">
						 		<span> Wow... nice post</span>
						 	</div>
						</div>
					</div>
				</li>
				<li class="list-group-item innerAll">
					<input type="text" name="message" class="form-control input-sm" placeholder="Comment here ..." />
				</li>
			</ul>
		</div>
	</div>
</div>
	</div>
	
	
	<div class="col-md-2">
		<img src="<?php echo base_url(); ?>img/photodune-4729139-urban-landscape-xs.jpg" alt="image" class="img-rounded img-responsive" />
		
	</div>
	<div class="col-md-10">
		<div class="widget widget-heading-simple widget-body-white">
	<div class="widget-body padding-none">
		
		<div class="innerAll">
			<div class="muted separator bottom">
				<div class="pull-right label label-default"> <em>3 days ago</em></div>
				<h5 class="strong muted text-uppercase"><i class="fa fa-user "></i> Adrian Demian</h5>
				<span>on <a href="#">Quick Admin Template</a><span>
			</div>
			<p class="margin-none">Make use of a super basic HTML template, or dive into a few examples we've started for you. We encourage folks to iterate on these examples and not simply use them as an end result.</p>
		</div>
		<div class="bg-inverse">
			<img src="<?php echo base_url(); ?>img/photodune-1176874-modern-interior-design-of-apartment-xs.jpg" class="img-responsive" />
		</div>
		<div class="bottom-social border-bottom innerAll half bg-gray">
			<a href=""><i class="fa fa-comment"></i> Comment</a> 
			<a href=""><i class="fa fa-share"></i> Share Post</a>
		</div>
		
		
		
		<div class="innerAll">
			<ul class="list-group social-comments margin-none">
				<li class="list-group-item">
					<img src="<?php echo base_url(); ?>assets/images/avatar-36x36.jpg" alt="Avatar" class="pull-left" />
				 	<div class="user-info">
					 	<div class="row">
					 		<div class="col-md-3">
						 		<a href="">Adrian Demian</a> 
						 		<abbr>4 days ago</abbr>
						 	</div>
							<div class="col-md-9">
					 			<span> Wow... nice post</span>
					 	 	</div>
					 	 </div>
				 	</div>
				</li>
				<li class="list-group-item">
					<img src="<?php echo base_url(); ?>assets/images/avatar-36x36.jpg" alt="Avatar" class="pull-left">
					<div class="user-info">
						<div class="row">
						 	<div class="col-md-3">
							 	<a href="">Adrian Demian</a> 
							 	<abbr>4 days ago</abbr>
							</div>
							<div class="col-md-9">
						 		<span> Wow... nice post</span>
						 	</div>
						</div>
					</div>
				</li>
				<li class="list-group-item innerAll">
					<input type="text" name="message" class="form-control input-sm" placeholder="Comment here ..." />
				</li>
			</ul>
		</div>
	</div>
</div>
	</div>
	
	
	<div class="col-md-2">
		<img src="<?php echo base_url(); ?>assets/images/avatar-large.jpg" alt="image" class="img-rounded img-responsive" />
	</div>
	<div class="col-md-10">
		<div class="widget widget-heading-simple widget-body-white">
	<div class="widget-body padding-none">
		
		<div class="innerAll">
			<div class="muted separator bottom">
				<div class="pull-right label label-default"> <em>3 days ago</em></div>
				<h5 class="strong muted text-uppercase"><i class="fa fa-user "></i> Adrian Demian</h5>
				<span>on <a href="#">Quick Admin Template</a><span>
			</div>
			<p class="margin-none">Make use of a super basic HTML template, or dive into a few examples we've started for you. We encourage folks to iterate on these examples and not simply use them as an end result.</p>
		</div>
		<div class="bg-inverse">
			<img data-src="holder.js/100%x200/dark" class="img-clean" />
		</div>
		<div class="bottom-social border-bottom innerAll half bg-gray">
			<a href=""><i class="fa fa-comment"></i> Comment</a> 
			<a href=""><i class="fa fa-share"></i> Share Post</a>
		</div>
		
		<div class="innerAll">
			<ul class="list-group social-comments margin-none">
				<li class="list-group-item">
					<img src="../assets/images/avatar-36x36.jpg" alt="Avatar" class="pull-left" />
				 	<div class="user-info">
					 	<div class="row">
					 		<div class="col-md-3">
						 		<a href="">Adrian Demian</a> 
						 		<abbr>4 days ago</abbr>
						 	</div>
							<div class="col-md-9">
					 			<span> Wow... nice post</span>
					 	 	</div>
					 	 </div>
				 	</div>
				</li>
				<li class="list-group-item">
					<img src="<?php echo base_url(); ?>assets/images/avatar-36x36.jpg" alt="Avatar" class="pull-left">
					<div class="user-info">
						<div class="row">
						 	<div class="col-md-3">
							 	<a href="">Adrian Demian</a> 
							 	<abbr>4 days ago</abbr>
							</div>
							<div class="col-md-9">
						 		<span> Wow... nice post</span>
						 	</div>
						</div>
					</div>
				</li>
				<li class="list-group-item innerAll">
					<input type="text" name="message" class="form-control input-sm" placeholder="Comment here ..." />
				</li>
			</ul>
		</div>
	</div>
</div>
	</div>

</div>


		

</div>

		<!--Sidebar starts here-->

	
<div class="col-md-4">
				
				
			<div class="widget widget-timeline-friends">
							<div class=" widget-heading innerLR half ">
								<h5 class="pull-left strong">Visitors to your profile </h5>
								<div class="dropdown pull-right ">
									<a data-toggle="dropdown" href="#" class="btn btn-default btn-xs dropdown-toggle"><i class="fa fa-eye"></i></a>
									<ul class="dropdown-menu">
										<li data-toggle="tooltip" data-title="Online" data-placement="left" ><a href="#"><i class="fa fa-circle"></i></a></li>
										<li data-toggle="tooltip" data-title="Offline" data-placement="left" ><a href="#"><i class="fa fa-circle-o"></i></a></li>
									</ul>
								</div>
							<div class="clearfix "></div>
							</div>
							<div class="widget-body  innerAll half" >
							
							<ul class="list-unstyled">
								<li class="innerAll border-bottom"> 
									<span class="badge badge-default pull-right" style="font-size:16px">14</span>
								<i class="fa fa-fw icon-user-1"></i> Your profile view in 30 days
								</li>
								<li class="innerAll border-bottom">
									<span class="badge badge-default bg-primary pull-right" style="font-size:16px">4</span>
									<i class="fa fa-fw fa-dashboard"></i> Profile appearance in search reasult
								</li>

							</ul>
										<p></p>
										<center><a href="" class="text-center strong">Who viewed your profile ?</a></center>
										<p></p>
								<a data-toggle="image-preview" data-title="Lorem ipsum"  data-content="<small>Last Activity: 1h ago</small>" data-image-preview="../assets/images/people/250/1.jpg" width="100" href="#" class="pull-left border-none">
									<img src="../assets/images/people/80/1.jpg" alt="photo" width="35">
								</a>	
									
								<a data-toggle="image-preview" data-title="Lorem ipsum"  data-content="<small>Last Activity: 1h ago</small>" data-image-preview="../assets/images/people/250/2.jpg" width="100" href="#" class="pull-left border-none">
									<img src="../assets/images/people/80/2.jpg" alt="photo" width="35">
								</a>	
									
								<a data-toggle="image-preview" data-title="Lorem ipsum"  data-content="<small>Last Activity: 1h ago</small>" data-image-preview="../assets/images/people/250/3.jpg" width="100" href="#" class="pull-left border-none">
									<img src="../assets/images/people/80/3.jpg" alt="photo" width="35">
								</a>	
									
								<a data-toggle="image-preview" data-title="Lorem ipsum"  data-content="<small>Last Activity: 1h ago</small>" data-image-preview="../assets/images/people/250/4.jpg" width="100" href="#" class="pull-left border-none">
									<img src="../assets/images/people/80/4.jpg" alt="photo" width="35">
								</a>	
									
								<a data-toggle="image-preview" data-title="Lorem ipsum"  data-content="<small>Last Activity: 1h ago</small>" data-image-preview="../assets/images/people/250/5.jpg" width="100" href="#" class="pull-left border-none">
									<img src="../assets/images/people/80/5.jpg" alt="photo" width="35">
								</a>	
									
								<a data-toggle="image-preview" data-title="Lorem ipsum"  data-content="<small>Last Activity: 1h ago</small>" data-image-preview="../assets/images/people/250/6.jpg" width="100" href="#" class="pull-left border-none">
									<img src="../assets/images/people/80/6.jpg" alt="photo" width="35">
								</a>	
									
									
													<center><a href="" class="text-center">See more</a></center>
											
																<div class="clearfix"></div>
							</div>


						</div>
			
			
			
			
		
		
			<div class="widget" style="padding:4.5px">
				<img src="<?php echo base_url();?>banners/banner_img4.jpg">
				</div>
				
				
				
				
				<div class="widget widget-body-white ">
					
					<div class="innerAll border-bottom">
						<!-- Profile Photo -->
											
				<h5 class="margin-none strong">People you may know</h5>
					</div>				<style>	
											.scrollx_sidebar{
												left: 10px; 
												top:10px;	
												height:230px;						
												overflow-x: hidden;						
												overflow-y: auto;}				
										</style>
					
					
					
					
					<hr class="margin-none">
				</div>
				
				
				
				
				
				
				
				
				
				
				
				
						
						<!-- Widget -->
					<div class="widget">
						<div class="bg-primary text-center innerAll">
							<div class="innerTB">
								<h4 class="innerTB text-white">Today's Weather</h4>
								<div class="strong text-xlarge text-white">
									<i class="fa fa-cloud"></i> 26<sup>°</sup>
								</div>
							</div>
						</div>
						<div class="row row-merge">
							<div class="col-md-6">
								<div class="text-center innerAll">
									<p class="margin-none"><i class="fa icon-wind-speed-censor fa-2x"></i></p>
									<p class="lead margin-none strong">15 m/h</p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="text-center innerAll">
									<p class="margin-none"><i class="fa icon-water fa-2x"></i></p>
									<p class="lead margin-none strong">40%</p>
								</div>
							</div>
						</div>
					</div>
						<!-- //Widget -->
				
				
			
				
				<div class="widget widget-body-white ">
					
					<div class="innerAll border-bottom">
						<!-- Profile Photo -->
												<h5>Invite Your Friends to CC</h5>
						
					</div>
					
					
					<hr class="margin-none">
				</div>
				
				<div class="widget widget-heading-simple widget-body-white">
					
					<!-- Widget Heading -->
					<div class="widget-head">
						<h4 class="heading">Ads by Cvdump</h4>
					</div>
					<!-- // Widget Heading END -->
					
					<!-- Widget Body -->	
					<div class="widget-body padding-none">
					<ul class="list-unstyled">
						<li class="innerAll border-bottom">					
							<p class="margin-none">Adobe Photoshop Cerficate</p>
							<span class="label label-default ">on 16 Dec 2013</span>
						</li>

						<li class="innerAll border-bottom">
							<p class="margin-none">Bachelor Degree in Web Graphics</p>
							<span class="label label-default ">on 05 Jan 2014</span>
						</li>

						<li class="innerAll">
							<a href="#" class="btn btn-primary btn-xs">View all</a>
							
						</li>
					</ul>

					</div>
					<!-- // Widget Body END -->
					
				</div>
				<!-- // Widget END -->	
				
				
			</div>
			

</div>


<script src="<?php echo base_url(); ?>assets/components/modules/admin/charts/easy-pie/assets/lib/js/jquery.easy-pie-chart.js?v=v2.1.0"></script>
<script src="<?php echo base_url(); ?>assets/components/modules/admin/charts/easy-pie/assets/custom/easy-pie.init.js?v=v2.1.0"></script>
