<?php 
     require_once('Check.php');
	 if(isset($_POST['TableName']))
	 {
	  $TableName=$_POST['TableName'];
	  $dbc=mysqli_connect('localhost','root','toor','demoWorkStation');
	  $query="Drop Table $TableName";
	  $result=mysqli_query($dbc,$query) or die("error No Such Table Exists");
		
		$query_test="Describe $TableName";
		if(!($result=mysqli_query($dbc,$query_test)))
		{
		  echo 'Table Deleted Successfully<br \> <a href="AdvSettings.php">Back</a>';
		}
		
		mysqli_close($dbc);
		
	 }
	 
	 else
	 {
 ?>
	 <form method="POST" Action="DeleteTable.php">
	    <div id="DeleteTable">
			Enter Table Name :
			<input type="text" name="TableName" \>
			<input type="Submit" name="SubmitTableName" \>
			<a href="AdvSettings.php">Back</a>
	    </div>
	</form>
	 
<?php }
?>	  