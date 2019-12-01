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
                        <li class="breadcrumb-item active" ><a href="<?= base_url('records')?>">Records</a></li>
                        <li class="breadcrumb-item active" ><a href="<?= base_url('student_manager')?>">Student Manager</a></li>
                        <li class="breadcrumb-item active" ><a href="">Academics</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row mainrow_print">
        <div class="col-md-4">
            <div class="side_div1">
                <p>RECORDS</p>
                <img style="width: 100%;" src="<?php base_url()?>assets/images/icon_records.png">
            </div>

        </div>

        <div class="col-md-8">
            <div class="student_academic_history">
                <div class="heading_print">
                    <h4>Academic Standings: <?=  date('m/d/Y') ?></h4>
                </div>
                <div style="width: 98%;" class="print">
                    <img height="30px" width="30px" src="<?= base_url('assets/icon/') ?>print-icon.png" style="float: right; cursor: pointer;"  class="print_icon">
                </div>
                <div class="table_title" style="margin-top: 24px;">
                    <h5>Student Manager: </h5>
                </div>
                <div class="student_academic">
                    <p style="margin-top: 6px">ACADEMICS</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Entry Date</th>
                                <th scope="col">Phase</th>
                                <th scope="col">GSNC</th>
                                <th scope="col">PSNC</th>
                                <th scope="col">Counselor</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach($std as $std){?>
                                <tr>
    								<td>
    									<?php if ($std['image'] != 1) : ?>
    										<a href="<?= base_url()."students_gsnc_psnc/".$std['id']?>"><img src="<?= base_url('assets/images/default_profile.jpg') ?>" style="width: 40px;"></a>
    									<?php else : ?>
    										<a href="<?= base_url()."students_gsnc_psnc/".$std['id']?>"><img src="<? echo base_url()."assets/images/personnel/".$std['id'].'.jpg' ?>" style="width: 40px;"></a>
    									<?php endif; ?>
    								</td>
                                    <td><a href="<?= base_url()."students_gsnc_psnc/".$std['id']?>"><?=  $std['name']?></a></td>
                                    <td><?=  date('m/d/y', strtotime($std['doe']))  ?></td>
                                    <td><?=  $std['current_phase']?></td>
                                    <td><?= $std['gsnc']  ?></td>
                                    <td><?= $std['psnc']  ?></td>
                                    <td><?=  $std['counselor'] ?></td>
                                </tr>

                            <?php }?>
                        </tbody>
                    </table>
                    <a href="<?php echo base_url()?>student-test-score" class="btn btn-primary score-btn">Add New Score</a>
                </div>
            </div>
        </div><!--row-->
    </div>


<script>

    $('.print_icon').on('click', function(){
         window.print();
     });
</script>