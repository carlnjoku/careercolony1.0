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

<script type="text/javascript">
// Edit buttons

		function closePopupExp(id){       
				$(".comment_box_exp" +data_id).fadeOut(300);
				$("#displayExp" +data_id).fadeIn(1000);
				$(".commentExp").show();
				$(".commentEdu").show();
				$("#goto").show();
				$(".position").show();
				$(".educational").show();
				
				
        }
		
		function editModalExp(data_id){       
				$(".comment_box_exp" +data_id).fadeIn(1000);
				$("#displayExp" +data_id).hide();
				$(".commentExp").hide();
				$(".commentEdu").hide();
				$("#overlay").show();
				$(".position").hide();
				$(".educational").hide();
				
        }
        
        function closePopupEdu(data_id){       
				$(".comment_box_edu" +data_id).fadeOut(300);
				$("#displayEdu" +data_id).fadeIn(1000);
				$(".commentEdu").show();
				$(".commentExp").show();
				$("#goto").show();
				$(".position").show();
				$(".educational").show();
				
				
        }
        
        function editPopupEdu(data_id){       
				$(".comment_box_edu" +data_id).fadeIn(1000);
				$("#displayEdu" +data_id).hide();
				$(".commentEdu").hide();
				$(".commentExp").hide();
				$("#overlay").show();
				$(".position").hide();
				$(".educational").hide();
				
        }
        
        function closePopupSkill(){       
				$(".comment_box_edu").fadeOut(300);
				$("#displayEdu").fadeIn(1000);
				$(".commentEdu").show();
				$(".commentExp").show();
				$("#goto").show();
				$(".position").show();
				$(".educational").show();
				
				
        }
        
        function editExp(data_id){       
				$("#editExperience"+data_id).fadeIn(1000);
				$("#list"+data_id).hide();
				$(".list-icon").hide();
				$(".icon-add").hide();
				$(".fa-pencil").hide();
				$(".fa-sort").hide();
				$("#newsletter_topics").hide();
				
	    }
	    
	    function editEdu(data_id){       
				$("#editEducation"+data_id).fadeIn(1000);
				$("#list"+data_id).hide();
	    }
	   
	   
	
</script>
<script>
      $(function () {
        
        $('#addExp').bind('submit', function () {
          
          	var ajax_load = ' <i class="fa fa-spinner fa-spin fa-2x"></i>';
          	var ajax_load1 = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Position successfully saved ! ';
			var res = "#addExp";
			var form_data = $(res).serialize();
          $.ajax({
            type: 'post',
            url: 'http://localhost/neo4j-moviedb/web/work',
            data: $('#addExp').serialize(),
            data: form_data,
            
            
            beforeSend: function()
        	{
             	
             	$("#loading").html(ajax_load).fadeIn("10000");
             	$("#saved").html(ajax_load1).hide();
             	
        	},
            success: function (data) {
              	//var data = $.parseJSON(data);//parse JSON
          	  	//var coyID = data.coyID;
         		//var status = data.status;
         		
         		//alert(data);
          		if(status === '0') {
              		$("#error").fadeIn('3000');
          		}else{
              		//window.location="<?php echo base_url(); ?>company/edit_company/"+ coyID;
          		}
          		
          		$("#loading").html(ajax_load).fadeOut("10000");
          		$("#saved").html(ajax_load1).fadeIn("10000");
          		$("#addExp").reset();
              //window.location="<?php echo base_url(); ?>company/login/"+ user_id;
            }
          });
          return false;
        });
    });
</script>







<script>

	function editExperience(id) { 
		var ajax_load = '<div style="color:#F2F2F2"><center>Saving Data</center></div>';
		var empid = id;
		var res = "#editExp" + (id);
		var form_data = $(res).serialize();
	
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
        	
        	$("#gotoEdu" +id).fadeIn(300);
        	
      		
			
        },
		error: function(comment){
		}


     });
	});
  }

</script>



<script>
      $(function () {
        
        $('#addEdu').bind('submit', function () {
          
          	var ajax_load = ' <i class="fa fa-spinner fa-spin fa-2x"></i>';
          	var ajax_load1 = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Education successfully saved ! ';
			var res = "#addEdu";
			var form_data = $(res).serialize();
          $.ajax({
            type: 'post',
            url: 'http://localhost/neo4j-moviedb/web/education',
            data: $('#addEdu').serialize(),
            data: form_data,
            
            
            beforeSend: function()
        	{
             	
             	$("#loading").html(ajax_load).fadeIn("10000");
             	$("#saved").html(ajax_load1).hide();
             	
        	},
            success: function (data) {
              	//var data = $.parseJSON(data);//parse JSON
          	  	//var coyID = data.coyID;
         		//var status = data.status;
         		
         		//alert(data);
          		if(status === '0') {
              		$("#error").fadeIn('3000');
          		}else{
              		//window.location="<?php echo base_url(); ?>company/edit_company/"+ coyID;
          		}
          		
          		$("#loading").html(ajax_load).fadeOut("10000");
          		$("#saved").html(ajax_load1).fadeIn("10000");
          		$("#addEdu").reset();
              //window.location="<?php echo base_url(); ?>company/login/"+ user_id;
            }
          });
          return false;
        });
    });
</script>

<script>

	function editExperience(id) { 
		var ajax_load = '<div style="color:#F2F2F2"><center>Saving Data</center></div>';
		var empid = id;
		var res = "#editEdu" + (id);
		var form_data = $(res).serialize();
	
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
        	
        	$("#gotoEdu" +id).fadeIn(300);
        	
      		
			
        },
		error: function(comment){
		}


     });
	});
  }

</script>




<script>
$(document).ready(function(){
    $("#hide").click(function(){
        $("p").fadeOut('3000');
        event.preventDefault();
    });
    $("#show"+id).click(function(){
        $("#editExperience"+id).fadeIn('3000');
    });
    
    
    
});
</script>

<script>
$(document).ready(function(){
  
  
  $("#closeEdu").click(function(){
    	$("#addEducation").hide();
    	$(".position").show();
    	$(".commentEdu").show();
		$(".commentExp").show();
    	$(".educational").show();
    
  });
  
 
 

});


</script>







<style>
.modalHeader{
width: 55%;
height: 45px;

padding: 10px 30px 10px 10px;

font-family: inherit;
color: #F5F2F2;
text-align: left;
font-size: 16px;
font-weight:bold;


letter-spacing: 0em;
-webkit-border-radius: 7px 7px 0px 0px;
-moz-border-radius: 7px 7px 0px 0px;
border-radius: 7px 7px 0px 0px;


-moz-box-shadow: 0px 0px 0px 0px rgba(227, 227, 227, 0.98);
-webkit-box-shadow: 0px 0px 0px 0px rgba(227, 227, 227, 0.98);
box-shadow: 0px 0px 0px 0px rgba(227, 227, 227, 0.98);

}
.modalBody{
width: 55%;
height: 100%;
background: rgba(3, 3, 3, 0.6);

border-top:none;

padding: 10px;
padding-top: 20px;

font-family: inherit;
color: #d3d4d4;
text-align: left;
font-size: 12px;
line-height: 1.2;
-webkit-border-radius: 0px 0px 7px 7px;
-moz-border-radius: 0px 0px 7px 7px;
border-radius: 0px 0px 7px 7px;
margin-bottom:25px;
}

