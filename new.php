<?php

session_start();
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

<p>Add Content over here. </p>
EO;
echo $page;
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