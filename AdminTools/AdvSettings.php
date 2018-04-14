<html>
<head>
  <title>WorkStation::Admin</title>
  <link type="text/css" rel="stylesheet" href="Style_Admin.css" /> 
  <link type="text/css" rel="stylesheet" href="Description_hover.css" />
</head>
<body>
   <div id="Heading">
      <h1>Admin Page</h1>
	  Users With Admin Rights :<?php 
	        require_once('Check.php');
			$dbc=mysqli_connect('localhost','root','toor','demoWorkStation')or die("Error Connecting Database");
			$query="SELECT * FROM LoginDetails Where AdvType='Visible'";
			$result=mysqli_query($dbc,$query) or die("error querriying");
			while($row=mysqli_fetch_array($result))
			  {
			    echo ' |';
				echo $row['Id'];
				echo '| ';
			  }			
			
			mysqli_close($dbc);
  			
	  ?>
   </div>

   <div id="AddTable">
       <a href="AddTable.php">Add Table</a>
   </div>
   
   <div id="DeleteTable">
      <a href="DeleteTable.php">Delete Table</a>
   </div>
   
   <div id="EnterQuery">
      <a href="EnterQuery.php">Enter Your Own Command</a>
   </div>
   
   <div id="ViewAllMembers">
      <a href="ViewAllMembers.php"> View Details of All Members </a>
   </div>
   
   <div id="InsertInTable">
      <a href="InsertInTable.php"> Insert Data Into Table </a>
   </div>   
   
   <div id="DeleteFromTable">
      <a href="DeletFromTable.php"> Delete Data From Table </a>
   </div>
   
   <div id="EditTable">
      <a href="EditTable.php"> Edit Table </a>
   </div>
   
   <div id="GiveAdmin">
      <a href="GiveAdmin.php"> Give A User Admin Rights </a>
   </div>
   
   <div id="AddMember">
      <a href="AddMember.php"> Add New Member </a>
   </div>
   
   <div id="">
      <a href="">  </a>
   </div>
   
   <div id="">
      <a href="">  </a>
   </div>
   
   <div id="">
      <a href="">  </a>
   </div>
   
   <div id="">
      <a href="">  </a>
   </div>
   
   <div id="">
      <a href="">  </a>
   </div>
   
   <div id="">
      <a href="">  </a>
   </div>
   
   <div id="">
      <a href="">  </a>
   </div>
   
   <div id="">
      <a href="">  </a>
   </div>
   
   <div id="">
      <a href="">  </a>
   </div>
   
   <div id="">
      <a href="">  </a>
   </div>
   
   <div id="">
      <a href="">  </a>
   </div>
   
   <div id="">
      <a href="">  </a>
   </div>
   
   <div id="Back">
      <a href="../Settings.php"> Back </a>
   </div>
</body>
</html