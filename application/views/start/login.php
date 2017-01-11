<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Member Login | Careercolony</title>
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
a:link {
    text-decoration: none;
    color:#6E6E6E
}

a:visited {
    text-decoration: none;
    color:#0B3861;
}

a:hover {
    text-decoration: underline;
}

a:active {
    text-decoration: underline;
}
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
    		},
    		password: {
      			required: true,
      			minlength: 6
    		},


        },
        submitHandler: function (form) {
            // comment out AJAX for demo
          	var server_error = '<div class="alert"> Unable connect to the server check your internet connection and try again.</div>';
          	var error = '<div class="alert"> Your email or password is incorrect. Check and try again.</div>';
            $.ajax({
                dataType: 'html',
                type: 'post',
                url: 'http://localhost/neo4j-moviedb/web/login',
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
          			
          			//alert(user_id);
                    
                    if(!user_id){
    
                    	$("div#divLoading").addClass('hide');
                    	$("#error").html(error).fadeIn("3000");
                    
                    }else{
                    	
                    	// Create user_id or set cookie (57af975bc978ac965ad5d7cd6c8b8edc is the cookie name)
          	  			cookievalueUserID = +user_id;
          	  			cookievalueEmail = +email;
          	  			document.cookie="57af975bc978ac965ad5d7cd6c8b8edc=" + cookievalueUserID;
          	  			//document.cookie="email=" + cookievalueEmail;
          	  			
          	  
              			// Redirect to basic profile page 
              			window.location="<?php echo base_url(); ?>user/create_session_after_login/"+user_id;
                    
                    	
                    }
                },
                error: function (responseData) {
                    
                    
                    //window.location="http://localhost/careercolony/start/basic_profile";
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

   <p style="margin-bottom:100px"></p>
           
            <div class="block" style = "opacity: 0.8; filter: alpha(opacity=80); /* For IE8 and earlier */">
            
           
			
			<span id="error" style="display:none;color:FFFFFF; font-size:13px; position:relative; top:-8px"> <i class="fa fa-user"></i> <?php echo $this->lang->line("error_msg_email"); ?></span>

                   
                    <form id="signupform">
                        <h2 class="fs-title"><?php echo $this->lang->line("login_title"); ?></h2>
                       <h3 class="fs-subtitle"></h3>
                       
                       
                        <input type="email" name="email" id="email" placeholder="<?php echo $this->lang->line("login_label_email"); ?>">
                       
                        
                        <input type="password" name="password" id="password" placeholder="<?php echo $this->lang->line("login_label_password"); ?>">
                        <div style="clear:both"></div>
                     
                        <input type="submit" id="submit" class="next button" value="<?php echo $this->lang->line("login_login_button"); ?>">
                        
                       
                    </form>
                    
                   <h2 class="fs-subtitle" ><?php echo $this->lang->line("login_forgot_password"); ?></h2>
            </div>
            
            <p></p>
            
            
            
          <div id="divLoading"></div>  
          
           <p style="position:relative; top:405px; font-size:14px; color:#F2F2F2"> © Careercolony 2016. All Rights Reserved.</p>
    
</div>
</div>
    


</body>
</html>