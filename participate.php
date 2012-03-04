<?php

session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-AU">

<head>


  <title>Tracking Verbal Development</title>

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
<script src="jquery.min.js"> </script>
    <script src="jRecorder.js"> </script>
<!--/////////////////////////////////////////////////-->
</head>


<body>
<!-- CONTENT: Holds all site content except for the footer.  This is what causes the footer to stick to the bottom -->
<div id="content">


	<!-- Include header -->
  
  <?php include "header.php" ?>

  <!-- PAGE CONTENT BEGINS: This is where you would define the columns (number, width and alignment) -->
 <div id="page" >

 <div class="width100 floatLeft leftColumn ">
   <script>
   
   $.jRecorder(
     
     { 
        host : 'acceptfile.php?filename=sample' ,  //replace with your server path please
        
        callback_started_recording:     function(){callback_started(); },
        callback_stopped_recording:     function(){callback_stopped(); },
        callback_activityLevel:          function(level){callback_activityLevel(level); },
        callback_activityTime:     function(time){callback_activityTime(time); },
        
        callback_finished_sending:     function(time){ callback_finished_sending() },
        
        
        swf_path : 'jRecorder.swf',
     
     }
     
   
        
   
   );
   
    
   
   </script>

</div>


<div style="background-color: #fff;color:#003;border:1px solid #cccccc">
  
  Time: <span id="time">00:00</span>
  
</div>


<div style="background-color: #fff;color:#003">
  Level: <span id="level"></span>
</div>  

<div id="levelbase" style="width:200px;height:20px;background-color:#ffff00">
  
  <div id="levelbar" style="height:19px; width:2px;background-color:red"></div>
  
</div>

<div style="background-color: #fff;color:#003">
  Status: <span id="status"></status></span>
</div> 


<div>

  
<input type="button" id="record" value="Record" style="color:red">  




<input type="button" id="stop" value="Stop">


  
<input type="button" id="send" value="Send Data">
<br /> <p> This is just a prototype, recorded voice can be accessed <a href="voice/sample.wav">HERE</a></p>
<br/>
<p>If the level indicator is not working it, please refresh the page, and click on allow dialogue which appears after clicking record <br/> The buttons have thier usual meaning <br/> Record: To start recording. Also recording is limited to 30 seconds only. <br/> Stop: To stop recording. It will also play back the recorded sound, so you can verify the sound before clicking on send. <br/> Send: This will send recorded voice to the Database.</p>
 </div>
 </div>

</div>

 
<!-- Include Footer -->
<?php
 include"footer.html" 

?>
</body>

</html>


 <script type="text/javascript">

                  
      
      
      
                  $('#record').click(function(){
                    
                    
                      $.jRecorder.record(30);
                      
                      
                      
                    
                    
                  })
                  
                  
                  $('#stop').click(function(){
                    
                    
                    
                     $.jRecorder.stop();
                    
                    
                  })
                  
                  
                   $('#send').click(function(){
                    
                    
                    
                     $.jRecorder.sendData();
                    
                    
                  })
                  

                  function callback_finished()
                  {
      
                      $('#status').html('Recording is finished');
                    
                  }
                  
                  function callback_started()
                  {
      
                      $('#status').html('Recording is started');
                    
                  }
                  
                  
                  
                  
                  function callback_error(code)
                  {
                      $('#status').html('Error, code:' + code);
                  }
                  
                  
                  function callback_stopped()
                  {
                      $('#status').html('Stop request is accepted');
                  }

                  function callback_finished_recording()
                  {
                    
                      $('#status').html('Recording event is finished');
                    
                    
                  }
                  
                  function callback_finished_sending()
                  {
                    
                      $('#status').html('File has been sent to server mentioned as host parameter');
                      
                      
                  }
                  
                  function callback_activityLevel(level)
                  {
                    
                    $('#level').html(level);
                    
                    if(level == -1)
                    {
                      $('#levelbar').css("width",  "2px");
                    }
                    else
                    {
                      $('#levelbar').css("width", (level * 2)+ "px");
                    }
                    
                    
                  }
                  
                  function callback_activityTime(time)
                  {
                   
                   //$('.flrecorder').css("width", "1px"); 
                   //$('.flrecorder').css("height", "1px"); 
                    $('#time').html(time);
                    
                  }

                  
                  
		   
		   
		              

           
        </script>

