<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Data List Service</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap.css'); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap-responsive.css'); ?>"/>
        <script type="text/javascript" src="<?php echo base_url('bootstrap/js/jquery.js');?>"></script>
            
        <!-- Mengincludekan CSS Jqgrid -->
        <script type="text/javascript" src="<?php echo base_url('bootstrap/js/bootstrap.js') ?>"></script>

        <style type="text/css">
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #f5f5f5;
            }

            .form-signin {
                max-width: 300px;
                padding: 19px 29px 29px;
                margin: 0 auto 20px;
                background-color: #fff;
                border: 1px solid #e5e5e5;
                -webkit-border-radius: 5px;
                   -moz-border-radius: 5px;
                        border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                   -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                        box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;
            }
            .form-signin input[type="text"],
            .form-signin input[type="password"] {
                font-size: 16px;
                height: auto;
                margin-bottom: 15px;
                padding: 7px 9px;
            }
        </style>
        <!-- Mengincludekan Library Jquery -->
        <script src="<?php echo base_url() ?>js/jquery-1.8.3.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            <form class="form-signin" action="<?php echo base_url(); ?>index.php/login/validate" method="POST">
                <h2 class="form-signin-heading">Please sign in</h2>
                <input type="text" class="input-block-level" placeholder="User Name" name="username">
                <input type="password" class="input-block-level" placeholder="Password" name="password">
                <button class="btn btn-large btn-primary" type="submit">Sign in</button>
            </form>
        </div>
    </body>
</html>