<?php
/**
 * Created by PhpStorm.
 * User: He.RO
 * Date: 2017/5/23
 * Time: 21:30
 */

require_once "query.php";

/* 计算职位工资 */
function count_position_wage($staff_number){
    if($position_wage >= $title_wage){
        return $position_wage;
    } else {
        return 0;
    }
}

/* 计算职称工资 */
function count_title_wage() {
    if($position_wage < $title_wage){
        return $position_wage;
    } else {
        return 0;
    }
}

function count_single_class_wage($course_number){

}

/* 计算单节课程工资 */
function count_single_course_wage($course_number){

}

/* 计算课程工资 */
function count_course_wage($course_number) {
    /* 判断是否存在老师-课程对应关系 */


}

/* 计算总工资 */
function sum_wage($staff_number) {
    return count_position_wage($staff_number)+count_course_wage($staff_number)+count_title_wage($staff_number);
}


?>
