<div class="content-wrapper" style="background: #ffffff">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Donation Reports</div>
                <div class="panel-body" style="height: 400px; overflow-y:scroll">
                    <table class="table table-responsive table-bordered">
                        <thead style="background-color: #f9fafc">
                            <tr>
                                <td>#</td>
                                <td>Blood Type</td>
                                <td>Donation Date</td>
                                <td>Next Safe Donation</td>
                                <td>Print</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($reportDonors as $report):
                                ?>
                                <tr>
                                    <td><?= $report->did ?></td>
                                    <td><?= $report->donation_type ?></td>
                                    <td><?=$report-> donation_date?></td>
                                    <td><?= $report->nextSafeDonation ?></td>
                                    <td>
                                        <i class="fa fa-print" style="color: #1e282c"></i>
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
                <div class="panel-heading text-center">Transaction Reports</div>
                <div class="panel-body" style="height: 400px; overflow-y:scroll">
                    <table class="table table-responsive table-bordered">
                        <thead style="background-color: #f9fafc">
                            <tr>
                                <td>#</td>
                                <td>Hospital name</td>
                                <td>Blood Group</td>
                                <td>Blood Type</td>
                                <td>Amount</td>
                                <td>Date</td>
                                <td>Print</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($reportHos as $report):
                                ?>
                                <tr>
                                    <td>
                                        <?= $report->trans_id ?>
                                    </td>
                                    <td>
                                        <?= $report->hos_name ?>
                                    </td>
                                    <td>
                                        <?= $report->donation_type ?>
                                    </td>
                                    <td>
                                        <?= $report->blood_type ?>
                                    </td>
                                    <td>
                                        <?= $report->amount_donated_cc ?>
                                    </td>
                                    <td>
                                        <?= $report->transact_date ?>
                                    </td>
                                    <td>
                                        <i class="fa fa-print" style="color: #1e282c"></i>
                                    </td>
                                </tr>

                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>