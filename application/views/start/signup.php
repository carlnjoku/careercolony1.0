<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>New Account | Careercolony</title>
<link rel="shortcut icon" href="<?php echo base_url();?>favicon.ico">

<style>	
	html {
 background: url(<?php echo base_url(); ?>img/bg_login.jpg) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

body {
font-family: arial, verdana;
}

#divLoading
{
    display : none;
}

#divLoading.show
{
    display : block;
    position : fixed;
    z-index: 100;
    background-image : url('<?php echo base_url(); ?>img/ajax-loader2.gif');
    background-color:#666;
    opacity : 0.4;
    background-repeat : no-repeat;
    background-position : center;
    left : 0;
    bottom : 0;
    right : 0;
    top : 0;
}
#loadinggif.show
{
    left : 50%;
    top : 50%;
    position : absolute;
    z-index : 101;
    width : 32px;
    height : 32px;
    margin-left : -16px;
    margin-top : -16px;
}

#divLoading.hide
{
	display : none;
}

#loadinggif.hide
{
	display : none;
}
</style>

<style>
// Form validation

input.error{border:1px solid #FF0000 !important; }
label.error,div.error{
    font-size:13px;
    color:#FF0000 !important;
}
.text-normal{
    font-size:13px !important;
}

</style>

<style>

</style>

<script src="<?php echo base_url(); ?>assets-signup-form/jquery-validation/lib/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets-signup-form/jquery-validation/dist/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets-signup-form/jquery-easing.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets-signup-form/jquery-multi-step-form.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>assets-signup-form/jquery-multi-step-signup-form.css" media="screen" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets-signup-form/font-awesome/css/font-awesome.min.css" media="screen" rel="stylesheet" type="text/css"/>

<script>
	$(document).ready(function () {

    $('#signupform').validate({ // initialize the plugin
        rules: {
            firstname: {
                required: true,
                minlength: 2
            },
            lastname: {
                required: true,
                minlength: 2
            },
            email: {
      			required: true,
      			email: true
    		},
    		password: {
      			required: true,
      			minlength: 6
    		},


        },
        submitHandler: function (form) {
            // comment out AJAX for demo
          	var server_error = '<div class="alert"> Unable connect to the server now, please try later.</div>';
          	var error = '<div class="alert"> This email address already exits.</div>';
            $.ajax({
                dataType: 'html',
                type: 'post',
                url: 'http://localhost/neo4j-moviedb/web/signup',
                data: $(form).serialize(),
                
                beforeSend: function()
        		{
             		$("div#divLoading").addClass('show');
        		},
                success: function (responseData) {
                    
                    var responseData = $.parseJSON(responseData); //parse JSON
          			var user_id = responseData.user_id;
          			var email = responseData.email;
          			var status = responseData.status;
          			
          			alert(email);
                    
                    if(status===0){
    
                    	$("div#divLoading").addClass('hide');
                    	$("#error").html(error).fadeIn("3000");
                    
                    }else{
                    	
                    	// Create user_id or set cookie (57af975bc978ac965ad5d7cd6c8b8edc is the cookie name)
          	  			cookievalueUserID = +user_id;
          	  			cookievalueEmail = +email;
          	  			document.cookie="57af975bc978ac965ad5d7cd6c8b8edc=" + cookievalueUserID;
          	  			//document.cookie="email=" + cookievalueEmail;
          	  			
          	  
              			// Redirect to basic profile page 
              			window.location="<?php echo base_url(); ?>user/create_session_after_signup/"+user_id;
                    
                    	
                    }
                },
                error: function (responseData) {
                    
                    $("div#divLoading").addClass('hide');
                    $("#error").html(server_error).fadeIn("3000");
                }
            });
            
            // resets fields
           /*
            $('input#firstname').val("");
            $('input#lastname').val("");
            $('input#email').val("");
          */ 
           $('input#password').val("");
            
           
        }
    });

});
	</script>
	
</head>

<body>

<img src="<?php echo base_url(); ?>logo.png" style="position:absolute; top:40px; left:42%">

<div id="multistepform-container">
<div id="multistepform">

   <p style="margin-bottom:30px"></p>
           
            <div class="block" style = "opacity: 0.8; filter: alpha(opacity=80); /* For IE8 and earlier */">
            
           
			
			<span id="error" style="display:none;color:FFFFFF; font-size:13px; position:relative; top:-8px"> <i class="fa fa-user"></i> <?php echo $this->lang->line("error_msg_email"); ?></span>

                   
                    <form id="signupform">
                        <h2 class="fs-title"><?php echo $this->lang->line("signup_title"); ?></h2>
                       <h3 class="fs-subtitle"><?php echo $this->lang->line("signup_required"); ?></h3>
                       <input type="hidden" name="ip" id="ip" value="65.209.87.1" >
                       <input type="hidden" name="longitude" id="longitude" value="100028.9">
                       <input type="hidden" name="latitude" id="latitude" value="833029.4">
                       
                        <input type="text" name="firstname" id="firstname" placeholder="<?php echo $this->lang->line("signup_label_first_name"); ?>">
                       
                        
                        <input type="text" name="lastname" id="lastname" placeholder="<?php echo $this->lang->line("signup_label_last_name"); ?>"> 
                        

                        <input type="text" name="email" id="email" placeholder="<?php echo $this->lang->line("signup_label_email"); ?>"> <i class="fa fa-question-circle pull-right" style="position:relative; top:-35px; left:20px; color:#6E6E6E"></i>
                        
                        <input style="margin-top:-40px" type="password" name="password" placeholder="<?php echo $this->lang->line("signup_label_password"); ?>"> <i class="fa fa-question-circle pull-right" style="position:relative; top:-35px; left:20px; color:#6E6E6E"></i>
                        <h3 class="fs-subtitle"><?php echo $this->lang->line("signup_private_policy"); ?></h3>
                        
                        <input type="submit" id="submit" class="next button" value="<?php echo $this->lang->line("signup_submit_button"); ?>">
                       
                    </form>
                    
                   
            </div>
            
            
          <div id="divLoading"></div>  
          
           <p style="position:relative; top:475px; font-size:14px; color:#F2F2F2"> © Careercolony 2016. All Rights Reserved.</p>
    
</div>
</div>
    


</body>
</html>
