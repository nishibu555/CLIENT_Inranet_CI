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

                <div class="form"  style="margin-bottom:80px;">
                    <h5 class="ss_intranet_h">Intranet</h5>
                    <p>Report login issues</p>
                   <form method="post" action="#" id="f">

                    <div class="form-group">
                        <textarea rows="3" name="message" class="form-control" placeholder="Wrtie your message" required></textarea>
                    </div>
                    
                    <div class="form-group">
                       <input type="button" class="btn btn-primary login-btn" value="Send" id="bt">
                    </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/custom.js"></script>
    
    <script>
        $("#bt").on('click', function(){

            var form_value = $('#f').serialize();
                            
            $.ajax({
                method:'POST',
                data:form_value,
                url:'<?= base_url()."send_login_issue_mail" ?>',
        
                success:function (data) {
                        console.log(data);
                        
                        if (window.confirm('we will solve the issue as soon ass possible')){
                           window.location = 'http://digi.therssoftware.com/intranet/auth/login';
                        }
                }
            });
        });           

    </script>

</body>
</html>
