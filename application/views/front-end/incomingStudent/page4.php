

<div class="row justify-content-center" style="margin-top: 30px; margin-bottom: 50px;">
	<div class="col-md-8">
		<table class="table">
			<tr>
				<td><span>Are you legally mandated to participate in a Teen Challenge-type program? </span></td>
				<td><?php echo $legal_history->teen_challenge_accepted ?></td>
			</tr>
			<tr>
				<td><span>If Yes, by whom?</span></td>
				<td><?php echo $legal_history->tc_by_whom ?></td>
			</tr>
			<tr>
				<td><span>If Other, please specify</span></td>
				<td><?php echo $legal_history->tc_if_other_specify ?></td>
			</tr>
			<tr>
				<td><span>If Court, please specify county of origin:</span></td>
				<td><?php echo $legal_history->tc_origin_of_court ?></td>
			</tr>
			<tr>
				<td><span>Are you currently or will you be under legal supervision?</span></td>
				<td><?php echo $legal_history->ul_supervision ?></td>
			</tr>
			<tr>
				<td><span>Method of Reporting:</span></td>
				<td><?php echo $legal_history->method_of_reporting ?></td>
			</tr>
			<tr>
				<td><span>If Other, please specify:</span></td>
				<td><?php echo $legal_history->mr_if_other_specify ?></td>
			</tr>
			<tr>
				<td><span>How often do you report?</span></td>
				<td><?php echo $legal_history->often_report ?></td>
			</tr>
			<tr>
				<td><span>For How Long?</span></td>
				<td><?php echo $legal_history->how_long ?></td>
			</tr>
			<tr>
				<td><span>Time Left:</span></td>
				<td><?php echo $legal_history->time_left ?></td>
			</tr>
			<tr>
				<td><span>Probation/Parole Officer's Name:</span></td>
				<td><?php echo $legal_history->parole_officer_name ?></td>
			</tr>
			<tr>
				<td><span>Agency:</span></td>
				<td><?php echo $legal_history->agency ?></td>
			</tr>
			<tr>
				<td><span>Address Line 1:</span></td>
				<td><?php echo $legal_history->lh_address_1 ?></td>
			</tr>
			<tr>
				<td><span>Address Line 2:</span></td>
				<td><?php echo $legal_history->lh_address_2 ?></td>
			</tr>
			<tr>
				<td><span>City:</span></td>
				<td><?php echo $legal_history->lh_city  ?></td>
			</tr>
			<tr>
				<td><span>State:</span></td>
				<td><?php echo $legal_history->lh_state ?></td>
			</tr>
			<tr>
				<td><span>Zip:</span></td>
				<td><?php echo $legal_history->lh_zip_code ?></td>
			</tr>
			<tr>
				<td><span>Phone:</span></td>
				<td><?php echo $legal_history->lh_phone ?></td>
			</tr>

			<?php $pa=unserialize($legal_history->pending_against);?>
			<tr>
				<td>Arrest Warrant Pending:</td>
				<td><?php if(in_array("arrest warrant", $pa)) echo "Yes" ?></td>
			</tr>
			<tr>
				<td><span>Court Appearance Pending:</span></td>
				<td><?php if(in_array("court appearance", $pa)) echo "Yes" ?></td>
			</tr>
			<tr>
				<td><span>Criminal Charges Pending:</span></td>
				<td><?php if(in_array("criminal charges", $pa)) echo "Yes" ?></td>
			</tr>
			<tr>
				<td><span>Sentencing Pending:</span></td>
				<td><?php if(in_array("sentencing", $pa)) echo "Yes" ?></td>
			</tr>
			<tr>
				<td><span>Other Pending:</span></td>
				<td<?php if(in_array("other", $pa)) echo "Yes" ?></td>
			</tr>
			<tr>
				<td><span>If Other, please specify:</span></td>
				<td><?php echo $legal_history->pa_if_other_specify ?></td>
			</tr>
			<tr>
				<td><span>If anything pending, please explain:  </span></td>
				<td><?php echo $legal_history->pa__above_explain ?></td>
			</tr>

			<?php foreach ($crime_history as $key => $value) { 
				
				$have_arrested = $value->arrested_value;
				
			}?>
			<tr>
				<td><span>Have you ever been arrested?</span></td>
				<td><?php echo $have_arrested==1? "Yes" : "No" ?></td>
			</tr>
			
			<?php foreach ($crime_history as $key => $crime_history) { ?>
				
				<tr>
					<td><span>Arrest Date <?php echo $key ?>:</span></td>
					<td><?php echo $crime_history->arrest_date ?></td>
				</tr>
				<tr>
					<td><span>Charges:</span></td>
					<td><?php echo $crime_history->arrest_charges ?></td>
				</tr>
				<tr>
					<td><span>Conviction?</span></td>
					<td><?php echo $crime_history->conviction ?></td>
				</tr>
				<tr>
					<td><span>Sentence:</span></td>
					<td><?php echo $crime_history->arrest_sentence ?></td>
				</tr>
				<tr>
					<td><span>Time in Jail:</span></td>
					<td><?php echo $crime_history->arrest_time_in_jail ?></td>
				</tr>
				<tr>
					<td><span>This Charge Involved:</span></td>
					<td><?php echo $crime_history->charge_involved ?></td>
				</tr>
				
			<?php  } ?>


			<?php foreach ($in_prison as $key => $value) { 
				
				$been_in_prison = $value->in_prison;
				
			}?>
			<tr>
				<td><span>Have you ever been in prison?</span></td>
				<td><?php echo $been_in_prison==1? "Yes" : "No" ?></td>
			</tr>
			<?php foreach ($in_prison as $key => $value) { ?>
				<tr>
					<td><span>If Yes, Date:</span></td>
					<td><?php echo $value->in_prison_date ?></td>
				</tr>
				<tr>
					<td><span>Institution:</span></td>
					<td><?php echo $value->in_prison_institution ?></td>
				</tr>
			<?php } ?>


			<tr>
				<td><span>Involvement in Religion:</span></td>
				<td><?php echo $social_involvement_history->religion ?></td>
			</tr>
			<tr>
				<td><span>Involvement in Recreation/Sports:</span></td>
				<td><?php echo $social_involvement_history->sports ?></td>
			</tr>
			<tr>
				<td><span>Involvement in Peer Group:</span></td>
				<td><?php echo $social_involvement_history->peer_group ?></td>
			</tr>
			<tr>
				<td><span>Involvement in Community Affiliations:</span></td>
				<td><?php echo $social_involvement_history->community_affiliation ?></td>
			</tr>
			<tr>
				<td><span>Involvement in Hobbies:</span></td>
				<td><?php echo $social_involvement_history->hobbies ?></td>
			</tr>
			<tr>
				<td><span>Other Involvements:</span></td>
				<td><?php echo $social_involvement_history->other ?></td>
			</tr>
		</table>
	</div>
</div>
