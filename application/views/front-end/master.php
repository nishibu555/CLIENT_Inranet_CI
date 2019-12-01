<?php 
//user role checing start
$userId = $this->ion_auth->get_user_id();
$user_info = $this->db->query("SELECT * FROm users WHERE `id` LIKE $userId")->row();

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>TCI-Intranet-Student-Proof</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    


	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/jquery.datetimepicker.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/main.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />  
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/Sortable-master/st/bed_assignment.css') ?>">
	<script src="<?= base_url('assets/js/Sortable.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/Sortable-master/st/prettify/prettify.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/Sortable-master/st/prettify/run_prettify.js') ?>"></script>
<?php
    //user role checing start
           $userId = $this->ion_auth->get_user_id();
           $user_info = $this->db->query("SELECT * FROm users WHERE `id` LIKE $userId")->row();
           
            if ($user_info->p_editbeds != 0)
            {?>
               	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                <script src="<?= base_url('assets/js/dragdrop.js') ?>"></script>
            <?php
            }
?>

	<script src="<?php echo base_url() ?>assets/js/jquery.datetimepicker.full.js"></script>
    <!--    new css-->
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/office.css')?>"/>

	<style>
		.btn-primary {
			color: #fff !important;
			background-color: #0f3a64 !important;
			border-color: #0f3a64 !important;
		}

		a {
			color: #0f3a64 !important
		}

		.btn-primary:hover {
			color: #fff !important;
			background-color: #104e8b !important;
			border-color: #104e8b !important;
		}
	</style>
</head>

<body>
	<header>
		<div class="top_header_shadow">
			<div class="container">
				<div class="top-header">
					<form>
						<input type="email" class="search">
						<img src="<?php echo base_url() ?>assets/images/icon_search.png">
						<button type="submit" class="int_btn">SEARCH</button>
					</form>
					<ul>
						<li class="magges_menu"><a href="#"><img src="<?php echo base_url() ?>assets/images/icon_message.png"> <span>MESSAGE</span></a></li>
						<li><a href="#"><img src="<?php echo base_url() ?>assets/images/icon_calender.png"> CALENDER</a></li>
						<li><a href="<?php echo base_url() ?>logout">LOG OUT</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="init_menu">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<a class="navbar-brand" href="<?= base_url(); ?>"><img src="<?php echo base_url() ?>assets/images/initranet-logo.png"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse mr-l-100" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item active">
								<a class="nav-link" href="<?php echo base_url() ?>dashboard">HOME <span class="sr-only">(current)</span></a>
							</li>	
							<?php if ($user_info->p_viewrecords != 0):?>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url() ?>records">RECORDS</a>
							</li>
							<?php endif;?>
						
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url('office')?>">OFFICE</a>
							</li>
						
							<?php if ($user_info->p_marketing != 0):?>
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url('marketing')?>">MARKETING</a>
							</li>
							<?php endif;?>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url('settings')?>">SETTINGS</a>
							</li>
							
							<?php if ($user_info->p_workcrews != 0):?>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo base_url('work')?>">WORK CREWS</a>
							</li>
							<?php endif;?>
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url('student_registration_agreement') ?>">APPLY HERE</a>
							</li>
							
							<div class="top_menu_responsive">
								<li class="nav-item">
									<form>
										<input type="email" class="search">
										<i class="fas fa-search"></i>
										<button type="submit" class="int_btn">SEARCH</button>
									</form>
								</li>
								<li class="nav-item"><a class="nav-link" href="#"><i class="far fa-envelope"></i> MESSAGE</a></li>
								<li class="nav-item"><a class="nav-link" href="#"><i class="far fa-calendar-alt"></i> CALENDER</a></li>
								<li class="nav-item"><a class="nav-link" href="<?php echo base_url() ?>logout">LOG OUT</a></li>

							</div>
						</ul>
					</div>
				</nav>
			</div>
		</div>

	</header>

	<?php echo $content ?>

	<footer>
		<p>&copy; Teen challenge GA international, Inc. All rights reserved.</p>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<!-- <script src="<?php echo base_url() ?>assets/js/jquery-3.4.1.js"></script> -->
	<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/custom.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>


</body>

</html>
