

<!--Code for Forgot Password-->
 <?php

include("connect.php");

if(isset($_POST["send"]))
{
$un=$_POST["email"];
$sql= "select email,password from reg where email='".$un."'";
$rs=mysqli_query($con,$sql);
$row2=mysqli_fetch_assoc($rs);
if($row2>0)
{
$email = $row2['email'];
$subject = "Information about your password";
$password=$row2['password'];
$message = "Your password is ".$password;

// send mail
   
   ini_set("SMTP","localhost");
   ini_set("smtp_port","8080");
   ini_set("sendmail_from","jayasharma290698@gmail.com");
   ini_set("sendmail_path", "C:\ xamppp\sendmail.exe");


mail($email, $subject, $message, "From: $email");
echo  "<script>alert('Your Password has been sent Successfully');</script>";
}
else
{
echo "<script>alert('Email not register with us');</script>";   
}
}
?> 

<!-- code for registration-->
<?php 
$f=1;
$reg=2;
include("connect.php");
if(isset($_POST["btn"]))
{
  $email=$_POST["email"];
  $pass=$_POST["password"];
  $confpass=$_POST["confpassword"];
  $name=$_POST["name"];
  $contact=$_POST["contact"];
  if ($pass==$confpass)
  {
    $sql="insert into reg values('".$email."','".$pass."','".$name."','".$contact."')";
    $n=mysqli_query($con,$sql);
    if($n!=0)
    {
      $reg=1;
    }
    else
    {
      $reg=0;
    }
  } 

  else
  {
    $f=0;
  }
}
?>

<!-- code for login-->
<?php
$f=2;
$reg=2;


if(isset($_POST["btn"]))
{

$un=$_POST["email"];
$password=$_POST["password"];
include("connect.php");

$sql="select * from reg where email='".$un."'";

$rs=mysqli_query($con,$sql);
while($value=mysqli_fetch_assoc($rs))
{

if($value["password"]==$password)
{  
  
  if(isset($_POST['remember']))
  {
  setcookie('email' , $_POST["email"], time()+60*60*7);
  setcookie('password' , $_POST["password"], time()+60*60*7);
  }

  session_start();
  $_SESSION["umail"]=$_POST["email"];
  header("location:comment.php");
  $f=1;

  if(isset($_COOKIE['email']) and isset($_COOOKIE['password']))
  {
       $un = $_COOOKIE['email'];
       $password = $_COOKIE['password'];
  }
  

}
else
$f=0;
}
}
?>



<!DOCTYPE html>
<html>
<head>
<title>Show & Hide Form - Demo Preview</title>
<link href="css/showhide.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="js/showhide.js"></script>
<script>
$(document).ready(function() {

$("#login").click(function() {
var email = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/i);
if ($("#loginemail").val() == '')
{alert("Please enter email!!!");
}
if(
$("#loginpassword").val() == '') {
alert("Please enter password!!!");
} else if (!($("#loginemail").val()).match(email)) {
alert("Please enter valid Email...!!!!!!");
} else {
alert("You have successfully Logged in...!!!!!!");
$("form")[0].reset();
}
});

$("#register").click(function() {
var email = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/i);
if ($("#name").val() == '' || $("#registeremail").val() == '' || $("#registerpassword").val() == '' || $("#contact").val() == '') {
alert("Please fill all fields...!!!!!!");
} else if (


!($("#registeremail").val()).match(email)) {
alert("Please enter valid Email...!!!!!!");
} else {
alert("You have successfully Sign Up, Now you can login...!!!!!!");
$("#form")[0].reset();
$("#second").slideUp("slow", function() {
$("#first").slideDown("slow");
});
}
});


$("#renter").click(function() {
var x=document.getElementById("loginpassword1").value;
var y=document.getElementById("loginpassword2").value;
if ($("#loginemail").val() == '' || $("#loginpassword1").val() == '' || $("#loginpassword2").val() == '') {
alert("Please fill all fields...!!!!!!");
}
else if(x!=y)
{
alert("Password Not Matched");
}
else{
alert("Your Password has been changed.....You are Re-directed to login page");
$("#third").slideUp("slow",function(){
$("#first").slideDown("slow")
});
}
});


$("#signup").click(function() {
$("#first").slideUp("slow", function() {
$("#second").slideDown("slow");
});

});

