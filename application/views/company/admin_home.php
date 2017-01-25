<div class="container-777" style="margin-top:20px">
		
			<!-- 2 Column Grid / One Fourth & Three Fourth -->
			<div class="row">

				<!-- One Fourth Column -->
				<div class="col-md-8">
				
					<div class="widget innerAll inner-2x ">
				
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
	</div>
	
	
	
	
	
				
				
					</div>

				</div>

				
				<!-- // One Fourth Column END -->
				
				
				<!-- Three Fourth Column -->
		<div class="col-md-4">
			<div class="widget  padding-none">
				<div class="widget-body padding-none">
				<h5 class="innerAll bg-primary text-white margin-bottom-none">List of Companies ----</h5>
				
				<ul class="list-group list-group-1 margin-none borders-none" id="companies">
					
					
	
					<li class="list-group-item border-top-none"><a href="<?php echo base_url();?>company/create_company"><span class="badge pull-right bg-primary ">30</span><i class="fa fa-exclamation-circle"></i>&nbsp; Create New Company</a></li>
					
						
				</ul>
				</div>
			</div>
			
			<div class="widget">
				
					<div class="display-block media margin-none innerAll">
					<img src="<?php echo base_url();?>banners/banner_img3.jpg">
					</div>
								
			</div>
		</div>
				<!-- // Three Fourth Column END -->
				
			</div>
			<!-- // 2 Column Grid / One Fourth & Three Fourth -->

</div>	

<script>
// Load default company home page
$(document).ready(function(){
    
        var loadUrl = '<?php echo base_url();?>company/admin_home_partials';
        $("#load-page").load(loadUrl);

		$("#create_page").click(function(){
        var loadUrl = '<?php echo base_url();?>company/create_company_partials';
        $("#load-page").load(loadUrl);
    });
});
</script>



<script>

            $(document).ready(function(){

				// Get companies by user
                var user_id = '<?php echo $user_id;?>';
                     $.ajax({
                        dataType: 'html',
                        type: 'get',
                        url: 'http://localhost/neo4j-moviedb/web/get_company_by_user/'+user_id,

                        success: function (response) {
                            
                            var responseData = $.parseJSON(response); //parse JSON
                            if (!responseData[0]) {
                                        $(".result").append('<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12"><center><h1>You do not have any match just yet.....</h1>Suggest matches</center></div>'); 
                                        
                            }else{
                                console.log('Call is ok');
								$.each(responseData, function(index,item) {
									$("#companies").append('<li><div class="media innerAll"><div class="media-object pull-left thumb"><img src="<?php echo base_url();?>uploads/'+item.logo+'" width="45" alt="Image" /></div><div class="media-body"><span class="strong"><a href="<?php echo base_url();?>company/company_home/'+item.coyID+' ">'+item.companyname+'</a></span><span class="muted">contact@mosaicpro.biz</span><br><i class="fa fa-envelope"></i><i class="fa fa-phone"></i> <i class="fa fa-skype"></i> </div></div></li>');
								})
                            }
                           
                            
                        },                     
                        
                        error: function (responseData) {
                            
                            toastr.warning('Personality update failed')
                        }
                    });

					
                    
                  
            });
        
        
        
        </script>

		<script>
 // Submit forms without validation
    $("#create_company").submit(function(e) {
        var frmData1 = $('#create_company').serializeArray().reduce(function(a, x) { a[x.name] = x.value; return a; }, {});
                                        
                    var data1 = JSON.stringify(frmData1);
                    
                     $.ajax({
                        dataType: 'html',
                        type: 'post',
                        url: 'http://localhost/neo4j-alarinna/web/edit_aboutme2',
                        data: data1,
                       
                        
                        success: function (responseData) {
                            
                            
    
                        },
                        error: function (responseData) {
                            
                            toastr.warning('Personal detail update failed')
                        }
                    });
                    
                 
                    e.preventDefault(); // avoid to execute the actual submit of the form.
                    
    });
</script>