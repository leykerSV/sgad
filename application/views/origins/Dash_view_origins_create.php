  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <br>
      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <!-- left column -->
                  <div class="col-md-6">
                      <div class="card card-primary">
                          <div class="card-header">
                              <h3 class="card-title">Crear Origen</h3>
                          </div>
                          <form action="<?php echo base_url() ?>index.php/Dash_controller_origins/store" method="post">
				<div class="card-body">
				<div class="form-group">
                                    <input type="text" class="form-control" name="origin" value=>
                                </div>
				
                              <div class="card-footer">
                                  <button type="submit" class="btn btn-primary">Guardar</button>
                                  <?php
                                if (isset($messagetrue)) {
                                  echo '<p class="text-success">' . $messagetrue . '</p>';
                                }
                                if (isset($messagefalse)) {
                                    echo '<p class="text-danger">' . $messagefalse . '</p>';
                                }
                                ?>
                              </div>
                          </form>
                      </div>
                  </div>

                  <!-- right colum -->
                  <div class="col-md-6">
                  </div>
              </div>
              <!-- /.row -->
          </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
