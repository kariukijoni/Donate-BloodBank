<div class="content-wrapper" style="background-color: #ffffff">

    <div class="row">
        <div class="col-md-6">
            <div class="panel  panel-default">
                <div class="panel-heading">Donate</div>

                <form action="<?php echo base_url() ?>task/donateUser" id="donate_blood" method="post">  
                    <div class="panel-body">
                        <input type="hidden" name="userId" value="<?php echo $user_id ?>">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select type="text" name="donation_type" id="donation_type" class="form-control" placeholder="Donation Type">
                                    <?php foreach ($type as $row) { ?>
                                        <option value="<?php echo $row->type ?>"><?php echo $row->type ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="amount_donated_cc" id="amount_donated_cc" min="0" class="form-control" placeholder="Amount Donated CC">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-1">
                             <button type="submit" class="btn btn-bitbucket btn-sm">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/donate.js" type="text/javascript"></script>