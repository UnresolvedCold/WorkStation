<html>
<head>

  <title>WorkStation::HomeScreen</title>
  <link type="text/css" rel="stylesheet" href="Theme/<?php if(isset($_COOKIE['ThemeFolder'])){$Theme=$_COOKIE['ThemeFolder'];}else{$Theme='default';} echo $Theme;?>/Style_MyProfile.css" /> 
  <link type="text/css" rel="stylesheet" href="Theme/default/Description_hover.css" />
  <script src="JavaScript/MyProfile.js"></script>
</head>

<body>
      <?php if(!empty($_COOKIE['Id']))
			 {
			   $Id=$_COOKIE['Id'];
		?>
  <div id="Entire">

     <div id="Details">
       <h2><?php echo $Id ?></h2>
	    
     </div>

     <div id="MyGoals">
       <h2></h2>
	   <?php 
	      if(isset($_COOKIE['Id']))
		  {
	        
		   }		   
		?>	 
     </div>

     <div id="Links">
<?php //	  <a href="HomeScreen.php">Work Out Now</a>?>
		  <a href="Download.php" id="AllWorks" >All Works</a>
		  <a href="Upload.php" id="Upload">Submit Your Work</a>
		  <a href="blog.php" id="blog">Blog</a>
		  <a href="Message.php" id="Message">Message</a>
<?php	//<a href="Contacts.php">Contacts</a>
	    //<a href="contribute.php">Contribute</a>?>
     </div>
	 <div id="Links_info" class="invisible">This Bar Contains Links To Other Pages, like :- <br/><br />
	                                        <strong><u>AllWorks</u></strong> - Link To All Submitted Works. Here One Can Select a Particular Work And Add His Ideas To It.<br /><br />
	                                        <strong><u>Submit Your Work</u></strong> - This is where you can Upload the work. The Uploaded Work then comes under All Works Tab<br /><br />
											<strong><u>blog</u></strong>-Blog is blog<br /><br />
											<strong><u>Message</u></strong> - Here you can  send a message to another member. Right now it is just a chat Screen<br /><br />
	 </div>
	 <div id="Links_Link" class="invisible"></div>
      
     <div id="Tools">
	      <a href="AdminTools/PageEdit.php" >CreatePage</a>
          <a href="Stuffs.php" id="Stuffs">Stuffs</a>	 
          <a href="Settings.php" id="Settings">Settings</a>
		  <a href="LogOut.php" id="LogOut">Log Out </a>
     </div>
	 <div id="Tools_info" class="invisible">Tools</div>
	 <div id="Tools_Link" class="invisible"></div>
	 
	 <a href="Science.php"> 
	   <div id="Science">Science</div>
     </a>
	   <div id="Science_info" class="invisible">This Tab Contains Science Books Uploaded By All Members</div>
	   <div id="Science_Link" class="invisible">Link to Sc Books</div>
	 
	 <a href="EngineeringSc.php"> 
	   <div id="EngineeringSc">Engineering Science</div> 
	 </a>
	   <div id="EngineeringSc_info" class="invisible">This Tab Contains Engineering Science Books Uploaded By All Members</div>
	   <div id="EngineeringSc_Link" class="invisible"></div>
	 
	 <a href="Philosophy.php"> 
	   <div id="Philosophy">Philosophy</div> 
	 </a>
	   <div id="Philosophy_info" class="invisible">This Tab Contains Philosophical Books Uploaded By All Members</div>
	   <div id="Philosophy_Link" class="invisible"></div>
	 
	 <a href="Misc"> 
	   <div id="Misc">Misc</div> 
	 </a>
	   <div id="Misc_info" class="invisible">This Tab Contains Misc Books Uploaded By All Members</div>
	   <div id="Misc_Link" class="invisible"></div>
	 
	 <a href="MyBooks.php"> 
	   <div id="MyBooks">My Books</div> 
	 </a>
	   <div id="MyBooks_info" class="invisible">This Tab Contains Books Uploaded By Me <?php if(isset($_COOKIE['Id'])){echo '('.$_COOKIE['Id'].')';}?></div>
	   <div id="MyBooks_Link" class="invisible"></div> 
	 
	 <a href="Mathematics.php"> 
	   <div id="Mathematics">Mathematics</div> 
	 </a>
	   <div id="Mathematics_info" class="invisible">This Tab Contains Mathematics Books Uploaded By All Members</div>
	   <div id="Mathematics_Link" class="invisible"></div>
	 
	 
  </div>
      <?php 
	        }
			else {
			      echo '<h2>You Are Not Logged In.<br \><br \>
				        Please <a href="Logout.php">Login </a>to Access.<br \>
						';
			}
	  ?>
	  


</body>
</html>

