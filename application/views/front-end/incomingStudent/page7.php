<div class="row justify-content-center" style="margin-top: 30px; margin-bottom: 50px;">
    <div class="col-md-8">
        <table class="table">
            <tr>
                <td><span>Packs of cigarettes per day:</span></td>
                <td><?php  echo $medical_history->packs_of_cigarette ?></td>
            </tr>
            <tr>
                <td><span>Cups of coffee per day:</span></td>
                <td><?php  echo $medical_history->cups_of_coffee ?></td>
            </tr>
            <tr>
                <td><span>Cups of tea per day:</span></td>
                <td><?php  echo $medical_history->cups_of_tea ?></td>
            </tr>


            <tr>
                <td><span>Alcohol Use:</span></td>
                <td><?php  echo $drug_history->use_alcohol ?></td>
            </tr>
            <tr>
                <td><span>Amphetamines Use: </span></td>
                <td><?php  echo $drug_history->use_amphetamines ?></td>
            </tr>
            <tr>
                <td><span>Barbiturates Use:</span></td>
                <td><?php  echo $drug_history->use_barbiturates ?></td>
            </tr>
            <tr>
                <td><span>Heroin Use: </span></td>
                <td><?php  echo $drug_history->use_heroin ?></td>
            </tr>
            <tr>
                <td><span>Hallucinogenics Use:</span></td>
                <td><?php  echo $drug_history->use_hallucinogenics ?></td>
            </tr>
            <tr>
                <td><span>Opium Use:</span></td>
                <td><?php  echo $drug_history->use_opium ?></td>
            </tr>
            <tr>
                <td><span>Cocaine Use:</span></td>
                <td><?php  echo $drug_history->use_cocaine ?></td>
            </tr>
            <tr>
                <td><span>Tobacco Use: </span></td>
                <td><?php  echo $drug_history->use_tobacco ?></td>
            </tr>
            <tr>
                <td><span>Marijuana Use:</span></td>
                <td><?php  echo $drug_history->use_marijuana ?></td>
            </tr>
            <tr>
                <td><span>Crack Use:</span></td>
                <td><?php  echo $drug_history->use_crack ?></td>
            </tr>
            <tr>
                <td><span>Crank Use: </span></td>
                <td><?php  echo $drug_history->use_crank ?></td>
            </tr>
            <tr>
                <td><span>Other Use:</span></td>
                <td><?php  echo $drug_history->use_other ?></td>
            </tr>
            <tr>
                <td><span>If Other, please specify</span></td>
                <td><?php  echo $drug_history->use_other_specify ?></td>
            </tr>


            <tr>
                <td><span>Physician's Name: </span></td>
                <td><?php  echo $physicial_info->physician_name ?></td>
            </tr>
            <tr>
                <td><span>Address Line 1:  </span></td>
                <td><?php  echo $physicial_info->physician_address1 ?></td>
            </tr>
            <tr>
                <td><span>Address Line 2:  </span></td>
                <td><?php  echo $physicial_info->physician_address2 ?></td>
            </tr>
            <tr>
                <td><span>City:</span></td>
                <td><?php  echo $physicial_info->physician_city ?></td>
            </tr>
            <tr>
                <td><span>State:</span></td>
                <td><?php  echo $physicial_info->physician_state ?></td>
            </tr>
            <tr>
                <td><span>Zip:</span></td>
                <td><?php  echo $physicial_info->physician_zip ?></td>
            </tr>
            <tr>
                <td><span>Phone:  </span></td>
                <td><?php  echo $physicial_info->physician_phone ?></td>
            </tr>



            <tr>
                <td><span>Are you born again?</span></td>
                <td><?php  echo $spiritual_history->have_born_again=1? "Yes" : "No" ?></td>
            </tr>
            <tr>
                <td><span>If Yes, Date:</span></td>
                <td><?php  echo $spiritual_history->born_date ?></td>
            </tr>
            <tr>
                <td><span>Place:</span></td>
                <td><?php  echo $spiritual_history->born_place ?></td>
            </tr>
            <tr>
                <td><span>What is your current spiritual condition?</span></td>
                <td><?php  echo $spiritual_history->current_spiritual_condition     ?></td>
            </tr>
            <tr>
                <td><span>What were the circumstances that led to this?</span></td>
                <td><?php  echo $spiritual_history->circumstances ?></td>
            </tr>
            <tr>
                <td><span>Denomination Preference:</span></td>
                <td><?php  echo $spiritual_history->denomination_preference ?></td>
            </tr>
            <tr>
                <td><span>How often do you attend church? </span></td>
                <td><?php  echo $spiritual_history->attend_charch ?></td>
            </tr>
            <tr>
                <td><span>Are you a member of any church or religion? </span></td>
                <td><?php  echo $spiritual_history->is_member_of_charch==1? "Yes" : "No" ?></td>
            </tr>

            <tr>
                <td><span>If Yes, which one? </span></td>
                <td><?php  echo $spiritual_history->charch_name ?></td>
            </tr>

            <tr>
                <td><span>How often did you attend church as a child?</span></td>
                <td><?php  echo $spiritual_history->attend_charch_as_child ?></td>
            </tr>

            <tr>
                <td><span>If Occasonially/Regularly, which denomination? </span></td>
                <td><?php  echo $spiritual_history->which_denomination ?></td>
            </tr>

            <tr>
                <td><span>How old were you when you stopped attending?  </span></td>
                <td><?php  echo $spiritual_history->age_when_stop ?></td>
            </tr>

            <tr>
                <td><span>Why did you stop? </span></td>
                <td><?php  echo $spiritual_history->stop_reason ?></td>
            </tr>

            <tr>
                <td><span>Do you believe in God?</span></td>
                <td><?php  echo $spiritual_history->do_believe_god ?></td>
            </tr>

            <tr>
                <td><span>How often do you pray?</span></td>
                <td><?php  echo $spiritual_history->do_pray ?></td>
            </tr>

            <tr>
                <td><span>How often do you read the Bible?</span></td>
                <td><?php  echo $spiritual_history->read_bibel ?></td>
            </tr>

            <tr>
                <td><span>Do you read books of other religions instead of the Bible? </span></td>
                <td><?php  echo $spiritual_history->read_other ?></td>
            </tr>

            <tr>
                <td><span>If so, which ones? </span></td>
                <td><?php  echo $spiritual_history->other_book_name ?></td>
            </tr>

            <tr>
                <td><span>What recent changes have you had in your religious life, if any?</span></td>
                <td><?php  echo $spiritual_history->recent_change_in_rl ?></td>
            </tr>



            <tr>
                <td><span>Have you ever been involved in Cults? List them: </span></td>
                <td><?php  echo implode(',', unserialize($spiritual_history->involved_in_cults))  ?></td>
            </tr>

            <tr>
                <td><span>If Other, please specify:</span></td>
                <td><?php  echo $spiritual_history->other_cults ?></td>
            </tr>
            <tr>
                <td><span>If you have ever been involved in any of the above, please explain: </span></td>
                <td><?php  echo $spiritual_history->explanation ?></td>
            </tr>

        </table>
    </div>
</div>
