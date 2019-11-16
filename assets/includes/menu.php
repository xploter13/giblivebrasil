<?php
if ($level === '1') :
    ?>
    <!-- begin #sidebar -->
    <div id="sidebar" class="sidebar">
        <!-- begin sidebar scrollbar -->
        <div data-scrollbar="true" data-height="100%">
            <!-- begin sidebar user -->
            <ul class="nav">
                <li class="nav-profile">
<!--                    <div class="image">
                        <a href="javascript:;"><img src="<?php echo base_url(); ?>assets/img/user-13.jpg" alt="" /></a>
                    </div>-->
                    <div class="info">
                        <?php echo $name; ?>
                        <small>
                            <?php
                            echo 'Administrador';
                            ?>
                        </small>
                    </div>
                </li>
            </ul>
            <!-- end sidebar user -->
            <!-- begin sidebar nav -->
            <ul class="nav">
                <li class="nav-header">Navegação</li>
                <li class="button-dash">
                    <a href="<?php echo base_url(); ?>dashboard">
                        <i class="fa fa-laptop"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="button-cli">
                    <a href="<?php echo base_url(); ?>cliente">
                        <i class="fa fa-link"></i>
                        <span>
                            Cliente
                        </span> 
                    </a>
                </li>
                <li class="button-crm">
                    <a href="<?php echo base_url(); ?>crm">
                        <i class="fa fa-book"></i>
                        <span>
                            CRM
                        </span> 
                    </a>
                </li>
                <li class="button-prop">
                    <a href="<?php echo base_url(); ?>proprietario">
                        <i class="fa fa-inbox"></i> <span>Proprietário</span>
                    </a>
                </li>                            
                <li class="button-imo">
                    <a href="<?php echo base_url(); ?>imovel">
                        <i class="fa fa-home"></i>
                        <span>
                            Imóvel
                        </span> 
                    </a>
                </li>                
                <li class="button-loc">
                    <a href="<?php echo base_url(); ?>locacao">
                        <i class="fa fa-th"></i>
                        <span>Locação</span>
                    </a>
                </li>
                <li class="button-audi">
                    <a href="<?php echo base_url(); ?>auditoria">
                        <i class="fa fa-file-text-o"></i>
                        <span>Auditoria de Imóvel</span>
                    </a>
                </li>
                <li class="button-func">
                    <a href="<?php echo base_url(); ?>funcionario">
                        <i class="fa fa-users"></i>
                        <span>Funcionário</span>
                    </a>
                </li>
                <li class="has-sub button-rec">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-money"></i>
                        <span>Financeiro</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo base_url(); ?>recebimento">Recebimento Direto</a></li>
                        <li><a href="<?php echo base_url(); ?>carne">Gerar Carnê</a></li>
                    </ul>
                </li>
                <li class="has-sub button-docs">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-files-o"></i>
                        <span>Documentos</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo base_url(); ?>contrato/emitir">Contrato <i class="fa fa-file-text text-theme m-l-5"></i></a></li>
                        <!-- <li><a href="#">Modelos <i class="fa fa-file-word-o text-theme m-l-5"></i></a></li> -->
                    </ul>
                </li>
                <li class="has-sub button-rel">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-area-chart"></i>
                        <span>
                            Relatórios
                        </span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo base_url(); ?>relatorio/auditoria">Auditoria</a></li>
                        <li><a href="<?php echo base_url(); ?>relatorio/cliente">Cliente</a></li>
                        <li><a href="<?php echo base_url(); ?>relatorio/proprietario">Proprietário</a></li>
                        <li><a href="<?php echo base_url(); ?>relatorio/crm">CRM</a></li>
                        <li><a href="<?php echo base_url(); ?>relatorio/imovel">Imóvel</a></li>
                        <li><a href="<?php echo base_url(); ?>relatorio/locacao">Locação</a></li>
                        <li><a href="<?php echo base_url(); ?>relatorio/funcionario">Funcionário</a></li>
                    </ul>
                </li>
                <li class="has-sub button-conf">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-cogs"></i>
                        <span>Configuração</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="#">Minha Conta</a></li>
                        <li><a href="<?php echo base_url(); ?>usuario">Usuário</a></li>                        
                    </ul>
                </li>        
                <li class="has-sub button-help">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-life-ring"></i>
                        <span>Ajuda</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo base_url(); ?>docs/lei/8245.pdf" target="_blank">Lei 8245</a></li>
                    </ul>
                </li>        
                <!-- begin sidebar minify button -->
                <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
                <!-- end sidebar minify button -->
            </ul>
            <!-- end sidebar nav -->
        </div>
        <!-- end sidebar scrollbar -->
    </div>
    <div class="sidebar-bg"></div>
    <!-- end #sidebar -->

    <?php
