<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once "connect.php";


/* 操作与被管理的全部用户有关函数 */
/* 切勿与登陆用户重名，登录用户管理请写在 query.php 文件中 */

// 初始化用户信息
$staff_number = $_SESSION["staff_number"];
$modify_right = $_SESSION["modify_right"];


/* 函数模板
function templet()
{
    if (isset($staff_number) && isset($modify_right)) {
        // 修改语句，需管理员权限
        if ($modify_right == '1') {
            // 程序开始

        } else {
            // 非管理员
            echo '<script>alert("您不是管理员，请检测登录信息");location.href="admin.php";</script>';
        }
    } else {
        // 非登录用户
        echo '<script>alert("当前账户已退出，请重新登录");location.href="index.php";</script>';
    }
}
*/

// 单个用户信息打印
function print_user_info($con, $user_number)
{
    if (isset($_SESSION["staff_number"]) && isset($_SESSION["modify_right"])) {
        // 修改语句，需管理员权限
        if ($_SESSION["modify_right"] == '1') {
            // 程序开始
            $query_user_info = "SELECT *  FROM user WHERE staff_number=$user_number;";
            $user_info_result = $con->query($query_user_info);

            $single_user_result = $user_info_result->fetch_row();
            $single_user_number = $single_user_result[0];
            $single_user_name = $single_user_result[1];
            $query_all_user_info_position_name = "SELECT position_name FROM staff_position WHERE position_code='$single_user_result[3]';";
            $query_all_user_info_position_name_result = $con->query($query_all_user_info_position_name);
            $single_user_position = current($query_all_user_info_position_name_result->fetch_row());
            $query_all_user_info_title_name = "SELECT title_name FROM professional_title WHERE title_code ='$single_user_result[4]';";
            $query_all_user_info_title_name_result = $con->query($query_all_user_info_title_name);
            $single_user_title = current($query_all_user_info_title_name_result->fetch_row());
            if ($single_user_result[2] == '1') {
                $modify_right = '管理员';
            } else {
                $modify_right = '普通用户';
            }
            //$manage_href = "modify_user.php?user_number=" . $single_user_number;

            echo "
<tr class=\"default\">
                <td>" . $single_user_number . "</td>
            <td>" . $single_user_name . "</td>
            <td>" . $single_user_position . "</td>
            <td>" . $single_user_title . "</td>
            <td>" . $modify_right . "</td>
                </tr>";
        } else {
            // 非管理员
            echo '<script>alert("您不是管理员，请检测登录信息");location.href="admin.php";</script>';
        }
    } else {
        // 非登录用户
        echo '<script>alert("当前账户已退出，请重新登录");location.href="index.php";</script>';
    }
}

// 所有用户信息打印
function print_all_user_info($con)
{
    if (isset($_SESSION["staff_number"]) && isset($_SESSION["modify_right"])) {
        // 修改语句，需管理员权限
        if ($_SESSION["modify_right"] == '1') {
            // 程序开始
            $query_all_user_info = "SELECT *  FROM user order by staff_number ASC;";
            $all_user_info_result = $con->query($query_all_user_info);
            for ($i = 0; $i < $all_user_info_result->num_rows; $i++) {
                $single_user_result = $all_user_info_result->fetch_row();
                $single_user_number = $single_user_result[0];
                $single_user_name = $single_user_result[1];
                $query_all_user_info_position_name = "SELECT position_name FROM staff_position WHERE position_code='$single_user_result[3]';";
                $query_all_user_info_position_name_result = $con->query($query_all_user_info_position_name);
                $single_user_position = current($query_all_user_info_position_name_result->fetch_row());
                $query_all_user_info_title_name = "SELECT title_name FROM professional_title WHERE title_code ='$single_user_result[4]';";
                $query_all_user_info_title_name_result = $con->query($query_all_user_info_title_name);
                $single_user_title = current($query_all_user_info_title_name_result->fetch_row());
                if ($single_user_result[2] == '1') {
                    $modify_right = '管理员';
                } else {
                    $modify_right = '普通用户';
                }
                $manage_href = "modify_user.php?user_number=" . $single_user_number;
                $delete_href = "functions/delete_user.php?user_number=" . $single_user_number;

                echo "
<tr class=\"default\">
                <td>" . $single_user_number . "</td>
            <td>" . $single_user_name . "</td>
            <td>" . $single_user_position . "</td>
            <td>" . $single_user_title . "</td>
            <td>" . $modify_right . "</td>
            <td><a href='" . $manage_href . "'>操作</a>/<a href='#' onclick=del('$delete_href') >删除</a></td>
                </tr>";
            }
        } else {
            // 非管理员
            echo '<script>alert("您不是管理员，请检测登录信息");location.href="admin.php";</script>';
        }
    } else {
        // 非登录用户
        echo '<script>alert("当前账户已退出，请重新登录");location.href="index.php";</script>';
    }
}

