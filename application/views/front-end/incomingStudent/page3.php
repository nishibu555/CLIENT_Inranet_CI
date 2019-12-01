
<div class="row justify-content-center" style="margin-top: 30px; margin-bottom: 50px;">
	<div class="col-md-8">
		<table class="table">
			<tr>
				<td>Your Marital Status: </td>
				<td><?php echo $marital_history->current_marital_status ?></td>
			</tr>
			
			<?php $la=unserialize($marital_history->living_arrangement);?>
			<tr>
				<td>Presently Living Alone:</td>
				<td><?php if(in_array("alone", $la)) echo "Yes" ?></td>
			</tr>
			<tr>
				<td>Presently Living with Parents:</td>
				<td><?php if(in_array("with parents", $la)) echo "Yes" ?></td>
			</tr>
			<tr>
				<td>Presently Living with Spouse:</td>
				<td><?php if(in_array("with spouse", $la)) echo "Yes" ?></td>
			</tr>
			<tr>
				<td>Presently Living with Non-Relatives:</td>
				<td><?php if(in_array("with others_nr", $la)) echo "Yes" ?></td>
			</tr>
			<tr>
				<td>Presently Living with Relatives</td>
				<td><?php if(in_array("with others_r", $la)) echo "Yes" ?></td>
			</tr>
			<tr>
				<td>Other Living Arrangements:</td>
				<td><?php if(in_array("other", $la)) echo "Yes" ?></td>
			</tr>
			<tr>
				<td>If Other, please specify:</td>
				<td><?php  echo $marital_history->if_other_la ?></td>
			</tr>
			<tr>
				<td>Current Spouse Name:</td>
				<td><?php  echo $marital_history->current_spouse_name ?></td>
			</tr>
			<tr>
				<td>Address Line 1:</td>
				<td><?php  echo $marital_history->current_spouse_address_line1 ?></td>
			</tr>
			<tr>
				<td>Address Line 2:</td>
				<td><?php  echo $marital_history->current_spouse_address_line2 ?></td>
			</tr>
			<tr>
				<td>City: </td>
				<td><?php  echo $marital_history->current_spouse_city ?></td>
			</tr>
			<tr>
				<td>State:</td>
				<td><?php echo $marital_history->current_spouse_state ?></td>
			</tr>
			<tr>
				<td>Zip:  </td>
				<td><?php echo $marital_history->current_spouse_zip_code ?></td>
			</tr>
			<tr>
				<td>Home Phone: </td>
				<td><?php echo $marital_history->current_spouse_home_phone ?></td>
			</tr>
			<tr>
				<td>Work Phone:  </td>
				<td><?php echo $marital_history->current_spouse_work_phone ?></td>
			</tr>
			<tr>
				<td>Describe your relationship with your spouse: </td>
				<td><?php echo $marital_history->relation_with_spouse ?></td>
			</tr>
			<tr>
				<td>Describe any problems or concerns related to your relationship with your spouse or girlfriend: </td>
				<td><?php echo $marital_history->problem_with_spouse ?></td>
			</tr>

			<tr>
				<td>Do you have any children?</td>
				<td><?php echo $children_info->have_children ? "Yes" : "No" ?></td>
			</tr>
			<?php foreach ($children as $key => $value) { ?>
				<tr>
					<td>Name of Child <?php echo $key+1 ?>:</td>
					<td><?php  echo  $value->children_name ?></td>
				</tr>
				<tr>
					<td>Age of Child:</td>
					<td><?php  echo  $value->children_age ?></td>
				</tr>
				<tr>
					<td>Where Child Lives: </td>
					<td><?php  echo  $value->children_living_place ?></td>
				</tr>
			<?php } ?>
			
			<tr>
				<td>Describe any positive or negative aspects of your relationship with your children:</td>
				<td><?php echo $children_info->aspects_with_children ?></td>
			</tr>

			<tr>
				<td>Have you ever been sexually abused?</td>
				<td><?php echo $abuse_history->is_abused ? "Yes" : "No" ?></td>
			</tr>
			<tr>
				<td>To your knowledge, has anyone in your family ever been sexually abused?</td>
				<td><?php echo $abuse_history->is_family_members_abused ? "Yes" : "No" ?></td>
			</tr>
			<tr>
				<td>If Yes, When: </td>
				<td><?php echo $abuse_history->when_abused ?></td>
			</tr>
			<tr>
				<td>Who:</td>
				<td><?php echo $abuse_history->who_abused ?></td>
			</tr>
			<tr>
				<td>When:</td>
				<td><?php echo $abuse_history->when_family_member_abused ?></td>
			</tr>
			<tr>
				<td>Who:  </td>
				<td><?php echo $abuse_history->who_abused_family_member ?></td>
			</tr>

			<?php $sl=unserialize($abuse_history->sexual_lifecycle);?>
			<tr>
				<td>Bisexual Lifestyle:</td>
				<td><?php if(in_array("bisexual", $sl)) echo "Yes" ?></td>
			</tr>
			<tr>
				<td>Heterosexual Lifestyle:</td>
				<td><?php if(in_array("heterosexual", $sl)) echo "Yes" ?></td>
			</tr>
			<tr>
				<td>Homosexual Lifestyle: </td>
				<td><?php if(in_array("homosexual", $sl)) echo "Yes" ?></td>
			</tr>
			<tr>
				<td>Pornography:  </td>
				<td><?php if(in_array("pornography", $sl)) echo "Yes" ?></td>
			</tr>
			<tr>
				<td>Prostitution: </td>
				<td><?php if(in_array("prostitution", $sl)) echo "Yes" ?></td>
			</tr>

			<tr>
				<td>How recently involved? </td>
				<td><?php echo $abuse_history->how_recently_involved ?></td>
			</tr>
			<tr>
				<td>Have you ever engaged in homosexual activities?</td>
				<td><?php echo $abuse_history->is_engaged_homosexual ?></td>
			</tr>


			<tr>
				<td>Have you ever served in the U.S. Armed Forces?</td>
				<td><?php  echo $military_history->is_served_us_army ? "Yes" : "No" ?></td>
			</tr>
			<tr>
				<td>If Yes, Branch of Service: </td>
				<td><?php  echo $military_history->branch_of_service ?></td>
			</tr>
			<tr>
				<td>Date of Entry:  </td>
				<td><?php  echo $military_history->entry_date ?></td>
			</tr>
			<tr>
				<td>Date of Discharge:  </td>
				<td><?php  echo $military_history->discharge_date ?></td>
			</tr>
			<tr>
				<td>Rank Attained:  </td>
				<td><?php  echo $military_history->rank ?></td>
			</tr>
			<tr>
				<td>Discharge Received: </td>
				<td><?php  echo $military_history->discharge_recieved ?></td>
			</tr>
			<tr>
				<td>Eligible for V.A. Medical Benefits? </td>
				<td><?php  echo $military_history->eligible_for_mb ?></td>
			</tr>
		</table>
	</div>
</div>


