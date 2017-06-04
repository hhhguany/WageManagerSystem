<?php
require_once "../query.php";
$title_code=$_GET["title_code"];
$title_name = $_POST["title_name"];
$wage = $_POST["wage"];


if ($_POST) {
    if (strlen($title_name) <= 20 && strlen($title_name) > 0) {
        if (strlen($wage) <= 11 && strlen($wage) >0 && !preg_match("/[^\d ]/", $wage)) {
            $add_course_query = "
UPDATE `professional_title` SET 
`title_name` = '$title_name',
`wage` = '$wage'
  WHERE `professional_title`.`title_code` = '$title_code'";
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
        echo '<script>alert("职称名过长或为空，请联系管理员");window.history.back();</script>';
    }
} else {
    echo '<script>location.href="../admin.php";</script>';
}
?>