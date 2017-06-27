<div class="content-wrapper" style="background-color: #ffffff">
    <div class="row">
        <div class="col-md-6">
            <div class="box-body table-responsive no-padding">
                <div class="panel panel-default" style="margin: 2px">
                    <div class="panel-heading">Information concerning Unregistered users
                        <a class="badge fa fa-bell-o">
                            <?php echo $contact_form['count_rows']; ?>
                        </a>
                        <div class="">
                            <small>Once a message is read, it <b>won't</b> be displayed
                                <br>
                                Users are required to <b>click table rows</b> to read the message
                            </small>

                        </div>
                    </div>
                    <div class="panel-body">
                        <small>
                            <table class="table table-hover table-striped" id="unregisterd">
                                <thead>
                                    <tr>
                                        <th>Contact Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Text</th>
                                        <th>Date Sent</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($unregistered as $row):
                                        ?>
                                        <tr>
                                            <td>  
                                                <a href="<?php echo base_url() . 'user/read_msg/' . $row->contact_id; ?>">
                                                    <?= $row->contact_id ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url() . 'user/read_msg/' . $row->contact_id; ?>">
                                                    <?= $row->fullName ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url() . 'user/read_msg/' . $row->contact_id; ?>">
                                                    <?= $row->email ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url() . 'user/read_msg/' . $row->contact_id; ?>">
                                                    <?= $row->phone ?>
                                                </a>
                                            </td>

                                            <td>
                                                <a href="<?php echo base_url() . 'user/read_msg/' . $row->contact_id; ?>">
                                                    <?= $row->textArea ?>
                                                </a>
                                            </td>
                                            <td>   
                                                <a href="<?php echo base_url() . 'user/read_msg/' . $row->contact_id; ?>">
                                                    <?= $row->date ?>
                                                </a>
                                            </td>
                                            <!--<a href=""-->
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </small>
                    </div>
                </div>
            </div>
        </div><!-- /.box-body -->
        <div class="col-md-6">
            <div class="panel panel-default" style="margin: 2px">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Contact Id</th>
                            <th>Name</th>
                            <th>Email</th> 
                            <th>Text</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($read_msg as $row):
                            ?>
                            <tr>
                                <td>                          
                                    <?= $row->contact_id ?>
                                </td>
                                <td>
                                    <?= $row->fullName ?>
                                </td>
                                <td>
                                    <?= $row->email ?>
                                </td>
                                <td>
                                    <?= $row->textArea ?>
                                </td>
                                <td>
                                    <?= $row->phone ?>
                                </td>
                                <!--<a href=""-->
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.table').DataTable();
    });
</script>