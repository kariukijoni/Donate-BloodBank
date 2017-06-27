<div class="content-wrapper" style="background-color: #ffffff">
    <small>
        <div class="row" style="margin: 1px">
            <div class="col-md-7">
                <div class="panel panel-default">

                    <div class="panel-heading text-center">Made Requests 
                        <button class="btn btn-sm" id="status_check">
                            Notifications<a class="fa fa-bell-o" ></a>
                            <?php echo count($notifications); ?>
                        </button>                
                    </div>
                    <div class="panel-body">
                        <table class="table table-responsive table-bordered" id="notifications">
                            <thead>
                                <tr>
                                    <td>Blood Group</td>
                                    <td>Blood Type</td>
                                    <td>Date Requested</td>
                                    <td>Quantity Requested</td>
                                    <td>Response</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($specific_request as $row):
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
                                        <td>
                                            <a class="btn btn-sm btn-info" href="<?php echo base_url() . 'task/responses/' . $row->rqid; ?>"><i class="fa fa-reply"></i></a>

                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Donation Reports</div>
                    <div class="panel-body">
                        <table class="table table-responsive table-bordered" id="specific_donor_reports">
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
    </small>
</div>
<script type="text/javascript">
        $(document).ready(function () {
        $('#specific_donor_reports').DataTable();
    $('#notifications').DataTable();
    });
</script>