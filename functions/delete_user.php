<?php
require_once "../connect.php";
require_once "../modify.php";

delete_user($con,$_GET["user_number"]);

?>