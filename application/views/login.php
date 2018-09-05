<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>Gib Live Brasil</title>
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
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- ================== END BASE CSS STYLE ================== -->
    </head>
    <body>
        <!-- begin #page-loader -->
        <div id="page-loader" class="fade in"><span class="spinner"></span></div>
        <!-- end #page-loader -->

        <!-- begin #page-container -->
        <div id="page-container" class="fade">
            <!-- begin login -->
            <div class="login bg-black animated fadeInDown">
                <!-- begin brand -->
                <div class="login-header">
                    <div class="brand">
                        <img src="assets/img/logo.png" class="center-block">                        
                    </div>
                    <!--                    <div class="icon">
                                            <i class="fa fa-sign-in"></i>
                                        </div>-->
                </div>
                <!-- end brand -->
                <div class="login-content">
                    <div class="msg"></div>
                    <form id="frm-login" class="margin-bottom-0">
                        <div class="form-group m-b-20">
                            <input type="text" name="edtLogin" class="form-control input-lg" placeholder="Usuario" required />
                        </div>
                        <div class="form-group m-b-20">
                            <input type="password" name="edtSenha" class="form-control input-lg" placeholder="Senha" required />
                        </div>
                        <div class="m-b-30 pull-right">
                            <label>
                                <a href="#" target="_blank">Esqueci a senha</a>
                            </label>
                        </div>
                        <div class="login-buttons">
                            <button type="submit" class="btn btn-success btn-block btn-lg" id="btn-submit-login">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end login -->         
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
        <script src="assets/js/apps.min.js"></script>
        <!-- ================== END PAGE LEVEL JS ================== -->
        <script>
            $(document).ready(function () {
                App.init();
            });
        </script>        
        <script src="assets/plugins/bootstrap-validator/validator.min.js"></script>
        <script src="assets/js/custom.js"></script>
    </body>
</html>

