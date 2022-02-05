<?php //echo"hi" ?>
<html>
<head>
</head>
<body>
<?php include"db.php"?>


<?php
if(isset($_POST['submit']))
{
$nam=$_POST['user_name'];
$mobile=$_POST['mobil'];
$pass=$_POST['psw'];
//$repass=$_POST['psw-repeat'];
//echo "Hello".$nam."<br >;

}?>
<?php
$query="insert into user_information(name,password,mobile) values('$nam','$pass','$mobile');";
$result=mysqli_query($connect,$query);

if(!$result)
{
die(mysqli_error($connect));
}


?>
<div class="container">
<h1><?php echo"Hello ".$nam;"<br >" ?></h1>
<p>registration sucessesfull<br/><a href="index.php"><b>click here<b></a> to login</p>
</div>
</body>
</html>