$("#signin").click(function() {
$("#second").slideUp("slow", function() {
$("#first").slideDown("slow");
});
});

$("#one").click(function() {
$("#first").slideUp("slow",function() {
$("#third").slideDown("slow");
});
});
});
</script>

<style>
body{
margin:0;
padding:0;
font-family:sans-serif;
background:url(image/back.jpg);
background-size: cover;

}
.first1{
position:absolute;
  top:0%;
  left:50%;
  transform:translate(-50%,50%);
  width:400px;
  padding:40px;
  background:rgba(0,0,0,.5);
  box-sizing:border-box;
  box-shadow:0 15px 25px rgba(0,0,0,.5);
  border-radius:10px;
  margin-top: -70px;
  }
  #one a{
  
  color:#fff;
  }
  #two a{
  
  color:#fff;
  }
  .first1 .inputbox{
  position:relative;
  }
  .first1 .inputbox input{
 width: 100%;
 padding: 10px 0;
 letter-spacing: 1px;
 font-size: 16px;
 color: #fff;
 margin-bottom: 30px;
 border: none;
 border-bottom: 1px solid #fff;
 outline: none;
 background: transparent;
 }
 
 .first1 .inputbox label{
 position: absolute;
 top: 0;
 left: 0;
 padding: 10px 0;
 letter-spacing: 1px;
 font-size: 16px;
 color: #fff;
 pointer-events: none;
 transition: .5s;
 }
 
.first1 .inputbox input:focus ~ label
{
 top: -18px;
 left: 0;
 color: #03a9f4;
 font-size: 12px;
 }
.first1 .inputbox input:valid ~ label
{
 top: -18px;
 left: 0;
 color: #03a9f4;
 font-size: 12px;
 }
 .first1 h3{
  margin:0 0 30px;
  padding:0;
  color:#fff;
  text-align:center;
  }
 
.second1{
 display: none;
position:absolute;
  top:0px;
  left:50%;
  transform:translate(-50%,25%);
  width:400px;
  padding:40px;
  background:rgba(0,0,0,.5);
  box-sizing:border-box;
  box-shadow:0 15px 25px rgba(0,0,0,.5);
  border-radius:10px;
  margin-top: -70px;
  }
  .second1 .inputbox1{
  position: relative;
  }
  .second1 .inputbox1 input{
 width:100%;
 padding:10px 0;
 letter-spacing:1px;
 font-size:16px;
 color:#fff;
 margin-bottom:30px;
 border: none;
 border-bottom:1px solid #fff;
 outline:none;
 background:transparent;
 }
 
 .second1 .inputbox1 label{
 position:absolute;
 top:0;
 left:0;
 padding:10px 0;
 letter-spacing:1px;
 font-size:16px;
 color:#fff;
 pointer-events: none;
 transition: .5s;
 }
 
 .second1 .inputbox1 input:focus ~ label
 {
 top: -18px;
 left: 0;
 color: #03a9f4;
 font-size: 12px;
 }
 .second1 .inputbox1 input:valid ~ label
 {
 top: -18px;
 left: 0;
 color: #03a9f4;
 font-size: 12px;
 }
.first1 input[type="button"]
 {
 background:transparent;
 border:none;
 outline:none;
 color:#fff;
 background:#03a9f4;
 padding:10px 20px;
 cursor:pointer;
 border-radius:5px;
 }
 
 .second1 input[type="button"]
 {
 background:transparent;
 border:none;
 outline:none;
 color:#fff;
 background:#03a9f4;
 padding:10px 20px;
 cursor:pointer;
 border-radius:5px;
 }
 .second1 h3{
  margin:0 0 30px;
  padding:0;
  color:#fff;
  text-align:center;
  }
 
 
 .third1{
 display: none;
position:absolute;
  top:0%;
  left:50%;
  transform:translate(-50%,50%);
  width:400px;
  padding:40px;
  background:rgba(0,0,0,.5);
  box-sizing:border-box;
  box-shadow:0 15px 25px rgba(0,0,0,.5);
  border-radius:10px;
  margin-top: 50px;
  }
  .third1 .inputbox2{
  position:relative;
  }
  .third1 .inputbox2 input{
 width: 100%;
 padding: 10px 0;
 letter-spacing: 1px;
 font-size: 16px;
 color: #fff;
 margin-bottom: 30px;
 border: none;
 border-bottom: 1px solid #fff;
 outline: none;
 background: transparent;
 }
 
 .third1 .inputbox2 label{
 position: absolute;
 top: 0;
 left: 0;
 padding: 10px 0;
 letter-spacing: 1px;
 font-size: 16px;
 color: #fff;
 pointer-events: none;
 transition: .5s;
 }
 
