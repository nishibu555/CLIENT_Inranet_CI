

<div class="row justify-content-center registration-form">
 
    <div class="col-md-12"><!-- main -->
        <form method="post" action="#" id="register_form_5" name="reg_form5">
            <!-- finalcial status  -->
            <div class="row justify-content-center reg_form_content_row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>Financial Status</span></label>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-6 col-md-7  form_hint">
                            <p>If you enter our program, what provisions will be made for the following expenses?</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">What provisions will be made for medical expenses? </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="medical"> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">What provisions will be made for dental expenses?</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="dental"> 
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Are you eligible for and/or receiving the following:</label>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="eligible_for[]"  value="welfare">
                                <label class="form-check-label">
                                         Welfare
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="eligible_for[]"  value="disability payments">
                                <label class="form-check-label">
                                        Disability Payments
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="eligible_for[]"  value="unemployment">
                                <label class="form-check-label">
                                         Unemployment
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="eligible_for[]"  value="workman's comp">
                                <label class="form-check-label">
                                         Workman's Comp
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="eligible_for[]"  value="other income">
                                <label class="form-check-label">
                                         Other Income
                                </label>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">If Other, please specify:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="if_other_eligible_for"> 
                        </div>
                    </div>   
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>*</span>Have you ever applied for food stamps?</label>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="have_applied_food_stamp"  value="1" required="required" minlength="1">
                                <label class="form-check-label">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="have_applied_food_stamp" value="0">
                                 <label class="form-check-label">
                                     No
                                 </label>
                            </div>
                        <br><span class="have_applied_food_stamp"></span>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">If Yes, where?</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="where_applied"> 
                        </div>
                    </div>   
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Do you have any outstanding debts?</label>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="have_debts"  value="1">
                                <label class="form-check-label">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="have_debts" value="0">
                                 <label class="form-check-label">
                                     No
                                 </label>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Explain:</label>
                        <div class="col-sm-6">
                            <textarea  class="form-control" rows="4" name="debts_reason"></textarea> 
                        </div>
                    </div> 
                </div>
            </div><!-- end finaltial status-->


            <!-- life events -->
            <div class="row justify-content-center reg_form_content_row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>Significant Life Events</span></label>
                    </div>
                    <div class="row">
                        <div class="col-md-12 life_event_sub_title">
                            <p>Describe any of the following you are experiencing/have recently experienced:</p>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>*</span>Moves:</label>
                        <div class="col-sm-6">
                            <textarea  class="form-control" rows="4" name="movies" required></textarea> 
                            <span class="movies"></span>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>*</span>Losses:<br><i>(personal, financial)</i></label>
                        <div class="col-sm-6">
                            <textarea  class="form-control" rows="4" name="losses" required></textarea>
                            <span class="losses"></span> 
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>*</span>Sexual Abuse/Rape:</label>
                        <div class="col-sm-6">
                            <textarea  class="form-control" rows="4" name="sexual_abuse" required></textarea>
                            <span class="sexual_abuse"></span> 
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>*</span>Physical Abuse/Neglect:</label>
                        <div class="col-sm-6">
                            <textarea  class="form-control" rows="4" name="physical_abuse" required></textarea> 
                            <span class="physical_abuse"></span>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>*</span>Foster Home Placement or Institutionalization:</label>
                        <div class="col-sm-6">
                            <textarea  class="form-control" rows="4" name="home_placement" required></textarea>
                            <span class="home_placement"></span> 
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>*</span>Ethnic/Cultural Influences:</label>
                        <div class="col-sm-6">
                            <textarea  class="form-control" rows="4" name="cultural_influence" required></textarea>
                            <span class="cultural_influence"></span> 
                        </div>
                    </div>    
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>*</span>Other:</label>
                        <div class="col-sm-6">
                            <textarea  class="form-control" rows="4" name="other_event" required></textarea> 
                            <span class="other_event"></span>
                        </div>
                    </div> 
                </div>
            </div><!-- end life events-->


            <!-- academic history  -->
            <div class="row justify-content-center reg_form_content_row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>Academic History</span></label>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>*</span>What is the highest grade that you have completed?</label>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="highest_grade"  value="elementary"  required="required" minlength="1">
                                <label class="form-check-label">
                                    Elementary
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="highest_grade"  value="middle">
                                <label class="form-check-label">
                                    Middle
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="highest_grade"  value="9th">
                                <label class="form-check-label">
                                    9th
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="highest_grade"  value="10th">
                                <label class="form-check-label">
                                    10th
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="highest_grade"  value="11th">
                                <label class="form-check-label">
                                   11th
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="highest_grade"  value="12th">
                                <label class="form-check-label">
                                   12th
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="highest_grade"  value="some college">
                                <label class="form-check-label">
                                   Some College
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="highest_grade"  value="college degree">
                                <label class="form-check-label">
                                   College Degree
                                </label>
                            </div>
                        <br><span class="highest_grade"></span>
                        </div>
                    </div>    
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Are you currently in an education program?</label>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_currently_in_education"  value="1">
                                <label class="form-check-label">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="is_currently_in_education" value="0">
                                 <label class="form-check-label">
                                     No
                                 </label>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">If Yes, Name of School:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="school_name"> 
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">City:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="school_city"> 
                        </div>
                    </div>     
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">If you are no longer in an education program, please explain your reason for leaving school:</label>
                        <div class="col-sm-6">
                            <textarea  class="form-control" rows="4" name="school_leaving_reason"></textarea> 
                        </div>
                    </div>    
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>*</span>Are you receiving or have you received vocational training?</label>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="have_vocational_training"  value="1" required="required" minlength="1">
                                <label class="form-check-label">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="have_vocational_training" value="0">
                                 <label class="form-check-label">
                                     No
                                 </label>
                            </div>
                            <br>
                            <span class="have_vocational_training"></span>
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">If Yes, what kind?</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="kind_of_training"> 
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 skill_type">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Type of Trade or Skill:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control"  name="type_of_skill[]"> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Date of Training:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" class="date_of_training" name="date_of_training[0]"> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Certificate Issued?</label>
                                <div class="col-sm-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="have_cirtificate_issued[0]"  value="1">
                                        <label class="form-check-label">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                         <input class="form-check-input" type="radio" name="have_cirtificate_issued[0]" value="0">
                                         <label class="form-check-label">
                                             No
                                         </label>
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <div class="col-md-12 skill_type">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Type of Trade or Skill:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control"  name="type_of_skill[]"> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Date of Training:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" class="date_of_training" name="date_of_training[1]"> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Certificate Issued?</label>
                                <div class="col-sm-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="have_cirtificate_issued[1]"  value="1">
                                        <label class="form-check-label">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                         <input class="form-check-input" type="radio" name="have_cirtificate_issued[1]" value="0">
                                         <label class="form-check-label">
                                             No
                                         </label>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center reg_form_content_row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>*</span>Can you read?</label>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="can_read"  value="1" required="required" minlength="1">
                                <label class="form-check-label">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="can_read" value="0">
                                 <label class="form-check-label">
                                     No
                                 </label>
                            </div>
                            <br>
                            <span class="can_read"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>*</span>Reading Competency</label>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="reading_competency"  value="good" required="required" minlength="1">
                                <label class="form-check-label">
                                     Good
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="reading_competency" value="pverage">
                                 <label class="form-check-label">
                                      Average
                                 </label>
                            </div>
                            <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="reading_competency" value="poor">
                                 <label class="form-check-label">
                                       Poor
                                 </label>
                            </div>
                            <br>
                            <span class="reading_competency"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>*</span>Can you write?</label>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="can_write"  value="1" required="required" minlength="1">
                                <label class="form-check-label">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="can_write" value="0">
                                 <label class="form-check-label">
                                     No
                                 </label>
                            </div>
                            <br>
                            <span class="can_write"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>*</span>Writing  Competency</label>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="writing_competency"  value="good" required="required" minlength="1">
                                <label class="form-check-label">
                                     Good
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="writing_competency" value="pverage">
                                 <label class="form-check-label">
                                      Average
                                 </label>
                            </div>
                            <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="writing_competency" value="poor">
                                 <label class="form-check-label">
                                       Poor
                                 </label>
                            </div>
                            <br>
                            <span class="can_write"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center reg_form_content_row">
                <div class="col-md-12"> 
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Describe your future educational goals and plans:</label>
                        <div class="col-sm-6">
                            <textarea  class="form-control" rows="4" name="future_educational_goal"></textarea> 
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Describe your future vocational training goals and plans:</label>
                        <div class="col-sm-6">
                            <textarea  class="form-control" rows="4" name="future_vocational_training"></textarea> 
                        </div>
                    </div> 
                </div>
            </div><!-- end academic history-->
                

            <div class="reg_form_submit_div">
                <button type="submit" class="reg_form_submit_button" id="submit_form_5">Save and Continue</button>
            </div>
            <span class="msg"></span>
        </form>

	    <div class="row reg_form_footer">
	        <div class="col">
	            <div>
	                <a href="">Clear Entire Application</a>
	            </div>
	        </div>
	    </div>
    </div> <!-- main col-->
</div>


<script src="<?php echo base_url()?>assets/js/jquery.datetimepicker.full.js"></script>

<script>
    jQuery.datetimepicker.setLocale('de');

    jQuery('.date_of_training').datetimepicker({
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
    $("#register_form_5").validate({
        submitHandler: function () {

           var fifth_form_value = $('#register_form_5').serialize();

           $.ajax({
                method:'POST',
                data:fifth_form_value,
                url:'save_registration_form5',
                success:function (data) {
                    console.log(data);
                    var res = JSON.parse(data);
                    console.log(res);
                    if (res.error_list)
                    {
                        $.each(res.error_list, function(key,val) {
                            $('.'+key).text(val).css('color','red');
                        });
                    }
                    else
                    {
                        $("#p5").removeClass('active');
                         $("#p6").addClass('active');
                            changeNavStatus(5);
                         $.ajax({ url: 'register_form_6', 
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





