<div class="container">
    <div class="logo_print">
        <img height="" width=""  src="<?= base_url('assets/images/initranet-logo.png') ?>">
    </div>
    <div class="row breadcrumb_print">
        <div class="col">
            <div class="sub_nav">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="<?php echo base_url()?>dashboard">Home</a></li>
                        <li class="breadcrumb-item active" ><a href="<?php echo base_url()?>records">Records</a></li>
                        <li class="breadcrumb-item active" ><a href="<?php echo base_url()?>student_manager">Students Manager</a></li>
                        <li class="breadcrumb-item active" ><a href="<?php echo base_url()?>academic">Academics</a></li>

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
               
                <?php   
                   $all_id=$this->db->select('id')->where('student_id', $student_info->id)->get('academics_contracts')->result();
                   $current_page ='';

                    foreach ($all_id as $key => $value) {
                         if($value->id == $contract_info->id){
                            $current_page=$key+1;
                         }
                    }
                    
                ?>
                 <div class="heading_print">
                    <h4>Student Learnig Contract Worksheet <?= $current_page ?></h4>
                </div>
            <div class="student_academic_history">
                <!--added by nishi-->
                <div class="row print">
                    <div class="col-md-12">
                        <div style="float: left;">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                  <li class="page-item">
                                    <a class="page-link" href="<?php echo base_url()."contract_previous/".$student_info->id."/".$contract_info->id ?>" aria-label="Previous">
                                      <span aria-hidden="true" style="color:  #0f3a64;">&laquo;</span>
                                      <span style="color:  #0f3a64; padding-left: 10px">previous</span>
                                    </a>
                                  </li>
                                </ul>
                             </nav>
                        </div>
                        <div style="float: right;">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <a class="page-link" href="<?php echo base_url()."contract_next/".$student_info->id."/".$contract_info->id ?>" aria-label="Next">
                                      <span style="color:  #0f3a64; padding-right: 10px " >next</span>
                                      <span aria-hidden="true"style="color:  #0f3a64;" >&raquo;</span>
                                    </a>
                                  </li>
                                </ul>
                              </nav>
                        </div>
                    </div>
                </div>
                 <!--added by nishi-->
                <div class="table_title" style="margin-top: 30px;">
                <div style="width: 98%;" class="print_icon">
                    <img height="30px" width="30px" src="<?= base_url('assets/icon/') ?>print-icon.png" style="float: right; cursor: pointer;"  class="print">
                </div>
                    <h5>Student Manager:</h5>
                </div>
                <div class="student_contract">
                    <p style="margin-top: 6px" class="print">ACADEMICS / NEW CONTRACT</p>

                    <table class="table">
                        <thead>
                            <tr>
                                <th style="border-top: 1px solid #0F3A64;border-bottom: 1px solid #0F3A64">
                                    <a style="margin: 0px;" class="student_name" href=""><?php echo $student_info->fname.' '.$student_info->lname?></a>
                                    <p class="common-style-p" style="font-size: 11px;">Entry date: <?php echo date("m/d/y", strtotime(@$student_info->doe)) ?></p>
                                </th>
                                <th style="border-top: 1px solid #0F3A64;border-bottom: 1px solid #0F3A64">
                                    <p class="common-style-p">Contract Status:</p>
                                    <p class="common-style-p"><?php echo @$contract_info->status?></p>
                                    <input type="hidden" name="std_id" value="<?php echo @$student_info->id?>">
                                    <input type="hidden"  id="contract_id" value="<?php echo @$contract_id?>">
                                    <!--                                <input type="hidden"  id="contract_id" value="1059">-->
                                </th>
                                <th style="border-top: 1px solid #0F3A64;border-bottom: 1px solid #0F3A64"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Projected Completion Date
                                    <p>There is no projected completion date for this contract.</p>
                                </td>
                                <td>
                                    <?php if (@$contract_info->status != 'Completed'){?>
                                        <button type="button" class="btn btn-primary btn-sm contract-btn print" id="due_date">Edit</button>
                                    <?php }?>

                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Unit Title
                                    <p>There is no title for this contract.</p>
                                </td>
                                <td>

                                    <?php if (@$contract_info->status != 'Completed'){?>
                                        <button type="button" class="btn btn-primary btn-sm contract-btn print" id="unit_title">Edit</button>
                                    <?php }?>

                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Major Theme
                                    <p>There is no major theme for this contract.</p>
                                </td>
                                <td>

                                    <?php if (@$contract_info->status != 'Completed'){?>
                                        <button type="button" class="btn btn-primary btn-sm contract-btn print" id="major_theme">Edit</button>
                                    <?php }?>


                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Minor Themes
                                    <p>There are no minor themes for this contract.</p>
                                </td>
                                <td>

                                    <?php if (@$contract_info->status != 'Completed'){?>
                                        <button type="button" class="btn btn-primary btn-sm contract-btn print" id="minor_theme">Edit</button>
                                    <?php }?>


                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Goals
                                    <p>There are no goals for this contract.</p>
                                </td>
                                <td>

                                    <?php if (@$contract_info->status != 'Completed'){?>
                                        <button type="button" class="btn btn-primary btn-sm contract-btn print" id="Goals">Edit</button>
                                    <?php }?>


                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Lessons and Bible Studies
                                    <p>There are no lessons for this contract.</p>
                                </td>
                                <td>

                                    <?php if (@$contract_info->status != 'Completed'){?>
                                        <button type="button" class="btn btn-primary btn-sm contract-btn print" id="lessons">Edit</button>
                                    <?php }?>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Scripture Memorization Class
                                    <p>Complete the SMC Worksheet
                                    </p>
                                </td>
                                <td>
                                    <?php if (@$contract_info->status == 'Completed'){?>
                                        <input class="form-check" disabled="disabled" id="scripture_worksheet" onclick="scripture_worksheet(<?php echo $contract_info->id?>);" <?php echo @$contract_info->scripture_worksheet == 1 ? 'checked' : ''  ?> name="scripture_worksheet" type="checkbox">

                                    <?php }?>

                                    <?php if (@$contract_info->status != 'Completed'){?>
                                        <input class="form-check" id="scripture_worksheet" onclick="scripture_worksheet(<?php echo $contract_info->id?>);" <?php echo @$contract_info->scripture_worksheet == 1 ? 'checked' : ''  ?> name="scripture_worksheet" type="checkbox">
                                    <?php }?>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Complete the SMC Final Test

                                </td>
                                <td>
                                    <?php if (@$contract_info->status == 'Completed'){?>
                                        <input class="form-check" disabled="disabled" id="scripture_finaltest" onclick="scripture_finaltest(<?php echo $contract_info->id?>);" name="scripture_finaltest" <?php echo @$contract_info->scripture_finaltest == 1 ? 'checked' : ''  ?> type="checkbox">
                                    <?php }?>
                                    <?php if (@$contract_info->status != 'Completed'){?>
                                        <input class="form-check"  id="scripture_finaltest" onclick="scripture_finaltest(<?php echo $contract_info->id?>);" name="scripture_finaltest" <?php echo @$contract_info->scripture_finaltest == 1 ? 'checked' : ''  ?> type="checkbox">
                                    <?php }?>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Verses to Memorize
                                    <p>There are no verses to memorize for this contract.</p>
                                </td>
                                <td>

                                    <?php if (@$contract_info->status != 'Completed'){?>
                                        <button type="button" class="btn btn-primary btn-sm contract-btn print" id="scripture">Edit</button>
                                    <?php }?>


                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Special Projects to Complete
                                    <p>There are no special projects for this scripture memorization.</p>
                                </td>
                                <td>

                                    <?php if (@$contract_info->status != 'Completed'){?>
                                        <button type="button" class="btn btn-primary btn-sm contract-btn print" id="scripture_projects">Edit</button>
                                    <?php }?>


                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><h3>Character Qualities Class</h3>
                                    Character Qualities – 8 Regular Activities
                                    <p>There are no character qualities for this contract.</p>
                                </td>
                                <td>

                                    <?php if (@$contract_info->status != 'Completed'){?>
                                        <button type="button" class="btn btn-primary btn-sm contract-btn print" id="character">Edit</button>
                                    <?php }?>


                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Special Projects to Complete
                                    <p>There are no special projects for these character qualities.</p>
                                </td>
                                <td>

                                    <?php if (@$contract_info->status != 'Completed'){?>
                                        <button type="button" class="btn btn-primary btn-sm contract-btn print" id="character_projects">Edit</button>
                                    <?php }?>


                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><h3>Personal Reading Class</h3>
                                    Written and Oral Reports on Each Assigned Reading
                                    <p>There is no personal reading for this contract.</p>
                                </td>
                                <td>
                                    <?php if (@$contract_info->status != 'Completed'){?>
                                        <button type="button" class="btn btn-primary btn-sm contract-btn print" id="personal_reading">Edit</button>
                                    <?php }?>


                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><h3>Bible Reading Class</h3>
                                    Read the following books in the Bible, providing reports on each book as specified.
                                    <p>There is no bible reading for this contract.</p>
                                </td>
                                <td>
                                    <?php if (@$contract_info->status != 'Completed'){?>
                                        <button type="button" class="btn btn-primary btn-sm contract-btn print" id="bible_reading">Edit</button>
                                    <?php }?>


                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><h3>Special Projects</h3>
                                    <p>There are no special projects for this contract.</p>
                                </td>
                                <td>
                                    <?php if (@$contract_info->status != 'Completed'){?>
                                        <button type="button" class="btn btn-primary btn-sm contract-btn print" id="special_projects">Edit</button>
                                    <?php }?>
                                </td>
                                <td></td>
                            </tr>

                        </tbody>
                        <tfoot class="print">
                            <td >
                                <?php if (@$contract_info->status == 'Unassigned'){?>
                                    <a style="padding: 10px;color: #fff;" href="<?php echo base_url()?>delete-contract/<?php echo $contract_info->id?>" class="btn btn-danger btn-sm">Delete Contract</a>
                                <?php }?>
                                <?php if (@$contract_info->status == 'Assigned'){?>
                                    <a style="padding: 10px;color: #fff;"  href="<?php echo base_url()?>update_unassign_value/<?php echo $contract_info->id?>" type="button" class="btn btn-primary btn-sm">Unassign Contract</a>
                                <?php }?>

                                <?php if (@$contract_info->status == 'Completed'){?>
                                    <a  style="padding: 10px;color: #fff;"  href="<?php echo base_url()?>update_reassign_value/<?php echo $contract_info->id?>" type="button" class="btn btn-primary btn-sm">Reassign Contract</a>
                                <?php }?>
                            </td>
                            <td>
                                <?php if (@$contract_info->status == 'Unassigned'){?>
                                    <a style="padding: 10px;color: #fff;"  href="<?php echo base_url()?>update_assign_value/<?php echo $contract_info->id?>" type="button" class="btn btn-primary btn-sm">Assign Contract</a>
                                <?php }?>

                                <?php if (@$contract_info->status == 'Assigned'){?>
                                    <a style="padding: 10px;color: #fff;"  href="<?php echo base_url()?>update_complete_value/<?php echo $contract_info->id?>" type="button" class="btn btn-primary btn-sm">Contract Complete</a>
                                <?php }?>
                            </td>
                            <td></td>
                        </tfoot>
                    </table>

                    <!-- duo date Modal -->
                    <div class="modal fade" id="due_date_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New Contract</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="#" method="post" id="due_date_form">
                                        <div class="form-group" >
                                            <label for="exampleInputEmail1">Projected Completion Date</label>
                                            <input autocomplete="off" type="text" class="form-control" name="date_due" id="date_due">
                                            <input type="hidden"  name="contract_id" value="<?php echo @$contract_id?>">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="due_date_btn">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- others Modal -->
                    <div class="modal fade contractModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New Contract</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="#" method="post" id="contractModal_form">
                                        <div class="form-group" >
                                            <label for="exampleInputEmail1" id="label_id"></label>
                                            <div id="for_input_field">

                                            </div>
                                            <input type="hidden"  name="contract_id" value="<?php echo @$contract_id?>">
                                            <input type="hidden"  id="contract_url" name="contract_url" >
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="contractModal_btn">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--                    <a href="--><?php //echo base_url()?><!--student-test-score" class="btn btn-primary score-btn">Add New Score</a>-->
                </div>
            </div>
        </div><!--row-->
    </div>



    <script>

        function scripture_worksheet(id)
        {
            value = $("#scripture_worksheet").is(':checked')
            $.ajax(
            {
                method:'POST',
                data:{'id':id,'scripture_worksheet':value},
                url:'<?php echo base_url('update_scripture_worksheet')?>',
                success:function (data) {
                    var res = JSON.parse(data);
                    var msg = res.msg;
                    console.log(msg);
                        // alert(msg);
                        Swal.fire('Good job!',msg,'success');
                        // return msg;
                    }
                });
        }
        function scripture_finaltest(id)
        {
            value = $("#scripture_finaltest").is(':checked')
            $.ajax(
            {
                method:'POST',
                data:{'id':id,'scripture_finaltest':value},
                url:'<?php echo base_url('update_scripture_finaltest')?>',
                success:function (data) {
                    var res = JSON.parse(data);
                    var msg = res.msg;
                    console.log(msg);
                        // alert(msg);
                        Swal.fire('Good job!',msg,'success');
                        // return msg;
                    }
                });
        }
        $( "#due_date" ).click(function() {

            $('#due_date_modal').modal("show");
        });

        $( "#unit_title" ).click(function() {
            var url = '<?php echo base_url('update_unit_title')?>';
            var field = '<input autocomplete="off" type="text" class="form-control" name="unit_title">';
            $('#label_id').text('Unit Title');
            $('#for_input_field').html(field);
            $('input[name=contract_url]').val(url);
            $('.contractModal').modal("show");
        });
        $( "#major_theme" ).click(function() {
            var url = '<?php echo base_url('update_major_theme')?>';
            var field = '<input autocomplete="off" type="text" class="form-control" name="major_theme">';
            $('#label_id').text('Major Theme');
            $('#for_input_field').html(field);
            $('input[name=contract_url]').val(url);
            $('.contractModal').modal("show");
        });
        $( "#minor_theme" ).click(function() {
            var url = '<?php echo base_url('update_minor_theme')?>';
            var field = '<input autocomplete="off" type="text" class="form-control" name="minor_theme">';
            $('#label_id').text('Minor Themes');
            $('#for_input_field').html(field);
            $('input[name=contract_url]').val(url);
            $('.contractModal').modal("show");
        });
        $( "#Goals" ).click(function() {
            var url = '<?php echo base_url('update_goals')?>';
            var field = '<input autocomplete="off" type="text" class="form-control" name="goals">';
            $('#label_id').text('Goals');
            $('#for_input_field').html(field);
            $('input[name=contract_url]').val(url);
            $('.contractModal').modal("show");
        });
        $( "#lessons" ).click(function() {
            var url = '<?php echo base_url('update_lessons')?>';
            var field = '<input autocomplete="off" type="text" class="form-control" name="lessons">';
            $('#label_id').text('Lessons and Bible Studies');
            $('#for_input_field').html(field);
            $('input[name=contract_url]').val(url);
            $('.contractModal').modal("show");
        });

        $( "#scripture" ).click(function() {
            var url = '<?php echo base_url('update_scripture')?>';
            var field = '<input autocomplete="off" type="text" class="form-control" name="scripture">';
            $('#label_id').text('Verses to Memorize');
            $('#for_input_field').html(field);
            $('input[name=contract_url]').val(url);
            $('.contractModal').modal("show");
        });
        $( "#scripture_projects" ).click(function() {
            var url = '<?php echo base_url('update_scripture_projects')?>';
            var field = '<input autocomplete="off" type="text" class="form-control" name="scripture_projects">';
            $('#label_id').text('Special Projects to Complete');
            $('#for_input_field').html(field);
            $('input[name=contract_url]').val(url);
            $('.contractModal').modal("show");
        });
        $( "#character" ).click(function() {
            var url = '<?php echo base_url('update_character')?>';
            var field = '<input autocomplete="off" type="text" class="form-control" name="character">';
            $('#label_id').text('Character Qualities – 8 Regular Activities');
            $('#for_input_field').html(field);
            $('input[name=contract_url]').val(url);
            $('.contractModal').modal("show");
        });
        $( "#character_projects" ).click(function() {
            var url = '<?php echo base_url('update_character_project')?>';
            var field = '<input autocomplete="off" type="text" class="form-control" name="character_projects">';
            $('#label_id').text('Special Projects to Complete');
            $('#for_input_field').html(field);
            $('input[name=contract_url]').val(url);
            $('.contractModal').modal("show");
        });
        $( "#personal_reading" ).click(function() {
            var url = '<?php echo base_url('update_personal_reading')?>';
            var field = '<input autocomplete="off" type="text" class="form-control" name="personal_reading">';
            $('#label_id').text('Written and Oral Reports on Each Assigned Reading');
            $('#for_input_field').html(field);
            $('input[name=contract_url]').val(url);
            $('.contractModal').modal("show");
        });
        $( "#bible_reading" ).click(function() {
            var url = '<?php echo base_url('update_bible_reading')?>';
            var field = '<input autocomplete="off" type="text" class="form-control" name="bible_reading">';
            $('#label_id').text('Bible Reading Class');
            $('#for_input_field').html(field);
            $('input[name=contract_url]').val(url);
            $('.contractModal').modal("show");
        });
        $( "#special_projects" ).click(function() {
            var url = '<?php echo base_url('update_special_projects')?>';
            var field = '<input autocomplete="off" type="text" class="form-control" name="special_projects">';
            $('#label_id').text('Special Projects');
            $('#for_input_field').html(field);
            $('input[name=contract_url]').val(url);
            $('.contractModal').modal("show");
        });

        $('#contractModal_btn').click(function () {

            var url = $("#contract_url").val();
            console.log(url);
            var contract_form_value = $('#contractModal_form').serialize();
            console.log(contract_form_value);
            var modal_id = ".contractModal";
            var form_id = "#contractModal_form";
            UpdateData(contract_form_value,url,modal_id,form_id);
        });

        $('#due_date_btn').click(function () {

            var due_date = $('#due_date_form').serialize();
            console.log(due_date);

            var url = '<?php echo base_url()?>update_due_date';
            var modal_id = "#due_date_modal";
            var form_id = "#due_date_form";
            UpdateData(due_date,url,modal_id,form_id);
        });

        function UpdateData(data,url,modal_id,form_id)
        {
            $.ajax(
            {
                method:'POST',
                data:data,
                url:url,
                success:function (data) {
                    var res = JSON.parse(data);
                    var msg = res.msg;
                    console.log(msg);
                    $(modal_id).modal('hide');
                        // alert(msg);
//                        swal('Message',msg,'success');
Swal.fire('Good job!',msg,'success');
$(form_id)[0].reset();
                        // return msg;
                    }
                });
        }
    </script>
    <script src="<?php echo base_url()?>assets/js/jquery.datetimepicker.full.js"></script>
    <script>
        jQuery.datetimepicker.setLocale('de');

        jQuery('#date_due').datetimepicker({
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

    $('.print_icon').on('click', function(){
         window.print();
     });
</script>