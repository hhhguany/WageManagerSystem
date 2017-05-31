<?php
require_once "../connect.php";
require_once "../modify.php";

delete_title($con,$_GET["title_code"]);

?>