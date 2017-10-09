<div class="content-wrapper" style="background-color: #ffffff">
    <small>
        <div class="row" style="margin: 1px">       
            <div class="col-md-4">
                <div class="row">
                    <?php if (isset($success)) { ?>                    
                        <div class="form-control alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $success; ?>
                        </div>

                        <?php
                    }
                    if (isset($danger)) {
                        ?>
                        <div class="form-control alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $danger; ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>Make Requests</b>
                    </div>
                    <form action="<?php echo base_url() ?>task/requests" method="post" id="requestForm">
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group">
                                    <select class="form-control" id="blood_group" name="blood_group">
                                        <!--<option value="blank"></option>-->
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
                                    <input type="text" class="form-control" name="quantity_requested" id="quantity_requested" 
                                           min="0" max="2000" placeholder="Quantity requested (mml)" required>
                                </div>
                            </div>
                            <div class="row">
                                <button class="btn btn-bitbucket btn-sm" id="request">Request</button>
                            </div>                        
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-offset-1 col-md-6">
                <small>
                <li>Requests are made and SMS sent to only registered users with that blood group type requested</li>
                <li>An error message is displayed on the screen when message doesn't go through, incase this error is generated
                a <br>re-request should be made</li>
                <li>Results made in table <b>Made Request responses</b> and <b>Show Made Requests</b> can be filtered 
                    using any of the table columns</li>
                <li>A search can be implemented using any of the table columns</li>
                </small>
            </div>

        </div>
        <div class="row" style="margin: 1px">
            <div class="col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <b> Made Requests Responses</b>
                    </div>
                    <div class="panel-body">
                        <table class="table table-responsive table-bordered" id="requestResponses">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Blood Group</td>
                                    <td>Message</td>
                                    <td>Response Date</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($tbl_response as $row):
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $row->userid ?>
                                        </td>
                                        <td>
                                            <?= $row->blood_type ?>
                                        </td>
                                        <td>
                                            <?= $row->textArea ?>
                                        </td>
                                        <td>
                                            <?= $row->responseDate ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <?php if (isset($delete)) { ?>                    
                        <div class="form-control alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $delete; ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="panel panel-default">   
                    <div class="panel-heading">
                        <b> Show Made Requests</b>
                        <br>
                        Deleted Requests wont be displayed in the home page
                    </div>
                    <div class="panel-body">
                        <table class="table table-responsive table-bordered" id="madeRequests">
                            <thead>
                                <tr>
                                    <td>#</td>
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
                                                <i class="fa fa-trash"></i>
                                            </a>                                       
                                        </td>
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
<script src="<?php echo base_url(); ?>assets/js/requestForm.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#madeRequests').DataTable();
        $('#requestResponses').DataTable();
    });
</script>