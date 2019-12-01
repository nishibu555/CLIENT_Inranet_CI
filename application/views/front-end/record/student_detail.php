<style>
	select::-ms-expand {
		display: none !important;
	}

	.profile_info a {
		cursor: pointer;
		font-size: 12px;
		font-weight: 700;
		/* position: absolute; */
	}

	.profile_info input {
		/* position: relative; */
		left: 24%;
		height: 29px;
		font-size: 12px;
		margin-top: -6px;
	}

	.profile_info a:hover {
		color: #2b78c2 !important;
	}



	.non_edit {
		background: none;
		border: none;
		font-weight: 600;
		color: #6d6d6d;
		font-size: 12px;
		background: none !important;
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
	}

	.profile_info .fa-check-circle {
		font-size: 20px;
		padding: 7px;
		display: none;
		/* position: absolute; */
		overflow: hidden;
		float: right;
		top: 0%;
		right: 24%;
		cursor: pointer;
	}
</style>
<div class="container">
	<div class="logo_print">
        <img height="" width=""  src="<?= base_url('assets/images/initranet-logo.png') ?>">
    </div>
	<div class="row breadcrumb_print">
		<div class="col">
			<div class="sub_nav">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Home</a></li>
						<li class="breadcrumb-item active"><a href="<?= base_url('records') ?>">Records</a></li>
						<li class="breadcrumb-item active"><a href="<?= base_url('student_manager') ?>">Student manager</a></li>
						<li class="breadcrumb-item active"><a href="#">Active Student</a></li>
						<li class="breadcrumb-item active"><a href="#"><?= $student_info->fname . ' ' . $student_info->lname ?></a></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="row mainrow_print">
		<div class="col-md-3">
			<div class="side_div1">
				<p>RECORDS</p>
				<img style="width: 100%;" src="<?php echo base_url('assets/images/icon_records.png') ?>">

			</div>

		</div>

		<div class="col-md-9">
           <div class="heading_print">
              <h4><?= $student_info->fname . ' ' . $student_info->lname ?>'s Student Profile</h4>
           </div>
			<div class="student_detail_title print">
				<p>STUDENT MANAGER</p>
			</div>
			<div class="student_detail_title2">
                <div style="width: 98%;"  class="print">
                    <img height="30px" width="30px" src="<?= base_url('assets/icon/') ?>print-icon.png" style="float: right; cursor: pointer;"  class="print_icon">
                </div>
				<p class="print"><?= $student_info->fname . ' ' . $student_info->lname ?>: <?= $student_info->status." - " ?>  
				<?php   if($student_info->status == 'discharged')  echo date('m/d/Y', strtotime($student_info->dod));  
				        else if($student_info->status == 'graduate') echo date('m/d/Y', strtotime($student_info->dog));  
				        else echo date('m/d/Y', strtotime($student_info->doe)) ?></p>
			</div>


			<div>
				<div class="student_detail_subtitle1">
					<p>Student Vitals</p>
				</div>
				<div class="row" >
					<div class="col-md-2 text-center">
                      <?php if(!empty($student_info->image)):?>  
						<img id="old_img" src="<? echo base_url()."assets/images/personnel/".$student_info->id.'.jpg' ?>" style="margin-top: 10px;width: 130px;box-shadow: 0px 0px 0px 3px #2b78c24f, 0px 0px 0px 6px #cdd0d3;border-radius: 5px;">
                    <?php else:?>
                        <img id="old_img" src="<?= base_url('assets/images/default_profile.jpg') ?>" style="margin-top: 10px;width: 130px;box-shadow: 0px 0px 0px 3px #2b78c24f, 0px 0px 0px 6px #cdd0d3;border-radius: 5px;">
                    <?php endif;?>
                        <div style="margin-top:10px">
						  <p><a id="upload_button"  style="font-size: 12px; font-weight: 800;text-align: center;cursor:pointer;">Upload Photo</a></p>
						</div>
                        <form id="image_form" style="display:none" enctype="multipart/form-data">
                            <input type="file" name="image" class="form-control" accept="image/*"/>
                            <input type="hidden" name="student_id" value="<?= $student_info->id?>" class="form-control"/>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
					</div>
					<div class="col-md-5 profile_info" style="padding: 0px 25px;">
						<table>
							<tr>
								<td><a data-name="fname">First Name: </a></td>
								<td><input type="text" name="fname" value="<?= @$student_info->fname ?>" disabled class="form-control non_edit" /></td>
								<td><i class="fa fa-check-circle" id="fname_edit_btn"></i></td>
							</tr>
							<tr>
								<td><a data-name="lname">Last Name: </a></td>
								<td><input type="text" name="lname" value="<?= @$student_info->lname ?>" disabled class="form-control non_edit" /></td>
								<td><i class="fa fa-check-circle " id="lname_edit_btn"></i></td>
							</tr>
							<tr>
								<td><a data-name="doe">Date of entry: </a></td>
								<td><input type="text" name="doe" value="<?= date('m/d/Y', strtotime(@$student_info->doe)) ?>" disabled class="form-control non_edit Select_date" /></td>
								<td><i class="fa fa-check-circle " id="doe_edit_btn"></i></td>
							</tr>
							<tr>
                        		<td><a data-name="dog">Completion date: </a></td>
                        		<td><input type="text" name="dog" value="<?= date('m/d/Y', strtotime(@$student_info->dog)) ?>" disabled class="form-control non_edit Select_date" /></td>
                        		<td><i class="fa fa-check-circle " id="dog_edit_btn"></i></td>
                        	</tr>
                        	<tr>
                        		<td><a data-name="dob">Date of birth: </a></td>
                        		<td><input type="text" name="dob" value="<?= @$student_info->dob != '' ? date('m/d/Y', strtotime(@$student_info->dob)) : '' ?>" disabled class="form-control non_edit Select_date" /></td>
                        		<td><i class="fa fa-check-circle " id="dob_edit_btn"></i></td>
                        	</tr>
						
							<tr>
								<td><a data-name="ssn">SSN: </a></td>
								<td><input type="text" name="ssn" value="<?= isset($student_info->ssn) ? @$student_info->ssn : '' ?>" disabled class="form-control non_edit" /></td>
								<td><i class="fa fa-check-circle " id="ssn_edit_btn"></i></td>
							</tr>
							<tr>
								<td><a href="<?= base_url('bed_assignments')?>">Recidence: </a></td>
								<td><input type="text" name="residene" value="<?php if(isset($residence)) echo $residence ?>" disabled class="form-control non_edit" /></td>
								<td><i class="fa fa-check-circle " id="address_line1_edit_btn"></i></td>
							</tr>
							<tr>
								<td><a data-name="doe">Application: </a></td>
								<td><input type="text" name="doe" value="<?= date('m/d/Y', strtotime(@$student_info->doe)) ?>" disabled class="form-control non_edit Select_date" /></td>
								<td><i class="fa fa-check-circle " id="doe_edit_btn"></i></td>
							</tr>
						</table>
					</div>
					<div class="col-md-5 profile_info">
						<table>
							<tr>
								<td><a data-name="counselor_id">Counselor : </a></td>
								<td>
									<select type="text" name="counselor_id" id="counselor_select" disabled class="form-control non_edit ">
										<option>Select Counselor</option>
										<?php foreach ($counselors as $value) : ?>
											<option value="<?= $value->id ?>" <?= $value->id == $student_info->counselor_id ? 'selected' : '' ?>><?= $value->nickname ?></option>
										<?php endforeach; ?>
									</select>
								</td>
								<td><i class="fa fa-check-circle" id="counselor_id_edit_btn"></i></td>
							</tr>
							<tr>
								<td><a data-name="current_phase">Current phase: </a></td>
								<td><input type="text" name="current_phase" value="<?= isset($student_info->current_phase) ? @$student_info->current_phase : '' ?>" disabled class="form-control non_edit" /></td>
								<td><i class="fa fa-check-circle " id="current_phase_edit_btn"></i></td>
							</tr>
							<tr>
								<td><a href="<?= base_url('students_gsnc_psnc/' . $student_info->id) ?>">GSNC: </a></td>
								<td><input type="text" name="gsnc" value="<?php echo @$gsnc_books?>" disabled class="form-control non_edit" /> </td>
								<!-- <td><i class="fa fa-check-circle " id="gsnc_edit_btn"></i></td> -->
							</tr>
							<tr>
								<td><a href="<?= base_url('students_gsnc_psnc/' . $student_info->id) ?>">PSNC: </a></td>
								<td><input type="text" name="psnc" value="<?php echo @$contracts?>" disabled class="form-control non_edit" /></td>
								<td><i class="fa fa-check-circle " id="psnc_edit_btn"></i></td>
							</tr>
							<tr>
								<td><a data-name="married_flag">Married: </a></td>
								<td>
									<select name="married_flag" disabled class="form-control non_edit">
										<option value="1" <?= @$student_info->married_flag == '1' ? 'selected' : '' ?>>Yes</option>
										<option value="0" <?= @$student_info->married_flag == "0" ? 'selected' : '' ?>>No</option>
									</select>
								</td>
								<td><i class="fa fa-check-circle " id="married_flag_edit_btn"></i></td>
							</tr>
							<tr>
								<td><a data-name="court_ordered_flag">Court-ordered: </a></td>
								<td>
									<select name="court_ordered_flag" disabled class="form-control non_edit">
										<option>Select Court Order</option>
										<option value="1" <?= $student_info->court_ordered_flag == '1' ? 'selected' : '' ?>>Yes</option>
										<option value="0" <?= $student_info->court_ordered_flag == '0' ? 'selected' : '' ?>>No</option>
									</select>
								</td>
								<td><i class="fa fa-check-circle " id="court_ordered_flag_edit_btn"></i></td>
							</tr>
							<tr>
								<td><a data-name="school">Education: </a></td>
								<td><input type="text" name="school" value="<?= isset($student_info->school) ? $student_info->school : '' ?>" disabled class="form-control non_edit" /></td>
								<td><i class="fa fa-check-circle " id="school_edit_btn"></i></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<br>
			<div>
				<div class="student_detail_subtitle">
					<p>Students Activity
						<span style="margin-left: 20px; font-size: 11px;" class="print">
							<a href="<?= base_url('activity') ?>" class="text-primary"><i class="fa fa-plus"></i> Add Entry</a>
						</span>
					</p>
				</div>
				<div class="student_detail_description">
					<?php foreach ($student_activity as $activity) : ?>
						<p><span><?= date('D', strtotime($activity->timestamp)) ?></span> <span><?= date('m/d/Y', strtotime($activity->timestamp)) ?> </span>at <span><?= date('h:i:s A', strtotime($activity->timestamp)) ?></span> by <span><?= $activity->author ?></span></p>
						<p>
							<p><?= $activity->data ?></p>
						<?php endforeach; ?>
				</div>
			</div>
			<br>
			<div>
				<div class="student_detail_subtitle">
					<p>Students Chronological
						<span style="margin-left: 20px; font-size: 11px;" class="text-primary print" >
							<a href="<?= base_url('chronologicals/'. $student_info->id) ?>"><i class="fa fa-plus"></i>Add Entry</a>
						</span>
					</p>

				</div>
				<div class="student_detail_description">
					<?php foreach ($student_chronological as $data) : ?>
						<div style="border-bottom: 1px solid #d6d6d6;padding:5px">
							<p> <span><?= date('m/d/Y', strtotime($data->created_at)) ?> </span> <span>Code <?= $data->label_check ?></span> by <span><?= $data->author ?></span></p>
							<p><?= $data->entry_des ?></p>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<br>
			<div>
				<div class="student_detail_subtitle">
					<p>Students Decipline
						<span style="margin-left: 20px; font-size: 11px;"  class="text-primary print">
							<a href="<?= base_url('students-discipline/' . $student_info->id) ?>"><i class="fa fa-plus"></i>Add Entry</a>
						</span>
					</p>
				</div>
				<div class="student_detail_description">
					<?php foreach ($student_discipline as $data) : ?>
						<div style="border-bottom: 1px solid #d6d6d6;padding:5px">
							<p> <span><?= date('m/d/Y', strtotime($data->date_submit)) ?> </span> <?= $data->status ?></p>
							<p><?= $data->infraction ?></p>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<br>
			<!--chnged by nishi---start-->
			<div style="float: right;" class="print">
				<div style="width: 250px">
					<button type="submit" class="btn btn-primary submit_button" id="discharge_student">Discharge Student</button>
				</div>
				<div id="discharge_student_div" style="text-align: center; display: none">
					<form method="post" action="<?= base_url() . 'discharge_student/' . $student_info->id ?>">
						<div class="form-check form-check-inline" style="margin-top: 26px">
							<input class="form-check-input" type="radio" name="status" value="graduate">
							<label class="form-check-label">
								Graduation
							</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="status" value="discharged">
							<label class="form-check-label">
								Discharge
							</label>
						</div>
						<div style="margin-top: 5px"><button type="submit" class="btn btn-primary submit_button" id="discharge_student">Submit</button></div>
					</form>
				</div>
			</div>
			<!--chnged by nishi---end-->

		</div>
		<!--col-9-->
	</div>
	<!--row-->
