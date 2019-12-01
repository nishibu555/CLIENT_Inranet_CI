<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TCI-Intranet-Student-Proof</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets//css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/main.css">
    <style>
        .error {
            color: red !important;
        }
    </style>
</head>
<body>
    <header>
        <div class="init_menu">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="<?= base_url();?>"><img src="<?php echo base_url()?>assets/images/initranet-logo.png"></a>

                    <div id="navbarSupportedContent">
                        <h4 class="ss_apply">New Student Registration</h4>
                    </div>
                </nav>
            </div>
        </div>

    </header>
    
    <?php echo $content ?>

    <footer>
        <p>&copy; Teen challenge GA international, Inc. All rights reserved.</p>
    </footer>
    <script src="<?php echo base_url()?>assets/js/jquery-3.4.1.js"></script>
    <script src="<?php echo base_url('assets/validate/jquery.validate.js')?>"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/custom.js"></script>


    <style type="text/css">
        header .init_menu{
            border-bottom: none; 
            box-shadow: none;
        }
    </style>
</body>
</html>
