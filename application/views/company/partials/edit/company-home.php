
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/jscroll-master/jquery.jscroll.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/slim-image-upload-and-ratio-cropping-plugin/slim/slim.css">

<script type="text/javascript" src="<?php echo base_url(); ?>plugins/overlay-loader/loadingoverlay.min.js"></script>
<style>
.slim {
    border-radius: 0.5rem;
	
}

.bg-inverse {
	position: relative;
	padding-bottom: 56.25%; /* 16:9 */
	padding-top: 25px;
	height: 0;
}
.bg-inverse iframe {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}

#image {
    z-index: 9;
    text-align: center;
    border: 1px solid blue;
}
#play {
    background: url('http://cdn1.iconfinder.com/data/icons/iconslandplayer/PNG/64x64/CircleBlue/Play1Pressed.png') center center no-repeat;
    margin: -240px 10px 0 0;
    height: 140px;
    position: relative;
    z-index: 10;
}
</style>  


<script>
$('img').click(function(){
        video = '<iframe src="'+ $(this).attr('data-video') +'" ></iframe>';
        $(this).replaceWith(video);
    });

</script>
https://www.youtube.com/watch?v=13yQbaW2V4Y

 <img src="http://www.gravatar.com/avatar/48231943117b8e0d0db0abdcb57a9032?s=32&d=identicon&r=PG" data-video="http://www.youtube.com/embed/zP_D_YKnwi0?autoplay=1">
<!-- Widget -->
	<div class="relativeWrap" id="element">
		<div class="widget widget-heading-simple widget-body-gray"><div class="widget-body"><h5 class="strong muted">Engage Your Audience</h5><p>Post your daily events about your products and services to trigger discussion ..</p><div class="share margin-none" >
			<form id="submit_post"  method="post" class="form-horizontal" id="">
			<textarea class="form-control" style="border:1px solid #D8D8D8; background-color:#FAFAFA" id="id" name="id" rows="2" placeholder="Share something you find interesting..."></textarea>
			<div id="post_form">

			</div>
			<div class="form-actions"><input type="submit" class="btn btn-xs btn-info" id="submit" class="next button" value="Post Now"></div>
			</form>
		</div>
	</div>
  </div>
</div>
<!-- // Widget END -->	




<?php //echo $userID; ?>

<form id="new_post298">
  <input type="text" name="message" class="form-control input-sm" placeholder="Comment here ..." />
  <input type="button" value="Add Link" onclick="createLink(239);">
  
</form>

is this my page
				
<h5 class="center" style="margin-bottom:15px">News and Updates</h5>
<div id="slim" style="display:none; width:300px; height:200px; background-color:#ccc"></div>
<a href="javascript:;" id="upload_image">Upload</a>

		<div id="load-posts-test">
			<ul>

			</ul>
		
		</div>
		<div class="row result">

		</div>	

		<div id="result">

		</div>	




		<ul class="list-unstyled" id="load-posts">
			
		</ul>
		
		<div class="center" id="ajax-loading-gif" style="display:none; margin: 0 auto; padding-left:60px; padding:top:10px; padding-bottom:10px">
		
				<img src="<?php echo base_url();?>img/spin.gif" alt="Loading post ....."> 
		</div>

</div>

	
	
</div>


<script>
/*
$('#post_image').bind('input', function(e)
{
       // jQuery
		var urls = $("#post_image").val(); 
		
		console.log(urls);
		
		$(".selector-wrapper").LoadingOverlay("show");


		
			$.getJSON('https://api.embedly.com/1/oembed?'+ $.param({
				//url: 'https://www.sc.com/BeyondBorders/womens-jobs-tech-disruption/?utm_source=account_type&utm_medium=social&utm_campaign=Thought%20Leadership&linkId=32464355',
				url : urls,
				key: ":d2f283608a3b4fa4a6ba77b522d4e26d"
			}), function (data) {
				console.log(data.thumbnail_url)
					
            		$(".selector-wrapper").append('<img src="'+data.thumbnail_url+'" style="float: left; margin: 0 10px 10px 10px; width:200px;" /> '+data.description+' '+data.title+'<input class="form-control" id="title" name="title" value="" type="text" /><input class="form-control" id="thumbnail" name="thumbnail" value="'+data.thumbnail_url+'" type="text" /><input class="form-control" id="provider_name" name="provider_name" value="'+data.provider_name+'" type="text" />'); 
					$(".selector-wrapper").LoadingOverlay("hide");
			});

			

		
});
*/
</script>

