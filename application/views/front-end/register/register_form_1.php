


    <div class="row justify-content-center registration-form">
      
        <div class="col-md-12"><!-- main -->

            <form method="post" action="" id="register_form_1">
                <!-- student_info   -->
              
                <div class="row justify-content-center reg_form_content_row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><span>Personal Data</span></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><span>*</span>First Name:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="first_name" value="<?php echo set_value('first_name'); ?>" required>
                                <span class="first_name"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Middle Name:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="middle_name" value="<?php echo set_value('middle_name'); ?>" >
                                <span class="middle_name"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><span>*</span>Last Name:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="last_name" required>
                                <span class="last_name"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><span>*</span>Address Line1:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="address_line1" required>
                                <span class="address_line1"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Address Line2:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="address_line2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><span>*</span>City:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="city" required>
                                <span class="city"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><span>*</span>State:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="state" required>
                                <span class="state"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><span>*</span>Zip:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="zip_code" required>
                                <span class="zip_code"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><span>*</span>Home Phone:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="home_phone" required>
                                <span class="home_phone"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Work Phone:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="work_phone">
                                <span class="work_phone"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">E-mail Address:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="email">
                                <span class="email"></span>
                            </div>
                        </div>
                    </div>
                </div><!-- end student_info   -->

                <!-- std_social_security  -->
                <div class="row justify-content-center reg_form_content_row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><span>*</span>Social Security Number:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="social_security_number" required>
                                <span class="social_security_number"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><span>*</span>Date of Birth:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="date_of_birth" id="date_of_birth" required>
                                <span class="date_of_birth"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Driver's License State:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="drivers_license_state">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Driver's License Number:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="drivers_license_number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Driver's License Status:</label>
                            <div class="col-sm-6">
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
                            <label class="col-md-3 col-form-label">If Suspended, why?</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="suspended_reason">
                            </div>
                        </div>
                    </div>
                </div><!-- end std_social_security  -->

                <!--std_appearance -->
                <div class="row justify-content-center reg_form_content_row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Height:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="hight">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Weight:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="weight">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Hair Color:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="hair_color">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Eye Color:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="eye_color">
                            </div>
                        </div>
                    </div>
                </div><!--std_appearance -->

                <!--std_ethnic_background -->
                <div class="row justify-content-center reg_form_content_row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><span>*</span>Race/Ethnic Background:</label>
                            <div class="col-sm-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ethnic_background"  value="caucasian" required="required"  minlength="1">
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
                                <br>
                                <span class="ethnic_background"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">If Other, please specify</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="other_ethnic_background">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center reg_form_content_row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Are you an American citizen?</label>
                            <div class="col-sm-6">
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
                            <label class="col-md-3 col-form-label">If Yes, please specify</label>
                            <div class="col-sm-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="american_citizen_type" value="native">
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
                            <label class="col-md-3 col-form-label">If No, I am a citizen of</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="other_citizenship">
                            </div>
                        </div>
                    </div>
                </div><!--std_ethnic_background -->

                <!-- emergency_contact -->
                <div class="row justify-content-center reg_form_content_row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><span>Emergency Contact</span></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><span>*</span>Name:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="emc_name" required>
                                <span class="emc_name"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><span>*</span>Address Line1:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="emc_address_line1" required>
                                <span class="emc_address_line1"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Address Line2:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="emc_address_line2">
                                <span class="emc_address_line2"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><span>*</span>City:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="emc_city" required>
                                <span class="emc_city"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><span>*</span>State:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="emc_state" required>
                                <span class="emc_state"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><span>*</span>Zip:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="emc_zip_code" required>
                                <span class="emc_zip_code"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><span>*</span>Home Phone:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="emc_home_phone" required>
                                <span class="emc_home_phone"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Work Phone:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="emc_work_phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><span>*</span>Relationship to Student:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="emc_relation_to_student" required>
                                <span class="emc_relation_to_student"></span>
                            </div>
                        </div>
                    </div>
                </div><!-- emergency_contact -->

                <!-- referece -->
                <div class="row justify-content-center reg_form_content_row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><span>Who Referred You?</span></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Name:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="reference_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Address Line1:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="reference_address_line1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Address Line2:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="reference_address_line2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">City:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="reference_city">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">State:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="reference_state">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Zip:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="reference_zip_code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Home Phone:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="reference_home_phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Work Phone:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="reference_work_phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Relationship to Student:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="reference_relation_to_student">
                            </div>
                        </div>
                    </div>
                </div><!-- referece -->

                <!-- Personality Info -->
                <div class="row justify-content-center reg_form_content_row_last">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><span>Personality Information</span></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><span>*</span>Is it easy for you to express your feelings?</label>
                            <div class="col-sm-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_expressive"  value="1" required="required" minlength="1">
                                    <label class="form-check-label">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_expressive" value="0">
                                    <label class="form-check-label">
                                        No
                                    </label>
                                </div>
                                <br>
                                <span class="is_expressive"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><span>*</span>Explain:</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" rows="3" name="explanation_is_expressive" required></textarea>
                                <span class="explanation_is_expressive"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><span>*</span>Do you enjoy being with other people or would you rather be alone?</label>
                            <div class="col-sm-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_rational" value="1" required="required" minlength="1">
                                    <label class="form-check-label" for="exampleRadios1">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_rational" id="option2" value="0">
                                    <label class="form-check-label" for="exampleRadios2">
                                        No
                                    </label>
                                </div>
                                <br>
                                <span class="is_rational"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><span>*</span>Explain:</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" rows="3" name="explanation_is_rational" required></textarea>
                                <span class="explanation_is_rational"></span>
                            </div>
                        </div>

                        <div class="reg_form_submit_div">
                            <button type="submit" class="reg_form_submit_button" id="submit_form_1">Save and Continue</button>
                        </div>
                        <span class="msg"></span>
                    </div>
                </div>
            </form>

            <div class="row reg_form_footer">
                <div class="col">
                    <div>
                        <a href="">Clear Entire Application</a>
                    </div>
                </div>
            </div>
        </div> <!-- main -->
    </div>


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

            $("#register_form_1").validate({

                // rules: {
                //      'ethnic_background[]':{ required:true }
                         //is_expressive
                         //is_rational
                // },

                submitHandler: function () {
                    
                    var first_form_value = $('#register_form_1').serialize();
                    
                    $.ajax({
                        method:'POST',
                        data:first_form_value,
                        url:'save_registration_form1',

                        success:function (data) {
                                console.log(data);
                                var res = JSON.parse(data);
                                if (res.error_list){
                                    // $.each(res.error_list, function(key,val) {
                                    //     $('.'+key).text(val).css('color','red');
                                    // });
                                }
                                else{
                                     $("#p1").removeClass('active');
                                     $("#p2").addClass('active');
                                     changeNavStatus(1); 
                                     
                                     $.ajax({ url: 'register_form_2', 
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






