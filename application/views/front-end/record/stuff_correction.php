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
						<li class="breadcrumb-item active"><a href="<?= base_url('staff_correction') ?>">Staff Correction</a></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="row mainrow_print">
		<div class="col-md-4">
			<div class="side_div1">
				<p>STAFF CORRECTION</p>
				<img src="<?= base_url().'assets/icon/staff-icon.png' ?>"  style="margin:15% 0%; max-width:200px">
			</div>

			<div class="side_div1">
				<p>WRITES-UP</p>
				<div style="margin: 5% 10%">
					<small class="side_div1_text">This disciplinary infractions have been documented and are pending review by the disciplinary committee.</small>
					<div style="margin: 30px 0px;">
						<select id="incoming_student">
							<option value=""><?= count($pending_stuff) ?> Pending Records</option>
							<?php foreach ($pending_stuff as $value) : ?>
								
								<option value="<?= base_url('staff_detail' . '/' . $value->id) ?>"><?= $value->fname . " " . $value->lname . ' - ' . date('n/j/y', strtotime($value->date_submit)) ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			</div>

			<div class="side_div2">
				<div class="inner_side_div2">
					<a href="<?php echo base_url() . "new_write_up" ?>"><button type="submit" class="btn btn-primary submit_button">New Write Up</button></a>
					<small>Report an infraction to be reviewed
						by the correction committee.</small>
				</div>
			</div>

			<div class="side_div1">
				<p>ARCHIVES</p>
				<div style="margin: 5% 10%">
					<small class="side_div1_text">These infractions for current staff
						members have been reviewed and any
						correction has been completed.</small>
					<div style="margin: 30px 0px;">
						<select id="staff_archive">
							<option value=""><?= count($resolved_stuff) ?> Resolved Records</option>
							<?php foreach ($resolved_stuff as $value) : ?>
                            
								<option value="<?= base_url('staff_detail' . '/' . $value->id) ?>"><?= $value->fname . " " . $value->lname. ' - ' . date('n/j/y', strtotime($value->date_submit)) ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-8">
           <div class="heading_print">
            <h4>Open Staff Correction</h4>
           </div>
			<div class="table_title" style="margin-top: 30px">
                <div style="width: 98%;"  class="print">
                    <img height="30px" width="30px" src="<?= base_url('assets/icon/') ?>print-icon.png" style="float: right; cursor: pointer;"  class="print_icon">
                </div>
				<h5>STAFF CORRECTION</h5>
			</div>
			<div style="margin-top: 10px" class="print">
				<p style="font-size: 21px; color: #3d3d3d; font-family: Arial">Staff Correction</p>
			</div>

			<div class="table-responsive">
				<table class="table common_table text-left">
					<thead>
						<tr>
							<th></th>
							<th>Staff Member</th>
							<th>Assigned</th>
							<th>Due Date</th>
							<th>#</th>
							<th>Correction Administered</th>
						</tr>
					</thead>

					<tbody>
						<?php $i=0; foreach ($correction_staff as  $value) { ?>

		               <?php 
		                    $result2 = $this->db->query('select count(*) as `position` from staff_correction where `id` <= '.$value->id.' and staff_id='.$value->staff_id.' and delete_flag=0')->result();

		                    $position = $result2[0]->position;
		                ?>


							<!--<tr <?php if($value->status == 'Open') echo 'style="background-color:#ff9999"'; ?>>-->
							<tr>
                                <td>
                                    <?php if (isset($value->image) && $value->image==1) : ?>
										<a href="<?= base_url('staff_detail/'.$value->id)?>"><img src="<?= base_url('assets/images/personnel/' . $value->staff_id.'.jpg') ?>" style="width: 30px;"></a>
									<?php else : ?>
										<a href="<?= base_url('staff_detail/'.$value->id)?>"><img src="<?= base_url('assets/images/default_profile.jpg') ?>" style="width: 30px;"></a>
									<?php endif; ?>
                                </td>
                                <td><a href="<?= base_url('staff_detail/'.$value->id)?>"><?= $value->fname . " " . $value->lname ?></a></td>
								<td><?= $value->date_process != NUll?  date('m/d/Y',strtotime( $value->date_process)) : '' ?></td>
								<td><?=  $value->date_due != NUll?  date('m/d/Y',strtotime( $value->date_due)) : '' ?></td>
								<td><?= $position ?></td>
								<td><?= $value->correction != ''? $value->correction : 'Pending' ?></td>
							</tr>
						<?php } ?>
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

		$('#staff_archive').on('change', function() {
			var href = $("#staff_archive option:selected").val();
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
						$("#form_data")[0].reset();
						$('#addNewpage').modal('hide');
						$('.modal-backdrop').remove();
						$('#pageDatatable').DataTable().ajax.reload();
						location.reload();
					}
				}
			});
		});
	});
</script>

<script>
    $('.print_icon').on('click', function(){
         window.print();
     });
</script>