else :
    ?>
    <!-- begin #sidebar -->
    <div id="sidebar" class="sidebar">
        <!-- begin sidebar scrollbar -->
        <div data-scrollbar="true" data-height="100%">
            <!-- begin sidebar user -->
            <ul class="nav">
                <li class="nav-profile">
                    <div class="image">
                        <a href="javascript:;"><img src="<?php echo base_url(); ?>assets/img/user-13.jpg" alt="" /></a>
                    </div>
                    <div class="info">
                        <?php echo $name; ?>
                        <small>
                            <?php
                            echo 'Básico';
                            ?>
                        </small>
                    </div>
                </li>
            </ul>
            <!-- end sidebar user -->
            <!-- begin sidebar nav -->
            <ul class="nav">
                <li class="nav-header">Navegação</li>
                <li class="button-dash">
                    <a href="<?php echo base_url(); ?>dashboard">
                        <i class="fa fa-laptop"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="button-cli">
                    <a href="<?php echo base_url(); ?>cliente">
                        <i class="fa fa-link"></i>
                        <span>
                            Cliente
                        </span> 
                    </a>
                </li>
                <li class="button-crm">
                    <a href="<?php echo base_url(); ?>crm">
                        <i class="fa fa-book"></i>
                        <span>
                            CRM
                        </span> 
                    </a>
                </li>
                <li class="button-prop">
                    <a href="<?php echo base_url(); ?>proprietario">
                        <i class="fa fa-inbox"></i> <span>Proprietário</span>
                    </a>
                </li>                            
                <li class="button-imo">
                    <a href="<?php echo base_url(); ?>imovel">
                        <i class="fa fa-home"></i>
                        <span>
                            Imóvel
                        </span> 
                    </a>
                </li>
                <li class="has-sub">
                    <a href="<?php echo base_url(); ?>locacao">
                        <i class="fa fa-th"></i>
                        <span>Locação</span>
                    </a>
                </li>                
                <li class="has-sub button-rec">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-money"></i>
                        <span>Financeiro</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo base_url(); ?>recebimento">Recebimento</a></li>
                    </ul>
                </li>
                <li class="has-sub button-docs">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-camera"></i>
                        <span>Documentos</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo base_url(); ?>contrato/emitir">Contrato <i class="fa fa-file-text text-theme m-l-5"></i></a></li>
                        <li><a href="#">Modelos <i class="fa fa-file-word-o text-theme m-l-5"></i></a></li>
                    </ul>
                </li>
                <li class="has-sub button-rel">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-area-chart"></i>
                        <span>
                            Relatórios
                        </span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo base_url(); ?>relatorio/auditoria">Auditoria</a></li>
                        <li><a href="<?php echo base_url(); ?>relatorio/cliente">Cliente</a></li>
                        <li><a href="<?php echo base_url(); ?>relatorio/proprietario">Proprietário</a></li>
                        <li><a href="<?php echo base_url(); ?>relatorio/crm">CRM</a></li>
                        <li><a href="<?php echo base_url(); ?>relatorio/imovel">Imóvel</a></li>
                        <li><a href="<?php echo base_url(); ?>relatorio/locacao">Locação</a></li>
                        <li><a href="<?php echo base_url(); ?>relatorio/funcionario">Funcionário</a></li>
                    </ul>
                </li>
                <li class="has-sub button-help">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-life-ring"></i>
                        <span>Ajuda</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo base_url(); ?>lei8245">Lei 8245</a></li>
                    </ul>
                </li>   
                <!-- begin sidebar minify button -->
                <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
                <!-- end sidebar minify button -->
            </ul>
            <!-- end sidebar nav -->
        </div>
        <!-- end sidebar scrollbar -->
    </div>
    <div class="sidebar-bg"></div>
    <!-- end #sidebar -->
<?php
endif;
