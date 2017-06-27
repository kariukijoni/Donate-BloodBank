<div class="content-wrapper" style="background-color: #ffffff">
    <div class="panel panel-default">
        <div class="panel-body">
            <form action="" method="post" role="form">

                <?php
                foreach ($textArea as $row):
                    ?>
                <textarea cols="25" rows="10" readonly>
                        <?= $row->textArea ?>
                    </textarea>
                <?php endforeach ?>

                <button type="submit" class="btn btn-bitbucket btn-sm" name="readmsg">
                    Read
                </button>
            </form>
        </div>
    </div>
</div>