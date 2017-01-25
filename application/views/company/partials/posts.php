
<?php //print'<pre>';
//print_r($posts);

?>

<?php if(isset($posts)) : foreach($posts as $key => $rows) : ?>
	<?php


		$user_id = $rows['user_id'];
		$coyID = $rows['coyID'];
		$postID = $rows['postID'];
		$title = $rows['title'];
		$description = $rows['description'];
		$companyname = $rows['companyname'];
		$post_time = $rows['post_time'];
		$thumbnail_url = $rows['thumbnail_url'];
		//$start_year = $rows['start_year'];
		//$city = $rows['city'];
		//$country = $rows['country'];
		//$jobDescription =$rows['job_description'];
		
	?>

<div class="row">

				<div class="col-md-2">
					<img width="70" src="<?php echo base_url(); ?>img/mtn.jpg" alt="image" class="img-rounded img-responsive pull-right" />
				</div>
				<div class="col-md-10">
					<div class="widget widget-heading-simple widget-body-white">
						<div class="widget-body padding-none">
					
							<div class="innerAll">
								<div class="muted separator bottom">
									<div class="pull-right label label-default"> <em><?php echo $post_time; ?></em></div>
									<h5 class="strong muted text-uppercase"><i class="fa fa-user "></i> <?php echo $companyname; ?></h5>
									<span>on <a href="#"><?php echo $title; ?></a><span>
								</div>
								<span class=""><?php echo $description; ?></span>
							</div>
							<div class="bg-inverse1">
								<img src="<?php echo $thumbnail_url;?>" class="img-responsive" />
							</div>	
							<div class="bottom-social border-bottom innerAll half bg-white">
								<a href=""><i class="fa fa-comment"></i> Comment</a> 
								<a href=""><i class="fa fa-share"></i> Share Post</a>
							</div>

							<div class="innerAll bg-gray">
								<ul class="list-group social-comments margin-none">
									
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

<?php endforeach ; ?>
<?php else :?>
<li> <div style="padding-left:35px; font-size:18px;"><i class="fa fa-exclamation-circle"></i> No work records found</div> </li>
<?php endif; ?>


<script>
$(document).ready(function(){
    $('#contentsubmit').keypress(function(e) {
      if(e.which == 13) {
           $('#form').submit();
           // this.form.submit(); 
           // document.getElementById("form").submit(); 

           console.log('log me!');
           e.preventDefault(); // Stops enter from creating a new line
       }
    });
});
</script>



