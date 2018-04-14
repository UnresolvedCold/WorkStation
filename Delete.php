<?php
     if($_GET['Author']&&$_GET['Goal']){
	 $Author=$_GET['Author'];
	 $Goal=$_GET['Goal'];
	 $Image_dir="Images/Goal/";
	 $Doc_dir="Doc/Goal/";
	 $Doc_Idea_dir="Doc/Ideas/";
	 $Goal_WithoutSpaces=preg_replace('/\s+/', '',$Goal);
	 echo 'Deleted';
	 $dbc = mysqli_connect('localhost','root','toor','demoWorkStation') or die("Error Connecting To Database");
     
	 //unlink Download Link for Data in Doc/ideas
	 $query0="Select * from $Goal";
	 $result0=mysqli_query($dbc,$query0);
	 while($row=mysqli_fetch_array($result0))
	 {
	   if(!empty($row['doc']))
	   {
	   unlink($Doc_Idea_dir.$row['doc']);
	    }
	 }
	 
	 $query1="Drop Table $Goal_WithoutSpaces";
	 $result1=mysqli_query($dbc,$query1)or die ("ERROR Droping");
		 	
		
     $query2="Select * from AllWorks";
	 $result2=mysqli_query($dbc,$query2);
	 while($row=mysqli_fetch_array($result2))
	 {
	     if(($row['Author']==$Author)&&($row['Goal']==$Goal))
		 {
		  $IMAGE_extension=$row['img_ext'];
		  $DOC_extension=$row['doc_ext'];
		 if($row['img']){ unlink($Image_dir.$Goal.$Author.'.'.$IMAGE_extension);}	
          unlink($Doc_dir.$Goal.$Author.'.'.$DOC_extension);
		 }
	 }
	 

	 
     $query3="Delete From AllWorks where Goal='$Goal'";	
     $result3=mysqli_query($dbc,$query3)or die ("ERROR Deleting");
    
     mysqli_close($dbc);
}	 
?>
<br \><a href="Download.php">Back</a>