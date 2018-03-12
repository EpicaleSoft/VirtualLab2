</section>
</section>
<!-- /.content -->
</div>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> <?php echo APP_VERSION;?>
    </div>
    <strong>Copyright &copy; 2018 <a href="<?php echo APP_DEVELOPER_URL;?>"><?php echo APP_DEVELOPER;?></a>.</strong> All rights
    reserved.
</footer>



</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo $_layoutParams['ruta_plugin']?>jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo $_layoutParams['ruta_plugin']?>bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo $_layoutParams['ruta_plugin']?>fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src=<?php echo $_layoutParams['ruta_js']."adminlte.min.js"?>></script>
<!-- SlimScroll -->
<script src="<?php echo $_layoutParams['ruta_plugin']?>jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src=<?php echo $_layoutParams['ruta_js']."demo.js"?>></script>
<script src="<?php echo $_layoutParams['ruta_plugin']?>bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo $_layoutParams['ruta_plugin']?>bootstrap-datepicker/js/locales/bootstrap-datepicker.es.js"></script>
<script src="<?php echo $_layoutParams['ruta_plugin']?>PACE/pace.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src=<?php echo $_layoutParams['ruta_js']."jquery.table2excel.min.js"?>></script>
<script src="<?php echo $_layoutParams['ruta_plugin']?>datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $_layoutParams['ruta_plugin']?>datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
        $('#tablemain').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,
            'language: ': 'es'
        })
    })
</script>
<script>
    $(function () {
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true,
            language: 'es',
            format: 'yyyy-mm-dd'
        })
    })
</script>
<script>$(document).ajaxStart(function() { Pace.restart(); });</script>
<?php if(isset($_layoutParams['JS']) && count($_layoutParams['JS'])):?>
    <?php for($i=0;$i<count($_layoutParams['JS']);$i++):?>
        <script src="<?php echo $_layoutParams['JS'][$i];?>" type="text/javascript"></script>
    <?php endfor;?>
<?php endif;?>
<?php if(Sessions::get('level')=='Administrador'):?>
    <script type="text/javascript">
        $('#btnexport').click(function (){
            $('.table').table2excel({
                exclude: ".noExl",
                name:'<?php echo APP_NAME;?> export',
                filename: "<?php echo APP_NAME;?>",
                fileext: ".xls",
                exclude_img: true,
                exclude_links: true,
                exclude_inputs: true
            })
        })
    </script>
<?php endif;?>
</body>
</html>