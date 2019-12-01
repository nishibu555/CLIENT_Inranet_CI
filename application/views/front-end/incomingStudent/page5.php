<div class="row justify-content-center" style="margin-top: 30px; margin-bottom: 50px;">
	<div class="col-md-8">
		<table class="table">
			<tr>
				<td><span>What provisions will be made for medical expenses? </span></td>
				<td><?php echo $financial_status->medical ?></td>
			</tr>
			<tr>
				<td><span>What provisions will be made for dental expenses? </span></td>
				<td><?php echo $financial_status->dental ?></td>
			</tr>
			

			<?php $af=unserialize($financial_status->eligible_for); ?>

			
			<tr>
				<td>Are you eligible for and/or receiving welfare?:</td>
				<td><?php if(in_array("welfare", $af)) echo "Yes" ?></td>
			</tr>
			<tr>
				<td><span>Are you eligible for and/or receiving disability payments?</span></td>
				<td><?php if(in_array("disability payments", $af)) echo "Yes" ?></td>
			</tr>
			<tr>
				<td><span>Are you eligible for and/or receiving unemployment?</span></td>
				<td><?php if(in_array("unemployment", $af)) echo "Yes" ?></td>
			</tr>
			<tr>
				<td><span>Are you eligible for and/or receiving workman's comp?</span></td>
				<td><?php if(in_array("workman's comp", $af)) echo "Yes" ?></td>
			</tr>
			<tr>
				<td><span>Are you eligible for and/or receiving other income?</span></td>
				<td><?php if(in_array("other income", $af)) echo "Yes" ?></td>
			</tr>
			<tr>
				<td><span>If Other, please specify:</span></td>
				<td><?php  echo  $financial_status->if_other_eligible_for ?></td>
			</tr>
			<tr>
				<td><span>Have you ever applied for food stamps?</span></td>
				<td><?php  echo  $financial_status->have_applied_food_stamp==1? "Yes" : "No" ?></td>
			</tr>
			<tr>
				<td><span>If Yes, where?</span></td>
				<td><?php  echo  $financial_status->where_applied ?></td>
			</tr>
			<tr>
				<td><span>Do you have any outstanding debts? </span></td>
				<td><?php  echo  $financial_status->have_debts ?></td>
			</tr>
			<tr>
				<td><span>Explain:</span></td>
				<td><?php  echo  $financial_status->debts_reason ?></td>
			</tr>


			<tr>
				<td><span>Current or Recent Moves:</span></td>
				<td><?php  echo $std_life_event->movies ?></td>
			</tr>
			<tr>
				<td><span>Current or Recent Losses:</span></td>
				<td><?php  echo $std_life_event->losses ?></td>
			</tr>
			<tr>
				<td><span>Current or Recent Sexual Abuse/Rape:</span></td>
				<td><?php  echo $std_life_event->sexual_abuse ?></td>
			</tr>
			<tr>
				<td><span>Current or Recent Physical Abuse/Neglect:</span></td>
				<td><?php  echo $std_life_event->physical_abuse ?></td>
			</tr>
			<tr>
				<td><span>Current or Recent Foster Home Placement or Institutionalization:</span></td>
				<td><?php  echo $std_life_event->home_placement ?></td>
			</tr>
			<tr>
				<td><span>Current or Recent Ethnic/Cultural Influences:</span></td>
				<td><?php  echo $std_life_event->cultural_influence ?></td>
			</tr>
			<tr>
				<td><span>Other Current or Recent Events:</span></td>
				<td><?php  echo $std_life_event->other_event ?></td>
			</tr>


			<tr>
				<td><span>What is the highest grade that you have completed? </span></td>
				<td><?php  echo $academic_info->highest_grade ?></td>
			</tr>
			<tr>
				<td><span>Are you currently in an education program?</span></td>
				<td><?php  echo $academic_info->is_currently_in_education==1? "Yes" : "No" ?></td>
			</tr>
			<tr>
				<td><span>If Yes, Name of School:</span></td>
				<td><?php  echo $academic_info->school_name ?></td>
			</tr>
			<tr>
				<td><span>City:</span></td>
				<td><?php  echo $academic_info->school_city ?></td>
			</tr>
			<tr>
				<td><span>If you are no longer in an education program, please explain your reason for leaving school:</span></td>
				<td><?php  echo $academic_info->school_leaving_reason ?></td>
			</tr>
			<tr>
				<td><span>Are you receiving or have you received vocational training?</span></td>
				<td><?php  echo $academic_info->have_vocational_training==1? "Yes" : "No" ?></td>
			</tr>
			<tr>
				<td><span>If Yes, what kind? </span></td>
				<td><?php  echo $academic_info->kind_of_training ?></td>
			</tr>
			
			<tr><td>TRAINING LIST:</td></tr>
			<?php foreach ($training_list as $key => $value) { ?>
				<tr>
					<td><span>Type of Trade or Skill <?php echo $key?>:</span></td>
					<td><?php echo $value->type_of_skill ?></td>
				</tr>
				<tr>
					<td><span>Date of Training: </span></td>
					<td><?php echo $value->date_of_training ?></td>
				</tr>
				<tr>
					<td><span>Certificate Issued?</span></td>
					<td><?php echo $value->have_cirtificate_issued ?></td>
				</tr>
			<?php } ?>
			


			<tr>
				<td><span>Can you read?</span></td>
				<td><?php  echo $academic_info->can_read==1? "Yes" : "No" ?></td>
			</tr>
			<tr>
				<td><span>Reading Competency:</span></td>
				<td><?php  echo $academic_info->reading_competency ?></td>
			</tr>
			<tr>
				<td><span>Can you write?</span></td>
				<td><?php  echo $academic_info->can_write==1? "Yes" : "No" ?></td>
			</tr>
			<tr>
				<td><span>Writing Competency:</span></td>
				<td><?php  echo $academic_info->writing_competency ?></td>
			</tr>
			<tr>
				<td><span>Describe your future educational goals and plans:</span></td>
				<td><?php  echo $academic_info->future_educational_goal ?></td>
			</tr>
			<tr>
				<td><span>Describe your future vocational training goals and plans:</span></td>
				<td><?php  echo $academic_info->future_vocational_training ?></td>
			</tr>
		</table>
	</div>
</div>
