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
                    <!--                    <a href="#" class="badge">
                                            Notifications
                                        </a>-->
                    <ul class="nav nav-tabs" role="tablist">
                        <li> <button class="btn btn-instagram btn-sm" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                Notifications
                            </button>
                        </li>
                        <li class="dropdown">
                            <button class="btn btn-instagram btn-sm" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                More
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                <li role="presentation"><a role="menuitem" tabindex="-1" 
                                                           href="<?php echo base_url(); ?>loadChangePass" class="fa fa-edit">Change Password</a></li>
                                <li role="presentation" class="divider"></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" 
                                                           href="<?php echo base_url(); ?>logout" class="fa fa-sign-out">Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header"><b>MAIN NAVIGATION</b></li>
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image" width="100" height="100"/>
                            <p style="color: #FFFFFF"><?php echo $name; ?></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <small style="color: #FFFFFF"><?php echo $role_text; ?></small> 
                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>
                        </li> 
                        <!--                        <div class="row">
                                                    <div class="col-sm-4">
                                                        <a href="<?php echo base_url(); ?>loadChangePass" class="btn btn-twitter btn-sm"><i class="fa fa-key"></i> Change Password</a>
                                                    </div>
                                                    <div class="col-sm-offset-3 col-sm-4">
                                                        <a href="<?php echo base_url(); ?>logout" class="btn btn-twitter btn-sm"><i class="fa fa-sign-out"></i> Log Out</a>
                                                    </div>
                                                </div>-->
                        <li class="treeview">
                            <a href="<?php echo base_url(); ?>dashboard">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="<?php echo base_url(); ?>task/donorDashboard">
                                <i class="fa fa-life-bouy"></i><span>Donor</span></i>
                            </a>
                        </li>
                        <?php
                        if ($role == ROLE_ADMIN || $role == ROLE_MANAGER) {
                            ?>
                            <li class="treeview">
                                <a href="<?php echo base_url(); ?>user/donors" >
                                    <i class="fa fa-user"></i>
                                    <span>All Donors</span>
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