// 打印单个课程
function print_single_course_info($con, $course_number)
{
    if (isset($_SESSION["staff_number"]) && isset($_SESSION["modify_right"])) {
        // 修改语句，需管理员权限
        if ($_SESSION["modify_right"] == '1') {
            // 程序开始
            $query_all_course_info = "SELECT *  FROM course WHERE course_number=$course_number;";
            $all_course_info_result = $con->query($query_all_course_info);
            $single_course_result = $all_course_info_result->fetch_row();


            $single_course_number = $single_course_result[0];
            $single_course_name = $single_course_result[1];
            $single_course_lesson_number = $single_course_result[2];
            $single_course_class_size = $single_course_result[3];
            //$manage_href = "modify_course.php?course_number=" . $single_course_number;
            echo "
<tr class=\"default\">
            <td>" . $single_course_number . "</td>
            <td>" . $single_course_name . "</td>
            <td>" . $single_course_lesson_number . "</td>
            <td>" . $single_course_class_size . "</td>
                </tr>";
        } else {
            // 非管理员
            echo '<script>alert("您不是管理员，请检测登录信息");location.href="admin.php";</script>';
        }
    } else {
        // 非登录用户
        echo '<script>alert("当前账户已退出，请重新登录");location.href="index.php";</script>';
    }
}

// 打印所有课程
function print_all_course_info($con)
{
    if (isset($_SESSION["staff_number"]) && isset($_SESSION["modify_right"])) {
        // 修改语句，需管理员权限
        if ($_SESSION["modify_right"] == '1') {
            // 程序开始
            $query_all_course_info = "SELECT *  FROM course order by course_number ASC;";
            $all_course_info_result = $con->query($query_all_course_info);
            for ($i = 0; $i < $all_course_info_result->num_rows; $i++) {
                $single_course_result = $all_course_info_result->fetch_row();


                $single_course_number = $single_course_result[0];
                $single_course_name = $single_course_result[1];
                $single_course_lesson_number = $single_course_result[2];
                $single_course_class_size = $single_course_result[3];
                $manage_href = "modify_course.php?course_number=" . $single_course_number;
                $delete_href = "functions/delete_course.php?course_number=" . $single_course_number;
                echo "
<tr class=\"default\">
            <td>" . $single_course_number . "</td>
            <td>" . $single_course_name . "</td>
            <td>" . $single_course_lesson_number . "</td>
            <td>" . $single_course_class_size . "</td>
           
            <td><a href='" . $manage_href . "'>操作</a>/<a href='#' onclick=del('$delete_href')>删除</a></td>
                </tr>";
            }
        } else {
            // 非管理员
            echo '<script>alert("您不是管理员，请检测登录信息");location.href="admin.php";</script>';
        }
    } else {
        // 非登录用户
        echo '<script>alert("当前账户已退出，请重新登录");location.href="index.php";</script>';
    }
}

// 打印单个职位
function print_single_position_info($con, $position_code)
{
    if (isset($_SESSION["staff_number"]) && isset($_SESSION["modify_right"])) {
        // 修改语句，需管理员权限
        if ($_SESSION["modify_right"] == '1') {
            // 程序开始
            $query_single_position_info = "SELECT *  FROM staff_position WHERE position_code=$position_code;";
            $single_course_position_result = $con->query($query_single_position_info);

            $single_position_result = $single_course_position_result->fetch_row();
            $single_position_number = $single_position_result[0];
            $single_position_name = $single_position_result[1];
            $single_position_wage = $single_position_result[2];
            //$manage_href = "modify_position.php?position_number=" . $single_position_number;

            echo "
<tr class=\"default\">
            <td>" . $single_position_number . "</td>
            <td>" . $single_position_name . "</td>
            <td>" . $single_position_wage . "</td>
            
                </tr>";

        } else {
            // 非管理员
            echo '<script>alert("您不是管理员，请检测登录信息");location.href="admin.php";</script>';
        }
    } else {
        // 非登录用户
        echo '<script>alert("当前账户已退出，请重新登录");location.href="index.php";</script>';
    }
}

