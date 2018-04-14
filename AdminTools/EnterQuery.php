<?php 
     require_once('Check.php');
	 if(isset($_POST['Command']))
	 {
	  $Command=$_POST['Command'];
	  $dbc=mysqli_connect('localhost','root','toor','demoWorkStation');
	  $result=mysqli_query($dbc,$Command) or die("error IllegalCommand");
	 
	  echo 'Done<br \> <a href="AdvSettings.php">Back</a>'; 
	 
	
		mysqli_close($dbc);
		
	 }
	 
	 else
	 {
 ?>
	 <form method="POST" Action="EnterQuery.php">
	    <div id="DeleteTable">
			Enter MySql Command :
			<input type="text" name="Command" \>
			<input type="Submit" name="SubmitCommand" \>
			<a href="AdvSettings.php">Back</a>
	    </div>
	</form>
	 
<?php }
?>	  