<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BloodDonor | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/bootstrap/css/customHome.css" rel="stylesheet" type="text/css" />

    </head>    
    <body class="container colorpicker-with-alpha">
        <nav class="navbar navbar-default" role="navigation">
            <!-- BloodDonor and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img class="img-responsive img-rounded img-thumbnail" style="max-width: 15em;height: 15em" src="<?php echo base_url() ?>assets/images/logo.png" alt="BloodDonor"/></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class=""><a href="#">Home</a></li>
                    <li><a href="#" id="whyDonate">Why Donate Blood</a></li>
                    <li><a href="#" id="giveBlood">Give Blood</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>               
            </div><!-- /.navbar-collapse -->
        </nav>
        <div class="row">
            <div class="col-md-9">
                <div id="divDonate">divDonate</div>
                <div id="blood">Blood</div>

            </div>
            <div class="col-md-3">
                <!--<div class="login-page">-->
                <!--<div class= "login-box">-->
                <div class="panel panel-default">
                    <div class="page-header text-center">
                        <a href="#"><b>Blood Donor</b></a>
                    </div><!-- /.login-logo -->
                    <div class="panel-body">
                        <p class="login-box-msg">SIGN IN</p>
                        <?php $this->load->helper('form'); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
                                ?>
                            </div>
                        </div>
                        <?php
                        $this->load->helper('form');
                        $error = $this->session->flashdata('error');
                        if ($error) {
                            ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo $error; ?>                    
                            </div>
                            <?php
                        }
                        $success = $this->session->flashdata('success');
                        if ($success) {
                            ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo $success; ?>                    
                            </div>
                        <?php } ?>

                        <form action="<?php echo base_url(); ?>loginMe" method="post">
                            <div class="form-group has-feedback">
                                <input type="email" class="form-control" placeholder="Email" name="email" required />
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control" placeholder="Password" name="password" required />
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-bitbucket btn-sm">Sign In</button>                                
                                <a href="<?php echo base_url() ?>forgotPassword">Forgot Password?</a><br>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        <a href="<?php echo base_url() ?>login/createAccount">Not Yet Registered? Create Account</a><br>         
                    </div>
                </div><!-- /.login-box-body -->

            </div>
        </div>
    </div>

    <!--<?php include 'includes/homeFooter.php'; ?>-->
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#whyDonate").click(function () {
                $("#blood").hide();
                $("#divDonate").show();
            });

            $("#giveBlood").click(function ()
            {
                $("#divDonate").hide();
                $("#blood").show();
            });


        });
    </script>
