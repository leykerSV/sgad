<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
                <!-- left column -->
				<form action="<?php echo base_url() ?>index.php/Dash_controller_espinapescado/storeporque/<?php echo $id; ?>" method="post">
                <div class="col-md-8" >
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Análisis de Porque Nro: <?php echo $contador; ?></h3>
                        </div>
                        
                            <div class="card-body">
								<div class="form-group">
                                    <input type="text" class="form-control" placeholder="Causa Probable" name="causa">
                                </div>
								  <div class="form-group">
								  	<input type="text" class="form-control" placeholder="Porque 1" name="porque1">
                                  </div>
								  <div class="form-group">
								  	<input type="text" class="form-control" placeholder="Porque 2" name="porque2">
                                  </div>
								  <div class="form-group">
								  	<input type="text" class="form-control" placeholder="Porque 3" name="porque3">
                                  </div>
								  <div class="form-group">
								  	<input type="text" class="form-control" placeholder="Porque 4" name="porque4">
                                  </div>
								  <div class="form-group">
								  	<input type="text" class="form-control" placeholder="Porque 5" name="porque5">
                                  </div>
								<div class="form-group" hidden>
                                	<input type="text" class="form-control" placeholder="Conclusión" name="conclusion">
                                </div> 
								<div class="form-group">
                                      <textarea class="form-control" name="conclusion" rows="3"
                                          placeholder="Conclusión"></textarea>
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
