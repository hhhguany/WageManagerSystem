<?php
if(!isset($_SESSION)){
    session_start();
}
require_once "connect.php";

// 初始化用户信息
$staff_number = $_SESSION["staff_number"];
$modify_right = $_SESSION["modify_right"];

// 查询语句，权限全部登录用户
if (isset($staff_number) && isset($modify_right)) {

    // 查询用户信息
    $query_user = "SELECT *  FROM user WHERE staff_number='$staff_number'";
    if($staff_info_result = $con->query($query_user)) {
        $staff_info_result_row = $staff_info_result->fetch_row();

        $staff_name = $staff_info_result_row[1];
        $staff_position_code = $staff_info_result_row[3];
        $professional_title_code = $staff_info_result_row[4];
    } else {
        echo '<script>alert("查询用户信息失败");</script>';
    }

    // 查询职位信息
    $query_position = "SELECT *  FROM staff_position WHERE position_code='$staff_position_code'";
    if($staff_position_result = $con->query($query_position)) {
        $staff_position_result_row = $staff_position_result->fetch_row();
        $position_name=$staff_position_result_row[1];
        $position_wage=$staff_position_result_row[2];
    } else {
        echo '<script>alert("查询职位信息失败");</script>';
    }

    // 查询职称信息
    $query_title = "SELECT *  FROM professional_title WHERE title_code='$professional_title_code'";
    if($staff_title_result = $con->query($query_title)) {
        $staff_title_result_row = $staff_title_result->fetch_row();
        $title_name=$staff_title_result_row[1];
        $title_wage=$staff_title_result_row[2];
    } else {
        echo '<script>alert("查询职位信息失败");</script>';
    }

    // 判断职称职位工资
    if ($position_wage>$title_wage){
        $title_wage=0;
    } else{
        $position_wage=0;
    }

    // 查询课程表信息
    $query_course_list = "SELECT * FROM course WHERE course_number IN (SELECT course_number FROM teaching_arrangement WHERE staff_number='$staff_number')";
    if ($course_list_result = $con -> query($query_course_list)) {
        if ($course_list_result->num_rows > 0) {
            $course_count = "共计 " . $course_list_result->num_rows . " 条记录";
        } else {
            $course_count = "没有信息";
        }
    } else {
        echo '<script>alert("查询课程安排失败");</script>';
    }

} else {
    // 非登录用户
    echo '<script>alert("当前账户已退出，请重新登录");location.href="index.php";</script>';
}
?>