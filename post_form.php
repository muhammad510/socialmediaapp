<?php session_start();
ob_start();
?>
<html><head>


 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<?php include'bootstrap.php';?>
</head>
<body>
<?php include 'header.php';?>
<?php $user=$_SESSION["user"];
//echo $user;
?>
<div class='container'>
<div class='jumbotron'>
<form action="uploading.php " method="post" enctype="multipart/form-data">

  <div class="container">
    <h1>Enter your data</h1>    
    <label for=""><b>insert image</b></label>
   <input type="file" name="img1" required/>
   </div>
   
<br/><br/>
<div class="container">
  <label for=""><b>write somethig about image</b></label><br/><br/>
    
    <textarea name='comment' cols="100" rows="10"placeholder="Write here..."></textarea>
    <button type="submit" class="registerbtn"  value='submit' name="submit">submit</button>
  </div>
</form>
</div>
</body>
</html>



