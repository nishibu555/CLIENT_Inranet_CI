<div class="container">
	<div class="row">
		<div class="col">
			<div class="sub_nav">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="<?= base_url('/') ?>">Home</a></li>
						<li class="breadcrumb-item active"><a href="<?= base_url('work') ?>">Work</a></li>
						<li class="breadcrumb-item active"><a href="">Resources</a></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="side_div1">
				<p>RESOURCES</p>
				<img style="width: 100%;" src="<?php echo base_url() ?>assets/images/icon_records.png">
			</div>

		</div>

		<div class="col-md-9">
			<div class="row">
				<div class="col-md-9">
					<div class="student_activity_log">
						<div class="table_title" style="margin-top: 30px;">
							<h5>Resources:</h5>
						</div>

						
						<div>
							<p style="margin-top: 6px">Entry Here</p>
							<form id="create_resource_form">
								
								  <div class="form-group row">
								    <label for="staticEmail" class="col-sm-3 col-form-label">Resource Name:</label>
								    <div class="col-sm-9">
								     <input type="text" class="form-control" name="name">
								    </div>
								  </div>
								  <div class="form-group row">
								    <label for="inputPassword" class="col-sm-3 col-form-label">Choose Type: </label>
								    <div class="col-sm-9">
								    	<label class="radio-inline">
									      <input type="radio" name="type" value="Communication" style="margin-right: 5px">Communication
									    </label>
									    <label class="radio-inline" style="margin-left: 20px">
									      <input type="radio" name="type" value="Vehicle" style="margin-right: 5px">Vehicle
									    </label>
								    </div>
								  </div>

									<button type="button" class="btn btn-primary score-btn"  id="create_resource_btn">Add Entry</button>
							</form>
						</div>
						<div>
							<table class="table common_table" style="margin-top: 80px">
			            		<thead>
			            			<tr>
										<th>Name</th>
										<th>Type</th>
										<th>Image</th>
										<th>Action</th>
									</tr>
			            		</thead>
			            		<tbody>
			            			<?php foreach ($resources as $key => $value) { ?>
			            			     <tr class="view_mode<?= $value->id ?>">
			            			     	<td class="name<?= $value->id ?>"><?= $value->resource_name ?></td>
			            			     	<td class="type<?= $value->id ?>"><?= $value->resource_type ?></td>
			            			     	<td class="image<?= $value->id ?>">
			            			     		<?php if(file_exists('assets/images/resources/'.$value->id.'.png')) {?>
			            			     		<img height="30px" width="30px" src="<?= base_url()."/assets/images/resources/".$value->id.".png"  ?>">
			            			     	    <?php } ?>
			            			     	</td> 
			            			     	<td>
												<span class="pull-right edit_menu">
													<i class="far fa-edit edit_resource" style="cursor: pointer;" edit-id="<?= $value->id ?>"></i>
													<i class="far fa-trash-alt delete_resource" delete-id="<?= $value->id ?>" style="cursor: pointer;"></i>
												</span>
											</td>
			            			     </tr>
                                       
                                         
			            			     <tr class="edit_mode edit_mode<?= $value->id ?>">
			            			     <form id="update_resource_form<?= $value->id ?>">	
			            			     	<input type="hidden" name="id" value="<?= $value->id ?>">
			            			     	<td><input type="text" name="name" value="<?= $value->resource_name ?>"></td>
			            			     	<td>
                                               <input type="radio" name="type" value="Communication" <?php if($value->resource_type=='Communication') echo 'checked'?> >Communication

								               <input type="radio" name="type" value="Vehicle" <?php if($value->resource_type=='Vehicle') echo 'checked'?> >Vehicle
			            			     	</td>
			            			     	<td class="image<?= $value->id ?>">
			            			     		<?php if(file_exists('assets/images/resources/'.$value->id.'.png')) {?>
			            			     		<img height="30px" width="30px" src="<?= base_url()."/assets/images/resources/".$value->id.".png"  ?>">
			            			     	    <?php } ?>
			            			     		<br>Change image
			            			     		<input type="file" name="userfile">
			            			     	</td>
			            			     	<td>
												<span class="pull-right edit_menu">
													<i class="far fa-edit update_resource" style="cursor: pointer;" update-id="<?= $value->id ?>">Update</i>
													<i class="far fa-trash-alt delete_resource" delete-id="<?= $value->id ?>"  style="cursor: pointer;"></i>
												</span>
											</td>
											</form>
			            			     </tr>
			            			     
			            			<?php } ?>
			            		</tbody>
			            	</table>	
						</div>
					</div>
				</div>
		    </div>		
		</div>

		<!--row-->
	</div>
</div>	


<script src="<?php echo base_url('assets/validate/jquery.validate.js')?>"></script>



<script>
	$('.edit_resource').on('click', function(){
		var id = $(this).attr('edit-id');
		
        $('.view_mode'+id).css('display', 'none');
        $('.edit_mode'+id).css('display', 'table-row');
	});


	$('.update_resource').on('click', function(){
		var id = $(this).attr('update-id');	
		var formid = 'update_resource_form'+id;

		var value = new FormData(document.querySelector('#'+formid));

		 $.ajax({
                method:'POST',
                data:value,
                dataType: 'json',
				processData: false,
				contentType: false,
                url:"<?php echo base_url('update_resource') ?>",
                success:function (data) {
                	$('.name'+id).html(data.data.resource_name);
                	$('.type'+id).html(data.data.resource_type);
                	
                	// if(data.img != null){
                	//   var img_src = "<?= base_url().'assets/images/resources/'?>"+data.img;
                	//    $('.image'+id).attr("src", img_src);
                	// }

                    $('.view_mode'+id).css('display', 'table-row');
                    $('.edit_mode'+id).css('display', 'none');
                }
         }); 
	});


    $('#create_resource_btn').on('click', function(){
    	
    	var value = $('#create_resource_form').serialize();

    	$.ajax({
                method:'POST',
                data:value,
                url:"<?php echo base_url('create_resource') ?>",
                success:function (data) {
                	location.reload();
                }
        }); 
    });


    $('.delete_resource').on('click', function(){
    	var id = $(this).attr('delete-id');
    	$.ajax({
                method:'POST',
                data:{id:id},
                url:"<?php echo base_url('delete_resource') ?>",
                success:function (data) {
                	$('.view_mode'+id).css('display', 'none');
                	$('.edit_mode'+id).css('display', 'none');
                }
        }); 
    });

</script>


<style type="text/css">

	.edit_mode{
		display: none;
	}

</style>