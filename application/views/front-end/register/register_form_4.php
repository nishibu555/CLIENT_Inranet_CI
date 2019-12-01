

<div class="row justify-content-center registration-form">
 
    <div class="col-md-12"><!-- main -->
        <!-- this form will submit data to multiple table-->
        <form method="post" action="#" id="register_form_4" name="reg_form4">
            <!-- legal history  -->
            <div class="row justify-content-center reg_form_content_row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>Legal History</span></label>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label"><span>*</span>Are you legally mandated to participate in a Teen Challenge-type program?</label>
                        <div class="col-md-8">
                            <div class="form-check form-check-inline" style="margin-top: 26px">
                                <input class="form-check-input" type="radio" name="teen_challenge_accepted"  value="1" required="required" minlength="1">
                                <label class="form-check-label">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="teen_challenge_accepted" value="0">
                                <label class="form-check-label">
                                    No
                                </label>
                            </div>
                            <br>
                            <span class="teen_challenge_accepted"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">If Yes,by whom?</label>
                        <div class="col-md-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tc_by_whom"  value="parole-board">
                                <label class="form-check-label">
                                    Parole Board
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tc_by_whom" value="court">
                                <label class="form-check-label">
                                    Court
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tc_by_whom" value="other">
                                <label class="form-check-label">
                                    Other
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">If Other,please specify:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="tc_if_other_specify">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">If Court,please specify court of origin:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="tc_origin_of_court" style="margin-top: 9px">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label"><span>*</span>Are you currently or will you be under legal supervision?</label>
                        <div class="col-md-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ul_supervision"  value="1" required="required" minlength="1">
                                <label class="form-check-label">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ul_supervision" value="0">
                                <label class="form-check-label">
                                    No
                                </label>
                            </div>
                            <br>
                            <span class="ul_supervision"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Method of Reporting:</label>
                        <div class="col-md-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="method_of_reporting"  value="phone">
                                <label class="form-check-label">
                                    Phone
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="method_of_reporting" value="letter">
                                <label class="form-check-label">
                                    Letter
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="method_of_reporting" value="person">
                                <label class="form-check-label">
                                    In Person
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="method_of_reporting" value="other">
                                <label class="form-check-label">
                                    Other
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">If Other,please specify:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="mr_if_other_specify">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">How often do you report?</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="often_report">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">For how long?</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="how_long">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Time left:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="time_left">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Probation/Parole Officer's name:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="parole_officer_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Agency:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="agency">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Address Line 1:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="lh_address_1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Address Line 2:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="lh_address_2">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">City:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="lh_city">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">State:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="lh_state">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Zip:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="lh_zip_code">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Phone:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="lh_phone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label"><span>*</span>Are any the following pending against you?</br>(check all that apply)</label>
                        <div class="col-md-8">
                            <div class="form-check form-check-inline" style="margin-top: 10px">
                                <input class="form-check-input" type="checkbox" name="pending_against[]"  value="arrest warrant" required="required" minlength="1">
                                <label class="form-check-label">
                                    Arrest Warrant
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="pending_against[]" value="court appearance">
                                <label class="form-check-label">
                                    Court Appearance
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="pending_against[]" value="criminal charges">
                                <label class="form-check-label">
                                    Criminal Charges
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="pending_against[]" value="sentencing">
                                <label class="form-check-label">
                                    Sentencing
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="pending_against[]" value="other">
                                <label class="form-check-label">
                                    Other
                                </label>
                            </div>
                            <br>
                            <span class="pending_against"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">If Other,please specify:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="pa_if_other_specify">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">If you checked any of the above,please explain,please specify:</label>
                        <div class="col-sm-6">
                            <textarea type="text" class="form-control" name="pa__above_explain"></textarea>
                        </div>
                    </div>
                </div>
            </div><!-- end legal history   -->

            <!-- std_arrest  -->
            <div class="row justify-content-center reg_form_content_row">
                <div class="col-md-12">

                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label"><span>*</span>Have you ever been arrested?</label>
                        <div class="col-md-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="arrested_value"  value="1" required="required" minlength="1">
                                <label class="form-check-label">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="arrested_value" value="0">
                                <label class="form-check-label">
                                    No
                                </label>
                            </div>
                            <br>
                            <span class="arrested_value"></span>
                        </div>
                    </div>

                        <h6 style="text-align: center">List All arrests and/or Convictions</h6>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">1st Arrest Date:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="arrest_date[0]">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Charges:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="arrest_charges[0]">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Conviction?</label>
                        <div class="col-md-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="conviction[0]"  value="1">
                                <label class="form-check-label">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="conviction[0]" value="0">
                                <label class="form-check-label">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Sentence:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="arrest_sentence[0]">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Time in jail:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="arrest_time_in_jail[0]">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">This Charge Involved:</label>
                        <div class="col-md-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="charge_involved[0]"  value="alcohol">
                                <label class="form-check-label">
                                    Alcohol
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="charge_involved[0]" value="drugs">
                                <label class="form-check-label">
                                    Drugs
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="charge_involved[0]" value="neither">
                                <label class="form-check-label">
                                    Neither
                                </label>
                            </div>
                        </div>
                    </div>
                    <p style="height: 2px;"></p>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">2st Arrest Date:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="arrest_date[1]">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Charges:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="arrest_charges[1]">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Conviction?</label>
                        <div class="col-md-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="conviction[1]"  value="1">
                                <label class="form-check-label">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="conviction[1]" value="0">
                                <label class="form-check-label">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Sentence:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="arrest_sentence[1]">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Time in jail:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="arrest_time_in_jail[1]">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">This Charge Involved:</label>
                        <div class="col-md-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="charge_involved[1]"  value="alcohol">
                                <label class="form-check-label">
                                    Alcohol
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="charge_involved[1]" value="drugs">
                                <label class="form-check-label">
                                    Drugs
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="charge_involved[1]" value="neither">
                                <label class="form-check-label">
                                    Neither
                                </label>
                            </div>
                        </div>
                    </div>
                    <p style="height: 2px;"></p>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">3rd Arrest Date:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="arrest_date[2]">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Charges:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="arrest_charges[2]">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Conviction?</label>
                        <div class="col-md-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="conviction[2]"  value="1">
                                <label class="form-check-label">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="conviction[2]" value="0">
                                <label class="form-check-label">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Sentence:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="arrest_sentence[2]">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Time in jail:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="arrest_time_in_jail[2]">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">This Charge Involved:</label>
                        <div class="col-md-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="charge_involved[2]"  value="alcohol">
                                <label class="form-check-label">
                                    Alcohol
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="charge_involved[2]" value="drugs">
                                <label class="form-check-label">
                                    Drugs
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="charge_involved[2]" value="neither">
                                <label class="form-check-label">
                                    Neither
                                </label>
                            </div>
                        </div>
                    </div>
                    <p style="height: 2px;"></p>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">4th Arrest Date:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="arrest_date[3]">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Charges:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="arrest_charges[3]">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Conviction?</label>
                        <div class="col-md-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="conviction[3]"  value="1">
                                <label class="form-check-label">
                                    Yescharge_involved
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="conviction[3]" value="0">
                                <label class="form-check-label">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Sentence:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="arrest_sentence[3]">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Time in jail:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="arrest_time_in_jail[3]">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">This Charge Involved:</label>
                        <div class="col-md-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="charge_involved[3]"  value="alcohol">
                                <label class="form-check-label">
                                    Alcohol
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="charge_involved[3]" value="drugs">
                                <label class="form-check-label">
                                    Drugs
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="charge_involved[3]" value="neither">
                                <label class="form-check-label">
                                    Neither
                                </label>
                            </div>
                        </div>
                    </div>
                    <p style="height: 2px;"></p>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">5th Arrest Date:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="arrest_date[4]">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Charges:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="arrest_charges[4]">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Conviction?</label>
                        <div class="col-md-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="conviction[4]"  value="1">
                                <label class="form-check-label">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="conviction[4]" value="0">
                                <label class="form-check-label">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Sentence:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="arrest_sentence[4]">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Time in jail:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="arrest_time_in_jail[4]">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">This Charge Involved:</label>
                        <div class="col-md-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="charge_involved[4]"  value="alcohol">
                                <label class="form-check-label">
                                    Alcohol
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="charge_involved[4]" value="drugs">
                                <label class="form-check-label">
                                    Drugs
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="charge_involved[4]" value="neither">
                                <label class="form-check-label">
                                    Neither
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end std_arrest  -->

            <!--std_prison -->
            <div class="row justify-content-center reg_form_content_row">
                <div class="col-md-12">
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label"><span>*</span>Have you ever been in prison?</label>
                            <div class="col-md-8">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="in_prison"  value="1" required="required" minlength="1">
                                    <label class="form-check-label">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="in_prison" value="0">
                                    <label class="form-check-label">
                                        No
                                    </label>
                                </div>
                                <br>
                                <span class="in_prison"></span>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">If yes,Date:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="in_prison_date[0]">
                            </div>
                        </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Institution:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="in_prison_institution[0]">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Date:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="in_prison_date[1]">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Institution:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="in_prison_institution[1]">
                        </div>
                    </div>
                </div>
            </div><!--std_prison -->

            <!-- Social Involvement History-->
            <div class="row justify-content-center reg_form_content_row_last">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><span>Social Involvement History</span></label>
                    </div>
                    <h6 style="text-align: center">Describe Your involvement in the following</h6>

                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label"><span>*</span>Religion:</label>
                        <div class="col-sm-6">
                            <textarea type="text" class="form-control" name="religion" required></textarea>
                            <span class="religion"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label"><span>*</span>Recreation/Sports:</label>
                        <div class="col-sm-6">
                            <textarea type="text" class="form-control" name="sports" required></textarea>
                            <span class="sports"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label"><span>*</span>Peer Group:</label>
                        <div class="col-sm-6">
                            <textarea type="text" class="form-control" name="peer_group" required></textarea>
                            <span class="peer_group"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label"><span>*</span>Community Affiliations:</label>
                        <div class="col-sm-6">
                            <textarea type="text" class="form-control" name="community_affiliation" required></textarea>
                            <span class="community_affiliation"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label"><span>*</span>Hobbies:</label>
                        <div class="col-sm-6">
                            <textarea type="text" class="form-control" name="hobbies" required></textarea>
                            <span class="hobbies"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label"><span>*</span>Other:</label>
                        <div class="col-sm-6">
                            <textarea type="text" class="form-control" name="other" required></textarea>
                            <span class="other"></span>
                        </div>
                    </div>

                    <div class="reg_form_submit_div">
                        <button type="submit" class="reg_form_submit_button" id="submit_form_4">Save and Continue</span>continue</button>
                    </div>
                    <span class="msg"></span>
                </div>
            </div><!-- Social Involvement History-->
        </form>
        <!-- this form will submit data to table:  -->

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
    $("#register_form_4").validate({
        submitHandler: function () {
                var four_form_value = $('#register_form_4').serialize();

                $.ajax(
                    {
                        method:'POST',
                        data:four_form_value,
                        url:'save_registration_form4',
                        success:function (data) {

                            console.log(data);
                            var res = JSON.parse(data);
                            if (res.error_list)
                            {
                                $.each(res.error_list, function(key,val) {
                                    $('.'+key).text(val).css('color','red');
                                });
                            }
                            else
                            {
                                
                                $("#p4").removeClass('active');
                                 $("#p5").addClass('active');
                                 changeNavStatus(4);
                                 
                                 $.ajax({ url: 'register_form_5', 
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