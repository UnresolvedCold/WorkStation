<?php
if(!empty($_POST['PageTitle']))
{

	$Html=$_POST['HTMLCode'];
	$Css=$_POST['CSSCode'];
	$Js=$_POST['JSCode'];
	$Title=$_POST['PageTitle'];
	$Id=$_COOKIE['Id'];
	$Time=$_POST['Time'];
	date_default_timezone_set("UTC");
	$Date=$_POST['Date'];
	$Status="";
	
	$dbc=mysqli_connect('localhost','root','toor','demoWorkStation')or die("Error Connecting Database");
	$query="SELECT * From CustomPages Where Name='$Title' && Id='$Id' && Date='$Date' && Time='$Time'";
	$result=mysqli_query($dbc,$query) or die("error querriying");
	while($row=mysqli_fetch_array($result))
	{
	    $Status=$row['Status'];
		$Mapping=$row['Mapping'];
	}
	mysqli_close($dbc);
	
	$ExtraScript='function drag_start(event) // call it when start dragging
					{
					var style = window.getComputedStyle(event.target, null);
					var str = (parseInt(style.getPropertyValue("left")) - event.clientX) + '.'","'.' + (parseInt(style.getPropertyValue("top")) - event.clientY)+ '.'","'.' + event.target.id;
					event.dataTransfer.setData("Text",str);
					} ';
	$Dir="../CustomPages/".$Id;

	$Name="";
	if($Status=="Completed")
	{
	 $Name=$Title;
	}
	else
	{
	 $Name=$Title."_".$Id."_".$Date."_".$Time;
	}
	
    if($Mapping=="SingleFileFormat")
	{	
		chdir($Dir);
		ob_start();
		echo "<html><head><title>".$Title."</title>".
							"<style>".$Css."</style>".
							"<script>".$Js."</script>".
							"<script>".
							$ExtraScript." 
							</script></head>".
							"<body>".$Html."</body></html>";
								
		file_put_contents($Name.".php",ob_get_contents());
		echo "Your Work Is Saved In ".getcwd();
	}
	else 
	{
	  $CSSPath="CSS/".$Name.".css";
	  $JSPath="JavaScript/".$Name.".js";
	  $HTMLPath=$Name.".php";
	  
	    chdir($Dir);
		
		ob_start();
		echo "<html><head><title>".$Title."</title>".
							"<link type='text/css' rel='stylesheet' href='".$CSSPath."' />".
							"<script src='".$JSPath."'></script><script>".
							$ExtraScript." 
							</script></head>".
							"<body>".$Html."</body></html>";
								
		file_put_contents($HTMLPath,ob_get_contents());
		
		ob_start();
		echo $Css;							
		file_put_contents($CSSPath,ob_get_contents());
		
		ob_start();
		echo $Js;							
		file_put_contents($JSPath,ob_get_contents());
		
		echo "Your Work Is Saved In ".getcwd();
	  
	}
	
	
}	
else{
    echo "Not Saved No Title";
}


?>