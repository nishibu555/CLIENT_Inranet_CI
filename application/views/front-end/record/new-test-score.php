<div class="container">
    <div class="row">
        <div class="col">
            <div class="sub_nav">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                       <li class="breadcrumb-item active"><a href="<?= base_url()?>">Home</a></li>
                        <li class="breadcrumb-item active" ><a href="<?= base_url('records')?>">Records</a></li>
                        <li class="breadcrumb-item active" ><a href="<?= base_url('academic')?>">Academics</a></li>
                        <li class="breadcrumb-item active" ><a href="#">New Test Score</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
           <div class="side_div1">
            <p>RECORDS</p>
            <img style="width: 100%;" src="assets/images/icon_records.png">
        </div>

    </div>

    <div class="col-md-9">
        <div class="student_academic_history">
            <div class="table_title" style="margin-top: 30px;">
                <h5>Academic Manager:</h5>
            </div>
            <div class="student_academic">
                <p style="margin-top: 6px">ACADEMICS / NEW TEST SCORE</p>
                <form method="post" action="#" id="add_score_form" autocomplete="off">
                    <div class="course-select">
                        <label>Course Name</label>
                        <select class="form-control form-control-sm" name="course_name" id="course_name">
                            <option value="0">Select Course</option>
                            <?php foreach($courses as $course){?>
                                <option value="<?php echo $course->id ?>"><?php echo $course->title ?></option>
                            <?php }?>
                        </select>
                        <span class="course-msg"></span>
                    </div>
                    <table class="table ">
                        <thead>
                            <tr>
                                <th></th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Progress</th>
                                <th scope="col">Score</th>
                                <th scope="col">Test Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($students_score as $student){?>
                            <tr>
                                <td>
                                    <?php if ( $student['image'] !=1 ) : ?>
								     	<a href="<?php echo base_url()?>students_gsnc_psnc/<?php echo $student['id'] ?>" class="student_name"> <img src="<?php echo base_url()?>assets/images/student.png"></a>
									<?php else : ?>
									   <a href="<?php echo base_url()?>students_gsnc_psnc/<?php echo  $student['id'] ?>" class="student_name"> <img src="<?php echo base_url()."assets/images/personnel/".$student['id'].'.jpg' ?>"></a>
									<?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url()?>students_gsnc_psnc/<?php echo $student['id']?>" class="student_name"> <?php echo $student['name']?></a>
                                </td>
                                <td><?php echo $student['progress'];?></td>
                                <td><input style="width:60px;height:60px;border-radius: 0px;border:1px solid black;" type="text" class="form-control" name="test_score[]" id="test_score">
                                    <span class="test-score"></span>
                                </td>
    
                                <td><input style="height: 60px; border-radius: 0px;border:1px solid black;" type="text" class="form-control Select_date" name="test_date[]" id="test_date">
                                    <span class="test-date"></span>
                                </td>
                                <td><input style="height: 60px; border-radius: 0px;border:1px solid black;" type="hidden" class="form-control" value="<?php echo $student['id']?>" name="std_id[]"></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                    <span class="message"></span>
                    <button type="button" class="btn btn-primary score-btn" id="score_btn">Submit Score</button>
                </form>
            </div>
        </div>
    </div><!--row-->
</div>

<script src="<?php echo base_url()?>assets/js/jquery.datetimepicker.full.js"></script>
<script>
    jQuery.datetimepicker.setLocale('de');

    jQuery('.Select_date').datetimepicker({
        i18n:{
            de:{
                months:[
                'January','February','March','April',
                'May','June','July','August',
                'September','October','November','December',
                ],
                dayOfWeek:[
                "Su.", "Mo", "Tu", "We",
                "Th", "Fr", "Sa.",
                ]
            }
        },
        timepicker:false,
        format:'Y-m-d'
    });
</script>
<script>
    $("#course_name").change(function(){
        $(".course-msg").css('display','none');
    });
    $("#test_score").change(function(){
        $(".test-score").css('display','none');
    });
    $("#test_date").change(function(){
        $(".test-date").css('display','none');
    });
</script>
<script>
    $('#score_btn').click(function () {

        var course_name = $("#course_name").val();
        var test_score = $("#test_score").val();
        var test_date = $("#test_date").val();
        if (course_name == '' || course_name == '0')
        {
            $(".course-msg").text('Select Course Name').css('color','red');
            return false;
        }
        // if (test_score == '')
        // {
        //     $(".test-score").text('Fill up score').css('color','red');
        //     return false;
        // }
        // if (test_date == '')
        // {
        //     $(".test-date").text('Select Date').css('color','red');
        //     return false;
        // }

        var std_score_value = $('#add_score_form').serialize();
        console.log(std_score_value);

        $.ajax(
        {
            method:'POST',
            data:std_score_value,
            url:'save_test_score_value',
            success:function (data) {

                console.log(data);
                var res = JSON.parse(data);
                if (res.error_list)
                {
                    $.each(res.error_list, function(key,val) {
                        $('.'+key).text(val).css('color','red');
                    });

                            //$("#addModalView").modal('hide');
                            //$('#UpdateModalForm')[0].reset();
                        }else
                        {
                            var msg = res.msg;
                            window.location.href = '<?php echo base_url("academic")?>';
                            console.log(msg);
                            $('.message').text(msg).css('color','green');
                            $("#add_score_form").trigger('reset');
                        }

                    }
                });

    });
</script>