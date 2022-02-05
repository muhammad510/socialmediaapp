<html>
</head><title></title>
<?php include'../bootstrap.php'?>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<h1>HELLO </h1>
<div class='container'>
<div class='jumbotron'>
<form action="actions.php " method="post" enctype="multipart/form-data">


<div>
<label for='HEAD'>WRITE POST HEADING:</label></br>
<input id='HEAD' type='text' placeholder='write heading'  name='heading' required/>
</div>

<div>
<label for=""><b>insert image</b></label><br/>
   <input type="file" name="img1"/>
   <?php //echo "<img src='img1'/>"?>
 </div>
 
<div>
<label for='contenet'>WRITE POST CONTENT:</label></br>
<textarea type='text' placeholder='write here' name='post' id='contenet'  rows='10' cols='70' required></textarea>

<button type="submit" class="loginbtn"  value='login' name="submit">submit</button>
</div>


</form>
</div>
</body>
</html>
