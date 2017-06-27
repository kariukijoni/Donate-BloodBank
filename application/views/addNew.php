<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <small>
        <section class="content-header">
            <h4>
                <i class="fa fa-users"></i> User Management
                <small>Add User</small>
            </h4>
        </section>
        <div class="row">
            <div class="col-md-8">      
                <!-- left column -->            
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
                                    <div class="row form-group" style="padding: 0px">
                                        <div class="col-md-5">
                                            <select class="form-group form-control btn btn-sm btn-bitbucket select" id="code" name="code" required>
                                                <option value="">--Code--</option>
                                                <option value="+254">+254</option>
                                                <option value="+257">+257</option>
                                            </select>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control required digits" id="mobile" name="mobile" value="<?= set_value('mobile'); ?>" minlength="9" maxlength="9">  
                                        </div>
        <!--                                <input type="hidden" class="form-control required digits" id="code" name="code" value="+254">-->


                                        <!--                                <div class="input-group"> 
                                                                            <span class="input-group-addon btn btn-bitbucket" style="background: #00517e">+254
                                                                                <input type="hidden" class="form-control required digits" id="code" name="code" value="+254">
                                                                            </span>
                                                                            <input type="text" class="form-control required digits" id="mobile" name="mobile" value="<?= set_value('mobile'); ?>" minlength="9" maxlength="9">
                                                                        </div>-->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">                                   
                                    <label for="gender">Gender</label>
                                    <div class="form-group">
                                        <select class="form-control" id="gender" name="gender" required>
                                            <option value="">--Select Gender--</option>
                                            <option value="male">Male</option>
                                            <option value="female" >Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="weightLBS">Weight Kgs</label>
                                        <input type="text" class="form-control required digits" id="weightLBS" name="weightLBS" 
                                               min="0" value="<?= set_value('weightLBS'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="temperature">Temperature</label>
                                        <input type="text" class="form-control required" id="temperature" name="temperature" 
                                               min="0" max="55" value="<?= set_value('temperature'); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="blood_pressure">Blood Pressure</label>
                                        <input type="text" class="form-control required" id="blood_pressure" name="blood_pressure" 
                                               min="0" max="120" value="<?= set_value('blood_pressure'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="blood_type">Blood Group</label>
                                        <select class="form-control" id="blood_type" name="blood_type" value="<?= set_value('blood_type'); ?>" required>
                                            <option value="">--Select Blood Group--</option>
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
                                        <input type="date" class="form-control required" readonly id="dateOfBirth" name="dateOfBirth" value="<?= set_value('dateOfBirth'); ?>" 
                                               placeholder="DD/MM/YYYY">
                                        <script type="text/javascript">
                                            var endDate = new Date(); //startDate
                                            var startDate = new Date(); //endDate
                                            endDate.setFullYear(new Date().getFullYear() - 18);
                                            startDate.setFullYear(new Date().getFullYear() - 55);
                                            $('#dateOfBirth').datepicker(
                                                    {
                                                        startDate: startDate,
                                                        viewMode: "years",
                                                        endDate: endDate
                                                    }
                                            );
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
            <div class="col-md-4">
                <div class="panel panel-default" style="margin-right: 2px;">
                    <div class="panel-heading"><b>Admission Rules</b></div>
                    <div class="panel-body">
                        <li>All input fields must be filled</li>
                        <li>All input fields <b>must not</b> have <b>zero</b> as first element</li>
                        <li>Phone numbers start with the <b>second</b> digit, i.e 0717978086 <b>to</b> 717978086</li>
                        <li>Users' role should be defined with caution</li>
                        <li>Correct email address should be used as will be required during resetting of passwords</li>
                        <li>All donors should be atleast <b>18yrs</b> and maximum of <b>55yrs</b> of age</li>
                    </div>
                </div>
            </div>
        </div> 
    </small>
</div>
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>
<script type="text/javascript">
                                        $("input").blur(function () {
                                            var val = $(this).val();
                                            if (val.indexOf("0") == 0) {
                                                $(this).val("");
                                                $(this).attr("placeholder", "Invalid");
                                            }
                                        });

</script>