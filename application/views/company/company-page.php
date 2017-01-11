<script type="text/javascript" src="<?php echo base_url(); ?>plugins/overlay-loader/loadingoverlay.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/timeago.js"></script>
<script src="<?php echo base_url(); ?>plugins/sticky-element.js"></script>  
<script src="<?php echo base_url(); ?>plugins/jscroll-master/jquery.jscroll.min.js"></script> 
<script src="<?php echo base_url(); ?>plugins/shorten_text.js"></script> 

<script src="http://cdn.embed.ly/jquery.embedly-3.0.5.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>plugins/jquery-preview-master/dist/jquery.preview.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/jquery-preview-master/css/preview.css" />



<script src="<?php echo base_url(); ?>plugins/jquery.json2html-master/json2html.js"></script>
<script src="<?php echo base_url(); ?>plugins/jquery.json2html-master/jquery.json2html.js"></script>



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
</style>     
      
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


<style type="text/css">
.thumb-image{
float:left;
width:635px;
position:relative;
padding:5px;
}
</style>

<script>
$(document).ready(function() {
        $("#fileUpload").on('change', function() {
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var image_holder = $("#image-holder");
          image_holder.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++) 
              {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image"
                  }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
              }
            } else {
              alert("This browser does not support FileReader.");
            }
          } else {
            alert("Pls select only images");
          }
        });
      });
</script>



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
        $('#postResult').json2html(data,transform);
        $("#list").LoadingOverlay("hide");
        document.getElementById("cform").reset();
        $(".selector-wrapper").fadeOut();
        
        
    	});
          		}
              
              $("#element").LoadingOverlay("hide", true);
             
            }
          });
          return false;
        });
      });
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
							<form id="cform" action="#" method="post" class="form-horizontal">
							<input class="form-control" id="user_id" name="user_id" value="<?php echo $user_id;?>" type="hidden" />
							<input class="form-control" id="coyID" name="coyID" value="<?php echo $coyID;?>" type="hidden" />
							<input class="form-control" id="post_image" name="post_image" value="" type="hidden" />
							<input class="form-control" id="companyname" name="companyname" value="<?php echo $companyname;?>" type="hidden" />
							<input class="form-control" id="post_video" name="post_video" value="" type="hidden" />
								<textarea class="form-control" style="border:1px solid #D8D8D8; background-color:#FAFAFA" id="post_text" name="post_text" rows="2" placeholder="Share something you find interesting..."></textarea>
							<div class="media box-generic margin-none bg-none" style="border:none">
								<div class="selector-wrapper"></div>
							</div>
							
							<div id="wrapper" style="margin-top: 20px;"><input id="fileUpload" multiple="multiple" type="file"/> 
								<div id="image-holder" class="img-responsive"></div>
							</div>
							
							 
							<div class="form-actions">

								<button type="submit" class="btn btn-xs btn-info pull-right" id="submit"><i class="fa fa-thumb-tack"></i> &nbsp;Post &nbsp;</button>
							</div>
							
							<div style="clear:both"></div>
							</form>		
						
						</div>
						
					</div>
				</div>
			</div>
			<!-- // Widget END -->
			
			<!-- Placeholder that tells Preview where to put the selector-->
   
	
		
	

    
    
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


	<?php if(isset($companyPosts)) : foreach($companyPosts as $key => $rows) : ?>
                          <?php
							$coyID = $rows['coyID'];
							$companyname = $rows['companyname'];
							$post_text = $rows['post_text'];
							$post_time = $rows['post_time'];
							$post_image = $rows['post_image'];
							$post_video = $rows['post_video'];
							
							if($post_image==''){echo $media = '';}else{$media = "<div class='bg-inverse'><img src='http://localhost/careercolony1.0/uploads/company_banner/$post_image' class='img-responsive' /></div>";}
							
							
							?>	
							
							
<form id="myForm" action="comment.php" method="post"> 
    Name: <input type="text" name="name" /> 
    Comment: <textarea name="comment"></textarea> 
    <input type="submit" value="Submit Comment" /> 
</form>

<script src="http://malsup.github.com/jquery.form.js"></script> 
 
    <script> 
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
            // bind 'myForm' and provide a simple callback function 
            $('#myForm').ajaxForm(function() { 
                alert("Thank you for your comment!"); 
            }); 
        }); 
    </script> 
		
					
