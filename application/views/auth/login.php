<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TCI-Intranet-Student-Proof</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/main.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="login-form">
                <div class="login-logo">
                    <img src="<?php echo base_url()?>assets/images/initranet-logo.png">
                </div>
                <small id="infoMessage" class="form-text text-danger text-center"><?php echo $message;?></small>
                <div class="form">
                    <?php echo form_open("auth/login");?>
                    <h5 class="ss_intranet_h">Intranet</h5>
                    <p>Please sign in to begin your secure session.</p>
                    <div class="form-group">
                        <label for="user_name" class="form-label">User Name</label>
                        <?php echo form_input($identity);?>
                        <!--                    <input style="margin-bottom: 20px;" type="text" class="form-control input-filed" id="user_name" name="user_name">-->
                    </div>
                    <div class="form-group">
                        <label for="user_Password" class="form-label">Password</label>
                        <?php echo form_input($password);?>
                        <!--                    <input style="margin-bottom: 40px;" type="password" class="form-control input-filed" id="user_Password" name="user_Password">-->
                    </div>
                    <!--                <input type="submit" class="btn btn-primary login-btn" value="Login">-->
                    <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>
                    <?php echo form_close();?>
                </div>

                <footer>
                    <p>&copy; Teen challenge GA international, Inc. All rights reserved.<a href="<?php echo base_url()."report_login_issue" ?>">Report Login issues.</a></p>
                </footer>
            </div>

        </div>
    </div>
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/custom.js"></script>

</body>
</html>
