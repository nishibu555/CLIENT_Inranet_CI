<div class="row justify-content-center" style="margin-top: 30px; margin-bottom: 50px;">
	<div class="col-md-8">
		<table class="table">
			<tr>
				<td><span>What is your vocational trade or profession, if any? </span></td>
				<td><?php  echo $std_occupational_history->profession ?></td>
			</tr>
			<tr>
				<td><span>How many jobs have you held in the last two (2) years? </span></td>
				<td><?php  echo $std_occupational_history->jobs_last_two_years ?></td>
			</tr>
			<tr>
				<td><span>What is your present employment status? </span></td>
				<td><?php  echo $std_occupational_history->present_employement_status ?></td>
			</tr>


			<tr><td>MOST RECENT JOBS:</td></tr>
			<?php  foreach ($std_most_recent_job as $key => $value) { ?>
				<tr>
					<td><span>Employer <?php echo $key ?>: </span></td>
					<td><?php echo $value->employer ?></td>
				</tr>
				<tr>
					<td><span>Employed From:</span></td>
					<td><?php echo $value->employed_from ?></td>
				</tr>
				<tr>
					<td><span>Employed Until:  </span></td>
					<td><?php echo $value->employed_until ?></td>
				</tr>
				<tr>
					<td><span>Position:  </span></td>
					<td><?php echo $value->position ?></td>
				</tr>
				<tr>
					<td><span>Reason for Leaving:  </span></td>
					<td><?php echo $value->leaving_reasonleaving_reason ?></td>
				</tr>

			<?php } ?>


			<tr>
				<td><span>Current Average Monthly Income:</span></td>
				<td><?php  echo $std_occupational_history->current_avg_monthly_income ?></td>
			</tr>
			<tr>
				<td><span>Describe your primary source of income:  </span></td>
				<td><?php  echo $std_occupational_history->primary_income_source ?></td>
			</tr>
			<tr>
				<td><span>Describe your future occupational goals and plans:  </span></td>
				<td><?php  echo $std_occupational_history->future_occupational_goal ?></td>
			</tr>
			<tr>
				<td><span>Skills: </span></td>
				<td><?php  echo $std_occupational_history->skills ?></td>
			</tr>
			<tr>
				<td><span>Have you ever experienced or presently have a physical ailment, injury or handicap that would prevent you from performing manual work-related tasks while enrolled in Teen Challenge?  </span></td>
				<td><?php  echo $std_occupational_history->have_injury_in_teen_challenge==1? "Yes" : "No" ?></td>
			</tr>
			<tr>
				<td><span>If Yes, please explain:  </span></td>
				<td><?php  echo $std_occupational_history->injury_reason ?></td>
			</tr>



			<tr>
				<td><span>Drug Abuse: </span></td>
				<td><?php $drug=unserialize($medical_history->drag_abuse); echo(implode(',', $drug)); ?></td>
			</tr>

			<tr>
				<td><span>Alcoholism: </span></td>
				<td><?php $alcoholism=unserialize($medical_history->alcoholism); echo(implode(',', $alcoholism)); ?></td>
			</tr>
			<tr>
				<td><span>Physical Problems:</span></td>
				<td><?php $physical_problems=unserialize($medical_history->physical_problems); echo(implode(',', $physical_problems)); ?></td>
			</tr>
			<tr>
				<td><span>Mental Health Problems:</span></td>
				<td><?php $mental_problems=unserialize($medical_history->mental_problems); echo(implode(',', $mental_problems)); ?></td>
			</tr>


			<tr>
				<td><span>Describe any illness and developmental problem/concern you experienced as a child:  </span></td>
				<td><?php  echo $medical_history->illness_experienced_as_child ?></td>
			</tr>
			<tr>
				<td><span>Do you have any special diet requirements?</span></td>
				<td><?php  echo $medical_history->have_diet_requirement ?></td>
			</tr>
			<tr>
				<td><span>If Yes, please explain:</span></td>
				<td><?php  echo $medical_history->diet_requirement_reason ?></td>
			</tr>
			<tr>
				<td><span>When were your teeth last examined?</span></td>
				<td><?php  echo $medical_history->last_teeth_examined ?></td>
			</tr>
			<tr>
				<td><span>Are you currently experiencing problems with your teeth? </span></td>
				<td><?php  echo $medical_history->have_teeth_problem_currently ?></td>
			</tr>
			<tr>
				<td><span>If Yes, please explain:</span></td>
				<td><?php  echo $medical_history->teeth_problem_currently_reason ?></td>
			</tr>

		</table>
	</div>
</div>
