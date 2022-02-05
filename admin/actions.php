<?php
 session_start();
ob_start();
?>


<html>
<head>
</head>
<body>

<?php
include"../db.php";

$name=$_SESSION["user"];

if(isset($_GET['shows']))
{
$id=$_GET['shows'];
$query_shows="UPDATE admin_post SET status=1 WHERE id='$id';";
$r3=mysqli_query($connect,$query_shows);
if($r3)
{
header('location:admin_home.php');
}
}

if(isset($_GET['hide']))
{
$id=$_GET['hide'];
$query_shows="UPDATE admin_post SET status=0 WHERE id='$id';";
$r4=mysqli_query($connect,$query_shows);
if($r4)
{
header('location:admin_home.php');
}
}

if(isset($_GET['delete_user']))
{
 $user_id=$_GET['delete_user'];
$delete_que="DELETE FROM user_information WHERE id='$user_id';";
$re=mysqli_query($connect,$delete_que);
if($re==true)
{
header('location:index.php');
}
}



if(isset($_GET['search1']))
{
 echo $search=$_GET['search'];
if($search)
{
 //header('location:../post_form.php');
}
}



if(isset($_GET['approve']))
{
$id=$_GET['approve'];
$query_approve="UPDATE post SET status='Approved' WHERE post_id='$id';";
$r1=mysqli_query($connect,$query_approve);
if($r1)
{
header('location:admin_home.php');
}
}


if(isset($_GET['unapprove']))
{
$idd=$_GET['unapprove'];
$query_unapprove="UPDATE post SET status='Unapproved' WHERE post_id='$idd';";
$r2=mysqli_query($connect,$query_unapprove);
if($r2)
{
header('location:admin_home.php');
}
}



if(isset($_GET['delete_post']))
{
$id=$_GET['delete_post'];

$q="DELETE  FROM post where post_id='$id';";
$r=mysqli_query($connect,$q);
if($r)
{
//echo 'hello';
header('location:admin_home.php');
}
}




if(isset($_GET['delete_COMMENT']))
{
$delete_COMMENT=$_GET['delete_COMMENT'];
$q1="DELETE  FROM comments where comment_id='$delete_COMMENT';";
$r1=mysqli_query($connect,$q1);
if($r1)
{
header('location:admin_home.php');
}
}?>

<?php
$date=date('d/m/y');
if(isset($_POST['submit']))
{
$head=$_POST['heading'];
$content=$_POST['post'];
$imgname=$_FILES['img1']['name'];
  $tempimgname=$_FILES['img1']['tmp_name'];
  
  move_uploaded_file($tempimgname,"../image/$imgname");
  
$sql1="INSERT INTO admin_post(`head`, `content`, `image`,status,date) VALUES('$head','$content','$imgname',1,now());";
if(mysqli_query($connect, $sql1))
    {
   echo"Records inserted successfully.";
   header('location:admin_home.php');
    } 
   else
     {
     echo 'not inserted';
   echo "ERROR: Could not able to execute $sql1. " . mysqli_error($connect);
    }
   

}
else
{
echo 'hello';
}
?>

<h1>delete page</h1>
<h1><?php //echo $head; ?></h1>
<h1><?php //echo $content; ?></h1>

</body>
</html>
