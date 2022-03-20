 <?php date_default_timezone_set('UTC'); ?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <br>
      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">

						  <table class="table table-striped projects">
							<thead>
								<tr>
									<th>#</th>
									<th>Fecha</th>
									<th>Origen</th>
									<th>Tipo</th>
									<th>Descripción</th>
									<th>Líder</th>
									<th>Depto</th>
									<th>Doc Asoc</th>
									<th>Observaciones</th>
									<th>Significancia</th>
									<th>Desc Causas</th>
									<th>Retroalimentación PI</th>
									<th>Proceso</th>
								</tr>
							</thead>
							<tbody>
								<?php 

									//foreach ($noconformidad as $row){
									echo '<tr>';
										echo '<td>'.$noconformidad['id'].'</td>';
                                                                                $inicio1 = strtotime($noconformidad['fecha']);
                                                                                $fff1 = date('d-m-Y',$inicio1);
                                                                                echo '<td>'. $fff1 .'</td>';
										echo '<td>'.$noconformidad['origin'].'</td>';
										//echo '<td>'.$noconformidad['autor'].'</td>';
										echo '<td>'.$noconformidad['type'].'</td>';
										echo '<td>'.$noconformidad['descnoconf'].'</td>';
										echo '<td>'.$noconformidad['nombre'].'</td>';
										echo '<td>'.$noconformidad['departamento'].'</td>';
										echo '<td>'.$noconformidad['docasociada'].'</td>';
										echo '<td>'.$noconformidad['observaciones'].'</td>';
										echo '<td>'.$noconformidad['analisissignificancia'].'</td>';
										echo '<td>'.$noconformidad['desccausas'].'</td>';
										echo '<td>'.$noconformidad['retroanalisis'].'</td>';
										echo '<td>'.$noconformidad['procesocambio'].'</td>';
									echo '</tr>';
								//}
								?>
								
							</tbody>
						  </table>
                      </div>
                  </div>

                  <!-- right colum -->
              </div>
              <!-- /.row -->
          </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
