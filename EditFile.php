<?php
    ini_set('upload_max_filesize','100M');
    ini_set('post_max_size','100M');
    ini_set('max_input_time',7200);
    ini_set('max_execution_time',7200);	

if(isset($_POST['Description'])){
	 $Author=$_COOKIE['Author_a'];
	 $Goal=$_COOKIE['Goal_a'];

	 $dbc = mysqli_connect('localhost','root','toor','demoWorkStation') or die("Error Connecting To Database");
		
     $query2="Select * from AllWorks";
	 $result2=mysqli_query($dbc,$query2);
	 while($row=mysqli_fetch_array($result2))
	 {
	     if(($row['Author']==$Author)&&($row['Goal']==$Goal))
		 {
		 
					 if(isset($_FILES['doc']['tmp_name']))
					  {
					  $file=$_FILES['doc']['name'];
					  }
					  else{$file=$row['file'];}
					  
					 if(isset($_FILES['image']['tmp_name']))
					  {
					  $img=$_FILES['image']['name'];
					  }else {$img=$row['img'];}
					  
											  
					  if(isset($_POST['completed'])){$IsCompleted='1';}
						 else {
													  if($row['IsCompleted']==1){$IsCompleted='1';}
													  else{$IsCompleted='0';}
							  }					  
					  
					  $description=$_POST['Description'];
					  
					 require_once('Delete.php');
					 
					 $Image_dir="Images/Goal/";
					 $Doc_dir="Doc/Goal/";
					 $IMAGE_extension=pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
		             $DOC_extension=pathinfo($_FILES['doc']['name'],PATHINFO_EXTENSION);
					 
					 $query="INSERT INTO AllWorks(GoalId,Goal,Author,file,img,Description,IsCompleted,Date,Time,img_ext,doc_ext)
			                    values(0,'$Goal','$Author','$file','$img','$Description',$IsCompleted,now(),now(),'$IMAGE_extension','$DOC_extension')";
		             $result=mysqli_query($dbc,$query)or die ("ERROR query");
					
                     move_uploaded_file($_FILES['image']['tmp_name'],$Image_dir.$Goal.$Author.'.'.$IMAGE_extension);
                     move_uploaded_file($_FILES['doc']['tmp_name'],$Doc_dir.$Goal.$Author.'.'.$DOC_extension); 					
	

		 }
	 }
    
     mysqli_close($dbc);


								 

								  
                                 
								 
                                 //Extract GoalData For Further Use;
								 //Remove Goal();
								 //AddGoal();
}

else{
     setcookie('Author_a',$_GET['Author']);
     setcookie('Goal_a',$_GET['Goal']);
	 $Author=$_GET['Author'];
	 $Goal=$_GET['Goal'];
	 $Image_dir="Images/Goal/";
	 $Doc_dir="Doc/Goal/";
	 $dbc = mysqli_connect('localhost','root','toor','demoWorkStation') or die("Error Connecting To Database");
		
     $query2="Select * from AllWorks";
	 $result2=mysqli_query($dbc,$query2);
	 while($row=mysqli_fetch_array($result2))
	 {
	     if(($row['Author']==$Author)&&($row['Goal']==$Goal))
		 {
		?>
		    <form method="POST" Action="EditFile.php">
			<textarea name="Description" rows="10" cols="80" ><?php echo $row['Description'];?>
			</textarea><br \>
			
			<input type="checkbox" name="completed" value="1" />Completed <br \>
            <input type="checkbox" name="notcompleted" value="0" />Not Completed <br \>
			
			Image Related to Goal :  </th><th><input type="file" name="image" ><br \>
			Document related to Goal (zip of pdf): <input type="file" name="doc" > <br \>
			   
			<input type="Submit">
			</form>
        <?php
		 }
	 }
    
     mysqli_close($dbc);
}	 
?>
<br \><a href="Download.php">Back</a>