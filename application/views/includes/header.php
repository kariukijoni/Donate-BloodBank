<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pageTitle; ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.4 -->
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
        <!-- FontAwesome 4.3.0 -->
        <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons 2.0.0 -->
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
        <style>
            .error{
                color:red;
                font-weight: normal;
            }
        </style>
        <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            var baseURL = "<?php echo base_url(); ?>";
        </script>

    </head>
    <body class="skin-red sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="<?php echo base_url(); ?>" class="logo">
                    <!-- mini logo for side_bar mini 50x50 pixels -->
                    <span class="logo-mini"><b>BD</b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>BloodDonor</b></span>
                </a>
                <!-- Header Nav_bar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Side_bar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in drop_down.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="user-image" alt="User Image"/>
                                    <span class="hidden-xs"><?php echo $name; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image" />
                                        <p>
                                            <?php echo $name; ?>
                                            <small><?php echo $role_text; ?></small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">  
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <a href="<?php echo base_url(); ?>loadChangePass" class="btn btn-twitter btn-sm"><i class="fa fa-key"></i> Change Password</a>
                                            </div>
                                            <div class="col-sm-offset-4 col-sm-4">
                                                <a href="<?php echo base_url(); ?>logout" class="btn btn-twitter btn-sm"><i class="fa fa-sign-out"></i> Sign out</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header"><b>MAIN NAVIGATION</b></li>
                        <li class="treeview">
                            <a href="<?php echo base_url(); ?>dashboard">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="<?php echo base_url(); ?>task/donorRequest">
                                <i class="fa fa-life-bouy"></i><span>Donor Request</span></i>
                            </a>
                        </li>
                        <?php
                        if ($role == ROLE_ADMIN || $role == ROLE_MANAGER) {
                            ?>
                            <li class="treeview">
                                <a href="<?php echo base_url(); ?>user/donors" >
                                    <i class="fa fa-user"></i>
                                    <span>Donors</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="<?php echo base_url(); ?>task/transact" >
                                    <i class="fa fa-ticket"></i>
                                    <span>Transact</span>
                                </a>
                            </li>

                            <li class="treeview">
                                <a href="<?php echo base_url(); ?>task/requests" >
                                    <i class="fa fa-thumb-tack"></i>
                                    <span>Requests</span>
                                </a>
                            </li>
<!--                            <li class="treeview">
                                <a href="#" >
                                    <i class="fa fa-upload"></i>
                                    <span>Task Uploads</span>
                                </a>
                            </li>-->
                            <?php
                        }
                        if ($role == ROLE_ADMIN) {
                            ?>
                            <li class="treeview">
                                <a href="<?php echo base_url(); ?>userListing">
                                    <i class="fa fa-users"></i>
                                    <span>Users</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="<?php echo base_url(); ?>task/reports"/> 
                                    <i class="fa fa-files-o"></i>
                                    <span>Reports</span>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <script src="<?php echo base_url(); ?>assets/js/dropdown.js"></script>