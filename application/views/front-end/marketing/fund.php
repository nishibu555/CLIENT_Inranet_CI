<div class="container">
	<div class="row">
		<div class="col">
			<div class="sub_nav">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="<?= base_url('/') ?>">Home</a></li>
						<li class="breadcrumb-item active"><a href="<?= base_url('marketing') ?>">Marketing</a></li>
						<li class="breadcrumb-item active"><a href="">Fund raising</a></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="side_div1">
				<p>MARKETING</p>
				<img style="width: 100%;" src="<?php echo base_url() ?>assets/images/icon_records.png">
			</div>

		</div>

		<div class="col-md-9">
			<!-- <form id="add_activity_form" autocomplete="off"> -->
			<form class="add_activity_form" id="fund_raising_log" autocomplete="off">
				<div class="row">
					<div class="col-md-9">
						<div class="student_activity_log">
							<div class="table_title" style="margin-top: 30px;">
								<h5>Fund Raising Log:</h5>
							
							</div>
							<div class="student_academic"><br>
			                        <div class="form-group row">
			                            <label class="col-md-4 col-form-label">Date:</label>
			                            <div class="col-sm-8">
			                                <input class="form-control" id="Select_date" name="date" placeholder="Select a Date" required>
			                                <span class="date"></span>
			                            </div>
			                        </div>
			                        <div class="form-group row">
			                            <label class="col-md-4 col-form-label">Description:</label>
			                            <div class="col-sm-8">
			                                <textarea rows="2" style="width: 100%" name="description" required></textarea>
			                                <span class="description"></span>
			                            </div>
			                        </div>
			                        <div class="form-group row">
			                            <label class="col-md-4 col-form-label">Team:</label>
			                            <div class="col-sm-8" >
											<select multiple class="form-control select2" name="tags[]">
											    
											</select>
			                            </div>
			                        </div>
			                        <div class="form-group row">
			                            <label class="col-md-4 col-form-label">Amount:</label>
			                            <div class="col-sm-8">
			                                <input type="number" class="form-control" name="amount" required>
			                                <span class="amount"></span>
			                            </div>
			                        </div>
									<br>
									<button type="submit" class="btn btn-primary score-btn mt-2" id="fund_btn">Add Entry</button>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="activity_log">
							<label>Archives</label>
							<select name="archive_date" id="date">
								<option value=""></option>
								<?php foreach ($archive_date as $archive_date) { ?>
								  <option value="<?= $archive_date->subdate ?>"><?= date("F Y",strtotime($archive_date->subdate)) ?></option>
								<? } ?>
							</select>
						</div>
					</div>
				</div>
			</form>
			<div class="col-md-12" style="margin-top: 40px;">
				<div class="row">
					<div class="col-md-12" id="total" style="margin-bottom: 20px ">
                       
					</div>
				</div>
				<div class="row">
					<div class="col-md-12" id="get_fund">

					</div>
				</div>

			</div>
			<!--row-->

		</div>
		<!--row-->
	</div>


<script src="<?php echo base_url('assets/validate/jquery.validate.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery.fcbkcomplete.js')?>"></script>

<script>
	jQuery.datetimepicker.setLocale('de');

	jQuery('#Select_date').datetimepicker({
		i18n: {
			de: {
				months: [
					'January', 'February', 'March', 'April',
					'May', 'June', 'July', 'August',
					'September', 'October', 'November', 'December',
				],
				dayOfWeek: [
					"Su.", "Mo", "Tu", "We",
					"Th", "Fr", "Sa.",
				]
			}
		},
		timepicker: false,
		format: 'm/d/Y'
	});
</script>



<script>

	function get_fund() {
		$.ajax({
			url: "<?= base_url('get_fund') ?>",
			type: "GET",
			processData: false,
			contentType: false,
			dataType: 'json',
			success: function(data) {
				$('#get_fund').html(data.html);
				$('#total').html(data.html2);
			}
		});
	}


   $('#date').on('change',function(){
        var date = $(this).val();
        
    	$.ajax({
				url: "<?= base_url('fund_date_filter') ?>",
				type: "POST",
				data: {date:date},
				dataType: 'json',
				success: function(data) {
					$('#get_fund').html(data.html);
				   $('#total').html(data.html2);
				}
		});
    })



	$("#fund_raising_log").validate({
        submitHandler: function () {
            var value = $('#fund_raising_log').serialize();
      
            $.ajax({
                    method:'POST',
                    data:value,
                    url:"<?php echo base_url('save_fund') ?>",
                    success:function (data) {
                        var res = JSON.parse(data);
                        if (res.error_list){
                            $.each(res.error_list, function(key,val) {
                                $('.'+key).text(val).css('color','red');
                            });
                        }
                        else{
                        	$('#fund_raising_log').trigger("reset");
                        	$('.select2').val(null).trigger('change');
                        	get_fund();
                        }
                    }
             }); 
        }
    });


   
 $(document).ready(function() {
    $('.select2').select2({
	    ajax: { 
		   url: "<?= base_url('get_tags') ?>",
		   type: "post",
		   dataType: 'json',
		   data: function (params) {
		    return {
		      searchTerm: params.term 
		    };
		   },
		   processResults: function (response) {
		     return {
		        results: response
		     };
		   },
		   cache: true
	    }
	});
 });


 get_fund();

</script>
