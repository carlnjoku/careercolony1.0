<script type="text/javascript" src="<?php echo base_url(); ?>plugins/overlay-loader/loadingoverlay.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/timeago.js"></script>
<script src="<?php echo base_url(); ?>plugins/sticky-element.js"></script>  
<script src="<?php echo base_url(); ?>plugins/jscroll-master/jquery.jscroll.min.js"></script> 
<script src="<?php echo base_url(); ?>plugins/jquery.shorten-master/src/jquery.shorten.js"></script> 

<script src="http://cdn.embed.ly/jquery.embedly-3.0.5.min.js" type="text/javascript"></script>
<script src="http://cdn.embed.ly/jquery.preview-0.3.2.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="http://cdn.embed.ly/jquery.preview-0.3.2.css" />
  
<!--<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/jquery-preview-master/css/preview.css.css" />-->


<script src="<?php echo base_url(); ?>plugins/jquery.json2html-master/json2html.js"></script>
<script src="<?php echo base_url(); ?>plugins/jquery.json2html-master/jquery.json2html.js"></script>

<script src="<?php echo base_url(); ?>plugins/ajax-scroll-paging/js/script.js"></script>


<link href="<?php echo base_url();?>plugins/slim-image-upload-and-ratio-cropping-plugin/example/css/slim.min.css" rel="stylesheet" type="text/css" />


<script>
jQuery(document).ready(function() {
  jQuery("time.timeago").timeago();
});
</script>
 
    
    <style>
      .cropit-preview {
        background: url('../company-avatar.png') no-repeat;
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
       
      }

      .cropit-preview-image-container {
        cursor: move;
      }

      .image-size-label {
        margin-top: 10px;
      }

      input {
        display: block;
      }

      button[type="submit"] {
        margin-top: 10px;
      }

      #result {
        margin-top: 10px;
        width: 900px;
      }

      #result-data {
        display: block;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        word-wrap: break-word;
        
      }
      .selector_w
      {
      	background-color: #FAFAFA;
      
      }
    </style>
    
    <style>
label {
   pointer: cursor;
   /* Style as you please, it will become the visible UI component. */
}

#upload-photo {
   opacity: 0;
   position: absolute;
   z-index: -1;
}
</style>

<div class="container-777" style="margin-top:20px">
		
<script>
      $(function () {
        
        $('form').bind('submit', function () {
          $.ajax({
            type: 'post',
            url: 'http://localhost/neo4j-moviedb/web/company_post',
            data: $('form').serialize(),
            
            beforeSend: function()
        	{
             	$("#element").LoadingOverlay("show");
             	
        	},
            success: function (data) {
              	var data = $.parseJSON(data);//parse JSON
          	  	var coyID = data.coyID;
         		var status = data.status;
         		var post_text = data.post_text;
         		var post_time = data.post_time;
         		var companyname = data.companyname;
          		if(status === '0') {
              		$("#error").fadeIn('3000');
          		}else{
              		var transform = {"tag":"div", "class":"media", "style":"margin-bottom:20px", "children":[
							{"tag":"img", "class":"media-object pull-left thumb", "src": "<?php echo base_url(); ?>uploads/logo_flavour.png"},
							
							{"tag":"div", "class":"media-body","children":[
								{"tag":"div","class":"innerAll media box-generic margin-none", "style":"border-radius: 5px 5px 0px 0px", "children":[
									{"tag":"div", "class":"muted", "children":[
										{"tag":"h5", "class":"strong muted","html":"${companyname}"}
									]},
									{"tag":"div", "class":"comment", "html":"${post_text}"},	
								]},
								
								{"tag":"div", "class":"bg-inverse"},
							
								{"tag":"div", "class":"bottom-social border-bottom innerAll half bg-gray", "children":[
									{"tag":"a", "class":"fa fa-comment", "children":[{"tag":"i", "html":"  comment"}]},
									{"tag":"a", "class":"fa fa-share", "children":[{"tag":"i", "html":"  share"}]},
									{"tag":"a", "class":"fa fa-thumbs-o-up", "children":[{"tag":"i", "html":"  like"}]},
								]},
							
								{"tag":"div", "class":"border-bottom innerAll half bg-gray","children":[
									{"tag":"img", "class":"media-object pull-left thumb"},
									{"tag":"div", "class":"media-body innerAll", "children":[
										{"tag":"h6", "class":"media-heading strong", "html":"Carl Njoku"},
									]},
								]},
							]},
						
						
						]};
    	
    	$(function(){
       
        //Create the list
        $('#postResult').json2html(data,transform).fadeIn("3000");
        $("#list").LoadingOverlay("hide");
    	});
          		}
              
              $("#element").LoadingOverlay("hide", true);
             
            }
          });
          return false;
        });
      });
    </script>
		
