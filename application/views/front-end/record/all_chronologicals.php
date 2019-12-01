 <div class="container">
 	<div class="row">
 		<div class="col">
 			<div class="sub_nav">
 				<nav aria-label="breadcrumb">
 					<ol class="breadcrumb">
 						<li class="breadcrumb-item active"><a href="<?= base_url()?>">Home</a></li>
 						<li class="breadcrumb-item active" ><a href="<?= base_url('records')?>">Records</a></li>
 						<li class="breadcrumb-item active" ><a href="">Student Chronologicals</a></li>
 					</ol>
 				</nav>
 			</div>
 		</div>
 	</div>
 	<div class="row">
 		<div class="col-md-4">
 			<div class="side_div1">
 				<p>RECORDS</p>
 				<img style="width: 100%;" src="<?php echo base_url()?>assets/images/icon_records.png">
 			</div>

 		</div>

 		<div class="col-md-8">
 			<div class="table_title" style="margin-top:24px">
 				<h5>STUDENTS CHRONOLOGICALS</h5>
 			</div>
 			
 			
 			<div class="table-responsive">
 				<table class="table studentTable">
 					<tbody>
 						<?php foreach($all_datas as $value):?>
 							<tr>
 								<td>
 									<?php if(empty($value->image)):?>
 										<a href="<?= base_url('chronologicals/'.$value->id)?>"><img src="<?= base_url('assets/images/default_profile.jpg')?>" style="width: 30px;height:30px;border-radius: 5px;"></a>
 										<?php else:?>
 											<a href="<?= base_url('chronologicals/'.$value->id)?>"><img src="<?= base_url()."assets/images/personnel/".$value->id.'.jpg' ?>" style="width: 30px;height:30px;border-radius: 5px;"></a>
 										<?php endif;?>
 									</td>
 									<td><a href="<?= base_url('chronologicals/'.$value->id)?>"><?= $value->fname.' '.$value->lname ?></a></td>
 									<?php 
 									if(isset($value->counselor_id)){
 										$counselors = $this->db->query("SELECT * FROM `counselors` WHERE `id` = $value->counselor_id")->row(); 
 										$counselor_name = $counselors->nickname;
 									} else{
 										$counselor_name = 'No Counselor!';
 									}
 									
 									?>
 									<td><?= $counselor_name ;?><td>
 									</tr>
 								<?php endforeach; ?>
 							</tbody>
 						</table>
 					</div>
 					
 				</div>
 			</div><!--row-->
 		</div>
