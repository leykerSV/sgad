<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
                <!-- left column -->
				<form action="<?php echo base_url() ?>index.php/Dash_controller_espinapescado/store/<?php echo $id; ?>" method="post">
				<div class="col-md-8">
					<div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Análisis de Significancia</h3>
                        </div>
						<div class="card-body">
							<div class="form-group">
                                <input type="text" class="form-control" placeholder="Analisis de Significancia" name="analisissignificancia">
							</div>
						</div>
					</div>
				</div>	
				<div class="col-md-8" >
					<div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Descripción de Causas</h3>
                        </div>
						<div class="card-body">
							<div class="form-group">
                                <input type="text" class="form-control" placeholder="Descripción de Causas" name="desccausas">
							</div>
						</div>
					</div>
				</div>
                <div class="col-md-8" >
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">6M - Espina de Pescado</h3>
                        </div>
                        
                            <div class="card-body">
								<div class="form-group" hidden>
                                    <input type="text" class="form-control" placeholder="Anomalías" name="anomalia">
                                </div>
								  
                                <div class="form-group">
                                	<input type="text" class="form-control" placeholder="Medidas" name="medidas">
                                </div>
								  <div class="form-group">
                                      <input type="text" class="form-control" placeholder="Maquinarias" name="maquinaria">
                                  </div>
								  <div class="form-group">
                                      <input type="text" class="form-control" placeholder="Mano de Obra" name="manoobra">
                                  </div>
								  <div class="form-group">
                                      <input type="text" class="form-control" placeholder="Medio Ambiente" name="medioambiente">
                                  </div>
								  <div class="form-group">
                                      <input type="text" class="form-control" placeholder="Método" name="metodo">
                                  </div>
								  <div class="form-group">
                                      <input type="text" class="form-control" placeholder="Material" name="material">
                                  </div>
								 
							</div>
							
                          </form>                         
                                  
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

          </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
