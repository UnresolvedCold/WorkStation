<html>
<head>
  <title>WorkStation::Upload</title>
  <link type="text/css" rel="stylesheet" href="Theme/<?php if(isset($_COOKIE['ThemeFolder'])){$Theme=$_COOKIE['ThemeFolder'];}else{$Theme='default';} echo $Theme;?>/Style_Upload.css" /> 
  <link type="text/css" rel="stylesheet" href="Theme/default/Description_hover.css" />
</head>
      
<body>
<?php
    require_once('Check.php');
    ini_set('upload_max_filesize','100M');
    ini_set('post_max_size','100M');
    ini_set('max_input_time',7200);
    ini_set('max_execution_time',7200);	
  
  if(empty($_POST['Goal'])||empty($_FILES['doc']['tmp_name']))
    {	
	?>
	  <div id="Entire">
	  <h1>Upload Your Document</h1>
	  <form enctype="multipart/form-data" method="POST" action="upload.php"> 
	  
	   <table>
		 <tr>
		   <th>Goal :<span id="red">*</span> </th><th><input type="text" name="Goal"/></th>
		 </tr>
		 <tr>
		   <th>Status Of Goal :</th>
		   <th><input type="checkbox" name="completed" value="1" />Completed <br \>
               <input type="checkbox" name="notcompleted" value="0" />Not Completed
		   </th>
		 </tr>
		 <tr>
		   <th alt="Shown as Goal Thumbnail">Image Related to Goal :  </th><th><input type="file" name="image" > </th>
											 
		 <tr>
		   <th>Document related to Goal (zip of pdf): <span id="red">*</span> </th><th><input type="file" name="doc" > </th>
		 </tr>
		</table>
		
		<textarea name="description" rows="10" cols="58">Here is a short description of what I am doing:</textarea><br \>
		<input type="submit" value="Submit Your Work" class="Submit"\> 
	   </form>
	   </div>
	   <a class="Back" href="MyProfile.php">Back</a>
	   <div id="Message">
	      <span>Fields Marked with Astreak </span><span id="red">(*)</span><span> are cumpulsory</span>
	   </div>
<?php 
    }
    else{
	      $IMAGE_extension=pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
		  $DOC_extension=pathinfo($_FILES['doc']['name'],PATHINFO_EXTENSION);
		  $Goal=preg_replace('/\s+/', '',$_POST['Goal']);
		  $Author=$_COOKIE['Id'];
		  $file=$_FILES['doc']['name'];
		  if(isset($_FILES['image']['tmp_name']))
		  {
		  $img=$_FILES['image']['name'];
		  }
		  else {$img='Default';}
		  $description=$_POST['description'];
		  $IsCompleted='0';
		  if(isset($_POST['completed'])){$IsCompleted='1';}
		  if(isset($_POST['notcompleted'])||empty($_POST['completed']))
		  {
		   $IsCompleted='0';
		   
		  }
	      $dbc = mysqli_connect('localhost','root','toor','demoWorkStation') or die("Error Connecting To Database");
		  $query="INSERT INTO AllWorks(GoalId,Goal,Author,file,img,Description,IsCompleted,Date,Time,img_ext,doc_ext)
			                    values(0,'$Goal','$Author','$file','$img','$description',$IsCompleted,now(),now(),'$IMAGE_extension','$DOC_extension')";
		  $result=mysqli_query($dbc,$query)or die ("ERROR query");
		  $Image_dir="Images/Goal/";
		  $Doc_dir="Doc/Goal/";

          move_uploaded_file($_FILES['image']['tmp_name'],$Image_dir.$Goal.$Author.'.'.$IMAGE_extension);
          move_uploaded_file($_FILES['doc']['tmp_name'],$Doc_dir.$Goal.$Author.'.'.$DOC_extension); 
		  
		  $Goal_WithoutSpaces=preg_replace('/\s+/', '',$Goal);
		  $query2="Create Table $Goal_WithoutSpaces (Author varchar(10),Idea varchar(3200),Type varchar(1),doc varchar(30),doc_ext varchar(5))";
		  $result2=mysqli_query($dbc,$query2)or die ("ERROR query2");

		  $query3="SELECT * FROM LoginDetails ";
		  $result3=mysqli_query($dbc,$query3) or die("error query 3");
		  while($row=mysqli_fetch_array($result3))
		  {  
		    $A=$row['Id'];
		    $query4= "ALTER TABLE $Goal_WithoutSpaces ADD $A varchar(1) ";
			$result4=mysqli_query($dbc,$query4) or die("error Id");
          }
          mysqli_close($dbc); 
		  ?>
		  <div id="Verification">
		  
			<div id="Top">
			     <h1> <?php echo $Goal;?></h1><h3><?php if($IsCompleted=='1'){echo 'And The Goal is Completed';}
			      else if($IsCompleted=='0'){echo 'And The Goal is Not Completed';}?></h3>
			</div>
			
			<div id="Image">
			     <h2><?php echo $_FILES['image']['name'];?><br \></h3>
		         <img src="<?php echo $Image_dir.$Goal.$Author.'.'.$IMAGE_extension;?>" height=250 width=250 \><br \>
				 <h4>Files Uploaded Successfully</h4>
			</div>
			
			<div id="BackToWork">
			      <a class="Back" href="MyProfile.php">Back To Work</a>
			</div>
			
		  </div>	 
<?php		
        }	
?>   
</body>
</html>