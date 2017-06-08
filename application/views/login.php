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
    <body class="container colorpicker-with-alpha wrapper">
        <nav class="navbar navbar-default" role="navigation">
            <!-- BloodDonor and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" id="headerHomeIcon"><img class="img-responsive img-rounded img-thumbnail" style="max-width: 15em;height: 15em" src="<?php echo base_url() ?>assets/images/logo.png" alt="BloodDonor"/></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#" id="headerHome">Home</a></li>
                    <li><a href="#" id="whyDonate">Why Donate Blood</a></li>
                    <li><a href="#" id="giveBlood">Give Blood</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>               
            </div><!-- /.navbar-collapse -->
        </nav>
        <div class="row">
            <div class="col-md-9">
                <div id="divHome">
                    <div class="col-md-5">

                    </div>
                    <div class="col-md-7">
                        <p class="text-center">Made Requests</p>
                        <table class="table table-responsive table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td>Blood Group</td>
                                    <td>Blood Type</td>
                                    <td>Date Requested</td>
                                    <td>Quantity Requested</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($tbl_request as $row):
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $row->blood_type ?>
                                        </td>
                                        <td>
                                            <?= $row->blood_type_requested ?>
                                        </td>
                                        <td>
                                            <?= $row->date_requested ?>
                                        </td>
                                        <td>
                                            <?= $row->quantity_requested ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table> 
                    </div>
                </div> 
                <div id="divDonate">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Why Donate Blood</h2>
                            Blood is the fluid that all life is base on. Blood is composed of 60% liquid part.<br>
                            The liquid part called plasma, made up of 90% of water and 10% nutrients,hormones, etc is really replenished 
                            by food, medicines, etc. But the solid part that contains RBC (Red Blood Cells), WBC (White Blood Cells)
                            and platelets take valuable time to be replaced if lost.<br>
                            This is where you come in. The time taken by the patients body to replace it could cost his/her life.
                            Sometimes the body might not be in a condition to replace it at all.
                            As you know blood cannot be harvested it can only be donated. <br>This means only you can a save a life that 
                            needs blood.
                            Saving a life does not require heroic deeds. You could just do it with a small thought and an even smaller
                            effort. 
                        </div>
                        <div class="col-md-6">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                </ol>
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="assets/images/carousel_one.jpg" alt="...">
                                        <div class="carousel-caption">
                                            <p>Women's Day Special at our Blood Bank</p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="assets/images/carousel_two.jpg" alt="...">
                                        <div class="carousel-caption">
                                            <p>Mr.U.Sudhir Lodha Donated Blood at our Blood Bank</p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="assets/images/carousel_three.jpg" height="500" width="667" alt="...">
                                        <div class="carousel-caption">
                                            <p>First Donors Donated Blood for World Blood Donors Day at our Blood Bank</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="divBlood">Blood</div>

            </div>
            <div class="col-md-3">
                <!--<div class="login-page">-->
                <!--<div class= "login-box">-->
                <div class="panel panel-default">
                    <div class="page-header text-center">
                        <a href="#"><b style="color: #f00000">BloodDonor</b></a>
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
        <?php include 'includes/homeFooter.php'; ?>

    </body>


    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#divBlood").hide();
            $("#divDonate").hide();
            $("#divHome").show();
        });

        $("#headerHomeIcon").click(function () {
            $("#divBlood").hide();
            $("#divDonate").hide();
            $("#divHome").show();
        });
        $("#whyDonate").click(function () {
            $("#divBlood").hide();
            $("#divDonate").show();
            $("#divHome").hide();
        });

        $("#giveBlood").click(function ()
        {
            $("#divDonate").hide();
            $("#divBlood").show();
            $("#divHome").hide();
        });
        $("#headerHome").click(function ()
        {
            $("#divDonate").hide();
            $("#divBlood").hide();
            $("#divHome").show();
        });
    </script>
