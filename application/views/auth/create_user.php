<div class="container">
	<div class="row">
		<div class="col">
			<div class="sub_nav">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="<?= base_url('/') ?>">Home</a></li>
						<li class="breadcrumb-item active"><a href="<?= base_url('/settings') ?>">Settings</a></li>
						<li class="breadcrumb-item active"><a href="">Users</a></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>

    
<div class="row">
    <div class="col-md-4">
            <div class="side_div1">
                <p>USERS</p>
                <img style="width: 65%;" src="<?= base_url()?>assets/images/icon_office.png">
            </div>
        </div>
    <div class="col-md-8 bg-white p-4" style="border: 1px solid #98a2a5;">
    <div class="row">
          <div class="col-sm-6"><h5 class="card-title font-weight-bold text-uppercase">All Users</h5></div>
          <div class="col-sm-6 mb-1"><button type="button" class="btn btn-primary float-right" data-toggle="modal" id="add_btn" data-target="#addNewUser"><i class="fa fa-plus"></i>Add User</button></div>
    </div>
        <div style="overflow-x:auto">
       <table id="userDatatable" class="table table-bordered  text-center responsive nowrap" style="font-size:12px">
      <thead>
        <tr>
          <th>#</th>
          <th>Username</th>
          <th>First&nbsp;Name</th>
          <th>Last&nbsp;Name</th>
          <th>Admin</th>
          <th>Academics</th>
          <th>All&nbsp;Contracts</th>
          <th>Marketing</th>
          <th>Work&nbsp;crews</th>
          <th>Fundraising</th>
          <th>View&nbsp;Records</th>
          <th>Edit&nbsp;Records</th>
          <th>Edit&nbsp;Beds</th>
          <th>Edit&nbsp;Schedules</th>
          <th>&nbsp;Directory</th>
          <th>&nbsp;Discipline</th>
          <th>Staff&nbsp;Correction</th>
          <th>Documents</th>
          <th>Inventory</th>
<!--          <th>Status</th>-->
          <th style="pointer-events: none;">Action</th>
        </tr>
      </thead>
                 <form id="edit_form">
      <tbody>

      </tbody>
                     </form>
    </table>
        </div>
    </div>
</div>
<!--end-->
</div>
<!-- add new user modal  -->
<div class="modal fade bd-example-modal-lg show" id="addNewUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-modal="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-white">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

  <div class="row">
    <div class="col-md-12 user_form">
         <div id="infoMessage"><?php echo $message;?></div>
        <form id="addUserForm">
          <div class="row">
            <div class="col">
                <?php echo lang('create_user_fname_label', 'first_name');?> <br />
              <?php echo form_input($first_name);?>
                <br><span class="first_name"></span>
            </div>
            <div class="col">
              <?php echo lang('create_user_lname_label', 'last_name');?> <br />
                <?php echo form_input($last_name);?>
                <br><span class="last_name"></span>
            </div>
          </div>          
        <div class="row ">
            <div class="col emailcol">

           <label for="email">Email (optional):</label>
            <?php echo form_input($email);?>
                <br><span class="email"></span>
            </div>
            <div class="col usernamecol">
             <label>Username:</label>
                <?php echo form_input($username);?>
                <br><span class="username"></span>
            </div>
          </div>        
            <div class="row ">
            <div class="col passwordcol">
                <?php echo lang('create_user_password_label', 'password');?> <br />
                <?php echo form_input($password);?>
                <br><span class="password"></span>
            </div>
            <div class="col password_confirmcol">
             <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
                <?php echo form_input($password_confirm);?>
                <br><span class="password_confirm"></span>
            </div>
          </div>
        <input type="hidden"  name="action" value="">
        <input type="submit" id="submitBtn" name="submit" value="Create User">

        </form>
        
    </div>
</div>
      </div>
    </div>
  </div>
</div><!-- add new user modal  -->
<div class="modal fade bd-example-modal-lg show" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-modal="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-white">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">

  <div class="row">
    <div class="col-md-12 user_form">
         <div id="infoMessage"><?php echo $message;?></div>
        <form id="editForm">
          <div class="row">
            <div class="col">
                <?php echo lang('create_user_fname_label', 'first_name');?> <br />
              <?php echo form_input($first_name);?>
                <br><span class="first_name"></span>
            </div>
            <div class="col">
              <?php echo lang('create_user_lname_label', 'last_name');?> <br />
                <?php echo form_input($last_name);?>
                <br><span class="last_name"></span>
            </div>
          </div> 
        <input type="hidden"  name="id" value="">
        <input type="hidden"  name="action" value="edit">
        <input type="submit" id="submitupdateBtn" name="submit" value="Update User">

        </form>
        
    </div>
