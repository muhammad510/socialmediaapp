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
     <!--link rel="stylesheet" href="m.css"-->
    
  <?php include'bootstrap.php';?> 
</head>
<body>
<div class="container">
  <a  href="admin/index.php"><b>admin</b></a>
  <div class="jumbotron center">
  <form action="" method="post">
   <h1>Login</h1>
        <p >Please fill in your credentials to login.</p>  
   
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required><br>
<p></p>
    <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
  <button type="submit" class="loginbtn"  value='login' name="login">login</button>
  

   </form>

<p>are you not registerd ? for registration <a href="registration.php"><b>sign in</b></a></p>
</div>

</div>

</body>
</html>

<?php include"db.php"?>
<?php

 if(isset($_POST['login']))
 {
  $name=$_POST['name'];
   $_SESSION["user"] = $name;
  $psw=$_POST['psw'];
  $q="select * from user_information where name='$name' &&password='$psw';";
  $result=mysqli_query($connect,$q);
  $num=mysqli_num_rows($result);
  if($num==1)
   {
   $data=mysqli_fetch_array($result);
   $userEmail=$data["name"];
   $userId=$data['id'];
   $_SESSION["userId"] = $userId;
   //$_SESSION["favanimal"] = "cat";
   header('location:http://localhost/muhammad/view_all_posts.php');
   }
  else
    {
     
     header('location:http://localhost/muhammad/index.php');
  
     }
 }
?>




