  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2022 <a href="#" class="text-primary">Fikry Ikhsan Anshori</a></strong>
  </footer>
</div>
<!-- ./wrapper -->


<script src="<?=base_url('_assets/bower_components/jquery/dist/jquery.min.js')?>"></script>
<script src="<?=base_url('_assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<script src="<?=base_url('_assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
<script src="<?=base_url()?>/_assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?=base_url()?>/_assets/plugins/iCheck/icheck.min.js"></script>
<script src="<?=base_url()?>/_assets/dist/js/adminlte.min.js"></script>
<script src="<?=base_url()?>/_assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>/_assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url()?>/_assets/bower_components/ckeditor/ckeditor.js"></script>
<script src="<?=base_url()?>/_assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })

// kalender
  $(document).ready(function() {
      $('.datepicker').datepicker({
          format: 'yyyy-mm-dd',
          autoclose: true,
          todayHighlight: true,
      });
  });

// table
  $(document).ready(function() {
    $('#table1').DataTable({})
  });


</script>
</body>
</html>
