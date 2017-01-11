<script src="<?php echo base_url(); ?>plugins/jquery.shorten-master/src/jquery.shorten.min.js"></script> 

<div class="container-777">
		
			<!-- 2 Column Grid / One Fourth & Three Fourth -->
			<div class="row">

				<!-- One Fourth Column -->
				<div class="col-md-8">

                        <div class="widget innerAll inner-2x">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="widget-body padding-none">
                                        <ul class="timeline-activity list-unstyled">
                                            <li class="active"><i class="list-icon fa fa-briefcase"></i>
                                                <div class="block block-inline">
                                                    <div class="" style="position:relative; top:-10px">
                                                        <h4 class="strong">Work Experience</h4>
                                                    </div>
                                                </div>
                                            </li>
                                            <span id="experience_ajax"></span>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>				
					
					
                </div>
	
					


				
				
				
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
<script>

            $(document).ready(function(){
                var user_id = '<?php echo $user_id;?>';
                     $.ajax({
                        dataType: 'html',
                        type: 'get',
                        url: 'http://localhost/neo4j-moviedb/web/get_profile/'+user_id,

                        
                       
                            //setTimeout($.unblockUI, 20000); 

                        success: function (response) {
                            
                            var responseData = $.parseJSON(response); //parse JSON
                            if (!responseData[0]) {
                                        $(".result").append('<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12"><center><h1>You do not have any match just yet.....</h1>Suggest matches</center></div>'); 
                                        
                            }else{
                                console.log('Call is ok');
                            }
                           
                            
                        },                     
                        
                        error: function (responseData) {
                            
                            toastr.warning('Personality update failed')
                        }
                    });



                    // Get experience
                    $.ajax({
                        dataType: 'html',
                        type: 'get',
                        url: 'http://localhost/neo4j-moviedb/web/work/'+user_id,

                        
                       
                            //setTimeout($.unblockUI, 20000); 

                        success: function (response) {
                            
                            var responseData = $.parseJSON(response); //parse JSON
                            if (!responseData[0]) {
                                        $(".result").append('<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12"><center><h1>You do not have any match just yet.....</h1>Suggest matches</center></div>'); 
                                        
                            }else{
                                
                                $.each(responseData, function(index,item) {
                              
                                   $('#experience_ajax').append('<li><i class="list-icon" style="font-size:12px">6yrs</i><div class="block block-inline"><div class="" style="position:relative; top:10px"><div class="col-md-12"><h4>'+item.position+' </h4></h4> <img class="pull-right" style="position:relative; top:-30px" src="<?php echo base_url();?>uploads/57cd2cedb5bbc.png" width="40" alt="Image"><div style="font-size:14px" class="strong text-primary">'+item.employername+'</div><div><?php echo 'Lagoss, Nigeria'; ?></div><div><?php echo 'Mar 2001-2010'; ?></div><div style="color:#000000">'+item.job_description+'</div></div></div></div></li>');
                                });
                              
                            }
                           
                            
                        },                     
                        
                        error: function (responseData) {
                            
                            toastr.warning('Personality update failed')
                        }
                    });
                    
                  
            });
        
        
        
        </script>


        


