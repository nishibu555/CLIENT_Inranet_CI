
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
				<p>Staff Correction</p>
				<img src="<?= base_url().'assets/icon/staff-icon.png' ?>"  style="margin:15% 0%; max-width:200px">
			</div>
		</div>

		<div class="col-md-8">
                <div class="heading_print">
                    <h4>Staff Correction Record</h4>
                </div>
			<div class="table_title" style="margin-top: 30px">
                <div style="width: 98%;" class="print">
                    <img height="30px" width="30px" src="<?= base_url('assets/icon/') ?>print-icon.png" style="float: right; cursor: pointer;"  class="print_icon">
                </div>
				<h5>Staff Correction</h5>
			</div>
			<div style="margin-top: 10px">
				<!--      <p style="font-size: 21px; color: #3d3d3d; font-family: Arial">Kevin Carter</p>-->
			</div>
			<div class="table-responsive">
				<table class="table studentTable">
					<thead>
						<tr>
							<th style="font-size:16px" class=""><?= $staff_detail->fname . ' ' . $staff_detail->lname ?></th>

							<th colspan="2" style="text-align:center" class="">
								<small>Correction Status</small><br>
								<span><?= $staff_detail->status ?></span>
							</th>

						
							 <th style="text-align:right">
								<?php if ($staff_detail->date_submit != '') : ?>
									<small>Date Submitted :</small><span><?= date('m/d/Y', strtotime($staff_detail->date_submit)) ?></span><br>
								<?php endif; ?>
								<?php if ($staff_detail->date_process != '') : ?>
									<small>Date Reviewed :</small><span><?= date('m/d/Y', strtotime($staff_detail->date_process)) ?></span><br>
								<?php endif; ?>
								<?php if ($staff_detail->date_complete != '') : ?>
									<small>Date Due :</small><span><?= date('m/d/Y', strtotime($staff_detail->date_due)) ?></span><br>
								<?php endif; ?>
							</th>
						</tr>
					</thead>

				</table>
			</div>

			<div class="row" style="margin-top: ;">
				<div class="col-md-12 text-center">
					<div style="float: left;">
						<nav aria-label="Page navigation example">
							<ul class="pagination">
								<li class="page-item">
									<?php 
				                    $res_previd=$this->db->select('id')->where(['id<'=>$staff_detail->id, 'staff_id'=>$staff_id, 'delete_flag'=>0])->limit(1)->order_by('id', 'asc')->get('staff_correction')->row();

									if ($res_previd){
										$prev_id = $res_previd->id; 

									?> 
					
										<a class="page-link" href="<?= base_url()."staff_detail/".$prev_id ?>" aria-label="Previous">
											<span aria-hidden="true" style="color:  #0f3a64;">&laquo;</span>
											<span style="color:  #0f3a64; padding-left: 10px">previous</span>
										</a>

									<?php } ?>	
									
								</li>
							</ul>
						</nav>
					</div>
					<span>This is <?= $staff_detail->fname." ".$staff_detail->lname ?>'s <strong><?php echo  $position; if($position==1) echo "st"; else if($position==2) echo "nd"; else if($position==3) echo "rd"; else echo "th" ?></strong> Correction record.</span>
					<div style="float: right;">
						<nav aria-label="Page navigation example">
							<ul class="pagination">
								<li>
									<?php 
				                    $res_nextid=$this->db->select('id')->where(['id>'=>$staff_detail->id, 'staff_id'=>$staff_id, 'delete_flag'=>0])->limit(1)->order_by('id', 'asc')->get('staff_correction')->row();

									if ($res_nextid){ // next exists
										$next_id = $res_nextid->id;

									?>
									
									<a class="page-link" href="<?= base_url()."staff_detail/".$next_id ?>" aria-label="Next">
										<span style="color:  #0f3a64; padding-right: 10px ">next</span>
										<span aria-hidden="true" style="color:  #0f3a64;">&raquo;</span>
									</a>
									
									<?php  } ?>

								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div> 

			<div style="margin-top: 20px">
				<div class="descipline_detail_notes">
					<span>Correction of Infraction</span>
					<p><?= $staff_detail->infraction ?> </p>
				</div>
                   <?php if ($staff_detail->status != 'Pending') : ?>
					<div class="descipline_detail_notes">
						<span>Correction Administered</span><button type="button" class="btn btn-primary float-right" data-toggle="modal" id="editCorrection" data-id="<?= $staff_detail->id ?>">
							Edit
						</button>
						<p id="show_correction_data"><?= $staff_detail->correction != '' ? $staff_detail->correction : 'No Correction has been assigned to this infraction.' ?></p>
					</div>
					<div class="descipline_detail_notes">
						<span>Committee Notes</span><button type="button" class="btn btn-primary float-right" data-toggle="modal" id="editNote" data-target="#editNoteModal" data-id="<?= $staff_detail->id ?>">
							Edit
						</button><br>
						<i id="show_note_data"><?= $staff_detail->notes != '' ? $staff_detail->notes : 'No notes have been recorded for this discipline.' ?> </i>
					</div>
			</div>

			<div style="margin-top: 20px ">
				<div style="float: left;">
					<button id="revert_btn" type="button" class="custom_button" data-id="<?= $staff_detail->id?>" data-status="<?= $staff_detail->status == 'Open' ? 'Pending' : ($staff_detail->status == 'Resolved' ? 'Open' : "") ?>">
						Revert To <?= $staff_detail->status == 'Open' ? 'Pending' : ($staff_detail->status == 'Resolved' ? 'Open' : "") ?>
					</button>
				</div>
                
                <?php if ($staff_detail->status == 'Open'): ?>
                <div style="float: right;">
					<button id="resolved_btn" type="button" class="custom_button" data-status="resolved" data-id="<?= $staff_detail->id?>">
						Resolve Correction
					</button>
				</div>
                <?php endif;?>
			</div>
		<?php else : ?>
			<div class="descipline_detail_notes">
				<span>Correction Administered</span>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" id="editCorrectionPending" data-id="<?= $staff_detail->id ?>">
							Edit
						</button>

				<p id="show_correction_data"><?= $staff_detail->correction != '' ?  $staff_detail->correction : 'No Correction has been assigned to this infraction.' ?></p>
			</div>
            
					<button type="button" class="btn btn-danger" id="deleteBtn" data-id="<?= $staff_detail->id ?>">Delete Record</button>
		<?php endif; ?>
		</div>
	</div>
	<!--row-->
	<!-- Modal -->
	<div class="modal fade" id="editCorrectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Administer Correction </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form autocomplete="off" id="editForm">
						<div class="form-group">
							<label for="exampleInputEmail1">Administer Correction</label>
							<textarea id="correction" type="text" name="correction" class="form-control" placeholder="write something.." rows="5"></textarea>
							<input type="hidden" name="id" value="<?= $staff_detail->id ?>" />
                            <input type="hidden" name="action" id="action"/>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Due Date</label>
							<input type="date" class="form-control" id="date_due" name="date_due" id="exampleInputPassword1" placeholder="">
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>

