<?php

      $dbc=mysqli_connect('localhost','root','toor','demoWorkStation')or die("Error Connecting Database");
	  
      $Id_old=$_COOKIE['Id'];
	  $Id=$_POST['Id'];
      $Password=$_POST['Password'];
	  $FirstName=$_POST['FirstName'];
	  $LastName=$_POST['LastName'];
      $ProfileImg_ext==pathinfo($_FILES['ProfileImage']['name'],PATHINFO_EXTENSION);
	  $ProfileImg='default';
   	  $Image_Dir="Images/ProfilePics/";
	  $Theme=$_POST['Layout'];
	  
	  if(isset($_POST['Submit']))
	  {
	    
		$query="SELECT * FROM LoginDetails";
		$result=mysqli_query($dbc,$query) or die("error querriying");
		while($row=mysqli_fetch_array($result))
				{
				  if($row['Id']==$Id_old)
				  {
				    	  if(!empty($_FILES['ProfileImage']['name']))
							  {
							  $ProfileImg=$_FILES['ProfileImage']['name'];
							  }
							  else{
							       $ProfileImg=$row['ProfileImage']; 
							  }
							  
				    $AdvType=$row['AdvType'];
				    $query_1="delete from LoginDetails where Id='$Id_old'";
					$result_1=mysqli_query($dbc,$query_1)or die("Not removed");
					$query_2="Insert Into LoginDetails(Id,Password,FirstName,LastName,AdvType,ProfileImage,ProfileImageext,Theme) 
					          values('$Id','$Password','$FirstName','$LastName','$AdvType','$ProfileImg','$ProfileImg_ext','$Theme')";
					$result_2=mysqli_query($dbc,$query_2)or die("Not Inserted");
					move_uploaded_file($_FILES['ProfileImage']['tmp_name'],$Image_Dir.$ProfileImg);
				  }
				}
				
		mysqli_close($dbc);
	    header('Location: '.'Logout.php');
	  }
	  

?>