.editHeader{
width: 100%;
height: 45px;

padding: 10px 30px 10px 10px;

font-family: inherit;
color: #F5F2F2;
text-align: left;
font-size: 16px;
font-weight:bold;

letter-spacing: 0em;
-webkit-border-radius: 7px 7px 0px 0px;
-moz-border-radius: 7px 7px 0px 0px;
border-radius: 7px 7px 0px 0px;


-moz-box-shadow: 0px 0px 0px 0px rgba(227, 227, 227, 0.98);
-webkit-box-shadow: 0px 0px 0px 0px rgba(227, 227, 227, 0.98);
box-shadow: 0px 0px 0px 0px rgba(227, 227, 227, 0.98);

}
.editBody{
width: 100%;
height: 100%;
background: rgba(3, 3, 3, 0.15);

border-top:none;

padding: 10px;
padding-top: 20px;

font-family: inherit;
color: #000000;
text-align: left;
font-size: 12px;
line-height: 1.2;

-webkit-border-radius: 0px 0px 7px 7px;
-moz-border-radius: 0px 0px 7px 7px;
border-radius: 0px 0px 7px 7px;
margin-bottom:25px;
}

.inner-form-edit input{
  background:rgba(239,239,239,0.95);
  color:#000;
  border:1px #929292 solid;
}

.inner-form-edit textarea{
  background:rgba(239,239,239,0.95);
  color:#000;
  border:1px #929292 solid;
}


.inner-form input{
  background:rgba(239,239,239,0.6);
  color:#000;
  border:0;
}

