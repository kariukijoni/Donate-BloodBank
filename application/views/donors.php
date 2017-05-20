<div class="content-wrapper" style="background-color: #ffffff">    
    <h3>Potential Donors</h3>
    <div class="box">
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Mobile</td>
                    <td>Role</td>
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
                            <?= $row->role ?>
                        </td>
                        <td>    
                            <a href="<?php echo base_url() . 'task/donate?user_id=' . $row->userId; ?>" class="btn btn-instagram">Donate</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

