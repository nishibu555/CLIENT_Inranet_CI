

<div class="row justify-content-center registration-form">
 
    <div class="col-md-12"><!-- main -->
        <form method="post" action="#" id="register_form_6" name="reg_form6">
            <!-- ocupational history -->
            <div class="row justify-content-center reg_form_content_row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>Occupational History</span></label>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>*</span>What is your vocational trade or profession, if any?</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="profession" required>  
                            <span class="profession"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>*</span>How many jobs have you held in the last two (2) years?</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="jobs_last_two_years" required> 
                            <span class="jobs_last_two_years"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>*</span>What is your present employment status?</label>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="present_employement_status"  value="unemployed not sought" required="required" minlength="1">
                                <label class="form-check-label">
                                     Unemployed (have not sought employment in last 30 days)
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="present_employement_status" value="unemployed sought">
                                 <label class="form-check-label">
                                    Unemployed (have sought some employment in last 30 days)
                                 </label>
                            </div>
                            <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="present_employement_status" value="employed part time">
                                 <label class="form-check-label">
                                     Employed part-time (working less than 35 hours per week)
                                 </label>
                            </div>
                            <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="present_employement_status" value="employed fulltime">
                                 <label class="form-check-label">
                                     Employed full-time (working 35 hours or more per week)
                                 </label>
                            </div>
                            <br>
                            <span class="present_employement_status"></span>
                        </div>
                    </div>
                </div>
            </div> <!-- to be continued -->

              <!--most recent_jobs -->
            <div class="row justify-content-center reg_form_content_row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12" style="text-align: center; color: #0f3a64; font-size: 14px;">
                            <p>List your two most recent jobs:<br>(start with your most recent)</p>
                        </div> 
                    </div>
                    <div class="row recent_job_list">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Employer:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="employer[0]"> 
                                </div>
                            </div>       
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Employed From:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="employed_from[0]"> 
                                </div>
                            </div>       
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Employed Until:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="employed_until[0]"> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Position:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="position[0]"> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Reason For Leaving:</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" rows="4" name="leaving_reason[0]"></textarea>
                                </div>
                            </div>
                        </div>     
                    </div>
                    <div class="row recent_job_list">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Employer:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="employer[1]"> 
                                </div>
                            </div>       
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Employed From:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="employed_from[1]"> 
                                </div>
                            </div>       
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Employed Until:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="employed_until[1]"> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Position:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="position[1]"> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Reason For Leaving:</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" rows="4" name="leaving_reason[1]"></textarea>
                                </div>
                            </div>
                        </div>     
                    </div> 
                </div>
            </div><!-- most recent job-->


            <!-- continued ocupational history-->
            <div class="row justify-content-center reg_form_content_row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Current Average Monthly Income:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="current_avg_monthly_income"> 
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Describe your primary source of income</label>
                        <div class="col-sm-6">
                            <textarea  class="form-control" rows="4" name="primary_income_source"></textarea>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Describe your future occupational goals and plans:</label>
                        <div class="col-sm-6">
                            <textarea  class="form-control" rows="4" name="future_occupational_goal"></textarea>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Skills:</label>
                        <div class="col-sm-6">
                            <textarea  class="form-control" rows="4" name="skills"></textarea> 
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Have you ever experienced or presently have a physical ailment, injury or handicap that would prevent you from performing manual work-related tasks while enrolled in Teen Challenge?</label>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="have_injury_in_teen_challenge"  value="1">
                                <label class="form-check-label">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="have_injury_in_teen_challenge" value="0">
                                 <label class="form-check-label">
                                     No
                                 </label>
                            </div>
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">If Yes, please explain:</label>
                        <div class="col-sm-6">
                            <textarea  class="form-control" rows="4" name="injury_reason"></textarea>
                        </div>
                    </div>    
                </div>
            </div> <!--end occupational history -->
             
             <!--Medical History -->
             <div class="row justify-content-center reg_form_content_row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>Personal/Family Medical History</span></label>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-6 col-md-7  form_hint">
                            <p>Please check the appropriate area  for any family member that has experienced any of the following</p>
                        </div>
                    </div>
                    <div class="row medical_history">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Drug Abuse:</label>
                                <div class="col-sm-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="drag_abuse[]"  value="grandparent">
                                        <label class="form-check-label">
                                                  Grandparent
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="drag_abuse[]"  value="father">
                                        <label class="form-check-label">
                                                 Father
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="drag_abuse[]"  value="mother">
                                        <label class="form-check-label">
                                                   Mother
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="drag_abuse[]"  value="brother">
                                        <label class="form-check-label">
                                                  Brother
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="drag_abuse[]"  value="sister">
                                        <label class="form-check-label">
                                                 Sister
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="drag_abuse[]"  value="child">
                                        <label class="form-check-label">
                                                  Child
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row medical_history">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Alcoholism:</label>
                                <div class="col-sm-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="alcoholism[]"  value="grandparent">
                                        <label class="form-check-label">
                                                  Grandparent
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="alcoholism[]"  value="father">
                                        <label class="form-check-label">
                                                 Father
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="alcoholism[]"  value="mother">
                                        <label class="form-check-label">
                                                   Mother
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="alcoholism[]"  value="brother">
                                        <label class="form-check-label">
                                                  Brother
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="alcoholism[]"  value="sister">
                                        <label class="form-check-label">
                                                 Sister
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="alcoholism[]"  value="child">
                                        <label class="form-check-label">
                                                  Child
                                        </label>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="row medical_history">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Physical Problems:</label>
                                <div class="col-sm-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="physical_problems[]"  value="grandparent">
                                        <label class="form-check-label">
                                                  Grandparent
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="physical_problems[]"  value="father">
                                        <label class="form-check-label">
                                                 Father
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="physical_problems[]"  value="mother">
                                        <label class="form-check-label">
                                                   Mother
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="physical_problems[]"  value="brother">
                                        <label class="form-check-label">
                                                  Brother
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="physical_problems[]"  value="sister">
                                        <label class="form-check-label">
                                                 Sister
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="physical_problems[]"  value="child">
                                        <label class="form-check-label">
                                                  Child
                                        </label>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="row medical_history">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Mental Health Problems:</label>
                                <div class="col-sm-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="mental_problems[]"  value="grandparent">
                                        <label class="form-check-label">
                                                  Grandparent
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="mental_problems[]"  value="father">
                                        <label class="form-check-label">
                                                 Father
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="mental_problems[]"  value="mother">
                                        <label class="form-check-label">
                                                   Mother
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="mental_problems[]"  value="brother">
                                        <label class="form-check-label">
                                                  Brother
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="mental_problems[]"  value="sister">
                                        <label class="form-check-label">
                                                 Sister
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="mental_problems[]"  value="child">
                                        <label class="form-check-label">
                                                  Child
                                        </label>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>   
                </div>
            </div>

            <div class="row justify-content-center reg_form_content_row_last">
                <div class="col-md-12">  
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Describe any illness and developmental problem/concern you experienced as a child:</label>
                        <div class="col-sm-6">
                            <textarea  class="form-control" rows="4" name="illness_experienced_as_child"></textarea>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>*</span>Do you have any special diet requirements?</label>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="have_diet_requirement"  value="1" required="required" minlength="1">
                                <label class="form-check-label">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="have_diet_requirement" value="0">
                                 <label class="form-check-label">
                                     No
                                 </label>
                            </div><br>
                            <span class="have_diet_requirement"></span>
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">If Yes, please explain:</label>
                        <div class="col-sm-6">
                            <textarea  class="form-control" rows="4" name="diet_requirement_reason"></textarea>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">When were your teeth last examined?</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="last_teeth_examined"> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Are you currently experiencing problems with your teeth?</label>
                        <div class="col-sm-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="have_teeth_problem_currently"  value="1">
                                <label class="form-check-label">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                 <input class="form-check-input" type="radio" name="have_teeth_problem_currently" value="0">
                                 <label class="form-check-label">
                                     No
                                 </label>
                            </div>
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">If Yes, please explain:</label>
                        <div class="col-sm-6">
                            <textarea  class="form-control" rows="4" name="teeth_problem_currently_reason"></textarea>
                        </div>
                    </div>   
                </div>
            </div> <!-- medical history continuedto next page-->

            <div class="reg_form_submit_div">
                <button type="submit" class="reg_form_submit_button" id="submit_form_6">Save and Continue</button>
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
    </div> 
</div>


<script src="<?php echo base_url()?>assets/js/jquery.datetimepicker.full.js"></script>

<script>
    jQuery.datetimepicker.setLocale('de');

    jQuery('.date_of_birth').datetimepicker({
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

$("#register_form_6").validate({
    submitHandler: function () {

        var sixth_form_value = $('#register_form_6').serialize();

        $.ajax(
            {
                method:'POST',
                data:sixth_form_value,
                url:'save_registration_form6',
                success:function (data) {
                    console.log(data);
                    var res = JSON.parse(data);
                    console.log(res);
                    if (res.error_list)
                    {
                        // $.each(res.error_list, function(key,val) {
                        //     $('.'+key).text(val).css('color','red');
                        // });
                    }
                    else
                    {
                        
                        $("#p6").removeClass('active');
                         $("#p7").addClass('active');
                        changeNavStatus(6);
                         $.ajax({ url: 'register_form_7', 
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





