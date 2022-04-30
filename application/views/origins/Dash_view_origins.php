<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

        <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Descripción</th>
                             <th>
                                <a class="btn btn-warning btn-sm text-white"
                                    href="<?php echo base_url()?>index.php/Dash_controller_origins/create">
                                    <i class="fas fa-plus-square"></i>&nbsp;&nbsp;Crear Nuevo
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (isset($origins))
                            {
                                foreach($origins as $row){
                                    echo '<tr>';
                                    echo '<td>'. $row['id'] .'</td>';
                                    echo '<td>'. $row['origin'] .'</td>';
                                }
                            }
                        ?>
                    </tbody>
                </table>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->