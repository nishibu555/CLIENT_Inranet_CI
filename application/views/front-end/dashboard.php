<div class="container">
    <div class="row">
        <div class="col">
            <div class="sub_nav">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="<?php echo base_url()?>dashboard">Home</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="side_div1">
                <div class="headingside_div1">
                    <h5>MESSAGE BOARD <i class="fas fa-comment"></i></h5>
                </div>
                <img src="<?php base_url()?>assets/images/icon_records.png" class="img-fluid">

            </div>

        </div>

        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6 board-list">
                    <a href="<?php echo base_url()?>records">
                    <div class="dashboard-icon">
                         <img src="<?php echo base_url()?>assets/images/icon_records.png" class="img-fluid">
                    </div>
                    </a>
                    <div class="content">
                        <h3><a href="<?php echo base_url()?>records">Records</a></a></h3>
                        <ul>
                            <li><span>Quick Links:</span></li>
                            <li><a href="<?php echo base_url()?>academic">Academics</a></li>
                            <li><a href="<?php echo base_url()?>activity">Activity Log</a></li>
                            <li><a href="<?php echo base_url()?>bed_assignments">Bed Assignment</a></li>
                            <li><a href="<?php echo base_url()?>chronologicals">Chronologicals</a></li>
                            <li><a href="<?php echo base_url()?>development_plan">Development Plans</a></li>
                            <li><a href="<?php echo base_url()?>students-discipline">Discipline</a></li>
                            <li><a href="<?php echo base_url()?>education_log">Education Log</a></li>
                            <li><a href="<?php echo base_url()?>staff_manager">Staff Manager</a></li>
                            <li><a href="<?php echo base_url()?>student_manager">Student Manager</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 board-list">
                    <div class="dashboard-icon">
                        <a href="<?= base_url('office') ?>"><img src="<?php echo base_url()?>assets/images/icon_office.png" class="img-fluid"></a>
                    </div>
                    <div class="content">
                        <a href="<?= base_url('office') ?>"><h3>Office</h3></a>
                        <ul>
                            <li><a href="<?php echo base_url('office/directory')?>">Directory</a></li>
                            <li><a href="<?php echo base_url('office/documents')?>">Documents</a></li>
                            <li><a href="<?php echo base_url('office/inventory')?>">Inventory</a></li>
                            <li><a href="<?php echo base_url('office/messages')?>">Message Center</a></li>
                            <li><a href="<?php echo base_url('office/schedules')?>">Staff Schedules</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 board-list">
                    <a href="<?= base_url('marketing') ?>"><div class="dashboard-icon">
                        <img src="<?php echo base_url()?>assets/images/icon_marketing.png" class="img-fluid">
                    </div>
                    </a>
                    <div class="content">
                        <a href="<?= base_url('marketing') ?>"><h3>Marketing</h3></a>
                        <ul>
                            <li><span>Quick Links:</span></li>
                            <li><a href="<?php echo base_url()?>marketing/business">Business</a></li>
                            <li><a href="<?php echo base_url()?>marketing/churches">Churches</a></li>
                            <li><a href="<?php echo base_url()?>marketing/fund_raising">Fundraising Log</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 board-list">
                    <div class="dashboard-icon">
                        <img src="<?php echo base_url()?>assets/images/work.png" class="img-fluid">
                    </div>
                    <div class="content">
                        <h3>Work Crews</h3>
                    </div>
                </div>
                <div class="col-md-6 board-list">
                    <a href="<?= base_url()."settings" ?>">
                        <div class="dashboard-icon">
                            <img src="<?php echo base_url()?>assets/images/ionic_setting.png" class="img-fluid">
                        </div>
                    </a>
                    
                    <a href="<?= base_url()."settings" ?>">
                        <div class="content">
                            <h3>Settings</h3>
                            <ul>
                                <li><span>Quick Links:</span></li>
                                <!--<li><a href="<?php echo base_url()?>access_logs">Access Log</a></li>-->
                                <li><a href="<?php echo base_url()?>settings/change_password">Change Password</a></li>
                                <li><a href="<?php echo base_url('settings/users')?>">TCI Users</a></li>
                            </ul>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div><!--row-->
</div>
