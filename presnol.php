<html>
<head><title></title>
</head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php include'bootstrap.php';?>


</head>
<?php session_start();
$post_id=$_SESSION["userId"];

$user=$_SESSION["user"];?>
<?php include"db.php";?>

<body>
<?php include 'header.php';?>
<?php //echo "<a  href='presnol.php?post_id={$post_id}'></a>";?>
<br/><hr/>




<?php 
$q="SELECT * FROM user_information WHERE id='$post_id';";
$user_query=mysqli_query($connect,$q);
$row=mysqli_fetch_assoc($user_query);
 $name=$row['name'];
 $mobile=$row['mobile'];
?>
<div class="container">
<div class="jumbotron">
<table class="table table-bordered">

<tbody>
<tr>
<th><b>NAME</b></th> <td><?php echo $name;?></td>
</tr>

<tr>
<th><b>MOBILE<b></th> <td><?php echo $mobile;?></td>
<td><?php echo "<a  href='presnol.php?edit=$post_id'>EDIT</a>";?><td>
</tr>
</tbody>

</table>


</div>


<?php 
if(isset($_GET['edit']))
{?>
<div class="jumbotron">
<form action='presnol.php'>
<div>
<label>NAME:</lable>
<textarea type='text' name='name'><?php echo $name;?></textarea><br/>
</div>
<div>
<label>MOBILE:</label>
<textarea type='text' name='number'><?php echo $mobile;?></textarea>

<button type='submit' name='save_edit'>SAVE</button>
</div>
</form>
</div>


<?php
}?>
<?php
if(isset($_GET['save_edit']))
{
$name=$_GET['name'];
$mobile=$_GET['number'];
$q3="UPDATE user_information SET name='$name' ,mobile='$mobile' WHERE id='$post_id';";
$r3=mysqli_query($connect,$q3);
if($r3)
{
echo"updated sucessfully";
}
else
{
echo" Not updated";
}
}
?>



<hr/>




<?php
if(isset($_GET['post_id']))
{
 $post_id=$_GET['post_id'];
$query="SELECT * FROM post WHERE user_id='$post_id';";
$post_post=mysqli_query($connect,$query);
$row=mysqli_num_rows($post_post);


if($row==0)
{
 echo'<h1 style="color:red;text-align:center;"><br/><marquee>POST NOT FOUND</marquee>'.$user.'<br></marquee></h1>';

}
else
{?>
<h2 style="color:green;"> <?php echo"you posted " .$row." post";?></h2>

<h1>Welcome-<b style="color:blue;"><?php echo $user;?></b></h1>

<?php 
while($row=mysqli_fetch_assoc($post_post))
{
$author=$row['author'];
$image=$row['image'];
$post=$row['post'];
?>
<div class="jumbotron">
<h1><?php echo $author;?><br></h1>
<h2><?php echo $post;?><br></h2>
<p><?php echo "<img src='image/$image' class='img-responsive' >";?></p>
<?php echo "<a  href='presnol.php?delete={$image}'>delete</a>"?></div><hr/>

<?php }?>

<?php }?>
<?php }?>

<?php
if(isset($_GET['delete']))
{
$image=$_GET['delete'];
$q="DELETE FROM post WHERE image='{$image}';";
$delete=mysqli_query($connect,$q);

 if($delete)
  {
   echo "deleted successfully";
// header('location:presnol.php');
  }
  else
   {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
   }
}
?>
</div>
</body></html>
