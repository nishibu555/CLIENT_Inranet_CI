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
						<li class="breadcrumb-item active"><a href="<?= base_url('staff_manager') ?>">Staff Manager</a></li>
						<li class="breadcrumb-item active"><a href="<?= base_url('student_manager') ?>">Active Staff Members</a></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="row mainrow_print">
		<div class="col-md-4">
			<div class="side_div1">
				<p>STAFF MANAGER</p>
				<img src="<?= base_url().'assets/icon/staff-icon.png' ?>" style="margin:15% 0%; max-width:150px;">
			</div>

			<div class="side_div2">
				<div class="inner_side_div2">
					<p>Manually add new staff member below</p>
					<form class="new_student_form1" id="manual_add_form">
						<input type="text" name="fname" placeholder="Fisrt Name">
						<input type="text" name="lname" placeholder="Last Name">
						<span><?php echo validation_errors(); ?></span>
						<button type="button" class="btn btn-primary submit_button">Add Staff Member</button>
					</form>
				</div>
			</div>

			
		</div>

		<div class="col-md-8" id="test">
		   <div class="heading_print">
              <h4>Teen Challenge Active Staff Members</h4>
	        </div>
			<div class="table_title" style="margin-top: 24px">
                <div style="width: 98%;"  class="print">
                    <img height="30px" width="30px" src="<?= base_url('assets/icon/') ?>print-icon.png" style="float: right; cursor: pointer;"  class="print_icon">
                </div>
				<h5>STAFF MANAGER</h5>
			</div>
			<div style="margin-top: 10px">
				<p style="font-size: 21px; color: #3d3d3d; font-family: Arial" class="print">ACTIVE STAFF MEMBERS</p>
			</div>

			<div class="student_academic table-responsive">
				<table class="table studentTable">
					<thead>
						<tr>
							<th style="width:250px" colspan="2">Staff Member</th>
							<th>Correction</th>
							<th class="print">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($active_staff as $key => $value) { ?>
							<tr>
								<td>
									<?php if($value->image==1 && file_exists('assets/images/personnel/'.$value->id.'.jpg')) { ?>
									<a href="<?= base_url('staff_detail/'.$value->id)?>"><img src="<?= base_url('assets/images/personnel/' . $value->id.'.jpg') ?>" style="width: 30px;">
									</a>
									<?php }else{?>
									<a href="<?= base_url('staff_detail/'.$value->id)?>"><img src="<?= base_url('assets/images/personnel/default_profile.jpg') ?>" style="width: 30px;">
									</a>
									<?php } ?>	
								</td>
								<td><?= $value->fname." ".$value->lname ?></td>
								<td>
									<?php $status=$this->db->select('status')->where(['staff_id'=>$value->id, 'status!='=>'Resolved'])->get('staff_correction')->row(); 
									 ?>
									 <?php if(isset($status)) {?>

									  <a href="<?= base_url('staff_correction')?>"><i class="fas fa-check-circle"  style="cursor: pointer; color: #2b8cd1; font-size: 20px;"></i> </a>
									 <?php } else{?> 	
									 <i class="far fa-circle"  style="cursor: pointer; color: #2b8cd1; font-size: 20px;"></i>
									<?php } ?>
								</td>
								<td>
									<a  style="cursor:pointer">
										<i class="far fa-edit edit" data-eid="<?= $value->id ?>"></i>
									</a>
									<a  style="cursor:pointer">
										<i class="far fa-trash-alt delete" data-did="<?= $value->id ?>"></i>
									</a>
								</td>
							</tr>


						<?php } ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
	<!--row-->
</div>


<form id="editFormSubmit">
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputEmail1">First name:</label>
            <input type="text" class="form-control" name="first_name">
            <input type="hidden" class="form-control" name="id" >
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">last name:</label>
            <input type="text" class="form-control" name="last_name">
          </div>
          <div class="form-group">
          	<img src="" class="img" height="40px" width="40px" name="userfile">
            <input type="file" name="userfile">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
</form>





<script>
$('.submit_button').on('click', function(){
	var data=$('#manual_add_form').serialize();
	$.ajax({
			url: "<?= base_url('manually_add_staff') ?>",
			method: "POST",
			data:data,
			success: function(data) 
			{   
				 location.reload();
			}
		});
})


    $('.print_icon').on('click', function(){

        window.print();
     });



$('.delete').on('click', function(){
  var id=$(this).attr('data-did');

  
      	$.ajax({
			url: "<?= base_url('delete_staff_member') ?>",
			type: "POST",
			data:{id:id},
			success: function(data) 
			{   
				 location.reload();
			}
		});

});


  $('.edit').on('click', function(){
		$("#editModal").modal("show");
          var id = $(this).data('eid'); 
          
         $.ajax({
			url: "<?= base_url('get_staff') ?>",
			type: "POST",
			data: {id:id},
            dataType: 'json',
			success: function(data) {
               $("input[name='first_name']").val(data.fname);
               $("input[name='last_name']").val(data.lname);
               $("input[name='id']").val(data.id);
               if(data.image==1){
               	 $(".img").attr('src', '<?= base_url() ?>assets/images/personnel/' + data.id + '.jpg');
               }
               $("#editModal").modal("show");
		      }
		});
});


  $('#editFormSubmit').on('submit', function(event) {
		event.preventDefault();
		var formData = new FormData(this);
		$.ajax({
			url: "<?= base_url('update_satff') ?>",
			method: "POST",
			data: formData,
			processData: false,
			contentType: false,
			dataType: 'html',
			success: function(data) {
				$("#editModal").modal("hide");
				$("#editFormSubmit").trigger('reset');
				location.reload();
			}
		});
});		
</script>

