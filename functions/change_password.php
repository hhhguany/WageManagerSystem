<?php
require_once "../query.php";

$old_password = $_POST["old_password"];
$new_password = $_POST["new_password"];
$reenter_password = $_POST["reenter_password"];
if ($_POST) {
    if ($new_password == $reenter_password) {
        if ($new_password != $old_password) {
            if (strlen($new_password) <= 20 && strlen($new_password) >= 6) {
                $old_password_check = "SELECT * FROM user where staff_number=$staff_number and password=$old_password";
                $check_result = $con->query($old_password_check);
                if ($check_result->num_rows > 0) {
                    $change_query = "UPDATE user SET password=$new_password where staff_number=$staff_number;";
                    if ($con->query($change_query)) {
                        echo '<script>alert("修改密码成功，请继续");location.href="../user.php";</script>';
                    } else {
                        echo '<script>alert("修改密码失败，请稍后重试");location.href="../user.php";</script>';
                    }
                } else {
                    echo '<script>alert("原密码错误，请重试");location.href="../change_password.php";</script>';
                }
            } else {
                echo '<script>alert("密码长度请保证在6-20位以内");location.href="../change_password.php";</script>';
            }
        } else {
            echo '<script>alert("新密码请勿与老密码相同，请重新输入");location.href="../change_password.php";</script>';
        }

    } else {
        echo '<script>alert("两次输入密码不同，请重新输入");location.href="../change_password.php";</script>';
    }
} else {
    echo '<script>location.href="../change_password.php";</script>';
}
?>
