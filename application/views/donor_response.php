<div class="content-wrapper" style="background-color: #ffffff">
    <div class="panel panel-default" style="width: 400px;">
        <div class="panel-heading">
            Response
        </div>     
        <div class="panel-body">
            <form action="<?php echo base_url() ?>task/responses" method="post">
                <?php if (isset($success)) { ?>                    
                    <div class="form-control alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $success; ?>
                    </div>

                <?php }
                ?>
                <div class="form-group">
                    <textarea rows="4" cols="45" id="textArea" name="textAreaMsg" maxlength="100" required></textarea> 
                </div>
                <input type="submit" class="btn btn-bitbucket btn-sm" value="Submit" />
            </form>
        </div>
    </div>
</div>