<?php 
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
    <?php include'../bootstrap.php';?>
</head>
<body>
<div class='container'>
<div class='jumbotron'>
    
    <h1 style="color:lightgreen;text-align:center;"> LOVE YOU ZINDGI!<h1>
        <h2>Admin Login</h2>
        <p>Please fill in your credentials to  admin login.</p>
        
        
<form action="" method="post">
  <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required><br>

    <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
<button type="submit" class="loginbtn"  value='login' name="login">login</button>
</form>
</div>
</div>




<?php include"../db.php"?>
<?php

 if(isset($_POST['login']))
 {
  $name=$_POST['name'];
   $_SESSION["user"] = $name;
  $psw=$_POST['psw'];
  $q="select * from admin where name='$name' &&password='$psw';";
  $result=mysqli_query($connect,$q);
  $num=mysqli_num_rows($result);
  if($num==1)
   {
   $data=mysqli_fetch_array($result);
   $userEmail=$data["name"];
   $userId=$data['id'];
   $_SESSION["userId"] = $userId;
   //$_SESSION["favanimal"] = "cat";
   header('location:http:admin_home.php');
   }
  else
  {
     header('location:http:index.php');
     echo 'not admin';
     }
 }
?>




</body>
</html>
