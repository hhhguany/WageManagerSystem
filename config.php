<?php
/** 配置字符编码 */
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL^E_NOTICE^E_WARNING);

/** 配置数据库地址 */
define("HOST", "localhost");

/** 配置用户名 */
define("USERNAME", "root");

/** 配置密码 */
define("PASSWORD", "1234");

/** 选择数据库 */
define("DATABASE", "wage_manage");

/** 定义每节课基本课酬 */
define("CLASSWAGE", 50);
?>