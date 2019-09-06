<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>.: Gib Live Brasil | Imóvel :.</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />	
        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/plugins/jquery-ui-1.10.4/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-3.2.0/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/plugins/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/plugins/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/style.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/style-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/css/theme/default.css" rel="stylesheet" id="theme" />
        <!-- ================== END BASE CSS STYLE ================== -->

        <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
        <link href="<?php echo base_url(); ?>assets/plugins/isotope/isotope.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/plugins/lightbox/css/lightbox.css" rel="stylesheet" />
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
                    <li class="active"><a href="<?php echo base_url(); ?>galeria">Galeria</a></li>
                </ol>
                <!-- end breadcrumb -->
                <!-- begin page-header -->
                <h1 class="page-header">Galeria <small>Imagens de todos os imóveis cadastrados</small></h1>
                <!-- end page-header -->

                <div id="gallery" class="gallery">
                    <?php
                    if (empty($data_imo)) :
                        ?>
                        <p>A galeria não possui imagens.</p>
                        <?php
                    else :
                        $g = new ArrayIterator($data_imo);
                        while ($g->valid()) :
                            ?>                    
                            <div class="image gallery-group-1">
                                <div class="image-inner">
                                    <a href="<?php echo base_url() . 'assets/uploads/' . $g->current()->imo_image; ?>" data-lightbox="gallery-group-1">
                                        <!-- <img src="<?php echo base_url() . 'assets/uploads/' . $g->current()->imo_image; ?>" alt="" /> -->
                                        <img src="https://img1.ibxk.com.br/2019/02/25/25044125149117.jpg?w=700" alt="" />
                                    </a>
                                    <p class="image-caption">
                                        <?php echo $g->current()->imo_cod . ' - ' . $g->current()->imo_tipo_imovel; ?>
                                    </p>
                                </div>
                                <div class="image-info" style="min-height: 180px;">
                                    <h5 class="title"><?php  echo 'R$ ' . $g->current()->imo_valor ;  ?></h5>
                                    <div class="pull-right">
                                        <small>cadastrado por</small> <a href="javascript:;"><?php echo $name; ?></a>
                                    </div>
                                    <b><?php echo $g->current()->imo_tipo_neg; ?></b> <br><br>
                                    <div class="desc">
                                        <!-- <a href="<?php echo base_url(); ?>imovel/editar/<?php echo $g->current()->id_imovel ?>" class="btn btn-sm btn-info"><i class="fa fa-eyes"></i> Detalhes</a> -->
                                        <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=58d2e290369dcd0011893ee3&product=inline-share-buttons' async='async'></script>
                                        <div class="sharethis-inline-share-buttons"></div>
                                    </div>
                                    <a href="<?php echo base_url(); ?>imovel/editar/<?php echo $g->current()->id_imovel ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Editar</a>
                                        <button class="btn btn-sm btn-danger btn-delete-imo" data-id="<?php echo $g->current()->id_imovel; ?>"><i class="fa fa-trash"></i> Excluir</button>
                                </div>
                            </div>
                            <?php
                            $g->next();
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
            <!-- end #content -->

            <!-- begin scroll to top btn -->
            <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
            <!-- end scroll to top btn -->
        </div>
        <!-- end page container -->

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
        <script src="<?php echo base_url(); ?>assets/plugins/isotope/jquery.isotope.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/lightbox/js/lightbox-2.6.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/gallery.demo.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/dist/sweetalert2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/apps.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-validator/validator.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
        <!-- ================== END PAGE LEVEL JS ================== -->
        <script>
            $(document).ready(function () {
                App.init();
                Gallery.init();
                $(".button-imo").addClass('active');
            });
        </script>
    </body>
</html>

