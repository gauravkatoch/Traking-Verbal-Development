<!-- HEADER: Holds title, subtitle and header images -->
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>

  <div id="header">

    <div id="title">
      
     
    </div>

    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="1093" height="107" id="FlashID" title="Tracking Verbal Development">
      <param name="movie" value="images/bg/flashvortex.swf" />
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="9.0.45.0" />
      <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
      <param name="expressinstall" value="Scripts/expressInstall.swf" />
      <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
      <!--[if !IE]>-->
      <object type="application/x-shockwave-flash" data="images/bg/flashvortex.swf" width="1093" height="107">
        <!--<![endif]-->
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="swfversion" value="9.0.45.0" />
        <param name="expressinstall" value="Scripts/expressInstall.swf" />
        <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
        <div>
          <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
          <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
        </div>
        <!--[if !IE]>-->
      </object>
      <!--<![endif]-->
    </object>
  </div>


<span class="preload1"></span>
<span class="preload2"></span>
  <!-- MAIN MENU: Top horizontal menu of the site.  Use class="here" to turn the current page tab on -->

  <div >
    
    
    
  <ul id="nav" class="floatLeft">
    <li class="top"><a href="index.php" class="top_link"><span>Home</span></a></li>
    <li class="top"><a  href="readingDevelopment.php" class="top_link"><span >Reading Development</span></a></li>
    <li class="top"><a href="benifitsOfStudy.php"  class="top_link"><span >Benifits of the Study</span></a></li>
    <li class="top"><a  href="otherResearch.php" class="top_link"><span >Other Research</span></a></li>
    
    
    <?php
	
	if($_SESSION['authuser']==3)
    {
		$auth=<<<yyy
	<li class="top"><a href="myprofile.php" id="products2" class="top_link"><span >My Profile</span></a></li>
    <li class="top"><a href="issuebooks.php" id="products2" class="top_link"><span >Issue Books</span></a></li>
	<li class="top"><a href="receivebooks.php" id="products2" class="top_link"><span >Receive Books</span></a></li>
    <li class="top"><a href="editusers.php" id="products2" class="top_link"><span >Edit Users</span></a></li>
    <li class="top"><a href="editdatabase.php" id="products2" class="top_link"><span >Edit Database</span></a></li>
yyy;
echo $auth;
    }
	
	?>
    
    <li class="top"><a href="contactus.php" class="top_link"><span>Contact Us</span></a></li>
    </ul>
  <!-- PHP script to display logged in user name -->   
    <ul class="floatRight">
      <?php
   
   if(isset($_SESSION['user']))
   {
	   echo "<p id='sign' style='text-transform:capitalize'>Welcome ".$_SESSION['user'];
   $log=<<<EOD
   <a href="logout.php" title="CLick here to logout">Logout</a></p>
EOD;
   
   
   echo $log;
   
   }
   else
   {
   echo "<p id='sign'> You are not logged in.(";
   echo '<a href="index.php">Login</a>)</p>';
   }?>
      
    </ul>
  </div>


<script type="text/javascript">
swfobject.registerObject("FlashID");
swfobject.registerObject("FlashID");
</script>
