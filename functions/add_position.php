<?php
require_once "../query.php";
$position_name = $_POST["position_name"];
$wage = $_POST["wage"];
$query_all_position="SELECT * FROM staff_position";
$query_all_position_result=$con->query($query_all_position);
$position_code=$query_all_position_result->num_rows;

if ($_POST) {
    if (strlen($position_name) <= 20 && strlen($position_name) > 0) {
        if (strlen($wage) <= 11 && strlen($wage) >0 && !preg_match("/[^\d ]/", $wage)) {
            $add_course_query = "INSERT INTO `staff_position` (`position_code`, `position_name`, `wage`) VALUES ('$position_code', '$position_name', '$wage')";
            if ($con->query($add_course_query)) {
                echo '<script>alert("添加成功，请继续");location.href="../admin.php";</script>';
            } else {
                //echo mysqli_error($con);
                echo '<script>alert("请检查表单是否完整，请稍后重试");location.href="../admin.php";</script>';
            }
        } else {
            echo '<script>alert("基本工资必须为数字，且不应超过正常长度");window.history.back();</script>';
        }
    } else {
        echo '<script>alert("职位名过长或为空，请联系管理员");window.history.back();</script>';
    }
} else {
    echo '<script>location.href="../add_position.php";</script>';
}
?>