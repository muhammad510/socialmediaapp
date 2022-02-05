<?php
 session_start();
ob_start();
?>


<?php
include"db.php";
$post_id=$_SESSION["userId"];
$user=$_SESSION["user"];
$post_iid=$_SESSION["post_iid"];
$date=date('d-m-y');

?>





<?php
 if(isset($_GET['comments']))
    {
     $comment=$_GET['user_comment'];
      //$post_iid=$_GET['post_iid'];
       echo "hello isreal=  ";
       
       $query="INSERT INTO comments(comment_post_id,`comment_author`,`comment_content`,comment_date)                   VALUES('$post_iid','$user','$comment',now());";
         
       $result=mysqli_query($connect, $query);
 
       if($result)
       {
        echo"comment insertd";
      header('location:view_all_posts.php');
        }
        else
         {
        echo "ERROR: Could not able to execute $query. " . mysqli_error($connect);
        //header('location:view_all_posts.php');
         }
   }
    
    
    
    
    
    
    ?>