<script>

	function addComment(id) { 
		//var postid = id;
		var res = "#comment"+(id);
		var form_data = $(res).serialize();
	
		console.log(res);
		//var result = "#display" + (id);
	
		// Get the refreshed data
		var loadUrl = "<?php echo site_url(); ?>profile/edit_profie";

		$(function(){  
			$.ajax({type: 'POST',
			cache: false,
    		url: '<?php echo site_url(); ?>profile/updateEducation/'+id,
			data: form_data,
			
			beforeSend: function()
        	{
             	//$("#elements").fadeIn();
             	$("#element").LoadingOverlay("show");
             	
        	},
        	
			success: function(msg){
			
        	//alert(form_data);
        	triggers.eq(1).overlay().close();	
        },
		error: function(comment){
		}


     });
	});
  }

</script>
		


<script language="javascript" type="text/javascript">
	function limitText(limitField, limitCount, limitNum) {
		if (limitField.value.length > limitNum) {
			limitField.value = limitField.value.substring(0, limitNum);
		} else {
			limitCount.value = limitNum - limitField.value.length;
		}
	}
</script>
		
		
			<!-- 2 Column Grid / One Fourth & Three Fourth -->
			<div class="row">

		<?php if(isset($companyDetails)) : foreach($companyDetails as $key => $rows) : ?>
		<?php
			
			
			$coyID = $rows['coyID'];
			$user_id = $rows['user_id'];
			$companyname = $rows['companyname'];
			$companytype = $rows['companytype'];
			$companydescription = $rows['companydescription'];
			$logo = $rows['logo'];
			$founded = $rows['founded'];
			$companyemail = $rows['companyemail'];
			$address = $rows['address'];
			$city = $rows['city'];
			$state = $rows['state'];
			$country = $rows['country'];
			$industry = $rows['industry'];
			//$coysize = $rows['coysize'];
			$website = $rows['website'];
	
	
		?>
		
		
		<?php endforeach ; ?>
		<?php else :?>
		<h3> No records found </h3>
		<?php endif; ?>

				<!-- One Fourth Column -->
				<div class="col-md-8">
				
				
				
				
				
				<!-- Widget -->
			<div class="relativeWrap" id="element">
				<div class="widget widget-heading-simple widget-body-gray">
					<div class="widget-body">
					<h5 class="strong muted">Engage Your Audience</h5>
						<p>Post your daily events about your products and services to trigger discussion ..</p>
						<div class="share margin-none" >
							<form id="" action="#" method="post" class="form-horizontal">
							<input class="form-control" id="user_id" name="user_id" value="<?php echo $user_id;?>" type="hidden" />
							<input class="form-control" id="coyID" name="coyID" value="<?php echo $coyID;?>" type="hidden" />
							<input class="form-control" id="post_image" name="post_image" value="" type="hidden" />
							<input class="form-control" id="companyname" name="companyname" value="<?php echo $companyname;?>" type="hidden" />
							<input class="form-control" id="post_video" name="post_video" value="" type="hidden" />
								<textarea class="form-control" style="border:1px solid #D8D8D8; background-color:#FAFAFA" id="post_text" name="post_text" rows="2" placeholder="Share something you find interesting..."></textarea>
							<div class="media box-generic margin-none bg-none" style="border:none">
								<div class="selector-wrapper"></div>
							</div>
							 
							<div class="form-actions">
				
								<input type="submit" class="btn btn-xs btn-info" id="submit" class="next button" value="Post Now">
								<button type="submit" class="btn btn-xs btn-info" id="submit"><i class="fa fa-thumb-tack"></i> Post</button>
							</div>
							</form>	
							
					
													
													
						<form action="post.php" method="post" enctype="multipart/form-data" class="avatar">

							<div class="slim"
								
								data-ratio="1:1">
								<input type="file" name="slim[]" required />
							</div>

							<button type="submit">Upload now!</button>

						</form>
												
						</div>
						
					</div>
				</div>
			</div>
			<!-- // Widget END -->
			
			<!-- Placeholder that tells Preview where to put the selector-->




