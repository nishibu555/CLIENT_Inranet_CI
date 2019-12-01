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
						<p style="font-size: 21px; cursor: pointer;color: #3d3d3d; font-family: Arial" id="my_inbox">My Inbox<br>
							<span style="font-size: 14px;">Inbox: <?=  $inbox_count ?> Unread: <?=  $unread_count ?></span>
							<span style="float: right">
								<button type="button" class="btn btn-primary score-btn" id="delete_inbox">Delete Selected</button>
						    </span><br>
						</p>
					</div>
					<div class="">
						<table class="message_table">
							<thead></thead>
							<tbody id="inbox_tbody">
                                <form id="form2">
                                	<tr>
                                		<td><input type="checkbox" name="select_all" id="select_all" >Select all</td>
                                	</tr>
								<?php foreach ($all_inbox as $key => $value) {?>
									<tr>
									<td>
										<input type="checkbox" name="selected_msg[]" value="<?= $value->id ?>" class="test">
										<span><?php echo $value->from_fname." ".$value->from_lname?></span>
									</td>
									
									<td>
										<a href="<?=  base_url()."get_inbox/".$value->id ?>" class="inbox_message"> 
										<?php echo substr($value->message, 0, 70)?>
										Read More
										<span style="float: right; color:#3b4552; font-weight: 600 "><?php echo  $value->reply_flag == 1 ? 'replied' : ''  ?><?php echo date('n/j/y', strtotime($value->timestamp)); ?>
										</span>
										</a>
									</td>
									
								</tr>
								<?php } ?>
								</form>
							</tbody>
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


<script type="text/javascript">
		$('#delete_inbox').on('click', function(){
       var value = $('#form2').serialize();

       $.ajax({
            method:'POST',
            data: value,
            url: '<?php  echo base_url('delete_message')?>',
            success:function (data) {
            	location.reload();
            }
		});
	});


	$('#my_inbox').on('click', function(){
       location.reload();
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

	$('.inbox_message').on('click', function(e){
		e.preventDefault();
       
        $.ajax({
            method:'GET',
            url: this.href,
            success:function (data) {
               $('#inbox_tbody').html(data);
               $('#delete_inbox').css('display', 'none');	
            }
		});
	});

	$('#inbox_tbody').on('click','.go_back', function(){
		location.reload();
	});

	$('#inbox_tbody').on('click','.delete_one_msg', function(){
		var value = $(this).attr('data-msgid');
       $.ajax({
            method:'POST',
            data: {id: value},
            url: '<?php  echo base_url('delete_one_msg')?>',
            success:function (data) {
            	location.reload();
            }
		});
	});
	

</script>

