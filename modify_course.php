<?php
require_once "query.php";
require_once "modify.php";
$course_number=$_GET["course_number"];
$action="functions/modify_course.php?course_number=".$course_number;
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
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-title" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">教师工资管理系统 - 管理员 <small>demo</small></a>
        </div>
        <div class="collapse navbar-collapse" id="nav-title">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown" id="nav-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $staff_name;?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="admin.php">回到主页</a></li>
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

<!-- Query table start -->
<div class="container" style="padding-top: 20px;">
    <!-- Tab panes -->
    <div class="panel" id="wage_panel">
        <div class="panel-heading text-center"><strong>用户列表</strong></div>
        <div class="panel-body">
            <!-- 查询语句在这 -->
            <table class="table table-bordered table-hover table-striped text-center">
                <tr class="success">
                    <td>课程号</td>
                    <td>课程名</td>
                    <td>每月课时</td>
                    <td>班级人数</td>
                </tr>
                <?php
                 print_single_course_info($con,$course_number);
                ?>

            </table>
        </div>
    </div>
</div>
<hr class="divider">

<div class="container" style="padding-top: 50px; padding-bottom:40px;">
    <div class="panel">
        <form action=<?php echo $action;?> role="form" method="post">
            <div class="panel-heading text-center">
                <strong>修改用户</strong>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="course_number"><strong>课程号: <?php echo $course_number;?></strong></label>
                </div>
                <div class="form-group">
                    <label for="course_name">课程名</label>
                    <input type="text" class="form-control" id="course_name" name="course_name" placeholer="课程名">
                </div>
                <div class="form-group">
                    <label for="lesson_number">每月课时</label>
                    <input type="text" class="form-control" id="lesson_number" name="lesson_number" placeholer="课时">
                </div>
                <div class="form-group">
                    <label for="class_size">班级人数</label>
                    <input type="text" class="form-control" id="class_size" name="class_size" placeholer="班级人数">
                </div>
            </div>
            <div class="panel-footer" stylr="float:right;">
                <button class="btn btn-success" type="submit">完成</button>
                <button class="btn btn-warning" type="reset">清除</button>
            </div>
        </form>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">关于</h4>
            </div>
            <div class="modal-body">
                <p>一个基本的工资管理系统的实现，基于 Apache - PHP - MySQL 开发。</p>
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


</body>

</html>