<!-- <script id="source" language="javascript" type="text/javascript">

  $(function () 
  {
    //-----------------------------------------------------------------------
    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
    //-----------------------------------------------------------------------
    $.ajax({                                      
      url: '<?php echo base_url(); ?>company/coypost/2',   //the script to call to get data                                         
      dataType: 'json',                //data format 
      beforeSend: function()
      {
        $("#list").LoadingOverlay("show");
             	
      },     
      success: function(data)  //on recieve of reply
      {
   	  var logo = '<?php echo base_url(); ?>assets/images/avatar-36x36.jpg" alt="Image';
        //List item transform
    	
    	var transform = {"tag":"div", "class":"media", "style":"margin-bottom:20px", "children":[
							{"tag":"img", "class":"media-object pull-left thumb", "src": "<?php echo base_url(); ?>uploads/logo_flavour.png"},
							
							{"tag":"div", "class":"media-body","children":[
								{"tag":"div","class":"innerAll media box-generic margin-none", "style":"border-radius: 5px 5px 0px 0px", "children":[
									{"tag":"div", "class":"muted", "children":[
										{"tag":"h5", "class":"strong muted","html":"${companyname}"}
									]},
									{"tag":"div", "class":"comment", "html":"${post_text}"},	
								]},
								
								{"tag":"div", "class":"bg-inverse"},
							
								{"tag":"div", "class":"bottom-social border-bottom innerAll half bg-gray", "children":[
									{"tag":"a", "class":"fa fa-comment", "children":[{"tag":"i", "html":"  comment"}]},
									{"tag":"a", "class":"fa fa-share", "children":[{"tag":"i", "html":"  share"}]},
									{"tag":"a", "class":"fa fa-thumbs-o-up", "children":[{"tag":"i", "html":"  like"}]},
								]},
							
								{"tag":"div", "class":"border-bottom innerAll half bg-gray","children":[
									{"tag":"img", "class":"media-object pull-left thumb"},
									{"tag":"div", "class":"media-body innerAll", "children":[
										{"tag":"h6", "class":"media-heading strong", "html":"Carl Njoku"},
									]},
								]},
							]},
						
						
						]};
    	
    	$(function(){
       
        //Create the list
        $('#list').json2html(data,transform);
        $("#list").LoadingOverlay("hide");
    	});
      } 
    });
  }); 

  </script> -->
  



 
    <script>
        // Set up preview.
        $('#post_text').preview({key:'d2f283608a3b4fa4a6ba77b522d4e26d'})
     	
        // On submit add hidden inputs to the form.
        $('form').on('submit', function(){
          $(this).addInputs($('#post_text').data('preview'));
          return true;
        });
    </script>
	

	
	<div id="postResult"></div>
	<div id="list"></div>	
	
	<script type="text/javascript">
		$(document).ready(function() {
			$(".comment").shorten();
		});
	</script>	


					

<!--Start List -->							
							
