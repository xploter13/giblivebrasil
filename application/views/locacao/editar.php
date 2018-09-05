<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="pt-br">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>.: Gib Live Brasil | Locação - Editar :.</title>
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
        <?php
        if (empty($data_loc)) :
            header('Location: ' . base_url('locacao'));
        else :
            $l = new ArrayIterator($data_loc);
            while ($l->valid()) :
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
                            <li><a href="<?php echo base_url(); ?>locacao">Locação</a></li>
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
                                        <h4 class="panel-title">Edição de Locação</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="msg"></div>
                                        <form id="frm-loc-edit">
                                            <fieldset>
                                                <!-- dados do locatario -->
                                                <legend>Dados do Locatário</legend>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputNome">Nome</label>
                                                        <select class="form-control" id="cmb-name" name="cmbNome">
                                                            <?php
                                                            if (empty($cli)) :
                                                                ?>   
                                                                <option value="">Nenhum registro encontrado</option>
                                                                <?php
                                                            else :
                                                                ?>
                                                                <option value="" selected disabled="">Selecione um locatário</option>
                                                                <?php
                                                                $c = new ArrayIterator($cli);
                                                                while ($c->valid()) :
                                                                    ?>
                                                                    <option value="<?php echo $c->current()->id_cli; ?>"><?php echo $c->current()->cli_nome; ?></option>
                                                                    <?php
                                                                    $c->next();
                                                                endwhile;
                                                            endif;
                                                            ?>
                                                        </select>
                                                        <input type="hidden" name="edtID" value="<?php echo $l->current()->id; ?>">
                                                    </div>
                                                </div>                                        
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputCPF-1">CPF</label>
                                                        <input type="text" class="form-control" name="edtCPF" value="<?php echo $l->current()->loc_cpf; ?>" id="inputCPF-1" maxlength="20" required />
                                                    </div>
                                                </div>         
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputRG-1">RG</label>
                                                        <input type="text" class="form-control" name="edtRG" value="<?php echo $l->current()->loc_rg; ?>" id="inputRG-1"required />
                                                    </div>
                                                </div>    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cmb-state-civil">Estado Civil</label>
                                                        <select name="cmbEstadoCivil" class="form-control" id="cmb-state-civil">
                                                            <option value=""></option>
                                                            <option value="Solteiro">Solteiro</option>
                                                            <option value="Casado">Casado</option>
                                                            <option value="União Estável">União Estável</option>
                                                            <option value="Disquitado">Disquitado</option>
                                                            <option value="Outro">Outro</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="inputAddress">Endereço</label>
                                                        <input type="text" class="form-control" name="edtEndereco" value="<?php echo $l->current()->loc_endereco; ?>" id="inputAddress" maxlength="200" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputComplement">Complemento</label>
                                                        <input type="text" class="form-control" name="edtComplemento" value="<?php echo $l->current()->loc_complemento; ?>" id="inputComplement" maxlength="200" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputNumberAddress">Número</label>
                                                        <input type="text" class="form-control" name="edtNumero" value="<?php echo $l->current()->loc_numero; ?>" id="inputNumberAddress" maxlength="10" />
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
                                                        <input type="text" class="form-control" name="edtCep" value="<?php echo $l->current()->loc_cep; ?>" maxlength="20" id="inputCEP" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputBairro">Bairro</label>
                                                        <input type="text" class="form-control" name="edtBairro" value="<?php echo $l->current()->loc_bairro; ?>" id="inputBairro" maxlength="50" />
                                                    </div>
                                                </div>                                        
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputProfession">Profissão</label>
                                                        <input type="text" class="form-control" name="edtProficao" value="<?php echo $l->current()->loc_profissao; ?>" id="inputProfession" maxlength="50" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Renda Mensal:</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">R$</span>
                                                            <input type="text" class="form-control input-currency" name="edtRendaMensal" value="<?php echo $l->current()->loc_renda_mensal; ?>" maxlength="200">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputPhone">Telefone</label>
                                                        <input type="text" class="form-control" name="edtTelefone" value="<?php echo $l->current()->loc_tel; ?>" maxlength="20" id="inputPhone"  />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputMobile">Celular</label>
                                                        <input type="text" class="form-control"  name="edtCelular" value="<?php echo $l->current()->loc_cel; ?>" maxlength="20" id="inputMobile" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputEmail">Email</label>
                                                        <input type="text" class="form-control" name="edtEmail" value="<?php echo $l->current()->loc_email; ?>" maxlength="200" id="inputEmail" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cmbGuarantor">Possui Fiador?</label>
                                                        <select name="cmbPossuiFiador" class="form-control" id="cmbGuarantor">
                                                            <option value="Sim">Sim</option>
                                                            <option value="Não" selected>Não</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- /.dados do locatario -->

                                                <!-- dados do fiador -->
                                                <div id="guarantor">
                                                    <legend class="gap-30">Dados do Fiador</legend>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputNome">Nome</label>
                                                            <input type="text" class="form-control" name="edtNomeFiador" value="<?php echo $l->current()->loc_nome_fia; ?>" id="inputNameGuar" maxlength="200"/>
                                                        </div>
                                                    </div>                                        
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputCPF-2">CPF</label>
                                                            <input type="text" class="form-control" name="edtCpfFiador" value="<?php echo $l->current()->loc_cpf_fia; ?>" id="inputCPF-2" maxlength="20" />
                                                        </div>
                                                    </div>         
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputRG-2">RG</label>
                                                            <input type="text" class="form-control" name="edtRGFiador" value="<?php echo $l->current()->loc_rg_fia; ?>" id="inputRG-2"/>
                                                        </div>
                                                    </div>    
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="cmbStateCivilGuar">Estado Civil</label>
                                                            <select name="cmbEstadoCivilFiador" class="form-control" id="cmbStateCivilGuar">
                                                                <option value=""></option>
                                                                <option value="Solteiro">Solteiro</option>
                                                                <option value="Casado">Casado</option>
                                                                <option value="União Estável">União Estável</option>
                                                                <option value="Disquitado">Disquitado</option>
                                                                <option value="Outro">Outro</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="inputAddressGuar">Endereço</label>
                                                            <input type="text" class="form-control" name="edtEnderecoFiador" value="<?php echo $l->current()->loc_endereco_fia; ?>" id="inputAddressGuar" maxlength="200" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputComplementGuar">Complemento</label>
                                                            <input type="text" class="form-control" name="edtComplementoFiador" value="<?php echo $l->current()->loc_complemento_fia; ?>" id="inputComplementGuar" maxlength="200" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputNumberAddressGuar">Número</label>
                                                            <input type="text" class="form-control" name="edtNumeroFiador" value="<?php echo $l->current()->loc_numero_fia; ?>" maxlength="10" id="inputNumberAddressGuar" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Estado</label>
                                                            <select class="form-control selectpicker-" name="cmbEstadoFiador" id="cmb-uf-guar" data-size="10" data-live-search="true" data-style="btn-white">                                                    
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
                                                            <label>Cidade <span class="loading-city-guar"></span></label>
                                                            <select class="form-control" id="cmb-city-guar" name="cmbCidadeFiador" data-size="10" data-live-search="true" data-style="btn-white"></select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputCEP-2">Cep</label>
                                                            <input type="text" class="form-control" name="edtCepFiador" value="<?php echo $l->current()->loc_cep_fia; ?>" maxlength="20" id="inputCEP-2" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputBairro">Bairro</label>
                                                            <input type="text" class="form-control" name="edtBairroFiador" value="<?php echo $l->current()->loc_bairro_fia; ?>" id="inputBairro" maxlength="50" />
                                                        </div>
                                                    </div>                                        
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputProfession">Profissão</label>
                                                            <input type="text" class="form-control" name="edtProficaoFiador" value="<?php echo $l->current()->loc_profissao_fia; ?>" id="inputProfession" maxlength="50" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Renda Mensal:</label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon">R$</span>
                                                                <input type="text" class="form-control input-currency" name="edtRendaMensalFiador" value="<?php echo $l->current()->loc_renda_mensal_fia; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputPhone">Telefone</label>
                                                            <input type="text" class="form-control" name="edtTelefoneFiador" value="<?php echo $l->current()->loc_tel_fia; ?>" maxlength="20" id="inputPhone-2"  />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputMobile">Celular</label>
                                                            <input type="text" class="form-control"  name="edtCelularFiador" value="<?php echo $l->current()->loc_cel_fia; ?>" maxlength="20" id="inputMobile-2" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputEmail">Email</label>
                                                            <input type="text" class="form-control" name="edtEmailFiador" value="<?php echo $l->current()->loc_email_fia; ?>" maxlength="200" id="inputEmail" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.dados do fiador -->

                                                <!-- dados de locação do imovel -->
                                                <legend class="gap-30">Dados de Locação do Imóvel</legend>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cmbLoc">Locador</label>
                                                        <select name="cmbLocador" class="form-control" id="cmbLoc" required>
                                                            <option value=""></option>
                                                            <?php
                                                            if (empty($propri)) :
                                                                ?>
                                                                <option value="">Registros não encontrados</option>
                                                                <?php
                                                            else :
                                                                $p = new ArrayIterator($propri);
                                                                while ($p->valid()) :
                                                                    ?>
                                                                    <option value="<?php echo $p->current()->id; ?>"><?php echo $p->current()->nome; ?></option>
                                                                    <?php
                                                                    $p->next();
                                                                endwhile;
                                                            endif;
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div> 
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cmbImo">Imóvel</label>
                                                        <select name="cmbImovel" class="form-control" id="cmbImo">
                                                            <option value=""></option>
                                                            <?php
                                                            if (empty($imo)) :
                                                                ?>
                                                                <option value="">Registros não encontrados</option>
                                                                <?php
                                                            else :
                                                                $i = new ArrayIterator($imo);
                                                                while ($i->valid()):
                                                                    ?>
                                                                    <option value="<?php echo $i->current()->id_imovel; ?>"><?php echo $i->current()->imo_tipo_imovel . ' - ' . $i->current()->imo_cod; ?></option>
                                                                    <?php
                                                                    $i->next();
                                                                endwhile;
                                                            endif;
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div> 
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cmbTypeLoc">Tipo de Locação</label>
                                                        <select name="cmbTipoLocacao" class="form-control" id="cmbTypeLoc">
                                                            <option value=""></option>
                                                            <option value="Residencial">Residencial</option>
                                                            <option value="Comercial">Comercial</option>
                                                            <option value="Desvirtuada">Desvirtuada</option>
                                                            <option value="Especial">Especial</option>
                                                            <option value="Temporada">Temporada</option>
                                                        </select>
                                                    </div>
                                                </div> 
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputPraLoc">Prazo de Locação</label>
                                                        <input type="text" class="form-control" name="edtPrazoLocacao" value="<?php echo $l->current()->loc_prazo; ?>" id="inputPraLoc" maxlength="50">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputDateAtt">Início Contrato</label>
                                                        <input type="text" class="form-control" name="edtDataIniLoc" value="<?php echo $l->current()->loc_data_ini_contrato; ?>" id="inputDateLocIni" maxlength="200" required/>
                                                    </div>
                                                </div> 
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputDateLocVenc">Vencimento Contrato</label>
                                                        <input type="text" class="form-control" name="edtDataVencLoc" value="<?php echo $l->current()->loc_data_venc_contrato; ?>" id="inputDateLocVenc" maxlength="200" required/>
                                                    </div>
                                                </div>     
                                                <!-- /.dados de locação do imovel -->                                    
                                                <div class="col-md-12 no-margin">                                            
                                                    <div class="pull-right">
                                                        <button type="reset" class="btn btn-sm btn-default"><i class="fa fa-circle-o"></i> Cancelar</button>
                                                        <button type="submit" class="btn btn-sm btn-primary m-r-5"><i class="fa fa-save"></i> Atualizar</button>
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
                <script src="<?php echo base_url(); ?>assets/plugins/maskmoney/maskmoney.min.js"></script>
                <script src="<?php echo base_url(); ?>assets/js/form-plugins.demo.min.js"></script>
                <script src="<?php echo base_url(); ?>assets/js/apps.min.js"></script>
                <!-- ================== END PAGE LEVEL JS ================== -->
                <script>
                    $(document).ready(function () {
                        App.init();
                        FormPlugins.init();
                        $(".button-loc").addClass('active');

                        $("#inputDateLocIni").datepicker({
                            todayHighlight: true,
                            autoclose: true,
                            format: 'dd/mm/yyyy'
                        });

                        $("#inputDateLocVenc").datepicker({
                            todayHighlight: true,
                            autoclose: true,
                            format: 'dd/mm/yyyy'
                        });

                        $('.input-currency').maskMoney();

                    });
                </script>
                <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-validator/validator.min.js"></script>
                <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
                <script>
                    $("#cmb-name").val("<?php echo $l->current()->id_cliente; ?>");
                    $("#cmb-state-civil").val("<?php echo $l->current()->loc_estado_civil; ?>");
                    $("#cmb-uf").val("<?php echo $l->current()->id_estado; ?>");
                    $("#cmb-uf-guar").val("<?php echo $l->current()->loc_id_estado_fia; ?>");
                    $("#cmbLoc").val("<?php echo $l->current()->loc_id_estado_fia; ?>");
                    $("#cmbImo").val("<?php echo $l->current()->loc_id_estado_fia; ?>");
                    $("#cmbTypeLoc").val("<?php echo $l->current()->loc_tipo; ?>");

                    function loadSelect() {
                        $("#cmb-city").val("<?php echo $l->current()->id_cidade; ?>");
                        $("#cmb-city-guar").val("<?php echo $l->current()->loc_id_cidade_fia; ?>");
                    }
                </script>
                <?php
                $l->next();
            endwhile;
        endif;
        ?>
    </body>
</html>

