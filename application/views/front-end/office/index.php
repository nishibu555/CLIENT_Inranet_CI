<div class="container">
    <div class="row">
        <div class="col">
            <div class="sub_nav">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="<?php echo base_url()?>dashboard">Home</a></li>
                        <li class="breadcrumb-item active" ><a href="<?php echo base_url()?>office">Office</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="side_div1">
                <p>OFFICE</p>
                <img style="width: 100%;" src="<?php base_url()?>assets/images/icon_office.png">
            </div>

        </div>

        <div class="col-md-8">
            <div class="record_padding">
                <div class="table_title"  style="margin-top: 24px;">
                    <h5>OFFICE:</h5>
                </div>
                <div class="record_lists">
                    <ul>
                            <li><a href="<?php echo base_url('office/directory')?>">Directory</a></li>
                            <li><a href="<?php echo base_url('office/documents')?>">Documents</a></li>
                            <li><a href="<?php echo base_url('office/inventory')?>">Inventory</a></li>
                            <li><a href="<?php echo base_url('office/messages')?>">Message Center</a></li>
                            <li><a href="<?php echo base_url('office/schedules')?>">Staff Schedules</a></li>
                    </ul>
                </div>
            </div>
    </div><!--row-->
</div>