<!--
<script>
// Load default company home page
$(document).ready(function(){
        var coyID = '<?php //echo $this->uri->segment(3);?>';
        var loadUrl = '<?php //echo base_url();?>company/get_company_posts/'+coyID;
        $("#load-posts").load(loadUrl);
});
</script>
-->

<script>
$("#id").bind('input', function(e) {
    var yat = $('#id').val();
	$(".relativeWrap").LoadingOverlay("show");
	
	$.getJSON('https://api.embedly.com/1/oembed?' + $.param({
		//url: 'https://www.youtube.com/watch?v=jofNR_WkoCE',
		url: yat,
		key: ":d2f283608a3b4fa4a6ba77b522d4e26d"
	}), function(data){
		$(".selector-wrapper").html('<img src="'+data.thumbnail_url+'" style="float: left; margin: 0 10px 10px 10px; width:200px;" /><h5>'+data.title+'</h5> '+data.description+'<input type="hidden" value="'+data.title+'" id="title" name="title"  /><input type="hidden" value="'+data.thumbnail_url+'" id="thumbnail_url" name="thumbnail_url"  /><input type="hidden" value="'+data.url+'" id="url" name="url"  /><input type="hidden" value="'+data.type+'" id="type" name="type"  /><input type="hidden" value="'+data.description+'" id="description" name="description"  /><input type="hidden" value="'+data.author_name+'" id="author_name" name="author_name" /><input class="form-control" id="provider_name" name="provider_name" value="'+data.provider_name+'" type="hidden" />');
		$(".relativeWrap").LoadingOverlay("hide");
	
	});

	$(".relativeWrap").LoadingOverlay("hide");

	//setTimeout(function(){ alert("Hello"); }, 3000);
	
});
</script>





 