.inner-form textarea{
  background:rgba(239,239,239,0.6);
  color:#000;
  border:0;
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

.icon-delete a{
    text-align: center;
	float: left;
	width: 36px;
	height: 36px;
	border: 1px solid #c6c6c6;
	border-radius: 100%;
	margin-right: 7px; /*space between*/

} 
.icon-delete a i{
	font-size: 20px;
    line-height: 38px;
	color: #c6c6c6;
}
.icon-delete a:hover { 
    background-color: #f58b23;
    border: 1px solid #FFFFFF;
    color: #FFFFFF;
}

.icon-delete a:hover i{
	font-size: 20px;
    line-height: 38px;
	color: #fff;
}


.icon-add a{
    text-align: center;
	float: left;
	width: 36px;
	height: 36px;
	border: 1px solid #c6c6c6;
	border-radius: 100%;
	margin-right: 7px; /*space between*/

} 
.icon-add a i{
	font-size: 20px;
    line-height: 38px;
	color: #c6c6c6;
}
.icon-add a:hover { 
    background-color: #1fb60b;
    border: 1px solid #FFFFFF;
    color: #FFFFFF;
}

.icon-add a:hover i{
	font-size: 20px;
    line-height: 38px;
	color: #fff;
}

#sidebar1{
 	z-index:2;
}

  
  .btn_add_experience {
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 15px;
  background: #3498db;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

.btn_add_experience:hover {
  background: #3cb0fd;
  text-decoration: none;
  color: #ffffff;
}
  
.btn_add_education {
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 15px;
  background: #a04eb5;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

.btn_add_education:hover {
  background: #3790c7;
  text-decoration: none;
}

</style>

<style>

a.morelink {
	text-decoration:none;
	outline: none;
}
.morecontent span {
	display: none;
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
			$profile_background = $rows['profile_background'];

		?>
		
		
		
		<?php endforeach ; ?>
		<?php else :?>
		<h3> No records1 found </h3>
		<?php endif; ?>

<header id="header">

<div class="slim"
     	data-service="<?php echo base_url(); ?>plugins/slim-image-upload-and-ratio-cropping-plugin/example/async.php?user_id=<?php echo $user_id;?>"
     	data-ratio="36:9"
     	data-min-size="1040,300"
     	data-max-file-size="2"
     	data-save-initial-image="true"
     	data-service="http://localhost/careercolony/profile/profile_background"> 
    	<img  src="<?php echo base_url();?>profile-images/profileBackground/<?php echo $profile_background; ?>">
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
				


<ul id="sortable">
    <li id="workID-20">20</li>
    <li id="workID-30">30</li>
    <li id="workID-40">40</li>
    <li id="workID-50">50</li>
</ul>


Query string: <span>asds</span>
 
	<?php $string = 'workID[]=40&workID[]=20&workID[]=30&workID[]=50'; echo str_replace( array('[',']') , ''  , $string );  ?>			
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
				
							<div class="widget innerAll inner-2x bg-gray">
					<h4 class="strong" style="margin-bottom:15px">Summary</h4>
			
							
							<div class="row">
								<div class="col-md-12">
								 
						<script language="javascript" type="text/javascript">
						// Textarea character count
						function limitText(limitField, limitCount, limitNum) {
							if (limitField.value.length > limitNum) {
								limitField.value = limitField.value.substring(0, limitNum);
							} else {
								limitCount.value = limitNum - limitField.value.length;
							}
						}
					</script>
						<form>
							<div class="col-md-12">
								<textarea onkeypress="myFunction()" placeholder="Not less than 100 characters ....." id="companydescription" name="companydescription" class="wysihtml5 form-control"  rows="3" onKeyDown="limitText(this.form.companydescription,this.form.countdown,1500);"  onKeyUp="limitText(this.form.companydescription,this.form.countdown,1500);"></textarea>
								<font size="1" >You have <input  readonly type="text" style="border:none; font-size:11px; color:#a0a0a0; width:30px; background-color:#f9f9f9 " name="countdown" value="1500"> characters left.</font>
								</div>
									
								</div>
							</div>
							
							<div class="form-actions" style="display:none">

								<button type="submit" class="btn btn-xs btn-info pull-right" id="submit"> &nbsp;Submit &nbsp;</button>
							</div>
							
							<div style="clear:both"></div>
						</form>
						
						<script>
							function myFunction() {
   						 		$('.form-actions').fadeIn('3000');
							}
						</script>
						
						
					</div>
				


<!-- Start Experience -->	
<div class="widget innerAll inner-2x" id="experience">


<pre>


The jQuery UI sortable feature includes a serialize method to do this. It's quite simple, really. Here's a quick example that sends the data to the specified URL as soon as an element has changes position.

$('#element').sortable({
    axis: 'y',
    update: function (event, ui) {
        var data = $(this).sortable('serialize');

        // POST to server using $.post or $.ajax
        $.ajax({
            data: data,
            type: 'POST',
            url: '/your/url/here'
        });
    }
});
What this does is that it creates an array of the elements using the elements id. So, I usually do something like this:

<ul id="sortable">
   <li id="item-1"></li>
   <li id="item-2"></li>
   ...
</ul>
When you use the serialize option, it will create a POST query string like this: item[]=1&item[]=2 etc. So if you make use - for example - your database IDs in the id attribute, you can then simply iterate through the POSTed array and update the elements' positions accordingly.

For example, in PHP:

$i = 0;

foreach ($_POST['item'] as $value) {
    // Execute statement:
    // UPDATE [Table] SET [Position] = $i WHERE [EntityId] = $value
    $i++;
}

</pre>

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
							
						<!-- Row -->
			<div class="bg-gray innerAll">
				<div class="row">
			
					
					
					<!-- Column -->
					<div class="col-md-12">
						<div id="newsletter_topics" class="center">
							<h5><b>Website</b></h5>
							<p style="padding:15px">By clicking on the continue button, you verify that you are a representative of this company.</p>
							
							<a class="btn_add_experience" rel="#addExperience" href="#"><i class="fa fa-plus"></i> Add New Position</a>
							
							<div style="clear:both"></div>
							<br>
						</div>
					</div>
					<!-- // Column END -->
					
					
					
				</div>
				<!-- // Row END -->	
			</div>
	
							
				   
				
					</div>
<!-- Start Experience -->	
					
<!-- Start Education -->
<div class="widget innerAll inner-2x" id="Education">
	<div class="row">
		<div class="col-md-12">
			<div class="widget-body padding-none">
				<ul class="timeline-activity list-unstyled">
					<li class="active">
						<i class="list-icon fa fa-graduation-cap"></i>
						<div class="block block-inline">
							<div class="" style="position:relative; top:-10px">
								<h4 class="strong">Education</h4>
							</div>
						</div>
						 <div class="icon-add pull-right"><a rel="#addEducation" href="#" href='javascript:void(0);' ><i class="fa fa-plus fa-lg"></i></a></div>
						
						
					</li>
					
					
					<?php if(isset($result_school)) : foreach($result_school as $key => $rows) : ?>
						<?php
			
			
						$user_id = $rows['user_id'];
						$schID = $rows['schID'];
						$schoolname = $rows['schoolname'];
						$course = $rows['course'];
						$degree = $rows['degree'];
						$start_month_sch = $rows['start_month_sch'];
						$end_month_sch = $rows['end_month_sch'];
						$start_year_sch = $rows['start_year_sch'];
						$end_year_sch = $rows['end_year_sch'];
						$city = $rows['city'];
						//$country = $rows['country'];
						$description =$rows['description'];
						
						?>
					
					<li>
						
						<i class="list-icon" style="font-size:12px">4yrs</i>
						<div class="block block-inline">
							<div class="" style="position:relative; top:10px">
								<div class="col-md-12">
									<h4><?php echo $schoolname; ?> &nbsp;<a href='javascript:void(0);' onclick="return editEdu(<?php echo $schID; ?>);" >  <i class="fa text-faded fa-pencil"></i></a>  &nbsp;<a href="#">  <i class="fa text-faded fa-trash"></i></a>  &nbsp;<a href="#">  <i class="fa text-faded fa-sort"></i></a></h4>
									<div style="font-size:14px" class="strong text-primary"><?php echo $course.', '.$degree; ?></div>
									<div><?php echo $city.', Nigeria'; ?></div>
									<div><?php echo 'Mar '.$start_year_sch.' - Mar '.$end_year_sch; ?></div>
								</div>
							</div>
						</div>
						
						<div class="col-md-12" style="display:none" id="editEducation<?php echo $schID; ?>" style="margin-top:-9px">
						
							<div class="editHeader bg-info">Edit Education</div>
									<div class="editBody">
										
										<form id="editEdu<?php echo $schID;?>" class="form-horizontal">
											<input class="form-control" id="user_id" name="user_id" value="<?php echo $user_id; ?>" type="hidden" />
											<input class="form-control" id="schID" name="schID" value="<?php echo $schID; ?>" type="hidden" />
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="schoolname">Institution Name</label>
												<div class="col-md-6"><input class="form-control" id="schoolname" name="schoolname" value="<?php echo $schoolname; ?>" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="city">City / State</label>
												<div class="col-md-6"><input class="form-control" id="city" name="city" value="<?php echo $city; ?>" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="country">Country</label>
												<div class="col-md-4"><input class="form-control" id="country" name="country" value="<?php echo $country; ?>" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="course">Course Studied</label>
												<div class="col-md-6"><input class="form-control" id="course" name="course" value="<?php echo $course; ?>" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="degree">Degree Earned</label>
												<div class="col-md-4"><input class="form-control" id="degree" name="degree" value="<?php echo $degree; ?>" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											
											
											<!-- Group -->
										<div class="form-group">
												<label class="col-md-3 control-label">Period</label>
												<div class="col-md-8">
													<select class="" id="start_month_sch" name="start_month_sch" >
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
													<select class="" id="companytype" name="companytype" >
														<option value="">Year</option>
														<option value="">1970</option>
														<option value="">1980</option>
														<option value="">1981</option>
														<option value="">1982</option>
														<option value="">1983</option>
														<option value="">1984</option>
														
						                          
													</select>
													&nbsp;&nbsp;To &nbsp;&nbsp;
													<select class="" id="companytype" name="companytype" >
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
													<select class="" id="companytype" name="companytype" >
														<option value="">Year</option>
														<option value="">1970</option>
														<option value="">1980</option>
														<option value="">1981</option>
														<option value="">1982</option>
														<option value="">1983</option>
														<option value="">1984</option>
														
						                          
													</select>
													
												</div>
											</div>
					
					
										<!-- Group -->
										<div class="form-group">
											<label class="col-md-3 control-label" for="firstname">Description</label>
											<div class="col-md-8">
												<textarea placeholder="Enter your job description here....." id="companydescription" name="companydescription" class="wysihtml5 form-control"  rows="3"></textarea>
											</div>
										</div>
										<!-- // Group END -->
					
										<hr style="border-color:#959595">
					
					
				
										<!-- Form actions -->
										<div class="form-actions" style="margin-bottom:30px; margin-left:100px">
											<input type="submit" class="btn btn-primary" id="submit" class="next button" value="Continue">
											<button type="button" class="btn btn-default"><i class="fa fa-times"></i> Cancel</button>
										</div>
										<!-- // Form actions END -->	
			
										<div style="clear:both"></div>		
									
									</form>

									</div>

							</div>
						
					</li>
					
					<?php endforeach ; ?>
					<?php else :?>
					<li> <div style="padding-left:35px; font-size:18px;"><i class="fa fa-exclamation-circle"></i> No educational records found</div> </li>
					<?php endif; ?>
					
				</ul>
			</div>
		</div>
							
				
			<div class="col-md-12" id="addEducation" style="display:none; margin-top:-9px">
								 
							<div class="modalHeader bg-info">Add Education</div>
									<div class="modalBody">
									
										<form id="addEdu" name="addEdu" class="form-horizontal">
											<div class="inner-form">
											<input class="form-control" id="user_id" name="user_id" value="<?php echo $user_id; ?>" type="hidden" />
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="schoolname">Institution Name</label>
												<div class="col-md-6"><input class="form-control" id="schoolname" name="schoolname" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="state">City / State</label>
												<div class="col-md-6"><input class="form-control" id="city" name="city" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="country">Country</label>
												<div class="col-md-4"><input class="form-control" id="country" name="country" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="course">Course Studied</label>
												<div class="col-md-6"><input class="form-control" id="course" name="course" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="degree">Degree Earned</label>
												<div class="col-md-4"><input class="form-control" id="degree" name="degree" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="degree">Grade</label>
												<div class="col-md-4"><input class="form-control" id="grade" name="grade" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											
											
											<!-- Group -->
										<div class="form-group">
												<label class="col-md-3 control-label">Period</label>
												<div class="col-md-8">
													<select class="" id="start_month" name="start_month" >
														<option value="">Month</option>
														<option value="January">Jan</option>
														<option value="February">Feb</option>
														<option value="March">Mar</option>
														<option value="April">Apr</option>
														<option value="May">May</option>
														<option value="June">Jun</option>
														<option value="July">Jul</option>
														<option value="August">Aug</option>
														<option value="September">Sep</option>
														<option value="October">Oct</option>
														<option value="November">Nov</option>
														<option value="December">Nov</option>
														
						                          
													</select>
													<select class="" id="start_year" name="start_year" >
														<option value="">Year</option>
														<option value="1970">1970</option>
														<option value="1980">1980</option>
														<option value="1981">1981</option>
														<option value="1982">1982</option>
														<option value="1983">1983</option>
														<option value="1984">1984</option>
														
						                          
													</select>
													&nbsp;&nbsp;To &nbsp;&nbsp;
													<select class="" id="end_month" name="end_month" >
														<option value="">Month</option>
														<option value="January">Jan</option>
														<option value="February">Feb</option>
														<option value="March">Mar</option>
														<option value="April">Apr</option>
														<option value="May">May</option>
														<option value="June">Jun</option>
														<option value="July">Jul</option>
														<option value="August">Aug</option>
														<option value="September">Sep</option>
														<option value="October">Oct</option>
														<option value="November">Nov</option>
														<option value="December">Nov</option>
													
													</select>
													<select class="" id="end_year" name="end_year" >
														<option value="">Year</option>
														<option value="1970">1970</option>
														<option value="1980">1980</option>
														<option value="1981">1981</option>
														<option value="1982">1982</option>
														<option value="1983">1983</option>
														<option value="1984">1984</option>
														
						                          
													</select>
													
												</div>
											</div>
					
					
								<!-- Group -->
								<div class="form-group">
						<label class="col-md-3 control-label" for="firstname">Description</label>
						<div class="col-md-8">
							<textarea placeholder="Enter your job description here....." id="description" name="description" class="wysihtml5 form-control"  rows="3"></textarea>
							
						</div>
					</div>
								<!-- // Group END -->
					
				<hr style="border-color:#959595">
					
					
				
				
			
			<!-- Form actions -->
			<div class="form-group">
				<label class="col-md-3 control-label"></label>
				<div class="input-group">
				<span><input type="submit" class="btn btn-info" id="submit" value="Save And Another Institution"></span> 
				&nbsp; <span style="margin-top:15px" id="loading"></span> <span class="text-success strong" style="font-size:18px" id="saved"></span> 
				</div>
	
			</div>
			<!-- // Form actions END -->	
			
			<div style="clear:both"></div>		
									
				</div>
			</form>
									
									
									
									</div>
									
									
									
								</div>
								
							
								
							</div>
							
						<!-- Row -->
			<div class="bg-gray innerAll">
				<div class="row">
			
					
					
					<!-- Column -->
					<div class="col-md-12">
						<div id="newsletter_topics" class="center">
							<h5><b>Education</b></h5>
							<p style="padding:15px">By clicking on the continue button, you verify that you are a representative of this company.</p>
							
							<a class="btn_add_education" rel="#addExperience" href="#"><i class="fa fa-plus"></i> Add New Institution</a>
							<div style="clear:both"></div>	
						</div>
					</div>
					<!-- // Column END -->
					
					
					
				</div>
				<!-- // Row END -->	
			</div>
	
							
				   
				
					</div>
<!-- Start Education -->

<!-- Start skill -->					
<div class="widget innerAll inner-2x" id="Skills">
	<div class="row">
		<div class="col-md-12">
			<div class="widget-body padding-none">
				<ul class="timeline-activity list-unstyled">
					<li class="active">
						<i class="list-icon fa fa-flask"></i>
						<div class="block block-inline">
							<div class="" style="position:relative; top:-10px">
								<h4 class="strong">Skills</h4>
							</div>
						</div>
						<div class="icon-add pull-right"><a rel="#addSkill" href="#" href='javascript:void(0);' ><i class="fa fa-plus fa-lg"></i></a></div>
						<button rel="#addSkill" type="button">skills</button>
						<!-- each overlay is initialized with this single JavaScript call -->
						<script>
  							$(function() {
    							$("button[rel]").overlay({mask: '#000', effect: 'apple', closeOnClick: false,});
    							
  							});
						</script>
					</li>
					<li>
					</li>
					
				</ul>
			</div>
		</div>
							
		
			<div class="col-md-12" id="addSkill" style="display:none; margin-top:60px">
								 
								<div class="modalHeader bg-info">Add Skill</div>
									<div class="modalBody">
									
										<form class="form-horizontal">
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="skill">Skill</label>
												<div class="col-md-6"><input class="form-control" id="skill" name="skill" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label">Competency Level</label>
												<div class="col-md-6">
												<select class="form-control" id="competency" name="competency" >
													<option value="">Select Level</option>
													<option value="4">Beginner</option>
													<option value="3">Intermediate</option>
													<option value="2">Advance</option>
													<option value="1">Expert</option>
                           										
                           						</select>
												</div>
											</div>
											<!-- // Group END -->
				
				<hr style="border-color:#959595">
					
										<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="skill"></label>
												<div class="col-md-6"><input type="submit" class="btn btn-info" id="submit" class="next button" value="Continue"></div>
											</div>
											<!-- // Group END -->
				
			
			
			<div style="clear:both"></div>		
									
				</form>
									
									
									
									</div>
									
									
								</div>
			<div class="col-md-12" id="editSkill" style="display:none; margin-top:60px">
								 
								<div class="modalHeader">Add Skill</div>
									<div class="modalBody">
									
										<form class="form-horizontal">
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="companyname">Competency</label>
												<div class="col-md-6"><input class="form-control" id="companyname" name="companyname" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label">Company Type</label>
												<div class="col-md-6">
												<select class="form-control" id="companytype" name="companytype" >
													<option value="">Select Company Type</option>
													<option value="4">Beginner</option>
													<option value="3">Intermediate</option>
													<option value="2">Advance</option>
													<option value="1">Expert</option>
                           										
                           						</select>
												</div>
											</div>
											<!-- // Group END -->
											
											
					
					
								
					
				<hr style="border-color:#959595">
					
					
				
				<!-- Form actions -->
			<div class="form-actions" style="margin-bottom:30px; margin-left:100px">
				
				<input type="submit" class="btn btn-primary" id="submit" class="next button" value="Continue">
				<button type="button" class="btn btn-default"><i class="fa fa-times"></i> Cancel</button>
			</div>
			<!-- // Form actions END -->	
			
			<div style="clear:both"></div>		
									
				</form>
									
									
									
									</div>
									
									
								</div>
								
							
								
							</div>
							
						<!-- Row -->
			<div class="bg-gray innerAll">
				<div class="row">
			
					
					
					<!-- Column -->
					<div class="col-md-12">
						<div id="newsletter_topics">
							<h5><b>Website</b></h5>
							<p>By clicking on the continue button, you verify that you are a representative of this company.</p>
							
							
						</div>
					</div>
					<!-- // Column END -->

					
				</div>
				<!-- // Row END -->	
			</div>
	
	</div>
<!-- End skill -->		

<!-- Start Language -->					
<div class="widget innerAll inner-2x" id="Language">
	<div class="row">
		<div class="col-md-12">
			<div class="widget-body padding-none">
				<ul class="timeline-activity list-unstyled">
					<li class="active">
						<i class="list-icon fa fa-flask"></i>
						<div class="block block-inline">
							<div class="" style="position:relative; top:-10px">
								<h4 class="strong">Language</h4>
							</div>
						</div>
						<div class="icon-add pull-right"><a rel="#addSkill" href="#" href='javascript:void(0);' ><i class="fa fa-plus fa-lg"></i></a></div>
						<button rel="#addSkill" type="button">skills</button>
						<!-- each overlay is initialized with this single JavaScript call -->
						<script>
  							$(function() {
    							$("button[rel]").overlay({mask: '#000', effect: 'apple', closeOnClick: false,});
    							
  							});
						</script>
					</li>
					<li>
					</li>
					
				</ul>
			</div>
		</div>
							
		
			<div class="col-md-12" id="addSkill" style="display:none; margin-top:60px">
								 
								<div class="modalHeader bg-info">Add Skill</div>
									<div class="modalBody">
									
										<form class="form-horizontal">
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="skill">Skill</label>
												<div class="col-md-6"><input class="form-control" id="skill" name="skill" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label">Competency Level</label>
												<div class="col-md-6">
												<select class="form-control" id="competency" name="competency" >
													<option value="">Select Level</option>
													<option value="4">Beginner</option>
													<option value="3">Intermediate</option>
													<option value="2">Advance</option>
													<option value="1">Expert</option>
                           										
                           						</select>
												</div>
											</div>
											<!-- // Group END -->
				
				<hr style="border-color:#959595">
					
										<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="skill"></label>
												<div class="col-md-6"><input type="submit" class="btn btn-info" id="submit" class="next button" value="Continue"></div>
											</div>
											<!-- // Group END -->
				
			
			
			<div style="clear:both"></div>		
									
				</form>
									
									
									
									</div>
									
									
								</div>
			<div class="col-md-12" id="editSkill" style="display:none; margin-top:60px">
								 
								<div class="modalHeader">Add Skill</div>
									<div class="modalBody">
									
										<form class="form-horizontal">
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="companyname">Competency</label>
												<div class="col-md-6"><input class="form-control" id="companyname" name="companyname" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label">Company Type</label>
												<div class="col-md-6">
												<select class="form-control" id="companytype" name="companytype" >
													<option value="">Select Company Type</option>
													<option value="4">Beginner</option>
													<option value="3">Intermediate</option>
													<option value="2">Advance</option>
													<option value="1">Expert</option>
                           										
                           						</select>
												</div>
											</div>
											<!-- // Group END -->
											
											
					
					
								
					
				<hr style="border-color:#959595">
					
					
				
				<!-- Form actions -->
			<div class="form-actions" style="margin-bottom:30px; margin-left:100px">
				
				<input type="submit" class="btn btn-primary" id="submit" class="next button" value="Continue">
				<button type="button" class="btn btn-default"><i class="fa fa-times"></i> Cancel</button>
			</div>
			<!-- // Form actions END -->	
			
			<div style="clear:both"></div>		
									
				</form>
									
									
									
									</div>
									
									
								</div>
								
							
								
							</div>
							
						<!-- Row -->
			<div class="bg-gray innerAll">
				<div class="row">
			
					
					
					<!-- Column -->
					<div class="col-md-12">
						<div id="newsletter_topics">
							<h5><b>Website</b></h5>
							<p>By clicking on the continue button, you verify that you are a representative of this company.</p>
							
							
						</div>
					</div>
					<!-- // Column END -->

					
				</div>
				<!-- // Row END -->	
			</div>
	
	</div>
<!-- End Language -->				
	
<!-- Start organization -->
<div class="widget innerAll inner-2x" id="organization">
	<div class="row">
		<div class="col-md-12">
			<div class="widget-body padding-none">
				<ul class="timeline-activity list-unstyled">
					<li class="active">
						<i class="list-icon fa fa-graduation-cap"></i>
						<div class="block block-inline">
							<div class="" style="position:relative; top:-10px">
								<h4 class="strong">Organization</h4>
							</div>
						</div>
						 <div class="icon-add pull-right"><a rel="#addEducation" href="#" href='javascript:void(0);' ><i class="fa fa-plus fa-lg"></i></a></div>
						
						
					</li>
					
					
					<?php if(isset($result_school)) : foreach($result_school as $key => $rows) : ?>
						<?php
			
			
						$user_id = $rows['user_id'];
						$schID = $rows['schID'];
						$schoolname = $rows['schoolname'];
						$course = $rows['course'];
						$degree = $rows['degree'];
						$start_month_sch = $rows['start_month_sch'];
						$end_month_sch = $rows['end_month_sch'];
						$start_year_sch = $rows['start_year_sch'];
						$end_year_sch = $rows['end_year_sch'];
						$city = $rows['city'];
						//$country = $rows['country'];
						$description =$rows['description'];
						
						?>
					
					<li>
						
						<i class="list-icon" style="font-size:12px">4yrs</i>
						<div class="block block-inline">
							<div class="" style="position:relative; top:10px">
								<div class="col-md-12">
									<h4><?php echo $schoolname; ?> &nbsp;<a href='javascript:void(0);' onclick="return editEdu(<?php echo $schID; ?>);" >  <i class="fa text-faded fa-pencil"></i></a>  &nbsp;<a href="#">  <i class="fa text-faded fa-trash"></i></a>  &nbsp;<a href="#">  <i class="fa text-faded fa-sort"></i></a></h4>
									<div style="font-size:14px" class="strong text-primary"><?php echo $course.', '.$degree; ?></div>
									<div><?php echo $city.', Nigeria'; ?></div>
									<div><?php echo 'Mar '.$start_year_sch.' - Mar '.$end_year_sch; ?></div>
								</div>
							</div>
						</div>
						
						<div class="col-md-12" style="display:none" id="editEducation<?php echo $schID; ?>" style="margin-top:-9px">
						
							<div class="editHeader bg-info">Edit Education</div>
									<div class="editBody">
										
										<form id="editEdu<?php echo $schID;?>" class="form-horizontal">
											<input class="form-control" id="user_id" name="user_id" value="<?php echo $user_id; ?>" type="hidden" />
											<input class="form-control" id="schID" name="schID" value="<?php echo $schID; ?>" type="hidden" />
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="schoolname">Institution Name</label>
												<div class="col-md-6"><input class="form-control" id="schoolname" name="schoolname" value="<?php echo $schoolname; ?>" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="city">City / State</label>
												<div class="col-md-6"><input class="form-control" id="city" name="city" value="<?php echo $city; ?>" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="country">Country</label>
												<div class="col-md-4"><input class="form-control" id="country" name="country" value="<?php echo $country; ?>" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="course">Course Studied</label>
												<div class="col-md-6"><input class="form-control" id="course" name="course" value="<?php echo $course; ?>" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="degree">Degree Earned</label>
												<div class="col-md-4"><input class="form-control" id="degree" name="degree" value="<?php echo $degree; ?>" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											
											
											<!-- Group -->
										<div class="form-group">
												<label class="col-md-3 control-label">Period</label>
												<div class="col-md-8">
													<select class="" id="start_month_sch" name="start_month_sch" >
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
													<select class="" id="companytype" name="companytype" >
														<option value="">Year</option>
														<option value="">1970</option>
														<option value="">1980</option>
														<option value="">1981</option>
														<option value="">1982</option>
														<option value="">1983</option>
														<option value="">1984</option>
														
						                          
													</select>
													&nbsp;&nbsp;To &nbsp;&nbsp;
													<select class="" id="companytype" name="companytype" >
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
													<select class="" id="companytype" name="companytype" >
														<option value="">Year</option>
														<option value="">1970</option>
														<option value="">1980</option>
														<option value="">1981</option>
														<option value="">1982</option>
														<option value="">1983</option>
														<option value="">1984</option>
														
						                          
													</select>
													
												</div>
											</div>
					
					
										<!-- Group -->
										<div class="form-group">
											<label class="col-md-3 control-label" for="firstname">Description</label>
											<div class="col-md-8">
												<textarea placeholder="Enter your job description here....." id="companydescription" name="companydescription" class="wysihtml5 form-control"  rows="3"></textarea>
											</div>
										</div>
										<!-- // Group END -->
					
										<hr style="border-color:#959595">
					
					
				
										<!-- Form actions -->
										<div class="form-actions" style="margin-bottom:30px; margin-left:100px">
											<input type="submit" class="btn btn-primary" id="submit" class="next button" value="Continue">
											<button type="button" class="btn btn-default"><i class="fa fa-times"></i> Cancel</button>
										</div>
										<!-- // Form actions END -->	
			
										<div style="clear:both"></div>		
									
									</form>

									</div>

							</div>
						
					</li>
					
					<?php endforeach ; ?>
					<?php else :?>
					<li> <div style="padding-left:35px; font-size:18px;"><i class="fa fa-exclamation-circle"></i> No educational records found</div> </li>
					<?php endif; ?>
					
				</ul>
			</div>
		</div>
							
				
			<div class="col-md-12" id="addEducation" style="display:none; margin-top:-9px">
								 
							<div class="modalHeader bg-info">Add Education</div>
									<div class="modalBody">
									
										<form id="addEdu" name="addEdu" class="form-horizontal">
											<div class="inner-form">
											<input class="form-control" id="user_id" name="user_id" value="<?php echo $user_id; ?>" type="hidden" />
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="schoolname">Institution Name</label>
												<div class="col-md-6"><input class="form-control" id="schoolname" name="schoolname" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="state">City / State</label>
												<div class="col-md-6"><input class="form-control" id="city" name="city" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="country">Country</label>
												<div class="col-md-4"><input class="form-control" id="country" name="country" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="course">Course Studied</label>
												<div class="col-md-6"><input class="form-control" id="course" name="course" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="degree">Degree Earned</label>
												<div class="col-md-4"><input class="form-control" id="degree" name="degree" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="degree">Grade</label>
												<div class="col-md-4"><input class="form-control" id="grade" name="grade" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											
											
											<!-- Group -->
										<div class="form-group">
												<label class="col-md-3 control-label">Period</label>
												<div class="col-md-8">
													<select class="" id="start_month" name="start_month" >
														<option value="">Month</option>
														<option value="January">Jan</option>
														<option value="February">Feb</option>
														<option value="March">Mar</option>
														<option value="April">Apr</option>
														<option value="May">May</option>
														<option value="June">Jun</option>
														<option value="July">Jul</option>
														<option value="August">Aug</option>
														<option value="September">Sep</option>
														<option value="October">Oct</option>
														<option value="November">Nov</option>
														<option value="December">Nov</option>
														
						                          
													</select>
													<select class="" id="start_year" name="start_year" >
														<option value="">Year</option>
														<option value="1970">1970</option>
														<option value="1980">1980</option>
														<option value="1981">1981</option>
														<option value="1982">1982</option>
														<option value="1983">1983</option>
														<option value="1984">1984</option>
														
						                          
													</select>
													&nbsp;&nbsp;To &nbsp;&nbsp;
													<select class="" id="end_month" name="end_month" >
														<option value="">Month</option>
														<option value="January">Jan</option>
														<option value="February">Feb</option>
														<option value="March">Mar</option>
														<option value="April">Apr</option>
														<option value="May">May</option>
														<option value="June">Jun</option>
														<option value="July">Jul</option>
														<option value="August">Aug</option>
														<option value="September">Sep</option>
														<option value="October">Oct</option>
														<option value="November">Nov</option>
														<option value="December">Nov</option>
													
													</select>
													<select class="" id="end_year" name="end_year" >
														<option value="">Year</option>
														<option value="1970">1970</option>
														<option value="1980">1980</option>
														<option value="1981">1981</option>
														<option value="1982">1982</option>
														<option value="1983">1983</option>
														<option value="1984">1984</option>
														
						                          
													</select>
													
												</div>
											</div>
					
					
								<!-- Group -->
								<div class="form-group">
						<label class="col-md-3 control-label" for="firstname">Description</label>
						<div class="col-md-8">
							<textarea placeholder="Enter your job description here....." id="description" name="description" class="wysihtml5 form-control"  rows="3"></textarea>
							
						</div>
					</div>
								<!-- // Group END -->
					
				<hr style="border-color:#959595">
					
					
				
				
			
			<!-- Form actions -->
			<div class="form-group">
				<label class="col-md-3 control-label"></label>
				<div class="input-group">
				<span><input type="submit" class="btn btn-info" id="submit" value="Save And Another Institution"></span> 
				&nbsp; <span style="margin-top:15px" id="loading"></span> <span class="text-success strong" style="font-size:18px" id="saved"></span> 
				</div>
	
			</div>
			<!-- // Form actions END -->	
			
			<div style="clear:both"></div>		
									
				</div>
			</form>
									
									
									
									</div>
									
									
									
								</div>
								
							
								
							</div>
							
						<!-- Row -->
			<div class="bg-gray innerAll">
				<div class="row">
			
					
					
					<!-- Column -->
					<div class="col-md-12">
						<div id="newsletter_topics" class="center">
							<h5><b>Organization</b></h5>
							<p style="padding:15px">By clicking on the continue button, you verify that you are a representative of this company.</p>
							
							<a class="btn_add_education" rel="#addExperience" href="#"><i class="fa fa-plus"></i> Add New Organization</a>
							<div style="clear:both"></div>	
						</div>
					</div>
					<!-- // Column END -->
					
					
					
				</div>
				<!-- // Row END -->	
			</div>
	
							
				   
				
					</div>
<!-- End organization -->

<!-- Start interest -->
<div class="widget innerAll inner-2x" id="interest">
	<div class="row">
		<div class="col-md-12">
			<div class="widget-body padding-none">
				<ul class="timeline-activity list-unstyled">
					<li class="active">
						<i class="list-icon fa fa-graduation-cap"></i>
						<div class="block block-inline">
							<div class="" style="position:relative; top:-10px">
								<h4 class="strong">Interests</h4>
							</div>
						</div>
						 <div class="icon-add pull-right"><a rel="#addEducation" href="#" href='javascript:void(0);' ><i class="fa fa-plus fa-lg"></i></a></div>
						
						
					</li>
					
					
					<?php if(isset($result_school)) : foreach($result_school as $key => $rows) : ?>
						<?php
			
			
						$user_id = $rows['user_id'];
						$schID = $rows['schID'];
						$schoolname = $rows['schoolname'];
						$course = $rows['course'];
						$degree = $rows['degree'];
						$start_month_sch = $rows['start_month_sch'];
						$end_month_sch = $rows['end_month_sch'];
						$start_year_sch = $rows['start_year_sch'];
						$end_year_sch = $rows['end_year_sch'];
						$city = $rows['city'];
						//$country = $rows['country'];
						$description =$rows['description'];
						
						?>
					
					<li>
						
						<i class="list-icon" style="font-size:12px">4yrs</i>
						<div class="block block-inline">
							<div class="" style="position:relative; top:10px">
								<div class="col-md-12">
									<h4><?php echo $schoolname; ?> &nbsp;<a href='javascript:void(0);' onclick="return editEdu(<?php echo $schID; ?>);" >  <i class="fa text-faded fa-pencil"></i></a>  &nbsp;<a href="#">  <i class="fa text-faded fa-trash"></i></a>  &nbsp;<a href="#">  <i class="fa text-faded fa-sort"></i></a></h4>
									<div style="font-size:14px" class="strong text-primary"><?php echo $course.', '.$degree; ?></div>
									<div><?php echo $city.', Nigeria'; ?></div>
									<div><?php echo 'Mar '.$start_year_sch.' - Mar '.$end_year_sch; ?></div>
								</div>
							</div>
						</div>
						
						<div class="col-md-12" style="display:none" id="editEducation<?php echo $schID; ?>" style="margin-top:-9px">
						
							<div class="editHeader bg-info">Edit Education</div>
									<div class="editBody">
										
										<form id="editEdu<?php echo $schID;?>" class="form-horizontal">
											<input class="form-control" id="user_id" name="user_id" value="<?php echo $user_id; ?>" type="hidden" />
											<input class="form-control" id="schID" name="schID" value="<?php echo $schID; ?>" type="hidden" />
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="schoolname">Institution Name</label>
												<div class="col-md-6"><input class="form-control" id="schoolname" name="schoolname" value="<?php echo $schoolname; ?>" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="city">City / State</label>
												<div class="col-md-6"><input class="form-control" id="city" name="city" value="<?php echo $city; ?>" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="country">Country</label>
												<div class="col-md-4"><input class="form-control" id="country" name="country" value="<?php echo $country; ?>" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="course">Course Studied</label>
												<div class="col-md-6"><input class="form-control" id="course" name="course" value="<?php echo $course; ?>" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="degree">Degree Earned</label>
												<div class="col-md-4"><input class="form-control" id="degree" name="degree" value="<?php echo $degree; ?>" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											
											
											<!-- Group -->
										<div class="form-group">
												<label class="col-md-3 control-label">Period</label>
												<div class="col-md-8">
													<select class="" id="start_month_sch" name="start_month_sch" >
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
													<select class="" id="companytype" name="companytype" >
														<option value="">Year</option>
														<option value="">1970</option>
														<option value="">1980</option>
														<option value="">1981</option>
														<option value="">1982</option>
														<option value="">1983</option>
														<option value="">1984</option>
														
						                          
													</select>
													&nbsp;&nbsp;To &nbsp;&nbsp;
													<select class="" id="companytype" name="companytype" >
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
													<select class="" id="companytype" name="companytype" >
														<option value="">Year</option>
														<option value="">1970</option>
														<option value="">1980</option>
														<option value="">1981</option>
														<option value="">1982</option>
														<option value="">1983</option>
														<option value="">1984</option>
														
						                          
													</select>
													
												</div>
											</div>
					
					
										<!-- Group -->
										<div class="form-group">
											<label class="col-md-3 control-label" for="firstname">Description</label>
											<div class="col-md-8">
												<textarea placeholder="Enter your job description here....." id="companydescription" name="companydescription" class="wysihtml5 form-control"  rows="3"></textarea>
											</div>
										</div>
										<!-- // Group END -->
					
										<hr style="border-color:#959595">
					
					
				
										<!-- Form actions -->
										<div class="form-actions" style="margin-bottom:30px; margin-left:100px">
											<input type="submit" class="btn btn-primary" id="submit" class="next button" value="Continue">
											<button type="button" class="btn btn-default"><i class="fa fa-times"></i> Cancel</button>
										</div>
										<!-- // Form actions END -->	
			
										<div style="clear:both"></div>		
									
									</form>

									</div>

							</div>
						
					</li>
					
					<?php endforeach ; ?>
					<?php else :?>
					<li> <div style="padding-left:35px; font-size:18px;"><i class="fa fa-exclamation-circle"></i> No educational records found</div> </li>
					<?php endif; ?>
					
				</ul>
			</div>
		</div>
							
				
			<div class="col-md-12" id="addEducation" style="display:none; margin-top:-9px">
								 
							<div class="modalHeader bg-info">Add Education</div>
									<div class="modalBody">
									
										<form id="addEdu" name="addEdu" class="form-horizontal">
											<div class="inner-form">
											<input class="form-control" id="user_id" name="user_id" value="<?php echo $user_id; ?>" type="hidden" />
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="schoolname">Institution Name</label>
												<div class="col-md-6"><input class="form-control" id="schoolname" name="schoolname" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="state">City / State</label>
												<div class="col-md-6"><input class="form-control" id="city" name="city" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="country">Country</label>
												<div class="col-md-4"><input class="form-control" id="country" name="country" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="course">Course Studied</label>
												<div class="col-md-6"><input class="form-control" id="course" name="course" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="degree">Degree Earned</label>
												<div class="col-md-4"><input class="form-control" id="degree" name="degree" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="degree">Grade</label>
												<div class="col-md-4"><input class="form-control" id="grade" name="grade" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											
											
											<!-- Group -->
										<div class="form-group">
												<label class="col-md-3 control-label">Period</label>
												<div class="col-md-8">
													<select class="" id="start_month" name="start_month" >
														<option value="">Month</option>
														<option value="January">Jan</option>
														<option value="February">Feb</option>
														<option value="March">Mar</option>
														<option value="April">Apr</option>
														<option value="May">May</option>
														<option value="June">Jun</option>
														<option value="July">Jul</option>
														<option value="August">Aug</option>
														<option value="September">Sep</option>
														<option value="October">Oct</option>
														<option value="November">Nov</option>
														<option value="December">Nov</option>
														
						                          
													</select>
													<select class="" id="start_year" name="start_year" >
														<option value="">Year</option>
														<option value="1970">1970</option>
														<option value="1980">1980</option>
														<option value="1981">1981</option>
														<option value="1982">1982</option>
														<option value="1983">1983</option>
														<option value="1984">1984</option>
														
						                          
													</select>
													&nbsp;&nbsp;To &nbsp;&nbsp;
													<select class="" id="end_month" name="end_month" >
														<option value="">Month</option>
														<option value="January">Jan</option>
														<option value="February">Feb</option>
														<option value="March">Mar</option>
														<option value="April">Apr</option>
														<option value="May">May</option>
														<option value="June">Jun</option>
														<option value="July">Jul</option>
														<option value="August">Aug</option>
														<option value="September">Sep</option>
														<option value="October">Oct</option>
														<option value="November">Nov</option>
														<option value="December">Nov</option>
													
													</select>
													<select class="" id="end_year" name="end_year" >
														<option value="">Year</option>
														<option value="1970">1970</option>
														<option value="1980">1980</option>
														<option value="1981">1981</option>
														<option value="1982">1982</option>
														<option value="1983">1983</option>
														<option value="1984">1984</option>
														
						                          
													</select>
													
												</div>
											</div>
					
					
								<!-- Group -->
								<div class="form-group">
						<label class="col-md-3 control-label" for="firstname">Description</label>
						<div class="col-md-8">
							<textarea placeholder="Enter your job description here....." id="description" name="description" class="wysihtml5 form-control"  rows="3"></textarea>
							
						</div>
					</div>
								<!-- // Group END -->
					
				<hr style="border-color:#959595">
					
					
				
				
			
			<!-- Form actions -->
			<div class="form-group">
				<label class="col-md-3 control-label"></label>
				<div class="input-group">
				<span><input type="submit" class="btn btn-info" id="submit" value="Save And Another Institution"></span> 
				&nbsp; <span style="margin-top:15px" id="loading"></span> <span class="text-success strong" style="font-size:18px" id="saved"></span> 
				</div>
	
			</div>
			<!-- // Form actions END -->	
			
			<div style="clear:both"></div>		
									
				</div>
			</form>
									
									
									
									</div>
									
									
									
								</div>
								
							
								
							</div>
							
						<!-- Row -->
			<div class="bg-gray innerAll">
				<div class="row">
			
					
					
					<!-- Column -->
					<div class="col-md-12">
						<div id="newsletter_topics" class="center">
							<h5><b>Organization</b></h5>
							<p style="padding:15px">By clicking on the continue button, you verify that you are a representative of this company.</p>
							
							<a class="btn_add_education" rel="#addExperience" href="#"><i class="fa fa-plus"></i> Add New Organization</a>
							<div style="clear:both"></div>	
						</div>
					</div>
					<!-- // Column END -->
					
					
					
				</div>
				<!-- // Row END -->	
			</div>
	
							
				   
				
					</div>
<!-- End Interest -->

<!-- Start Award -->					
<div class="widget innerAll inner-2x" id="awards">
	<div class="row">
		<div class="col-md-12">
			<div class="widget-body padding-none">
				<ul class="timeline-activity list-unstyled">
					<li class="active">
						<i class="list-icon fa fa-flask"></i>
						<div class="block block-inline">
							<div class="" style="position:relative; top:-10px">
								<h4 class="strong">Awards</h4>
							</div>
						</div>
						<div class="icon-add pull-right"><a rel="#addSkill" href="#" href='javascript:void(0);' ><i class="fa fa-plus fa-lg"></i></a></div>
						<button rel="#addSkill" type="button">skills</button>
						<!-- each overlay is initialized with this single JavaScript call -->
						<script>
  							$(function() {
    							$("button[rel]").overlay({mask: '#000', effect: 'apple', closeOnClick: false,});
    							
  							});
						</script>
					</li>
					<li>
					</li>
					
				</ul>
			</div>
		</div>
							
		
			<div class="col-md-12" id="addSkill" style="display:none; margin-top:60px">
								 
								<div class="modalHeader bg-info">Add Skill</div>
									<div class="modalBody">
									
										<form class="form-horizontal">
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="skill">Skill</label>
												<div class="col-md-6"><input class="form-control" id="skill" name="skill" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label">Competency Level</label>
												<div class="col-md-6">
												<select class="form-control" id="competency" name="competency" >
													<option value="">Select Level</option>
													<option value="4">Beginner</option>
													<option value="3">Intermediate</option>
													<option value="2">Advance</option>
													<option value="1">Expert</option>
                           										
                           						</select>
												</div>
											</div>
											<!-- // Group END -->
				
				<hr style="border-color:#959595">
					
										<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="skill"></label>
												<div class="col-md-6"><input type="submit" class="btn btn-info" id="submit" class="next button" value="Continue"></div>
											</div>
											<!-- // Group END -->
				
			
			
			<div style="clear:both"></div>		
									
				</form>
									
									
									
									</div>
									
									
								</div>
			<div class="col-md-12" id="editSkill" style="display:none; margin-top:60px">
								 
								<div class="modalHeader">Add Skill</div>
									<div class="modalBody">
									
										<form class="form-horizontal">
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="companyname">Competency</label>
												<div class="col-md-6"><input class="form-control" id="companyname" name="companyname" value="" type="text" /></div>
											</div>
											<!-- // Group END -->
											
											<!-- Group -->
											<div class="form-group">
												<label class="col-md-3 control-label">Company Type</label>
												<div class="col-md-6">
												<select class="form-control" id="companytype" name="companytype" >
													<option value="">Select Company Type</option>
													<option value="4">Beginner</option>
													<option value="3">Intermediate</option>
													<option value="2">Advance</option>
													<option value="1">Expert</option>
                           										
                           						</select>
												</div>
											</div>
											<!-- // Group END -->
											
											
					
					
								
					
				<hr style="border-color:#959595">
					
					
				
				<!-- Form actions -->
			<div class="form-actions" style="margin-bottom:30px; margin-left:100px">
				
				<input type="submit" class="btn btn-primary" id="submit" class="next button" value="Continue">
				<button type="button" class="btn btn-default"><i class="fa fa-times"></i> Cancel</button>
			</div>
			<!-- // Form actions END -->	
			
			<div style="clear:both"></div>		
									
				</form>
									
									
									
									</div>
									
									
								</div>
								
							
								
							</div>
							
						<!-- Row -->
			<div class="bg-gray innerAll">
				<div class="row">
			
					
					
					<!-- Column -->
					<div class="col-md-12">
						<div id="newsletter_topics">
							<h5><b>Website</b></h5>
							<p>By clicking on the continue button, you verify that you are a representative of this company.</p>
							
							
						</div>
					</div>
					<!-- // Column END -->

					
				</div>
				<!-- // Row END -->	
			</div>
	
	</div>
<!-- End Award -->	
				
				
				
				
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