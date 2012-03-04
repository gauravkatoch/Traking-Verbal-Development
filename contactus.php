<?php
session_start();
if(isset($_POST['submit']))
{
	$mailto="bathula@iitrpr.ac.in";
	$sub="Comment on Tracking Verval Development";
	$body=$_POST['name']." wrote ".$_POST['comment'];
	$from="From: ".$_POST['mail'];
	mail($mailto,$sub,$body,$from);
	$message="Your comment has been received. Thanks for your valuable time";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-AU">

<head>


  <title>Contact Us</title>

  <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
  
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


<!-- CONTENT: Holds all site content except for the footer.  This is what causes the footer to stick to the bottom -->
<div id="content">


	<!-- Include header -->
 <?php include "header.php" ?>

  <!-- PAGE CONTENT BEGINS: This is where you would define the columns (number, width and alignment) -->
 <div id="page" >
<h1 align="center">Contact Us</h1>
 <div align="center" >
<p><strong>Dr.Nandini Chatterjee Singh,</strong><br />
National Brain Research Center,<br />
NH-8,Nainwal Mode, <br />
Manesar,Gurgaon-122050,</br>
Haryana,India.</br></br>
<a href="http://www.nbrc.ac.in/faculty/nandini/">Visit Lab</a></br></br>
Email id: nandini@nbrc.ac.in </br>
Phone no: 01242845201-333.</p>
</p>
</div>
<div class="width50 floatRight">

</div>
<div >
<h2>&nbsp;</h2>

<h2>Your Feedback and Comments are highly valuable to us, Please take some time to tell us how you feel about our project</h2>
</div>
<table>
<form action="contactus.php" method="post" enctype="text/plain">
<p>Name:
<input type="text" name="name" value="your name" /><br /></p>
<p>E-mail:
<input type="text" name="mail" value="your email" /><br /></p>
<p>Comment:</p>
<TEXTAREA rows="5" cols="40" name="comments">
	Write your comments here</TEXTAREA>
	
<br /><br />
<input type="submit" name="submit" value="Send">
<input type="reset" value="Reset">

</form>
</table>


</div>
</div>
<!-- Include Footer -->
<?php
 include"footer.html" 

?>


</body>

</html>