// 打印所有职位
function print_all_position_info($con)
{
    if (isset($_SESSION["staff_number"]) && isset($_SESSION["modify_right"])) {
        // 修改语句，需管理员权限
        if ($_SESSION["modify_right"] == '1') {
            // 程序开始
            $query_all_position_info = "SELECT *  FROM staff_position order by position_code ASC;";

            $all_course_position_result = $con->query($query_all_position_info);
            for ($i = 0; $i < $all_course_position_result->num_rows; $i++) {
                $single_position_result = $all_course_position_result->fetch_row();
                $single_position_number = $single_position_result[0];
                $single_position_name = $single_position_result[1];
                $single_position_wage = $single_position_result[2];
                $manage_href = "modify_position.php?position_code=" . $single_position_number;
                $delete_href = "functions/delete_position.php?position_code=" . $single_position_number;

                echo "
<tr class=\"default\">
            <td>" . $single_position_number . "</td>
            <td>" . $single_position_name . "</td>
            <td>" . $single_position_wage . "</td>
            <td><a href='" . $manage_href . "'>操作</a>/<a href='#' onclick=del('$delete_href')>删除</a></td>
                </tr>";
            }
        } else {
            // 非管理员
            echo '<script>alert("您不是管理员，请检测登录信息");location.href="admin.php";</script>';
        }
    } else {
        // 非登录用户
        echo '<script>alert("当前账户已退出，请重新登录");location.href="index.php";</script>';
    }
}

// 打印单个职称
function print_single_title_info($con, $title_code)
{
    if (isset($_SESSION["staff_number"]) && isset($_SESSION["modify_right"])) {
        // 修改语句，需管理员权限
        if ($_SESSION["modify_right"] == '1') {
            // 程序开始
            $query_single_position_info = "SELECT *  FROM professional_title WHERE title_code=$title_code;";
            $single_course_position_result = $con->query($query_single_position_info);

            $single_position_result = $single_course_position_result->fetch_row();
            $single_position_number = $single_position_result[0];
            $single_position_name = $single_position_result[1];
            $single_position_wage = $single_position_result[2];
            //$manage_href = "modify_position.php?position_number=" . $single_position_number;

            echo "
<tr class=\"default\">
            <td>" . $single_position_number . "</td>
            <td>" . $single_position_name . "</td>
            <td>" . $single_position_wage . "</td>
            
                </tr>";

        } else {
            // 非管理员
            echo '<script>alert("您不是管理员，请检测登录信息");location.href="admin.php";</script>';
        }
    } else {
        // 非登录用户
        echo '<script>alert("当前账户已退出，请重新登录");location.href="index.php";</script>';
    }
}

// 打印所有职称
// 为简便，直接使用的上一函数
function print_all_title_info($con)
{
    if (isset($_SESSION["staff_number"]) && isset($_SESSION["modify_right"])) {
        // 修改语句，需管理员权限
        if ($_SESSION["modify_right"] == '1') {
            // 程序开始
            $query_all_position_info = "SELECT *  FROM professional_title order by title_code ASC;";

            $all_course_position_result = $con->query($query_all_position_info);
            for ($i = 0; $i < $all_course_position_result->num_rows; $i++) {
                $single_position_result = $all_course_position_result->fetch_row();
                $single_position_number = $single_position_result[0];
                $single_position_name = $single_position_result[1];
                $single_position_wage = $single_position_result[2];
                $manage_href = "modify_title.php?title_code=" . $single_position_number;
                $delete_href = "functions/delete_title.php?title_code=" . $single_position_number;
                echo "
<tr class=\"default\">
            <td>" . $single_position_number . "</td>
            <td>" . $single_position_name . "</td>
            <td>" . $single_position_wage . "</td>
            <td><a href='" . $manage_href . "'>操作</a>/<a href='#' onclick=del('$delete_href')>删除</a></td>
                </tr>";
            }
        } else {
            // 非管理员
            echo '<script>alert("您不是管理员，请检测登录信息");location.href="admin.php";</script>';
        }
    } else {
        // 非登录用户
        echo '<script>alert("当前账户已退出，请重新登录");location.href="index.php";</script>';
    }
}

