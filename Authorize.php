<?php
     if(isset($_POST['Submit']))
		 {
			$Id=$_POST['Id'];
			$Password=$_POST['Password'];
			$dbc=mysqli_connect('localhost','root','toor','demoWorkStation')or die("Error Connecting Database");
			$query="SELECT * FROM LoginDetails";
			$result=mysqli_query($dbc,$query) or die("error querriying");
			while($row=mysqli_fetch_array($result))
			  {
				if(($row['Id']==$Id) && ($row['Password']==$Password))
				{
				  setcookie('Id',$row['Id'],time()+(60*60*24*30));
				  setcookie('PassedAtOnce','',time()-3600); 
				  if(!empty($row['Theme'])){
				  setcookie('ThemeFolder',$row['Theme'],time()+(60*60*24*30));}
				  else{
				        setcookie('ThemeFolder','default',time()+(60*60*24*30));
				  }
				  
				  $FirstName=$row['FirstName'];
				  $LastName=$row['LastName'];
				  $ProfileImage=$row['ProfileImage'];
				  $AdvType=$row['AdvType'];
				  $ProfileImageExt=$row['ProfileImageext'];
				  $Theme=$row['Theme'];
				  $query2="DELETE FROM LoginDetails where Id='$Id'";
				  $query3="Insert Into LoginDetails (Id,Password,FirstName,LastName,ProfileImage,AdvType,ProfileImageext,Theme,LoginTime,LoginDate) ".
				          "Values('$Id','$Password','$FirstName','$LastName','$ProfileImage','$AdvType','$ProfileImageExt','$Theme',now(),now())";
				  $result2=mysqli_query($dbc,$query2) or die("Error Data Deleting"); 
                  $result3=mysqli_query($dbc,$query3) or die("error Updating");				  
				  
				}
			  }			
			
			mysqli_close($dbc);
			
			if(!isset($_COOKIE['Id'])){setcookie('MoreThan1Attempt','y');}
		 }
	
header('Location: ' . ' Login.php');
?>		 