</div>
<!-- activity Modal start-->
<div class="modal fade" id="add_activity_modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title"><span id="hlabel">Add New</span> Activity</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal Body -->
			<div class="modal-body">
				<div class="statusMsg"></div>
				<form role="form">
					<div class="form-group">
						<label>Activity</label>
						<textarea name="activity"></textarea>
					</div>
					<div class="form-group">
						<label>Tags</label>
						<input type="text" class="form-control" name="lname" id="lname" placeholder="Enter last name">
					</div>
					<input type="hidden" class="form-control" name="id" id="id" />
				</form>
			</div>

			<!-- Modal Footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" id="userSubmit">SUBMIT</button>
			</div>
		</div>
	</div>
</div>

<!--added by nihsi-->
<script>
	$('#discharge_student').click(function() {
		$("#discharge_student_div").show();
	});
    
	$('#upload_button').click(function() {
		$("#image_form").css('display','block');
		$("#upload_button").css('display','none');
	});
     $('#image_form').on('submit', function(e){  
           e.preventDefault();  
            $.ajax({  
                 url:"<?php echo base_url(); ?>student/details/image_upload",   
                 method:"POST",  
                 data:new FormData(this),  
                 contentType: false,  
                 cache: false,  
                 processData:false,  
                 dataType: "json",
                 success:function(res)  
                 {  
                    console.log(res);
                    if(res.success == true){
                     $('#old_img').attr('src','<?= base_url('assets/images/personnel/') ?>'+res.image);   
                     $("#image_form").css('display','none');
		              $("#upload_button").css('display','block');
                    }
                    else{
                      Swal.fire({
                          type: 'error',
                          title: 'Oops...',
                          text: 'Something went wrong!',
                        })
                    }
                 }  
            });  
            });  
   

	//profile edit
	$('.profile_info a').on('click', function() {
		var name = $(this).data('name');
		$("input[name=" + name + "]").removeClass('non_edit');
		$("input[name=" + name + "]").removeAttr('disabled');
		$("select[name=" + name + "]").removeAttr('disabled');
		$("select[name=" + name + "]").removeClass('non_edit');
		$("#" + name + "_edit_btn").css('display', 'block');


		$("#" + name + "_edit_btn").on('click', function() {
			if (name == 'counselor_id' || name == 'married_flag' || name == 'court_ordered_flag') {
				var update_data = $("select[name=" + name + "]").val();
			} else {
				var update_data = $("input[name=" + name + "]").val();
			}
			var url = window.location.pathname;
			var id = url.substring(url.lastIndexOf('/') + 1); //student id from url
			var data = {
				name: name,
				data: update_data,
				student_id: id
			}
			$.ajax({
				url: "<?= base_url('student/details/edit') ?>",
				type: "POST",
				data: data,
				dataType: 'json',
				success: function(data) {
					console.log(data);
					$("input[name=" + name + "]").addClass('non_edit');
					$("input[name=" + name + "]").attr("disabled", "true");
					$("select[name=" + name + "]").addClass('non_edit');
					$("select[name=" + name + "]").attr("disabled", "true");
					$("#" + name + "_edit_btn").css('display', 'none');
				}
			});
		})
	})

	//date picker 
	jQuery.datetimepicker.setLocale('de');

	jQuery('.Select_date').datetimepicker({
		i18n: {
			de: {
				months: [
					'January', 'February', 'March', 'April',
					'May', 'June', 'July', 'August',
					'September', 'October', 'November', 'December',
				],
				dayOfWeek: [
					"Su.", "Mo", "Tu", "We",
					"Th", "Fr", "Sa.",
				]
			}
		},
		timepicker: false,
		format: 'm/d/Y'
	});
</script>
<script>

    $('.print_icon').on('click', function(){
         window.print();
     });
</script>