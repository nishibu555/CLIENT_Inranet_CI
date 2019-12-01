<div class="container">
	<div class="row">
		<div class="col">
			<div class="sub_nav">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="<?= base_url('/') ?>">Home</a></li>
						<li class="breadcrumb-item active"><a href="<?= base_url('/office') ?>">Office</a></li>
						<li class="breadcrumb-item active"><a href="<?= base_url('') ?>">Create or Edit</a></li>
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
						      <option value="<?= base_url()."get_schedule_to_edit/".date('Y-m-d', strtotime($value)) ?>" class="<?= date('Y-m-d', strtotime($value)) ?>"><?= $value ?></option>
						<?php } ?>
					</select>
				</div >
				<div class="col-md-3" style="text-align: center; margin-top: 20px">
					<a href="" class="btn btn-primary score-btn" id="reset_schedule_btn">Reset</a>
					<p style="font-size: 12px">Clears all changes to this schedule.</p>
				</div>
				<div class="col-md-3" style="text-align: center; margin-top: 20px;">
					<a href="" class="btn btn-primary score-btn" id="publish_schedule_btn">Publish</a>
					<p style="font-size: 12px">Makes your changes (red) <br> available to the public (green).</p>
				</div>
				<div class="col-md-12" style="margin-top: 20px">
					<div class="table-responsive">
						<table class="table studentTable" id="schedule_table">
								
	                        

					    </table> 
					</div> 
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
    
	//click edit button of view mode, show edit mode and hide view mode
	$('#schedule_table').on('click','.edit', function(){
        var id = $(this).attr('data-eid');
        $('.view_mode'+id).css('display', 'none');
        $('.edit_mode'+id).css('display', 'table-row');
    });


    $('#schedule_table').on('click','.update', function(){
        var id = $(this).attr('data-uid');
        var week_ending = $(this).attr('data-weekending');
        var employee = $(this).attr('data-employee');

        var schedule = new Array();
        for(var index=0; index<=6; index++){
        	schedule[index] = $('.update_schedule_form'+id+'_'+index).serialize();
        }

        $.ajax({
            method:'POST',
            url: '<?= base_url('update_schedule') ?>',
            data: {
            	     week_ending:week_ending, 
            	     employee:employee,
            	     schedule0:schedule[0],
            	     schedule1:schedule[1],
            	     schedule2:schedule[2],
            	     schedule3:schedule[3],
            	     schedule4:schedule[4],
            	     schedule5:schedule[5],
            	     schedule6:schedule[6]
            	  },
            success:function (data) {
            	//get back updated data for the week ending just updated
            	$.ajax({
		            method:'GET',
		            url: "<?= base_url('get_schedule_to_edit/') ?>"+week_ending,
		            success:function (data) {
		            	$('#schedule_table').html(data);
		            }
				});
            }
		});
        
    });


    $('#schedule_table').on('click','.delete', function(){
        var id = $(this).attr('data-did');

        $.ajax({
            method:'post',
            data: {id:id},
            url: "<?= base_url('delete_schedule') ?>",
            success:function (data) {
            	$('#week_ending_select').trigger('change'); 
            }
		});
    });


    $('#reset_schedule_btn').on('click', function(e){
    	e.preventDefault();
    	//extract only week ending portion from option value
    	var option_value = $("#week_ending_select option:selected").val();
     	var str = '<?= base_url('get_schedule_to_edit/') ?>'; //string to be cut from the value
     	var week_ending = option_value.replace(str, '');

        $.ajax({
        	method: 'post',
        	data: {week_ending: week_ending},
        	url: '<?= base_url('reset_schedule') ?>',
        	success: function(data){
        		$('#week_ending_select').trigger('change'); 
        	}
        });
    });


    $('#publish_schedule_btn').on('click', function(e){
    	e.preventDefault();
    	//extract only week ending portion from href()
    	var option_value = $("#week_ending_select option:selected").val();
     	var str = '<?= base_url('get_schedule_to_edit/') ?>'; //string to be cut from the value
     	var week_ending = option_value.replace(str, '');

        $.ajax({
        	method: 'post',
        	data: {week_ending: week_ending},
        	url: '<?= base_url('publish_schedule') ?>',
        	success: function(data){
        		$('#week_ending_select').trigger('change'); 
        	}
        });
    });


    $('#schedule_table').on('click','.down', function(){
          var week_ending = $(this).attr('data-we');
          var employee = $(this).attr('data-employee');

          $.ajax({
            method: 'post',
            data: {week_ending:week_ending, employee:employee},
            url: '<?= base_url('move_down') ?>',
            success: function(){
                $('#week_ending_select').trigger('change'); 
            }
          });
    });
        


    $('#schedule_table').on('click','.up', function(){
          var week_ending = $(this).attr('data-we');
          var employee = $(this).attr('data-employee');

          $.ajax({
            method: 'post',
            data: {week_ending:week_ending, employee:employee},
            url: '<?= base_url('move_up') ?>',
            success: function(){
                $('#week_ending_select').trigger('change'); 
            }
          });
    });




</script>


<style>
	.edit_mode{
		display: none;
	}
</style>