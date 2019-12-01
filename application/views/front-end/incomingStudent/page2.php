<div class="row justify-content-center" style="margin-top: 30px; margin-bottom: 50px;">
	<div class="col-md-8">
		<table class="table">
			
			<?Php foreach ($family_member as $key => $value) { ?>

				<tr>
					<td>Family Member <?php echo $key ?>:</td>
					<td><?Php echo $value->member_name ?></td>
				</tr>
				<tr>
					<td>Relationship:</td>
					<td><?Php echo $value->member_relationship ?></td>
				</tr>
				<tr>
					<td>Age:</td>
					<td><?Php echo $value->member_age ?></td>
				</tr>
				<tr>
					<td>Residence: </td>
					<td><?Php echo $value->member_residence ?></td>
				</tr>

			<?php } ?>

			<tr>
				<td>How would you describe your relationship with your parents as a child?</td>
				<td><?php echo $std_family_history->relationship_as_child ?></td>
			</tr>
			<tr>
				<td>How would you describe your relationship with your parents at the present?</td>
				<td><?php echo $std_family_history->relationship_at_present ?></td>
			</tr>
			<tr>
				<td>Father's Name: </td>
				<td><?php echo $std_family_history->fathers_name ?></td>
			</tr>
			<tr>
				<td>Mother's Name:</td>
				<td><?php echo $std_family_history->mothers_name ?></td>
			</tr>
			<tr>
				<td>Is your father still living?</td>
				<td><?php echo $std_family_history->is_father_living ? "Yes" : "No" ?></td>
			</tr>
			<tr>
				<td>If yes, father's age:</td>
				<td><?php echo $std_family_history->fathers_age ?></td>
			</tr>
			<tr>
				<td>Is your mother still living? </td>
				<td><?php echo $std_family_history->is_mother_living ? "Yes" : "No" ?></td>
			</tr>
			<tr>
				<td>If yes, mother's age:  </td>
				<td><?php echo $std_family_history->mothers_age ?></td>
			</tr>
			<tr>
				<td>Parents' Marital Status:</td>
				<td><?php echo $std_family_history->parents_marital_status ?></td>
			</tr>
			<tr>
				<td>If married, how long?  </td>
				<td><?php echo $std_family_history->if_married_duration ?></td>
			</tr>
			<tr>
				<td>If not married, how long? </td>
				<td><?php echo $std_family_history->not_married_duration ?></td>
			</tr>
			<tr>
				<td>How would you rate their marriage?</td>
				<td><?php echo $std_family_history->marriage_rating ?></td>
			</tr>
			<tr>
				<td>How would you rate your childhood?</td>
				<td><?php echo $std_family_history->childhood_rating ?></td>
			</tr>
			<tr>
				<td>Why?</td>
				<td><?php echo $std_family_history->childhood_rating_reason ?></td>
			</tr>
			<tr>
				<td>As you grew up, who did you not feel closest to?</td>
				<td><?php echo $std_family_history->not_feel_closest ?></td>
			</tr>
			<tr>
				<td>If Other, who?</td>
				<td><?php echo $std_family_history->if_other_closest ?></td>
			</tr>
			<tr>
				<td>When did you last see your parents?</td>
				<td><?php echo $std_family_history->last_seen_parents ?></td>
			</tr>
			<tr>
				<td>When did you last live at home?</td>
				<td><?php echo $std_family_history->last_live_at_home ?></td>
			</tr>
			<tr>
				<td>Are you adopted? </td>
				<td><?php echo $std_family_history->is_adopted ? "Yes" : "No" ?></td>
			</tr>
			<tr>
				<td>Explain:</td>
				<td><?php echo $std_family_history->is_adopted_reason ?></td>
			</tr>

			<tr>
				<td>Father's Occupation: </td>
				<td><?php echo $std_family_history->fathers_occupation ?></td>
			</tr>

			<tr>
				<td>Mother's Occupation: </td>
				<td><?php echo $std_family_history->mothers_occupation ?></td>
			</tr>
		</table>
	</div>
</div>


			<!-- <tr>
				<td></td>
				<td></td>
			</tr> -->
