<?php
require_once "query.php";
require_once "modify.php";
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
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-title"
                    aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">教师工资管理系统 - 管理员
                <small>demo</small>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="nav-title">
            <ul class="nav navbar-nav">
                <li class="dropdown" id="nav-feature">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">功能<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#user_salary">月工资表</a></li>
                        <li><a href="#user_list">用户列表</a></li>
                        <li><a href="#course_list">课程列表</a></li>
                        <li><a href="#position_list">职位表</a></li>
                        <li><a href="#title_list">职称表</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown" id="nav-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        <?php echo $staff_name; ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="change_password.php">修改密码</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="logout.php">注销</a></li>
                    </ul>
                </li>
                <li><a href="#" data-toggle="modal" data-target="#about">关于</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar end -->

<div style="padding-bottom: 20px;">
    <hr class="divider">
    <div class="container text-center" id="feature">
        <div class="row">
            <div class="col-lg-3 col-sm-3 col-md-3">
                <a href="add_user.php">
                    <button class="btn btn-default btn-block">
                        <strong>添加用户</strong>
                    </button>
                </a>
            </div>
            <div class="col-lg-3 col-sm-3 col-md-3">
                <a href="add_course.php">
                    <button class="btn btn-default btn-block">
                        <strong>添加课程</strong>
                    </button>
                </a>
            </div>
            <div class="col-lg-3 col-sm-3 col-md-3">
                <a href="add_position.php">
                    <button class="btn btn-default btn-block">
                        <strong>添加职务</strong>
                    </button>
                </a>
            </div>
            <div class="col-lg-3 col-sm-3 col-md-3">
                <a href="add_title.php">
                    <button class="btn btn-default btn-block">
                        <strong>添加职称</strong>
                    </button>
                </a>
            </div>

        </div>
    </div>

    <hr class="divider">
</div>

<!-- Info table start -->
<div style="padding-top: 10px; padding-bottom: 40px;">
    <div class="container">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist" id="feature-tab">
            <li role="presentation"><a href="#user_salary" aria-controls="home" role="tab" data-toggle="tab">月工资表</a>
            </li>
            <li role="presentation"><a href="#user_list" aria-controls="home" role="tab" data-toggle="tab">用户列表</a>
            </li>
            <li role="presentation"><a href="#course_list" aria-controls="profile" role="tab" data-toggle="tab">课程列表</a>
            </li>
            <li role="presentation"><a href="#position_list" aria-controls="messages" role="tab"
                                       data-toggle="tab">职位表</a>
            </li>
            <li role="presentation"><a href="#title_list" aria-controls="messages" role="tab" data-toggle="tab">职称表</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="user_salary">
                <div class="panel" id="user_salary">
                    <div class="panel-heading text-center"><strong>月工资表</strong></div>
                    <div class="panel-body">
                        <!-- 查询语句在这 -->
                        <table class="table table-bordered table-hover table-striped text-center">
                            <tr class="success">
                                <td>工号</td>
                                <td>姓名</td>
                                <td>职位基本工资</td>
                                <td>职称基本工资</td>
                                <td>课程工资</td>
                                <td>总工资</td>

                            </tr>
                            <?php
                            print_all_user_wage($con);
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane active" id="user_list">
                <div class="panel" id="user_list">
                    <div class="panel-heading text-center"><strong>用户列表</strong></div>
                    <div class="panel-body">
                        <!-- 查询语句在这 -->
                        <table class="table table-bordered table-hover table-striped text-center">
                            <tr class="success">
                                <td>工号</td>
                                <td>姓名</td>
                                <td>职位</td>
                                <td>职称</td>
                                <td>身份</td>
                                <td>操作</td>
                            </tr>
                            <?php
                            print_all_user_info($con);
                            ?>
                        </table>
                    </div>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane active" id="course_list">
                <div class="panel" id="course_list">
                    <div class="panel-heading text-center"><strong>课程列表</strong></div>
                    <div class="panel-body">
                        <!-- 查询语句在这 -->
                        <table class="table table-bordered table-hover table-striped text-center">
                            <tr class="success">
                                <td>课程号</td>
                                <td>课程名</td>
                                <td>每月课时</td>
                                <td>班级人数</td>
                                <td>操作</td>
                            </tr>
                            <?php
                            print_all_course_info($con)
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane active" id="position_list">
                <div class="panel" id="position_list">
                    <div class="panel-heading text-center"><strong>职位表</strong></div>
                    <div class="panel-body">
                        <!-- 查询语句在这 -->
                        <table class="table table-bordered table-hover table-striped text-center">
                            <tr class="success">
                                <td>序号</td>
                                <td>职位</td>
                                <td>基本工资</td>
                                <td>管理</td>
                            </tr>
                            <?php
                            print_all_position_info($con);
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane active" id="title_list">
                <div class="panel" id="title_list">
                    <div class="panel-heading text-center"><strong>职称表</strong></div>
                    <div class="panel-body">
                        <!-- 查询语句在这 -->
                        <table class="table table-bordered table-hover table-striped text-center">
                            <tr class="success">
                                <td>序号</td>
                                <td>职称</td>
                                <td>基本工资</td>
                                <td>管理</td>
                            </tr>
                            <?php
                            print_all_title_info($con);
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Info table end -->


<!-- Footer start -->
<div class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
        <footer class="text-center" style="padding-top: 15px;">
            <p style="margin-bottom: -1px;"><strong>海南大学信息科学技术学院 - 软件工程大作业</strong></p>
            <p>by 何俊霖 马海英 刘润一 蒋雨汐
                <small>版权所有，仅供内部交流</small>
            </p>
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
                <p>一个基本的工资管理系统的实现，基于 Apache - PHP - MySQL 开发。</p>
                <p><a href="https://github.com/udidi/WageManagerSystem">Git地址</a> | <a href="https://www.hejunlin.cn/se/wm.zip">直接下载</a></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">了解了</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- /.modal -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="assets/js/jquery-3.2.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/js/bootstrap.min.js"></script>

<!-- 菜单定位 -->
<script>
    $(document).ready(function () {
        $("#nav-feature .dropdown-menu a").click(function () {
            var href = $(this).attr("href");
            $("#feature-tab a[href='" + href + "']").tab("show");
        });
    });
    function del(delete_href) {
        if (confirm("确认删除？")) {
        window.location.href=delete_href;
        }
    }
</script>

</body>

</html>
