 <?php date_default_timezone_set('UTC'); ?> 
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
                              <h3 class="card-title">Cerrar No Conformidad</h3>
                          </div>
                          <form action="<?php echo base_url() ?>index.php/Dash_controller_nonconformities/cerrarNC/<?php echo $id; ?>" method="post">
                              <div class="card-body">
                                  
                                    <div class="form-group" >
                                        <a>Retroanálisis</a>  
                                      <select class="form-control" name="retroanalisis">
                                        <option value="SI">SI</option>
					<option value="NO">NO</option>
					<option value="NA">NA</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <select class="form-control" name="procesocambio">
                                          <a>Proeso Cambio</a> 
                                          <option value="0">Departamento</option>
                                          <?php 
                                          foreach ($departaments as $row) {
                                            echo '<option value="' . $row['departamento'] . '">' . $row['departamento'] . '</option>';
                                          }
                                          ?>
                                      </select>
                                  </div>
                                <div class="form-group" hidden>
                                      <input  type="text" class="form-control" placeholder="id" name="id" value="<?php echo $id; ?>">
                                  </div>
								  	

                              </div>
                              <div class="card-footer">
                                  <button type="submit" class="btn btn-primary">Cerrar la N/C</button>
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
