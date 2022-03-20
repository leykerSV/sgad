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
                            <th>Desc Causas</th>
                            <th>Desc. Acciones</th>
                            <th>Tipo accion</th>
                            <th>Responsable</th>
                            <th>Plazos Ejecucion</th>
                            <th>Fecha Realización</th>
                            <th>Implementada</th>
                            <th>Estado Implementacion</th>
                            <th>Efectiva</th>
                            <th>Fecha Verif Eficacia</th>
                            <th>Estado de Eficacia</th>
                            <th>Observaciones</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($todaslasacciones)){
                                foreach($todaslasacciones as $row){
                                    echo '<tr>';
                                    echo '<td>'. $row['id'] .'</td>';
                                    $inicio1 = strtotime($row['fecha']);
                                    $fff1 = date('d-m-Y',$inicio1);
                                    echo '<td>'. $fff1 .'</td>';
                                    echo '<td>'. $row['origin'] .'</td>';
                                    echo '<td>'. $row['lider'] .'</td>';
                                    echo '<td>'. $row['descripcioncausas'] .'</td>';
                                    echo '<td>'. $row['descripcionacciones'] .'</td>';
                                    echo '<td>'. $row['tipoaccion'] .'</td>';
                                    echo '<td>'. $row['responsable'] .'</td>';
                                    if ($row['plazosejecucion']=='0000-00-00'){
                                        echo '<td></td>';
                                    }else{
                                        $inicio1 = strtotime($row['plazosejecucion']);
                                        $fff1 = date('d-m-Y',$inicio1);
                                        echo '<td>'. $fff1 .'</td>';
                                    }
                                    if ($row['fecharealizacion']=='0000-00-00'){
                                        echo '<td></td>';
                                    }else{
                                        $inicio1 = strtotime($row['fecharealizacion']);
                                        $fff1 = date('d-m-Y',$inicio1);
                                        echo '<td>'. $fff1 .'</td>';
                                    }
                                    echo '<td>'. $row['implementada'] .'</td>'; 
                                    echo '<td>'. $row['estadoimplementacion'] .'</td>';
                                    echo '<td>'. $row['eficaz'] .'</td>'; 
                                    if ($row['fechaverifeficacia']=='0000-00-00'){
                                        echo '<td></td>';
                                    }else{
                                        $inicio1 = strtotime($row['fechaverifeficacia']);
                                        $fff1 = date('d-m-Y',$inicio1);
                                        echo '<td>'. $fff1 .'</td>';
                                    }
                                    echo '<td>'. $row['resultadoeficacia'] .'</td>';
                                    echo '<td>'. $row['observaciones'] .'</td>';
                                    
                                    if ($row['estadover']==0){
                                        echo '<td>ABIERTO</td>';
                                    }else{
                                        echo '<td>CERRADO</td>';   
                                    }
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