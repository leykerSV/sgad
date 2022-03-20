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
                                Medidas
                            </th>
                            <th>
                                Maquinaria
                            </th>
                            <th>
                                Mano de Obra
                            </th>
                            <th>
                                Medio Ambiente
                            </th>
                            <th>
                                Método
                            </th>
                            <th>
                                Material
                            </th>
  
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($espinas)){
                            foreach($espinas as $row){
                            echo '<tr>';
                            echo '<td>'. $row['medidas'] .'</td>';
                            echo '<td>'. $row['maquinaria'] .'</td>';
                            echo '<td>'. $row['manoobra'] .'</td>';
                            echo '<td>'. $row['medioambiente'] .'</td>';
                            echo '<td>'. $row['metodo'] .'</td>';
							echo '<td>'. $row['material'] .'</td>';

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
