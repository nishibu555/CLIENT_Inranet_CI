<div class="container">
	<div class="logo_print">
        <img height="" width=""  src="<?= base_url('assets/images/initranet-logo.png') ?>">
    </div>
	<div class="row breadcrumb_print">
		<div class="col">
			<div class="sub_nav">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('records') ?>">Records</a></li>
						<li class="breadcrumb-item active"><a href="<?= base_url('student_manager') ?>">Student Manager</a></li>
						<li class="breadcrumb-item active"><a href="<?= base_url('student_manager') ?>">Active Students</a></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="row mainrow_print">
		<div class="col-md-4">
			<div class="side_div1">
				<p>STUDENT MANAGER</p>
				<img src="<?= base_url().'assets/icon/student-manager.png' ?>" style="margin:15% 0%; max-width:150px;">
			</div>

			<div class="side_div1">
				<p>INCOMING STUDENTS</p>
				<div style="margin: 5% 10%">
					<small class="side_div1_text">These potential students have submitted pending online applications.</small>
					<div style="margin: 30px 0px;">
						<select id="incoming_student">
							<option value="">Select an applicant</option>
							<?php foreach ($incoming_student as $incoming_student) { ?>
								<option value="<?php echo base_url() . "incoming_student_detail/" . $incoming_student->student_id ?>"><?php echo $incoming_student->first_name . "" . $incoming_student->last_name ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>

			<div class="side_div2">
				<div class="inner_side_div2">
					<p>Manually add new student below</p>
					<form class="new_student_form1" id="manual_add_form">
						<input type="text" name="first_name" placeholder="Fisrt Name">
						<input type="text" name="last_name" placeholder="Last Name">
						<span><?php echo validation_errors(); ?></span>
						<button type="submit" class="btn btn-primary submit_button">Add Student</button>
					</form>
				</div>
			</div>

			<div class="side_div1">
				<p>STUDENTS ARCHIVE</p>
				<div style="margin: 5% 10%">
					<small class="side_div1_text">These students have either graduated or been discharged from the program</small>
					<div style="margin: 30px 0px;">
						<select id="std_archive">
							<option value="">-- select one --</option>
							<?php foreach ($archive_student as $student) : ?>
								<option value="<?= base_url('student_detail' . '/' . $student->id) ?>"><?= $student->fname . ' '. $student->lname ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-8" id="test">
		   <div class="heading_print">
              <h4>Teen Challenge Active Student Roster</h4>
	        </div>
			<div class="table_title" style="margin-top: 24px">
                <div style="width: 98%;"  class="print">
                    <img height="30px" width="30px" src="<?= base_url('assets/icon/') ?>print-icon.png" style="float: right; cursor: pointer;"  class="print_icon">
                </div>
				<h5>STUDENTS MANAGER</h5>
			</div>
			<div style="margin-top: 10px">
				<p style="font-size: 21px; color: #3d3d3d; font-family: Arial" class="print">ACTIVE STUDENTS</p>
			</div>

			<div class="student_academic table-responsive">
				<table class="table studentTable">
					<thead>
						<tr>
							<th style="width:250px" colspan="2">Student name</th>
							<th>Entry date</th>
							<th>Grad date</th>
							<th>Discipline</th>
							<th>Count order</th>
							<th>Phase</th>
							<th>GSNC</th>
							<th>PSNC</th>
							<th>Counselor</th>
							<th>Residence</th>
							<th class="print">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($informationOfStdManagers as $value) : ?>
							<tr>
								<td>
									<?php if ($value['image'] != 1) : ?>
										<a href="<?= base_url('student_detail' . '/' . $value['id']) ?>"><img src="<?= base_url('assets/images/default_profile.jpg') ?>" style="width: 40px;"></a>
									<?php else : ?>
										<a href="<?= base_url('student_detail' . '/' . $value['id']) ?>"><img src="<? echo base_url()."assets/images/personnel/".$value['id'].'.jpg' ?>" style="width: 40px;"></a>
									<?php endif; ?>
								</td>
								<td>
									<p><a href="<?= base_url('student_detail'. '/'.$value['id']) ?>"><?= $value['name'] ?></a></p>
									<ul>
<!--										<li>Development plan is late</li>-->
									</ul>
								</td>

								<td><?= date('m/d/y', strtotime($value['entry_date'])) ?></td>
								<td><?= date('m/d/y', strtotime($value['grad_date'])) ?></td>

								<td>
									<?php $res=$this->db->where(['student_id'=> $value['id'], 'status !='=>'resolved', 'delete_flag'=>'0'])->get('discipline')->row(); ?>

								    <?php  if(isset($res)) { ?>
                                        <a href="<?= base_url('students-discipline') ?>" style="cursor:pointer">
											<i class="fas fa-check-circle" style="color: #2b8cd1; font-size: 20px;"></i>
										</a>

								    <?php }else{ ?>

								     <a  style="cursor:pointer">
											 <i class="far fa-circle"  style="color: #2b8cd1; font-size: 20px;"></i>
										</a>
								    
								      <?php  }  ?>
								    
    							</td>
    							
    							<td>
    								<?php  if($value['court_ordered_flag'] == 0) { ?>
                                        <a>
											<i class="far fa-circle"  style="color: #2b8cd1; font-size: 20px;"></i>
										</a>

								    <?php }else{ ?>
										<a>
											<i class="fas fa-check-circle"  style="color: #2b8cd1; font-size: 20px;"></i>
										</a>
								    <?php  }  ?>

    								
    							</td>

								<td><?= $value['current_phase'] == '' ? '0' : $value['current_phase'] ?></td>

								<td><?php if(isset($value['gsnc'])) echo @$value['gsnc']; else echo '0';  ?></td>
								<td><?php if(isset($value['psnc'])) echo @$value['psnc']; else echo '0';  ?></td>
								<td><?php if(isset($value['counselor_name'])) echo @$value['counselor_name']; else echo '';  ?></td>
								<td><?php if(isset($value['residence'])) echo @$value['residence']; else echo '';  ?></td>
							

								<td class="print">
									<span class="pull-right edit_menu">
										<a href="<?= base_url('student_detail' . '/' . $value['id']) ?>">
											<i class="far fa-edit"></i>
										</a>
										<a data-id="<?= $value['id'] ?>" class="deleteBtn" style="cursor:pointer">
											<i class="far fa-trash-alt"></i>
										</a>
									</span>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!--row-->
</div>

<script>
	$(document).ready(function() {

		$('#incoming_student').on('change', function() {
			var href = $("#incoming_student option:selected").val();
			window.location.replace(href);
		});


		$('#std_archive').on('change', function() {
			var href = $("#std_archive option:selected").val();
			window.location.replace(href);
		});



		$('#manual_add_form').on('submit', function(event) {
			event.preventDefault();
			var formData = new FormData(this);

			$.ajax({
				url: "<?= base_url('student_manager/manual_std/store') ?>",
				type: "POST",
				data: formData,
				processData: false,
				contentType: false,
				dataType: 'json',
				success: function(data) {
					if (data.error_list) {
						$.each(data.error_list, function(key, val) {
							$('.' + key).text(val).css('color', 'red');
						});
					} else {
						$("#manual_add_form")[0].reset();
						location.reload();
					}
				}
			});
		});
		//delete student 
		$('.deleteBtn').click(function() {
			var id = $(this).data('id');
			console.log(id);
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.value) {
					$.ajax({
						url: "<?= base_url('delete_student') ?>",
						type: "POST",
						data: {
							id: id
						},
						dataType: 'json',
						success: function(data) {
							Swal.fire(
								'Deleted!',
								'Your file has been deleted.',
								'success'
							)
							location.reload();

						}
					});
				}
			})
		});
	});
</script>


<style>
    /*checkbox design of student manager page */
/*added by nishi*/
.studentTable .container{ 
  position: relative;
 
}

.studentTable input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

.checkmark {
      cursor: pointer;
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px; 
  border-radius:50%;
      border: 2px solid #2b78c2;
}

.studentTable input:checked ~ .checkmark {
  background-color: #2b78c2;
  border-radius:50%;
}

.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

.studentTable input:checked ~ .checkmark:after {
  display: block;
}

.studentTable .checkmark:after {
    left: 7px;
    top: 2px;
    width: 8px;
    height: 14px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

/*checkbox design of student manager page */
/*added by nishi   -----end*/
</style>
<script>

    $('.print_icon').on('click', function(){
        window.print();
     });
</script>