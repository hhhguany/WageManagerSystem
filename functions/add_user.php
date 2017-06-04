<?php
require_once "../query.php";

$staff_number = $_POST["staff_number"];
$staff_name = $_POST["staff_name"];
$professional_title = $_POST["professional_title"];
$staff_position = $_POST["staff_position"];
$modify_right = $_POST["modify_right"];
$staff_password = $_POST["staff_password"];
$reenter_password = $_POST["reenter_password"];


if ($_POST) {
    if (strlen($staff_number) == 6 && !preg_match("/[^\d ]/", $staff_number)) {
        if (strlen($staff_name) <= 20 && strlen($staff_name) > 0) {
            if ($staff_password == $reenter_password) {
                if (strlen($staff_password) <= 20 && strlen($staff_password) >= 6) {
                    $add_user_query = "INSERT INTO user(`staff_number`, `staff_name`, `modify_right`, `staff_position`, `professional_title`, `password`) VALUES ('$staff_number', '$staff_name', '$modify_right', '$staff_position', '$professional_title', '$staff_password')";
                    if ($con->query($add_user_query)) {
                        echo '<script>alert("插入成功，请继续");location.href="../admin.php";</script>';
                    } else {
                        echo '<script>alert("该工号已经存在，请重试");location.href="../add_user.php";</script>';
                    }
                } else {
                    echo '<script>alert("密码因为6-20位");window.history.back();</script>';
                }
            } else {
                echo '<script>alert("两次密码输入不一致");window.history.back();</script>';
            }
        } else {
            echo '<script>alert("名字过长或为空，请联系管理员");location.href="../add_user.php";</script>';
        }
    } else {
        echo '<script>alert("工号应为六位纯数字");window.history.back();</script>';
    }
} else {
    echo '<script>location.href="../add_user.php";</script>';
}
?>