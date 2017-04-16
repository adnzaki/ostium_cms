<?php
/**
 * OstiumCMS
 * A simple, fast and extensible Content Management System
 * for website made by Wolestech (Software Development Agency)
 *
 * @copyright   Copyright (c) 2016-2017, Wolestech | Adnan Zaki
 * @license     MIT License | https://github.com/adnzaki/ostium_cms/blob/master/LICENSE
 * @author      Adnan Zaki
 * @link        http://wolestech.com
 */
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{page_title}</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- While this is for development purpose -->
    <link href="{assets}fonts/roboto.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{assets}fonts/material-icons.css">

    <!-- Bootstrap Core Css -->
    <link href="{assets}plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{assets}plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{assets}plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{assets}css/style.css" rel="stylesheet">
    <link href="{assets}css/custom.css" rel="stylesheet">

</head>

<body class="login-page os-bg-login">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Ostium<b>CMS</b></a>
            <small>The fastest way to build website</small>
        </div>
        <div class="card os-login-card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg os-msg-white os-status">Silakan Login untuk masuk ke dalam sistem</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons os-icon-white">person</i>
                        </span>
                        <div class="form-line os-red-line">
                            <input type="text" class="form-control os-input-login" id="username" name="username" placeholder="Username" autocomplete="off" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons os-icon-white">lock</i>
                        </span>
                        <div class="form-line os-red-line">
                            <input type="password" class="form-control os-input-login" id="password" name="password" placeholder="Password" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme" class="os-msg-white">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-deep-orange waves-effect" id="os-btn-login">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="sign-up.html" class="os-label-orange">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html" class="os-label-orange">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-sm-12">
            <div class="msg os-msg-white text-center">Copyright &copy2017 Wolestech Agency</div>
        </div>
    </div>

    <script type="text/javascript">
        var baseUrl = "<?= base_url() ?>";
    </script>
    <!-- Jquery Core Js -->
    <script src="{assets}plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="{assets}plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{assets}plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="{assets}js/admin.js"></script>
    <script src="{assets}js/login.js"></script>
    <script src="{assets}js/pages/index.js"></script>

    <!-- Validation Plugin Js -->
    <script src="{assets}plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="{assets}js/admin.js"></script>
    <script src="{assets}js/pages/examples/sign-in.js"></script>
</body>

</html>
