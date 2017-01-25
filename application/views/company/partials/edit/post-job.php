
<!-- One Fourth Column -->
				<div class="col-md-12">
				
				
				
				
					<div class="widget innerAll  ">
					<h5 class="strong" style="margin-bottom:15px">Post a new job</h5>
					
					<hr>	
					

Company Pages offer public information about each company on <b>Careercolony</b>. 
To add a Company Page, please enter the company name and your 
email address at this company. Only current employees are eligible to create a Company Page.

				<!-- Alert -->
				<div class="alert alert-danger" id="error" style="display:none">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Oops!!!</strong> It seems you have entered an invalid input please check and try again.
				</div>
				<!-- // Alert END -->

							<div class="widget-body">
		
			<!-- Row -->
			<div class="row">
			
			
			
				<!-- Column -->
				<div class="col-md-12" id="element">
				<form id="create_company" action="#" method="post" class="form-horizontal">
				<input class="form-control" id="user_id" name="user_id" value="<?php echo $user_id;?>" type="hidden" />
				
				<input class="form-control" id="founded" name="founded" value="0" type="hidden" />
				<input class="form-control" id="website" name="website" value="" type="hidden" />
				<input class="form-control" id="logo" name="logo" value="" type="hidden" />
				<input class="form-control" id="address" name="address" value="" type="hidden" />
				<input class="form-control" id="city" name="city" value="" type="hidden" />
				<input class="form-control" id="state" name="state" value="" type="hidden" />
				<input class="form-control" id="country" name="country" value="" type="hidden" />
				<input class="form-control" id="companydescription" name="companydescription" value="" type="hidden" />
				<input class="form-control" id="companysize" name="companysize" value="" type="hidden" />
				
	
				
					<!-- Group -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="companyname">Company</label>
						<div class="col-md-6"><input class="form-control" id="companyname" name="companyname" value="" type="text" /></div>
					</div>
					<!-- // Group END -->
					
					<!-- Group -->
					<div class="form-group">
						<label class="col-md-3 control-label" for="companyemail">Company E-Mail</label>
						<div class="col-md-6"><input class="form-control" id="companyemail" name="companyemail" type="text" /></div>
					</div>
					<!-- // Group END -->
					
				<!-- Group -->
					<div class="form-group">
						<label class="col-md-3 control-label">Company Type</label>
						<div class="col-md-6">
							<select class="form-control" id="companytype" name="companytype" >
								<option value="">Select Company Type</option>
                           <?php if(isset($companyType)) : foreach($companyType as $key => $rows) : ?>
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
					<input class="form-control" id="city" name="city" value="" type="hidden" />
					
					
					<!-- Group -->
					<div class="form-group">
						<label class="col-md-3 control-label">Industry</label>
						<div class="col-md-6">
							<select class="form-control" name="industry" id="industry">
								<option value="">Select Industry</option>
                           <?php if(isset($industry)) : foreach($industry as $key => $rows) : ?>
                          <?php
							$inID = $rows->inID;
							$industry_name = $rows->industry_name;
							?>
                          <option value="<?php echo  $industry_name; ?>"><?php echo $industry_name; ?></option>
                          <?php endforeach ; ?>
							<?php else :?>
							<h3> No industry selected </h3>
					    <?php endif; ?>
							</select>
						</div>
					</div>
					<!-- // Group END -->					
					
					
				</div>
				<!-- // Column END -->
				
				
				
			</div>
			<!-- // Row END -->
			
			<!-- Row -->
			<div class="bg-gray innerAll">
				<div class="row">
			
					
					
					<!-- Column -->
					<div class="col-md-12">
						<div id="newsletter_topics">
							<h5><i class="fa fa-warning text-warning"></i> <b>Important</b></h5>
							<p>By clicking on the continue button, you verify that you are a representative of this company.</p>
							
							
						</div>
					</div>
					<!-- // Column END -->
					
				</div>
				<!-- // Row END -->	
			</div>

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

                <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

