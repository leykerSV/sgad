<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-primary">
            <div class="card-header">
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Fecha
                            </th>
                            <th>
                                Salida
                            </th>
                            <th>
                                Descricpión
                            </th>
                            <th>
                                Autor
                            </th>
							<th>
                                Verificado?
                            </th>
                            <th>
                                Modifica SNC
                            </th>
                            <th>
                                Crea Acción
                            </th>
                            <th>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($snc)){
                            foreach($snc as $row){
                            echo '<tr>';
                            echo '<td>'. $row['id'] .'</td>';
                            echo '<td>'. $row['fecha'] .'</td>';
                            echo '<td>'. $row['salida'] .'</td>';
                            echo '<td>'. $row['descripcion'];
                            echo '<td>'. $row['nombre'] .'</td>';
							echo '<td>'. $row['verifico'] .'</td>';
                            echo '<td>';
							echo '
							<a class="btn btn-primary btn-sm" href="'.base_url().'index.php/Dash_controller_espinapescado/create?id='.$row['id'].'">
								<i class="nav-icon fas fa-pencil-alt"></i>&nbsp;&nbsp;Modifica SNC
							</a>';
							echo '</td>';
							echo '<td>';
							echo '
							<a class="btn btn-primary btn-sm" href="'.base_url().'index.php/Dash_controller_nonconformities/createCauses?id='.$row['id'].'">
								<i class="nav-icon fas fa-pencil-alt"></i>&nbsp;&nbsp;Generar Acción
							</a>';
							echo '</td>';
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
