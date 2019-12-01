<div class="container">
	<div class="row">
		<div class="col">
			<div class="sub_nav">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="<?= base_url('/') ?>">Home</a></li>
						<li class="breadcrumb-item active"><a href="<?= base_url('/office') ?>">Office</a></li>
						<li class="breadcrumb-item active"><a href="">Directory</a></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
            <div class="side_div1">
                <p>OFFICE</p>
                <img style="width: 100%;" src="<?= base_url()?>assets/images/icon_office.png">
            </div>
		</div>

		<div class="col-md-8"  data-target="#directory"  class="main_directory" data-spy="scroll">
            <nav id="directory" class="navbar">
              <ul class="nav nav-pills" id="getTopDirectory">
             <?php foreach($directory_letters as $value):?>
                  
                <li class="nav-item">
                  <a class="nav-link" href="#<?php echo($value->letters)?>"><?php echo($value->letters)?></a>
                </li>
            <?php endforeach;?>
                  <li style="padding:5px"><button class="btn btn-danger"><i class="fa fa-plus text-white" data-toggle="modal" data-target="#addModal"></i></button></li>
              </ul>
            </nav>
            <div class="directory_content"  data-target="#directory" data-offset="0" id="getDirectory">

            </div>
		</div>
		<!--row-->
	</div>
<!-- Modal -->
       <form id="submitForm">
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Directory Entry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="title" placeholder="Enter name">
              <small class="title"></small>
          </div>
          <div class="form-group">
            <label for="">Contact Information</label>
              <textarea type="text" class="form-control" name="content"></textarea>
              <small class="content"></small>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
          </form>
<!-- Modal -->
       <form id="editFormSubmit">
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Directory Entry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="title" placeholder="Enter name">
              <small class="title"></small>
            <input type="hidden" class="form-control" name="id" >
            <input type="hidden" class="form-control" name="action" value="edit">
          </div>
          <div class="form-group">
            <label for="">Contact Information</label>
              <textarea type="text" class="form-control" name="content"></textarea>
              <small class="content"></small>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="deleteBtn">Delete</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
          </form>

	<script>
		$(document).ready(function() {

			//get data
			function get_directory_data_ajax() {
                 $('#getDirectory').html('<p class="text-center">loading..</p>');
				$.ajax({
					url: "<?= base_url('office/directory/get_data') ?>",
					type: "GET",
					processData: false,
					contentType: false,
					dataType: 'json',
					success: function(data) {
						$('#getDirectory').html(data);
					}
				});
			}
			//end

			//end
			$('#submitForm').on('submit', function(event) {
				event.preventDefault();
				var formData = new FormData(this);
				$.ajax({
					url: "<?= base_url('office/save_directory') ?>",
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
							var msg = data.msg;
							Swal.fire(
								'Good job!',msg,'success'
							)
							get_directory_data_ajax();
							$("#addModal").modal("hide");
							$("#submitForm").trigger('reset');
						}

					}
				});
			});			
            $('#editFormSubmit').on('submit', function(event) {
				event.preventDefault();
				var formData = new FormData(this);
				$.ajax({
					url: "<?= base_url('office/update_directory') ?>",
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
							var msg = data.msg;
							Swal.fire(
								'Good job!',msg,'success'
							)
							get_directory_data_ajax();
							$("#editModal").modal("hide");
							$("#editFormSubmit").trigger('reset');
						}

					}
				});
			});			
            $('#editFormSubmit').on('click','#deleteBtn', function() {
				var id = $(this).data('id');
                console.log(id);
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
						url: "<?= base_url('office/delete_directory') ?>",
						type: "POST",
						data: {id:id},
						dataType: 'json',
						success: function(data) {
							Swal.fire('Deleted!','Library been deleted.','success');
                            $("#editModal").modal("hide");
                            $("#editFormSubmit").trigger('reset');
                            get_directory_data_ajax();
						}
					});
				}
			})

			});
            $('body').on('click','#editBtn',function(){
               var id = $(this).data('id'); 
                $.ajax({
					url: "<?= base_url('office/get_edit_data') ?>",
					type: "POST",
					data: {id:id},
					dataType: 'json',
					success: function(data) {
                       $("input[name='title']").val(data.title);
                       $("textarea[name='content']").val(data.content);
                       $("input[name='id']").val(data.id);
                       $("#deleteBtn").attr('data-id',data.id);
                       $("#editModal").modal("show");
					}
				});
            });
			//call function          
			get_directory_data_ajax();

		});
	</script>
