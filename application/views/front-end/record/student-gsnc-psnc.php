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
                        <li class="breadcrumb-item active" ><a href="<?php echo base_url()?>students_gsnc_psnc/<?php echo @$student_id?>"><?php echo @$student_name?></a></li>
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
                    <h4> <?=  $student_name ?>'s Academic Record</h4>
                </div>
            <div class="student_activity_log">
                <div style="width: 98%;" class="print">
                    <img height="30px" width="30px" src="<?= base_url('assets/icon/') ?>print-icon.png" style="float: right; cursor: pointer;"  class="print_icon">
                </div>
                <div class="table_title" style="margin-top: 30px;">
                    <h5>Student Manager:</h5>
                </div>
                <div class="student_academic">
                    <p style="margin-top: 6px;">Academics / <?php echo @$student_name?></p>

                    <div class="content_complete">
                        <p>GSNC – <span><?php echo @$gsnc_psnc['gsnc_books'] ?>	<?php if (@$gsnc_psnc['gsnc_average']) echo $gsnc_psnc['gsnc_average'].'Pass Avg' ?></span></p>
                        <p>PSNC – <span><?php echo @$gsnc_psnc['contracts'] ?></span></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="gsnc-test-score">
                        <h3>GSNC Test Score</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Test Date</th>
                                    <th>Facilitator</th>
                                    <th>Score</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach(@$gsnc_values as $gsnc_value){?>
                                    <tr>
                                        <td><b><?php echo @$gsnc_value['title']?></b></td>
                                        <td><?php echo $gsnc_value['date'] != '' ? date('m/d/y',strtotime($gsnc_value['date'])) : '' ?></td>
                                        <td><?php echo @$gsnc_value['author']?></td>
                                        <td><?php echo @$gsnc_value['score']?></td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                    <div class="gsnc-test-score">
                        <h3>PSNC Test Score</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Assigned</th>
                                    <th>Due</th>
                                    <th>Complete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i =1?>
                                <?php foreach($contracts_info as $contract_info){?>
                                    <tr>
                                        <td><b><a href="<?php echo base_url()?>student-contract/<?php echo @$student_id?>/<?php echo $contract_info['id']?>">Contract <?php echo $i;?></a></b></td>
                                        <td><?php echo isset($contract_info['date_assigned'])?date('m/d/y',strtotime($contract_info['date_assigned'])) : '' ?></td>
                                        <td><?php echo isset($contract_info['date_due'])?date('m/d/y',strtotime($contract_info['date_due'])) : '' ?></td>
                                        <td><?php echo isset($contract_info['date_completed'])? date('m/d/y',strtotime($contract_info['date_completed'])) : ''?></td>
                                        
                                    </tr>
                                    <?php $i++?>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                    <div class="new-contract">
                        <a href="<?php echo base_url()?>new-contract/<?php echo @$student_id?>" class="btn btn-primary contract-btn">New Contract</a>
                    </div>
                </div>
            </div>
        </div><!--end col-md-9-->
    </div>
<script>

    $('.print_icon').on('click', function(){
         window.print();
     });
</script>