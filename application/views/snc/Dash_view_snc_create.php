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
                              <h3 class="card-title">Crear Salida No Conforme</h3>
                          </div>
                          <form action="<?php echo base_url() ?>index.php/Dash_controller_snc/store" method="post">
                              <div class="card-body">
                                  <div class="form-group">
                                      	<input type="text" class="form-control" name="fecha"
                                        data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                        data-mask placeholder="Fecha">
                                  </div>
								  <div class="form-group">
                                      <textarea class="form-control" name="salida" rows="3"
                                          placeholder="Salida"></textarea>
                                  </div>
								  <div class="form-group">
                                      <input type="text" class="form-control" placeholder="Cantidad" name="cantidad">
                                  </div>
								  <div class="form-group">
                                      <select class="form-control" name="autor">
                                          <option value="0">Autor</option>
                                          <?php 
                                          foreach ($leaders as $row) {
                                            echo '<option value="' . $row['id'] . '">' . $row['nombre'] . ' ' . $row['name'] . '</option>';
                                          }
                                          ?>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <select class="form-control" name="tipo">
                                          <option value="0">Tipo</option>
                                          <?php 
                                          foreach ($types as $row) {
                                            echo '<option value="' . $row['id'] . '">' . $row['type'] . '</option>';
                                          }
                                          ?>
                                      </select>
                                  </div>
								  <div class="form-group">
                                      <textarea class="form-control" name="descripcion" rows="3"
                                          placeholder="Descripción de la Salida No Conforme"></textarea>
                                  </div>
								  <div class="form-group">
                                      <select class="form-control" name="verifico">
                                          <option value="0">Verificado</option>
                                          <option value="OK">OK</option>
										  <option value="NO OK">NO OK</option>
                                      </select>
                                  </div>
								  <div class="form-group">
                                      <select class="form-control" name="verificadopor">
                                          <option value="0">Verificado Por</option>
                                          <?php 
                                          foreach ($leaders as $row) {
                                            echo '<option value="' . $row['id'] . '">' . $row['nombre'] . ' ' . $row['name'] . '</option>';
                                          }
                                          ?>
                                      </select>
                                  </div>
                                 
                                  <div class="form-group">
                                      <textarea class="form-control" name="disposicion" rows="3"
                                          placeholder="Disposicion"></textarea>
                                  </div>
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
