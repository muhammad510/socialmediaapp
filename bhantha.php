<html>
<head><title>Home</title>
</head>
</head>
<body>
<?php include'db.php';
include'bootstrap.php';
?>


<h1>BHANTHA<h1>
<?php
$query="SELECT * FROM admin_post WHERE status=1 ORDER BY id DESC;";
$post_post=mysqli_query($connect,$query);
while($row=mysqli_fetch_assoc($post_post))
{

$head=$row['head'];
$content=$row['content'];
$image=$row['image'];
$date=$row['date'];
//$post_id=$row['post_id'];
?>
<div style="background:;" class="container">
<div class="jumbotron"style="background:;" >
<?php // echo"no of post found".$count; ?>
<h3><?php echo $head;?>/<small><?php echo $date;?></small></h3>
<p><i><?php echo $content;?></i><br/></p>
<p><?php if($image) {echo "<img  class='img-responsive' src='image/$image'  text-align='center' >";} ?></p><br/>
</div></div>
<?php } ?>

</body>
</html>
