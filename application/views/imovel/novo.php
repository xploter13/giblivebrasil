<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="pt-br">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>.: Gib Live Brasil | Imóvel - Novo :.</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <!--        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />-->
        <link href="<?php echo base_url(); ?>assets/plugins/jquery-ui-1.10.4/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-3.2.0/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/plugins/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/plugins/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/style.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/style-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/theme/default.css" rel="stylesheet" id="theme" />
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" id="theme" />
        <!-- ================== END BASE CSS STYLE ================== -->

        <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
        <link href="<?php echo base_url(); ?>assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/plugins/datetimepicker/jquery.datetimepicker.css" rel="stylesheet" />
        <!--<link href="<?php echo base_url(); ?>assets/css/input-file.css" rel="stylesheet" />-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/file-input/css/fileinput.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/file-input/themes/explorer/theme.min.css">
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
                    <li><a href="<?php echo base_url(); ?>imovel">Imóvel</a></li>
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
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                </div>
                                <h4 class="panel-title">Cadastro de Imóvel</h4>
                            </div>
                            <div class="panel-body">
                                <div class="msg"></div>
                                <form id="frm-imo" enctype="multipart/form-data" >
                                    <fieldset>
                                        <legend>Dados Básicos</legend>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbImoPropri">Proprietário</label>
                                                <select name="cmbPropri" class="form-control" id="cmbImoPropri"  required>
                                                    <option value=""></option>
                                                    <?php
                                                    if (empty($propri)) :
                                                        ?>
                                                        <option value="" selected disabled>Nenhum registro encontrado</option>
                                                        <?php
                                                    else:
                                                        $p = new ArrayIterator($propri);
                                                        while ($p->valid()) :
                                                            ?> 
                                                            <option value="<?php echo $p->current()->id_proprietario; ?>"><?php echo $p->current()->nome; ?></option>
                                                            <?php
                                                            $p->next();
                                                        endwhile;
                                                    endif;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Descrição:</label>
                                                <input type="text" class="form-control" name="edtDescricao" maxlength="200" required placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Código do Imóvel:</label>
                                                <input type="text" class="form-control" name="edtCodImovel" maxlength="20" required placeholder="CA0001">
                                            </div>                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tipo de Imóvel:</label>
                                                <select name="cmbTipoImovel" class="form-control" required id="cmb-immoble">
                                                    <option value=""></option>
                                                    <optgroup label="Residencial">Residencial</optgroup>
                                                    <option value="Apartamento">Apartamento</option>
                                                    <option value="Casa">Casa</option>
                                                    <option value="Cobertura">Cobertura</option>
                                                    <option value="Flat">Flat</option>
                                                    <option value="Kitchenette">Kitchenette</option>
                                                    <option value="Loft">Loft</option>
                                                    <option value="Loteamento">Loteamento</option>
                                                    <optgroup label="Comercial">Comercial</optgroup>
                                                    <option value="Sala Comercial">Sala Comercial</option>
                                                    <option value="Galpão">Galpão</option>
                                                    <option value="Loja">Loja</option>
                                                    <option value="Motel">Motel</option>
                                                    <option value="Pousada">Pousada</option>
                                                    <option value="Prédio">Prédio</option>
                                                    <optgroup label="Rural">Rural</optgroup>
                                                    <option value="Chácara">Chácara</option>
                                                    <option value="Fazenda">Fazenda</option>
                                                    <option value="Haras">Haras</option>
                                                    <option value="Sítio">Sítio</option>                                                        
                                                </select>
                                            </div>
                                        </div>                                                
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Categoria:</label>
                                                <select id="cmb-type-category" name="cmbCategoria" class="form-control" required>
                                                    <option value=""></option>
                                                    <option>Novo</option>
                                                    <option>Usado</option>
                                                    <option>Em Construção</option>
                                                    <option>Em Reforma</option>
                                                    <option>Sem Financiamento</option>
                                                    <option>Financiamento Bancário</option>
                                                    <option>Financiamento Particular</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Dormintórios:</label>
                                                <input type="text" class="form-control" name="edtQtdDormitorios" maxlength="2" required placeholder="0">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Banheiros:</label>
                                                <input type="text" class="form-control" name="edtQtdBanheiros" maxlength="2" required placeholder="0">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Vagas na garagem:</label>
                                                <input type="text" class="form-control" name="edtVagaGaragem" maxlength="2" required placeholder="0">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Área Construída (m²):</label>
                                                <input type="text" class="form-control" name="edtAreaConstruida" maxlength="20">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Área Total (m²):</label>
                                                <input type="text" class="form-control" name="edtAreaTotal" maxlength="20">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Observações:</label>
                                                <textarea rows="5" cols="50" id="txt-area-immobile" name="txtObsImovel" class="form-control"></textarea>
                                            </div>
                                        </div>

                                        <legend class="gap-30">Dados de Endereço do Imóvel</legend>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputAddress">Endereço</label>
                                                <input type="text" class="form-control" name="edtEndereco" id="inputAddress" maxlength="200" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputComplement">Complemento</label>
                                                <input type="text" class="form-control" name="edtComplemento" id="inputComplement" maxlength="200" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputNumberAddress">Número</label>
                                                <input type="text" class="form-control" name="edtNumero" maxlength="10" id="inputNumberAddress" />
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
                                                <select class="form-control" id="cmb-city" name="cmbCidade" data-size="10" data-live-search="true" data-style="btn-white" required></select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputCEP">Cep</label>
                                                <input type="text" class="form-control" name="edtCep" maxlength="20" id="inputCEP" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputBairro">Bairro</label>
                                                <input type="text" class="form-control" name="edtBairro" id="inputBairro" maxlength="50" />
                                            </div>
                                        </div>
                                        <legend class="gap-30">Dados Financeiro</legend>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tipo de Negociação:</label>
                                                <select class="form-control" name="cmbTipoNegociacao" id="cmb-type-negotiation" required>
                                                    <option value=""></option>
                                                    <option value="Venda" >Venda</option>
                                                    <option value="Aluguel">Aluguel</option>
                                                    <option value="Temporada">Temporada</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label id="lbl-type-negotiation">Valor do Imóvel</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">R$</span>
                                                    <input type="text" class="form-control input-currency" name="edtValorImovel" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Valor do IPTU Mensal:</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">R$</span>
                                                    <input type="text" class="form-control input-currency" name="edtValorIptuMensal">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Valor do IPTU Anual:</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">R$</span>
                                                    <input type="text" class="form-control input-currency" name="edtValorIptuAnual">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Taxas Extras:</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">R$</span>
                                                    <input type="text" class="form-control input-currency" name="edtTaxasExtras">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Descrição da Taxa:</label>
                                                <input type="text" class="form-control" name="edtDescricaoTaxa" maxlength="200">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Observações:</label>
                                                <textarea rows="5" cols="50" id="txt-obs-finances" name="txtObservacao" class="form-control"></textarea>
                                            </div>
                                        </div>                                        
                                        <div class="col-md-12">
                                            <legend class="gap-30">Imagens</legend>
                                            <p>Insira imagens do imóvel em <b>"JPG" ou "PNG"</b> com no máximo 2 MB.</p>                                            
                                            <!-- Upload Button -->
                                            <input type="file" name="image[]" class="file file-loading" id="file-1" data-overwrite-initial="false" data-min-file-count="1" multiple>
                                            <br />
                                            <br />
                                        </div>
                                        <div class="col-md-12 no-margin">                                            
                                            <div class="pull-right">
                                                <button type="reset" class="btn btn-sm btn-default"><i class="fa fa-circle-o"></i> Cancelar</button>
                                                <button type="submit" class="btn btn-sm btn-primary m-r-5"><i class="fa fa-save"></i> Salvar</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                                <!-- end form -->
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
        <script src="<?php echo base_url(); ?>assets/plugins/datetimepicker/jquery.datetimepicker.full.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/maskmoney/maskmoney.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/form-plugins.demo.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/apps.min.js"></script>
        <!-- ================== END PAGE LEVEL JS ================== -->
        <script>
            $(document).ready(function () {
                App.init();
                FormPlugins.init();
                $(".button-imo").addClass('active');

                $('#inputDateAtt').datetimepicker({
                    lang: 'pt-BR',
                    timepicker: false,
                    format: 'd/m/Y',
                    formatDate: 'Y/m/d'
                });

                $('.input-currency').maskMoney();
            });
        </script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-validator/validator.min.js"></script>
        <!--<script src="<?php echo base_url(); ?>assets/js/input-file.min.js"></script>-->
        <script src="<?php echo base_url(); ?>assets/plugins/file-input/js/fileinput.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/file-input/js/locales/pt-BR.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/file-input/themes/explorer/theme.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
        <script>
            function loadSelect() {
                //
            }

            /* File Input - Drag & Drop */
            $("#file-1").fileinput({
                language: 'pt-BR',
                uploadUrl: '#', // you must set a valid URL here else you will get an error
                allowedFileExtensions: ['jpg', 'png', 'gif'],
                overwriteInitial: false,
                maxFileSize: 2000,
                maxFilesNum: 10,
                showUpload: false,
                //allowedFileTypes: ['image', 'video', 'flash'],
                slugCallback: function (filename) {
                    return filename.replace('(', '_').replace(']', '_');
                }
            });
        </script>
    </body>
</html>

