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
                <form id="add_list">
                <div style="margin-top: 10px">
                  <div class="row">
                    <div class="col">
                      <label>New List Name</label>
                      <input type="text"  class="form-control" name="name">
                    </div>
                    <div class="col">
                      <label>New List Description</label>
                      <input type="text"  class="form-control" name="description">
                    </div>
                    <div class="col">
                      <label></label>
                        <button type="submit" class="btn btn-primary submit_button"  style="margin-top: 13px">Submit</button>
                    </div>
                  </div>
                </div>
                </form>

                <div class="student_contract " style="margin-top: 20px">
                    <table class="table studentTable">
                      <thead>
                        <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Number of Items</th>
                        <th>Total Inventory</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($all_list as $key => $value) { ?>
                          <tr>
                           <td><?= $value->name ?></td>
                           <td><?= $value->description ?></td>
                           <?php 
                              $items= $this->db->query('select count(`id`) as totla_item from inventory_items where list_id= "'.$value->id.'" ')->row();


                              $inventory= $this->db->query('select sum(inventory) as totla_inventory from inventory_items where list_id= "'.$value->id.'" ')->row();

                              
                            ?>
                            <td><?=  $items->totla_item ?></td>
                            <td><?=  $inventory->totla_inventory ?></td>

                            <td><i class="fa fa-edit edit_list" style="cursor: pointer;" data-id="<?= $value->id ?>"></i></td>                           
                            <td><i class="fa fa-trash delete_list" style="cursor: pointer;" data-id="<?= $value->id ?>"></i></td>
                          </tr> 
                        <?php } ?>

                       
                      </tbody>
                    </table>
                </div>
            </div>
       
		</div>
		<!--row-->
	</div>
<!-- Modal -->
<form id="update_list">
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Inventory List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="name">
            <input type="hidden" class="form-control" name="id" >
          </div>
          <div class="form-group">
            <label for="">Description</label>
              <input type="text" class="form-control" name="description">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
</form>


<script type="text/javascript">
  
  $("#add_list").on('submit', function(e){
     e.preventDefault();
     var formData = $(this).serialize();
      $.ajax({
          url: "<?= base_url('add_inventory_list') ?>",
          method: "POST",
          data: formData,
          success: function(data) {
             location.reload();
          }
      });
  });

  $(".delete_list").on('click', function(){
    var id= $(this).data('id');

    
      $.ajax({
          url: "<?= base_url('delete_list') ?>",
          method: "POST",
          data: {id:id},
          success: function(data) {
             location.reload();
          }
      });
  });



  $(".edit_list").on('click', function(){
      var id = $(this).data('id'); 
      
      $.ajax({
        url: "<?= base_url('get_list') ?>",
        type: "POST",
        data: {id:id},
        dataType: 'json',
        success: function(data) {
               $("input[name='name']").val(data.name);
               $("input[name='description']").val(data.description);
               $("input[name='id']").val(data.id);
               $("#editModal").modal("show");
        }
      });
  });


  $('#update_list').on('submit', function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
          url: "<?= base_url('update_list') ?>",
          method: "POST",
          data: formData,
          success: function(data) {
              $("#editModal").modal("hide");
              $("#editFormSubmit").trigger('reset');
              location.reload();
          }
        });
  }); 

</script>
