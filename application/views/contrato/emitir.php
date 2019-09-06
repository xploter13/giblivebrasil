<!DOCTYPE html>
<!--[if IE 8]>
<html lang="pt-br" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="pt-br">
<!--<![endif]-->

<head>
    <meta charset="utf-8"/>
    <title>.: Gib Live Brasil | Contrato - Novo :.</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <!--        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />-->
    <link href="<?php echo base_url(); ?>assets/plugins/jquery-ui-1.10.4/themes/base/minified/jquery-ui.min.css"
          rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-3.2.0/css/bootstrap.min.css"
          rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/plugins/font-awesome-4.2.0/css/font-awesome.min.css"
          rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/animate.min.css"
          rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/style.min.css"
          rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/style-responsive.min.css"
          rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/css/theme/default.css"
          rel="stylesheet" id="theme"/>
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet"
          id="theme"/>
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="<?php echo base_url(); ?>assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css"
          rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/datepicker.css"
          rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/datepicker3.css"
          rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-select/bootstrap-select.min.css"
          rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/plugins/datetimepicker/jquery.datetimepicker.css"
          rel="stylesheet"/>
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
            <li><a href="<?php echo base_url(); ?>contrato">Contrato</a></li>
            <li class="active">Novo</li>
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
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                               data-click="panel-expand"><i
                                        class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                               data-click="panel-reload"><i
                                        class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                               data-click="panel-collapse"><i
                                        class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                               data-click="panel-remove"><i
                                        class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">Emissão de Contrato</h4>
                    </div>
                    <div class="panel-body">
                        <form id="frm-emit-contract">
                            <fieldset>
                                <!-- /.dados de locação do imovel -->
                                <div class="gap-20"></div>
                                <div class="col-md-12">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-sm btn-success m-r-5"><i
                                                    class="fa fa-cog"></i> Gerar Contrato
                                        </button>
                                        <!-- <button type="button" class="btn btn-sm btn-primary m-r-5"><i class="fa fa-save"></i> Salvar</button>-->
                                    </div>
                                </div>
                                <!-- dados de Emissão de Contrato -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cmbLoc">Locador (Proprietário)</label>
                                        <select name="cmbLocatario" class="form-control" id="cmbLoc" required>
                                            <option value="" disabled selected>Selecione o locador</option>
                                            <?php
                                            if (empty($propri)) :
                                                ?>
                                                <option value="">Registros não encontrados</option>
                                            <?php
                                            else :
                                                $l = new ArrayIterator($propri);
                                                while ($l->valid()) :
                                                    ?>
                                                    <option value="<?php echo $l->current()->id; ?>"><?php echo $l->current()->nome; ?></option>
                                                    <?php
                                                    $l->next();
                                                endwhile;
                                            endif;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cmbImo">Imóvel <span class="loading-immobile"></span></label>
                                        <select name="cmbImovel" class="form-control" id="cmb-immobile" required>
                                        <option value="" disabled selected>Selecione o Imóvel</option>
                                            <?php
                                            if (empty($imo)) :
                                                ?>
                                                <option value="">Registros não encontrados</option>
                                            <?php
                                            else :
                                                $l = new ArrayIterator($imo);
                                                while ($l->valid()) :
                                                    ?>
                                                    <option value="<?php echo $l->current()->id; ?>"><?php echo $l->current()->imo_cod . ' - '. $l->current()->imo_tipo_imovel; ?></option>
                                                    <?php
                                                    $l->next();
                                                endwhile;
                                            endif;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cmbLoc">Locatário</label>
                                        <select name="cmbLocator" class="form-control" id="" required>
                                        <option value="" disabled selected>Selecione o locador</option>
                                            <?php
                                            if (empty($locator)) :
                                                ?>
                                                <option value="">Registros não encontrados</option>
                                            <?php
                                            else :
                                                $l = new ArrayIterator($locator);
                                                while ($l->valid()) :
                                                    ?>
                                                    <option value="<?php echo $l->current()->id; ?>"><?php echo $l->current()->cli_nome; ?></option>
                                                    <?php
                                                    $l->next();
                                                endwhile;
                                            endif;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.dados de locação do imovel -->
                            </fieldset>
                        </form>
                        <!-- Contrato -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Contrato</label>
                                <div class="msg"></div>
                                <textarea name="txtContrato" id="txt01" class="form-control" required></textarea>
                            </div>
                        </div>
                        <!-- /.Contrato -->
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
<script src="<?php echo base_url(); ?>assets/plugins/datetimepicker/jquery.datetimepicker.full.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/maskmoney/maskmoney.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/form-plugins.demo.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/apps.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<script>
    $(document).ready(function () {
        App.init();
        FormPlugins.init();
        $(".button-docs").addClass('active');

        $('#inputDateLocIni').datetimepicker({
            lang: 'pt-BR',
            timepicker: false,
            format: 'd/m/Y',
            formatDate: 'Y/m/d'
        });

        $('#inputDateLocVenc').datetimepicker({
            lang: 'pt-BR',
            timepicker: false,
            format: 'd/m/Y',
            formatDate: 'Y/m/d'
        });

        $('.input-currency').maskMoney();
    });
</script>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/tinymce/tinymce-editor.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/tinymce/langs/pt_BR.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-validator/validator.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
</body>

</html>