<script>

            $(document).ready(function(){
                var coyID = '<?php echo $coyID; ?>';
                     $.ajax({
                        dataType: 'html',
                        type: 'get',
                        url: 'http://localhost/neo4j-moviedb/web/get_company/'+coyID,

                        success: function (response) {
                            
                            var responseData = $.parseJSON(response); //parse JSON
                            if (!responseData[0]) {
                                        $(".result").append('<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12"><center><h1>You do not have any match just yet.....</h1>Suggest matches</center></div>'); 
                                        
                            }else{
								$.each(responseData, function(index,item) {
									$("#post_form").html('<input class="form-control" id="user_id" name="user_id" value="'+item.user_id+'" type="hidden" /><input class="form-control" id="coyID" name="coyID" value="'+coyID+'" type="hidden" /><input class="form-control" id="post_image" name="post_image" value="" type="hidden" /><input class="form-control" id="companyname" name="companyname" value="'+item.companyname+'" type="hidden" /><input class="form-control" id="post_video" name="post_video" value="" type="hidden" /><div class="media box-generic margin-none bg-none" style="border:none"><div class="selector-wrapper"></div></div>');
								})
                            }
                           
                            
                        },                     
                        
                        error: function (responseData) {
                            
                            toastr.warning('Personality update failed')
                        }
                    });



                    // Get Company details
                    $.ajax({
                        dataType: 'html',
                        type: 'get',
                        url: 'http://localhost/neo4j-moviedb/web/get_company_posts/'+coyID,

                        
                       
                            //setTimeout($.unblockUI, 20000); 

                        success: function (response) {
                            
                            var responseData = $.parseJSON(response); //parse JSON
                            if (!responseData[0]) {
                                        $(".result").append('<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12"><center><h1>You do not have any match just yet.....</h1>Suggest matches</center></div>'); 
                                        
                            }else{
                                
								//alert(responseData)

                                $.each(responseData, function(index,item) {
                              
                                   $('#experience_ajax').append('<li><i class="list-icon" style="font-size:12px">6yrs</i><div class="block block-inline"><div class="" style="position:relative; top:10px"><div class="col-md-12"><h4>'+item.position+' </h4></h4> <img class="pull-right" style="position:relative; top:-30px" src="<?php echo base_url();?>uploads/57cd2cedb5bbc.png" width="40" alt="Image"><div style="font-size:14px" class="strong text-primary">'+item.employername+'</div><div><?php echo 'Lagoss, Nigeria'; ?></div><div><?php echo 'Mar 2001-2010'; ?></div><div style="color:#000000">'+item.job_description+'</div></div></div></div></li>');
                                });
                              
                            }
                           
                            
                        },                     
                        
                        error: function (responseData) {
                            
                            toastr.warning('Personality update failed')
                        }
                    });

					// jquery lazy loader 
					$('.infinite-scroll').jscroll({
						loadingHtml: '<img src="loading.gif" alt="Loading" /> Loading...',
						padding: 20,
						nextSelector: 'a.jscroll-next:last',
						contentSelector: 'li'
					});

					
                    
                  
            });
        
        
        
        </script>


	<script>
		//$(document).delegate("#submit_post", function() {
		$(document).ready(function(){
			$("#submit_post").submit(function(e) {
        	var frmData1 = $('#submit_post').serializeArray().reduce(function(a, x) { a[x.name] = x.value; return a; }, {});
                                        
                    var data1 = JSON.stringify(frmData1);

                     $.ajax({
                        dataType: 'html',
                        type: 'post',
                        url: 'http://localhost/neo4j-moviedb/web/company_post',
                        data: data1,
                        
                        beforeSend: function()
                        {
                            alert(data1);
                            $.blockUI({ 
                                css: { 
                                    background: 'none',
                                    border:'none'
                                },
                                overlayCSS: { backgroundColor: '#fff' },
                                message:'<img src="../assets/loading-spinner-pink.gif"/>',
                            });
                            setTimeout($.unblockUI, 2000); 
  
                        },
                        success: function (responseData) {
                            
                            var responseData = $.parseJSON(responseData); //parse JSON
                            
							$('.result').html('<div class="col-md-2"><img width="70" src="<?php echo base_url(); ?>img/mtn.jpg" alt="image" class="img-rounded img-responsive pull-right" /></div><div class="col-md-10"><div class="widget widget-heading-simple widget-body-white"><div class="widget-body padding-none"><div class="innerAll"><div class="muted separator bottom"><div class="pull-right label label-default"> <em>3 days ago</em></div><h5 class="strong muted"><i class="fa fa-user "></i> '+responseData.companyname+'</h5><span>on <a class="text-info" href="#">'+responseData.title+'</a><span></div><span class="">'+responseData.description+'</span></div><div class="bg-inverse"><img src="'+responseData.thumbnail_url+'" data-video="'+responseData.post_url+'" /></div><div class="bottom-social border-bottom innerAll half bg-gray"><a href=""><i class="fa fa-comment"></i> Comment</a> <a href=""><i class="fa fa-share"></i> Share Post</a></div><div class="innerAll"><ul class="list-group social-comments margin-none"><li class="list-group-item"><img src="<?php echo base_url(); ?>assets/images/avatar-36x36.jpg" alt="Avatar" class="pull-left"><div class="user-info"><div class="row"><div class="col-md-3"><a href="">Adrian Demian</a> <abbr>4 days ago</abbr></div><div class="col-md-9"><span> Wow... nice post</span></div></div></div></li><li class="list-group-item innerAll"><input type="text" name="message" class="form-control input-sm" placeholder="Comment here ..." /></li></ul></div></div></div>');
                            
                            alert(responseData.user_id);
                            toastr.success(msg)
    
                        },
                        error: function (responseData) {
                            
                            toastr.warning('Personal detail update failed')
                        }
                    });
                    
                 
                    e.preventDefault(); // avoid to execute the actual submit of the form.
                    
    	});
	});
</script>



<script>
		//$(document).delegate("#submit_post", function() {
		$(document).ready(function(){
			$("#new_post").submit(function(e) {
        	var frmData1 = $('#new_post').serializeArray().reduce(function(a, x) { a[x.name] = x.value; return a; }, {});
                                        
                    var data1 = JSON.stringify(frmData1);

                     $.ajax({
                        dataType: 'html',
                        type: 'post',
                        url: 'http://localhost/neo4j-moviedb/web/new_post',
                        data: data1,
                        
                       
                        success: function (response) {
                            
                            var responseData = $.parseJSON(response); //parse JSON
                            
							
    
                        },
                        error: function (responseData) {
                            
                            //toastr.warning('Personal detail update failed')
                        }
                    });
                   
    	});
	});
</script>

		<script>
		$('#upload_image').click(function(){
			$('#slim').show();
			
		})
		</script>

		
		<script>
		$("#browser").delegate( ".photo", "load",
			function(e) {
				alert("photo loaded");
		});

		$(".thumbnail").bind( "changeData", function(e, prop, value) {
			alert( prop + " = " + value );
		});
		</script>