.third1 .inputbox2 input:focus ~ label
{
 top: -18px;
 left: 0;
 color: #03a9f4;
 font-size: 12px;
 }
.third1 .inputbox2 input:valid ~ label
{
 top: -18px;
 left: 0;
 color: #03a9f4;
 font-size: 12px;
 }
 .third1 input[type="button"]
 {
 background:transparent;
 border:none;
 outline:none;
 color:#fff;
 background:#03a9f4;
 padding:10px 20px;
 cursor:pointer;
 border-radius:5px;
 }
 .third1 h3{
  margin:0 0 30px;
  padding:0;
  color:#fff;
  text-align:center;
  }
 
 .but1 {
  position: relative;
  background-color: #03a9f4;
  border: none;
  font-size: 14px;
  color: #FFFFFF;
  padding: 12px;
  width: 100px;
  text-align: center;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  text-decoration: none;
  overflow: hidden;
  border-radius: 10px;
  cursor: pointer;
}

.but1:after {
  content: "";
  background: #f1f1f1;
  display: block;
  position: absolute;
  padding-top: 300%;
  padding-left: 350%;
  margin-left: -20px !important;
  margin-top: -120%;
  opacity: 5;
  transition: all 0.8s
}

.but1:active:after {
  padding: 0;
  margin: 0;
  opacity: 4;
  transition: 0s
}

.cont{
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 30px;
  

}

</style>
</head>
<body>

<!-- Create Div First For Login Form -->
<div id="first" class="first1">
<form action="<?php $_PHP_SELF ?>" method="post" id="form1">
<h3>Login</h3>
<div class="inputbox">
<input id="loginemail" name="email" type="text" required value="<?php if(isset($_COOKIE['email'])) {echo $_COOKIE['email'];}?>">
<label>Email</label>
</div>
<div class="inputbox">
<input id="loginpassword" name="password" type="password" required value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; }?>">
<label>Password</label></div>
<div class="inputbox">
<input type="checkbox" name="remember" class="cont"  value="<?php if(isset($_COOKIE['email']))  ?>" >
<label>Remember Me</label>
</div>
<input type="submit" name="btn" value="SIGN IN" class="but1">
<?php
if($f==0)
{
  echo "<font color='red'> Password & ID doesnot match</font>";
}
?>
<p id="one"><a href="#" >Forgot Password ?</a></p> <p id="two"> Don't have account? &nbsp&nbsp<a class="signup" href="#" id="signup">Sign up here</a></p>
</form>
</div>

<div id="second" class="second1">
<form action="<?php $_PHP_SELF ?>" id="form2" method="post" name="form">
<h3>Create a Free Account</h3>
<div class="inputbox1">
<input id="name" type="text" name="name" required="">
<label>Full Name</label>
</div>
<div class="inputbox1">
<input id="registeremail" name="email" type="text" required>
<label>Email</label>
</div>
<div class="inputbox1">
<input id="registerpassword" name="password" type="password" required>
<label>Password</label>
</div>
<div class="inputbox1">
<input id="registerpassword" name="confpassword" type="password" required>
<label>Confirm Password</label>
</div>
<div class="inputbox1">
<input id="contact" type="number" name="contact" required>
<label>Contact</label>
</div>

<p id="two">Already have an account? <a class="signin" href="#" id="signin">Sign in</a></p>
<?php
if($f==0)
{
  echo "<font color='red'> Password & Confirm doesnot match</font>";
}
?>
<br>
<input type="submit" name="btn" value="Sign up" class="but1">
<?php
if($reg==1)
{
  echo "<font color='Green'> Registered Successfully</font>";
}
?>
</form>
</div>



<div id="third" class="third1">
<form action="" method="post" id="form1">
<h3>Forget Password</h3>
<div class="inputbox2">
<input id="loginemail1" name="email" type="text" required>
<label>Email</label>
</div>

<input type="submit" name="send" value="send"  class="but1">
<p id="two"><a class="signin" href="login.php" id="signin">Sign in</a></p>

</form>
</div>



</body>
</html>