/* 删除函数 */
// 删除用户
function delete_user($con, $staff_number)
{
    $delete_query = "DELETE FROM `user` WHERE `user`.`staff_number` = '$staff_number'";
    if ($con->query($delete_query)) {
        echo '<script>alert("删除用户成功");window.history.back();location.reload();</script>';
    } else {
        echo '<script>alert("删除用户失败");</script>';
    }
}

// 删除课程
function delete_course($con, $course_number)
{
    $delete_query = "DELETE FROM `course` WHERE `course`.`course_number` = '$course_number'";
    if ($con->query($delete_query)) {
        echo '<script>alert("删除课程成功");window.history.back();location.reload(); </script>';
    } else {
        echo '<script>alert("删除课程失败");</script>';
    }
}

// 删除职位
function delete_position($con, $position_code)
{
    $delete_query = "DELETE FROM `staff_position` WHERE `staff_position`.`position_code` = '$position_code'";
    if ($con->query($delete_query)) {
        echo '<script>alert("删除职位成功");window.history.back();location.reload();</script>';
    } else {
        echo '<script>alert("删除职位失败");</script>';
    }
}

// 删除职称
function delete_title($con, $title_code)
{
    $delete_query = "DELETE FROM `professional_title` WHERE `professional_title`.`title_code` = '$title_code'";
    if ($con->query($delete_query)) {
        echo '<script>alert("删除职称成功");window.history.back();location.reload(); </script>';
    } else {
        echo '<script>alert("删除职称失败");</script>';
    }
}

function print_all_user_wage($con)
{
    if (isset($_SESSION["staff_number"]) && isset($_SESSION["modify_right"])) {
        // 修改语句，需管理员权限
        if ($_SESSION["modify_right"] == '1') {
            // 程序开始
            $query_all_user_info = "SELECT *  FROM user order by staff_number ASC;";
            $all_user_info_result = $con->query($query_all_user_info);

            for ($i = 0; $i <$all_user_info_result->num_rows; $i++) {

                $single_user_result = $all_user_info_result->fetch_row();
                $single_user_number = $single_user_result[0];
                $single_user_name = $single_user_result[1];
                $position_code = $single_user_result[3];
                $professional_title_code = $single_user_result[4];
                $query_all_user_info_position_name = "SELECT wage FROM staff_position WHERE position_code='$position_code'";
                $query_all_user_info_position_name_result = $con->query($query_all_user_info_position_name);
                $position_wage = current($query_all_user_info_position_name_result->fetch_row());
                $query_all_user_info_title_name = "SELECT wage FROM professional_title WHERE title_code ='$professional_title_code'";
                $query_all_user_info_title_name_result = $con->query($query_all_user_info_title_name);
                $title_wage = current($query_all_user_info_title_name_result->fetch_row());



                if ($position_wage > $title_wage) {
                    $title_wage = 0;
                } else {
                    $position_wage = 0;
                }

                $salary_sum=count_course_salary($con,$single_user_number,$professional_title_code);

                $wage_sum = $salary_sum + $position_wage + $title_wage;


                echo "
<tr class=\"default\">
                <td>" . $single_user_number . "</td>
            <td>" . $single_user_name . "</td>
            <td>" . $position_wage . "</td>
            <td>" . $title_wage . "</td>
            <td>" . $salary_sum . "</td>
             <td>" . $wage_sum . "</td>
 
                </tr>";
            }


        } else {
            // 非管理员
            echo '<script>alert("您不是管理员，请检测登录信息");location.href="admin.php";</script>';
        }
    } else {
        // 非登录用户
        echo '<script>alert("当前账户已退出，请重新登录");location.href="index.php";</script>';
    }
}

function count_course_salary($con,$single_user_number,$professional_title_code){
    /* 课程表计算 */
    $query_course_list = "SELECT * FROM course WHERE course_number IN (SELECT course_number FROM teaching_arrangement WHERE staff_number='$single_user_number')";

    $salary_sum = 0;
    if($course_list_result = $con->query($query_course_list)) {


        for ($i = 0; $i < $course_list_result->num_rows; $i++) {
            $course_list_result_row = $course_list_result->fetch_row();
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
    } else {
        $salary_sum =0;
    }
    return $salary_sum;
}
?>