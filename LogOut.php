<?php 
     if(isset($_COOKIE['Id']))
	   {
	     setcookie('Id','',time()-3600);
		 setcookie('Password','',time()-3600);
		 setcookie('ThemeFolder','',time()-3600);
	   }
	   header('Location: '.'Login.php');
?>