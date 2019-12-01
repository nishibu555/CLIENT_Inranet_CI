
<div class="container">
    <div class="row">
        <div class="col">
            <div class="sub_nav">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="<?= base_url('/dashboard')?>">Home</a></li>
                        <li class="breadcrumb-item active" ><a href="<?= base_url('/records')?>">Records</a></li>
                        <li class="breadcrumb-item active" ><a href="">Development Plan</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="side_div1">
                <p>RECORDS</p>
                <img style="width: 100%;" src="<?php echo base_url()?>assets/images/icon_records.png">
            </div>

        </div>

        <div class="col-md-9">
            <form  id="add_discipline_form">
                <div class="row">
                    <div class="col-md-9">
                        <div class="student_activity_log">
                            <div class="table_title" style="margin-top: 24px;">
                                <h5>Development Plans:</h5>
                            </div>
                            <div class="development_plan table-responsive">
                                <table class="table dev_plan_table">
                                   <thead>
                                     <tr>
                                       <th colspan="4" class="text-center">
                                           <select name="date" id="Select_date" class="form-control">
                                                  <?php 
                                                  for($j=2019; $j>=2015; $j--){
                                                    for($i=1 ;  $i<=12 ; $i++){
                                                        $dd = '01.'.$i.'.'.$j;
                                                      print("<option value=".date('Y-m-d',strtotime($dd)).">".date('F Y',strtotime($dd))."</option>");
                                                    }
                                                  }    
                                                  ?>
                                            </select>
                                       </th>
                                     </tr>
                                   </thead>
                                   <tbody id="tr">
     <?php 
        $dev_plan = $this->db->query("SELECT *  FROM `dev_plans` LIMIT 10")->result();
      ?>
        <?php foreach($dev_plan as $value):?>
            <?php
             $std_info = $this->db->query("SELECT *  FROM `personnel` WHERE `id`= $value->student_id")->row();
            if($std_info->image !=1){
             $src= base_url().'assets/images/default_profile.jpg';
            }
            else{
             $src= base_url('assets/images/personnel/').$std_info->id.'.jpg';
            }
            ?>
                 	<tr>
                        <td>
                            <img src="<?= $src?>" height="50px" width="50px"></td>
                        <td><?= $std_info->fname." ".$std_info->lname ?></td>
                        <td><?= $value->status ?></td>
                    </tr>                         
        <?php endforeach;?>
                                 
                                   </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div><!--end col-md-9-->
    </div>

<script>
$(document).ready(function() {
 
    
    $('#Select_date').on('change',function(){
        var date = $(this).val();
        	$.ajax({
					url: "<?= base_url('ajax/get_dev_plan/date_filter') ?>",
					type: "POST",
					data: {date:date},
					dataType: 'json',
					success: function(data) {
						$('#tr').html(data);
					}
				});
    })
    
   
});
</script>
  