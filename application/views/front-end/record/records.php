<div class="container">
    <div class="row">
        <div class="col">
            <div class="sub_nav">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="<?php echo base_url()?>dashboard">Home</a></li>
                        <li class="breadcrumb-item active" ><a href="<?php echo base_url()?>records">Records</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="side_div1">
                <p>RECORDS</p>
                <img style="width: 100%;" src="<?php base_url()?>assets/images/icon_records.png">
            </div>

        </div>

        <div class="col-md-8">
            <div class="record_padding">
                <div class="table_title"  style="margin-top: 24px;">
                    <h5>RECORDS:</h5>
                </div>
                <div class="record_lists">
                    <ul>
                        <li><a href="<?php echo base_url()?>academic">Academics</a></li>
                        <li><a href="<?php echo base_url()?>activity">Activity Log</a></li>
                        <li><a href="<?= base_url('bed_assignments')?>">Bed Assignment</a></li>
                        <li><a href="<?php echo base_url('chronologicals')?>">Chronologicals</a></li>
                        <li><a href="<?= base_url('development_plan')?>">Development Plans</a></li>
                        <li><a href="<?= base_url('students-discipline')?>">Discipline</a></li>
                        <li><a href="<?= base_url('education_log')?>">Education Log</a></li>
                        <li><a href="<?= base_url('staff_manager')?>">Staff Manager</a></li>
                        <li><a href="<?php echo base_url()?>student_manager">Student Manager</a></li>
                    </ul>
                </div>
            </div>
    </div><!--row-->
</div>
