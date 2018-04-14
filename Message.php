<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
 <meta http-equiv=“Content-Type” content=”text/html; charset=ISO-8859-1” />
 <meta http-equiv=“refresh” content=”0.1; URL=Message.php” />
 <title>WorkStation::ChatScreen</title>
 <link type="text/css" rel="stylesheet" href="Theme/default/Style_Message.css" />
 <link type="text/css" rel="stylesheet" href="Theme/default/Description_hover.css" />

</head>

<body>
<?php
    require_once('Check.php');
?>
<div id="Entire">
  <div id="form">

     <form method="POST" action="Message.php">
       
       <h1>Chat Screen</h1>
		   <textarea name="Message" maxlength="800" value="<?php if(isset($_POST['Message'])){echo $_POST['Message'];} ?>" rows="1" cols="30" ></textarea>
		   <input id="Send" type="Submit" name="Send" value="Send"/>
     </form>
	 </div>
	 <div id="Messages">
	  <table>
	     <tr><th>Time</th><th>Sender</th><th>Message</th></tr>
		 <?php 
		   $dbc=mysqli_connect('localhost','root','toor','demoWorkStation') or die ("error connecting database");
	
		   if(isset($_POST['Send'])&&!empty($_POST['Message']))
		   {
		    $message=mysqli_real_escape_string($dbc, trim($_POST['Message']));
			$Sender=$_COOKIE['Id'];
			$query1="Insert Into ChatDetails(Message,Sender,time,date) Values ('$message','$Sender',now(),now())";
			$result1=mysqli_query($dbc,$query1)or die("error sending message");
			header('Location:'.'Message_DeletePOST.php');
			}
			$query2="SELECT * FROM ChatDetails Order By date DESC, time DESC";
			$result2=mysqli_query($dbc,$query2) or die("error querriying");
			while($row=mysqli_fetch_array($result2))
				  {
					 echo '<tr><th class="time">'.$row['time'].'</th><th class="Sender">'.$row['Sender'].'</th><th class="Message">'.htmlspecialchars($row['Message']).'</th></tr>';
				  }			
					
			mysqli_close($dbc);
			
			?>
		</table>	
	 </div>
	
	 <div id="Back"><a href="MyProfile.php">Back To Work</a></div>
	 <div id="Refresh"><a href="Message.php">Refresh</a></div>
		
</div>

</body>
</html>