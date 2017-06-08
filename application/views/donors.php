<div class="content-wrapper" style="background-color: #ffffff">   
    <div class="row">
        <div class="col-md-6">
            <h4>Potential Donors
            </h4>
            <div class="box">
                <table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Mobile</td>
                            <td>Blood Group</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($tbl_users as $row):
                            ?>
                            <tr>
                                <td>
                                    <?= $row->userId ?>
                                </td>
                                <td>
                                    <?= $row->name ?>
                                </td>
                                <td>
                                    <?= $row->email ?>
                                </td>
                                <td>
                                    <?= $row->mobile ?>
                                </td>

                                <td>
                                    <?= $row->blood_type ?>
                                </td>
                                <td>    
                                    <a href="<?php echo base_url() . 'task/donate?user_id=' . $row->userId; ?>" 
                                       class="btn btn-instagram btn-sm">Donate</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <h4>Next Probable Donors</h4>
            <div class="box">
                <table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Remaining Days</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($getNextProbableDonors as $row):
                            ?>
                            <tr>
                                <td>
                                    <?= $row->name ?>
                                </td>
                                <td>
                                    <?= $row->email ?>
                                </td>
                                <td>
                                    <?php
                                    $str = $row->nextSafeDonation;
                                    $start = strtotime($str);
                                    $end = strtotime(date('Y-m-d'));
                                    $result = ($start - $end) / (60 * 60 * 24);
                                    print $result;
                                    ?>
                                </td>

                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

