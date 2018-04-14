

<table>
 <tr>
    <th>Id  </th>
	<th>Password  </th>
	<th>First Name  </th>
	<th>Last Name  </th>
	<th>AdvType  </th>
	<th>ProfileImage  </th>
	
 </tr>
<?php 
     require_once('Check.php'); 
	 
	  $dbc=mysqli_connect('localhost','root','toor','demoWorkStation');
	  $query="Select * from LoginDetails";
	  $result=mysqli_query($dbc,$query) or die("error IllegalCommand");
	  
	  while($row=mysqli_fetch_array($result))
	  {
	    echo '<tr><th>'.$row['Id'].'</th>
		          <th>'.$row['Password'].'</th>
				  <th>'.$row['FirstName'].'</th>
				  <th>'.$row['LastName'].'</th>
				  <th>'.$row['AdvType'].'</th>
				  <th>'.$row['ProfileImage'].'</th>
				  </tr>';
	  }
	
	  mysqli_close($dbc);
		
	

 ?>
 </table>
	 <a href="AdvSettings.php">Back</a>
	 
<?php
?>	  