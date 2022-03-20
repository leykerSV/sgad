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
                                Causa
                            </th>
                            <th>
                                Porque 1
                            </th>
                            <th>
								Porque 2
                            </th>
                            <th>
								Porque 3
                            </th>
                            <th>
								Porque 4
                            </th>
                            <th>
								Porque 5
                            </th>
                            <th>
								Conclusión
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($porques)){
                            foreach($porques as $row){
                            echo '<tr>';
                            echo '<td>'. $row['causa'] .'</td>';
                            echo '<td>'. $row['porque1'] .'</td>';
                            echo '<td>'. $row['porque2'] .'</td>';
                            echo '<td>'. $row['porque3'] . '</td>';
                            echo '<td>'. $row['porque4'] .'</td>';
							echo '<td>'. $row['porque5'] .'</td>';
							echo '<td>'. $row['conclusion'] .'</td>';
                            echo '</tr>';
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
