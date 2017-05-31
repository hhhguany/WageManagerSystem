<?php
session_start();
unset ($_SESSION['staff_number']);
unset ($_SESSION['modify_right']);
header("Location:index.php");
?>
