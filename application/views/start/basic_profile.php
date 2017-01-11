<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Basic Profile | Careercolony</title>
<link rel="shortcut icon" href="<?php echo base_url();?>favicon.ico">
<style>

html {
background: url(<?php echo base_url(); ?>img/bg_signup.jpg) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
body {
font-family: arial, verdana;
}
</style>



<script src="<?php echo base_url(); ?>assets-signup-form/jquery-validation/lib/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets-signup-form/jquery-validation/dist/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets-signup-form/jquery-easing.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets-signup-form/jquery-multi-step-form.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>assets-signup-form/jquery-multi-step-form.css" media="screen" rel="stylesheet" type="text/css"/>

</head>



<script>
$(document).ready(function()
{
    $(document).on('submit', '#step_1', function()
    {		
		
          
          var loadUrl = "<?php echo base_url(); ?>page/ajax_result";
          var ajax_load = "<span<img src='<?php echo base_url(); ?>ajax-loader.gif' alt='loading....' /></span>";
          var ajax_load_error = '<div class="alert alert-danger">User already exist click here to <a href="">login</a></div>';
          
          var user_id = "<?php echo $user_id; ?>" // $user_id is a session data from signup step;
          
          var res = "#step_1";
          var form_data = $(res).serialize();
        
        
          $.ajax({
          type : 'POST',
          url  : 'http://localhost/neo4j-moviedb/web/signup_step1/'+user_id,
          data : form_data,
          beforeSend: function()
          {
            //alert(form_data);
             $("div#divLoading").addClass('show');
            //$('.content').html('Generating estimate......');
            //$("#result").html(ajax_load).load(" #result").fadeIn("3000"); 
         },
        success :  function(data)
        {
          var data = $.parseJSON(data);//parse JSON
          var user_id =  data.user_id ;
          var email = data.email ;
          var status = data.status;
          var employment_status = data[0].employment_status;
  
          console.log(employment_status);
          

          if(status === '0') {
              $("#error").html(ajax_load_error).fadeIn("3000");
          }else{
				$("#employment_status1").val(employment_status);
              //window.location="<?php echo base_url(); ?>start/login/"+ user_id;
              
              
          }
         
       }
       
       
      });
  return false;
});

});
</script>

<script>
$(document).ready(function()
{
    $(document).on('submit', '#step_2', function()
   {
  
  		var user_id = "<?php echo $user_id; ?>" // $user_id is a session data from signup step;
  		
  		var loadUrl = "<?php echo base_url(); ?>page/ajax_result";
  		var ajax_load = "<span<img src='<?php echo base_url(); ?>ajax-loader.gif' alt='loading....' /></span>";
  		var ajax_load_error = '<div class="alert alert-danger">User already exist click here to <a href="">login</a></div>';
  		var res = "#step_2";
  		var employment_status = "<?php echo $employment_status; ?>";
  		var form_data = $(res).serialize();

      $.ajax({
      type : 'POST',
      url  : 'http://localhost/neo4j-moviedb/web/signup_step2/'+user_id,
      data : form_data,
      beforeSend: function()
        {
            
             $("div#divLoading").addClass('show');
        },
      success :  function(data)
      {
          var data = $.parseJSON(data);//parse JSON
          var user_id = data.user_id;
          //var email = data.email;
          //var status = data.status;
          
       
          if(!user_id) {
              $("#error").html(ajax_load_error).fadeIn("3000");
          }else{
              //window.location="<?php echo base_url(); ?>start/login/"+ user_id;
          }

       }
      });
  return false;
});

});
</script>

<script>
$(document).ready(function()
{
    $(document).on('submit', '#step_3', function()
{
  var loadUrl = "<?php echo base_url(); ?>page/ajax_result";
  var ajax_load = "<span<img src='<?php echo base_url(); ?>ajax-loader.gif' alt='loading....' /></span>";
  var ajax_load_error = '<div class="alert alert-danger">User already exist click here to <a href="">login</a></div>';
  var res = "#step_3";
  var form_data = $(res).serialize();

      $.ajax({
      type : 'POST',
      url  : 'http://localhost/neo4j-moviedb/web/signup_step3',
      data : form_data,
      beforeSend: function()
        {
            //alert(form_data);
             $("div#divLoading").addClass('show');
            //$('.content').html('Generating estimate......');
           // $("#result").html(ajax_load).load(" #result").fadeIn("3000");
        },
      success :  function(data)
      {
          var data = $.parseJSON(data);//parse JSON
          var user_id = data.user_id;
          var email = data.email;
          var status = data.status;
       
          if(status === '0') {
              $("#error").html(ajax_load_error).fadeIn("3000");
          }else{
              //window.location="<?php echo base_url(); ?>start/login/"+ user_id;
          }

       }
      });
  return false;
});

});
</script>

<style>
.input{
width: 300px;
height:30px;
}
#dropdown{
height:300px;
width:300px;
border:1px #ccc solid;
display:none;

}
</style>
<script>
$(document).ready(function(){
 	$('#search').keyup(function()
 	{
 		$('#dropdown').show();
 		var x = $(this).val;
 		$.ajax({
      		type : 'POST',
      		url  : 'http://localhost/neo4j-moviedb/web/signup_step2/'+user_id,
      		data : 'q='+x,
      		
      		success :  function(data)
      		{
      			$('#dropdown').html(data);
       		}
      });
 	});

});

