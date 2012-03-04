<?php
session_start();
if(!isset($_SESSION['user']) || $_SESSION['authuser'] == 0)
$message='<p id="sign">You are not authorized to view this page plz <a href="index.php">Login</a></p>';
include"functions.php";
function image()
{
	include("mysql_connect.php");
	$query="SELECT image from users where user_id = ".$_SESSION['user_id'].""; 
	$result = mysql_query($query, $link);
	$row = mysql_fetch_array($result);
	if($row['image']=="users/")
	{
		if($_SESSION['authuser']==1)
				echo '<img src="users/student.jpg" alt='.$_SESSION['user'].' title="'.$_SESSION['user'].'"/>';
		else
		echo '<img src="users/faculty.jpg" alt='.$_SESSION['user'].' title="'.$_SESSION['user'].'"/>';
	}
	else
		echo '<img src='.$row['image'].' alt='.$_SESSION['user'].' title="'.$_SESSION['user'].'" width="250" height="228"/>';
		

	echo '<div><p style="text-align:center; text-transform:capitalize">'.$_SESSION['user']."<br /><a href=editinfo.php>Change Profile Pic</a></p></div>";
}
//end of function image



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-AU">

<head>


  <title>Books</title>


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

<!-- CONTENT: Holds all site content except for the footer.  This is what causes the footer to stick to the bottom -->
<div id="content">


	<!-- Include header -->
 <?php include "header.php" ?>

  <!-- PAGE CONTENT BEGINS: This is where you would define the columns (number, width and alignment) -->
 <div id="page" >




<?php
if(isset($message))
echo "<p>".$message."<p>";
else
{
	 echo '<div class="width25 floatLeft leftColumn ">';
	image();
echo "</div>
<div class='width75 floatRight'>
<h1> Books Issued</h1>";
 bookissued(); 
}
?>
</div>
</div>
</div>
<!-- Include Footer -->
<?php
 include"footer.html" 

?>


</body>

</html>