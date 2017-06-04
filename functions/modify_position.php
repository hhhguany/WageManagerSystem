<?php
require_once "../query.php";
$position_code=$_GET["position_code"];
$position_name = $_POST["position_name"];
$wage = $_POST["wage"];


if ($_POST) {
    if (strlen($position_name) <= 20 && strlen($position_name) > 0) {
        if (strlen($wage) <= 11 && strlen($wage) >0 && !preg_match("/[^\d ]/", $wage)) {
            $add_course_query = "
UPDATE `staff_position` SET 
`position_name` = '$position_name',
`wage` = '$wage'
  WHERE `staff_position`.`position_code` = '$position_code'";
            if ($con->query($add_course_query)) {
                echo '<script>alert("添加成功，请继续");location.href="../admin.php";</script>';
            } else {
                echo mysqli_error($con);
                //echo '<script>alert("请检查表单是否完整，请稍后重试");location.href="../admin.php";</script>';
            }
        } else {
            echo '<script>alert("基本工资必须为数字，且不应超过正常长度");window.history.back();</script>';
        }
    } else {
        echo '<script>alert("职位名过长或为空，请联系管理员");window.history.back();</script>';
    }
} else {
    echo '<script>location.href="../admin.php";</script>';
}
?>