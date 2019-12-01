<div class="container">
	<div class="row">
		<div class="col">
			<div class="sub_nav">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="<?= base_url('/') ?>">Home</a></li>
						<li class="breadcrumb-item active"><a href="<?= base_url('/office') ?>">Office</a></li>
						<li class="breadcrumb-item active"><a href="<?= base_url('office/schedules') ?>">Staff Schedule</a></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="side_div1">
				<p>EMPLOYEE <br>SCHEDULES</p>
				<img style="width: 100%;" src="<?php echo base_url() ?>assets/images/icon_records.png">
			</div>

		</div>

		<div class="col-md-9">
			<div class="table_title" style="margin-top: 30px;">
				<h5>Employee Schedules:</h5>
			</div>
			<div class="row" style="margin-top: 10px">
				<div class="col-md-6" style="text-align: left;">
					<small>Week Ending</small>
					<select class="form-controll" id="week_ending_select">
						<?php foreach ($week_ending as $value) { ?>
							<option value="<?= base_url()."get_schedule/".$value->week_ending ?>">
								<?= "Saturday ".date('m/d/Y', strtotime($value->week_ending)) ?>
							</option>
						<?php } ?>
					</select>
				</div >
				<div class="col-md-6" style="text-align: right; padding-top: 20px">
					<a href="<?php echo base_url()?>office/edit_schedule" class="btn btn-primary score-btn">Create or Edit</a>
				</div>
				<div class="col-md-12" style="margin-top: 10px">
					<table class="table studentTable" id="schedule_table">
							
                        

				    </table>  
				</div>
			</div>
		</div>
	</div>
</div>


<script>

   $( document ).ready(function() {
         var href = $("#week_ending_select option:selected").val();

        $.ajax({
            method:'GET',
            url: href,
            success:function (data) {
            	$('#schedule_table').html(data);
            }
		});  
    });

    
	
	$('#week_ending_select').on('change', function() {
		var href = $("#week_ending_select option:selected").val();

        $.ajax({
            method:'GET',
            url: href,
            success:function (data) {
            	$('#schedule_table').html(data);
            }
		}); 
	});
	
</script>