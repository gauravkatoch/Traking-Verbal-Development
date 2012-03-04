<?php
session_start();
function registerid()
{
	$formid=<<<eod
	<table>
	<form action="register.php" method="post">
	<fieldset>
	
	<tr><td><p><b>First Name:</b></td><td> <input type="text" name="first_name" size="20" maxlength="20" value="" /></p></td></tr>
	
	<tr><td><p><b>Last Name:</b> </td><td><input type="text" name="last_name" size="20" maxlength="40" value="" /></p></td></tr>
	
	<tr><td><p><b>Email Address:</b></td> 
    <td><input type="text" name="email" size="20" maxlength="80" value="" /></p></td></tr>
    
		
    <tr><td><p><b>Password:</b></td><td> 
      <input type="password" name="password1" size="20" maxlength="20" /> 
	  </p></td></tr>
	<tr><td><p><b>Confirm Password:</b></td><td> <input type="password" name="password2" size="20" maxlength="20" /></p></td></tr>
	</fieldset>
	</table>
	<div align="center"><input type="submit" name="submit" value="Register" /></div>
	

</form>
eod;
echo $formid;
}
if(isset($_POST['submit']))
{
	if($_POST['first_name']=="" || $_POST['last_name']=="" || $_POST['email']=="" || $_POST['password1']=="" || $_POST['password2']=="")
	$message="All fields are compulsory";
	elseif($_POST['password1']!=$_POST['password2'])
	{
		$message="Password and Confirm Password dont Match, Please Type the password correctly";
	}
	else
	{
		include"mysql_connect.php";
		$query = "SELECT user_id FROM users WHERE email='".$_POST['email']."'";
		$result = mysql_query($query, $link);
		//emailid available
		if (mysql_num_rows($result) == 0)
 		{
			$query = "INSERT INTO users (email, pass, first_name, last_name, registration_date) VALUES ('".$_POST['email']."','".$_POST['password1']."', '".$_POST['first_name']."', '".$_POST['last_name']."', NOW() )";
			
			$result = mysql_query($query, $link);
			if (mysql_affected_rows($link) == 1) 
			{
				$message="Thanks for registering. You have been registered by default into Student account for help contact Admin";
			}
			else
			$message="Server Problem. No donuts for You";
		}
	}
	
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-AU">

<head>


  <title>Register</title>

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


<body>	<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
  
  <meta name="keywords" content="Child, Development,Psychology, Experiment,Brain,Research" />
  <meta name="description" content="Tracking Verbal Development website, maintained by IIT Ropar" />
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
<h1>Register</h1>
<?php
if(!isset($_POST['submit']))
 registerid(); 
else
echo "<p>".$message."<p>"; 
?> 
</div>
</div>





<?php
include ('footer.html');
?>
</body>

</html>