<script>
$(document).ready(function() {
    
			var coyID = '<?php echo $this->uri->segment(3);?>';
		
			var ajax_loader = '<?php echo base_url()?>img/ajax-loader.gif';
			var currentIndex = 0;
			var entries = [];
	

				$.getJSON('http://localhost/neo4j-moviedb/web/get_company_posts/'+ coyID, function(data) {
					//console.log(data);
					/*
					$.each(data, function(index,item) {
							$('#load-posts').append('<li><div class="row"><div class="col-md-2"><img width="70" src="<?php echo base_url(); ?>img/mtn.jpg" alt="image" class="img-rounded img-responsive pull-right" /></div><div class="col-md-10"><div class="widget widget-heading-simple widget-body-white"><div class="widget-body padding-none"><div class="innerAll"><div class="muted separator bottom"><div class="pull-right label label-default"> <em>'+item.post_time+'</em></div><h5 class="strong muted "><i class="fa fa-user "></i> '+item.companyname+'</h5><span>on <a href="#">'+item.title+'</a><span></div><span class="">'+item.description+'</span></div><div class="bg-inverse1"><img src="'+item.thumbnail_url+'" class="img-responsive" /></div>	<div class="bottom-social border-bottom innerAll half bg-white"><a href=""><i class="fa fa-comment"></i> Comment</a> <a href=""><i class="fa fa-share"></i> Share Post</a></div><div class="innerAll bg-gray"><ul class="list-group social-comments margin-none"><li class="list-group-item"><img src="<?php echo base_url(); ?>assets/images/avatar-36x36.jpg" alt="Avatar" class="pull-left"><div class="user-info"><div class="row"><div class="col-md-3"><a href="">Adrian Demian</a> <abbr>4 days ago</abbr></div><div class="col-md-9"><span> Wow... nice post</span></div></div></div></li><li class="list-group-item innerAll"><input type="text" onkeypress="myFunction()" name="message" class="form-control input-sm" placeholder="Comment here ..." /></li></ul></div></div></div></div></div></li>');
					});
					*/
					var dataArray = data;
					console.log(data);
					entries = dataArray;
					loadData();
				});
	
			
			var loadData = function(data){
			var currentRow;
			//console.log(entries);

			$('#ajax-loading-gif').show();
			
			for(var i = currentIndex; i < currentIndex + 8; i++)
			{
				var currentEntry = entries[i];
				//var title = entries[i].title
				//var author_name = entries[i].author_name;
				//var companyname = entries[i].companyname;
				//var entryTitle = entries[i].title;


				//console.log('ddhdhdf'+currentEntry.title)

				if(currentIndex % 2 == 0){

				

				//  Make input

					

				$('#load-posts').append('<li><div class="row"><div class="col-md-2"><img width="70" src="<?php echo base_url(); ?>img/mtn.jpg" alt="image" class="img-rounded img-responsive pull-right" /></div><div class="col-md-10"><div class="widget widget-heading-simple widget-body-white"><div class="widget-body padding-none"><div class="innerAll"><div class="muted separator bottom"><div class="pull-right label label-default"> <em>'+currentEntry.post_time+'</em></div><h5 class="strong muted "><i class="fa fa-user "></i> '+currentEntry.companyname+'</h5><span>on <a href="#">'+currentEntry.title+'</a><span></div><span class="">'+currentEntry.postID+', '+currentEntry.description+'</span></div><div class="bg-inverse1"><img src="'+currentEntry.thumbnail_url+'" class="img-responsive" /></div>	<div class="bottom-social border-bottom innerAll half bg-white id="carl"><a href=""><i class="fa fa-comment"></i> Comment</a> <a href=""><i class="fa fa-share"></i> Share Post</a></div><div class="innerAll bg-gray"><ul class="list-group social-comments margin-none"><li class="list-group-item"><img src="<?php echo base_url(); ?>assets/images/avatar-36x36.jpg" alt="Avatar" class="pull-left"><div class="user-info"><div class="row"><div class="col-md-3"><a href="">Adrian Demian</a> <abbr>4 days ago</abbr></div><div class="col-md-9"><span> Wow... nice post</span></div></div></div></li><li class="list-group-item innerAll"><form id="new_post'+currentEntry.postID+'"><input type="" name="userID" id="userID" value="'+currentEntry.postID+'" /><input type="button" onclick="createLink('+currentEntry.postID+');" value="comment" /></form></li></ul></div></div></div></div></div></li>');
				
				
					
					var commentForm = document.getElementById("new_post"+currentEntry.postID);
					var input = document.createElement('input');
					input.type = 'text';
					input.setAttribute('name', 'message');
					input.setAttribute('class', 'form-control input-sm');
					input.setAttribute('placeholder','Comment here ...');
					input.setAttribute('required','required');

					
				    commentForm.appendChild( input );
					//commentForm.appendChild( inputSubmit );

				
				//var commentForm = document.getElementById("load-posts").getElementById("new_post");
				//var linkView = document.createElement("a");
				//commentForm.appendChild(linkView);
				//linkView.innerHTML = "View";
					//<input type="submit" onclick ="add_field();" />
					/*
					var postDiv = document.getElementById("load-posts-test").getElementsByTagName("ul")[0];
					var list = document.createElement("li");
					var row = document.createElement("div");
					postDiv.appendChild(list);
					list.appendChild(row);
					//list.innerHTML = currentEntry.title;

					*


					product = document.createElement("input");
					//product.value = "value";
					//product.name = "name";

					myform.appendChild(product);
					myform.submit();
					
					
					

					row.appendChild(myform);

					//$(list).addClass

					*/
					

				}else{
					// Do something

					alert('No more data to load');
					
				}
				
				/*
				var column  = document.createElement("div");
				$(column).addClass("col-md-6");
				currentRow.appendChild(column);
				
				var title = document.createElement("p");
				$(title).addClass("title");
				title.innerHTML =  currentEntry.title;
				console.log(currentEntry.title)
				*/
			}
		
			currentIndex = currentIndex + 8;
			
		}
	

		$(window).scroll(function(){
			if($(window).scrollTop()== $(document).height() - $(window).height())
			{
				//get_posts(coyID);
				loadData();
			}
		})
	});
