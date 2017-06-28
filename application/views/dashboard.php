
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
            <small>Control panel</small>
        </h1>
    </section>

    <section class="content">
        <?php
        if ($role == ROLE_ADMIN || $role == ROLE_MANAGER) {
            ?>
            <div class="row">
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red-active">
                        <div class="inner">
                            <h3><?php echo $countAllUsers['count_rows']; ?></h3>
                            <h3></h3>
                            <p>All Users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?php echo base_url(); ?>userListing" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>

                </div><!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-teal-active">
                        <div class="inner">
                            <h3><?php echo $countDonors['count_rows']; ?></h3>
                            <p>All Active Donors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo base_url(); ?>user/donors" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>

                </div><!-- ./col -->
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-blue-active">
                        <div class="inner">                        
                            <div class="row">
                                <div class="col-md-6">
                                    <h3><?php echo $getmales['count_rows']; ?></h3>
                                    <p>Males</p>
                                    <div class="icon">
                                        <i class="ion ion-man"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3><?php echo $getfemales['count_rows']; ?></h3>
                                    <p>Females</p>
                                    <div class="icon">
                                        <i class="ion ion-woman"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
            </div>
            <?php
        }
        if ($role == ROLE_EMPLOYEE) {
            ?>
            <div class="small-box bg-teal-active">
                <div class="inner">
                    <!--<h3><?php echo $specificNextSafeD['nextSafe']; ?></h3>-->
                    <!--<p>Next Safe Donation Date</p>-->
                    Thank you for your blood donation.<br>
                    Your contribution will help sustain the <b>stock</b> to keep 
                    <br>up with the continuous
                    demand for blood by our patients.
                    <br>
                    With your blood donation, you have done great service to the nation.
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <!--<a href="<?php echo base_url(); ?>user/donors" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
            </div>
        <?php } ?>
    </section>

</div>
