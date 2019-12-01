

<div class="row justify-content-center" style="margin-top: 30px; margin-bottom: 50px;">
	<div class="col-md-8">
		<table class="table">
			<tr>
				<td><span>First Name:</span></td>
				<td><?php echo $student_info->first_name ?></td>
			</tr>
			<tr>
				<td><span>Middle Name:</span></td>
				<td><?php echo $student_info->middle_name ?></td>
			</tr>
			<tr>
				<td><span>Last Name:</span></td>
				<td><?php echo $student_info->last_name ?></td>
			</tr>
			<tr>
				<td><span>Address Line 1:</span></td>
				<td><?php echo $student_info->address_line1	 ?></td>
			</tr>
			<tr>
				<td><span>Address Line 2:</span></td>
				<td><?php echo $student_info->address_line2 ?></td>
			</tr>
			<tr>
				<td><span>City:</span></td>
				<td><?php echo $student_info->city ?></td>
			</tr>
			<tr>
				<td><span>State:</span></td>
				<td><?php echo $student_info->state ?></td>
			</tr>
			<tr>
				<td><span>Zip:</span></td>
				<td><?php echo $student_info->zip_code ?></td>
			</tr>
			<tr>
				<td><span>Home Phone:</span></td>
				<td><?php echo $student_info->home_phone ?></td>
			</tr>
			<tr>
				<td><span>Work Phone:</span></td>
				<td><?php echo $student_info->work_phone ?></td>
			</tr>
			<tr>
				<td><span>Email Address:</span></td>
				<td><?php echo $student_info->email ?></td>
			</tr>
			

			<tr>
				<td><span>Social Security Number:</span></td>
				<td><?php echo $social_security->social_security_number ?></td>
			</tr>
			<tr>
				<td><span>Date of Birth:</span></td>
				<td><?php echo $social_security->date_of_birth ?></td>
			</tr>
			<tr>
				<td><span>Driver's License State:</span></td>
				<td><?php echo $social_security->drivers_license_state ?></td>
			</tr>
			<tr>
				<td><span>Driver's License Number:</span></td>
				<td><?php echo $social_security->drivers_license_number?></td>
			</tr>
			<tr>
				<td><span>Driver's License Status:</span></td>
				<td><?php echo $social_security->drivers_license_status ?></td>
			</tr>
			<tr>
				<td><span>If Suspended, why? </span></td>
				<td><?php echo $social_security->suspended_reason ?></td>
			</tr>

			<tr>
				<td><span>Height:</span></td>
				<td><?php echo $appearance->height ?></td>
			</tr>
			<tr>
				<td><span>Weight:</span></td>
				<td><?php echo $appearance->weight ?></td>
			</tr>
			<tr>
				<td><span>Hair Color:</span></td>
				<td><?php echo $appearance->hair_color ?></td>
			</tr>
			<tr>
				<td><span>Eye Color:</span></td>
				<td><?php echo $appearance->eye_color ?></td>
			</tr>


			<tr>
				<td><span>Race/Ethnic Background:</span></td>
				<td><?php echo $ethnic_background->ethnic_background ?></td>
			</tr>
			<tr>
				<td><span>If Other, please specify:</span></td>
				<td><?php echo $ethnic_background->other_ethnic_background ?></td>
			</tr>
			<tr>
				<td><span>Are you an American Citizen?</span></td>
				<td><?php  echo  $ethnic_background->is_american_citizen == 1 ? "yes" : "no" ?></td>
			</tr>
			<tr>
				<td><span>If Yes, please specify:</span></td>
				<td><?php echo $ethnic_background->american_citizen_type ?></td>
			</tr>
			<tr>
				<td><span>If No, I am a citizen of:</span></td>
				<td><?php echo $ethnic_background->other_citizenship ?></td>
			</tr>


			<tr>
				<td><span>Emergency Contact Name:</span></td>
				<td><?php echo $emergency_contact->emc_name ?></td>
			</tr>
			<tr>
				<td><span>Address Line 1:</span></td>
				<td><?php echo $emergency_contact->emc_address_line1 ?></td>
			</tr>
			<tr>
				<td><span>Address Line 2:</span></td>
				<td><?php echo $emergency_contact->emc_address_line2 ?></td>
			</tr>
			<tr>
				<td><span>City:</span></td>
				<td><?php echo $emergency_contact->emc_city ?></td>
			</tr>
			<tr>
				<td><span>State:</span></td>
				<td><?php echo $emergency_contact->emc_state ?></td>
			</tr>
			<tr>
				<td><span>Zip:</span></td>
				<td><?php echo $emergency_contact->emc_zip_code ?></td>
			</tr>
			<tr>
				<td><span>Home Phone:</span></td>
				<td><?php echo $emergency_contact->emc_home_phone ?></td>
			</tr>
			<tr>
				<td><span>Work Phone:</span></td>
				<td><?php echo $emergency_contact->emc_work_phone ?></td>
			</tr>
			<tr>
				<td><span>Relationship to Student:</span></td>
				<td><?php echo $emergency_contact->emc_relation_to_student ?></td>
			</tr>
			


			<tr>
				<td><span>Reference Name:</span></td>
				<td><?php echo $reference->reference_name ?></td>
			</tr>
			<tr>
				<td><span>Address Line 1:</span></td>
				<td><?php echo $reference->reference_address_line1 ?></td>
			</tr>
			<tr>
				<td><span>Address Line 2:</span></td>
				<td><?php echo $reference->reference_address_line2 ?></td>
			</tr>
			<tr>
				<td><span>City:</span></td>
				<td><?php echo $reference->reference_city ?></td>
			</tr>
			<tr>
				<td><span>State:</span></td>
				<td><?php echo $reference->reference_state ?></td>
			</tr>
			<tr>
				<td><span>Zip:</span></td>
				<td><?php echo $reference->reference_zip_code ?></td>
			</tr>
			<tr>
				<td><span>Home Phone:</span></td>
				<td><?php echo $reference->reference_home_phone ?></td>
			</tr>
			<tr>
				<td><span>Work Phone:</span></td>
				<td><?php echo $reference->reference_work_phone ?></td>
			</tr>
			<tr>
				<td><span>Relationship to Student:</span></td>
				<td><?php echo $reference->reference_relation_to_student ?></td>
			</tr>


			<tr>
				<td><span>Is it easy for you to express your feelings? :</span></td>
				<td><?php echo $personality_info->is_expressive ? "Yes" : "No" ?></td>
			</tr>
			<tr>
				<td><span>Is it easy for you to express your feelings? :</span></td>
				<td><?php echo $personality_info->is_rational ? "Yes" : "No" ?></td>
			</tr>
			<tr>
				<td><span>Explain:</span></td>
				<td><?php echo $personality_info->explanation_is_rational ?></td>
			</tr>
		</table>
	</div>
</div>