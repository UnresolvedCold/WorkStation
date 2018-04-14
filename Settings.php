<html>
<head>
 <title>WorkStation:: Settings</title>
 <link type="text/css" rel="stylesheet" href="Theme/<?php if(isset($_COOKIE['ThemeFolder'])){$Theme=$_COOKIE['ThemeFolder'];}else{$Theme='default';} echo $Theme;?>/Style_Settings.css" />
 <link type="text/css" rel="stylesheet" href="Theme/default/Description_hover.css" />
</head>
  
<body>
	<div id="Entire">
	
	   <div id="RightPannel">
			<form enctype="multipart/form-data" method="POST" action="Edit.php">
			   <?php
			    require_once('Check.php');
			    ini_set('upload_max_filesize','100M');
				ini_set('post_max_size','100M');
				ini_set('max_input_time',7200);
				ini_set('max_execution_time',7200);	
				$Id=$_COOKIE['Id'];
				$Image_Dir="Images/ProfilePics/";
				
			    $dbc=mysqli_connect('localhost','root','toor','demoWorkStation')or die("Error Connecting Database");
				$query="SELECT * FROM LoginDetails";
				$result=mysqli_query($dbc,$query) or die("error querriying");
				while($row=mysqli_fetch_array($result))
				{
				  if($row['Id']==$Id)
				  {
				    echo '
					     <h1>'.$Id.'</h1>
						 <img src="'.$Image_Dir.$row['ProfileImage'].'.'.$row['ProfileImageext'].'" height="150" width="120" \>
					 <table>
					   <tr><th>Id :</th>
					       <th><input name="Id" type="text" value="'.$row['Id'].'" \></th>
					   </tr>
					   
					   <tr>
					       <th>Password :</th>
					       <th><input name="Password" type="password" value="'.$row['Password'].'" \></th>
					   </tr>
					   
					   <tr>
					       <th>First Name :</th>
					       <th><input name="FirstName" type="text" value="'.$row['FirstName'].'" \></th>
					   </tr>
					   
					   <tr>
					       <th>Last Name :</th>
					       <th><input name="LastName" type="text" value="'.$row['LastName'].'" \></th>
					   </tr>
					   
					   <tr>
					       <th>ProfilePic :</th>
					       <th><input name="ProfileImage" type="File" \></th>
					   </tr>
					   
					   <tr>
					       <th>Layout :</th>
					       <th><input name="Layout" type="text" value="'.$row['Theme'].'" \></th>
					   </tr>
					   
					   </table>
					     
                       <div id="Submit"><input name="Submit" type="Submit" value="SaveChanges" \></div>
	                  
					   </form>
					   </div>
					   
					   <a href="AdminTools/AdvSettings.php"> <div class="'.$row['AdvType'].'"></div></a>
					   
					   ';
				  }
				}
                mysqli_close($dbc);
			   ?>
			   
	   
	   <div id="BackgroundPic">
	   </div>
	   
	   <div id="Links">
	       <a href="MyProfile.php">Back To My Profile</a>
		   <a href="Logout.php">Log Out</a>
	   </div>
	   
	</div>
</body>
</html>