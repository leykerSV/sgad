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
                                Acción
                            </th>
                            <th>
                                Tipo
                            </th>
                            <th>
                                Responsable
                            </th>
                            <th>
                                Fecha Limite
                            </th>
                            <th>
                                Implementada?
                            </th>
                            <th>
                                Estado Implementación
                            </th>
                            <th>
                                Observación
                            </th>
                            <th>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($actions)){
                            print_r($actions);
                            /*
                            foreach($actions as $row){
                            echo '<tr>';
                            echo '<td>'. $row['id'] .'</td>';
                            echo '<td>'. $row['openingdate'] .'</td>';
                            echo '<td>'. $row['origin'] .'</td>';
                            echo '<td>'. $row['type'] .'</td>';
                            echo '<td>'. $row['departament'] .'</td>';
                            //echo '<td>'. $row['rol'] .'</td>';
                            echo '<td>'. $row['description'] .'</td>';
                            echo '<td>';
                            echo '
                            <a class="btn btn-primary btn-sm" href="'.base_url().'Dash_controller_nonconformities/createCauses?id='.$row['id'].'">
                                <i class="nav-icon fas fa-pencil-alt"></i>&nbsp;&nbsp;Completar Acción
                            </a>';
                            echo '</td>';
                            echo '</tr>';
                            }
                            */
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
