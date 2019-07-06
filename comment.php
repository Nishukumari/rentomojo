<?php
session_start();
$r =0;
if(isset($_SESSION["umail"]))
{
  $r =1;
}
else
header("location:login.php");
?>
<!DOCTYPE html>
<html>
<head>
	<link href="css/showhide.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style>
	#comm{
		border-radius : 15px;
	}
	#btn{
		margin-left:400px;
	}
</style>
</head>
<body>
	<center>
		<div style="margin-left: 20px;"> <?php echo "<font color='red' style='margin-top: 60px; '><b>WELCOME!! </b> </font>".$_SESSION["umail"].   "<font color='red' style='margin-top: 20px;'><b>  </b></font>"; ?></div>
		<div><button type="submit" class="btn btn-danger" name="logout"><a href="logout.php" style="text-decoration: none;">Logout</a></button>
<form method="POST" action="<?php $_PHP_SELF ?>">
<textarea  rows="4" cols="80" name="comment" placeholder="Type comment here" id="comm" style="background-color:#eee;margin-top:30px;"></textarea><br>
<button type="submit" name="btn" id="btn" class="btn btn-primary">Post Comment</button></form>

<?php


include("connect.php");
if(isset($_POST["btn"])){

	
  $c=$_POST["comment"];
	if($c){
	$sql="insert into comment1 values('".$c."')";
		mysqli_query($con,$sql);}
		
		$sql1="select * from comment1";
		$rs=mysqli_query($con,$sql1);
   echo '<ul style="list-style-type:none;">';
		while($value=mysqli_fetch_assoc($rs))
           {
           	echo '<li>'.$value['comment'].'</li>';
           	
           }
         echo '</ul>';
          
	

}
mysqli_close($con);
?>



</div>
</center>
</body>
</html>
