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
                              <h3 class="card-title">Completar No Conformidad</h3>
                          </div>
                          <form action="<?php echo base_url() ?>Dash_controller_nonconformities/storeCauses?id=<?php echo $_GET['id'] ?>"
                              method="post">
                              <div class="card-body row">
                                  <div class="form-group col-3">
                                      <div class="input-group">
                                          <input type="text" class="form-control" name=""
                                              value="<?php echo $dataform['openingdate']; ?>" disabled>
                                      </div>
                                  </div>
                                  <div class="form-group col-3">
                                      <select class="form-control" disabled>
                                          <option><?php echo $dataform['origin']; ?></option>
                                      </select>
                                  </div>

                                  <div class="form-group col-3">
                                      <select class="form-control" disabled>
                                          <option><?php echo $dataform['type']; ?></option>
                                      </select>
                                  </div>
                                  <div class="form-group col-3">
                                      <select class="form-control" disabled>
                                          <option><?php echo $dataform['departament']; ?></option>
                                      </select>
                                  </div>
                                  <div class="form-group col-12">
                                      <textarea class="form-control" rows="3"
                                          disabled><?php echo $dataform['description']; ?></textarea>
                                  </div>
                                  <div class="form-group col-12">
                                      <textarea class="form-control" name="" rows="3"
                                          placeholder="Resumen Analisis de Causa" name="sumarycause"></textarea>
                                  </div>
                                  <?php 
                                          print_r($dataform['stratum']);
                                          ?>
                                  <div class="form-group col-6">
                                      <select class="form-control" name="stratum">
                                          <option>Estrato</option>
                                          <option value="1">1-2</option>
                                          <option value="2">3-4</option>
                                          <option value="3">5-6</option>
                                      </select>
                                  </div>
                                  <div class="form-group col-6">
                                      <input type="text" class="form-control"
                                          placeholder="Efecto o Anomalía a Analizar">
                                  </div>
                                  <div class="form-group col-6">
                                      <select class="form-control" name="stratum">
                                          <option>Grupo</option>
                                          <option value="1">Método</option>
                                          <option value="2">Mano de Obra</option>
                                          <option value="3">Medidas</option>
                                          <option value="3">Material</option>
                                          <option value="3">Medio Ambiente</option>
                                          <option value="3">Maquinaria</option>
                                      </select>
                                  </div>
                                  <div class="form-group col-6">
                                      <input type="text" class="form-control" placeholder="Causa">
                                  </div>
                                  <div class="form-group col-4">
                                      <textarea class="form-control" name="" rows="3"
                                          placeholder="1 ¿Porque?"></textarea>
                                  </div>
                                  <div class="form-group col-4">
                                      <textarea class="form-control" name="" rows="3"
                                          placeholder="2 ¿Porque?"></textarea>
                                  </div>
                                  <div class="form-group col-4">
                                      <textarea class="form-control" name="" rows="3"
                                          placeholder="3 ¿Porque?"></textarea>
                                  </div>
                                  <div class="form-group col-4">
                                      <textarea class="form-control" name="" rows="3"
                                          placeholder="4 ¿Porque?"></textarea>
                                  </div>
                                  <div class="form-group col-4">
                                      <textarea class="form-control" name="" rows="3"
                                          placeholder="5 ¿Porque?"></textarea>
                                  </div>
                                  <div class="form-group col-4">
                                      <textarea class="form-control" name="" rows="3"
                                          placeholder="Conclusión"></textarea>
                                  </div>
                                  <div class="row" id="newcause"></div>
                              </div>
                              <div class="card-footer">
                                    <a href="#" class="btn btn-info" id="addcause">Agregar Causa</a>
                                    <button type="submit" class="btn btn-primary float-right">Guardar Causas y Cargar Acciones</button>
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