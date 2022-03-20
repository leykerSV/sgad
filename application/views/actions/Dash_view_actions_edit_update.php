  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <br>
      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <!-- left column -->
                  <div class="col-12">
                      <div class="card card-primary">
                          <div class="card-header">
                              <h3 class="card-title">Completar Acción</h3>
                          </div>
                          <form
                              action="<?php echo base_url() ?>Dash_controller_nonconformities/storeCauses?id=<?php echo $_GET['id'] ?>"
                              method="post">
                              <div class="card-body row">
                                  <div class="form-group col-3">
                                      <div class="input-group">
                                          <input type="text" class="form-control" name=""
                                              value="<?php echo $dataform['action']; ?>" disabled>
                                      </div>
                                  </div>
                                  <div class="form-group col-3">
                                      <div class="input-group">
                                          <input type="text" class="form-control" name=""
                                              value="<?php echo $dataform['type']; ?>" disabled>
                                      </div>
                                  </div>
                                  <div class="form-group col-3">
                                      <div class="input-group">
                                          <input type="text" class="form-control" name=""
                                              value="<?php echo $dataform['name'].' '.$dataform['lastname']; ?>"
                                              disabled>
                                      </div>
                                  </div>
                                  <div class="form-group col-3">
                                      <div class="input-group">
                                          <input type="text" class="form-control" name=""
                                              value="<?php echo $dataform['deadline']; ?>" disabled>
                                      </div>
                                  </div>
                                  <div class="form-group col-12">
                                      <textarea class="form-control" rows="3"
                                          disabled><?php echo $dataform['observation']; ?></textarea>
                                  </div>

                                  <div class="form-group col-6">
                                      <select class="form-control" name="stratum">
                                          <option>¿Efectiva?</option>
                                          <option value="1">SI</option>
                                          <option value="0">NO</option>
                                      </select>
                                  </div>                                  
                                  <div class="form-group col-6">
                                      <input type="text" class="form-control" value="<?php echo $currentdate['year'].'-'.$currentdate['mon'].'-'.$currentdate['mday']; ?>" disabled>
                                  </div>
                                  <div class="form-group col-6">
                                      <select class="form-control" name="stratum">
                                          <option>Resultado de la Eficacia</option>
                                          <option value="1">SI</option>
                                          <option value="0">NO</option>
                                      </select>
                                  </div>
                                  <div class="form-group col-6">
                                      <input type="text" class="form-control" placeholder="Causa">
                                  </div>
                                  <div class="form-group col-4">
                                      <textarea class="form-control" name="" rows="3"
                                          placeholder="1 ¿Porque?"></textarea>
                                  </div>
                              </div>
                              <div class="card-footer">
                                  <a href="#" class="btn btn-info">Agregar Causa</a>
                                  <button type="submit" class="btn btn-primary float-right">Guardar Causas y Cargar
                                      Acciones</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
              <!-- /.row -->
          </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->