<div class="container">
	<div class="row">
		<div class="col">
			<div class="sub_nav">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="<?= base_url('/') ?>">Home</a></li>
						<li class="breadcrumb-item active"><a href="<?= base_url('/office') ?>">Office</a></li>
						<li class="breadcrumb-item active"><a href="">Inventory</a></li>
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

		<div class="col-md-8">
            <div class="student_academic_history">
                <div class="table_title" style="margin-top: 30px;">
                    <h5>Inventory:</h5>
                </div>
                <div class="student_contract ">
                    <div class="p-3">
                        Inventory List: 
                        <select style="width:35%" id="getInventoryList">
                          
                            <?php foreach ($inventory_list as $key => $value) { ?>
                            	 <option value="<?= $value->id ?>"><?= $value->name ?></option>
                            <?php } ?>
                        </select>
                        <a href="<?= base_url('manage_inventory_list') ?>"><button class="btn btn-primary float-right">Manage Lists</button></a>
                    </div>
                    <p class="text-center" id="countShow"></p>
                <form id="updateForm">
                     <table class="table text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-left">Title</th>
                                <th>Last&nbsp;Change</th>
                                <th>Inventory</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                         <tbody id="getInventory">
                          
                         </tbody>
                    </table>
                        <div class="text-center">
                        <button type="submit" class="btn btn-primary" style="width: 30%;border-radius: 50px;">Update</button>
                        </div>
                    </form>
                    
                    <form id="addForm">
                      <div class="row">
                        <div class="col-7">
                            <label>New Item</label>
                          <input type="text" class="form-control" placeholder="Title" name="title">
                          <input type="hidden" class="form-control" name="list_id" id="listid">
                        </div>
                        <div class="col-1">
                             <label>Inventory</label>
                          <input type="number" name="inventory" class="form-control" style="height:40px;width:50px;text-align:center">
                        </div>
                        <div class="col-4">
                            <label></label><br>
                          <button class="btn btn-primary" type="submit" style="height: 40px;margin: 7px;width:100%">Submit</button>
                        </div>
                      </div>
                    </form>
                    
                </div>
            </div>
       
		</div>
		<!--row-->
	</div>
<!-- Modal -->

<!-- Modal -->
<form id="editFormSubmit">
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Inventory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" name="title">
            <input type="hidden" class="form-control" name="id" >
          </div>
          <div class="form-group">
            <label for="">Checked out by</label>
              <input type="text" class="form-control" name="checked_out">
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
		$(document).ready(function() {

			//get filter data
            $('#getInventoryList').on('change',function(){
                  $('#getInventory').html('<td colspan="5" class="text-center"></td>');
                 var list_id = $('#getInventoryList option:selected').val(); 
                $.ajax({
					url: "<?= base_url('office/inventory/get_data') ?>",
					type: "POST",
					data: {list_id:list_id},
					dataType: 'json',
					success: function(data) {
						$('#getInventory').html(data.html);
						$('#countShow').html(data.html2);
					}
				});
            })

			//get data
			function get_inventory_data_ajax() {
                 $('#getInventory').html('<td colspan="5" class="text-center"></td>');
                var list_id = $('#getInventoryList option:selected').val();
				$.ajax({
					url: "<?= base_url('office/inventory/get_data') ?>",
					type: "POST",
					data: {list_id:list_id},
					dataType: 'json',
					success: function(data) {
						$('#getInventory').html(data.html);
						$('#countShow').html(data.html2);
					}
				});
			}

			//end
	
      

      $('#editFormSubmit').on('submit', function(event) {
				event.preventDefault();
				var formData = $(this).serialize();
				$.ajax({
					url: "<?= base_url('update_list') ?>",
					type: "POST",
					data: formData,
					success: function(data) {
              $('#getInventoryList').trigger('change'); 
							get_inventory_data_ajax();
							$("#editModal").modal("hide");
							$("#editFormSubmit").trigger('reset');
					}
				});
			});			
    

      $('body').on('click','.editBtn',function(){

          $("#editModal").modal("show");
          var id = $(this).data('id'); 
          
          $.ajax({
  					url: "<?= base_url('get_inventory') ?>",
  					type: "POST",
  					data: {id:id},
            dataType: 'json',
  					success: function(data) {
                   $("input[name='title']").val(data.title);
                   $("input[checked_out='checked_out']").val(data.checked_out);
                   $("input[name='id']").val(data.id);
                   $("#editModal").modal("show");
			      }
				  });
      });


      $('body').on('click','.deleteBtn',function(){
          var id = $(this).data('id'); 
          
          $.ajax({
            url: "<?= base_url('delete_inventory') ?>",
            type: "POST",
            data: {id:id},
            success: function(data) {
                $('#getInventoryList').trigger('change'); 
            }
          });
      });
			//call function

     $("#addForm").on('submit', function(e){
      e.preventDefault();
        var list_id = $('#getInventoryList option:selected').val();
        var c= $("#listid").val(list_id);

        var formData = $(this).serialize();
 
        $.ajax({
            url: "<?= base_url('add_inventory') ?>",
            method: "POST",
            data: formData,
            success: function(data) {
               $('#addForm').trigger("reset");
               $('#getInventoryList').trigger('change'); 
            }
        });
     });





     $("#updateForm").on('submit', function(e){
        e.preventDefault();
        var formData = $(this).serialize();
 
        $.ajax({
            url: "<?= base_url('update_inventory') ?>",
            method: "POST",
            data: formData,
            success: function(data) {
               $('#getInventoryList').trigger('change'); 
            }
        });
     });



 

		get_inventory_data_ajax();

		});



	</script>
