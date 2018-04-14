<?php 
     require_once('Check.php');
	 if(isset($_POST['TableName']))
	 {
	  $TableName=$_POST['TableName'];
	  $dbc=mysqli_connect('localhost','root','toor','demoWorkStation');
	  $query="Create Table $TableName(Id int Primary KEY AUTO_INCREMENT)";
	  $result=mysqli_query($dbc,$query) or die("error querying");
		
		$i=0;
		while($i<100)
		{
		  if(!empty($_POST['ColName'.$i])&&(!empty($_POST['ColType'.$i])))
		  {
		    $ColName=$_POST['ColName'.$i];
			$ColType=$_POST['ColType'.$i];
		    $query2="Alter Table $TableName Add $ColName $ColType";
			$result2=mysqli_query($dbc,$query2) or die ("COL NOT ADDED");
		  }
		  $i++;
		}
		$query_test="Describe $TableName";
		if($result=mysqli_query($dbc,$query_test))
		{
		  echo 'Table Creation Successful<br \> <a href="AdvSettings.php">Back</a>';
		}
		
		mysqli_close($dbc);
		
	 }
	 
	 else
	 {
 ?>
	 <form method="POST" Action="AddTable.php">
	    <div id="AddTable">
			Enter Table Name :
			<input type="text" name="TableName" \>
			<input type="Submit" name="SubmitTableName" \>
			<a href="AdvSettings.php">Back</a>
	    </div>
		<div id="ColmName">
		<table>
		<?php
		    $i=0;
			while($i<100)
			{echo '<tr><th>
			Enter Column Name</th><th>'.($i+1).' :
			<input type="text" name="ColName'.$i.'" \></th>
			<th>Type : </th><th>
			<input type="text" name="ColType'.$i.'" \></th>
			</tr>';
			$i++;
			}
		?>
		</table>
		</div>

	</form>
	 
<?php }
?>	  