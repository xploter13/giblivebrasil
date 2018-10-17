<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="pt-br">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>.: Gib Live Brasil | Auditoria - Novo :.</title>
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
                    <li><a href="<?php echo base_url(); ?>auditoria">Auditoria</a></li>
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
                                <h4 class="panel-title">Cadastro de Auditoria de Imóvel</h4>
                            </div>
                            <div class="panel-body">
                                <div class="msg"></div>
                                <form id="frm-audi">
                                    <fieldset>
                                        <div class="col-md-12">
                                            <legend>Dados Básicos</legend>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cmbImoble">Imóvel</label>
                                                <select name="cmbImovel" class="form-control" id="cmbImoble">
                                                    <?php
                                                    if (empty($data_imo)) :
                                                        ?>
                                                        <option value="">Dados não encontrados</option>
                                                        <?php
                                                    else :
                                                        $i = new ArrayIterator($data_imo);
                                                        while ($i->valid()) :
                                                            ?>
                                                            <option value="<?php echo $i->current()->id; ?>"><?php echo $i->current()->imo_cod . ' ' . $i->current()->imo_tipo_imovel; ?></option>
                                                            <?php
                                                            $i->next();
                                                        endwhile;
                                                    endif;
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <legend>Quarto(s) e Sala(s)</legend>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbHoursAtt">Tomadas - Espelhos</label>
                                                <select name="cmbQtoSala" class="form-control" id="cmbQtoSala">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbEmb">Embolso</label>
                                                <select name="cmbEmbolso" class="form-control" id="cmbEmb">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                      
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbPis">Pisos</label>
                                                <select name="cmbPisos" class="form-control" id="cmbPis">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                  
                                                </select>
                                            </div>
                                        </div>                                       
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbPrint">Pintura</label>
                                                <select name="cmbPintura" class="form-control" id="cmbPrint">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbDoor">Porta(s)</label>
                                                <select name="cmbPorta" class="form-control" id="cmbDoor">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbWindow">Janela(s)</label>
                                                <select name="cmbJanela" class="form-control" id="cmbWindow">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="cmbObsQtSala">Observação</label>
                                                <textarea name="cmbObsQtSala" class="form-control" id="cmbObsQtSala" rows="8" cols="50"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <legend>Cozinha</legend>  
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbTorn">Torneira</label>
                                                <select name="cmbTorn" class="form-control" id="cmbTorn">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                     
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbCif">Cifrão</label>
                                                <select name="cmbCifrao" class="form-control" id="cmbCif">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbToma">Tomadas - Espelhos</label>
                                                <select name="cmbTomada" class="form-control" id="cmbToma">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbEmbCozi">Embolso</label>
                                                <select name="cmbEmbCozinha" class="form-control" id="cmbEmbCozi">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                      
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbPisCozi">Pisos</label>
                                                <select name="cmbPisCozinha" class="form-control" id="cmbPisCozi">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                  
                                                </select>
                                            </div>
                                        </div>                                       
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbPrintCozi">Pintura</label>
                                                <select name="cmbPinturaCozinha" class="form-control" id="cmbPrintCozi">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbDoorCozi">Porta(s)</label>
                                                <select name="cmbPortaCozinha" class="form-control" id="cmbDoorCozi">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbWindowCozi">Janela(s)</label>
                                                <select name="cmbJanelaCozinha" class="form-control" id="cmbWindowCozi">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="cmbObsCozi">Observação</label>
                                                <textarea name="cmbObsCozinha" class="form-control" id="cmbObsCozi" rows="8" cols="50"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <legend>Banheiro</legend>  
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbTornBanh">Torneira</label>
                                                <select name="cmbTorneiraBanh" class="form-control" id="cmbTornBanh">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                     
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbCifBanh">Cifrão</label>
                                                <select name="cmbCifraoBanheiro" class="form-control" id="cmbCifBanh">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbVasSani">Vaso Sanitário</label>
                                                <select name="cmbVasoSanitarioBanh" class="form-control" id="cmbVasSani">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbChuv">Chuveiro</label>
                                                <select name="cmbChuveiroBanh" class="form-control" id="cmbChuv">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbRaloBanh">Ralo</label>
                                                <select name="cmbRaloBanheiro" class="form-control" id="cmbRaloBanh">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbTomaBanh">Tomadas - Espelhos</label>
                                                <select name="cmbTomadaBanh" class="form-control" id="cmbTomaBanh">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbEmbBanh">Embolso</label>
                                                <select name="cmbEmbolsoBanh" class="form-control" id="cmbEmbBanh">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                      
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbPisBanh">Pisos</label>
                                                <select name="cmbPisoBanh" class="form-control" id="cmbPisBanh">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                  
                                                </select>
                                            </div>
                                        </div>                                       
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbPrintBanh">Pintura</label>
                                                <select name="cmbPinturaBanh" class="form-control" id="cmbPrintBanh">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbDoorBanh">Porta(s)</label>
                                                <select name="cmbPortaBanh" class="form-control" id="cmbPortaBanh">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbWindowBanh">Janela(s)</label>
                                                <select name="cmbJanelaBanh" class="form-control" id="cmbWindowBanh">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="cmbObsBanh">Observação</label>
                                                <textarea name="obsBanh" class="form-control" id="ObsBanh" rows="8" cols="50"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <legend>Área de Serviço</legend>  
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbTornAreaService">Torneira</label>
                                                <select name="cmbTornAreaServico" class="form-control" id="cmbTornAreaService">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                     
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbCifAreaService">Cifrão</label>
                                                <select name="cmbCifAreaServico" class="form-control" id="cmbCifAreaService">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbTomaAreaService">Tomadas - Espelhos</label>
                                                <select name="cmbTomaAreaServico" class="form-control" id="cmbTomaAreaServico">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbEmbAreaService">Embolso</label>
                                                <select name="cmbEmbAreaServico" class="form-control" id="cmbEmbAreaService">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                      
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbPisAreaService">Pisos</label>
                                                <select name="cmbPisAreaServico" class="form-control" id="cmbPisAreaService">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                  
                                                </select>
                                            </div>
                                        </div>                                       
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbPrintAreaService">Pintura</label>
                                                <select name="cmbPinturaAreaServico" class="form-control" id="cmbPrintAreaService">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbDoorAreaService">Porta(s)</label>
                                                <select name="cmbPortaAreaServico" class="form-control" id="cmbDoorAreaService">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cmbWindowAreaService">Janela(s)</label>
                                                <select name="cmbJanelaAreaServico" class="form-control" id="cmbWindowAreaService">
                                                    <option value="Ótimo">Ótimo</option>
                                                    <option value="Bom">Bom</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Ruim">Ruim</option>                                                    
                                                    <option value="Péssimo">Péssimo</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="cmbObsAreaService">Observação</label>
                                                <textarea name="cmbObsAreaServico" class="form-control" id="cmbObsAreaService" rows="8" cols="50"></textarea>
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

                        <!-- #modal-message -->
                        <div class="modal modal-message fade" id="modal-message">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title">Auditoria</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p class="msg"></p>
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
        <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/dist/sweetalert2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/apps.min.js"></script>
        <!-- ================== END PAGE LEVEL JS ================== -->
        <script>
            $(document).ready(function () {
                App.init();
                FormPlugins.init();
                $(".button-audi").addClass('active');

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
        <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
        <script>
            function loadSelect() {
                //
            }
        </script>
    </body>
</html>

