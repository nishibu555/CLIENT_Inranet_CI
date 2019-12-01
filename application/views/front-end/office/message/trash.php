<div class="container">
	<div class="row">
		<div class="col">
			<div class="sub_nav">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="<?= base_url('/') ?>">Home</a></li>
						<li class="breadcrumb-item active"><a href="<?= base_url('/office') ?>">Office</a></li>
						<li class="breadcrumb-item active"><a href="<?= base_url('office/messages') ?>">Message Center</a></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-3">
			<div class="side_div1">
				<p>MESSAGE <br> CENTER</p>
				<img style="width: 100%;" src="<?php echo base_url() ?>assets/images/icon_records.png">
			</div>
		</div>

		<div class="col-md-9">
			<div class="row">
				<div class="col-md-10">
					<div class="table_title" style="margin-top: 30px;">
						<h5>Message Center:</h5>
					</div>
					<div style="margin-top: 10px">
						<p style="font-size: 21px; color: #3d3d3d; font-family: Arial">
							<span style="cursor: pointer;" id="my_trash">My Trash</span>
							<span>
								<button type="button" class="btn btn-primary score-btn" id="restore_trash">Restore Selected</button>
					
								<button type="button" class="btn btn-primary score-btn" id="empty_trash">Empty Trash</button>
						    </span>
						</p>
					</div>
					<div>
						<table class="message_table">
							<thead></thead>
						    <form id="form3">
							<tbody id="tbody_outbox">
								<tr>
                                	<td><input type="checkbox" name="select_all" id="select_all" >Select all</td>
                                </tr>
								<?php foreach ($trash as $key => $value) {?>
								<tr>		
									<td>
										<input type="checkbox" name="selected_msg[]" value="<?= $value->id ?>">
                                        <?php $user = $this->ion_auth->user()->row()->username; ?>
										<span><?php if($value->from == $user) echo "To:  " ?> <?= $value->first_name." ".$value->last_name?></span>
									</td>
									<td>
										<?php echo substr($value->message, 0, 70)?>
										<a href=""> Read More</a>
									</td>
								</tr>
								<?php } ?>
							</tbody>
							</form>
						</table>
					</div>
				</div>
				<div class="col-md-2" style="margin-top: 50px">
					<div class="message" style="text-align: center;">
						<div>
							<img height="70px" width="70px" src="<?= base_url()?>assets/icon/compose.png"> 
							<a href="<?=  base_url('office/messages/compose')?>"><p>Compose Message</p></a>
						</div>

						<div>
							<!-- <img height="70px" width="70px" src="<?= base_url()?>assets/icon/compose.png"> -->
							<a href="<?=  base_url('office/messages')?>"><p>Inbox</p></a>
						</div>

						<div>
							<!-- <img height="70px" width="70px" src="<?= base_url()?>assets/icon/compose.png"> -->
							<a href="<?=  base_url('office/messages/outbox')?>"><p>Outbox</p></a>
						</div>

						<div>
							<!-- <img height="70px" width="70px" src="<?= base_url()?>assets/icon/compose.png"> -->
							<a href="<?=  base_url('office/messages/trash')?>"><p>Trash</p></a>
						</div>
						
					</div>
				</div>
			</div>
		</div>

	</div><!--row-->
</div>


<style type="text/css">
	.message_table{
		width: 100%
	}
.message_table tbody td span{
    font-size: 10.71px;
    font-family: Arial;
    text-align: left;
    padding-left: 0px;
    color: #2b78c2;
    font-weight: 600
}
.message_table tbody td{
    padding-top: 10px;
    font-size: 10.71px;
    color: #3b4552;
}
.message p{
	font-size: 10.71px;
    font-family: Arial;
    color: #2b78c2;
}
</style>


<script>
	$('#empty_trash').on('click', function(){
       var value = $('#form3').serialize();

       $.ajax({
            method:'POST',
            data: value,
            url: '<?php  echo base_url('empty_trash')?>',
            success:function (data) {
            	location.reload();
            }
		});
	});


	$('#restore_trash').on('click', function(){
       var value = $('#form3').serialize();

       $.ajax({
            method:'POST',
            data: value,
            url: '<?php  echo base_url('restore_trash')?>',
            success:function (data) {
            	location.reload();
            }
		});
	});


	$('#select_all').click(function(event) {   
	    if(this.checked) {
	        // Iterate each checkbox
	        $(':checkbox').each(function() {
	            this.checked = true;                        
	        });
	    } else {
	        $(':checkbox').each(function() {
	            this.checked = false;                       
	        });
	    }
    });

</script>
