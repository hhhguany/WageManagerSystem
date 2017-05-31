<?php
require_once "../connect.php";
require_once "../modify.php";

delete_course($con,$_GET["course_number"]);

?>