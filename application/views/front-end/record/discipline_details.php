 <div class="container">
    <div class="logo_print">
        <img height="" width=""  src="<?= base_url('assets/images/initranet-logo.png') ?>">
    </div>
    <div class="row breadcrumb_print">
  <div class="col">
  <div class="sub_nav">
  <nav aria-label="breadcrumb">
 <ol class="breadcrumb">
   <li class="breadcrumb-item active"><a href="<?= base_url()?>">Home</a></li>
   <li class="breadcrumb-item active" ><a href="<?= base_url('records')?>">Records</a></li>
   <li class="breadcrumb-item active" ><a href="<?= base_url('students-discipline')?>">Discipline Manager</a></li>
 </ol>
</nav>
  </div>
  </div>
  </div>
  <div class="row mainrow_print">
<div class="col-md-4">
<div class="side_div1">
<p>DISCIPLINE MANAGER</p>
<img src="<?= base_url().'assets/icon/student-manager.png' ?>" style="margin:15% 0%; max-width:150px;">
</div>
</div>

<div class="col-md-8">
    <div class="heading_print">
        <h4>Student Discipline Record</h4>
    </div>
      <div class="table_title" style="margin-top: 24px">
	    <div style="width: 98%;" class="print">
	        <img height="30px" width="30px" src="<?= base_url('assets/icon/') ?>print-icon.png" style="float: right; cursor: pointer;"  class="print_icon">
	    </div>
      <h5>DISCIPLINE MANAGER</h5>
      </div>
      <div style="margin-top: 10px">
