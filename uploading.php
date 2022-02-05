<?php
 session_start();
ob_start();
?>
<?php
include"db.php";
$post_id=$_SESSION["userId"];
$user=$_SESSION["user"];
//echo $post_id;
$date=date('d-m-y');
if(isset($_POST['submit']))
{
   //$author=$_POST['author'];
   $comment=$_POST['comment'];
   $imgname=$_FILES['img1']['name'];
  $tempimgname=$_FILES['img1']['tmp_name'];
  
  move_uploaded_file($tempimgname,"image/$imgname");
  
  $sql="INSERT INTO `post`(user_id,`author`, `image`, `post`,date,likee,status) VALUES('$post_id','$user','$imgname','$comment',now(),0,'Approved');";
 
  if(mysqli_query($connect, $sql))
    {
   echo"Records inserted successfully.";
   header('location:view_all_posts.php');
    } 
   else
     {
   // echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
    }
}
?>
<html>

<head>
<title></title>
</head>
<body>
<? //php include 'header.php'?>
<?php //echo "<a  href='presnol.php?post_id={$post_id}'>$user</a>";?>
<?php /*
$query="SELECT *FROM post lIMIT 0,1;";
$post_post=mysqli_query($connect,$query);
while($row=mysqli_fetch_assoc($post_post))
{
$author=$row['author'];
$like=$row['likee'];
$image=$row['image'];
$post=$row['post'];
?>
<hr/>
<h1><?php echo"<a  href='individual.php?author={$author}'>$author</a>";?><br></h1>
<h3><i><?php echo $post;?></i><br/></h3>
<p><?php echo "<img  src='image/$image''width=500 height=600' >";?></p>
<?php echo "<a  href='uploading.php?like={$image}'>LIKE</a>";?>
<h><?php echo $like;?><br></h>
<?php echo "<a  href='uploading.php?dislike={$image}'>dislike</a>";?><hr/>
<?php } */?>>
<?php
if(isset($_GET['like']))
{
$post_image=$_GET['like'];
$query="SELECT *FROM post WHERE image='$post_image';";
$post_post=mysqli_query($connect,$query);
while($row=mysqli_fetch_assoc($post_post))
{
$like=$row['likee'];





//echo $like;

$like=$like+1;
//echo $like;
$query="UPDATE `post` SET `likee`='{$like}' WHERE image='$post_image';";
$post_pot=mysqli_query($connect,$query);
header('location:view_all_posts.php');
}}?>
</body>
</html>
