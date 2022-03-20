<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

        <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fecha</th>
                            <th>Origen</th>
                            <th>Lider</th>
                            <th>desc Causas</th>
                            <th>desc. Acciones</th>
                            <th>tipoaccion</th>
                            <th>responsable</th>
                            <th>Plazos Ejecucion</th>
                            <th>Fecha Realización</th>
                            <th>implementada</th>
                            <th>estadoimplementacion</th>
                            <th>Efectiva</th>
                            <th>Fecha Verif Eficacia</th>
                            <th>Estado de Eficacia</th>
                            <th>Observaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($acciones)){
                            foreach($acciones as $row){
                            echo '<tr>';
                            echo '<td>'. $row['id'] .'</td>';
                            $inicio1 = strtotime($row['fecha']);
                            $fff1 = date('d-m-Y',$inicio1);
                            echo '<td>'. $fff1 .'</td>';
                            echo '<td>'. $row['origin'] .'</td>';
                            echo '<td>'. $row['nombre'] .'</td>';
                            echo '<td>'. $row['descripcioncausas'] .'</td>';
                            echo '<td>'. $row['descripcionacciones'] .'</td>';
                            echo '<td>'. $row['type'] .'</td>';
                            echo '<td>'. $row['nombre'] .'</td>';

                            if ($row['plazosejecucion']=="1970-01-01"){
                                echo '<td></td>';
                            }else{
                                $inicio1 = strtotime($row['plazosejecucion']);
                                $fff1 = date('d-m-Y',$inicio1);
                                echo '<td>'. $fff1 .'</td>';
                            }
                            
                            if ($row['fecharealizacion']=="1970-01-01"){
                                echo '<td></td>';
                            }else{
                                $inicio1 = strtotime($row['fecharealizacion']);
                                $fff1 = date('d-m-Y',$inicio1);
                                echo '<td>'. $fff1 .'</td>';
                            }
                            
                            echo '<td>'. $row['implementada'] .'</td>';
                            echo '<td>'. $row['estadoimplementacion'] .'</td>'; 
                            echo '<td>'. $row['eficaz'] .'</td>';
                            
                            if ($row['fechaverifeficacia']=="1970-01-01"){
                                echo '<td></td>';
                            }else{
                                $inicio1 = strtotime($row['fechaverifeficacia']);
                                $fff1 = date('d-m-Y',$inicio1);
                                echo '<td>'. $fff1 .'</td>';
                            }
                            
                            echo '<td>'. $row['resultadoeficacia'] .'</td>';
                            //echo '<td>'. $row['retroanalisis'] .'</td>';
                            //echo '<td>'. $row['procesocambio'] .'</td>';
                            echo '<td>'. $row['observaciones'] .'</td>';    
							                    
                            echo '<td>';
                            echo '
                            <a class="btn btn-primary btn-sm" href="'.base_url().'index.php/Dash_controller_nonconformities/CompletarAccion/'.$row['id'].'">
                                <i class="nav-icon fas fa-pencil-alt"></i>&nbsp;&nbsp;Completar Acción
                            </a>';
                            echo '</td>';
                            echo '</tr>';
                            }
                        }                        
                        ?>
                    </tbody>
                </table>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->