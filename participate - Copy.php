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
 <h3>jRecorder Example 1 - Insert flash recorder inside the body tag</h3>

    <p>In this example, you add a flash recorder with some call  back function. $.jRecorder function is called with all initial settings.
    If the second parameter for $.jRecorder is not there, plugin insert the flash recorder inside the body tag. You can specify where to insert
    the flash recorder with second parameter. See <a href="example2.html">example2.html</a> for this.
    </p>

    <p>Download the plugin: <a href="jRecorder.zip">jRecorder.zip</a> </p>

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


<div style="background-color: #eeeeee;border:1px solid #cccccc">
  
  Time: <span id="time">00:00</span>
  
</div>


<div>
  Level: <span id="level"></span>
</div>  

<div id="levelbase" style="width:200px;height:20px;background-color:#ffff00">
  
  <div id="levelbar" style="height:19px; width:2px;background-color:red"></div>
  
</div>

<div>
  Status: <span id="status"></status>
</div> 


<div>

  
<input type="button" id="record" value="Record" style="color:red">  
<p>This Record button trigger the record event. See the javascript example in the bottom of the page. (View Source in your browser).
  
<pre>
$('#record').click(function(){
                    
    $.jRecorder.record(30); //record up to 30 sec and stops automatically
                   
   })
</pre>
  </p>  


<hr/>

<input type="button" id="stop" value="Stop">

<p>This Stop button trigger the stop record event. 
  
  <pre>
  Onclick of this button trigger  $.jRecorder.sendData() which send the data to the Server
  </pre>

<hr/>

  
<input type="button" id="send" value="Send Data">

<p>This SendData button trigger the sendData event to flash to send the wav data to Server (configured in the host parameter).  
  
  
<hr/>
  
<pre>
$('#stop').click(function(){
                    
    $.jRecorder.stop();
                   
   })
</pre>
  </p>  


<hr/>


</div>


 

<p>
  Time area is used to update the time. There is an event Listener which update the recording time dynamically.
  <pre>
    
    callback_activityTime:     function(time){callback_activityTime(time);  //see the initialisation
    
    //function callback
    function callback_activityTime(time)
     {
      
      
       $('#time').html(time);
       
     }
    
  </pre>  
</p>  
 


 
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

