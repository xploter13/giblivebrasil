<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>Gib Live Brasil | Dashboard</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link href="assets/plugins/jquery-ui-1.10.4/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
        <link href="assets/plugins/bootstrap-3.2.0/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/plugins/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" />
        <link href="assets/css/animate.min.css" rel="stylesheet" />
        <link href="assets/css/style.min.css" rel="stylesheet" />
        <link href="assets/css/style-responsive.min.css" rel="stylesheet" />
        <link href="assets/css/theme/default.css" rel="stylesheet" id="theme" />
        <!-- ================== END BASE CSS STYLE ================== -->

        <!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
        <link href="assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" />
        <link href="assets/plugins/bootstrap-calendar/css/bootstrap_calendar.css" rel="stylesheet" />
        <link href="assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
        <link href="assets/plugins/morris/morris.css" rel="stylesheet" />
        <!-- ================== END PAGE LEVEL CSS STYLE ================== -->
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
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
                <!-- end breadcrumb -->
                <!-- begin page-header -->
                <h1 class="page-header">Dashboard <small></small></h1>                
                <!-- end page-header -->
                <!-- begin row -->
                <div class="row">
                    <!-- begin col-3 -->
                    <div class="col-md-3 col-sm-6">
                        <div class="widget widget-stats bg-green">
                            <div class="stats-icon"><i class="fa fa-home"></i></div>
                            <div class="stats-info">
                                <h4 class="text-uppercase">Imóveis Cadastrados</h4>
                                <p>30</p>
                            </div>
                            <div class="stats-link">
                                <a href="imovel/novo">Cadastrar <i class="fa fa-arrow-circle-o-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end col-3 -->
                    <!-- begin col-3 -->
                    <div class="col-md-3 col-sm-6">
                        <div class="widget widget-stats bg-blue">
                            <div class="stats-icon"><i class="fa fa-chain-broken"></i></div>
                            <div class="stats-info">
                                <h4 class="text-uppercase">Visitas Realizadas</h4>
                                <p>20</p>	
                            </div>
                            <div class="stats-link">
                                <a href="crm/novo">Cadastrar <i class="fa fa-arrow-circle-o-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end col-3 -->
                    <!-- begin col-3 -->
                    <div class="col-md-3 col-sm-6">
                        <div class="widget widget-stats bg-purple">
                            <div class="stats-icon"><i class="fa fa-th"></i></div>
                            <div class="stats-info">
                                <h4 class="text-uppercase">Locações Cadastradas</h4>
                                <p>5</p>
                            </div>
                            <div class="stats-link">
                                <a href="locacao/novo">Cadastrar <i class="fa fa-arrow-circle-o-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end col-3 -->
                    <!-- begin col-3 -->
                    <div class="col-md-3 col-sm-6">
                        <div class="widget widget-stats bg-aqua">
                            <div class="stats-icon"><i class="fa fa-file"></i></div>
                            <div class="stats-info">
                                <h4 class="text-uppercase">Auditoria</h4>
                                <p>&nbsp;</p>
                            </div>
                            <div class="stats-link">
                                <a href="auditoria/novo">Cadastrar <i class="fa fa-arrow-circle-o-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end col-3 -->
                </div>
                <!-- end row -->
                <!-- begin row -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="widget-chart with-sidebar bg-black">
                            <div class="widget-chart-content">
                                <h4 class="chart-title">
                                    Estatística de Imóveis
                                    <small>Comparativo entre imóveis alugados e não alugados</small>
                                </h4>
                                <div id="visitors-line-chart" class="morris-inverse" style="height: 260px;"></div>
                            </div>
                            <div class="widget-chart-sidebar bg-black-darker">
                                <div class="chart-number">
                                    2.100
                                    <small>Clientes Atendidos</small>
                                </div>
                                <div id="visitors-donut-chart" style="height: 160px"></div>
                                <ul class="chart-legend">
                                    <li><i class="fa fa-circle-o fa-fw text-success m-r-5"></i> 34.0% <span>para Locação</span></li>
                                    <li><i class="fa fa-circle-o fa-fw text-primary m-r-5"></i> 56.0% <span>Alugados</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">
                                <div class="panel-heading-btn">
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                </div>
                                <h4 class="panel-title">Download's</h4>
                            </div>
                            <div class="panel-body table-responsive p-t-0">
                                <table class="table table-valign-middle m-b-0">
                                    <thead>
                                        <tr>	
                                            <th>Documento</th>
                                            <th>Tipo</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><label class="label label-danger">Unique Visitor</label></td>
                                            <td>13,203 <span class="text-success"><i class="fa fa-arrow-up"></i></span></td>
                                            <td><button type="button" class="btn btn-sm">Baixar</button></td>
                                        </tr>
                                        <tr>
                                            <td><label class="label label-warning">Bounce Rate</label></td>
                                            <td>28.2%</td>
                                            <td><button type="button" class="btn btn-sm">Baixar</button></td>
                                        </tr>
                                        <tr>
                                            <td><label class="label label-success">Total Page Views</label></td>
                                            <td>1,230,030</td>
                                            <td><button type="button" class="btn btn-sm">Baixar</button></td>
                                        </tr>
                                        <tr>
                                            <td><label class="label label-primary">Avg Time On Site</label></td>
                                            <td>00:03:45</td>
                                            <td><button type="button" class="btn btn-sm">Baixar</button></td>
                                        </tr>
                                        <tr>
                                            <td><label class="label label-default">% New Visits</label></td>
                                            <td>40.5%</td>
                                            <td><button type="button" class="btn btn-sm">Baixar</button></td>
                                        </tr>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <!-- begin row -->
                <div class="row">                    
                    <!-- begin col-4 -->
                    <div class="col-md-8">
                        <!-- begin panel -->
                        <div class="panel panel-inverse">
                            <div class="panel-heading">
                                <h4 class="panel-title">Agendamento de Visitas <span class="pull-right label label-success"><i class="fa fa-calendar"></i></span></h4>
                            </div>
                            <div id="schedule-calendar" class="bootstrap-calendar"></div>
                            <div class="list-group">
                                <a href="#" class="list-group-item text-ellipsis">
                                    <span class="badge badge-success">hoje</span> Atendimento
                                </a> 
                                <a href="#" class="list-group-item text-ellipsis">
                                    <span class="badge badge-primary">anterior ou futuro</span> Atendimento
                                </a>
                            </div>
                        </div>
                        <!-- end panel -->
                    </div>
                    <!-- end col-4 -->
                    <!-- begin col-4 -->
                    <div class="col-md-4">
                        <!-- begin panel -->
                        <div class="panel panel-inverse">
                            <div class="panel-heading">
                                <h4 class="panel-title">Últimos Imóveis <span class="pull-right label label-success"><i class="fa fa-home"></i></span></h4>
                            </div>
                            <ul class="registered-users-list clearfix">
                                <li>
                                    <a href="javascript:;"><img src="assets/img/user-5.jpg"></a>
                                    <h4 class="username text-ellipsis">
                                        Savory Posh
                                        <small>Algerian</small>
                                    </h4>
                                </li>
                                <li>
                                    <a href="javascript:;"><img src="assets/img/user-3.jpg"></a>
                                    <h4 class="username text-ellipsis">
                                        Ancient Caviar
                                        <small>Korean</small>
                                    </h4>
                                </li>
                                <li>
                                    <a href="javascript:;"><img src="assets/img/user-1.jpg"></a>
                                    <h4 class="username text-ellipsis">
                                        Marble Lungs
                                        <small>Indian</small>
                                    </h4>
                                </li>
                                <li>
                                    <a href="javascript:;"><img src="assets/img/user-8.jpg"></a>
                                    <h4 class="username text-ellipsis">
                                        Blank Bloke
                                        <small>Japanese</small>
                                    </h4>
                                </li>
                                <li>
                                    <a href="javascript:;"><img src="assets/img/user-2.jpg"></a>
                                    <h4 class="username text-ellipsis">
                                        Hip Sculling
                                        <small>Cuban</small>
                                    </h4>
                                </li>
                                <li>
                                    <a href="javascript:;"><img src="assets/img/user-6.jpg"></a>
                                    <h4 class="username text-ellipsis">
                                        Flat Moon
                                        <small>Nepalese</small>
                                    </h4>
                                </li>
                                <li>
                                    <a href="javascript:;"><img src="assets/img/user-4.jpg"></a>
                                    <h4 class="username text-ellipsis">
                                        Packed Puffs
                                        <small>Malaysian></small>
                                    </h4>
                                </li>
                                <li>
                                    <a href="javascript:;"><img src="assets/img/user-9.jpg"></a>
                                    <h4 class="username text-ellipsis">
                                        Clay Hike
                                        <small>Swedish</small>
                                    </h4>
                                </li>
                            </ul>
                            <div class="panel-footer text-center">
                                <a href="javascript:;" class="text-inverse">Ver Todos</a>
                            </div>
                        </div>
                        <!-- end panel -->
                    </div>
                    <!-- end col-4 -->
                </div>
                <!-- end row -->
            </div>
            <!-- end #content -->

            <!-- begin scroll to top btn -->
            <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
            <!-- end scroll to top btn -->
        </div>
        <!-- end page container -->

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
        <script src="assets/plugins/morris/raphael.min.js"></script>
        <script src="assets/plugins/morris/morris.js"></script>
        <script src="assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/plugins/jquery-jvectormap/jquery-jvectormap-world-merc-en.js"></script>
        <script src="assets/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js"></script>
        <script src="assets/plugins/gritter/js/jquery.gritter.js"></script>
        <script src="assets/js/dashboard-v2.min.js"></script>
        <script src="assets/js/apps.min.js"></script>
        <!-- ================== END PAGE LEVEL JS ================== -->
        <script>
            $(document).ready(function () {
                App.init();
                DashboardV2.init();
                //Calendar
                var e = ["Janeiro",
                    "Fevereiro",
                    "Março",
                    "Abril",
                    "Maio",
                    "Junho",
                    "Julho",
                    "Agosto",
                    "Setembro",
                    "Outubro",
                    "Novembro",
                    "Dezembro"];
                var t = ["D",
                    "S",
                    "T",
                    "Q",
                    "Q",
                    "S",
                    "S"];
                var n = new Date,
                        r = n.getMonth() + 1,
                        i = n.getFullYear();
                var s =                     
                    
                    [
                        <?php 
                            $obj = new ArrayIterator($data_crm);
                            while ($obj->valid()) :
                                $dt = explode('/', $obj->current()->data_atendimento);
                              if ($obj->current()->data_atendimento === date('d/m/Y'))   :
                            ?>
                                ["<?php echo $dt[0]; ?>/" + <?php echo $dt[1]; ?> + "/<?php echo $dt[2]; ?>",
                                    "Visita de hoje",
                                    "#",
                                    "#00acac",
                                    "Cliente <?php echo $obj->current()->cliente; ?>"
                                ],
                            <?php 
                                else :
                                    ?>                                    
                                    ["<?php echo $dt[0]; ?>/" + <?php echo $dt[1]; ?> + "/<?php echo $dt[2]; ?>",
                                    "Lembrete",
                                    "#",
                                    "#242A30",
                                    "Visitar <?php echo $obj->current()->cliente; ?>"
                                ],
                                <?php
                                endif;
                            $obj->next();
                            endwhile;
                        ?>
                    ];                    
                var o = $("#schedule-calendar");
                $(o).calendar({
                    months: e, days: t, events: s, popover_options: {
                        placement: "top", html: true
                    }
                }
                );
                $(o).find("td.event").each(function () {
                    var e = $(this).css("background-color");
                    $(this).removeAttr("style");
                    $(this).find("a").css("background-color", e);
                }
                );
                $(o).find(".icon-arrow-left, .icon-arrow-right").parent().on("click", function () {
                    $(o).find("td.event").each(function () {
                        var e = $(this).css("background-color");
                        $(this).removeAttr("style");
                        $(this).find("a").css("background-color", e);
                    });
                });

                //Estatistics - Morris
                var e = "#00acac";
                var t = "#348fe2";
                Morris.Donut({
                    element: "visitors-donut-chart", data: [
                        {label: "Disponíveis", value: 900},
                        {label: "Alugados", value: 1200}
                    ], colors: [e, t],
                    labelFamily: "Open Sans",
                    labelColor: "rgba(255,255,255,0.4)",
                    labelTextSize: "12px",
                    backgroundColor: "#242a30"
                });

                var e = "#0D888B";
                var t = "#00ACAC";
                var n = "#3273B1";
                var r = "#348FE2";
                var i = "rgba(0,0,0,0.6)";
                var s = "rgba(255,255,255,0.4)";
                //Line chart
                Morris.Line({
                    element: "visitors-line-chart", data: [
                        {x: "2011", y: 60, z: 30},
                        {x: "2012", y: 70, z: 40},
                        {x: "2013", y: 40, z: 10},
                        {x: "2014", y: 100, z: 70},
                        {x: "2015", y: 40, z: 10},
                        {x: "2016", y: 80, z: 50},
                        {x: "2017", y: 70, z: 40}
                    ], xkey: "x", ykeys: ["y", "z"],
                    /* xLabelFormat: function (e) {
                     e = getMonthName(e.getMonth());
                     return e.toString();
                     },*/
                    labels: ["Alugados", "Disponíveis"],
                    lineColors: [e, n], pointFillColors: [t, r],
                    lineWidth: "2px", pointStrokeColors: [i, i],
                    resize: true, gridTextFamily: "Open Sans",
                    gridTextColor: s,
                    gridTextWeight: "normal",
                    gridTextSize: "11px",
                    gridLineColor: "rgba(0,0,0,0.5)",
                    hideHover: "auto"
                }); //.Morris
            });

            //Notifcation
            /* $(window).load(function () {
             setTimeout(function () {
             $.gritter.add({
             title: "Olá, <?php echo $name; ?>",
             text: "seja bem vindo!", image: "",
             sticky: true, time: "",
             class_name: "my-sticky-class"
             });
             }, 1e3);
             });*/
             $(".button-dash").addClass('active');
        </script>
    </body>
</html>