<!--      <p style="font-size: 21px; color: #3d3d3d; font-family: Arial">Kevin Carter</p>-->
      </div>
      <div class="table-responsive">
          <table class="table studentTable">
            <thead>
              <tr>
                <th style="font-size:16px"><?= $dis_detail->fname." ".$dis_detail->lname ?></th>
                <th></th>

                <th colspan="2" style="text-align:center">
                    <small>Discipline Status</small><br>
                    <span><?= $dis_detail->status?></span>
                  </th>
                <th style="text-align:right">
                    
                    <small>Date Submitted: </small><span>  <?= date('m/d/Y',strtotime($dis_detail->date_submit))?></span><br>
                    <small>Date Reviewed: </small><span>  <?= date('m/d/Y',strtotime($dis_detail->date_process))?></span><br>
                    <small>Date Due: </small><span>  <?= date('m/d/Y',strtotime($dis_detail->date_due))?></span><br>
                    
                  </th>
              </tr>
            </thead>

          </table>
      </div>
      
      <div class="row print" style="margin-top: ;">
        <div class="col-md-12 text-center">
          <div style="float: left;">
              <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item">

                  	<?php 
                    $res_previd=$this->db->select('id')->where(['id<'=>$dis_detail->id, 'student_id'=>$student_id, 'delete_flag'=>0])->limit(1)->order_by('id', 'asc')->get('discipline')->row();

					if ($res_previd){ // next exists
						$prev_id = $res_previd->id; 

					?> 
					

                    <a class="page-link" href="<?= base_url().'students/discipline/details/'.$prev_id ?>" aria-label="Previous">
                      <span aria-hidden="true" style="color:  #0f3a64;">&laquo;</span>
                      <span style="color:  #0f3a64; padding-left: 10px">previous</span>
                    </a>

                    <?php } ?>
                     
                  </li>
                </ul>
              </nav>
          </div>
            <span >This is <?= $dis_detail->fname." ".$dis_detail->lname ?>'s <strong> <?php echo  $position; if($position==1) echo "st"; else if($position==2) echo "nd"; else if($position==3) echo "rd"; else echo "th" ?></strong> discipline record.</span>
          <div style="float: right;">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li>
                    <?php 
                    $res_nextid=$this->db->select('id')->where(['id>'=>$dis_detail->id, 'student_id'=>$student_id, 'delete_flag'=>0])->limit(1)->order_by('id', 'asc')->get('discipline')->row();

					if ($res_nextid){ // next exists
						$next_id = $res_nextid->id;

					?>
  	
                    <a class="page-link" href="<?= base_url().'students/discipline/details/'.$next_id ?>" aria-label="Next">
                      <span style="color:  #0f3a64; padding-right: 10px " >next</span>
                      <span aria-hidden="true"style="color:  #0f3a64;" >&raquo;</span>
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
					<span>Description of Infraction</span>
					<p><?= $dis_detail->infraction ?> </p>
				</div>
                    <?php if ($dis_detail->status != 'Pending') : ?>
					<div class="descipline_detail_notes">
						<span>Discipline  Administered</span><button type="button" class="btn btn-primary float-right" data-toggle="modal" id="editDiscipline" data-id="<?= $dis_detail->id ?>">
							Edit
						</button>
						<p id="show_Discipline_data"><?= $dis_detail->discipline != '' ? $dis_detail->discipline : 'No discipline has been assigned to this infraction.' ?></p>
					</div>
					<div class="descipline_detail_notes">
						<span>Committee Notes</span><button type="button" class="btn btn-primary float-right" data-toggle="modal" id="editNote" data-target="#editNoteModal" data-id="<?= $dis_detail->id ?>">
							Edit
						</button><br>
						<i id="show_note_data"><?= $dis_detail->notes != '' ? $dis_detail->notes : 'No notes have been recorded for this discipline.' ?> </i>
					</div>
			</div>

			<div style="margin-top: 20px ">
				<div style="float: left;">
					<button id="revert_btn" type="button" class="custom_button" data-id="<?= $dis_detail->id?>" data-status="<?= $dis_detail->status == 'Open' ? 'Pending' : ($dis_detail->status == 'Resolved' ? 'Open' : "") ?>">
						Revert To <?= $dis_detail->status == 'Open' ? 'Pending' : ($dis_detail->status == 'Resolved' ? 'Open' : "") ?>
					</button>
				</div>
                
                <?php if ($dis_detail->status == 'Open'): ?>
                <div style="float: right;">
					<button id="resolved_btn" type="button" class="custom_button" data-id="<?= $dis_detail->id?>">
						Resolve Discipline
					</button>
				</div>
                <?php endif;?>
			</div>
		<?php else : ?>
			<div class="descipline_detail_notes">
				<span>Discipline Administered</span>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" id="editDisciplinePending" data-id="<?= $dis_detail->id ?>">Edit	</button>

				<p id="show_Discipline_data"><?= $dis_detail->discipline != '' ?  $dis_detail->discipline : 'No Discipline has been assigned to this infraction.' ?></p>
			</div>
            
					<button type="button" class="btn btn-danger" id="deleteBtn" data-id="<?= $dis_detail->id ?>">Delete Record</button>
		<?php endif; ?>


  </div>
</div><!--row-->
	<!-- Modal -->
	<div class="modal fade" id="editDisciplineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Administer Discipline </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form autocomplete="off" id="editForm">
						<div class="form-group">
							<label for="exampleInputEmail1">Administer Discipline</label>
							<textarea id="admin_discipline" type="text" name="admin_discipline" class="form-control" placeholder="write something.." rows="5"></textarea>
							<input type="hidden" name="id" value="<?= $dis_detail->id ?>" />
                            <input type="hidden" name="action" id="action">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Due Date</label>
							<input type="date" class="form-control" id="due_date" name="due_date" id="exampleInputPassword1" placeholder="">
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
						<textarea type="text" id="committee_notice" name="committee_notice" class="form-control" placeholder="write something.." rows="5"></textarea>
						<input type="hidden" name="id" value="<?= $dis_detail->id ?>" />
					</div>
					<button type="submit" class="btn btn-primary" style="width:100%">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
 </div>


<script>
    $('#editDisciplinePending').on('click',function(){
        $('#editDisciplineModal').modal('show');
        var id = $(this).data('id');
        $.ajax({
			url: "<?= base_url('staff_Discipline/admin/editDisciplineData') ?>",
			type: "POST",
			data: {id:id},
			dataType: 'json',
			success: function(data) {
			     $('#admin_discipline').val(data.discipline);
			     $('#due_date').val(data.date_due);
			     $('#action').val('admin');
			}
		});
    });    
    $('#editDiscipline').on('click',function(){
        $('#editDisciplineModal').modal('show');
        var id = $(this).data('id');
        $.ajax({
			url: "<?= base_url('staff_Discipline/admin/editDisciplineData') ?>",
			type: "POST",
			data: {id:id},
			dataType: 'json',
			success: function(data) {
			     $('#admin_discipline').val(data.discipline);
			     $('#due_date').val(data.date_due);
			}
		});
    });
	$('#editForm').on('submit', function(event) {
		event.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url: "<?= base_url('staff_Discipline/admin/store_edit_discipline') ?>",
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
					$('#show_Discipline_data').html(data.html);
					$('#editDisciplineModal').modal('hide');
                    Swal.fire('Good job!','Adminstrator Discipline Updated Successfully!','success')
					if(data.action == 'reload'){
                       location.reload();
                    }
				}
			}
		});
	});
//edit note
     $('#editNote').on('click',function(){
         $('#editNoteModal').modal('show');
        var id = $(this).data('id');
        $.ajax({
			url: "<?= base_url('staff_Discipline/admin/editNoteData') ?>",
			type: "POST",
			data: {id:id},
			dataType: 'json',
			success: function(data) {
			     $('#committee_notice').val(data.notes);
			}
		});
    });
	$('#editNoteForm').on('submit', function(event) {
		event.preventDefault();
		var formData = new FormData(this);
		$.ajax({
			url: "<?= base_url('staff_Discipline/admin/store_edit_note') ?>",
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
        var href = "<?php echo base_url('students-discipline')?>";
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
                    url: "<?= base_url('staff_Discipline/admin/delete_Discipline') ?>",
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
                        window.location.replace(href);

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
			url: "<?= base_url('staff_Discipline/admin/revert_Discipline') ?>",
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
    //resolved Discipline
	$('#resolved_btn').on('click', function() {
        var href = "<?php echo base_url('students-discipline')?>";
		var id = $(this).data('id');
		$.ajax({
			url: "<?= base_url('staff_Discipline/admin/resolved_Discipline') ?>",
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