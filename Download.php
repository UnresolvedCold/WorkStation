<html>
  <head>
     <title>WorkStation:: AllWorks</title>
	 <link type="text/css" rel="stylesheet" href="Theme/<?php if(isset($_COOKIE['ThemeFolder'])){$Theme=$_COOKIE['ThemeFolder'];}else{$Theme='default';} echo $Theme;?>/Style_Download.css" />
	 <link type="text/css" rel="stylesheet" href="Theme/default/Description_hover.css" />
  </head>
  
  <body>
	  <div id="Entire">
		<h1>All Works</h1>

        <div id="Works">
		    <?php
			    require_once('Check.php');
			    $Image_dir="Images/Goal/";
		        $Doc_dir="Doc/Goal/";
				$dbc=mysqli_connect('localhost','root','toor','demoWorkStation')or die("Error Connecting Database");
				$query="SELECT * FROM AllWorks order by Date Desc , Time Desc";
				$result=mysqli_query($dbc,$query) or die("error querriying");
				//$count=0;
				while($row=mysqli_fetch_array($result))
				  {  
				   // $count=$count+1;
				   //  echo $count;
				   ?>
				   <div id="Files">
				   <?php
                     echo '
					 <span id="Contribute">
					 <a href="Contribute.php?Goal='.$row['Goal'].'">Contribute</a>
					 </span>					 
					 <div id="LinkToDoc">
					 <a href="WorkOutNow.php?Goal='.$row['Goal'].'">
					 <span id="Topic">'.$row['Goal'].'</span><br \><br \>
					 <img src="'.$Image_dir.$row['Goal'].$row['Author'].'.'.$row['img_ext'].'" height="150" width="120">'.
					 '<br \>( By '.$row['Author'].
					 ' on Date :'.$row['Date'].' at Time: '.$row['Time'].' )</a></div>';
					 if($row['IsCompleted']=='1'){echo '<h3 class="red">Work is Completed</h3>' ;}
					 echo '<div id="Description">'.$row['Description'].'</div>';
					?>
	                <div id="Delete">
					 <?php
					 if($row['Author']==$_COOKIE['Id'])
					 {
					 echo '
					 <a href="Delete.php?Goal='.$row['Goal'].'&amp; Author='.$row['Author'].'">Delete</a> ';
					 }
					 ?>
					 </div>
					 <div id="Edit">
					 <?php
					  if($row['Author']==$_COOKIE['Id'])
					  {
					 //  echo '<a href="EditFile.php?Goal='.$row['Goal'].'&amp; Author='.$row['Author'].'">Edit</a>';
					  }
					 ?>
					 </div>
					</div>
					<?php
				  }			
				
				mysqli_close($dbc);
			?>
	    </div>
		<div id="Links"><a href="MyProfile.php">Back To My Profile</a><br \>
		</div>		
	  </div>
  </body> 
</html>  