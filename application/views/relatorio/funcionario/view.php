<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>Gib Live Brasil | Relatório de Funcionário</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/plugins/jquery-ui-1.10.4/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-3.2.0/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../assets/plugins/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/style.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/style-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/theme/default.css" rel="stylesheet" id="theme" />
        <!-- ================== END BASE CSS STYLE ================== -->

        <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
        <link href="<?php echo base_url(); ?>assets/plugins/DataTables-1.9.4/css/data-table.css" rel="stylesheet" />
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
                    <li><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>
                    <li>Relatório</li>
                    <li class="active">Funcionário</li>
                </ol>
                <!-- end breadcrumb -->
                <!-- begin page-header -->
                <h1 class="page-header">&nbsp;</h1>
                <!-- end page-header -->

                <!-- begin row -->
                <div class="row">                    
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
                                <h4 class="panel-title">Funcionários Cadastrados</h4>
                            </div>

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="data-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>CPF</th>
                                                <th>Data de Nascimento</th>
                                                <th>Celular</th>
                                                <th>Telefone</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (empty($data_func)) :
                                                ?>
                                                <tr>
                                                    <td>Não existem dados cadastrados</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>   
                                                <?php
                                            else :
                                                $f = new ArrayIterator($data_func);
                                                while ($f->valid()):
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $f->current()->nome; ?></td>
                                                        <td><?php echo $f->current()->cpf; ?></td>
                                                        <td><?php echo $f->current()->data_nasc; ?></td>
                                                        <td><?php echo $f->current()->celular; ?></td>
                                                        <td><?php echo $f->current()->telefone; ?></td>
                                                    </tr> 
                                                    <?php
                                                    $f->next();
                                                endwhile;
                                            endif;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end panel -->

                        <!-- #modal-message -->
                        <div class="modal modal-message fade" id="modal-message">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title">Exclusão de Funcinário</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p class="msg"></p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Não</a>
                                        <a href="javascript:;" class="btn btn-sm btn-primary" id="btn-delete-ok">Sim</a>
                                    </div>
                                </div>
                            </div>
                        </div>


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
        <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <!-- ================= BUTTONS DATATABLE ==================== -->        
        <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
        <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
        <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
        <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
        <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
        <!-- ================== DATATABLE INITIALIZE ================== -->
        <script src="<?php echo base_url(); ?>assets/plugins/DataTables-1.9.4/js/data-table.js"></script>
        <!-- ================== JS ================== -->
        <script src="<?php echo base_url(); ?>assets/js/apps.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-validator/validator.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
        <!-- ================== END PAGE LEVEL JS ================== -->
        <script>
            $(document).ready(function () {
                App.init();
                $(".button-rel").addClass('active');
            });
        </script>
    </body>
</html>