<div class="">
					
					
					<!-- Media item -->
<div class="media" style="margin-bottom:20px">
	<img class="media-object pull-left thumb" src="<?php echo base_url();?>/uploads/<?php echo $logo; ?>" width="90" alt="Image" />
                     
	<div class="media-body">
		
		<div class="innerAll media box-generic margin-none" style="border-radius: 5px 5px 0px 0px;">
			<div class="muted">
				<div class="pull-right label label-default"> <em><time class="timeago" style="font-size:11px" datetime="<?php echo date("F d, Y h:m:s", strtotime($post_time));?>"><?php echo date("F d, Y h:m:s", strtotime($post_time));?></time></em></div>
				<h5 class="strong muted"><?php echo $companyname;?></h5>
			</div>
			<p class="margin-none"><div class="comment"><div class="selector-wrapper"><?php echo $post_text; ?></div></div></p>
		</div>
				<?php echo $media; ?>
		
		<div class="bottom-social border-bottom innerAll half bg-gray" style="text-decoration:none">
			<a href="">Comment&nbsp;&nbsp;</a> 
			<a href=""> Share Post&nbsp;&nbsp;</a>
			<a href=""> Likes</a>
			
			&nbsp;&nbsp;&nbsp;
			
			
			<a href=""><i class="fa fa-comment text-info"></i> 39</a>
			<a href=""><i class="fa fa-thumbs-up text-info"></i> 64</a>
		</div>
		
		
		
		
		<div class="border-bottom innerAll half bg-gray">
			<img class="media-object pull-left thumb" src="<?php echo base_url(); ?>assets/images/avatar-36x36.jpg" alt="Image" />
			<div class="media-body innerAll">
				<h6 class="media-heading strong">Carl Njoku</h6>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae accumsan mauris. Donec vitae nibh felis, facilisis bibendum sapien. Duis a odio id erat.	
			</div>
		
		</div>

		
	</div>
	
	
	

</div>
<!-- // Media item END -->
</div>
					
<?php endforeach ; ?>
							<?php else :?>
							<h3> No industry selected </h3>
					    <?php endif; ?>
							
							
	




<div class="">
				
<!-- Media item -->
<div class="media" style="margin-bottom:20px">

	<img class="media-object pull-left thumb" src="<?php echo base_url();?>/uploads/57c5648e67fd8.png" width="90" alt="Image" />
	<div class="media-body">
		
		<div class="innerAll media box-generic margin-none" style="border-radius: 5px 5px 0px 0px;">
			<div class="muted">
				<div class="pull-right label label-default"> <em><time class="timeago" style="font-size:11px" datetime="2016-09-01 16:10:11">July 17, 2008</time></em></div>
				<h5 class="strong muted">Flavoursoft Consulting</h5>
			</div>
			<div>File Upload widget with multiple file selection, drag&drop support, progress bars, validation and preview images, audio and video for jQuery.

Supports cross-domain, chunked and resumable file uploads and client-side image resizing.</div>
		</div>
		<div class="bg-inverse">
			
		</div>
		
		<div class="bottom-social border-bottom innerAll half bg-gray">
			<a href=""><i class="fa fa-comment"></i> Comment</a> 
			<a href=""><i class="fa fa-share"></i> Share Post</a>
			<a href=""><i class="fa fa-thumbs-o-up"></i> Likes</a>
		</div>
		<div class="border-bottom innerAll half bg-gray">
			<img class="media-object pull-left thumb" src="<?php echo base_url(); ?>assets/images/avatar-36x36.jpg" alt="Image" />
			<div class="media-body innerAll">
				<h6 class="media-heading strong">Carl Njoku</h6>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae accumsan mauris. Donec vitae nibh felis, facilisis bibendum sapien. Duis a odio id erat.	
			</div>
		
		</div>

		
	</div>
</div>
<!-- // Media item END -->
					
				
					
					</div>
				
				
				
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
					<img src="<?php echo base_url();?>banners/banner_img2.jpg">
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


<script type="text/javascript">
	$(document).ready(function() {
	
		$(".comment").shorten();
	
	});
</script>	





