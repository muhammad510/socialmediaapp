<?php
session_start();
ob_start();
//unset($_SESSION["id"]);
//unset($_SESSION["name"]);
//session_unset();
session_destroy();
header('location:http://localhost/muhammad/admin/index.php');
?>
