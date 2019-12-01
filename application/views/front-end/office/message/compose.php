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
						<p style="font-size: 21px; color: #3d3d3d; font-family: Arial">New Message
						</p>
			        </div>
			        <div class="row justify-content-center">
			        	<form method="POST" action="<?=  base_url()."send_message"?>">
			        	<div class="col-md-8">
			        		<p>Choose Receipients:
			        			<span style="float: right;">
			        			   <input type="checkbox" name="select_all" value="1">Select all 
			        		    </span>
			        	    </p>
			        	    <div>
			        	    	<?php  foreach ($recipients as $key => $value) {?>
			        	    		<input type="checkbox" name="select_recipients[]" value="<?= $value->username ?>"><?= $value->first_name." ".$value->last_name ?>
			        	    	<?php } ?>
			        	    </div>
			        	</div>
			        </div>
			        <div style="margin-top: 20px; text-align: center;">
			        	<textarea rows="5"  name="message" style="width: 100%" placeholder="Write your message"></textarea>
			        	<div>
			        		<button type="submit" class="btn btn-primary" style="padding: 5px 20px" id="create_form_submit">Send Message</button>

			        		<a href="<?=  base_url('office/messages')?>"><button type="button" class="btn btn-primary" style="padding: 5px 20px" id="create_form_submit">Cancle</button></a>
			        	</div>
			        </div>
			        </form>
			    </div>
				<div class="col-md-2" style="margin-top: 50px">
					<div class="message" style="text-align: center;">
						<div>
							<!-- <img height="70px" width="70px" src="<?= base_url()?>assets/icon/compose.png"> -->
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
	.message p{
	font-size: 10.71px;
    font-family: Arial;
    color: #2b78c2;
}
</style>
