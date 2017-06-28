<div class="content-wrapper" style="background-color: #ffffff">
    <small>
        <div class="row" style="margin: 1px">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <b>Donation Reports</b>
                    </div>
                    <div class="panel-body">
                        <table class="table table-responsive table-striped" id="donationReports">
                            <thead style="background-color: #FFD6B3">
                                <tr>
                                    <td>#</td>
                                    <td>Blood Type</td>
                                    <td>Donation Date</td>
                                    <td>Next Safe Donation</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($reportDonors as $report):
                                    ?>
                                    <tr>
                                        <td><?= $report->did ?></td>
                                        <td><?= $report->donation_type ?></td>
                                        <td><?= $report->donation_date ?></td>
                                        <td><?= $report->nextSafeDonation ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <b>Transaction Reports</b>
                    </div>
                    <div class="panel-body">
                        <table class="table table-responsive table-striped" id="transactionReports">
                            <thead style="background-color: #FFD6B3">
                                <tr>
                                    <td>#</td>
                                    <td>Hospital name</td>
                                    <td>Blood Group</td>
                                    <td>Blood Type</td>
                                    <td>Amount</td>
                                    <td>Date</td>
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
                                            <?= $report->amount_donated ?>
                                        </td>
                                        <td>
                                            <?= $report->transact_date ?>
                                        </td>

                                    <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </small>
</div>
<script>
    $(document).ready(function () {
        $('#donationReports').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'print'
            ]
        });
        $('#transactionReports').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'print'
            ]
        });
    });
</script>