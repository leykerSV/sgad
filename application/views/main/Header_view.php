<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Sistema | COCYAR</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="<?php echo base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="<?php echo base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <a class="nav-link" data-toggle="dropdown" href="#">
            Acciones: 
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <a class="nav-link" data-toggle="dropdown" href="#">
            No Conformidades: 
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    Bienvenido -
                    <i class="fas fa-user-circle"></i>&nbsp;<?php echo $_SESSION['nombre'];?>
                    <a href="<?php echo base_url()?>index.php/Login/destroy">Cerrar Session</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->



        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="<?php echo base_url()?>assets/img_dash/logo-cocyar.png" class="brand-image elevation-3">
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <?php
                        ?>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Acciones</p><i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>index.php/Dash_controller_actions/showxCurrentUser" class="nav-link">
                                        <?php
                                        if(uri_string()=="Dash_controller_actions"){
                                            echo '<i class="fas fa-circle nav-icon"></i>';
                                        }else{
                                            echo '<i class="far fa-circle nav-icon"></i>';
                                        }
                                        ?>
                                        <p>Responsable</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>index.php/Dash_controller_actions/create" class="nav-link">
                                        <?php
                                        if(uri_string()=="Dash_controller_actions"){
                                            echo '<i class="fas fa-circle nav-icon"></i>';
                                        }else{
                                            echo '<i class="far fa-circle nav-icon"></i>';
                                        }
                                        ?>
                                        <p>Crear Nueva</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>index.php/Dash_controller_actions/showxCurrentUserPropias" class="nav-link">
                                        <?php
                                        if(uri_string()=="Dash_controller_actions"){
                                            echo '<i class="fas fa-circle nav-icon"></i>';
                                        }else{
                                            echo '<i class="far fa-circle nav-icon"></i>';
                                        }
                                        ?>
                                        <p>Propias</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>No Conformidades</p><i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>index.php/Dash_controller_nonconformities/showxCurrentUser"
                                        class="nav-link">
                                        <?php
                                        if(uri_string()=="Dash_controller_nonconformities/showxCurrentUser"){
                                            echo '<i class="fas fa-circle nav-icon"></i>';
                                        }else{
                                            echo '<i class="far fa-circle nav-icon"></i>';
                                        }
                                        ?>
                                        <p>Asignadas Como Lider</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>index.php/Dash_controller_nonconformities/create"
                                        class="nav-link">
                                        <?php
                                        if(uri_string()=="Dash_controller_nonconformities/create" || uri_string()=="Dash_controller_nonconformities/create"){
                                            echo '<i class="fas fa-circle nav-icon"></i>';
                                        }else{
                                            echo '<i class="far fa-circle nav-icon"></i>';
                                        }
                                        ?>
                                        <p>Crear Nueva</p>
                                    </a>
                                </li>
								<li class="nav-item">
                                    <a href="<?php echo base_url()?>index.php/Dash_controller_nonconformities/showxCurrentUserPropias"
                                        class="nav-link">
                                        <?php
                                        if(uri_string()=="Dash_controller_nonconformities/showxCurrentUser"){
                                            echo '<i class="fas fa-circle nav-icon"></i>';
                                        }else{
                                            echo '<i class="far fa-circle nav-icon"></i>';
                                        }
                                        ?>
                                        <p>NC Propias</p>
                                    </a>
                                </li>
								<li class="nav-item">
                                    <a href="<?php echo base_url()?>index.php/Dash_controller_nonconformities/showxCurrentUserActions"
                                        class="nav-link">
                                        <?php
                                        if(uri_string()=="Dash_controller_nonconformities/showxCurrentUserActions"){
                                            echo '<i class="fas fa-circle nav-icon"></i>';
                                        }else{
                                            echo '<i class="far fa-circle nav-icon"></i>';
                                        }
                                        ?>
                                        <p>Acciones de NC</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>Reportes</p>
                            </a>
                        </li>
                        <?php if($_SESSION['username']=='jlescano' or $_SESSION['username']=='danilo') { ?>
                          
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-address-book"></i>
                                <p>Menú Administrador</p><i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>index.php/Dash_controller_menuadmin/todaslasnc" class="nav-link">
                                        <i class="fas fa-circle nav-icon"></i>
                                        <p>Todas las NC</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>index.php/Dash_controller_menuadmin/todaslasaccionesnc"
                                        class="nav-link">
                                        <?php
                                        if(uri_string()=="Dash_controller_snc/create" || uri_string()=="Dash_controller_snc/create"){
                                            echo '<i class="fas fa-circle nav-icon"></i>';
                                        }else{
                                            echo '<i class="far fa-circle nav-icon"></i>';
                                        }
                                        ?>
                                        <p>Todas las Acciones de NC</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>index.php/Dash_controller_menuadmin/todaslasacciones"
                                        class="nav-link">
                                        <?php
                                        if(uri_string()=="Dash_controller_snc/create" || uri_string()=="Dash_controller_snc/create"){
                                            echo '<i class="fas fa-circle nav-icon"></i>';
                                        }else{
                                            echo '<i class="far fa-circle nav-icon"></i>';
                                        }
                                        ?>
                                        <p>Todas las Acciones</p>
                                    </a>
                                </li>
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>Exportar a Excel</p><i class="right fas fa-angle-left"></i>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="<?php echo base_url()?>index.php/Dash_controller_menuadmin/exportaNC"
                                                class="nav-link">
                                                <?php
                                                if(uri_string()=="Dash_controller_snc/create" || uri_string()=="Dash_controller_snc/create"){
                                                    echo '<i class="fas fa-circle nav-icon"></i>';
                                                }else{
                                                    echo '<i class="far fa-circle nav-icon"></i>';
                                                }
                                                ?>
                                                <p>Exportar No Conformidad</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url()?>index.php/Dash_controller_menuadmin/exportaAcciones"
                                                class="nav-link">
                                                <?php
                                                if(uri_string()=="Dash_controller_snc/create" || uri_string()=="Dash_controller_snc/create"){
                                                    echo '<i class="fas fa-circle nav-icon"></i>';
                                                }else{
                                                    echo '<i class="far fa-circle nav-icon"></i>';
                                                }
                                                ?>
                                                <p>Exportar Acciones</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url()?>index.php/Dash_controller_menuadmin/exportaAccionesNC"
                                                class="nav-link">
                                                <?php
                                                if(uri_string()=="Dash_controller_snc/create" || uri_string()=="Dash_controller_snc/create"){
                                                    echo '<i class="fas fa-circle nav-icon"></i>';
                                                }else{
                                                    echo '<i class="far fa-circle nav-icon"></i>';
                                                }
                                                ?>
                                                <p>Exportar Acciones NC</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo base_url()?>index.php/Dash_controller_menuadmin/exportaEspina"
                                                class="nav-link">
                                                <?php
                                                if(uri_string()=="Dash_controller_snc/create" || uri_string()=="Dash_controller_snc/create"){
                                                    echo '<i class="fas fa-circle nav-icon"></i>';
                                                }else{
                                                    echo '<i class="far fa-circle nav-icon"></i>';
                                                }
                                                ?>
                                                <p>Exportar Espinas</p>
                                            </a>
                                        </li>
                                         <li class="nav-item">
                                            <a href="<?php echo base_url()?>index.php/Dash_controller_menuadmin/exportaPorques"
                                                class="nav-link">
                                                <?php
                                                if(uri_string()=="Dash_controller_snc/create" || uri_string()=="Dash_controller_snc/create"){
                                                    echo '<i class="fas fa-circle nav-icon"></i>';
                                                }else{
                                                    echo '<i class="far fa-circle nav-icon"></i>';
                                                }
                                                ?>
                                                <p>Exportar Porques</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <?php }; ?>
                        
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>Configuraciones</p><i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>index.php/Dash_controller_origins" class="nav-link">
                                        <?php
                                        if(uri_string()=="Dash_controller_origins"){
                                            echo '<i class="fas fa-circle nav-icon"></i>';
                                        }else{
                                            echo '<i class="far fa-circle nav-icon"></i>';
                                        }
                                        ?>
                                        <p>Origenes</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>index.php/Dash_controller_users" class="nav-link">
                                        <?php
                                        if(uri_string()=="Dash_controller_users"){
                                            echo '<i class="fas fa-circle nav-icon"></i>';
                                        }else{
                                            echo '<i class="far fa-circle nav-icon"></i>';
                                        }
                                        ?>
                                        <p>Usuarios</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
