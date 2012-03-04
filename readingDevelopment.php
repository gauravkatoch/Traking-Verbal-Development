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
<h1>Reading aquisition</h1>
<h2>About task:<h2>
<p>You will be furnished with a list of words (English and Hindi). You have to ask your student/child to read. He should read the words one by one in audible manner. If the child/student is able to read accurately then give him/her a score of one. All accurate spelled words will comprise of total score. You have to record (audio) the whole session with the help of mobile phone, laptop or any recording device you have.</p>
<h2>How to administration/Procedure of administration:</h2>
<p>You have to administer the task in noise free room. You have to inform about the task to child. Please ensure the child is motivated for the task. He/she should not be hungry or sleepy just prior to the task.</p>
<h2>Following instructions should be given to the child<h2>
<p><b>" I will show you the list of words written in Hindi / English. You have to read them one by one. If have difficulty in reading a word, then also don't skip the word. Just try to read it. Even if you misspell the word, it is not a problem. Please read the word aloud. "</b></p>
<p><b><i>You have to record the whole session and have to upload the audio file on following link. </i></p>
<p><a href="participate.php">Participate in the Study</a></p>

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