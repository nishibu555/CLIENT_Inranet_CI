
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
                        <li class="breadcrumb-item active" ><a href="<?= base_url('student_manager')?>">Students Manager</a></li>
                        <li class="breadcrumb-item active" ><a href="<?= base_url('chronologicals')?>">Student Choronologicals</a></li>
                        <li class="breadcrumb-item active" ><a href="#"><?= $student_name?></a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row mainrow_print">
        <div class="col-md-3">
            <div class="side_div1">
                <p>RECORDS</p>
                <img style="width: 100%;" src="<?php echo base_url()?>assets/images/icon_records.png">
            </div>

        </div>

        <div class="col-md-9">
                           <div class="heading_print">
                                <h4><?= $student_name ?> Chronological</h4>
                            </div>
                        <div class="student_activity_log">
                            <div style="width: 98%;" class="print_icon">
                                <img height="30px" width="30px" src="<?= base_url('assets/icon/') ?>print-icon.png" style="float: right; cursor: pointer;"  class="print">
                            </div>
                            <div class="table_title" style="margin-top: 24px;">
                                <h5>Student Choronolicals:</h5>
                                <!-- <?php if(isset($student_id) ):?>
                                <a href="<?= base_url('student_detail/'.$student_id)?>" class="" id="activity_btn" style="float: right;position: relative;margin-top: -25px;">Back</a>
                                <?php endif?> -->
                            </div>
                            <div class="student_academic">
                                <p style="margin-top: 6px;"><?= $student_name?></p>
                                <form id="add_entry_form" >
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="L" name="label_check[]">
                                                        <label class="form-check-label">L</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="D" name="label_check[]">
                                                        <label class="form-check-label">D</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="C" name="label_check[]">
                                                        <label class="form-check-label">C</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="F" name="label_check[]">
                                                        <label class="form-check-label">F</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="M" name="label_check[]">
                                                        <label class="form-check-label">M</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="O" name="label_check[]">
                                                        <label class="form-check-label">O</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="P" name="label_check[]">
                                                        <label class="form-check-label">P</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="A" name="label_check[]">
                                                        <label class="form-check-label">A</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="E" name="label_check[]">
                                                        <label class="form-check-label">E</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div>
                                                    <span class="label_check"></span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-10">
                                            <textarea style="margin-bottom: 15px;" rows="4" class="form-control input-border resize" name="entry_des"></textarea>
                                            <span class="entry_des"></span>
                                            <span class="message"></span>
                                            
                                            <button type="submit" class="btn btn-primary score-btn" id="entry_btn">Add Entry</button>

                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
            <div class="col-md-12" style="margin-top: 40px;padding: 0px;">

                    <div class="list_details">
                        <p>Chronological Codes</p>
                        <ul>
                            <li><a href="#">L - LEGAL - Parole/Probation, divorce, litigation, etc</a></li>
                            <li><a href="#">C -  COUNSELING - Any discussion with student which involves counseling</a></li>
                            <li><a href="#">M - MEDICAL - All issues related to physical health, including routine appointments</a></li>
                            <li><a href="#">P - PROGRESS - Primary counselor's mandatory weekly entry</a></li>
                            <li><a href="#">E - EDUCATIONAL - Any discussion with student which involves his assignments</a></li>
                            <li><a href="#">D - DISCIPLINE - Program infractions and discipline</a></li>
                            <li><a href="#">F - FAMILY - Items having to do with family</a></li>
                            <li><a href="#">O - OTHER - Any activity or situation not listed above that deviates from the normal activities of the program</a></li>
                            <li><a href="#">A - ADMINISTRATIVE</a></li>
                        </ul>
                    </div>
            </div>
            <div class="col-md-12" style="margin-top: 40px;padding: 0px;" id="getChronological">
            </div><!--row-->
    </div>
</div>

<script>
    $(document).ready(function() {
//        get data

        var url = window.location.href;
        var id = url.substring(url.lastIndexOf('/') + 1);
        $.ajax({
          url : "<?= base_url('chronolical/get_data')?>",
          type : "POST",
          data : {id:id},
          dataType: 'json',
          success:function(data){
              $('#getChronological').html(data);
          }
        });
      
//        post data
        
       $('#add_entry_form').on('submit',function(event){
        event.preventDefault();
        var url = window.location.href;
        var id = url.substring(url.lastIndexOf('/') + 1);
        var formData =new FormData(this);
        formData.append('student_id',id);
        
        $.ajax({
          url : "<?= base_url('chronolical/save')?>",
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
                $('#getChronological').html(data.html);
                $("#add_entry_form").trigger('reset');
            }

          }
        });
       });
        
    });

    </script>

<script>

    $('.print_icon').on('click', function(){
         window.print();
     });
</script>