</script>



  

<body>
<img src="<?php echo base_url(); ?>logo.png" style="position:absolute; top:40px; left:42%">



    <div id="multistepform-example-container" style = "opacity: 0.8; filter: alpha(opacity=80); /* For IE8 and earlier */">

    <p style="margin-bottom:50px"></p>
                <ul id="multistepform-progressbar">
                    <li class="active">Account Setup</li>
                    <li>Social Profiles</li>
                    <li>Account Confirmation</li>
                </ul>
                <div class="form">
                
                <input type="text" id="search" name="search" />
                <div id="dropdown"></div>
                
                <span id="error" style="display:none;color:FFFFFF; font-size:13px; position:relative; top:-8px"> <i class="fa fa-user"></i> <?php echo $this->lang->line("error_msg_email"); ?></span>
                    <form id="step_1">
                    
                    

                    <h2 class="fs-title">Create your account</h2>
                        <h3 class="fs-subtitle"><?php echo $this->lang->line("signup_wizard_intro_step1"); ?></h3>
                        
                       
                      
                       <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>" >
                      
                        
                        <input type="text" id="country" name="country" value="" autocomplete="off" />
                       
                     
                       <select name="employment_status" id="employment_status" class="form-control">
                                <option value="0"><?php echo $this->lang->line("employ_status"); ?></option>
                                <option value="employed">I'm Employed</option>
                                <option value="unemployed">I'm Unemployed</option>
                                <option value="freelancer">I'm a Freelancer</option>
                                <option value="entrepreneur">Entrepreneur<o/ption>
                                <option value="student">I'm a Student</option>
                                <option value="investor">I'm An Investor</option>
                              
                        </select>
                      
                      
                        <input type="text" name="postal_code" id="postal_code" autocomplete="off" placeholder="<?php echo $this->lang->line("postalcode"); ?>">
                       
        <br />
        
         <div style="font-family: Verdana; font-size: 13px;" id='selectionlog'>
        </div>
                      
                        <input type="submit"  id="submit"  class="next button" value="Next">
			</form>
		</div>
		
		 
		
		<div class="form">
		
		<div id="employment_status1"></div>
		
         
                    <form action="#" method="post" id="step_2">
                        <h2 class="fs-title">Social Profiles</h2>
                        <h3 class="fs-subtitle"><?php echo $this->lang->line("signup_wizard_intro_step2"); ?></h3>
                      
                     
                      
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>" >
                      
                      
                        <input type="text" style="display:none" name="current_jobtitle" id="current_jobtitle" placeholder="<?php echo $this->lang->line("current_jobtitle"); ?>">
                        <input type="text" style="display:none" name="current_employer" id="current_employer" autocomplete="off" placeholder="<?php echo $this->lang->line("current_employer"); ?>">
                       
                        <input type="text" style="display:none" name="previous_jobtitle" id="previous_jobtitle" placeholder="<?php echo $this->lang->line("previous_jobtitle"); ?>">
                        <input type="text" style="display:none" name="previous_employer" id="previous_employer" autocomplete="off" placeholder="<?php echo $this->lang->line("previous_employer"); ?>">
                        
                        <input type="text" style="display:none" name="jobtitle_entrepreneur " id="jobtitle_entrepreneur" placeholder="<?php echo $this->lang->line("jobtitle_entrepreneur"); ?>">
                        <input type="text" style="display:none" name="company_entrepreneur" id="company_entrepreneur" autocomplete="off" placeholder="<?php echo $this->lang->line("company_entrepreneur"); ?>">
                        
                      
                        <input type="text" style="display:none" name="jobtitle_freelancer" id="jobtitle_freelancer" placeholder="<?php echo $this->lang->line("jobtitle_freelancer"); ?>">
                        <input type="text" style="display:none" name="company_freelancer" id="company_freelancer" autocomplete="off" placeholder="<?php echo $this->lang->line("company_freelancer"); ?>">
                      
                        <input type="text" style="display:none" name="jobtitle_investor " id="jobtitle_investor" placeholder="<?php echo $this->lang->line("jobtitle_investor"); ?>">
                        <input type="text" style="display:none" name="company_investor" id="company_investor" autocomplete="off" placeholder="<?php echo $this->lang->line("company_investor"); ?>">
                      
                        <input type="text" style="display:none" name="course_of_study" id="course_of_study" autocomplete="off" placeholder="<?php echo $this->lang->line("course_of_study"); ?>">
                        <input type="text" style="display:none" name="school_name" id="school_name" placeholder="<?php echo $this->lang->line("school_name"); ?>">
                     
                      	<select class="form-control" name="industry" id="industry">
								<option value="">Select Industry</option>
                           <?php if(isset($industry)) : foreach($industry as $key => $rows) : ?>
                           <?php
							//$inID = $rows->inID;
							$industryname = $rows['industryname'];
							?>
                          <option value="<?php echo $industryname; ?>"><?php echo $industryname; ?></option>
                          <?php endforeach ; ?>
							<?php else :?>
							<h3> No industry selected </h3>
					    <?php endif; ?>
                        
                        <input type="button" name="previous" class="previous button" value="<?php echo $this->lang->line("step2_previous_button"); ?>">
                        <input type="submit" name="submit" id="submit" class="next button" value="<?php echo $this->lang->line("step2_next_button"); ?>">
                    </form>
            </div>
            
            <div class="form" style="width:600px">
            
            
            
            
            <h3 class="">Almost done !. Let's verify your Careercolony account and start boosting your career.</h3>

			<h3 class="fs-subtitle">We have sent you an e-mail containing the activation link to <span><b>say@yahoo.com</b></span>
			Login in to your email and click on the Activate button to verify your account.</h3>
			
			<hr>
			<h3 class="fs-subtitle">Didn't receive activation e-mail? Re-send</h3>
			<h3 class="fs-subtitle">Here are a few tips:<br>
				1.) Please be patient - Sometimes it takes a while for e-mails to arrive.<br>
				2.) Have a look in your spam folder to see if our e-mail ended up there.<br>
				3.) Have waited and no email came in yet ? Resend new email:<br>
				4.) Made a typing mistake? Edit your e-mail address. <br>
			</h3>
			
			<a href="<?php echo base_url();?>home/frontpage"> Continue </a>


			

                    
            </div>
            
            <p style="position:relative; top:345px; font-size:14px; color:#F2F2F2"> © Careercolony 2016. All Rights Reserved.</p>
