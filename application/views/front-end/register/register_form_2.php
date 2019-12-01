
    <div class="row justify-content-center registration-form">
    
        <div class="col-md-12"><!-- main -->
            <form method="post" action="#" id="register_form_2" name="reg_form2">

                <!-- std_family_member-->
                <div class="row justify-content-center reg_form_content_row">
                    <div class="col-md-12 family_member_section">
                        <div class="form-group row">
                            <label class="col-sm-4"><span>Personal Family History</span></label>
                        </div>
                        <div class="row justify-content-center">
                        	<div class="col-sm-6 col-md-7  form_hint">
                        		<p>Parents/parenting figures, spouse, girl/boyfriend,brothers & sisters (do not list your children)</p>
                        	</div>
                        </div>
	                    <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><span>*</span>Name:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="member_name[0]" required>
                                <span class="validation_error"></span> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><span>*</span>Relationship:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="member_relationship[0]" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><span>*</span>Age:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="member_age[0]" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Residence:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="member_residence[0]">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 family_member_section">
	                    <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="member_name[1]">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Relationship:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="member_relationship[1]">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Age:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="member_age[1]">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Residence:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="member_residence[1]">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 family_member_section">
	                    <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="member_name[2]">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Relationship:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="member_relationship[2]">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Age:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="member_age[2]">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Residence:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="member_residence[2]">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 family_member_section">
	                    <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="member_name[3]">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Relationship:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="member_relationship[3]">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Age:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="member_age[3]">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Residence:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="member_residence[3]">
                            </div>
                        </div>
                    </div>
                </div><!-- std_family_member-->

				<!-- std_family_history-->
                <div class="row justify-content-center reg_form_content_row_last">
	  				<div class="col-md-12"> 
						<div class="form-group row">
						    <label class="col-sm-3 col-form-label"><span>*</span>How would you describe your relationship with your parents as a child?:</label>
						    <div class="col-sm-6">
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="relationship_as_child" value="very good" required="required"  minlength="1" >
									 <label class="form-check-label" >
									    Very Good
									 </label>
								</div>
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="relationship_as_child"  value="good">
								    <label class="form-check-label">
								        Good
								    </label>
								</div>
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="relationship_as_child" value="average">
									 <label class="form-check-label">
									     Average
									 </label>
								</div>
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="relationship_as_child"  value="fair">
								    <label class="form-check-label">
								         Fair
								    </label>
								</div>
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="relationship_as_child"  value="poor">
								    <label class="form-check-label">
								          Poor
								    </label>
								</div>
								<br><span class="relationship_as_child"></span>
						    </div>
						</div>     
						<div class="form-group row">
						    <label class="col-sm-3 col-form-label"><span>*</span>How would you describe your relationship with your parents at the present?:</label>
						    <div class="col-sm-6">
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="relationship_at_present" value="very good" required="required" minlength="1">
									 <label class="form-check-label">
									    Very Good
									 </label>
								</div>
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="relationship_at_present"  value="good">
								    <label class="form-check-label">
								        Good
								    </label>
								</div>
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="relationship_at_present" value="average">
									 <label class="form-check-label">
									     Average
									 </label>
								</div>
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="relationship_at_present"  value="fair">
								    <label class="form-check-label">
								         Fair
								    </label>
								</div>
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="relationship_at_present"  value="poor">
								    <label class="form-check-label">
								          Poor
								    </label>
								</div>
								<br><span class="relationship_at_present"></span>
						    </div>
						</div>   
						<div class="form-group row">
						    <label class="col-sm-3 col-form-label"><span>*</span>Fathers Name:</label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control" name="fathers_name" required>
							<span class="fathers_name"></span>
						    </div>
						</div>    
						<div class="form-group row">
						    <label class="col-sm-3 col-form-label"><span>*</span>Mothers Name:</label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control" name="mothers_name" required>
							<span class="mothers_name"></span>
						    </div>
						</div>    
						<div class="form-group row">
						    <label class="col-sm-3 col-form-label"><span>*</span>Is your father still living?:</label>
						    <div class="col-sm-6">
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="is_father_living"  value="1" required="required"  minlength="1" >
								    <label class="form-check-label">
								        Yes
								    </label>
								</div>
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="is_father_living" value="0">
									 <label class="form-check-label">
									     No
									 </label>
								</div>
							<br><span class="is_father_living"></span>
						    </div>
						</div>  
						<div class="form-group row">
						    <label class="col-sm-3 col-form-label">If yes, father's age:</label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control" name="fathers_age">
						    </div>
						</div>     
						<div class="form-group row">
						    <label class="col-sm-3 col-form-label"><span>*</span>Is your mother still living?:</label>
						    <div class="col-sm-6">
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="is_mother_living"  value="1" required="required"  minlength="1" >
								    <label class="form-check-label">
								        Yes
								    </label>
								</div>
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="is_mother_living" value="0">
									 <label class="form-check-label">
									     No
									 </label>
								</div>
							<br><span class="is_mother_living"></span>
						    </div>
						</div>   
						<div class="form-group row">
						    <label class="col-sm-3 col-form-label">If yes, mother's age:</label>
						    <div class="col-sm-6">
						      <input type="text" class="form-control" name="mothers_age">
						    </div>
						</div>   

						<div class="form-group row">
						    <label class="col-sm-3 col-form-label"><span>*</span>Parents' Marital Status:</label>
						    <div class="col-sm-6">
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="parents_marital_status"  value="married" required="required"  minlength="1" >
								    <label class="form-check-label">
								         Married
								    </label>
								</div>
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="parents_marital_status" value="divorced">
									 <label class="form-check-label">
									      Divorced
									 </label>
								</div>
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="parents_marital_status" value="living together">
									 <label class="form-check-label">
									     Living Together
									 </label>
								</div>
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="parents_marital_status" value="remarried">
									 <label class="form-check-label">
									      Remarried
									 </label>
								</div>
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="parents_marital_status" value="separated">
									 <label class="form-check-label">
									     Separated 
									 </label>
								</div>
							<br><span class="parents_marital_status"></span>
						    </div>
						</div>
						<div class="form-group row">
						    <label class="col-sm-3 col-form-label">If married, how long?</label>
						    <div class="col-sm-6">
						    	<input type="text" class="form-control" name="if_married_duration">
						    </div>
						</div>
						<div class="form-group row">
						    <label class="col-sm-3 col-form-label">If not married, how long?</label>
						    <div class="col-sm-6">
						    	<input type="text" class="form-control" name="not_married_duration">
						    </div>
						</div>
						<div class="form-group row">
						    <label class="col-sm-3 col-form-label">How would you rate their marriage?</label>
						    <div class="col-sm-6">
								<div class="form-check form-check-inline">
								    <input class="form-check-input" type="radio" name="marriage_rating"  value="very happy">
								    <label class="form-check-label">
								         Very Happy
								    </label>
								</div>
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="marriage_rating" value="happy">
									 <label class="form-check-label">
									       Happy
									 </label>
								</div>
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="marriage_rating" value="average">
									 <label class="form-check-label">
									      Average
									 </label>
								</div>
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="marriage_rating" value="unhappy">
									 <label class="form-check-label">
									       Unhappy
									 </label>
								</div>
						    </div>
						</div>
						<div class="form-group row">
						    <label class="col-sm-3 col-form-label"><span>*</span>How would you rate your childhood?</label>
						    <div class="col-sm-6">
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="childhood_rating" value="good" required="required" minlength="1">
									 <label class="form-check-label">
									     Good 
									 </label>
								</div>
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="childhood_rating" value="fair">
									 <label class="form-check-label">
									     Fair   
									 </label>
								</div>
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="childhood_rating" value="poor">
									 <label class="form-check-label">
									    Poor
									 </label>
								</div>
							<br><span class="childhood_rating"></span>
						    </div>
						</div>
						<div class="form-group row">
						    <label class="col-sm-3 col-form-label"><span>*</span> Why?</label>
						    <div class="col-sm-6">
						    	 <textarea class="form-control" rows="4" name="childhood_rating_reason" required></textarea>
							<span class="childhood_rating_reason"></span>
						    </div>
						</div>
						<div class="form-group row">
						    <label class="col-sm-3 col-form-label"><span>*</span>As you grew up, who did you not feel closest to?</label>
						    <div class="col-sm-6">
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="not_feel_closest" value="father" required="required"  minlength="1" >
									 <label class="form-check-label">
									      Father 
									 </label>
								</div>
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="not_feel_closest" value="mother">
									 <label class="form-check-label">
									      Mother   
									 </label>
								</div>
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="not_feel_closest" value="other">
									 <label class="form-check-label">
									     Other
									 </label>
								</div>
							<br><span class="not_feel_closest"></span>
						    </div>
						</div>
						<div class="form-group row">
						    <label class="col-sm-3 col-form-label">If Other, who?</label>
						    <div class="col-sm-6">
						    	<input type="text" class="form-control" name="if_other_closest">
						    </div>
						</div>
						<div class="form-group row">
						    <label class="col-sm-3 col-form-label"><span>*</span> When did you last see your parents?</label>
						    <div class="col-sm-6">
						    	<input type="text" class="form-control" name="last_seen_parents" required>
							<span class="last_seen_parents"></span>
						    </div>
						</div>
						<div class="form-group row">
						    <label class="col-sm-3 col-form-label"><span>*</span>When did you last live at home?</label>
						    <div class="col-sm-6">
						    	<input type="text" class="form-control" name="last_live_at_home" required>
							<span class="last_live_at_home"></span>
						    </div>
						</div>
						<div class="form-group row">
						    <label class="col-sm-3 col-form-label"><span>*</span>Are you adopted?</label>
						    <div class="col-sm-6">
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="is_adopted" value="1" required="required"  minlength="1" >
									 <label class="form-check-label">
									      Yes 
									 </label>
								</div>
						        <div class="form-check form-check-inline">
									 <input class="form-check-input" type="radio" name="is_adopted" value="0">
									 <label class="form-check-label">
									      No   
									 </label>
								</div>
							<br><span class="is_adopted"></span>
						    </div>    
					   </div>
						<div class="form-group row">
						    <label class="col-sm-3 col-form-label">Explain</label>
						    <div class="col-sm-6">
						    	 <textarea class="form-control" rows="4" name="is_adopted_reason"></textarea>
						    </div>
						</div>
						<div class="form-group row">
						    <label class="col-sm-3 col-form-label">Father's Occupation:</label>
						    <div class="col-sm-6">
						    	<input type="text" class="form-control" name="fathers_occupation">
						    </div>
						</div>
						<div class="form-group row">
						    <label class="col-sm-3 col-form-label">Mother's Occuplation:</label>
						    <div class="col-sm-6">
						    	<input type="text" class="form-control" name="mothers_occupation">
						    </div>
						</div>
	  				</div>
	  			</div><!-- std_family_history-->

                <div class="reg_form_submit_div">
                    <button type="submit" class="reg_form_submit_button" id="submit_form_2">Save and Continue</button>
                </div>
                <span class="msg"></span>
            </form><!-- end form -->

             <div class="row reg_form_footer">
                <div class="col">
                    <div>
                        <a href="">Clear Entire Application</a>
                    </div>
                </div>
            </div>
        </div> <!-- main col -->
    </div><!-- main row -->

    <script src="<?php echo base_url()?>assets/js/jquery.datetimepicker.full.js"></script>
    
    <script>
        jQuery.datetimepicker.setLocale('de');

        jQuery('#date_of_birth').datetimepicker({
            i18n:{
                de:{
                    months:[
                        'January','February','March','April',
                        'May','June','July','August',
                        'September','October','November','December',
                    ],
                    dayOfWeek:[
                        "Su.", "Mo", "Tu", "We",
                        "Th", "Fr", "Sa.",
                    ]
                }
            },
            timepicker:false,
            format:'Y-m-d'
        });
    </script>


    <script>

        $("#register_form_2").validate({
            submitHandler: function () {
                
                var second_form_value = $('#register_form_2').serialize();
          
	            $.ajax({
	                    method:'POST',
	                    data:second_form_value,
	                    url:'save_registration_form2',
	                    success:function (data) {
	                        console.log(data);
	                        var res = JSON.parse(data);
	                        if (res.error_list){
	                            // $.each(res.error_list, function(key,val) {
	                            //     $('.'+key).text(val).css('color','red');
	                            // });
	                        }
	                        else if( res.custom_validation_error ){
	       //                  	console.log(res.custom_validation_error);
								// $('.validation_error').text(res.custom_validation_error).css('color','red');
	                        }
	                        else{
	                             $("#p2").removeClass('active');
	                             $("#p3").addClass('active');
                                 changeNavStatus(2);
                                 
	                             $.ajax({ url: 'register_form_3', 
	                                success: function(html) {
	                                     $("#ajax-content").empty().append(html);
	                                }
	                             });
	                        }
	                    }
	             }); 
            }
        });
        
    </script>


      <style type="text/css">
        body{
         background-color: #edeeee;
    width: 100%;
    max-width: 1170px;
    margin: 30px auto;
        }
        header .init_menu {
    background:transparent;
    border-bottom: 1px solid #ffffff;
    padding: 0;
    box-shadow: 0px 7px 7px -7px #ffffff;
}
header{
    margin-bottom: 0px;
}
header .init_menu .container{
     background-color: #fff;
     border:1px solid #a1a1a1;
     border-bottom: none;
}
header + div.container{
   background-color: #fff;
   padding-top: 20px;
    border:1px solid #a1a1a1;
     border-top: none;
}


 </style>





