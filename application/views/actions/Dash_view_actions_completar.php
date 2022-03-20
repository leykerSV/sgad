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
                              <h3 class="card-title">Completar Acciones NC Nro: <?php echo $id; ?></h3>
                          </div>
			  <?php foreach($acciones as $fila){ ?>
                          <form action="<?php echo base_url() ?>index.php/Dash_controller_actions/GuardarAccionCompleta/<?php echo $id; ?>" method="post">
			<div class="card-body">
                            <div class="form-group">
				<a>Implementada?</a>	
                                <select class="form-control" name="implementada">
                                     <?php switch ($fila['implementada']) {
                                            case 'SI':
                                                echo '<option value="NO">NO</option>';	  
                                                echo '<option value="SI" selected>SI</option>';
                                                break;
                                            case 'NO':
                                                echo '<option value="NO" selected>NO</option>';	  
                                                echo '<option value="SI">SI</option>';
                                                break;
                                            case '':
                                                echo '<option value="NO">NO</option>';	  
                                                echo '<option value="SI">SI</option>';
                                                echo '<option value="" selected></option>';
                                                break;
                                        } ?>
                                </select>
                                </div>
                            
                                <div class="form-group">
                                 <a>Fecha Realización</a>
                                <?php if($fila['fecharealizacion']=="0000-00-00"){?>
                                    <input type="text" class="form-control" name="fecharealizacion"
                                        data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy"
                                        data-mask placeholder="" value="">
                                <?php }else{ ?>
                                    <input type="text" class="form-control" name="fecharealizacion"
                                        data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy"
                                        data-mask placeholder="" value="<?php echo $fila['fecharealizacion']; ?>">
                                <?php }; ?>
                                
                            </div>
                            
                                    <div class="form-group">
                                    <a>Estado Implementación</a>
                                        <select class="form-control" name="estadoimplementacion">
                                            <?php switch ($fila['estadoimplementacion']) {
                                            case 'EP':                                              
                                                echo '<option value="EP" selected>En Proceso</option>';  
                                                echo '<option value="EPD">En Proceso Demorada</option>';
						echo '<option value="CEP">Cerrada En Plazo</option>';
						echo '<option value="CFP">Cerrada Fuera Plazo</option>';
						echo '<option value="CAN">Cancelada</option>';
                                                break;
                                            case 'EPD':
                                                echo '<option value="EP">En Proceso</option>';  
                                                echo '<option value="EPD" selected>En Proceso Demorada</option>';
						echo '<option value="CEP">Cerrada En Plazo</option>';
						echo '<option value="CFP">Cerrada Fuera Plazo</option>';
						echo '<option value="CAN">Cancelada</option>';
                                                break;
                                            case 'CEP':
                                                echo '<option value="EP">En Proceso</option>';  
                                                echo '<option value="EPD">En Proceso Demorada</option>';
						echo '<option value="CEP" selected>Cerrada En Plazo</option>';
						echo '<option value="CFP">Cerrada Fuera Plazo</option>';
						echo '<option value="CAN">Cancelada</option>';
                                                break;
                                            case 'CFP':
                                                echo '<option value="EP">En Proceso</option>';  
                                                echo '<option value="EPD">En Proceso Demorada</option>';
						echo '<option value="CEP">Cerrada En Plazo</option>';
						echo '<option value="CFP" selected>Cerrada Fuera Plazo</option>';
						echo '<option value="CAN">Cancelada</option>';
                                                break;
                                            case 'CAN':
                                                echo '<option value="EP">En Proceso</option>';  
                                                echo '<option value="EPD">En Proceso Demorada</option>';
						echo '<option value="CEP">Cerrada En Plazo</option>';
						echo '<option value="CFP">Cerrada Fuera Plazo</option>';
						echo '<option value="CAN" selected>Cancelada</option>';
                                                break;
                                            case '':
                                                echo '<option value="EP">En Proceso</option>';  
                                                echo '<option value="EPD">En Proceso Demorada</option>';
						echo '<option value="CEP">Cerrada En Plazo</option>';
						echo '<option value="CFP">Cerrada Fuera Plazo</option>';
						echo '<option value="CAN">Cancelada</option>';
                                                echo '<option value="" selected></option>';
                                                break;
                                            } ?>
                                        </select>
                                  </div>

                            <div class="form-group">
				<a>Efectiva?</a>
                                    <select class="form-control" name="eficaz">
                                    <?php switch ($fila['eficaz']) {
                                            case 'SI':
                                                echo '<option value="NO">NO</option>';	  
                                                echo '<option value="SI" selected>SI</option>';
                                                break;
                                            case 'NO':
                                                echo '<option value="NO" selected>NO</option>';	  
                                                echo '<option value="SI">SI</option>';
                                                break;
                                            case '':
                                                echo '<option value="NO">NO</option>';	  
                                                echo '<option value="SI">SI</option>';
                                                echo '<option value="" selected></option>';
                                                break;
                                        } ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <a>Fecha de Verificación Eficacia</a>
                                <?php if($fila['fechaverifeficacia']=="0000-00-00"){?>
                                    <input type="text" class="form-control" name="fechaverifeficacia"
                                        data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy"
                                        data-mask placeholder="" value="">
                                <?php }else{ ?>
                                    <input type="text" class="form-control" name="fechaverifeficacia"
                                        data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy"
                                        data-mask placeholder="" value="<?php echo $fila['fechaverifeficacia']; ?>">
                                <?php }; ?>
                                
                                
                                
                            </div>
                            <div class="form-group">
                                <a>Estado Eficacia</a>
                                  <select class="form-control" name="resultadoeficacia">
                                            <?php switch ($fila['resultadoeficacia']) {
                                            case 'EP':                                              
                                                echo '<option value="EP" selected>En Proceso</option>';  
                                                echo '<option value="EPD">En Proceso Demorada</option>';
						echo '<option value="CEP">Cerrada En Plazo</option>';
						echo '<option value="CFP">Cerrada Fuera Plazo</option>';
						echo '<option value="CAN">Cancelada</option>';
                                                break;
                                            case 'EPD':
                                                echo '<option value="EP">En Proceso</option>';  
                                                echo '<option value="EPD" selected>En Proceso Demorada</option>';
						echo '<option value="CEP">Cerrada En Plazo</option>';
						echo '<option value="CFP">Cerrada Fuera Plazo</option>';
						echo '<option value="CAN">Cancelada</option>';
                                                break;
                                            case 'CEP':
                                                echo '<option value="EP">En Proceso</option>';  
                                                echo '<option value="EPD">En Proceso Demorada</option>';
						echo '<option value="CEP" selected>Cerrada En Plazo</option>';
						echo '<option value="CFP">Cerrada Fuera Plazo</option>';
						echo '<option value="CAN">Cancelada</option>';
                                                break;
                                            case 'CFP':
                                                echo '<option value="EP">En Proceso</option>';  
                                                echo '<option value="EPD">En Proceso Demorada</option>';
						echo '<option value="CEP">Cerrada En Plazo</option>';
						echo '<option value="CFP" selected>Cerrada Fuera Plazo</option>';
						echo '<option value="CAN">Cancelada</option>';
                                                break;
                                            case 'CAN':
                                                echo '<option value="EP">En Proceso</option>';  
                                                echo '<option value="EPD">En Proceso Demorada</option>';
						echo '<option value="CEP">Cerrada En Plazo</option>';
						echo '<option value="CFP">Cerrada Fuera Plazo</option>';
						echo '<option value="CAN" selected>Cancelada</option>';
                                                break;
                                            case '':
                                                echo '<option value="EP">En Proceso</option>';  
                                                echo '<option value="EPD">En Proceso Demorada</option>';
						echo '<option value="CEP">Cerrada En Plazo</option>';
						echo '<option value="CFP">Cerrada Fuera Plazo</option>';
						echo '<option value="CAN">Cancelada</option>';
                                                echo '<option value="" selected></option>';
                                                break;
                                            } ?>
                                        </select>
                            </div>
                                                        
                            <div class="form-group">
                                <a>Observaciones</a>
                                <textarea class="form-control" name="observaciones" rows="3"
                                          placeholder="" value=""><?php echo $fila['observaciones']; ?></textarea>
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
						  <?php }; ?>
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
