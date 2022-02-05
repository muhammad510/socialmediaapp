<?php
 session_start();
ob_start();
?>


<?php
include"db.php";
$post_id=$_SESSION["userId"];
$user=$_SESSION["user"];?>

<html>
 <head>
 
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>post</title>
    
 </head>
 <body>
<?php //include"db.php"?>
<?php 
$q="select * from post WHERE Status='Approved';";
$result=mysqli_query($connect,$q);
$count=mysqli_num_rows($result);

$count1=ceil($count/5);
//echo"no of post found".$count1;
?>
<?php include 'header.php'?>
<?php // echo "<a  href='presnol.php?post_id={$post_id}'>$user</a>"; ?>

<?php
if(isset($_GET['page']))
{
$page=$_GET['page'];
}
else
{
$page="";
}
if($page==""||$page==1)
{
$page_1=0;
}
else
{
$page_1=(5*$page)-5;
}


?>



<?php
$query="SELECT * FROM post WHERE Status='Approved' ORDER BY post_id DESC lIMIT $page_1,5 ;";
$post_post=mysqli_query($connect,$query);
while($row=mysqli_fetch_assoc($post_post))
{
$author=$row['author'];
$like=$row['likee'];
$image=$row['image'];
$post=$row['post'];
$post_id=$row['post_id'];
?>




<div style="background:;" class="container">
<div class="jumbotron"style="background:black;" >
<?php // echo"no of post found".$count; ?>
<h3><?php echo"<a  href='individual.php?author={$author}'>$author</a>";?></h3>

<p><i><?php echo $post;?></i><br/></p>
<p><?php echo "<img  class='img-responsive' src='image/$image'  text-align='center' >";?></p><br/>
<h4><?php echo "<a  href='uploading.php?like={$image}'>Like</a>";
 echo" ".$like." ";


echo "<a  href='comments.php?post_iid={$post_id}'>Comments</a>"
?></h4>

<!-- COMMENTS-->
<?php
$q1="SELECT * from comments where comment_post_id='$post_id' ORDER BY  comment_id DESC LIMIT 2;";
$res=mysqli_query($connect,$q1);

while($row1=mysqli_fetch_assoc($res))
{
$comment_author=$row1['comment_author'];
$comment_content=$row1['comment_content'];
$comment_date=$row1['comment_date'];
?>
<div class='container'>
<div class='container'>
<h4><?php echo"<a  href='individual.php?author={$comment_author}'>$comment_author</a>";?><br></h3>
<h5><?php echo $comment_content;?><br></h5></div></div>
<?php } ?>


<?php // echo "<a  href='uploading.php?dislike={$image}'>dislike</a>"; ?>

<?php //echo "<a  href='comments.php?post_iid={$post_id}'>Comments</a>";?>


</div>
</div>

<?php }?>
<?php
if($count==0)
{
echo "<h1 style=color:red;text-align:center;><br/>NO POST FOUND YET</h1>";
}
/*if(isset($_GET['like']))
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
header('location:uploading.php');
}}*/




?>
<ul class="pager" style="text-align:center;text-color:red">


<?php for($i=1;$i<=$count1;$i++) 
{?>
<span class="badge badge-light"><?php echo "<a href='view_all_posts.php?page={$i}'> {$i} </a>"." "; ?></span>
         
<?php }
  ?> 
</ul>





 </body>
</html>
