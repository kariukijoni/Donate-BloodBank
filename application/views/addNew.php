<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h3>
            <i class="fa fa-users"></i> User Management
            <small>Add / Edit User</small>
        </h3>
    </section>

    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-sm-4">
                                <h3 class="box-title">Enter User Details</h3>
                            </div>
                            <div class="col-sm-8">
                                <?php
                                $this->load->helper('form');
                                $error = $this->session->flashdata('error');
                                if ($error) {
                                    ?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <?php echo $this->session->flashdata('error'); ?>                    
                                    </div>
                                <?php } ?>
                                <?php
                                $success = $this->session->flashdata('success');
                                if ($success) {
                                    ?>
                                    <div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                <?php } ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <form role="form" id="addUser" action="<?php echo base_url() ?>addNewUser" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Full Name</label>
                                        <input type="text" class="form-control required" id="fname" name="fname" value="<?= set_value('fname'); ?>" maxlength="128">
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <label for="email">Email address</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control required email" id="email"  name="email" value="<?= set_value('email'); ?>" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="mobile">Mobile Number</label>
                                    <div class="form-group"> 
                                        <input type="text" class="form-control required digits" id="mobile" name="mobile" value="<?= set_value('mobile'); ?>" maxlength="10">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">                                   
                                    <label for="gender">Gender</label>
                                    <div class="form-group">
                                        <select class="form-control" id="gender" name="gender">
                                            <option value="male">Male</option>
                                            <option value="female" >Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="weightLBS">WeightLBS</label>
                                        <input type="number" class="form-control required digits" id="weightLBS" name="weightLBS" value="<?= set_value('weightLBS'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="temperature">Temperature</label>
                                        <input type="number" class="form-control required" id="temperature" name="temperature" value="<?= set_value('temperature'); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="blood_pressure">Blood Pressure</label>
                                        <input type="number" class="form-control required" id="blood_pressure" name="blood_pressure" value="<?= set_value('blood_pressure'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="blood_type">Blood Type</label>
                                        <select class="form-control" id="blood_type" name="blood_type" value="<?= set_value('blood_type'); ?>">
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="dateOfBirth">Date Of Birth</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control required" id="dateOfBirth" name="dateOfBirth" value="<?= set_value('dateOfBirth'); ?>" placeholder="Date Of Birth">
                                        <script>
                                            $(function () {
                                                $('#dateOfBirth').datepicker();
                                            });
                                        </script>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="password">Password</label>
                                    <div class="form-group">  
                                        <input type="password" class="form-control required" id="password"  name="password" maxlength="10">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="cpassword">Confirm Password</label>
                                    <div class="form-group">
                                        <input type="password" class="form-control required equalTo" id="cpassword" name="cpassword" maxlength="10">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select class="form-control required" id="role" name="role">
                                            <option value="0">Select Role</option>
                                            <?php
                                            if (!empty($roles)) {
                                                foreach ($roles as $rl) {
                                                    ?>
                                                    <option value="<?php echo $rl->roleId ?>"><?php echo $rl->role ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div> 

                            </div>

                        </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <input type="submit" class="btn btn-bitbucket btn-sm" value="Submit" />
                    <input type="reset" class="btn btn-bitbucket btn-sm" value="Reset" />
                </div>
                </form>
            </div>
        </div> 
    </section>

</div>
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>
