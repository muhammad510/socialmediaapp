<?php
 session_start();
ob_start();
?>
<?php include"../db.php";

$name=$_SESSION["user"];


?>




<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>admin page</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<?php include'../bootstrap.php';?>
<style> 
table{
  table-layout: auto;
  width: 50%;  
} 
table {
  border-collapse: collapse;
  border: 1px solid black;
} 

th,td {
  border: 1px solid black;
}

    
}  
</style> 


<?php include'../bootstrap.php';?>
</head>





<body>
<?php $name=$_SESSION["user"];?>
<a href='logout.php'>logout</a>
<div class='container'>
<div class='jumbotron'>
<h3>ADD WHAT YOU WANT TO ADD<a href='addcontent.php'>click here</a></h3>
<h1>Your Post</h1>
<table>
 <thead>
 <tr><th>HEADING</th><th>IMAGE</th><th>CONTENT</th><th>STATUS</th><th>show</th><th>hide</th><th>Date</th></tr>
 </thead>
 <?php
$query="SELECT * FROM admin_post;";
$post_post=mysqli_query($connect,$query);
while($row=mysqli_fetch_assoc($post_post))
{
$id=$row['id'];
$head=$row['head'];
$content=$row['content'];
$image=$row['image'];
$status=$row['status'];
$date=$row['date'];
//$post_id=$row['post_id'];
?>
 <tbody>
 <tr>
    <td><?php echo $head;?></td> 
    <td><?php echo $content;?></td>
    <td><?php echo "<img  src='../image/$image' width='300' height='150'>";?></td> 
    <td><?php echo $status;?></td>
    <td><?php echo"<a href='actions.php?shows={$id}'>SHOW</a>";?></td>
    <td><?php echo"<a href='actions.php?hide={$id}'>HIDE</a>";?></td>
     <td><?php echo $date;?></td>
 </tr>
 <?php } ?>
 </tbody>
</table>

<h1>user information</h1>

<form class="example" action="actions.php" method="get">
                <input type="text" placeholder="Search....." name="search">
                <button type="submit" class="btn btn-default btn-sm"  value="search1" name="search1">
                <span class="glyphicon glyphicon-search"></span>Search</button>
</form>



<div class="table-responsive">
 <input class="form-control" id="myInput" type="text" placeholder="Search..">
<table class="table table-striped table-bordered table-hover table-condensed">
<thead>
<tr>
<th>user ID</th><th>USER NAME</th><th>PASSWORD</th><th>MOBILE</th><th>
  </th>
</tr>
</thead>


<?php
$query_user="SELECT * FROM user_information;";
$r=mysqli_query($connect,$query_user);?>
<?php
while($row=mysqli_fetch_assoc($r))
{
$user_id=$row['id'];
$user_name=$row['name'];
$mobile=$row['mobile'];
$user_password=$row['password'];
?>
<tbody id="myTable">
<tr>
<td><?php echo $user_id;?></td>
<td><?php echo $user_name;?></td>
<td><?php echo $user_password;?></td>
<td><?php echo $mobile;?></td>
<td><?php echo"<a href='actions.php?delete_user={$user_id}'>Delete</a>";?></td>
</tr>
<?php }?>
</table>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</div>

</div>
<div class='jumbotron'>
<h1>user post</h1>


<div class="table-responsive">
<table class="table">
<table>
<thead>
<tr>
<th>POST ID</th> <th>user ID</th> <th>AUTHOR</th> <th>IMAGE</th> <th>POST</th> <th>LIKE</th><th>STATUS</th><th>APPROVE</th><th>UNAPPROVE</th>
</tr>
</thead>


<?php
$query_post="SELECT * FROM post;";
$r1=mysqli_query($connect,$query_post);?>
<?php
while($row1=mysqli_fetch_assoc($r1))
{
$post_id=$row1['post_id'];
$user_id=$row1['user_id'];
$post_author=$row1['author'];
$post_image=$row1['image'];
$post=$row1['post'];
$status=$row1['status'];
//$post_date=$row['date'];
$post_like=$row1['likee'];
?>


<tbody>
<tr>
<td><?php echo $post_id;?></td>
<td><?php echo $user_id;?></td>
<td><?php echo $post_author;?></td>
<td><?php echo "<img  src='../image/$post_image' width='300' height='150'>";?></td>
<td><?php echo $post;?></td>

<td><?php echo $post_like;?></td>
<td><?php echo $status;?></td>
<td><?php echo"<a href='actions.php?approve={$post_id}'>Approve</a>";?></td>
<td><?php echo"<a href='actions.php?unapprove={$post_id}'>Unapprove</a>";?></td>
<td><?php echo"<a href='actions.php?delete_post={$post_id}'>Delete</a>";?></td>
</tr>
<?php }?>
</tbody>

</table>
</div>





<div class='jumbotron'>
<h1>user comment</h1>

<div class="table-responsive">
 <table class="table table-striped table-bordered table-hover table-condensed">
<thead>
<tr>
<th>COMMENT ID</th> <th>POST ID</th> <th>COMMENT AUTHOR</th> <th>COMMENT CONTENT</th>
</tr>
</thead>


<?php
$query_comment="SELECT * FROM comments;";
$r2=mysqli_query($connect,$query_comment);?>
<?php
while($row2=mysqli_fetch_assoc($r2))
{
$comment_id=$row2['comment_id'];
$comment_post_id=$row2['comment_post_id'];
$comment_author=$row2['comment_author'];
$comment_content=$row2['comment_content'];

//$post_date=$row['date'];
//$post_like=$row1['likee'];
?>


<tbody>
<tr>
<td><?php echo $comment_id;?></td>
<td><?php echo $comment_post_id;?></td>
<td><?php echo $comment_author;?></td>
<td><?php echo $comment_content;?></td>
<td><?php echo"<a href='actions.php?delete_COMMENT={$comment_id}'>Delete</a>";?></td>
</tr>
<?php }?>
</tbody>

</table>

</div>
</div>
</div>
</body>



</html>
