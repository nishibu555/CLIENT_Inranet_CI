
<div class="container">
    <div class="row">
        <div class="col">
            <div class="sub_nav">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="<?= base_url('/dashboard')?>">Home</a></li>
                        <li class="breadcrumb-item active" ><a href="<?= base_url('/records')?>">Records</a></li>
                        <li class="breadcrumb-item active" ><a href="<?= base_url('/student_manager')?>">Student Manager</a></li>
                        <li class="breadcrumb-item active" ><a href="">Student Discipline</a></li>
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
                            <div class="table_title" style="margin-top: 30px;">
                                <h5>Student Manager:</h5>
                                <?php if(isset($student_id) ):?>
                                    <a href="<?= base_url('student_detail/'.$student_id)?>" class="" id="activity_btn" style="float: right;position: relative;margin-top: -25px;">Back</a>
                                <?php endif?>
                            </div>
                            <div class="student_academic">
                                <p style="margin-top: 6px;">Student discipline</p>
                                <textarea style="margin-bottom: 15px;" rows="4" class="form-control input-border resize" name="discipline_des"></textarea>
                                <!--                                <input name="student_id" type="hidden" value="<?= $student_id?>">-->
                                <span class="discipline_des"></span>
                                <span class="message"></span>
                                <button type="submit" class="btn btn-primary score-btn" id="activity_btn">Add Activity</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="activity_log">
                            <label>Activity Log Archive</label>
                            <select class="form-control form-control-sm" name="student_id">
                                <option>Select Student</option>
                                <?php foreach($students as $value):?>
                                    <option value="<?= $value->id?>" <?= $value->id== $student_id?'selected' : ''?>><?= $value->fname.' '.$value->lname?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="std_name"></span>
                        </div>
                    </div>
                </div>
            </form>
        </div><!--end col-md-9-->
    </div>
    
    <script>
// post data

$('#add_discipline_form').on('submit',function(event){
    event.preventDefault();
    
    var formData =new FormData(this);
    
    $.ajax({
      url : "<?= base_url('students/discipline/store')?>",
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
            var msg = data.msg;
            Swal.fire(
              'Good job!',
              msg,
              'success'
              )
            $("#add_discipline_form").trigger('reset');
        }

    }
});
});
</script>

