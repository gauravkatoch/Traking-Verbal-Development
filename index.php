<?php

session_start();
if(!isset($_SESSION['authuser']))
$_SESSION['authuser']=0;
function signin()
{
if(!isset($_SESSION['email']))
{
	$sign=<<<EOD
<div class="width25 floatRight">
	
    <form action="index.php" method="post">
	<fieldset>
	<p><b>Email Address:</b> <input type="text" name="email" size="20" maxlength="40" /></p>
	<p><b>Password:</b> <input type="password" name="pass" size="20" maxlength="20" /></p>
	<div align="center"><input type="submit" name="submit" value="Login" /></div>
    <div align="center"><a href="forgot_password.php" title="Retrieve forgotten password">Forgot Password</a></div>
  		
		<table width="100%" border="0">
              <tr> 
                <td colspan="2" align="center"><font color="#000033" size="1" ><strong>&nbsp;New 
                  User?</strong></font></td>
              </tr>
              <tr> 
                <td colspan="2" align="center"><a  href="register.php" ><img src="images/bg/reg_now.gif"  width="114" height="21" /></a></td>
              </tr>

              <tr> 
                <td colspan="2" align="center"><font color="#000033" size="1"><strong>(to 
                  read digitized book)</strong></font></td>
              </tr>
</table>  
  
	</fieldset>
</form>
</div>
EOD;
echo $sign;
}
}
//when they press the submit button
if(isset($_POST['submit']))
{
	//to avoid empty email or password
if($_POST['email']=="" || $_POST['pass']=="")
{
	$message="Email or Password is empty";


}
else
{ 

$_SESSION['email'] = $_POST['email'];
//$_SESSION['pass'] = $_POST['pass'];
$_SESSION['authuser'] = 0;

//Check email and password information
include"mysql_connect.php";

$query = "SELECT * FROM users WHERE ".
 "email='".$_SESSION['email']."'";
 $result = mysql_query($query, $link) or die("Email not yet registered");
 if (mysql_num_rows($result) == 1)
 {
 $row=mysql_fetch_assoc($result);
 
if($_POST['pass'] == $row['pass'])
{
	$_SESSION['user_id']=$row['user_id'];
	$_SESSION['user']=$row['first_name']." ".$row['last_name'];
	$_SESSION['authuser'] = $row['authuser'];
	$message = "You are now logged in";
}
else
{
	session_destroy();
	$message = "Incorrect Password ";
	
}}
else
{
	session_destroy();
	$message=<<<EOD
	<p>"This email id is not yet registered"</p>
	<a href="Register.php id='reg'" title="Click here to register">Register Now</a>
EOD;

}
}
}

?>



<?php include "include.php" ?>
<!-- CONTENT: Holds all site content except for the footer.  This is what causes the footer to stick to the bottom -->
<div id="content">


	<!-- Include header -->
  
  <?php include "header.php" ?>

  <!-- PAGE CONTENT BEGINS: This is where you would define the columns (number, width and alignment) -->
 <div id="page" >

 <div class="width75 floatLeft leftColumn ">
<?php
if(isset($message))
echo $message;
else
{
$page=<<<EO

<p>Language development is a vital function which a child acquires in home, school and society.This process of language(s) learning occurs mainly through observation and interaction with others at home and society.</p>
<p>
In a multilingual society like India, little is known how children learn to speak and read two or more languages so fluently. This study focuses on children learning several languages at a time. By recording children's speech at different age levels, we shall be able to throw light on patterns of language development.</p>
<p>
We shall also try to find out reading development in children in English and Hindi. Such studies would help us in knowing patterns of normal language and reading development in children knowing several (more than two) languages.</p>
<p>
We encourage teachers, school counsellors, psychologists and parents to <a href="participate.php">participate</a> in our study. </p>
EO;
echo $page;
}
?>
</div>

<?php 
signin();

?>
</div>
</div>
<!-- Include Footer -->
<?php
 include"footer.html" 

?>
</body>

</html>