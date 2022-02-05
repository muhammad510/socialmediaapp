<html><?php
 session_start();
ob_start();
?>



<?php include"db.php";
$user=$_SESSION['user'];
?>



<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<?php include'bootstrap.php';?>
<title></title></head>
<body>
<?php include 'header.php';?>
<?php //echo "<a  href='presnol.php'>$user</a>";?>
<br/><hr/>


<?php
if(isset($_GET['author']))
{
 $author=$_GET['author'];
$query="SELECT * FROM post WHERE Status='Approved' AND  author='$author';";
$post_post=mysqli_query($connect,$query);
$post_number=mysqli_num_rows($post_post);
?>
<?php 

$query1="SELECT * FROM user_information WHERE name='$author';";
$post_post1=mysqli_query($connect,$query1);
$row1=mysqli_fetch_array($post_post1);
$mobile=$row1['mobile'];
?>


<h2 style="color:green;"> <?php echo $author."<br/>mobile Number:".$mobile." <br/>posted ".$post_number." post";?></h2>


<?php
while($row=mysqli_fetch_assoc($post_post))
{
$author=$row['author'];
$image=$row['image'];
$post=$row['post'];
$like=$row['likee'];
?>
<div class='container'>
<div class='jumbotron'>
<h1><?php echo $author;?><br></h1>
<h3><?php echo $post;?><br></h3>
<p><?php echo "<img src='image/$image' class='img-responsive' >";?></p>
<?php echo "<a  href='uploading.php?like={$image}'>LIKE</a>";?>
<h><?php echo $like;?><br></h>
</div>
</div>
<?php //echo "<a  href='presnol.php?delete={$image}'>delete</a>"?><hr/>
<?php }?>


<?php }?>
</body>
</html>
