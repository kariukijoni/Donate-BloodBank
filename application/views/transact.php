<div class="content-wrapper" style="background: #ffffff">    
    <div class="row">

        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading"> Add New Hospital
                    <button type="text" class="fa fa-refresh btn-sm pull-right" id="show">Show Hospitals</button>
                </div>
                <form action="<?php echo base_url() ?>task/addHos" id="addHos" method="post" role="form">
                    <div class="panel-body">
                        <div class="row">                           
                            <div class="col-md-6">
                                <input type="text" class="form-control required" id="hos_name" name="hos_name" placeholder="Name">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control required0" id="hos_location" name="hos_location" placeholder="Location">
                            </div>
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-md-offset-1">
                            <button type="submit" class="btn btn-bitbucket btn-sm">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-7">
            <div id="show_hos" style="background-color: #ffffff"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Blood Stock</div>
                <table class="table table-responsive table-bordered table-striped">
                    <thead>
                        <tr>
                            <!--<td>#</td>-->
                            <td>Blood Group</td>
                            <td>Type</td>
                            <td>Amount</td>
                            <td>Action</td>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
//                    $total_sum = 0;
                        foreach ($record as $row):
                            ?>
                            <tr>
    <!--                                <td>
                                <?= $row->userid ?>
                                </td>-->
                                <td>
                                    <?= $row->blood_type ?>
                                </td>

                                <td>
                                    <?= $row->donation_type ?>
                                </td>
                                <td class="donatedAmount">
                                    <?= $row->amount_donated_cc ?>
                                </td>                                        
    <!--                                <td>
                                    <a class="btn btn-bitbucket btn-sm fa fa-plus-circle donateBlood"></a>
                                </td>-->
                                <td>
                                    <button class="btn btn-bitbucket btn-sm fa fa-ambulance donateBlood" data-toggle="modal" data-target="#myModal"> </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title text-center" id="myModalLabel">Give Blood Stock to Registered Hospitals</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <select type="text" name="blood_group" id="blood_group" class="form-control">
                                                            <?php foreach ($hos_name as $hosName) { ?>
                                                                <option value="<?php echo $hosName->hos_name ?>"><?php echo $hosName->hos_name ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" value="<?= $row->blood_type ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" value="<?= $row->donation_type ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" value="<?= $row->amount_donated_cc ?>">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary btn-sm">Transact</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
<!--            <div class="panel panel-default">
                <div class="panel-heading text-center">Give Blood Stock to Registered Hospitals</div>
                <div class="form-group">
                    <select type="text" name="blood_group" id="blood_group" class="form-control">
                        <?php foreach ($hos_name as $hosName) { ?>
                            <option value="<?php echo $hosName->hos_name ?>"><?php echo $hosName->hos_name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group" id="givBloodStock">
                    <select type="text" name="blood_group" id="blood_group" class="form-control">
                        <?php foreach ($blood_type as $bloodGroup) { ?>
                            <option value="<?php echo $bloodGroup->blood_type ?>"><?php echo $bloodGroup->blood_type ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <select type="text" name="blood_group" id="blood_group" class="form-control">
                        <?php foreach ($donation_type as $donationType) { ?>
                            <option value="<?php echo $donationType->donation_type ?>"><?php echo $donationType->donation_type ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-bitbucket btn-sm">Give</button>
                </div>
            </div>-->
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/addHos.js" type="text/javascript"></script>
<script type="text/javascript">
    /*
     *function show hospital 
     */
    $('#show').click(function ()

    {
        $.ajax(
                {
                    type: 'POST',
                    url: "<?php echo base_url('task/showHos'); ?>",
                    success: function (data) {
                        $('#show_hos').html(data);
                    }
                });
    });

    /*
     * function transact
     */

    $('.donateBlood').click(function ()

    {
        var amount = $(this).closest('tr').find('.donatedAmount').text();
        $('#givBloodStock').html(amount);
    });

</script>