</div>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {
 //update checkbox
   $('#userDatatable').on('change', 'tbody input:checkbox', function (){
        // this will contain a reference to the checkbox   
        if (this.checked) {
            // the checkbox is now checked 
            var name = $(this).attr('name');
            var id = $(this).data('id');
            var value = 1;
            $.ajax({
                url : "<?= base_url('settings/update_role')?>",
                type : "POST",
                data: {name:name,id:id,value:value} ,
                dataType: 'json',
                success:function(data){
                    console.log(data);
                 }
            });
            
        } else {
            // the checkbox is now no longer checked
            var name = $(this).attr('name');
            var id = $(this).data('id');
            var value = 0;
             $.ajax({
                url : "<?= base_url('settings/update_role')?>",
                type : "POST",
                data: {name:name,id:id,value:value} ,
                dataType: 'json',
                success:function(data){
                    $('#userDatatable').DataTable().ajax.reload();
                 }
            });
            
        }

   });
    //delete data 
     $('#userDatatable').on('click','tbody .deleteUser',function(){
        var id = $(this).data('id');
        	Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to restore this!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.value) {
					$.ajax({
						url: "<?= base_url('settings/deleteUser') ?>",
						type: "POST",
						data: {
							id: id
						},
						dataType: 'json',
						success: function(data) {
                            $('#userDatatable').DataTable().ajax.reload();
							Swal.fire(
								'Deleted!',
								'User has been deleted.',
								'success'
							)
							

						}
					});
				}
			})
    });
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
   $('#userDatatable').DataTable( {
    "processing": true,
    "serverSide": true,
    "responsive": true,
    "order": [],
    "ajax": {
      url: "<?= base_url()?>register/get_user",
      type:"POST",
    }
  } );
      //edit user 
$('#userDatatable').on('click','tbody .editUser',function(){
        var id = $(this).data('id');
      $.ajax({
        url : "<?= base_url('settings/editData')?>",
        type : "POST",
        data: {id:id},
        dataType: 'json',
        success:function(data){
            console.log(data);
            $('#submitBtn').val('Create User');
            $('.first_name').css('display','none');
            $('.last_name').css('display','none');
            $('.modal-title').html('Edit User');
            $("input[name='first_name']").val(data.first_name);
            $("input[name='last_name']").val(data.last_name);
            $("input[name='id']").val(data.id);
            $('#editUserModal').modal('show');

          }    
        });
    
});
   
$('#add_btn').click(function(){
       $("#addUserForm")[0].reset();
        $('#submitBtn').val('Create User');
        $('.first_name').css('display','none');
        $('.last_name').css('display','none');
        $('.email').css('display','none');
        $('.username').css('display','none');
        $('.password').css('display','none');
        $('.password_confirm').css('display','none');
        $('#addNewUser').modal('show');
});
// update data

//add new entry 
$('#addUserForm').on('submit',function(event){
  event.preventDefault();
    $('#submitBtn').val('sending...');
    
  $.ajax({
    url : "<?= base_url('settings/create_user')?>",
    type : "POST",
    data: new FormData(this) ,
    processData: false,
    contentType: false,
    dataType: 'json',
    success:function(data){
        console.log(data);
      if (data.error_list)
      {
        $('#submitBtn').val('Create User');
       $.each(data.error_list, function(key,val) {
         $('.'+key).text(val).css('color','red');
         $('.'+key).text(val).css('display','block');
       });
     }else
     {
       Swal.fire('Good job!',data.msg,'success')
      $("#addUserForm")[0].reset();
        $('#submitBtn').val('Create User');
      $('#addNewUser').modal('hide');
      $('.modal-backdrop').remove();
      $('#userDatatable').DataTable().ajax.reload();

        }
      }    
    });
    
});
      //add new entry 
$('#editForm').on('submit',function(event){
  event.preventDefault();
    $('#submitupdateBtn').val('updating...');
    
  $.ajax({
    url : "<?= base_url('settings/create_user')?>",
    type : "POST",
    data: new FormData(this) ,
    processData: false,
    contentType: false,
    dataType: 'json',
    success:function(data){
        console.log(data);
      if (data.error_list)
      {
        $('#submitupdateBtn').val('Update User');
       $.each(data.error_list, function(key,val) {
         $('.'+key).text(val).css('color','red');
         $('.'+key).text(val).css('display','block');
       });
     }else
     {
       Swal.fire('Good job!',data.msg,'success')
      $("#editForm")[0].reset();
        $('#submitupdateBtn').val('Update User');
      $('#editUserModal').modal('hide');
      $('.modal-backdrop').remove();
      $('#userDatatable').DataTable().ajax.reload();

        }
      }    
    });
    
});
});
</script>
      
   

   

