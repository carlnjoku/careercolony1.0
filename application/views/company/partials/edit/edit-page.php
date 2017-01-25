<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>cropit/dist/jquery.cropit.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>overlay-loader/loadingoverlay.min.js"></script>

    <style>
      .cropit-preview {
        background: url('../company-avatar.png') no-repeat;
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 150px;
        height: 150px;
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

		
		
<script>
      $(function() {
        $('.image-editor').cropit();
        
 
        $('form').submit(function() {
          // Move cropped image data to hidden input
		  
          var imageData = $('.image-editor').cropit('export',{quality:0.66});
          $('.hidden-image-data').val(imageData);
			
          // Print HTTP request params
          var formValue = $(this).serialize();
          
			$.ajax({
			   type: 'post',
			   data: formValue,
			   url: '<?php echo base_url();?>company/editCompany',
			   beforeSend: function(){
             		$("#element").LoadingOverlay("show");
        		},
			   success: function(data){
			   		var data = $.parseJSON(data);//parse JSON
          	  		var coyID = data.coyID;
         			var status = data.status;
          			if(status === '0') {
              		
              		$("#error").fadeIn('3000');
          				}else{
          			}
              
              		$("#element").LoadingOverlay("hide", true);
			   
			   		$('#result-data').text('New file in: images/'+data);
			   		$('#crop').show();
			  }
		
		 });		  
 
          // Prevent the form from actually submitting
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
				<div class="col-md-12">
				
							
					<div class="widget innerAll  ">
					<h5 class="strong" style="margin-bottom:15px">Update Company</h5>
					
					<a class = "pull-right text-info" style="margin-top:-30px; text-decoration:none;" href="#"><i class="fa fa-eye"></i> Preview Page</a>
					
					<hr>	
					


		<div class="widget-body">
		
			<!-- Row -->
			<div class="row">
			
				<!-- Column -->
				<div class="col-md-12" id="element">
			<form action="#" class="form-horizontal">
			<input class="form-control" id="user_id" name="user_id" value="<?php echo $user_id;?>" type="hidden" />
			<input class="form-control" id="coyID" name="coyID" value="<?php echo $coyID; ?>" type="hidden" />
			
				<div class="row">
					<div class="col-md-3" style="margin-top:-15px">
					<h5 class="strong">Change Logo</h5>
      					<div class="image-editor">
       						<input type="file" id="upload-photo" class="cropit-image-input">
        					<div class="cropit-preview"><img src="<?php echo base_url();?>uploads/<?php echo $logo; ?>"></div>
        					<div class="image-size-label">Resize logo</div>
        					<input type="range" class="cropit-image-zoom-input">
        					<input type="hidden" name="image-data" class="hidden-image-data" />
        				</div>
        				
        			</div>
        			
				
				
					<div class="col-md-9">
					
						<div class="bg-gray innerAll" style="margin-top:8px">
							<div class="row">
			
								<!-- Column -->
								<div class="col-md-12">
									<div id="newsletter_topics">
										<h5 class="strong text-warning"><i class="fa fa-warning"></i> Important</h5>
									
										Allowed image file types are JPEG, GIF, or PNG file.<br>
										Image must be 300x300 pixels or larger. (File size limit is 4 MB).
										<p>&nbsp;&nbsp;</p>
										 <label for="upload-photo" class="btn btn-block btn-success btn-icon glyphicons upload" style="width:140px"><i></i> Select Image</label>
									</div>
								</div>
								<!-- // Column END -->
					
							</div>
							<!-- // Row END -->	
						</div>
					</div>
			   
			   </div>
			  
			  
			  
				
				<hr>
				
				
					
					<!-- Group -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="firstname">About Company</label>
						<div class="col-md-8">
							<textarea placeholder="Not less than 100 characters ....." id="companydescription" name="companydescription" class="wysihtml5 form-control"  rows="5" onKeyDown="limitText(this.form.companydescription,this.form.countdown,1500);"  onKeyUp="limitText(this.form.companydescription,this.form.countdown,1500);"><?php echo $companydescription; ?></textarea>
							<font size="1" >You have <input  readonly type="text" style="border:none; font-size:11px; width:90px; " name="countdown" value="1500"> characters left.</font>
						</div>
					</div>
					<!-- // Group END -->
					
					<!-- Group -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="Company">Company Name</label>
						<div class="col-md-6"><input class="form-control" id="companyname" name="companyname" value="<?php echo $companyname; ?>" type="text" /></div>
					</div>
					<!-- // Group END -->
					
					<!-- Group -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="companyemail">Company E-Mail</label>
						<div class="col-md-6"><input class="form-control" id="companyemail" name="companyemail" value="<?php echo $companyemail; ?>" type="text" /></div>
					</div>
					<!-- // Group END -->
					
					
					
				<!-- Group -->
					<div class="form-group">
						<label class="col-md-3 control-label">Company Type</label>
						<div class="col-md-6">
							
								<select class="form-control" id="companytype" name="companytype" >
								<option><?php echo $companytype; ?></option>
								
                           <?php if(isset($query2)) : foreach($query2 as $key => $rows) : ?>
                          <?php
							$ctID = $rows->ctID;
							$type_name = $rows->type_name;
							?>
                          <option value="<?php echo $type_name; ?>"><?php echo $type_name; ?></option>
                          <?php endforeach ; ?>
							<?php else :?>
							<h3> No industry selected </h3>
					    <?php endif; ?>
							</select>
							
						</div>
					</div>
					<!-- // Group END -->	
					
					<!-- Group -->
					<div class="form-group">
						<label class="col-md-3 control-label">Industry</label>
						<div class="col-md-6">
							<select class="form-control" name="industry" id="industry">
								<option><?php echo $industry; ?></option>
                           <?php if(isset($query1)) : foreach($query1 as $key => $rows) : ?>
                          <?php
							$inID = $rows->inID;
							$industry_name = $rows->industry_name;
							?>
                          <option value="<?php echo $inID; ?>"><?php echo $industry_name; ?></option>
                          <?php endforeach ; ?>
							<?php else :?>
							<h3> No industry selected </h3>
					    <?php endif; ?>
							</select>
						</div>
					</div>
					<!-- // Group END -->	
					
					<!-- Group -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="founded">Year Founded</label>
						<div class="col-md-2"><input class="form-control" id="founded" name="founded" value="<?php echo $founded; ?>" type="text" /></div>
					</div>
					<!-- // Group END -->
					
					<!-- Group -->
					<div class="form-group">
						<label class="col-md-3 control-label">Company Size</label>
						<div class="col-md-6">
							<select class="form-control" name="coysize" id="coysize">
								<option><?php //echo $coysize; ?></option>
								<option value="0">1-10</option>
								<option value="50">11-50</option>
								<option value="51-100"> 51-100</option>
								<option value="101-500">101-500</option>
								<option value="501-1500">501-1500</option>
								<option value="1501 & Above">1501 & Above</option>
							</select>
						</div>
					</div>
					<!-- // Group END -->	
					
					<!-- Group -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="website">Company Website</label>
						<div class="col-md-6"><input class="form-control" id="website" name="website" value="<?php echo $website; ?>" type="text" /></div>
					</div>
					<!-- // Group END -->	
					
					<!-- Group -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="address">Address</label>
						<div class="col-md-6"><input class="form-control" id="address" name="address" value="<?php echo $address; ?>" type="text" /></div>
					</div>
					<!-- // Group END -->	
					
					<!-- Group -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="lastname">City</label>
						<div class="col-md-6"><input class="form-control" id="city" name="city" value="<?php echo $city; ?>" type="text" /></div>
					</div>
					<!-- // Group END -->	
					
					<!-- Group -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="lastname">State</label>
						<div class="col-md-6"><input type="text" class="form-control" id="state" name="state" value="<?php echo $state; ?>" autocomplete="off" /></div>
					</div>
					<!-- // Group END -->	
					
					<!-- Group -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="lastname">Country</label>
						<div class="col-md-6"><input type="text" class="form-control" id="country" name="country" value="<?php echo $country; ?>" autocomplete="off" /></div>
					</div>
					<!-- // Group END -->	
						
					
					
				</div>
				<!-- // Column END -->
				
				
				
			</div>
			<!-- // Row END -->
			
			

			<div class="separator"></div>
			
			<!-- Form actions -->
			<div class="form-actions">
				
				<input type="submit" class="btn btn-primary" id="submit" class="next button" value="Continue">
				<button type="button" class="btn btn-default"><i class="fa fa-times"></i> Cancel</button>
			</div>
			<!-- // Form actions END -->
		</form>
		</div>
				
				
					</div>


				</div>
				<!-- // One Fourth Column END -->


				


<link rel="stylesheet" href="../jqwidgets/styles/jqx.base.css" type="text/css" />
<script type="text/javascript" src="../jqwidgets/jqxcore.js"></script>
<script type="text/javascript" src="<? echo base_url();?>jqwidgets/jqxdata.js"></script>
<script type="text/javascript" src="<? echo base_url();?>jqwidgets/jqxinput.js"></script>

<script type="text/javascript">
            $(document).ready(function () {              
                var countries = new Array("Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burma", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic", "Congo, Republic of the", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Greenland", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Mongolia", "Morocco", "Monaco", "Mozambique", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Samoa", "San Marino", " Sao Tome", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe");
                $("#country").jqxInput({placeHolder: "Enter a Country", minLength: 1,  source: countries });
            });
        </script>



		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script><script type="text/javascript">
                    $(function() {

                        $("#anc_chk_now").click(function() {
                            var email = $("#email").val();
                            if (email != '') {

                                $.post('emailcheck.php', {email: email}, function(d) {
                                    $("#res").html(d);
                                });
                            }
                        });
                    });

                
</script>