</div>



        

<script>
$(document).ready(function(){
    $.multistepform({
        container:'multistepform-example-container',
        //form_method:'GET',
    })
});
</script>



<script>
$(document).ready(function()
{
   $('#employment_status').change(function(){
   selection = $(this).val();
   switch(selection)
   {
       case 'employed':
           $('#current_jobtitle').fadeToggle();
           $('#current_employer').fadeToggle();
        
           $('#previous_jobtitle').hide();
           $('#previous_employer').hide();
           $('#course_of_study').hide();
           $('#school_name').hide();
           $('#jobtitle_freelancer').hide();
           $('#company_freelancer').hide();
           $('#jobtitle_investor').hide();
           $('#company_investor').hide();
           $('#jobtitle_entrepreneur').hide();
           $('#company_entrepreneur').hide();
          
           var val = '1';
           var employment_status = {set_employment_status: val};
           $.ajax({
                type: 'POST',
             url: "<?php echo base_url(); ?>start/basic_profile",
             data: employment_status,
             success: function(response) {
              
             }
           });
          
          
         
        
           break;
       case 'unemployed':
           $('#previous_jobtitle').fadeToggle();
           $('#previous_employer').fadeToggle();
         
           $('#current_jobtitle').hide();
           $('#current_employer').hide();
           $('#course_of_study').hide();
           $('#school_name').hide();
           $('#jobtitle_freelancer').hide();
           $('#company_freelancer').hide();
           $('#jobtitle_investor').hide();
           $('#company_investor').hide();
           $('#jobtitle_entrepreneur').hide();
           $('#company_entrepreneur').hide();
          
           var val = '2';
           var employment_status = {set_employment_status: val};
           $.ajax({
                type: 'POST',
             url: "<?php echo base_url(); ?>start/basic_profile",
             data: employment_status,
             success: function(response) {
             
              
             }
           });
        
        
           break;
      case 'student':
           $('#course_of_study').fadeToggle();
           $('#school_name').fadeToggle();
         
           $('#previous_jobtitle').hide();
           $('#previous_employer').hide();
           $('#current_jobtitle').hide();
           $('#current_employer').hide();
           $('#jobtitle_freelancer').hide();
           $('#company_freelancer').hide();
           $('#jobtitle_investor').hide();
           $('#company_investor').hide();
           $('#jobtitle_entrepreneur').hide();
           $('#company_entrepreneur').hide();
          
           var val = '3';
           var employment_status = {set_employment_status: val};
           $.ajax({
                type: 'POST',
             url: "<?php echo base_url(); ?>start/basic_profile",
             data: employment_status,
             success: function(response) {
              
             }
           });
         
           break;
      case 'freelancer':
           $('#jobtitle_freelancer').fadeToggle();
           $('#company_freelancer').fadeToggle();
         
           $('#course_of_study').hide();
           $('#school_name').hide();
           $('#previous_jobtitle').hide();
           $('#previous_employer').hide();
           $('#current_jobtitle').hide();
           $('#current_employer').hide();
           $('#jobtitle_investor').hide();
           $('#company_investor').hide();
           $('#jobtitle_entrepreneur').hide();
           $('#company_entrepreneur').hide();
          
           var val = '4';
           var employment_status = {set_employment_status: val};
           $.ajax({
                type: 'POST',
             url: "<?php echo base_url(); ?>start/basic_profile",
             data: employment_status,
             success: function(response) {
              
             }
           });
         
         
           break;
      case 'investor':
           $('#jobtitle_investor').fadeToggle();
           $('#company_investor').fadeToggle();
         
           $('#jobtitle_freelancer').hide();
           $('#company_freelancer').hide();
           $('#course_of_study').hide();
           $('#school_name').hide();
           $('#previous_jobtitle').hide();
           $('#previous_employer').hide();
           $('#current_jobtitle').hide();
           $('#current_employer').hide();
           $('#jobtitle_entrepreneur').hide();
           $('#company_entrepreneur').hide();
        
           var val = '5';
           var employment_status = {set_employment_status: val};
           $.ajax({
                type: 'POST',
             url: "<?php echo base_url(); ?>start/basic_profile",
             data: employment_status,
             success: function(response) {
              
             }
           });
         
           break;
      case 'entrepreneur':
           $('#jobtitle_entrepreneur').fadeToggle();
           $('#company_entrepreneur').fadeToggle();
         
           $('#jobtitle_investor').hide();
           $('#company_investor').hide();
           $('#jobtitle_freelancer').hide();
           $('#company_freelancer').hide();
           $('#current_jobtitle').hide();
           $('#current_employer').hide();
           $('#course_of_study').hide();
           $('#school_name').hide();
           $('#previous_jobtitle').hide();
           $('#previous_employer').hide();
          
           var val = '6';
           var employment_status = {set_employment_status: val};
           $.ajax({
                type: 'POST',
             url: "<?php echo base_url(); ?>start/basic_profile",
             data: employment_status,
             success: function(response) {
              
             }
           });
         
         
           break;
       default:
           $('#current_jobtitle').fadeToggle();
           $('#current_employer').fadeToggle();
         
           $('#jobtitle_entrepreneur').hide();
           $('#company_entrepreneur').hide();
           $('#jobtitle_investor').hide();
           $('#company_investor').hide();
           $('#jobtitle_freelancer').hide();
           $('#company_freelancer').hide();
           $('#course_of_study').hide();
           $('#school_name').hide();
           $('#previous_jobtitle').hide();
           $('#previous_employer').hide();
          
           var val = '1';
           var employment_status = {set_employment_status: val};
           $.ajax({
                type: 'POST',
             url: "<?php echo base_url(); ?>start/basic_profile",
             data: employment_status,
             success: function(response) {
              
             }
           });
         
           break;
   }

})

});

