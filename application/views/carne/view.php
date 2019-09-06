<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Gib Live Brasil | Gerar Carnê</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="assets/plugins/jquery-ui-1.10.4/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-3.2.0/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/plugins/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <link href="assets/plugins/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" />
    <link href="assets/css/style.min.css" rel="stylesheet" />
    <link href="assets/css/style-responsive.min.css" rel="stylesheet" />
    <link href="assets/css/theme/default.css" rel="stylesheet" id="theme" />
    <!-- <link href="<?php echo base_url(); ?>assets/carne/css/bootstrap.css"
  rel="stylesheet" type="text/css"> -->
    <link href="<?php echo base_url(); ?>assets/carne/css/style.css" rel="stylesheet" type="text/css">
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
                <li><a href="<?php echo base_url(); ?>dashboard">Dashboard</a>
                </li>
                <li class="active">Financeiro</li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Carnê</h1>
            <!-- end page-header -->

            <!-- begin row -->
            <div class="row">

                <!-- begin col-12 -->
                <div class="col-md-12">
                    <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                                    data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                                    data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                                    data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                                    data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Gerar Carnê</h4>
                        </div>
                        <div class="panel-body">

                            <header>
                                <h1 class="text-primary">
                                    Gerador de Carnê
                                </h1>
                                <small>* Não utilize "aspas" nos campos abaixo.</small><br>
                                <small>* Pode utilizar HTML.</small>
                            </header>

                            <br>
                            <hr><br>

                            <form role="form" action="<?php echo base_url();?>carne/gerar" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>Dados da Locatário</h3>
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <input name="nome_empresa" type="text" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Endereço</label>
                                            <textarea name="endereco_empresa" class="form-control"
                                                placeholder="Rua x, 000, Centro, Cidade - UF"
                                                required>Rua x, 000, Centro, Cidade - UF</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Telefone</label>
                                            <input name="tel_empresa" type="text" class="form-control"
                                                value="(00) 0000-0000">
                                        </div>
                                        <div class="form-group">
                                            <label>URL do Logotipo <small>* para capa do carnê</small></label>
                                            <input name="logo" type="text" class="form-control" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>Observações</label>
                                            <textarea name="obs"
                                                class="form-control">Após vencimento cobrar multa de R$ 2,00 e Juros de 1% ao mês</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3>Dados da Imobiliário ou Corretor</h3>
                                        <div class="form-group">
                                            <label>Nome Completo</label>
                                            <input name="nome" type="text" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Endereço</label>
                                            <textarea name="endereco" class="form-control" placeholder=""
                                                required>Rua x, 000, Centro, Cidade - UF</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>CPF / CNPJ</label>
                                            <input name="cpf" type="text" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Valor da Parcela</label>
                                            <input name="valor" type="text" class="form-control" value="R$ 00,00"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label>Quantidade de Parcelas</label>
                                            <input name="qtd" type="number" class="form-control" value="10" max="212"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label>Dia de Vencimento</label>
                                            <input name="vence" type="number" class="form-control" value="7" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Primeira Parcela</label>
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <select name="primeiromes" class="form-control">
                                                        <option value="1">Janeiro</option>
                                                        <option value="2">Fevereiro</option>
                                                        <option value="3">Março</option>
                                                        <option value="4">Abril</option>
                                                        <option value="5">Maio</option>
                                                        <option value="6">Junho</option>
                                                        <option value="7">Julho</option>
                                                        <option value="8">Agosto</option>
                                                        <option value="9">Setembro</option>
                                                        <option value="10">Outubro</option>
                                                        <option value="11">Novembro</option>
                                                        <option value="12">Dezembro</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-6">
                                                    <select name="primeiroano" class="form-control">                                                        
                                                        <option value="2019">2019</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2023">2023</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <br><br>
                                    <button type="submit" class="btn btn-primary btn-lg">Gerar Carnê</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
        </div>
    </div>

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="assets/plugins/jquery-1.8.2/jquery-1.8.2.min.js"></script>
    <script src="assets/plugins/jquery-ui-1.10.4/ui/minified/jquery-ui.min.js"></script>
    <script src="assets/plugins/bootstrap-3.2.0/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]>
                <script src="assets/crossbrowserjs/html5shiv.js"></script>
                <script src="assets/crossbrowserjs/respond.min.js"></script>
                <script src="assets/crossbrowserjs/excanvas.min.js"></script>
        <![endif]-->
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/jquery-cookie/jquery.cookie.js"></script>
    <!-- ================== END BASE JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="assets/plugins/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="assets/plugins/DataTables-1.9.4/js/jquery.dataTables.js"></script>
    <script src="assets/plugins/DataTables-1.9.4/js/data-table.js"></script>
    <script src="assets/js/apps.min.js"></script>
    <script src="assets/plugins/bootstrap-validator/validator.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
    <script>
    $(document).ready(function() {
        App.init();
        $(".button-conf").addClass('active');
    });
    </script>
</body>

</html>