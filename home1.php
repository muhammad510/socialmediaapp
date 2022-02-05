<?php session_start();
ob_start();
$user=$_SESSION["user"];
?>
<html>
<title>home page</title>
<body>

<?php include 'header.php';?>
<h1>Welcome-<b style="color:blue;"><?php echo $user;?></b></h1>

<?php 

// include"db.php"
$user=$_SESSION["user"];
 $userId=$_SESSION["userId"];
//echo $user." ".$userId;
?>
</body>
</html>
