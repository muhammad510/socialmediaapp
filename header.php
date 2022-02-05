<?php //session_start();
$post_id=$_SESSION["userId"];
$user=$_SESSION["user"];?>
<?//php include"db.php";?>
<?php include"bootstrap.php"?>
<nav class="navbar navbar-inverse  nav-justified" role="tablist">
  <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="bhantha.php">BHANTHA</a>
    </div>
     <ul class="nav navbar-nav">

<?php //echo"<a  href='presnol.php'><b>$user</b></a>";?>


 <li>  <a href="view_all_posts.php" title="post"><b>POST</b></a></li>
 
 
 

<li><a href="post_form.php" title="post_form"></b>ADD NEW POST</b></a></li>

</ul>
 <ul class="nav navbar-nav navbar-right">
<li> <?php echo "<a class='btn-lg' href='presnol.php?post_id={$post_id}'><span class='glyphicon glyphicon-user'></span>$user</a>";?></li>
<li><a  class="btn-lg"href="logout.php" title="logout" style="color:red;text-size:5px"> <span class="glyphicon glyphicon-off"></span></p></a><br/></li>

</ul>
</div>

</nav>
