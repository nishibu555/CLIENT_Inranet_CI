<div class="container">
    <div class="row">
        <div class="col">
            <div class="sub_nav">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="<?= base_url()?>">Home</a></li>
                        <li class="breadcrumb-item active" ><a href="<?= base_url('settings')?>">Settings</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="side_div1">
                <p>SETTINGS</p>
                <img style="width: 65%;" src="<?php base_url()?>assets/images/ionic_setting.png">
<!--                <i class="fa fa-cogs" style="color:#0f3a64"></i>-->
            </div>
        </div>

        <div class="col-md-8">
            <div class="record_padding">
                <div class="table_title" style="margin-top: 30px;">
                    <h5>SETTINGS</h5>
                </div>
                <div class="record_lists">
                    <ul>
<!--                        <li><a href="<?php echo base_url()?>settings/access_logs">Access Log</a></li>-->
                        <li><a href="<?php echo base_url()?>settings/change_password">Change Password</a></li>   
                        <?php if ($this->ion_auth->is_admin())
                        {?>
                          <li><a href="<?= base_url()?>settings/users">TCI users</a></li>
                        <?php } ?>
                       
        
                    </ul>
                </div>
            </div>
    </div><!--row-->
</div>
