<?php
      	  
	  if(isset($_POST['Submit']))
	  {
	    $Id=$_POST['Id'];
	    $dbc=mysqli_connect('localhost','root','toor','demoWorkStation')or die("Error Connecting Database");
		$query="SELECT * FROM LoginDetails";
		$result=mysqli_query($dbc,$query) or die("error querriying");
		while($row=mysqli_fetch_array($result))
				{
				  if($row['Id']==$Id)
				  {
				    $AdvType='Visible';
					$Password=$row['Password'];
					$FirstName=$row['FirstName'];
					$LastName=$row['LastName'];
					$ProfileImg=$row['ProfileImage'];
					$ProfileImg_ext=$row['ProfileImageext'];
				    $query_1="delete from LoginDetails where Id='$Id'";
					$result_1=mysqli_query($dbc,$query_1)or die("Not removed");
					$query_2="Insert Into LoginDetails(Id,Password,FirstName,LastName,AdvType,ProfileImage,ProfileImageext) 
					          values('$Id','$Password','$FirstName','$LastName','$AdvType','$ProfileImg','$ProfileImg_ext')";
					$result_2=mysqli_query($dbc,$query_2)or die("Not Inserted");
					
				  }
				}
				
		mysqli_close($dbc);
	    header('Location: '.'AdvSettings.php');
	  }
	  else{
?>
     <form action="GiveAdmin.php" method="POST">
	 <input type="Text" name="Id" \>
	 <input type="Submit" name="Submit" \>
	 </form>
<?php
}
?>