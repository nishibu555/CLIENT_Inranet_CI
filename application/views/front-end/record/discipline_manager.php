
 <div class="container">
  <div class="row">
  <div class="col">
  <div class="sub_nav">
  <nav aria-label="breadcrumb">
 <ol class="breadcrumb">
   <li class="breadcrumb-item active"><a href="<?= base_url()?>">Home</a></li>
   <li class="breadcrumb-item active" ><a href="<?= base_url('records')?>">Records</a></li>
   <li class="breadcrumb-item active" ><a href="<?= base_url('student_manager')?>">Student manager</a></li>
   <li class="breadcrumb-item active" ><a href="<?= base_url('students-discipline')?>">Student Discipline</a></li>
 </ol>
</nav>
  </div>
  </div>
  </div>
  <div class="row">
<div class="col-md-4">
<div class="side_div1">
<p>DESCIPLINE MANAGER</p>
<i class="fas fa-user-graduate"></i>
</div>

<div class="side_div1">
<p>WRITES-UP</p>
<div style="margin: 5% 10%">
<small class="side_div1_text">It is a long established fact that a reader will be distracted</small>
<div style="margin: 30px 0px;">
<select id="incoming_student">
 <option value="">Select an applicant</option>
 <?php foreach ($incoming_student as $incoming_student) { ?>
    <option value="<?php echo base_url()."incoming_student_detail/".$incoming_student->id ?>"><?php echo $incoming_student->fname."".$incoming_student->lname ?></option>
 <?php } ?>
</select>
</div>
</div>
</div>

<div class="side_div2">
<div class="inner_side_div2">
<p>New write up</p>
<small>These disciplinary infractions have been
documented and are pending review
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
 <option value="">-- select one --</option>
                        <?php foreach($all_student as $student):?>
 <option value="<?= base_url('student_detail'.'/'.$student->student_id)?>"><?= $student->first_name.' '.$student->middle_name.' '.$student->last_name?></option>
                        <?php endforeach;?>
</select>
</div>
</div>
</div>
</div>

<div class="col-md-8">
<div class="table_title" style="margin-top: 30px">
<h5>DESCIPLINE MANAGER</h5>
</div>
  <div style="margin-top: 10px">
  <p style="font-size: 21px; color: #3d3d3d; font-family: Arial">Students on descipline</p>
  </div>

<div class="table-responsive">
    <table class="table studentTable">
      <thead>
        <tr>
          <th>1 on Discipline (8%)</th>
          <th>Assigned</th>
          <th>due date</th>
          <th>#</th>
          <th>Discipline Administered</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
</div>

</div>
  </div><!--row-->
 </div>

<!-- <script>
    $(document).ready(function(){

        $('#incoming_student').on('change',function(){
            var href = $( "#incoming_student option:selected" ).val();
            window.location.replace(href);
        });


        $('#std_archive').on('change',function(){
            var href = $( "#std_archive option:selected" ).val();
            window.location.replace(href);
        });
       

         
     $('#manual_add_form').on('submit',function(event){
       event.preventDefault();
       var formData =new FormData(this);
         
       $.ajax({
         url : "<?= base_url('student_manager/manual_std/store')?>",
         type : "POST",
         data: formData ,
         processData: false,
         contentType: false,
         dataType: 'json',
         success:function(data){
           if (data.error_list)
              {
                  $.each(data.error_list, function(key,val) {
                      $('.'+key).text(val).css('color','red');
                  });
              }else
              {
                   $("#form_data")[0].reset();
                   $('#addNewpage').modal('hide');
                   $('.modal-backdrop').remove();
                   $('#pageDatatable').DataTable().ajax.reload();
                   location.reload();
              }
         }
       });
      });
    });
</script> -->