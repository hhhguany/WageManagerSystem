<?php
session_start();
if (isset($_SESSION["staff_number"]) && isset($_SESSION["modify_right"])) {
    if ($_SESSION["modify_right"] == '1') {
        header("Location:admin.php");
    } elseif ($_SESSION["modify_right"] == '0') {
        header("Location:user.php");
    }
}
?>

    <!DOCTYPE html>
    <html lang="zh-CN">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>软件工程大作业</title>

        <!-- Bootstrap -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- DIY CSS -->
        <link href="assets/css/style.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    </head>

    <body style="padding-top: 70px;">

        <!-- Navbar start -->
        <nav class="navbar navbar-default navbar-fixed-top navbar-inverse " role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
                    <a class="navbar-brand" href="#">教师工资管理系统
                <small>demo</small>
            </a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#" id="login_button">登陆</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#about">关于</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar end -->

        <div id="main-body" class="" style="padding-top: 100px;padding-right: 0px; padding-bottom: 100px; padding-left: 0px; margin-top:0;">
            <div class="container">
                <div class="row">

                    <div class="col-sm-6 col-sm-offset-3">
                        <form action="login.php" role="form" method="post">
                            <div class="form-group">
                                <label for="staff_number">工号</label>
                                <input type="text" class="form-control" id="staff_number" name="staff_number" placeholer="工号">
                            </div>
                            <div class="form-group">
                                <label for="password">密码</label>
                                <input type="password" class="form-control" id="password" name="password" placeholer="密码">
                            </div>
                            <div class="text-right">
                                <p>
                                    <button type="submit" class="btn btn-success">登陆</button>
                                </p>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>

        <!-- Footer start -->
        <div class="navbar navbar-default navbar-fixed-bottom">
            <div class="container">
                <footer class="text-center" style="padding-top: 15px;">
                    <p style="margin-bottom: -1px;"><strong>海南大学信息科学技术学院 - 软件工程大作业</strong></p>
                    <p>by 何俊霖 马海英 刘润一 蒋雨汐 <small>版权所有，仅供内部交流</small></p>
                </footer>
            </div>
        </div>
        <!-- Footer end -->

        <!-- 弹出框 -->
        <div class="modal fade" id="about" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">关于</h4>
                    </div>
                    <div class="modal-body">
                        <p>一个基本的工资管理系统的实现，基于 Apache - PHP - MySQL 开发。源码下载：https://github.com/udidi/WageManagerSystem</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">了解了</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="assets/js/bootstrap.min.js"></script>

        <script>
            $(document).ready(function () {
                $("#login_button a").click(function () {
                    $("#staff_number']").focus().select();
                });
            });
        </script>
    </body>

    </html>
