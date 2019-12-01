<div class="container">
    <div class="row">
		<div class="col">
			<div class="sub_nav">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Home</a></li>
						<li class="breadcrumb-item active"><a href="<?= base_url('settings') ?>">Settings</a></li>
						<li class="breadcrumb-item active"><a href="">Change Password</a></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
 <div class="row">
     <div class="col-md-6 offset-3">
    <div class="col-md-12 user_form bg-white p-4" style="border: 1px solid #98a2a5;">
        <h4 class="text-center text-uppercase font-weight-bold">Change Passowrd</h4>

        <div id="infoMessage"><?php echo $message;?></div>

        <?php echo form_open("auth/change_password");?>

              <p>
                    <?php echo lang('change_password_old_password_label', 'old_password');?> <br />
                    <?php echo form_input($old_password);?>
              </p>

              <p>
                    <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> <br />
                    <?php echo form_input($new_password);?>
              </p>

              <p>
                    <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <br />
                    <?php echo form_input($new_password_confirm);?>
              </p>

              <?php echo form_input($user_id);?>
              <p><?php echo form_submit('submit', lang('change_password_submit_btn'));?></p>

        <?php echo form_close();?>
     </div>
</div>
     </div>

</div>