<!-- Modal -->
<div class="modal fade" id="editNoteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Committee Notes</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form autocomplete="off" id="editNoteForm">
					<div class="form-group">
						<label for="exampleInputEmail1">Committee Notes</label>
						<textarea type="text" id="notes" name="notes" class="form-control" placeholder="write something.." rows="5"></textarea>
						<input type="hidden" name="id" value="<?= $staff_detail->id ?>" />
					</div>
					<button type="submit" class="btn btn-primary" style="width:100%">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
</div>

<script>
    $('#editCorrectionPending').on('click',function(){
        $('#editCorrectionModal').modal('show');
        var id = $(this).data('id');
        $.ajax({
			url: "<?= base_url('staff_correction/admin/editCorrectionData') ?>",
			type: "POST",
			data: {id:id},
			dataType: 'json',
			success: function(data) {
			     $('#correction').val(data.correction);
			     $('#date_due').val(data.date_due);
			     $('#action').val('admin');
			}
		});
    });    
    $('#editCorrection').on('click',function(){
        $('#editCorrectionModal').modal('show');
        var id = $(this).data('id');
        $.ajax({
			url: "<?= base_url('staff_correction/admin/editCorrectionData') ?>",
			type: "POST",
			data: {id:id},
			dataType: 'json',
			success: function(data) {
			     $('#correction').val(data.correction);
			     $('#date_due').val(data.date_due);
			}
		});
    });
	$('#editForm').on('submit', function(event) {
		event.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url: "<?= base_url('staff_correction/admin/add_correction') ?>",
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
					$('#show_correction_data').html(data.html);
					$('#editCorrectionModal').modal('hide');
                    Swal.fire('Good job!','Adminstrator Correction Updated Successfully!','success')
                    if(data.action == 'reload'){
                       location.reload();
                         var href = "<?php echo base_url('staff_correction')?>";
                         window.location.replace(href);
                    }
					
				}
			}
		});
	});
//edit note
     $('#editNote').on('click',function(){
         $('#editnoteModal').modal('show');
        var id = $(this).data('id');
        $.ajax({
			url: "<?= base_url('staff_correction/admin/editNoteData') ?>",
			type: "POST",
			data: {id:id},
			dataType: 'json',
			success: function(data) {
			     $('#notes').val(data.notes);
			}
		});
    });
	$('#editNoteForm').on('submit', function(event) {
		event.preventDefault();
		var formData = new FormData(this);
		$.ajax({
			url: "<?= base_url('staff_correction/admin/edit_note') ?>",
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
					$('#editNoteModal').modal('hide');
					$('#show_note_data').html(data.html);
                    Swal.fire('Good job!','Notes Updated Successfully!','success')
				}
			}
		});
	});
	//delete
	$('#deleteBtn').on('click', function() {
		var id = $(this).data('id');
        var href = "<?php echo base_url('staff_correction')?>";
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
                    url: "<?= base_url('staff_correction/admin/delete_correction') ?>",
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
    //revert
	$('#revert_btn').on('click', function() {
		var id = $(this).data('id');
		var status = $(this).data('status');
		console.log(id);
		$.ajax({
			url: "<?= base_url('staff_correction/admin/revert_correction') ?>",
			type: "POST",
			data: {
				id: id,status:status
			},
			dataType: 'json',
			success: function(data) {

					location.reload();

			}
		});
	});  

    //resolved correction
	$('#resolved_btn').on('click', function() {
        var href = "<?php echo base_url('staff_correction')?>";
		var id = $(this).data('id');
		var status = $(this).data('status');
		
		$.ajax({
			url: "<?= base_url('staff_correction/admin/resolved_correction') ?>",
			type: "POST",
			data: {
				id: id,status:status
			},
			dataType: 'json',
			success: function(data) {

					window.location.replace(href);

			}
		});
	});

</script>


<script>

    $('.print_icon').on('click', function(){
         window.print();
     });
</script>