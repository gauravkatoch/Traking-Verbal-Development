<?php 
session_start();
function resetpass()
{
	$set=<<<EOD
	<p>Enter your email address below and your password will be e-mailed to you.</p> 
<form action="forgot_password.php" method="post">
	<fieldset>
	<p><b>Email Address:</b> <input type="text" name="email" size="20" maxlength="40" value="" /></p>
	</fieldset>
	<div align="center"><input type="submit" name="submit" value="Reset My Password" /></div>
	<input type="hidden" name="submitted" value="TRUE" />
</form>

EOD;
echo $set;
}
if(isset($_POST['submit']))
{
	include"mysql_connect.php";
	$query = "SELECT * FROM users WHERE ".
 "email='".$_POST['email']."'";
 $result = mysql_query($query, $link) or die("Email not yet registered");
 if (mysql_num_rows($result) == 1)
 {
 $row=mysql_fetch_assoc($result);
 $mailto=$_POST['email'];
 $sub="Your Password for IITRPR.co.cc";
 
 $body="Dear '".$row['first_name']."' '".$row['last_name']."' your password is : '".$row['pass']."'";
 mail($mailto,$sub,$body,"From: gauravkatoch007@gmail.com"); 
 $message="Your password has been sent to your email. Please Check your email";
}
else
{
	session_destroy();
	$message=<<<EOD
	<p>"This email id is not yet registered"</p>
	<a href="Register.php" title="Click here to register">Register Now</a>
EOD;

}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-AU">

<head>


  <title>Forgot Password</title>

  <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
  <meta name="author" content="fullahead.org" />
  <meta name="keywords" content="Ebooks, E-books, Online Library, IIT RPR, IIT ROPAR, IIT, IIT Punjab" />
  <meta name="description" content="Online Library of IIT Ropar, designed by Gaurav Katoch and Sachin Gajraj" />
  <meta name="robots" content="index, follow, noarchive" />
  <meta name="googlebot" content="noarchive" />
<link rel="stylesheet" type="text/css" href="css/html.css" media="screen, projection, tv " />
  <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen, projection, tv" />
  <link rel="stylesheet" type="text/css" href="css/print.css" media="print" />
  <!--////////////////////////////////////////////-->
<link rel="stylesheet" type="text/css" href="pro_drop_1/pro_drop_1.css" />

<script src="pro_drop_1/stuHover.js" type="text/javascript"></script>
<!--/////////////////////////////////////////////////-->
</head>


<body>

<div id="content">

 <?php include "header.php" ?>
 <div id="page" >
<h1>Reset Your Password</h1>
<?php
if(!isset($_POST['submit']))
 resetpass(); 
else
echo $message; 
 ?>
</div>
</div>
<?php
include ('footer.html');
?>
</body>

</html>