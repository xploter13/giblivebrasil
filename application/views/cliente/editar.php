<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="pt-br">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>.: Gib Live Brasil | Cliente - Editar :.</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <!--        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />-->
        <link href="<?php echo base_url(); ?>assets/plugins/jquery-ui-1.10.4/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-3.2.0/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/plugins/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/style.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/style-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/theme/default.css" rel="stylesheet" id="theme" />
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" id="theme" />
        <!-- ================== END BASE CSS STYLE ================== -->

        <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
        <link href="<?php echo base_url(); ?>assets/plugins/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
        <!-- ================== END PAGE LEVEL STYLE ================== -->
    </head>
    <body>
        <?php
        $c = new ArrayIterator($data_cli);
        while ($c->valid()) :
            ?>
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
                        <li><a href="<?php echo base_url(); ?>cliente">Cliente</a></li>
                        <li class="active">Editar</li>
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
                                    <h4 class="panel-title">Edição de Cliente</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="msg"></div>
                                    <form id="frm-cli-edit">
                                        <fieldset>
                                            <legend>Dados Básicos</legend>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputNome">Nome</label>
                                                    <input type="text" class="form-control input-focus" name="edtNome" value="<?php echo $c->current()->cli_nome; ?>" id="inputNome" maxlength="200" required/>
                                                    <input type="hidden" name="edtID" value="<?php echo $c->current()->id; ?>"/>
                                                </div>
                                            </div>                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputCPF-1">CPF</label>
                                                    <input type="text" class="form-control" name="edtCPF" value="<?php echo $c->current()->cli_cpf; ?>" id="inputCPF-1" maxlength="20" required />
                                                </div>
                                            </div>         
                                            <legend class="gap-30">Dados de Endereço</legend>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputAddress">Endereço</label>
                                                    <input type="text" class="form-control" name="edtEndereco" value="<?php echo $c->current()->cli_endereco; ?>" id="inputAddress" maxlength="200" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputComplement">Complemento</label>
                                                    <input type="text" class="form-control" name="edtComplemento" value="<?php echo $c->current()->cli_complemento; ?>" id="inputComplement" maxlength="200" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputNumberAddress">Número</label>
                                                    <input type="text" class="form-control" name="edtNumero" value="<?php echo $c->current()->cli_numero; ?>" maxlength="10" id="inputNumberAddress" />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Estado</label>
                                                    <select class="form-control selectpicker-" name="cmbEstado" id="cmb-uf" data-size="10" data-live-search="true" data-style="btn-white" required>                                                    
                                                        <option value="" disabled selected>Selecione o estado</option>
                                                        <?php
                                                        if (empty($state)) :
                                                            ?>
                                                            <option value="" disabled selected>Não existem estados cadastrados</option>
                                                            <?php
                                                        else :
                                                            $s = new ArrayIterator($state);
                                                            while ($s->valid()) :
                                                                ?>
                                                                <option value="<?php echo $s->current()->id; ?>"><?php echo $s->current()->descricao; ?></option>
                                                                <?php
                                                                $s->next();
                                                            endwhile;
                                                        endif;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Cidade <span class="loading-city"></span></label>
                                                    <select class="form-control" id="cmb-city" name="cmbCidade" data-size="10" data-live-search="true" data-style="btn-white" required>
                                                    <?php
                                                        if (empty($city)) :
                                                            ?>
                                                            <option value="" disabled selected>Não existem cidades cadastradas</option>
                                                        <?php
                                                        else :
                                                            $obj = new ArrayIterator($city);
                                                            while ($obj->valid()) :
                                                                ?>
                                                                <option value="<?php echo $obj->current()->id; ?>">
                                                                    <?php echo $obj->current()->descricao; ?>
                                                                </option>
                                                                <?php
                                                                $obj->next();
                                                            endwhile;
                                                        endif;
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputCEP">Cep</label>
                                                    <input type="text" class="form-control" name="edtCep" value="<?php echo $c->current()->cli_cep; ?>" maxlength="20" id="inputCEP" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputBairro">Bairro</label>
                                                    <input type="text" class="form-control" name="edtBairro" value="<?php echo $c->current()->cli_bairro; ?>" id="inputBairro" maxlength="50" />
                                                </div>
                                            </div>
                                            <legend class="gap-30">Dados de Contato</legend>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputPhone">Telefone</label>
                                                    <input type="text" class="form-control" name="edtTelefone" value="<?php echo $c->current()->cli_tel; ?>" maxlength="20" id="inputPhone"  />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputMobile">Celular</label>
                                                    <input type="text" class="form-control"  name="edtCelular" value="<?php echo $c->current()->cli_cel; ?>" maxlength="20" id="inputMobile" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputEmail">Email</label>
                                                    <input type="text" class="form-control" name="edtEmail" value="<?php echo $c->current()->cli_email; ?>" maxlength="200" id="inputEmail" />
                                                </div>
                                            </div>
                                            <div class="col-md-12 no-margin">                                            
                                                <div class="pull-right">
                                                    <button type="reset" class="btn btn-sm btn-default"><i class="fa fa-circle-o"></i> Cancelar</button>
                                                    <button type="submit" class="btn btn-sm btn-primary m-r-5"><i class="fa fa-save"></i> Salvar</button>
                                                </div>
                                            </div>
                                        </fieldset>
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
            <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
            <script src="<?php echo base_url(); ?>assets/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/plugins/masked-input/masked-input.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/plugins/password-indicator/js/password-indicator.js"></script>
            <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-combobox/js/bootstrap-combobox.js"></script>
            <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.js"></script>
            <script src="<?php echo base_url(); ?>assets/plugins/jquery-tag-it/js/tag-it.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/form-plugins.demo.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/apps.min.js"></script>
            <!-- ================== END PAGE LEVEL JS ================== -->
            <script>
                $(document).ready(function () {
                    App.init();
                    FormPlugins.init();
                    $(".button-prop").addClass('active');                    
                });
            </script>
            <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-validator/validator.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
            <script>
                $("#cmb-uf").val("<?php echo $c->current()->id_estado; ?>");
                $("#cmb-city").val("<?php echo $c->current()->id_cidade; ?>");
            </script>
            <?php
            $c->next();
        endwhile;
        ?>
    </body>
</html>

