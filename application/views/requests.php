<div class="content-wrapper" style="background-color: #ffffff">
    <div class="row">
        <div class="row">
            <div class="col-md-4">
                <?php if (isset($success)) { ?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <div class="form-control alert alert-success">
                        <?php echo $success; ?>
                    </div>
                <?php } ?>
            </div> 
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Make Requests</div>
                <form action="<?php echo base_url() ?>task/requests" method="post" id="requestForm">
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group">
                                <select class="form-control" id="blood_group" name="blood_group">
                                    <!--<option value="--Select Blood Group--">Select Blood Group</option>-->
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
                        <div class="row">
                            <div class="form-group">
                                <select type="text" name="type_requested" id="type_requested" class="form-control">
                                    <?php foreach ($type as $row) { ?>
                                        <option value="<?php echo $row->type ?>"><?php echo $row->type ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <input type="number" class="form-control" name="quantity_requested" id="quantity_requested" 
                                       min="0" placeholder="Quantity requested" required>
                            </div>
                        </div>
                        <div class="row">
                            <button class="btn btn-bitbucket btn-sm" id="request">Request</button>

                        </div>                        
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">Show Made Requests</div>
                <div class="panel-body" style="height: 200px; overflow-y:scroll">
                    <table class="table table-responsive table-bordered">
                        <thead>
                            <tr>
                                <td>#</td>
                                <!--<td>UserId</td>-->
                                <td>Blood Group</td>
                                <td>Blood Type</td>
                                <td>Date Requested</td>
                                <td>Quantity Requested</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($tbl_request as $row):
                                ?>
                                <tr>
                                    <td>
                                        <?= $row->rqid ?>
                                    </td>                                        
    <!--                                        <td>
                                    <?= $row->userid ?>
                                    </td>-->
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
                                        <a class="btn btn-sm btn-danger" href="<?php echo base_url() . 'task/deleteReq/' . $row->rqid; ?>">
                                            <i class="fa fa-trash"></i></a>
                                        <!--<a class="btn btn-sm btn-info" href="<?php echo base_url() . 'editOld/'; ?>"><i class="fa fa-pencil"></i></a>-->
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
