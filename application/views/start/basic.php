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

<link rel="stylesheet" href="<?php echo base_url(); ?>multi-step-form/css/reset.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>multi-step-form/css/style.css">
 
<script>
$("#button_1, #button_2").on("click", function(e) {
    e.preventDefault();
    $.ajax({type: "POST",
        url: "pages/test/",
        data: { id: $(this).val(), access_token: $("#access_token").val() },
        success:function(result) {
          alert('ok');
        },
        error:function(result) {
          alert('error');
        }
    });
});
</script>

<form>
<button id="button_1" value="val_1" name="but1">button 1</button>
<button id="button_2" value="val_2" name="but2">button 2</button>

</form>

<!-- multistep form -->

<div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>
<form id="msform">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Account Setup</li>
    <li>Social Profiles</li>
    <li>Personal Details</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Create your account</h2>
    <h3 class="fs-subtitle">This is step 1</h3>
    <input type="text" id="countryInput" name="countryInput" placeholder="Country" />
    <input type="text" name="email" placeholder="Email" />
    <input type="password" name="pass" placeholder="Password" />
    <input type="password" name="cpass" placeholder="Confirm Password" />
    <input type="button" name="next" id="me" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Social Profiles</h2>
    <h3 class="fs-subtitle">Your presence on the social network</h3>
    <input type="text" name="twitter" placeholder="Twitter" />
    <input type="text" name="facebook" placeholder="Facebook" />
    <input type="text" name="gplus" placeholder="Google Plus" />
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" id="button_1" name="next" class="next action-button" value="Next" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Personal Details</h2>
    <h3 class="fs-subtitle">We will never sell it</h3>
    <input type="text" name="fname" placeholder="First Name" />
    <input type="text" name="lname" placeholder="Last Name" />
    <input type="text" name="phone" placeholder="Phone" />
    <textarea name="address" placeholder="Address"></textarea>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="submit" class="submit action-button" value="Submit" />
  </fieldset>
</form>


    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>



        <script src="<?php echo base_url(); ?>multi-step-form/js/index.js"></script>
        
        <link rel="stylesheet" href="../jqwidgets/styles/jqx.base.css" type="text/css" />
		<script type="text/javascript" src="../jqwidgets/jqxcore.js"></script>
    	<script type="text/javascript" src="<? echo base_url();?>jqwidgets/jqxdata.js"></script>
		<script type="text/javascript" src="<? echo base_url();?>jqwidgets/jqxinput.js"></script>       

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
                $("#countryInput").jqxInput({ source: dataAdapter, placeHolder: "Country", displayMember: "name", valueMember: "capital", width: 400, height: 20});
                $("#countryInput").on('select', function (event) {
                    if (event.args) {
                        var item = event.args.item;
                        
                    }
                });
            });
        </script>



</head>
<body>

 

