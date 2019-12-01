<div class="container">
	<div class="row">
		<div class="col">
			<div class="sub_nav">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('marketing') ?>">Marketing</a></li>
						<li class="breadcrumb-item active"><a href="<?= base_url('marketing/churches') ?>">Churches</a></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-3">
			<div class="side_div1">
				<p>CHURCHES</p>
				<img src="<?= base_url().'assets/icon/student-manager.png' ?>" style="margin:15% 0%; max-width:150px;">
			</div>
		</div>

		<div class="col-md-9">
			
			<div class="table_title" style="margin-top: 24px">
				<h5>CHURCHES</h5>
				<small><?= $all_churches_count ?> records found</small>
			</div>
			<div style="margin: 10px 0px">
				<form id="myform">
				<div class="row justify-content-center">
					<div class="col-md-4">
						<select class="form-control" id="select_city" name="select_city">
							<option value="">All Cities</option>
							<?php foreach ($all_city as $city) { ?>
							<option value="<?php echo $city->city ?>" ><?= $city->city ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-md-4">
						<select class="form-control" id="select_state" name="select_state">
							<option value="">All States</option>
							<?php foreach ($all_state as $state) { ?>
							<option value="<?php echo $state->state ?>" >
								<?= $state->state ?>
							</option>
							<?php } ?>
						</select>
					</div>
					<div class="col-md-4">
						<select class="form-control" id="select_zip" name="select_zip">
							<option value="">All Zips</option>
							<?php foreach ($all_zip as $zip) { ?>
							<option value="<?php echo $zip->zip ?>" >
								<?= $zip->zip ?></option>
							<?php } ?>
						</select>
					</div>
			</div>
		
            
            <div style="margin: 15px 0px">
            	<div class="row">
            		<div class="col-md-6" style="text-align: left;">
							<input type="text" name="search_text" class="search" style="margin-right: 5px">
							<img src="<?php echo base_url() ?>assets/images/icon_search.png">
							<button type="button" class="int_btn" id="search">SEARCH</button>
            		</div>
            		</form>

            		<div class="col-md-6" style="text-align: right;">
            			 <a href="<?= base_url('add_church') ?>"><button type="button" class="btn btn-primary score-btn">Add New</button></a>
            		</div>
            	</div>
            </div>

            <div class="table-responsive">
            	<table class="table studentTable">
            		<thead>
            			<tr>
							<th><a href="#" id="sort_church">Church</a></th>
							<th>Address</th>
							<th>Contact</th>
							<th>Phone</th>
							<th>Email</th>
							<th>History</th>
							<th>Notes</th>
							<th>Action</th>
						</tr>
            		</thead>

            		<tbody id="filter_result">
            			<?php foreach ($all_churches as $key => $value) { ?>
            		    <tr id="tr" style="background-color: #<?= $value->highlight	 ?>">
            		    	<td><?php echo $key+1; ?> <?php echo ". ".$value->church ?></td>
            		    	<td><?php echo $value->addr1 ?></td>
            		    	<td><?php echo $value->contact ?></td>
            		    	<td><?php echo $value->phone ?></td>
            		    	<td><?php echo $value->email ?></td>
            		    	<td><?php echo $value->history ?></td>
            		    	<td><?php echo substr($value->notes , 0 , 100)."..." ?><a href="">More</a></td>
            		    	<td>
								<span class="pull-right edit_menu">
									<a href="<?=  base_url()."edit_church/".$value->id ?>">
										<i class="far fa-edit"></i>
									</a>
									<a href="<?=  base_url()."delete_church/".$value->id ?>">
										<i class="far fa-trash-alt"></i>
									</a>
								</span>
							</td>
            		    </tr>		
            			<?php } ?>
            		</tbody>
            	</table>
            </div>
		</div><!--col-md-9-->

	</div>
	<!-- main row-->
</div>

<script>

	function getSearch(){
		var value = $('#myform').serialize();
		console.log(value);

		$.ajax({
			url: "<?php echo base_url('filter_chruch') ?>",
			type: "POST",
			dataType: 'json',
			data: value,
			success: function(data) {
				$('#filter_result').html(data);
				
			}
		});
	}

	$('#select_city').on('change', function() {
		getSearch();
	});	

	$('#select_state').on('change', function() {
		getSearch();
	});	

	$('#select_zip').on('change', function() {
		getSearch();
	});	
    
    $('#search').on('click', function(){
    	getSearch();
    });


    $('#sort_church').on('click', function(e){
    	e.preventDefault(); 
		$.ajax({
			url: "<?php echo base_url()?>sort_church",
			type: "GET",
			dataType: 'json',
			success: function(data) {
				console.log(data);
				$('#filter_result').html(data);
			}
		});
    });
    

//pending  more button
</script>