</script>

<link rel="stylesheet" href="../jqwidgets/styles/jqx.base.css" type="text/css" />
<script type="text/javascript" src="../jqwidgets/jqxcore.js"></script>
<script type="text/javascript" src="<? echo base_url();?>jqwidgets/jqxdata.js"></script>
<script type="text/javascript" src="<? echo base_url();?>jqwidgets/jqxinput.js"></script>

<script type="text/javascript">
            $(document).ready(function () {              
                var countries = new Array("Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burma", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic", "Congo, Republic of the", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Greenland", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Mongolia", "Morocco", "Monaco", "Mozambique", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Samoa", "San Marino", " Sao Tome", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe");
                $("#country").jqxInput({placeHolder: "Enter a Country", height: 20, width: 400, minLength: 1,  source: countries });
            });
        </script>


        
<script type="text/javascript">
            $(document).ready(function () {
                 //var url = "../sampledata/customers.txt";
                //var url = '<?php echo base_url(); ?>customers.txt';
                var url = 'http://localhost/neo4j-moviedb/web/lookup_companies';
                
                // prepare the data
                var source =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'profile_organiisation' }
                        
                        //{ name: 'CompanyName' },
                        //{ name: 'ContactName' }
                    ],
                    url: url
                };
                var dataAdapter = new $.jqx.dataAdapter(source);
                // Create a jqxInput
                $("#current_employer").jqxInput({ source: dataAdapter, placeHolder: "Country", displayMember: "profile_organiisation", valueMember: "capital", width: 400, height: 20});
                $("#current_employer").on('select', function (event) {
                    if (event.args) {
                        var item = event.args.item;
                        if (item) {
                            var valueelement = $("<div></div>");
                            valueelement.text("Value: " + item.value);
                            var labelelement = $("<div></div>");
                            labelelement.text("Label: " + item.label);
                            $("#selectionlog").children().remove();
                            
                        }
                    }
                });
            });
        </script>
        
        <script type="text/javascript">
            $(document).ready(function () {
                 //var url = "../sampledata/customers.txt";
                //var url = '<?php echo base_url(); ?>customers.txt';
                var url = 'http://localhost/neo4j-moviedb/web/lookup_companies';
                
                // prepare the data
                var source =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'profile_organiisation' }
                        
                        //{ name: 'CompanyName' },
                        //{ name: 'ContactName' }
                    ],
                    url: url
                };
                var dataAdapter = new $.jqx.dataAdapter(source);
                // Create a jqxInput
                $("#previous_employer").jqxInput({ source: dataAdapter, placeHolder: "Country", displayMember: "profile_organiisation", valueMember: "profile_organiisation", width: 400, height: 20});
                $("#previous_employer").on('text', function (event) {
                    if (event.args) {
                        var item = event.args.item;
                        if (item) {
                            var valueelement = $("<div></div>");
                            valueelement.text("Value: " + item.value);
                            var labelelement = $("<div></div>");
                            labelelement.text("Label: " + item.label);
                            $("#selectionlog").children().remove();
                            
                        }
                    }
                });
            });
        </script>

</body>
</html>
