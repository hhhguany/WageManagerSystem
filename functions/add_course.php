<?php
require_once "../query.php";
$course_number= $_POST["course_number"];
$course_name= $_POST["course_name"];
$lesson_number= $_POST["lesson_number"];
$class_size= $_POST["class_size"];



if ($_POST) {
    if (strlen($course_number) == 6 && !preg_match("/[^\d ]/", $course_number)) {
        if (strlen($course_name) <= 30 && strlen($course_name) > 0) {
            if (strlen($lesson_number)<=11 && strlen($lesson_number)>0 && !preg_match("/[^\d ]/", $lesson_number)){
                if (strlen($class_size)<=11 && strlen($class_size)>0 && !preg_match("/[^\d ]/", $class_size)){
                    $add_course_query="INSERT INTO `course` (`course_number`, `course_name`, `lesson_number`, `class_size`) VALUES ('$course_number', '$course_name', '$lesson_number','$class_size')";
                    if ($con->query($add_course_query)) {
                        echo '<script>alert("添加成功，请继续");location.href="../admin.php";</script>';
                    } else {
                        //echo mysqli_error($con);
                        echo '<script>alert("该课程号已经存在，请稍后重试");location.href="../admin.php";</script>';
                    }
                } else {
                    echo '<script>alert("班级人数必须为数字，且不应超过正常长度");window.history.back();</script>';
                }
            } else {
                echo '<script>alert("课时必须为数字，且不应超过正常长度");window.history.back();</script>';
            }
        } else {
            echo '<script>alert("课程名过长或为空，请联系管理员");window.history.back();</script>';
        }
    } else {
        echo '<script>alert("课程号应为六位纯数字");window.history.back();</script>';
    }
} else {
    echo '<script>location.href="../add_course.php";</script>';
}
?>