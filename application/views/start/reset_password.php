<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Password Reset | Careercolony</title>
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
            email: {
      			required: true,
      			email: true
    		}


        },
        submitHandler: function (form) {
            // comment out AJAX for demo
          	var server_error = '<div class="alert"> Unable connect to the server now, please try later.</div>';
          	var error = '<div class="alert"> This email does not exist.</div>';
          	var check_email = "<h2>Check your inbox</h2><h3>Thank you. We've just sent you a password recovery email.Click the button in the email to reset your password.</h3> Can't find the email? Try checking your spam messages or other folders.Email not received."; 
            var email = document.getElementById("email").value;
            $.ajax({
                dataType: 'html',
                type: 'get',
                url: 'http://localhost/neo4j-moviedb/web/reset_password/'+email,
                
                
                beforeSend: function()
        		{
             		$("div#divLoading").addClass('show');
        		},
                success: function (responseData) {
                    
                    var responseData = $.parseJSON(responseData); //parse JSON
          			var status = responseData.status;
          			
          			
          			//alert(email);
                    
                    if(status==='0'){
    
                    	$("div#divLoading").addClass('hide');
                    	$("#error").html(error).fadeIn("3000");
                    
                    }else{
                    
          	  
              			// Redirect to basic profile page 
              			//window.location="<?php echo base_url(); ?>user/process_reset_password/"+email;
                     	$("#reset").hide();
                     	$("#check_email").html(check_email).fadeIn("3000");
                     	$("div#divLoading").addClass('hide');
                     	$("#error").html(server_error).fadeOut("3000");
                    	
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

   <p style="margin-bottom:80px"></p>
           
            <div class="block" style = "opacity: 0.8; filter: alpha(opacity=80); /* For IE8 and earlier */">
            
           
			
			<span id="error" style="display:none;color:FFFFFF; font-size:13px; position:relative; top:-8px"> <i class="fa fa-user"></i> <?php echo $this->lang->line("error_msg_email"); ?></span>

                   
                    <form id="signupform">
                        
                        <div id="reset">
                         	<h2 class="fs-title"><?php echo $this->lang->line("reset_password_title"); ?></h2>
                       		<h3 class="fs-subtitle"><?php echo $this->lang->line("reset_password_subtitle"); ?></h3>
                       
                        	<input type="email" name="email" id="email" placeholder="<?php echo $this->lang->line("login_label_email"); ?>">
                            <input type="submit" id="submit" class="next button" value="<?php echo $this->lang->line("reset_password_button"); ?>">
                       </div>
                    
                    </form>
                    
                  <div id="divLoading"></div>    
                  
                  <div id="check_email" style="display:none;">
                  
                   
            </div>
            
            
          
           <p style="position:relative; top:175px; font-size:14px; color:#F2F2F2"> © Careercolony 2016. All Rights Reserved.</p>
    
</div>
</div>
    


</body>
</html>