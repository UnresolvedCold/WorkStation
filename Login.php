<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
 <meta http-equiv=“Content-Type” content=”text/html; charset=ISO-8859-1” />
 <title>WorkStation::Login</title>
 <link type="text/css" rel="stylesheet" href="Theme/default/Style_login.css" />
<link type="text/css" rel="stylesheet" href="Theme/default/Description_hover.css" />
</head>

<body>
<?php 
	 if(isset($_COOKIE['Id']))
	  {
	    
		header('Location: '.'MyProfile.php');
		setcookie('MoreThan1Attempt','',time()-(3600));
	  }
	  else
	  {
		
		  
    ?>
 <div id="form">

     <form method="POST" action="Authorize.php">
       
       <h1>Login to Access</h1>
       <div class="Login_Id">
	   <table>
         <tr>
           <th class="Login">Login Id :</th>
           <th><input class="text" type="text" name="Id" /></th>
         </tr>
         <tr>
           <th class="Pwd">Password :</th>
           <th><input type="password" name="Password"  /></th>
         </tr>
         <tr><th></th><th><input class="submit" type="submit" name="Submit" /></th>
         </tr>
       </table>
	   </div>
     </form>

 </div>

 <div id="temp">
  <h3>This is just a demo, Use your first name as Id and password</h3>
  <h3>Example: id::Cold password:: Cold</h3>
 
   <?php 
    if(isset($_COOKIE['MoreThan1Attempt'])){echo '<p>Wrong Id or Password</p>';}
	
   } ?>
  </div>
  
  </body>
</html>