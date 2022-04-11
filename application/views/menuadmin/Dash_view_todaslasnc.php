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
                            <th>Autor</th>
                            <th>Tipo</th>
                            <th>Descripcion</th>
                            <th>Lider</th>
                            <th>Departamento</th>
                            <th>Doc Asoc.</th>
                            <th>Observaciones</th>
                            <th>Analisis Signif.</th>
                            <th>Desc. Causas</th>
                            <th>Retroalim. a PI</th>
                            <th>Proc. Cambio</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($todaslasnc)){
                            foreach($todaslasnc as $row){
                            echo '<tr>';
                            echo '<td>'. $row['id'] .'</td>';
                            $inicio1 = strtotime($row['fecha']);
                            $fff1 = date('d-m-Y',$inicio1);
                            echo '<td>'. $fff1 .'</td>';
                            echo '<td>'. $row['origin'] .'</td>';
                            echo '<td>'. $row['autor'] .'</td>';
                            echo '<td>'. $row['tipo'] .'</td>';
                            echo '<td>'. $row['descnoconf'] .'</td>';
                            echo '<td>'. $row['lider'] .'</td>';
                            echo '<td>'. $row['departamento'] .'</td>';
                            echo '<td>'. $row['docasociada'] .'</td>';
                            echo '<td>'. $row['observaciones'] .'</td>'; 
                            echo '<td>'. $row['analisissignificancia'] .'</td>';
                            echo '<td>'. $row['desccausas'] .'</td>'; 
                            echo '<td>'. $row['retroanalisis'] .'</td>';
                            echo '<td>'. $row['procesocambio'] .'</td>';
                            if ($row['estado']==0){
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