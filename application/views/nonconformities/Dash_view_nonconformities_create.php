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
                              <h3 class="card-title">Crear No Conformidad</h3>
                          </div>
                          <form action="<?php echo base_url() ?>index.php/Dash_controller_nonconformities/store" method="post">
                              <div class="card-body">
                                  <div class="form-group">
                                      	<input type="text" class="form-control" name="fecha"
                                        data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy"
                                        data-mask placeholder="Fecha">
                                  </div>
                                  <div class="form-group">
                                      <select class="form-control" name="origen">
                                          <option value="0">Origen</option>
                                          <?php 
                                          foreach ($origins as $row) {
                                            echo '<option value="' . $row['id'] . '">' . $row['origin'] . '</option>';
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
                                      <textarea class="form-control" name="descnoconf" rows="3"
                                          placeholder="Descripción de la No Conformidad"></textarea>
                                  </div>
                                  <div class="form-group">
                                      <select class="form-control" name="lider">
                                          <option value="0">Lider</option>
                                          <?php 
                                          foreach ($leaders as $row) {
                                            echo '<option value="' . $row['id'] . '">' . $row['nombre'] . ' ' . $row['name'] . '</option>';
                                          }
                                          ?>
                                      </select>
                                  </div>
								  <div class="form-group">
                                      <select class="form-control" name="depto">
                                          <option value="0">Departamento</option>
                                          <?php 
                                          foreach ($departaments as $row) {
                                            echo '<option value="' . $row['iddeptos'] . '">' . $row['departamento'] . '</option>';
                                          }
                                          ?>
                                      </select>
                                  </div>
								  <div class="form-group">
                                      <input type="text" class="form-control" placeholder="Documentacion Asociada" name="docasociada">
                                  </div>
								  <div class="form-group" hidden>
                                      <input  type="text" class="form-control" placeholder="Análisis de Significancia" name="analisissignificancia">
                                  </div>
								  <div class="form-group">
                                      <textarea class="form-control" name="observaciones" rows="3"
                                          placeholder="Observaciones"></textarea>
                                  </div>
                                  <div class="form-group hidden>
                                      <textarea class="form-control" name="desccausas" rows="3"
                                          placeholder="Descripción de Causas"></textarea>
                                  </div>
								  <div class="form-group" hidden>
                                      <input type="text" class="form-control" placeholder="Espina de Pescado y Porques" name="espinayporque">
                                  </div>
								  <div class="form-group" hidden>
                                      <input type="text" class="form-control" placeholder="Estado" name="estado">
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