</script>







<script>
function createLink(id) {
 	var post_id = id;
			
			
					var frmData1 = $('#new_post'+post_id).serializeArray().reduce(function(a, x) { a[x.name] = x.value; return a; }, {});
												
							var data1 = JSON.stringify(frmData1);
							alert(data1);

							$.ajax({
								dataType: 'html',
								type: 'post',
								url: 'http://localhost/neo4j-moviedb/web/new_post',
								data: data1,
								
							
								success: function (response) {
									
									var responseData = $.parseJSON(response); //parse JSON
									
									
			
								},
								error: function (responseData) {
									
									//toastr.warning('Personal detail update failed')
								}
							});
						
				
				
		}

</script>





<script>
		//$(document).delegate("#submit_post", function() {
		$(document).ready(function(){
			$("#new_post1").submit(function(e) {
        	var frmData1 = $('#new_post').serializeArray().reduce(function(a, x) { a[x.name] = x.value; return a; }, {});
                                        
                    var data1 = JSON.stringify(frmData1);

                     $.ajax({
                        dataType: 'html',
                        type: 'post',
                        url: 'http://localhost/neo4j-moviedb/web/company_post22',
                        data: data1,
                        
                        beforeSend: function()
                        {
                            alert(data1);
                            $.blockUI({ 
                                css: { 
                                    background: 'none',
                                    border:'none'
                                },
                                overlayCSS: { backgroundColor: '#fff' },
                                message:'<img src="../assets/loading-spinner-pink.gif"/>',
                            });
                            setTimeout($.unblockUI, 2000); 
  
                        },
                        success: function (responseData) {
                            
                            //var responseData = $.parseJSON(responseData); //parse JSON
                            alert('pass');
    
                        },
                        error: function (responseData) {
                            
                            //toastr.warning('Personal detail update failed')
                        }
                    });
                    
                 
                    e.preventDefault(); // avoid to execute the actual submit of the form.
                    
    	});
	});
</script>


<script>
		function comment(id){
			//var post_id = postID;
			/*
			$('#new_post'+post_id).submit(function(e) {
					var frmData1 = $('#new_post'+post_id).serializeArray().reduce(function(a, x) { a[x.name] = x.value; return a; }, {});
												
							var data1 = JSON.stringify(frmData1);

							$.ajax({
								dataType: 'html',
								type: 'post',
								url: 'http://localhost/neo4j-moviedb/web/new_post',
								data: data1,
								
							
								success: function (response) {
									
									var responseData = $.parseJSON(response); //parse JSON
									
									
			
								},
								error: function (responseData) {
									
									//toastr.warning('Personal detail update failed')
								}
							});
						
				});
				*/
		}
</script>



<script src="<?php echo base_url()?>plugins/slim-image-upload-and-ratio-cropping-plugin/slim/slim.jquery.js"></script>   
<script src="<?php echo base_url()?>plugins/slim-image-upload-and-ratio-cropping-plugin/slim/slim.kickstart.js"></script> 