<?php
session_abort();
session_start();
require_once("connect.php");

/** 检查表单是否提交 */
if ($_POST) {
    $password = $_POST["password"];
    $account = $_POST["staff_number"];

    $query = "SELECT staff_number,modify_right FROM user WHERE password='$password' AND staff_number='$account'";
    $result = $con->query($query);

    /** 判段登陆 */
    if ($result->num_rows > 0) {
        $row = $result->fetch_row();

        $staff_number = $row[0];
        $modify_right = $row[1];

        /** 设置SESSION */
        $_SESSION["staff_number"] = $staff_number;
        $_SESSION["modify_right"] = $modify_right;

    } else {
        echo '<script>alert("登陆失败，请检测登录信息");location.href="index.php";</script>';
    }

    /** 关闭数据库连接 */
    mysqli_close($con);

    /** 判断用户权限并转跳不同页面&&登录用户转跳 */
    if (isset($_SESSION["staff_number"]) && isset($_SESSION["modify_right"])) {
        if ($_SESSION["modify_right"] == '1') {
            header("Location:admin.php");
        } elseif ($_SESSION["modify_right"] == '0') {
            header("Location:user.php");
        }
    } else {
        echo '<script>alert("您当前未登录，请登录后重试");location.href="index.php";</script>';
    }
} else {
    echo '<script>alert("请先登录");location.href="index.php";</script>';
}
?>