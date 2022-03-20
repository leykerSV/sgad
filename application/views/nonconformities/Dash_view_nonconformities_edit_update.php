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
                          <form action="<?php echo base_url() ?>Dash_controller_nonconfomities/update" method="post">
                              <div class="card-body row">
                                  <div class="form-group col-3">
                                      <div class="input-group">
                                          <input type="text" class="form-control" data-inputmask-alias="datetime"
                                              data-inputmask-inputformat="DD-MM-YYYY" data-mask
                                              placeholder="Fecha Apertura"
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