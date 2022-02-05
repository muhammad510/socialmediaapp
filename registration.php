<html><head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"-->
<?php include"bootstrap.php"?>
</head>
<body>
<div class="container ">
<div class="jumbotron">
<form action='reg_connect.php' method="post">
  
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    
<div class="form-group">
    <label for="name"><b>Name</b></label><br>
    <input class="col-xs-4" type="text" id='name' placeholder="Enter name" name="user_name" required><br>
 </div>
 <div class="form-group">
     <label for="mobile"><b>Mobile Number</b></label><br>
    <input class="col-xs-4" type="text/number" id="mobile" placeholder="Mobile Number" name="mobil" required><br>
</div>
<div class="form-group">
    <label for="psw"><b>Password</b></label><br>
    <input  class="col-xs-4" type="password" id="psw" placeholder="Enter Password" name="psw" required>
</div>

    <button type="submit" class="registerbtn"  value='submit' name="submit">Register</button>
  
</form>
</div>
<p>are you alredy registerd ?<a href="index.php"><b>login</b></a></p></div>
</div>
</body>
</html>
