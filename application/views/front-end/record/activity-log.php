<div class="container">
	<div class="logo_print">
        <img height="" width=""  src="<?= base_url('assets/images/initranet-logo.png') ?>">
    </div>
	<div class="row breadcrumb_print">
		<div class="col">
			<div class="sub_nav">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="<?= base_url('/') ?>">Home</a></li>
						<li class="breadcrumb-item active"><a href="<?= base_url('/records') ?>">Records</a></li>
						<li class="breadcrumb-item active"><a href="">Activity Log</a></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="row mainrow_print">
		<div class="col-md-3">
			<div class="side_div1">
				<p>RECORDS</p>
				<img style="width: 100%;" src="<?php echo base_url() ?>assets/images/icon_records.png">
			</div>

		</div>

		<div class="col-md-9">
			<form id="add_activity_form" autocomplete="off">
				<div class="row">
					<div class="col-md-9">
						<div class="heading_print">
		                    <h4>Teen Challenge Activity Log</h4>
		                </div>
						<div class="student_activity_log">
			                <div style="width: 98%;"  class="print">
			                    <img height="30px" width="30px" src="<?= base_url('assets/icon/') ?>print-icon.png" style="float: right; cursor: pointer;"  class="print_icon">
			                </div>
							<div class="table_title" style="margin-top: 30px;">
								<h5>Student Manager:</h5>
							</div>
							<div class="student_academic">
								<p style="margin-top: 6px;">ACTIVITY LOG</p>
								<textarea style="margin-bottom: 15px;" rows="4" class="form-control input-border resize" name="activity" placeholder="Enter Activity"></textarea>
								<input type="hidden" name="student_id" value="<?php echo isset($student_id) ? $student_id : '' ?>">
								<span class="activity"></span>
								<select class="form-control input-border resize ajax-tags-multiple" name="tags[]" multiple="multiple" placeholder="Enter tags">
									<?php foreach ($tags as $tag) : ?>
										<option value="<?= $tag->id ?>"><?= $tag->fname . ' ' . $tag->lname ?></option>
									<?php endforeach; ?>
								</select>
								<span class="tags"></span>
								<span class="message"></span>
								<button type="submit" class="btn btn-primary score-btn mt-2" id="activity_btn">Add Activity</button>

							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="activity_log">
							<label>Activity Log Archive</label>
							<input class="form-control input-border" id="Select_date" name="activity_date" placeholder="Select a Date">
							<span class="activity_date"></span>
						</div>
					</div>
				</div>
			</form>
			<div class="col-md-12" style="margin-top: 40px;">
				<div class="row">
					<div class="col-md-9" id="getActivity">

					</div>
					<div class="col-md-3">

					</div>
				</div>

			</div>
			<!--row-->

		</div>
		<!--row-->
	</div>


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
		$(document).ready(function() {
			//start select 2
			$('.ajax-tags-multiple').select2({
				placeholder: "Enter tags",
			});
			//end selecct 2
			//get data
			function get_activity_data_ajax() {
                 $('#getActivity').html('<p class="text-center">searching..</p>');
				$.ajax({
					url: "<?= base_url('ajax/activity/get_data') ?>",
					type: "GET",
					processData: false,
					contentType: false,
					dataType: 'json',
					success: function(data) {
						$('#getActivity').html(data);
					}
				});
			}
			//end
			//filter data
			function filter_data_by_ajax() {


				$("body").delegate("#Select_date", "click", function() {
					var src_date = $(this).val();
					if (typeof(src_date) != "undefined" && src_date !== '') {
                        $('#getActivity').html('<p class="text-center">searching..</p>');
						$.ajax({
							url: "<?= base_url('ajax/get_data/date_filter') ?>",
							type: "POST",
							data: {
								src_date: src_date
							},
							dataType: 'json',
							success: function(data) {
								$('#getActivity').html(data);
							}
						});
					}
				});

			}
			//end
			$('#add_activity_form').on('submit', function(event) {
				event.preventDefault();
				var formData = new FormData(this);
				$.ajax({
					url: "<?= base_url('save_activity_value') ?>",
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
								'Good job!',
								msg,
								'success'
							)
							get_activity_data_ajax();
							$("#add_activity_form").trigger('reset');
						}

					}
				});
			});
			//call function          
			get_activity_data_ajax();
			filter_data_by_ajax();

		});
	</script>

<script>
    $('.print_icon').on('click', function(){
         window.print();
     });
</script>