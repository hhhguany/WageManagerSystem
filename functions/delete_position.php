<?php
require_once "../connect.php";
require_once "../modify.php";

delete_position($con,$_GET["position_code"]);

?>