<div id="list">

			
			<?php
                $last_id = 0;
                foreach ($companyPosts as $rows) {
                    $last_id = $rows['postID']; // keep the last id for the paging
                    $coyID = $rows['coyID'];
                    $postID = $rows['postID'];
					$companyname = $rows['companyname'];
					$post_text = $rows['post_text'];
					$post_time = $rows['post_time'];
					$post_image = $rows['post_image'];
					$post_video = $rows['post_video'];
					
					if($post_image==''){echo $media = '';}else{$media = "<div class='bg-inverse'><img src='http://localhost/careercolony1.0/uploads/company_banner/$post_image' class='img-responsive' /></div>";}
            ?>
			

<img class="media-object pull-left" style="border-radius: 7px; margin-right:10px" src="<?php echo base_url();?>/uploads/57c5648e67fd8.png" width="80" alt="Image" />


<div class="media-body">

			<div class="widget widget-heading-simple widget-body-white">
	<div class="widget-body padding-none">
		
		<div class="innerAll">
			<div class="muted separator bottom">
				<div class="pull-right label label-default"> <?php echo $postID; ?><em>3 days ago</em></div>
				<h5 class="strong muted text-uppercase"><i class="fa fa-user "></i> <?php echo $companyname; ?></h5>
				<span>on <a href="#">Quick Admin Template</a><span>
			</div>
			<p class="margin-none"><?php echo $post_text; ?></p>
		</div>
		<div class="bg-inverse">
			<img src="<?php echo base_url(); ?>uploads/company_banner/banner2.jpg" class="img-responsive" />
		</div>
		<div class="bottom-social border-bottom innerAll half bg-gray">
			<a href=""><i class="fa fa-comment"></i> Comment</a> 
			<a href=""><i class="fa fa-share"></i> Share Post</a>
		</div>
		
		<div class="innerAll">
			<ul class="list-group social-comments margin-none">
				
				<li class="list-group-item">
					<img src="<?php echo base_url(); ?>assets/images/6.jpg" alt="Avatar" width="40" class="pull-left" />
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
					<form id="comment<?php echo $postID; ?>">
					<input type="text" onkeydown="myFunction(<?php echo $postID; ?>)" id="message" name="message" class="form-control input-sm" placeholder="Comment here cool..." />
					
					<button type="submit" onclick="addComment(<?php echo $postID; ?>);" style="display:none; margin:5px 5px 0px 0px" class="btn btn-xs btn-info comment_button" id="submit"><i class="fa fa-reply"></i> Reply</button>
					<form>
				</li>
				<script>
					function myFunction(id) {
    					$(".comment_button").show();
					}
				</script>
			</ul>
		</div>
	</div>
</div>



</div>

<?php
}
?>

 <script type="text/javascript">
                	var last_id = <?php echo $last_id; ?>;
                	var coyID = <?php echo $coyID; ?>;
                	
                	//alert(last_id);
                </script>


</div>
<!--End List -->

 <p id="loader" class="center" style="margin:30px 30px"><img src="<?php echo base_url(); ?>img/ajax-loader.gif"></p>
				
</div>
				
				<!-- // One Fourth Column END -->
				
				
				
				
				<!-- Three Fourth Column -->
				<div class="col-md-4" id="sidebar">
			<div class="widget padding-none">
				<div class="widget-body padding-none">
				<h5 class="innerAll bg-primary text-white margin-bottom-none">My Companies</h5>
				
				<ul class="list-group list-group-1 margin-none borders-none">
					<li class="list-group-item border-top-none"><a href="#"><i class="fa fa-edit"></i>&nbsp; Manage <?php echo $companyname; ?>'s Page</a></li>
					<li class="list-group-item"><a href="create_company"><i class="fa fa-plus"></i>&nbsp; Create a New Company</a></li>
					<li class="list-group-item"><a href="create_company"><i class="fa fa-plus"></i>&nbsp; Post a Project</a></li>
				
					
				</ul>
				</div>
			</div>
			
			<div class="widget">
				
					<div class="display-block media margin-none innerAll">
					<img src="<?php echo base_url();?>banners/banner_img1.jpg">
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



<script type="text/javascript" src="<?php echo base_url();?>/plugins/slim-image-upload-and-ratio-cropping-plugin/example/js/slim.kickstart.min.js"></script>
