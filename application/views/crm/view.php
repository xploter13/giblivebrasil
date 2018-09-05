<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>Gib Live Brasil | CRM</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <link href="assets/plugins/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" />
        <link href="assets/plugins/jquery-ui-1.10.4/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
        <link href="assets/plugins/bootstrap-3.2.0/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/plugins/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" />
        <link href="assets/css/animate.min.css" rel="stylesheet" />
        <link href="assets/css/style.min.css" rel="stylesheet" />
        <link href="assets/css/style-responsive.min.css" rel="stylesheet" />
        <link href="assets/css/theme/default.css" rel="stylesheet" id="theme" />
        <!-- ================== END BASE CSS STYLE ================== -->

        <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
        <link href="assets/plugins/DataTables-1.9.4/css/data-table.css" rel="stylesheet" />
        <!-- ================== END PAGE LEVEL STYLE ================== -->
    </head>
    <body>
        <!-- begin #page-loader -->
        <div id="page-loader" class="fade in"><span class="spinner"></span></div>
        <!-- end #page-loader -->

        <!-- begin #page-container -->
        <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
            <?php require 'assets/includes/header.php'; ?>
            <?php require 'assets/includes/menu.php'; ?>
            <!-- begin #content -->
            <div id="content" class="content">
                <!-- begin breadcrumb -->
                <ol class="breadcrumb pull-right">
                    <li><a href="<?php echo base_url();?>dashboard">Dashboard</a></li>
                    <li class="active">CRM</li>
                </ol>
                <!-- end breadcrumb -->
                <!-- begin page-header -->
                <h1 class="page-header">CRM</h1>
                <!-- end page-header -->

                <!-- begin row -->
                <div class="row">
                    <div class="col-md-12">
                        <a href="crm/novo" class="btn btn-info pull-right">Novo Registro <i class="fa fa-plus"></i></a>
                    </div>       

                    <!-- begin col-12 -->
                    <div class="col-md-12">
                        <!-- begin panel -->
                        <div class="panel panel-inverse">
                            <div class="panel-heading">
                                <div class="panel-heading-btn">
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                </div>
                                <h4 class="panel-title">CRM's Cadastrados</h4>
                            </div>

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="data-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Cliente</th>
                                                <th>Cidade / Estado</th>
                                                <th>Bairro</th>
                                                <th>Forma de Atendimento</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (empty($data_crm)) :
                                                //
                                            else :
                                                $c = new ArrayIterator($data_crm);
                                                while ($c->valid()):
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $c->current()->cliente; ?></td>
                                                        <td><?php echo $c->current()->desc_cidade . ' / ' . $c->current()->desc_estado; ?></td>
                                                        <td><?php echo $c->current()->bairro; ?></td>
                                                        <td><?php echo $c->current()->forma_atendimento; ?></td>
                                                        <td>
                                                            <a href="crm/editar/<?php echo $c->current()->id_crm ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Editar</a>
                                                            <button class="btn btn-sm btn-danger btn-delete-crm" data-id="<?php echo $c->current()->id_crm; ?>"><i class="fa fa-trash"></i> Excluir</button>
                                                        </td>
                                                    </tr> 
                                                    <?php
                                                    $c->next();
                                                endwhile;
                                            endif;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end panel -->
                    </div>
                    <!-- end col-12 -->
                </div>
            </div>
        </div>
        <!-- ================== BEGIN BASE JS ================== -->
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-1.8.2/jquery-1.8.2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui-1.10.4/ui/minified/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-3.2.0/js/bootstrap.min.js"></script>
        <!--[if lt IE 9]>
                <script src="assets/crossbrowserjs/html5shiv.js"></script>
                <script src="assets/crossbrowserjs/respond.min.js"></script>
                <script src="assets/crossbrowserjs/excanvas.min.js"></script>
        <![endif]-->
        <script src="<?php echo base_url(); ?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-cookie/jquery.cookie.js"></script>
        <!-- ================== END BASE JS ================== -->

        <!-- ================== BEGIN PAGE LEVEL JS ================== -->
        <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/dist/sweetalert2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/DataTables-1.9.4/js/jquery.dataTables.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/DataTables-1.9.4/js/data-table.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/apps.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-validator/validator.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
        <!-- ================== END PAGE LEVEL JS ================== -->
        <script>
            $(document).ready(function () {
                App.init();
                $(".button-crm").addClass('active');
            });
        </script>
    </body>
</html>

