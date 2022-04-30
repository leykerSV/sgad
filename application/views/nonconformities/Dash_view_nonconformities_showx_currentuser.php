<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <?php
    if(isset($titulo)){
        echo '<div>';
        echo '<a><h2>'.$titulo.'</h2></a>';
        echo '</div>';
    }
    ?>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->

                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th width=40>
                                #
                            </th>
                            <th width=120>
                                Fecha Apertura
                            </th>
                            <th>
                                Origen
                            </th>
							<th>
                                Autor
                            </th>
                            <th>
                                Tipo
                            </th>
							<th>
                                Descripcion No Conformidad
                            </th>
                            <th>
                                Depto
                            </th>
                            <th width=150>
                                Acciones
							</th>
							<th>
                                Estado
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($nonconformities)){
                            foreach($nonconformities as $row)
                        	{
								echo '<tr>';
								echo '<td>'. $row['id'] .'</td>';
								$inicio1 = strtotime($row['fecha']);
                                                                $fff1 = date('d-m-Y',$inicio1);
								echo '<td>'. $fff1 .'</td>';
								echo '<td>'. $row['origin'] .'</td>';
								echo '<td>'. $row['nombre'] .'</td>';
								echo '<td>'. $row['type'] .'</td>';
								echo '<td>'. $row['descnoconf'] .'</td>';
								echo '<td>'. $row['departamento'] .'</td>';
								echo '<td>
								<abbr title="Ver No Conformidad completa">
								<a href="Ver_NC/'. $row['id'] .'" target="_blank">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
  										<path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
									</svg>
							  	</a>
								</abbr>
								<abbr title="Ver Espina">
								<a href="VerEspina/'. $row['id'] .'" target="_blank">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
									<path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
									</svg>
							  	</a>
								</abbr>
								
								<abbr title="Ver Analisis Porque">
								<a href="VerPorques/'. $row['id'] .'" target="_blank">
								  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket2" viewBox="0 0 16 16">
								  <path d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z"/>
								  <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z"/>
						  
								  </svg>
							  	</a>  
								  </abbr>
								  <abbr title="Ver Acciones de esta N/C">
								  <a class="bi bi-book-half" href="showxCurrentUserActionsDetails/'. $row['id'] .'" target="_blank">
								  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-binoculars" viewBox="0 0 16 16">
									  <path d="M3 2.5A1.5 1.5 0 0 1 4.5 1h1A1.5 1.5 0 0 1 7 2.5V5h2V2.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5v2.382a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V14.5a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 14.5v-3a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5v3A1.5 1.5 0 0 1 5.5 16h-3A1.5 1.5 0 0 1 1 14.5V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V2.5zM4.5 2a.5.5 0 0 0-.5.5V3h2v-.5a.5.5 0 0 0-.5-.5h-1zM6 4H4v.882a1.5 1.5 0 0 1-.83 1.342l-.894.447A.5.5 0 0 0 2 7.118V13h4v-1.293l-.854-.853A.5.5 0 0 1 5 10.5v-1A1.5 1.5 0 0 1 6.5 8h3A1.5 1.5 0 0 1 11 9.5v1a.5.5 0 0 1-.146.354l-.854.853V13h4V7.118a.5.5 0 0 0-.276-.447l-.895-.447A1.5 1.5 0 0 1 12 4.882V4h-2v1.5a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V4zm4-1h2v-.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5V3zm4 11h-4v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14zm-8 0H2v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14z"/>
									</svg> 
									
							  </a>
							  </abbr>

								</td>';
								if ($row['estado']==0){
									$estadomuestra="Abierto";
								}else{
									$estadomuestra="Cerrado";
								};
								echo '<td>'. $estadomuestra .'</td>';
								if($row['espinayporque']==0){
									echo '<td>';
									echo '
									<a class="btn btn-primary btn-sm"  href="'.base_url().'index.php/Dash_controller_espinapescado/create/'.$row['id'].'">
										<i class="nav-icon fas fa-pencil-alt" enabled></i>&nbsp;&nbsp;Espina de Pescado
									</a>';
									echo '</td>';
								} else {
									echo '<td>';
									echo '
									<a class="btn btn-primary btn-sm disabled" href="">
										<i class="nav-icon fas fa-pencil-alt" disabled></i>&nbsp;&nbsp;Espina de Pescado
									</a>';
									echo '</td>';	
								}
								echo '<td>';
								echo '
								<a class="btn btn-primary btn-sm" href="'.base_url().'index.php/Dash_controller_porques/create/'.$row['id'].'">
									<i class="nav-icon fas fa-pencil-alt"></i>&nbsp;&nbsp;Análisis Porques
								</a>';
								echo '</td>';
								echo '<td>';
								echo '
								<a class="btn btn-primary btn-sm" href="'.base_url().'index.php/Dash_controller_nonconformities/crearAccion/'.$row['id'].'">
									<i class="nav-icon fas fa-pencil-alt"></i>&nbsp;&nbsp;Generar Acción
								</a>';
								echo '</td>';
								echo '<td>';
                                                                
                                                                if($row['estado']==0){
                                                                    echo '
                                                                    <a class="btn btn-primary btn-sm" href="CerrarNC_view/'.$row['id'].'">
                                                                            <i class="nav-icon fas fa-pencil-alt"></i>Cerrar NC
                                                                    </a>';
                                                                    echo '</td>';
                                                                    echo '</tr>';
                                                                }else{
									echo '
									<a class="btn btn-primary btn-sm disabled" href="">
										<i class="nav-icon fas fa-pencil-alt" disabled></i>&nbsp;&nbsp;Cerrar NC
									</a>';
									echo '</td>';
                                                                    echo '</tr>';
                                                                }
                        	}
                        }                        
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
