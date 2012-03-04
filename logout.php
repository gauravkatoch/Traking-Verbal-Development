<?php 
session_start();
   unset($_SESSION['user']);
   unset($_SESSION['email']);
   unset($_SESSION['authuser']);
   
   session_destroy();
   header('Location: index.php');

?>

