<style type="text/css">th,tr{border:black solid 1px;padding:5px;font-family:sans-serif;}
                       table{border-collapse:collapse;}
</style>
<table>
 <tr><th>Page Title</th><th>By</th><th>Date</th><th>Click To Open</th></tr>
<?php 
   $dbc=mysqli_connect('localhost','root','toor','demoWorkStation')or die("Error Connecting Database");
	$query="Select * From CustomPages";
	$result=mysqli_query($dbc,$query) or die("error querriying");
	while($row=mysqli_fetch_array($result))
	{
		$Title=$row['Name'];
		$Id=$row['Id'];
		$Date=$row['Date'];
		$Time=$row['Time'];
		$Mapping=$row['Mapping'];
		$StatusOfPage=$row['Status'];
?>
		<?php echo "<tr><th>".$Title."</th><th>".$Id."</th><th>".$Date."</th>"; ?><th><a href="<?php echo "CustomPages/".$Id."/".$Title."_".$Id."_".$Date."_".$Time.".php"; ?>">OpenPage</th></a>  
<?php	   
		if($Id==$_COOKIE['Id'])
		{
		   $Link="AdminTools/PageEdit_v3.php?Title=".$Title."&amp;Id=".$Id."&amp;Date=".$Date."&amp;Time=".$Time."&amp;Mapping=".$Mapping."&amp;StatusOfPage=".$StatusOfPage;
		   echo "<th><a href='".$Link."'>Edit</th>";
		 }
		 echo "</tr>";
	}
	mysqli_close($dbc);

?>	
</table>