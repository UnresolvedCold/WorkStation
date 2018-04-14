<html>
  <head>
     <title>WorkStation:: WorkOutNOw</title>
	 <link type="text/css" rel="stylesheet" href="Theme/<?php if(isset($_COOKIE['ThemeFolder'])){$Theme=$_COOKIE['ThemeFolder'];}else{$Theme='default';} echo $Theme;?>/Style_WorkOutNow.css" />
	 <link type="text/css" rel="stylesheet" href="Theme/default/Description_hover.css" />
  </head>
  
  <body>

   <div id="Entire">
	<?php
		require_once('Check.php');
		$Image_dir="Images/Goal/";
		$Doc_dir="Doc/Goal/";
		$Doc_Idea_dir="Doc/Ideas/";
		if(isset($_GET['Goal']))
		{
		setcookie('Goal',$_GET['Goal']);
		$Goal=$_GET['Goal'];
		
		$dbc=mysqli_connect('localhost','root','toor','demoWorkStation');
	?>

	<div id="MainDocument">
		   <?php
			   $query1="Select * from AllWorks";
			   $result=Mysqli_query($dbc,$query1) or die ("Query not done");
			   while($row=mysqli_fetch_array($result))
			   {
				 if($Goal==$row['Goal'])
				 {
				   echo '
						 <img src="'.$Image_dir.$row['Goal'].$row['Author'].'.'.$row['img_ext'].'" height="150" width="120" />
						 <div id="Description">
							  '.$row['Description'].'
						 </div>
						 <div id="MainFile">
							   <a href="'.$Doc_dir.$row['Goal'].$row['Author'].'.'.$row['doc_ext'].'">Main File</a>
						 </div>
						';
				 }
			   }		   
		   ?>
	</div>

	<div id="Brainstorming">
	   <table>
		  <?php 
		   
		   $query2="Select * from $Goal";
		   if(
		   $result2=mysqli_query($dbc,$query2))
		   {
			   while($row=mysqli_fetch_array($result2))
			   {
					echo ' <tr>
						   <th class="Author">'.$row['Author'].'</th>
						   <th class="Idea">'.$row['Idea'].'</th>';
						   
						   if(!empty($row['doc'])) { echo '<th class="Document"><a href="'.$Doc_Idea_dir.$row['doc'].'">Document</a></th>';}
						   
					echo' </tr>';
							   
			   }
		   }
		   else{
		        echo '<h2>Not Available : Perhaps The File Was Uploaded before the Update.</h2>
                      <h1>Entering any Data Will Result in Error !!!</h1>	';
					  
				} 
		}

		 ?>
		</table> 
	</div>
	<?php 
		 if(isset($_POST['Idea']))
		 {
			$Goal=$_COOKIE['Goal'];
			$Giver=$_COOKIE['Id'];
			$Idea=$_POST['Idea'];
			$doc=$_FILES['doc']['name'];
			$doc_ext=pathinfo($_FILES['doc']['name'],PATHINFO_EXTENSION);
			$dbc=mysqli_connect('localhost','root','toor','demoWorkStation')or die("Error Connecting Database");
			$query3="Insert into $Goal (Author,Idea,doc,doc_ext) Values('$Giver','$Idea','$doc','$doc_ext')";
			$result3=mysqli_query($dbc,$query3) or die("error querriying<br \>");	
			move_uploaded_file($_FILES['doc']['tmp_name'],$Doc_Idea_dir.$doc);		
			mysqli_close($dbc);
			setcookie('Goal','',(time()-(3600)));
			header('Location: '.'WorkOutNow.php?Goal='.$Goal);
		 }
		 else
		 {
		 ?>

	<div id="Form">
		 <form enctype="multipart/form-data" action="WorkOutNow.php" method="POST" />
			 <span id="para">Brainstorm:</span>
			           <textarea class="Area" name="Idea" rows="2" cols="80" maxlength="800"></textarea>
						<input class="file" type="file" name="doc" />
						<input class="Submit" type="Submit" name="Submit" />
		 </form>
		 <a class="Back" href="Download.php">Back</a>
	</div>
	<?php } ?>	
</div>	
</body>
</html>
