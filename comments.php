<?php
 session_start();
ob_start();
?>


<?php
include"db.php";
$post_id=$_SESSION["userId"];
$user=$_SESSION["user"];
$date=date('d-m-y');

?>

<html>

<head>
<title></title>
</head>

<?php

if(isset($_GET['post_iid']))
{
  $post_iid=$_GET['post_iid'];
    echo "post Id=".$post_iid;
$_SESSION['post_iid']=$post_iid;
}   
?>

<?php
$post_iid=$_SESSION['post_iid'];
$q="SELECT image from post where post_id='$post_iid';";

$re=mysqli_query($connect,$q);
while($row=mysqli_fetch_assoc($re))
{
$image=$row['image'];

}




$q1="SELECT * from comments where comment_post_id='$post_iid';";
$res=mysqli_query($connect,$q1);
?>
<body>
<p><?php echo "<img  src='image/$image''width=500 height=600' >";?></p>

<?php
while($row1=mysqli_fetch_assoc($res))
{
$comment_author=$row1['comment_author'];
$comment_content=$row1['comment_content'];
$comment_date=$row1['comment_date'];

?>







<h3><?php echo"<a  href='individual.php?author={$comment_author}'>$comment_author</a>";?><br></h3>
<h5><?php echo $comment_content;?><br></h5>
<?php } ?>

<div>
<form action="upload_comment.php" method="get" >
<div class="container">
<lable for="">write comment:<?php echo $user;?></label><br/>
<textarea name="user_comment" placeholder="Write here..." required></textarea>
 <button type="submit" class="registerbtn" name="comments">submit</button>
</div>


</form>
</div>

<?php

if(isset($_GET['post_iid']))
{
  $post_iid=$_GET['post_iid'];
    echo "post Id=".$post_iid;
$_SESSION['post_iid']=$post_iid;
}   
     
?>
<?php // echo "postId=".$post_iid;?>




</body>

</html>
