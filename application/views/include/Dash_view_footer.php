  <!-- Main Footer -->
  <footer class="main-footer">
      Sistema Cocyar
      <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1.0.0
      </div>
      <?php //echo uri_string()?>
  </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?php echo base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() ?>assets/dist/js/adminlte.js"></script>
  <!-- OPTIONAL SCRIPTS -->
  <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="<?php echo base_url() ?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/raphael/raphael.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="<?php echo base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
  <!-- PAGE SCRIPTS -->
  <script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard2.js"></script>



  <!-- InputMask -->
  <script src="<?php echo base_url() ?>assets/plugins/moment/moment.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
  <!-- Page script -->
  <script>
    $(function() {
      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
      })
      //Money Euro
      $('[data-mask]').inputmask()
    })
  </script>
  <script>
    $(document).ready(function(){
      $("#addcause").click(function(){
    	  $("#newcause").append('<div class="form-group col-6"> <select class="form-control" name="stratum"><option>Grupo</option><option value="1">Método</option><option value="2">Mano de Obra</option><option value="3">Medidas</option><option value="3">Material</option><option value="3">Medio Ambiente</option><option value="3">Maquinaria</option> </select></div><div class="form-group col-6"> <input type="text" class="form-control" placeholder="Causa"></div><div class="form-group col-4"><textarea class="form-control" name="" rows="3" placeholder="1 ¿Porque?"></textarea></div><div class="form-group col-4"><textarea class="form-control" name="" rows="3" placeholder="2 ¿Porque?"></textarea></div><div class="form-group col-4"><textarea class="form-control" name="" rows="3" placeholder="3 ¿Porque?"></textarea></div><div class="form-group col-4"><textarea class="form-control" name="" rows="3" placeholder="4 ¿Porque?"></textarea></div><div class="form-group col-4"><textarea class="form-control" name="" rows="3" placeholder="5 ¿Porque?"></textarea></div><div class="form-group col-4"><textarea class="form-control" name="" rows="3" placeholder="Conclusión"></textarea></div>');
	    });
    });
</script>
  </body>

  </html>