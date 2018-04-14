<html>
<head>
  <title>WorkStation::Contribute</title>
  <link type="text/css" rel="stylesheet" href="Theme/default/Style_Contribute.css" /> 
  <link type="text/css" rel="stylesheet" href="Theme/default/Description_hover.css" />
</head>
<body>
<?php
	require_once('Check.php');
	$Goal=$_GET['Goal'];
	if(isset($_GET['Idea']))
	{
		$Giver=$_COOKIE['Id'];
		$Idea=$_GET['Idea'];
		
		$dbc=mysqli_connect('localhost','root','toor','demoWorkStation')or die("Error Connecting Database");
		$query="Insert into $Goal (Author,Idea) Values('$Giver','$Idea')";
		$result=mysqli_query($dbc,$query) or die("error querriying<br \>");		
		mysqli_close($dbc);
		header('Location: '.'Download.php');
	}
	else
	{
?>
     <form enctype="multipart/form-data" method="GET" action="Contribute.php"> 
	   <input type="hidden" name="Goal" value="<?php echo $Goal ?>" \>
	   <h1>Want to Give any Suggestions reguarding "<?php echo $_GET['Goal']; ?>"</h1>
	   <textarea name="Idea" rows="10" cols="80" maxlength="3200"></textarea>
	   <input type="Submit" name="Submit" \>
	 </form>
	 <a href="Download.php">Cancle and go Back</a>

<?php } ?>
</body>
</html>
