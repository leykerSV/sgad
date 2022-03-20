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
                              <h3 class="card-title">Crear Acciones</h3>
                          </div>
                          <form action="<?php echo base_url() ?>index.php/Dash_controller_actions/store" method="post">
						  		<div class="card-body">
							  		<div class="form-group">
                                      <div class="input-group">
                                          <input type="text" class="form-control" name="fecha"
                                              data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy"
                                              data-mask placeholder="Fecha">
                                      </div>
                                  </div>
								  <div class="form-group">
									  <a>Orígen</a>
                                      <select class="form-control" name="origen">
                                          <?php 
                                          foreach ($origins as $row) {
                                            echo '<option value="' . $row['id'] . '">' . $row['origin'] . '</option>';
                                          }
                                          ?>
                                      </select>
                                  </div>
								 								  <div class="form-group">
                                      <textarea class="form-control" name="descripcioncausas" rows="3"
                                          placeholder="Descripción del Problema"></textarea>
                                  </div>
								  <div class="form-group">
                                      <textarea class="form-control" name="descripcionacciones" rows="3"
                                          placeholder="Descripción de Acción"></textarea>
                                  </div>
								  <div class="form-group">
									  <a>Tipo</a>
                                      <select class="form-control" name="tipoaccion">
                                          <?php 
                                          foreach ($types as $row) {
                                            echo '<option value="' . $row['id'] . '">' . $row['type'] . '</option>';
                                          }
                                          ?>
                                      </select>
                                  </div>
								  <div class="form-group">
                                      <select class="form-control" name="responsable">
                                          <option value="0">Responsable</option>
                                          <?php 
                                          foreach ($leaders as $row) {
                                            echo '<option value="' . $row['id'] . '">' . $row['nombre'] . ' ' . $row['name'] . '</option>';
                                          }
                                          ?>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <a>Plazos de Ejecución</a>
									  <input type="text" class="form-control" name="plazosejecucion"
                                              data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy"
                                              data-mask placeholder="Plazos Ejecución">
								  </div>
								  <div class="form-group">
								  	  <a>Implementada?</a>	
                                      <select class="form-control" name="implementada">
                                          <option value="NO">NO</option>
										  <option value="SI">SI</option>
                                                                                  <option value="" selected></option>

                                      </select>
                                  </div>
								  <div class="form-group">
								  		<a>Estado Implementación</a>
                                      <select class="form-control" name="estadoimplementacion">
									  	<option value="EP">En Proceso</option>  
									  	<option value="EPD">En Proceso Demorada</option>
										<option value="CEP">Cerrada En Plazo</option>
										<option value="CFP">Cerrada Fuera Plazo</option>
										<option value="CAN">Cancelada</option>
                                                                                <option value="" selected></option>
                                      </select>
                                  </div>
								<div hidden>
								  <div class="form-group">
									  <a>Estado Eficacia</a>
                                      <select class="form-control" name="eficaz">
									  	<option value="EP">En Proceso</option>  
									  	<option value="EPD">En Proceso Demorada</option>
										<option value="CEP">Cerrada En Plazo</option>
										<option value="CFP">Cerrada Fuera Plazo</option>
										<option value="CAN">Cancelada</option>
                                                                                <option value="" selected></option>
                                      </select>
                                  </div>
								  <div class="form-group">
                                      <a>Fecha de Verificación</a>
									  <input type="text" class="form-control" name="fechaverifeficacia"
                                              data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy"
                                              data-mask placeholder="">
								  </div>
                                                                    
								  <div class="form-group">
                                      <input type="text" class="form-control" placeholder="Resultado Eficacia" name="resultadoeficacia">
                                  </div>
								  <div class="form-group" hidden>
									  <a>Retroalimenta Análisis de Riesgos?</a>
                                      <select class="form-control" name="retroanalisis">
										  <option value="SI">SI</option>
										  <option value="NO">NO</option>
										  <option value="NA">NA</option>
                                                                                  <option value="" selected></option>
                                      </select>
                                  </div>
								  <div class="form-group" hidden>
                                      <input type="text" class="form-control" placeholder="Proceso Cambio" name="procesocambio">
                                  </div>
                                  <div class="form-group">
                                      <textarea class="form-control" name="observaciones" rows="3"
                                          placeholder="Observaciones"></textarea>
                                  </div>
								  <div class="form-group" hidden>
									  <a>Estado Implementación</a>
                                      <select class="form-control" name="estadoimp">
										  <option value="1">Abierta</option>
										  <option value="2">Cerrada</option>
                                      </select>
                                  </div>
								  <div class="form-group" hidden>
									  <a>Estado Verificación</a>
                                      <select class="form-control" name="estadover">
										  <option value="1">Abierta</option>
										  <option value="2">Cerrada</option>
                                      </select>
                                  </div>
								  <div class="form-group">
									  <input type="text" class="form-control" name="fecharealizacion"
                                              data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy"
                                              data-mask placeholder="Fecha Realización">
								  </div>
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
