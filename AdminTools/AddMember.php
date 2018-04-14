<?php
    if(isset($_POST['Id_new']))
	  {
	  $Id=$_POST['Id_new'];
      $Password=$_POST['Password_new'];
	  
	  $dbc=mysqli_connect('localhost','root','toor','demoWorkStation')or die("Error Connecting Database");
	  $query="Insert into LoginDetails(Id,Password) values('$Id','$Password')";
	  $result=mysqli_query($dbc,$query) or die("error querriying");


				
		mysqli_close($dbc);
	    header('Location: '.'AdvSettings.php');
	  }
	  else{

?>

<form method="POST" action="AddMember.php">
  Enter Id : <input type="Text" name="Id_new" \>
  Enter Password :<input type="Password" name="Password_new" \>
  <input type="Submit" name="Submit" \>
</form>
<?php }?>