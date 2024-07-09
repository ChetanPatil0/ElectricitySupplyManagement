<?php
session_start();
unset($_SESSION["c_no"]);
unset($_SESSION["MobileNo"]);
header("Location:login.php");
?>