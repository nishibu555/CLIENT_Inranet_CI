
 <div class="container">
  <div class="logo_print">
        <img height="" width=""  src="<?= base_url('assets/images/initranet-logo.png') ?>">
    </div>
  <div class="row breadcrumb_print">
  <div class="col">
  <div class="sub_nav">
  <nav aria-label="breadcrumb">
 <ol class="breadcrumb">
   <li class="breadcrumb-item active"><a href="<?= base_url()?>">Home</a></li>
   <li class="breadcrumb-item active" ><a href="<?= base_url('records')?>">Records</a></li>
   <li class="breadcrumb-item active" ><a href="<?= base_url('students-discipline')?>">Discipline Manager</a></li>
 </ol>
</nav>
  </div>
  </div>
  </div>
  <div class="row mainrow_print">
<div class="col-md-4">
<div class="side_div1">
<p>DISCIPLINE MANAGER</p>
<img src="<?= base_url().'assets/icon/student-manager.png' ?>" style="margin:15% 0%; max-width:150px;">
</div>

<div class="side_div1">
<p>WRITES-UP</p>
<div style="margin: 5% 10%">
<small class="side_div1_text">These disciplinary infractions have been
documented and are pending review
by the disciplinary committee.</small>
<div style="margin: 30px 0px;">
<select id="incoming_student">
 <option value=""><?= count($pending_discipline) ?> Pending Records</option>
 <?php foreach ($pending_discipline as $value) { ?>
    <option value="<?php echo base_url()."students/discipline/details/".$value->id ?>"><?= $value->fname.' '.$value->lname ." - ".date('n/j/y', strtotime($value->date_submit)) ?></option>
 <?php } ?>
</select>
</div>
</div>
</div>

<div class="side_div2">
<div class="inner_side_div2">
<a href="<?php echo base_url()."new_write_up_discipline" ?>"><button type="submit" class="btn btn-primary submit_button">New Write Up</button></a>
<small>Report an infraction to be reviewed
by the disciplinary committee.</small>
</div>
</div>

<div class="side_div1">
<p>ARCHIVES</p>
<div style="margin: 5% 10%">
<small class="side_div1_text">These disciplinary infractions for current
students have been reviewed and all
discipline has been completed.</small>
<div style="margin: 30px 0px;">
  <select id="std_archive">
 <option value="" ><?= count($resolve_discipline) ?> Resolved Records</option>
<?php foreach($resolve_discipline as $value):?>
     
        <option value="<?php echo base_url()."students/discipline/details/".$value->id ?>"><?= $value->fname.' '.$value->lname." - ".date('n/j/y', strtotime($value->date_submit)) ?></option>
 <?php endforeach;?>
</select>
</div>
</div>
</div>
</div>

<div class="col-md-8">
<div class="heading_print">
    <h4>Teen Challenge Open Discipline</h4>
</div>
<div class="table_title" style="margin-top: 24px">
<div style="width: 98%;"  class="print">
    <img height="30px" width="30px" src="<?= base_url('assets/icon/') ?>print-icon.png" style="float: right; cursor: pointer;"  class="print_icon">
</div>
<h5>DISCIPLINE MANAGER</h5>
</div>

  <div style="margin-top: 10px" class="print">
  <p style="font-size: 21px; color: #3d3d3d; font-family: Arial">Student Discipline</p>
  </div>

<div class="table-responsive">
    <table class="table common_table" style="font-size: 12px;">
      <thead>
        <tr><th colspan="4"><b><?= $num_of_student_on_dis ?></b> on Discipline (<?= $percentage ?>%)</th></tr>
        <tr>
          <th></th>
          <th>Student name</th>
          <th>Assigned date</th>
          <th>Due date</th>
          <th>#</th>
          <th>Discipline Administered</th>
            
        </tr>
      </thead>

      <tbody>
          <?php foreach($all_datas as $value):?>
            <!--<tr <?php if($value->status == 'Open') echo 'style="background-color:#ff9999"'; ?> >-->
            <tr>
               <?php 
                    $result2 = $this->db->query('select count(*) as `position` from discipline where `id` <= '.$value->id.' and student_id='.$value->student_id.' and delete_flag=0')->result();

                    $position = $result2[0]->position;
                ?>

                <td>
                <?php if($value->image !=1):?>
                    <a href="<?= base_url('students/discipline/details/'.$value->id)?>"><img src="<?= base_url('assets/images/default_profile.jpg')?>" style="width: 30px;height:30px;border-radius: 5px;"></a>
                <?php else:?>
                     <a href="<?= base_url('students/discipline/details/'.$value->id)?>"><img src="<?= base_url('assets/images/personnel/'.$value->student_id.'.jpg')?>" style="width: 30px;height:30px;border-radius: 5px;"></a>
                <?php endif;?>
                </td>
                <td><a href="<?= base_url('students/discipline/details/'.$value->id)?>"><?= $value->fname.' '.$value->lname ?></a></td>
                <td><?= $value->date_process != NULL ? date('m/m/Y',strtotime($value->date_process)) : '' ?></td>
                <td><?= $value->date_due != NULL ? date('m/m/Y',strtotime($value->date_due)) : '' ?></td>
                <td><?=  $position ?></td>
                <td><?php if($value->discipline != NULL && $value->status != 'Pending') echo $value->discipline; else echo "Pending. No communication privileges."; ?></td>
            </tr>
        <?php endforeach; ?>
          
      </tbody>
    </table>
</div>

</div>
  </div><!--row-->
 </div>


<script>
  $(document).ready(function(){

        $('#incoming_student').on('change',function(){
            var href = $( "#incoming_student option:selected" ).val();
            window.location.replace(href);
        });
      
       $('#std_archive').on('change',function(){
            var href = $( "#std_archive option:selected" ).val();
            window.location.replace(href);
        });
  });
</script>





<script>
    $('.print_icon').on('click', function(){
         window.print();
     });
</script>














