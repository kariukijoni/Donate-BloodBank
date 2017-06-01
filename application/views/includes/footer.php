<!--Footer--->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>BloodDonor</b> Admin System | Version 1.0
    </div>
    <strong>Copyright &copy; 2017 <a href="<?php echo base_url(); ?>" style="color: #f00000">BloodDonor</a>.</strong> All rights reserved.
</footer>

<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/validation.js" type="text/javascript"></script>
<script type="text/javascript">
    var windowURL = window.location.href;
    pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
    var x = $('a[href="' + pageURL + '"]');
    x.addClass('active');
    x.parent().addClass('active');
    var y = $('a[href="' + windowURL + '"]');
    y.addClass('active');
    y.parent().addClass('active');
</script>
</body>
</html>