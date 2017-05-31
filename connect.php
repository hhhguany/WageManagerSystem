<?php
require_once ("config.php");
$con = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
if (mysqli_connect_errno($con)) {
    echo "连接 MySQL 失败: " . mysqli_connect_error();
}
mysqli_set_charset($con, 'utf8') or die('设置字符集失败');
?>