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
<h1>Other research areas </h1>
<h2><b>Characteristics of speech motor skills in typically developing children.</h2></b>
<p>Spoken language or speech can be classified into three abstract features namely, rhythm, formant transitions, place and manner of articulation. Each of these features interestingly is associated with a different time scale and is currently investigated using a different technique. For example, rhythm also called syllabicity is investigated using tedious measurements of syllable durations, while place of articulation is studied using careful measurements of voice onset times. We have proposed the <a href="http://www.nbrc.ac.in/faculty/nandini/TrackingVerbalDevelopment/articles/11.pdf">Speech Modulation Spectrum (SMS) </a>as a technique to to simultaneously study these three abstract features. We have used these spectral analysis techniques to study the developmental pattern of speech motor skills in children from 4-13 years and have shown that adult-like articulatory energy profiles are demonstrated by children around 14 years. </p>
<h2><b>Characteristics of speech motor skills in children with autism</h2></b>
<p>Neurodevelopmental disorders like autism are marked by impairments in language and communication. Impairment in auditory processing of sounds has also been implicated. Since there has been some evidence to show that early speech and language abilities might be significant predictors of the communication impairment in autism, the laboratory has also been trying to identify speech parameters, which might be predictors of later language abilities in such populations. Using various spectral analysis techniques including the speech modulation spectrum, we have been studying speech samples from children with autism and comparing them with age-matched control data. </p>

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