<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BloodDonor | Home</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/customHome.css" rel="stylesheet" type="text/css" />
    </head>    
    <body class="container-fluid colorpicker-with-alpha wrapper">
        <div class="row scroll"> 
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
                        <li><a href="#" id="aboutUs">Who We Are</a></li>
                        <li><a href="#" id="contactUS">Contact Us</a></li>
                    </ul>               
                </div><!-- /.navbar-collapse -->
            </nav>
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div id="divHome">
                            <div class="col-md-4">
                                <h4>
                                    <strong>
                                        Blood Donation Tips
                                    </strong>
                                </h4>  
                                <h4>What You Should Eat Before Donating Blood</h4>
                                <hr>
                                A healthy diet helps ensure a successful <br> blood donation, and also makes you feel
                                <br> better! Check out the following recommended foods to eat prior to your<br> donation.
                                <li>Low fat foods</li>
                                <li>Iron rich foods</li>
                                <h4>Beat the Myth</h4>
                                <hr>
                                Donating blood is safe and simple. Any healthy person above 18 years can donate blood. 
                                This is what you can expect when you are ready to donate blood:
                                <li>You walk into a reputed and safe blood donation centre organized by a reputed institution</li>
                                <li>Quick physical check will be done to check temperate, blood pressure, pulse and hemoglobin content
                                    to ensure you are a healthy donor</li>
                                <li>If found fit to donate, blood donation process starts.</li>
                                <!--Blood 2020-->                

                            </div>
                            <div class="col-md-8">
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
                                <!--Blood donation tips-->  
                                <div class="row">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                                        </ol>
                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <img src="assets/images/home_one.jpg" alt="...">
                                                <div class="carousel-caption">
                                                    <p>Thanks to Blood Donors Gets to be Happy and Healthy</p>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="assets/images/home_two.jpg" alt="...">
                                                <div class="carousel-caption">
                                                    <p>Be a Bloody Legend 
                                                        <button class="btn btn-danger">Save Lives</button></p>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="assets/images/home_three.jpg" height="500" width="667" alt="...">
                                                <div class="carousel-caption">
                                                    <p>Thanks to you Emily Gets to Be the Best Mum You Bloody Legend</p>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="assets/images/home_four.jpg" height="500" width="667" alt="...">
                                                <div class="carousel-caption">
                                                    <p>OrganiZations Around the World are Uniting To Save Lives</p>
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
                        <div id="divDonate">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2>Why Donate Blood</h2>
                                    Blood is the fluid that all life is based on. Blood is composed of 60% liquid part.<br>
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
                        <div id="divContactUS">
                            <div class="col-md-6">
                                <iframe src=""></iframe>
                            </div>
                            <div class="col-md-6">
                                <h2>Contact Form</h2>
                                <small>All input fields must <b>not</b> start with a zero <b>(0)</b></small>
                                <form action="<?php echo base_url() ?>" method="post" id="contact">
                                    <div class="form-group row">
                                        <label for="fullName" class="col-md-2">
                                            Full Name*
                                        </label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" name="fullName" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div  class="col-md-2">
                                            <label for="email">
                                                Email*
                                            </label>
                                        </div>
                                        <div class="col-md-10">
                                            <input class="form-control" type="email" name="email" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div  class="col-md-2">
                                            <label for="phone">Phone* </label>
                                        </div>
                                        <div class="col-md-2">
                                            <!--<button class="btn btn-sm btn-bitbucket">-->
                                            <select class="form-group" name="code">
                                                <option value="">--Code--</option>
                                                <option value="+254">+254</option>
                                                <option value="+257">+257</option>
                                            </select>
                                            <!--</button>-->
                                        </div>
                                        <div class="col-md-8">
                                            <input class="form-control col-md-10" type="tel" name="phone" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="textArea" rows="5" cols="50" required> 
                                        </textarea>
                                    </div>
                                    <button class="btn btn-bitbucket btn-sm" type="submit" >Submit</i></button>
                                </form>
                            </div>

                        </div>
                        <div id="divAboutUs">
                            We stand for hope. We stand for life. We stand for helping people to do something extraordinary, save
                            and improve the lives of others.<br>
                            The donors who make our work possible do so selflessly, giving life and changing life for the better. It 
                            is because of them, and the people who need their life saving and life enhancing donations, that we strive 
                            to be the best in all we do.
                            <br>
                            <div class="col-md-6">
                                <h4>
                                    <strong>
                                        We are responsible for:
                                        <hr>
                                    </strong>
                                </h4>
                                <li>Encouraging people to donate blood</li>
                                <li>Optimizing the safety and supply of blood and matching the to patients</li>
                                <li>Helping to raise the quality, effectiveness and clinical outcomes of blood</li>
                                <li>Commissioning and conducting research and development to improve outcomes for patients</li>
                            </div>
                            <div class="col-md-6">
                                <h4>
                                    <strong>
                                        Saving Lives Through the Power of Humanity
                                        <hr>
                                    </strong>                        
                                </h4>
                                The <b>BloodBonor</b> is a division of the Kenya RedCross and we subscribe fully to its 
                                humanitarian principles.
                                <br>
                                <h4>
                                    <strong>Vision</strong>
                                </h4>
                                To improve the lives of patient's through the power of humanity.
                                <br>
                                <h4>
                                    <strong>Our Mission</strong>
                                </h4>
                                To perform a critical role in health-care by providing a safe, secure and cost effective supply of
                                quality products, essential services and leading edge research to meet the need of patients.
                            </div>
                        </div>
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
                                        <?php
                                        echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' '
                                                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
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
                                <button class="btn btn-bitbucket btn-sm" data-toggle="modal" data-target="#myModal"> 
                                    Not Yet Registered? Create Account With Us
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h3 class="modal-title text-center" id="myModalLabel">
                                                    <strong>
                                                        Become a Member
                                                        <hr>
                                                    </strong>
                                                </h3>
                                                As a member of this <b>BloodDonor</b> blood bank, you will touch many peoples 
                                                lives. Your membership will make it possible for us to continue our voluntary 
                                                and aid work, first aid courses and many other good projects.


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.login-box-body -->
                    </div>
                </div>
            </div>
            <?php include 'includes/homeFooter.php'; ?>
        </div>
    </body>

    <script src="<?php echo base_url(); ?>assets/js/contactForm.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#divContactUS").hide();
            $("#divDonate").hide();
            $("#divAboutUs").hide();
            $("#divHome").show();
        });

        $("#headerHomeIcon").click(function () {
            $("#divContactUS").hide();
            $("#divDonate").hide();
            $("#divAboutUs").hide();
            $("#divHome").show();
        });
        $("#whyDonate").click(function () {
            $("#divContactUS").hide();
            $("#divDonate").show();
            $("#divAboutUs").hide();
            $("#divHome").hide();
        });

        $("#contactUS").click(function ()
        {
            $("#divDonate").hide();
            $("#divContactUS").show();
            $("#divAboutUs").hide();
            $("#divHome").hide();
        });
        $("#headerHome").click(function ()
        {
            $("#divDonate").hide();
            $("#divContactUS").hide();
            $("#divAboutUs").hide();
            $("#divHome").show();
        });
        $("#aboutUs").click(function ()
        {
            $("#divDonate").hide();
            $("#divContactUS").hide();
            $("#divHome").hide();
            $("#divAboutUs").show();
        });
        $("input").blur(function () {
            var val = $(this).val();
            if (val.indexOf("0") == 0) {
                $(this).val("");
                $(this).attr("placeholder", "Invalid");
            }
        });

    </script>
