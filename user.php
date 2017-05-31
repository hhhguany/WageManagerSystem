<?php
require_once "query.php";


$salary_sum = 0;
$course_list_result_1 = $con->query($query_course_list);
for ($i = 0; $i < $course_list_result_1->num_rows; $i++) {
    $course_list_result_row = $course_list_result_1->fetch_row();
    $lesson_number = $course_list_result_row[2];
    $class_size = $course_list_result_row[3];

// 工资计算函数
    switch ($professional_title_code) {
        case '1':
            $basic_wage = CLASSWAGE * 1.2;
            break;
        case '2':
            $basic_wage = CLASSWAGE * 1.1;
            break;
        case '3':
            $basic_wage = CLASSWAGE;
            break;
        case '4':
            $basic_wage = CLASSWAGE * 0.9;
            break;
        default :
            echo '<script>alert("教师职称错误，请联系管理员修改");</script>';
    }

    if ($class_size > 40) {
        $single_class_wage = $basic_wage * 1.1;
    } else if ($class_size > 60) {
        $single_class_wage = $basic_wage * 1.2;
    } else {
        $single_class_wage = $basic_wage;
    }

    $salary_sum = $salary_sum + $single_class_wage * $lesson_number;
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
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-title"
                    aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">教师工资管理系统
                <small>demo</small>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="nav-title">
            <ul class="nav navbar-nav">
                <li class="dropdown" id="nav-feature">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">功能<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#wage_query">工资查询</a></li>
                        <li><a href="#class_query">课表查询</a></li>
                        <li><a href="#info_modify">个人信息修改</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown" id="nav-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        <?php echo $staff_name ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#info_modify">查看个人信息</a></li>
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

<!-- Query table start -->
<div class="container" style="padding-top: 10px; padding-bottom: 40px;">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist" id="feature-tab">
        <li role="presentation" class="active"><a href="#wage_query" aria-controls="home" role="tab" data-toggle="tab">工资查询</a>
        </li>
        <li role="presentation"><a href="#class_query" aria-controls="profile" role="tab" data-toggle="tab">课表查询</a>
        </li>
        <li role="presentation"><a href="#info_modify" aria-controls="messages" role="tab" data-toggle="tab">修改个人信息</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="wage_query">
            <div class="panel" id="wage_panel">
                <p></p>
                <div class="panel-heading text-center"><strong>工资信息</strong></div>
                <div class="panel-body">
                    <!-- 查询语句在这 -->
                    <table class="table table-bordered table-hover table-striped text-center">
                        <tr class="success">
                            <td>工号</td>
                            <td>姓名</td>
                            <td>职位工资</td>
                            <td>职称工资</td>
                            <td>课程工资</td>
                            <td>总工资</td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo $staff_number ?>
                            </td>
                            <td>
                                <?php echo $staff_name ?>
                            </td>
                            <td>
                                <?php echo $position_wage ?>
                            </td>
                            <td>
                                <?php echo $title_wage ?>
                            </td>
                            <td>
                                <?php echo $salary_sum ?>
                            </td>
                            <td>
                                <?php echo $position_wage + $title_wage + $salary_sum ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="class_query">
            <div class="panel" id="class_panel">
                <div class="panel-heading text-center"><strong>课程信息</strong></div>
                <div class="panel-body">
                    <!-- 查询语句在这 -->
                    <table class="table table-bordered table-hover table-striped text-center">
                        <tr class="success">
                            <td>课程名</td>
                            <td>课时</td>
                            <td>班级人数</td>
                            <td>每节课工资</td>
                            <td>课程工资</td>
                        </tr>

                        <?php
                        for ($i = 0; $i < $course_list_result->num_rows; $i++) {
                            $course_list_result_row = $course_list_result->fetch_row();
                            $course_name = $course_list_result_row[1];
                            $lesson_number = $course_list_result_row[2];
                            $class_size = $course_list_result_row[3];

                            // 单个课程课酬计算
                            if ($class_size > 40) {
                                $single_class_wage = $basic_wage * 1.1;
                            } else if ($class_size > 60) {
                                $single_class_wage = $basic_wage * 1.2;
                            } else {
                                $single_class_wage = $basic_wage;
                            }

                            echo "
                                <tr >
                                <td>" . $course_name . "</td>
                                <td>" . $lesson_number . "</td>
                                <td>" . $class_size . "</td>
                                <td>" . $single_class_wage . "</td>
                                <td>" . $single_class_wage * $lesson_number . "</td>
                            </tr>
                            ";
                        }
                        ?>


                        <tr class="info">
                            <td>合计</td>
                            <td colspan="3">
                                <?php echo $course_count ?>
                            </td>
                            <td>
                                <?php echo $salary_sum ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="info_modify">
            <div class="panel" id="info_modify">
                <p></p>
                <div class="panel-heading text-center"><strong>个人信息</strong></div>
                <div class="panel-body">
                    <!-- 查询语句在这 -->
                    <table class="table table-bordered table-hover table-striped text-center">
                        <tr class="success">
                            <td>工号</td>
                            <td>姓名</td>
                            <td>职位</td>
                            <td>职称</td>
                            <td>密码</td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo $staff_number ?>
                            </td>
                            <td>
                                <?php echo $staff_name ?>
                            </td>
                            <td>
                                <?php echo $position_name ?>
                            </td>
                            <td>
                                <?php echo $title_name ?>
                            </td>
                            <td><a href="change_password.php">修改密码</a></td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Query table end -->
<hr class="divider">

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
        $("#nav-title .dropdown-menu a").click(function () {
            var href = $(this).attr("href");
            $("#feature-tab a[href='" + href + "']").tab("show");
        });
    });

</script>

</body>

</html>
