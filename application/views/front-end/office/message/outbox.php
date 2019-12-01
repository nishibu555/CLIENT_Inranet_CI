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
							<span style="cursor: pointer;" id="my_outbox">My Outbox</span>
							<span style="float: right">
								<button type="button" class="btn btn-primary score-btn" id="delete_outbox">Delete Selected</button>
						    </span>
						</p>
					</div>
					<div>
						<table class="message_table">
							<thead></thead>
						    <form id="form1">
							<tbody id="tbody_outbox">
								<tr>
                                	<td><input type="checkbox" name="select_all" id="select_all" >Select all</td>
                                </tr>
								<?php foreach ($all_outbox as $key => $value) {
                                 
                                 $id_of_receiver=$value->id-1;
                                 $res=$this->db->where(['id'=> $id_of_receiver, 'delete_flag'=>0])->get('messages')->row();
                                 if($res){
									$read_flag_of_reciever=$res->read_flag;
                                 }
                                 
								?>
								<tr>		
									<td>
										<input type="checkbox" name="selected_msg[]" value="<?= $value->id ?>">

										<span><?php echo "To:  ".$value->to_fname." ".$value->to_lname?></span>
									</td>
									<td>
										<a href="<?=  base_url()."get_outbox/".$value->id ?>" class="outbox_message">
										<?php echo substr($value->message, 0, 70)?>
										Read More
										<span style="float: right; color:#3b4552; font-weight: 600 ">
											<?php
                                               if(isset($read_flag_of_reciever)){ 
											   
											     echo $read_flag_of_reciever==0? 'Not Seen' : 'Seen' ;
											     echo $read_flag_of_reciever==0? date('h:ma', strtotime($value->timestamp)) : date('n/j/y', strtotime($value->timestamp));

                                                } ?>
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


<script>
	$('#delete_outbox').on('click', function(){
       var value = $('#form1').serialize();

       $.ajax({
            method:'POST',
            data: value,
            url: '<?php  echo base_url('delete_message')?>',
            success:function (data) {
            	
            	location.reload();
            }
		});
	});


	$('#my_outbox').on('click', function(){
       location.reload();
	});

	$('.outbox_message').on('click', function(e){
		e.preventDefault();
       
        $.ajax({
            method:'GET',
            url: this.href,
            success:function (data) {
               $('#tbody_outbox').html(data);
               $('#delete_outbox').css('display', 'none');	
            }
		});
	})


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

	$('#tbody_outbox').on('click','.delete_one_msg', function(){
		var value = $(this).attr('data-msgid');
		console.log(value);
       $.ajax({
            method:'POST',
            data: {id: value},
            url: '<?php  echo base_url('delete_one_msg')?>',
            success:function (data) {
            	location.reload();
            }
		});
	});

	$('#tbody_outbox').on('click','.go_back', function(){
		location.reload();
	});

</script>
