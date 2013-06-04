<!DOCTYPE html>
<html lang="en">
<head>
<title>Golden Camera</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap.css'); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap-responsive.css'); ?>"/>
        <script type="text/javascript" src="<?php echo base_url('bootstrap/js/jquery.js');?>"></script>
        
        <!-- Mengincludekan JQueryUI CSS. Rename nama sunny dan sesuaikan Folder yg ada di dalam Folder CSS -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>css/sunny/jquery-ui-1.8.16.custom.css" />
        <!-- Mengincludekan CSS Jqgrid -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>css/ui.jqgrid.css" />
        <script type="text/javascript" src="<?php echo base_url('bootstrap/js/bootstrap.js') ?>"></script>
        <!--<style>
        html, body {
            margin: 0;
            padding: 0;
            font-size: 75%;
        }
        </style>-->
        
        <!-- Mengincludekan Library Jquery -->
        <script src="<?php echo base_url() ?>js/jquery-1.8.3.js" type="text/javascript"></script>
        <!-- Mengincludekan Locale untuk JQGrid -->
        <script src="<?php echo base_url() ?>js/i18n/grid.locale-en.js" type="text/javascript"></script>
        <!-- Mengincludekan Library untuk JQGrid -->
        <script src="<?php echo base_url() ?>js/jquery.jqGrid.min.js" type="text/javascript"></script>
        
</head>
<body>
<div class="navbar navbar-fixed">
    <div class="navbar-inner">
        <div class="container" style="width: auto;">
            <a class="brand" href="#">Golden Camera</a>
            <?php $is_logged_in = $this->session->userdata('is_logged_in');
                if(!isset($is_logged_in) || $is_logged_in != true)
                {
                        
                ?>
                <form class="navbar-form pull-right" action="<?php echo base_url(); ?>index.php/login/validate" method="POST">
                        <input class="span2" type="text" placeholder="Username" name="username">
                        <input class="span2" type="password" placeholder="Password" name="password">
                        <button type="submit" class="btn">Sign in</button>
                </form>
            <?php } ?>

            <?php $level = $this->session->userdata('level');
                if(!isset($level) || $level == 1)
                {
                        
                ?>
                <ul class="nav" role="navigation">
                    <li class="dropdown">
                      <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Mater Data <b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>index.php/user">Master User</a></li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>index.php/service2">Data Service</a></li>
                      </ul>
                    </li>
                    
                    <li class="dropdown">
                      <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Report <b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>index.php/service2/report">Report Service</a></li>
                      </ul>
                    </li>
                  </ul>
                <?php } ?>

                <ul class="nav pull-right">
                    <li id="fat-menu" class="dropdown">
                        <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown"><?php echo strtoupper($this->session->userdata('username')) ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>index.php/login/logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>      
        </div>
    </div><!-- /navbar-inner -->
</div>
<div class="container">
