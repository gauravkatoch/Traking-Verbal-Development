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
<h1>Benefits of the studies</h1>
<blockquote class="go">

          <p>
            Regular evaluation of the child's verbal and/or reading abilities
          </p>
        </blockquote>
<blockquote class="go"><p>Report from Clinical Psychologist on language development milestones </p></blockquote>
<blockquote class="go"><p>Early screening for delays in language and reading development  </p></blockquote>
<blockquote class="go"><p>Visual images of verbal skills will be got in the language development study. These will make for a great memory!  </p></blockquote>
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