<div class="content-wrapper" style="background-color: #ffffff">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">

                <div class="panel-heading text-center">Made Requests            
                    <div class="badge" style="background-color: #000000">
                        <a href="#">
                            Notifications
                            <?php echo count($notifications); ?>
                        </a>
                    </div>
                </div>
                <div class="panel-body" style="height: 200px; overflow-y:scroll">
                    <table class="table table-responsive table-bordered">
                        <thead>
                            <tr>
                                <!--<td>#</td>-->
                                <td>Blood Group</td>
                                <td>Blood Type</td>
                                <td>Date Requested</td>
                                <td>Quantity Requested</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($specific_request as $row):
                                ?>
                                <tr>
        <!--                                <td>
                                    <?= $row->rqid ?>
                                    </td> -->
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
                                    <td>
                                        <!--<a class="btn btn-sm btn-info" href="<?php echo base_url() . 'editOld/' . $row->rqid; ?>"><i class="fa fa-pencil"></i></a>-->

                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Donation Reports</div>
                <div class="panel-body" style="height: 200px; overflow-y:scroll">
                    <table class="table table-responsive table-bordered">
                        <thead style="background-color: #f9fafc">
                            <tr>
                                <td>#</td>
                                <td>Blood Type</td>
                                <td>Donation Date</td>
                                <td>Next Safe Donation</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($specific_report as $specificReport):
                                ?>
                                <tr>
                                    <td><?= $specificReport->did ?></td>
                                    <td><?= $specificReport->donation_type ?></td>
                                    <td><?= $specificReport->donation_date ?></td>
                                    <td><?= $specificReport->nextSafeDonation ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>