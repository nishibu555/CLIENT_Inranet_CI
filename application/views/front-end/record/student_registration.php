<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>TCI-Intranet-Student-Proof</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/main.css">
</head>
<body style="background-color: #ffffff">
  <div class="container">
  	<div class="row justify-content-center registration-form">
  		<div class="col-md-7 col-sm-11"><!-- main -->

  			<div class="row" style="margin-top: 10px">
  				<div class="col reg_form_header">
  					<div class="reg_form_title">
  						<h2>Apply Here</h2>
  					</div>
  					<div class="reg_form_pagination">
  						<h5>go back<span>Page 1 out of 8</span></h5>
  					</div>
  				</div>
  			</div>

			<!-- this form will submit data to multiple table-->
  			<form method="post" action="<?php echo base_url().'save_registration_form1' ;?>">
  				<!-- student_info   -->
	  			<div class="row justify-content-center reg_from_content_row">
	  				<div class="col-md-12">
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label"><span>Personal Data</span></label>
						</div>    
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label"><span>*</span>First Name:</label>
						    <div class="col-sm-8">
						      <small style="color: red"><?php echo form_error('first_name'); ?></small>
						      <input type="text" class="form-control" name="first_name">
						    </div>
						</div>     
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">Middle Name:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" name="middle_name">
						    </div>
						</div>   
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label"><span>*</span>Last Name:</label>
						    <div class="col-sm-8">
						      <small style="color: red"><?php echo form_error('last_name'); ?></small>
						      <input type="text" class="form-control" name="last_name">
						    </div>
						</div>    
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label"><span>*</span>Address Line1:</label>
						    <div class="col-sm-8">
						      <small style="color: red"><?php echo form_error('address_line1'); ?></small>
						      <input type="text" class="form-control" name="address_line1">
						    </div>
						</div>     
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">Address Line2:</label>
						    <div class="col-sm-8">
						      <small style="color: red"><?php echo form_error('address_line2'); ?></small>
						      <input type="text" class="form-control" name="address_line2">
						    </div>
						</div>   
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label"><span>*</span>City:</label>
						    <div class="col-sm-8">
						      <small style="color: red"><?php echo form_error('city'); ?></small>
						      <input type="text" class="form-control" name="city">
						    </div>
						</div>   
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label"><span>*</span>State:</label>
						    <div class="col-sm-8">
						      <small style="color: red"><?php echo form_error('state'); ?></small>
						      <input type="text" class="form-control" name="state">
						    </div>
						</div>   
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label"><span>*</span>Zip:</label>
						    <div class="col-sm-8">
						      <small style="color: red"><?php echo form_error('zip_code'); ?></small>
						      <input type="text" class="form-control" name="zip_code">
						    </div>
						</div>   
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label"><span>*</span>Home Phone:</label>
						    <div class="col-sm-8">
						      <small style="color: red"><?php echo form_error('home_phone'); ?></small>
						      <input type="text" class="form-control" name="home_phone">
						    </div>
						</div>   
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">Work Phone:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" name="work_phone">
						    </div>
						</div>   
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">E-mail Address:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" name="email">
						    </div>
						</div>
	  				</div>
	  			</div><!-- end student_info   -->

                <!-- std_social_security  -->
	  			<div class="row justify-content-center reg_from_content_row">
	  				<div class="col-md-12">   
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label"><span>*</span>Social Security Number:</label>
						    <div class="col-sm-8">
						      <small style="color: red"><?php echo form_error('social_security_number'); ?></small>
						      <input type="text" class="form-control" name="social_security_number">
						    </div>
						</div>     
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label"><span>*</span>Date of Birth:</label>
						    <div class="col-sm-8">
						      <small style="color: red"><?php echo form_error('date_of_birth'); ?></small>
						      <input type="date" class="form-control" name="date_of_birth">
						    </div>
						</div>   
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">Driver's License State:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" name="drivers_license_state">
						    </div>
						</div>    
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">Driver's License Number:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" name="drivers_license_number">
						    </div>
						</div>     
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">Driver's License Status:</label>
						    <div class="col-sm-8">
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="drivers_license_status" value="valid">
									 <label class="form-check-label">
									    Valid
									 </label>
								</div>
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="drivers_license_status"  value="expired">
								    <label class="form-check-label">
								       Expired
								    </label>
								</div>
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="drivers_license_status"  value="suspended">
									 <label class="form-check-label">
									    Suspended
									 </label>
								</div>
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="drivers_license_status" value="never applied">
								    <label class="form-check-label">
								      Never Applied
								    </label>
								</div>
						    </div>
						</div>   
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">If Suspended, why?</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" name="suspended_reason">
						    </div>
						</div>  
	  				</div>
	  			</div><!-- end std_social_security  -->
				
				<!--std_appearance -->
	  			<div class="row justify-content-center reg_from_content_row">
	  				<div class="col-md-12">   
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">Height:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" name="hight">
						    </div>
						</div>     
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">Weight:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" name="weight">
						    </div>
						</div>   
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">Hair Color:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" name="hair_color">
						    </div>
						</div>    
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">Eye Color:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" name="eye_color">
						    </div>
						</div> 
					</div>	
	  			</div><!--std_appearance -->
               
               <!--std_ethnic_background -->
	  			<div class="row justify-content-center reg_from_content_row">
	  				<div class="col-md-12">      
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label"><span>*</span>Race/Ethnic Background:</label>
						    <div class="col-sm-8">
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="ethnic_background"  value="caucasian" checked>
									 <label class="form-check-label" for="exampleRadios1">
									     Caucasian
									 </label>
								</div>
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="ethnic_background" value="japanese">
								    <label class="form-check-label" for="exampleRadios2">
								       Japanese
								    </label>
								</div>
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="ethnic_background" value="haitian">
								    <label class="form-check-label" for="exampleRadios2">
								       Haitian
								    </label>
								</div>
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="ethnic_background" value="puerto rican">
								    <label class="form-check-label" for="exampleRadios2">
								       Puerto Rican
								    </label>
								</div>
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="ethnic_background" value="cuban">
								    <label class="form-check-label" for="exampleRadios2">
								        Cuban
								    </label>
								</div>
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="ethnic_background" value="filipino">
								    <label class="form-check-label" for="exampleRadios2">
								        Filipino
								    </label>
								</div>
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="ethnic_background" value="chinese">
								    <label class="form-check-label" for="exampleRadios2">
								        Chinese
								    </label>
								</div>
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="ethnic_background" value="asian">
								    <label class="form-check-label" for="exampleRadios2">
								        Asian
								    </label>
								</div>
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="ethnic_background" value="american indian">
								    <label class="form-check-label" for="exampleRadios2">
								        American Indian
								    </label>
								</div>
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="ethnic_background" value="african  indian">
								    <label class="form-check-label" for="exampleRadios2">
								        African  Indian
								    </label>
								</div>
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="ethnic_background" value="other">
								    <label class="form-check-label" for="exampleRadios2">
								        Other
								    </label>
								</div>
						    </div>
						</div> 
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">If Other, please specify</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" name="other_ethnic_background">
						    </div>
						</div>  
	  				</div>
	  			</div>

	  			<div class="row justify-content-center reg_from_content_row">
	  				<div class="col-md-12">      
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">Are you an American citizen?</label>
						    <div class="col-sm-8">
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="is_american_citizen"  value="1">
									 <label class="form-check-label" for="exampleRadios1">
									     Yes
									 </label>
								</div>
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="is_american_citizen" value="0">
								    <label class="form-check-label" for="exampleRadios2">
								       No
								    </label>
								</div>
						    </div>
						</div>       
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">If Yes, please specify</label>
						    <div class="col-sm-8">
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="american_citizen_type" value="native" checked>
									 <label class="form-check-label" for="exampleRadios1">
									     Native
									 </label>
								</div>
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="american_citizen_type" value="naturalized">
								    <label class="form-check-label" for="exampleRadios2">
								        Naturalized
								    </label>
								</div>
						    </div>
						</div>   
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">If No, I am a citizen of</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" name="other_citizenship">
						    </div>
						</div>  
	  				</div>
	  			</div><!--std_ethnic_background -->

	  			<div class="row justify-content-center reg_from_content_row">
	  				<div class="col-md-12">
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label"><span>Emergency Contact</span></label>
						</div>    
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label"><span>*</span>Name:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control">
						    </div>
						</div>    
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label"><span>*</span>Address Line1:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control">
						    </div>
						</div>     
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">Address Line2:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control">
						    </div>
						</div>   
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label"><span>*</span>City:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control">
						    </div>
						</div>   
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label"><span>*</span>State:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control">
						    </div>
						</div>   
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label"><span>*</span>Zip:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control">
						    </div>
						</div>   
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label"><span>*</span>Home Phone:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control">
						    </div>
						</div>   
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">Work Phone:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control">
						    </div>
						</div>   
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label"><span>*</span>Relationship to Student:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control">
						    </div>
						</div>
	  				</div>
	  			</div>

	  			<div class="row justify-content-center reg_from_content_row">
	  				<div class="col-md-12">
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label"><span>Who Referred You?</span></label>
						</div>    
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">Name:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control">
						    </div>
						</div>    
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">Address Line1:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control">
						    </div>
						</div>     
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">Address Line2:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control">
						    </div>
						</div>   
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">City:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control">
						    </div>
						</div>   
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">State:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control">
						    </div>
						</div>   
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">Zip:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control">
						    </div>
						</div>   
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">Home Phone:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control">
						    </div>
						</div>   
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">Work Phone:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control">
						    </div>
						</div>   
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label">Relationship to Student:</label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control">
						    </div>
						</div>
	  				</div>
	  			</div>

	  			<div class="row justify-content-center reg_from_content_row_last">
	  				<div class="col-md-12">
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label"><span>Personality Information</span></label>
						</div>    
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label"><span>*</span>Is it easy for you to express your feelings?</label>
						    <div class="col-sm-8">
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="exampleRadios"  value="option1" checked>
									 <label class="form-check-label" for="exampleRadios1">
									     Yes
									 </label>
								</div>
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
								    <label class="form-check-label" for="exampleRadios2">
								        No
								    </label>
								</div>
						    </div>
						</div>     
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label"><span>*</span>Explain:</label>
						    <div class="col-sm-8">
						     <textarea class="form-control" rows="3" ></textarea>
						    </div>
						</div>    
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label"><span>*</span>Do you enjoy being with other people or would you rather be alone?</label>
						    <div class="col-sm-8">
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="exampleRadios" value="option1" checked>
									 <label class="form-check-label" for="exampleRadios1">
									     Yes
									 </label>
								</div>
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
								    <label class="form-check-label" for="exampleRadios2">
								        No
								    </label>
								</div>
						    </div>
						</div>    
						<div class="form-group row">
						    <label class="col-sm-4 col-form-label"><span>*</span>Explain:</label>
						    <div class="col-sm-8">
						     <textarea class="form-control" rows="3" ></textarea>
						    </div>
						</div>

	  					<div class="reg_form_submit_div">
	  						<button type="submit" class="reg_form_submit_button">save<span>and</span>continue</button>
	  					</div>
	  				</div>
	  			</div>
			</form><!-- this form will submit data to table:  -->
            
            <div class="row reg_form_footer">
            	<div class="col">
            		<div>
            			<a href="">Clear Entire Application</a>
            		</div>
            	</div>
            </div>
  		</div> <!-- main -->
  	</div>
  </div>
</body>
</html>