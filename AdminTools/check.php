<?php 
      if(empty($_COOKIE['Id']))
	  {
	    
	    header('Location: ' . ' ../LogOut.php');
	  }
	 /* else{
	        $User=$_COOKIE['Id'];
			$dbc=mysqli_connect('localhost','root','toor','demoWorkStation')or die("Error Connecting Database");
			$query="SELECT * FROM LoginDetails where Id='$User'";
			$result=mysqli_query($dbc,$query) or die("error querriying");
			while($row=mysqli_fetch_array($result))
			  {
				if((!strcmp($row['AdvType'],"Visible")))
				{
				  echo 'true';
				}
				else
				{
                  echo 'false';
				//header('Location: ' . ' ../LogOut.php');
				}
			    }	
			  
            mysqli_close($dbc);			  
		
		  }*/
?>