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
		
           var cookieName = "57af975bc978ac965ad5d7cd6c8b8edc";
		   index = document.cookie.indexOf(cookieName);
	       if (index != -1)
	       {
		      namestart = (document.cookie.indexOf("=", index) + 1);
			  nameend = document.cookie.indexOf(";", index);
		   	  if (nameend == -1) {nameend = document.cookie.length;}
			 		CookieValue = document.cookie.substring(namestart, nameend);
		    		alert(CookieValue);
		
		       var cookie = CookieValue;
			}  
	
        
          var loadUrl = "<?php echo base_url(); ?>page/ajax_result";
          var ajax_load = "<span<img src='<?php echo base_url(); ?>ajax-loader.gif' alt='loading....' /></span>";
          var ajax_load_error = '<div class="alert alert-danger">User already exist click here to <a href="">login</a></div>';
          var res = "#step_1";
          var form_data = $(res).serialize();
        
        
          $.ajax({
          type : 'POST',
          url  : 'http://localhost/neo4j-moviedb/web/signup_step1/'+cookie,
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

<script>
$(document).ready(function()
{
    $(document).on('submit', '#step_2', function()
  {
  
  		  var cookieName = "57af975bc978ac965ad5d7cd6c8b8edc";
	  	  index = document.cookie.indexOf(cookieName);
	      if (index != -1)
	       {
		      namestart = (document.cookie.indexOf("=", index) + 1);
			  nameend = document.cookie.indexOf(";", index);
		   	  if (nameend == -1) {nameend = document.cookie.length;}
			 		CookieValue = document.cookie.substring(namestart, nameend);
		    		alert(CookieValue);
		
		       var cookie = CookieValue;
		}  
  
  		var loadUrl = "<?php echo base_url(); ?>page/ajax_result";
  		var ajax_load = "<span<img src='<?php echo base_url(); ?>ajax-loader.gif' alt='loading....' /></span>";
  		var ajax_load_error = '<div class="alert alert-danger">User already exist click here to <a href="">login</a></div>';
  		var res = "#step_2";
  		var employment_status = "<?php echo $employment_status; ?>";
  		var form_data = $(res).serialize();

      $.ajax({
      type : 'POST',
      url  : 'http://localhost/neo4j-moviedb/web/signup_step2/'+cookie,
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

<script>
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","http://localhost/neo4j-moviedb/web/getuser_by_name/"+str,true);
  xmlhttp.send();
}
</script>

  <link rel="stylesheet" href="../jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="../jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<? echo base_url();?>jqwidgets/jqxdata.js"></script>
<script type="text/javascript" src="<? echo base_url();?>jqwidgets/jqxinput.js"></script>



<body>
<img src="<?php echo base_url(); ?>logo.png" style="position:absolute; top:40px; left:42%">



    <div id="multistepform-example-container">

    <p style="margin-bottom:50px"></p>
                <ul id="multistepform-progressbar">
                    <li class="active">Account Setup</li>
                    <li>Social Profiles</li>
                    <li>Personal Details</li>
                </ul>
                <div class="form">
                    <form id="step_1">
                    
                    <span id="error" style="display:none;color:FFFFFF; font-size:13px; position:relative; top:-8px"> <i class="fa fa-user"></i> <?php echo $this->lang->line("error_msg_email"); ?></span>

                    <h2 class="fs-title">Create your account</h2>
                        <h3 class="fs-subtitle"><?php echo $this->lang->line("signup_wizard_intro_step1"); ?></h3>
                        
                        
                      
                       <input type="text" name="user_id" id="user_id" value="<?php echo $user_id; ?>" >
                       <select name="country" id="country" >
                                <option value="Nigeria">Nigeria</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="france">France</option>
                                <option value="South Africa">South Africa</option>
                                <option value="United States">United States</option>
                                <option value="Germany">Germany</option>
                                <option value="Spain">Spain</option>
                                <option value="Italy">Italy</option>
                                <option value="Greece">Greece</option>
                                <option value="Ghana">Ghana</option>
                        </select>
                     
                       <select name="employment_status" id="employment_status" class="form-control">
                                <option value="0"><?php echo $this->lang->line("employ_status"); ?></option>
                                <option value="employed">I'm Employed</option>
                                <option value="unemployed">I'm Unemployed</option>
                                <option value="freelancer">I'm a Freelancer</option>
                                <option value="entrepreneur">Entrepreneur<o/ption>
                                <option value="student">I'm a Student</option>
                                <option value="investor">I'm An Investor</option>
                              
                        </select>
                      
                      
                        <input type="text" name="postal_code" id="postal_code" placeholder="<?php echo $this->lang->line("postalcode"); ?>">
                       <input id="jqxInput" />
        <br />
        <label style="font-family: Verdana; font-size: 10px;">ex: Ana</label>
         <div style="font-family: Verdana; font-size: 13px;" id='selectionlog'>
        </div>
                      
                        <input type="submit"  id="submit"  class="next button" value="Next">
			</form>
		</div>
		
		
		
		<div class="form">
         <?php echo $employment_status; ?>
                    <form action="#" method="post" id="step_2">
                        <h2 class="fs-title">Social Profiles</h2>
                        <h3 class="fs-subtitle"><?php echo $this->lang->line("signup_wizard_intro_step2"); ?></h3>
                      
                        <input type="text" name="user_id" id="user_id" value="<?php echo $user_id; ?>" >
                      
                        <input type="text" style="display:none" name="current_jobtitle" id="current_jobtitle" placeholder="<?php echo $this->lang->line("current_jobtitle"); ?>">
                        <input type="text" class="search" id="current_employer" style="display:none" name="current_employer" id="current_employer" placeholder="<?php echo $this->lang->line("current_employer"); ?>">
                       
                        <input type="text" style="display:none" name="previous_jobtitle" id="previous_jobtitle" placeholder="<?php echo $this->lang->line("previous_jobtitle"); ?>">
                        <input type="text" style="display:none" name="previous_employer" id="previous_employer" placeholder="<?php echo $this->lang->line("previous_employer"); ?>">
                        
                        <input type="text" style="display:none" name="jobtitle_entrepreneur " id="jobtitle_entrepreneur" placeholder="<?php echo $this->lang->line("jobtitle_entrepreneur"); ?>">
                        <input type="text" style="display:none" name="company_entrepreneur" id="company_entrepreneur" placeholder="<?php echo $this->lang->line("company_entrepreneur"); ?>">
                        
                      
                        <input type="text" style="display:none" name="jobtitle_freelancer" id="jobtitle_freelancer" placeholder="<?php echo $this->lang->line("jobtitle_freelancer"); ?>">
                        <input type="text" style="display:none" name="company_freelancer" id="company_freelancer" placeholder="<?php echo $this->lang->line("company_freelancer"); ?>">
                      
                        <input type="text" style="display:none" name="jobtitle_investor " id="jobtitle_investor" placeholder="<?php echo $this->lang->line("jobtitle_investor"); ?>">
                        <input type="text" style="display:none" name="company_investor" id="company_investor" placeholder="<?php echo $this->lang->line("company_investor"); ?>">
                      
                        <input type="text" style="display:none" name="course_of_study" id="course_of_study" placeholder="<?php echo $this->lang->line("course_of_study"); ?>">
                        <input type="text" style="display:none" name="school_name" id="school_name" placeholder="<?php echo $this->lang->line("school_name"); ?>">
                     
                      
                        <select name="dbType" id="dbType" style="display:none">
                                <option value="10">Architecture and planning</option>
                                <option value="30000">Automotive and vehicle manufacturing</option>
                                <option value="120000">Banking and financial services</option>
                                <option value="160000">Consulting</option>
                                <option value="60000">Energy, water and environment</option>
                                <option value="200000">Education and science</option>
                                <option value="210000">Health and social</option>
                                <option value="140000">Real Estate</option>
                                <option value="40000">Industry and mechanical engineering</option>
                                <option value="90000">Internet and IT</option>
                                <option value="20000">Consumer goods and trade</option>
                                <option value="220000">Art, culture and sport</option>
                                <option value="170000">Marketing, PR and design</option>
                                <option value="110000">Media and publishing</option>
                                <option value="190000">Civil service, associations and institutions</option>
                                <option value="180000">HR services</option>
                                <option value="50000">Medical services</option>
                                <option value="100000">Telecommunication</option>
                                <option value="80000">Tourism and food service</option>
                                <option value="70000">Transport and logistics</option>
                                <option value="130000">Insurance</option>
                                <option value="150000">Auditing, tax and law</option>
                                <option value="230000">Other</option>
                              
                        </select>
                        <input type="button" name="previous" class="previous button" value="<?php echo $this->lang->line("step2_previous_button"); ?>">
                        <input type="submit" name="submit" id="submit" class="next button" value="<?php echo $this->lang->line("step2_next_button"); ?>">
                    </form>
            </div>
            
            <div class="form">
                    <form action="#" method="post" id="step_3">
                        <h2 class="fs-title">Connections</h2>
                        <h3 class="fs-subtitle">Connect with your friends already on Careercolony</h3>
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>" >
                        <input type="text" name="email" id="email" value="" placeholder="<?php echo $this->uri->segment(3); ?>">
                        
                        <input type="button" name="previous" class="previous button" value="Previous">
                        <input type="submit" name="submit" id="submit" class="next button" value="Finish">
            </form>
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

<script type="text/javascript">
            $(document).ready(function () {
                 //var url = "../sampledata/customers.txt";
                //var url = '<?php echo base_url(); ?>customers.txt';
                var url = '<?php echo base_url(); ?>testanything/process_testdrop';
                
                // prepare the data
                var source =
                {
                    datatype: "json",
                    datafields: [
                        { name: 'name' },
                        { name: 'capital' }
                        //{ name: 'CompanyName' },
                        //{ name: 'ContactName' }
                    ],
                    url: url
                };
                var dataAdapter = new $.jqx.dataAdapter(source);
                // Create a jqxInput
                $("#jqxInput").jqxInput({ source: dataAdapter, placeHolder: "Country", displayMember: "name", valueMember: "capital", width: 200, height: 25});
                $("#jqxInput").on('select', function (event) {
                    if (event.args) {
                        var item = event.args.item;
                        if (item) {
                            var valueelement = $("<div></div>");
                            valueelement.text("Value: " + item.value);
                            var labelelement = $("<div></div>");
                            labelelement.text("Label: " + item.label);
                            $("#selectionlog").children().remove();
                            $("#selectionlog").append(labelelement);
                            $("#selectionlog").append(valueelement);
                        }
                    }
                });
            });
        </script>
        




</body>
</html>