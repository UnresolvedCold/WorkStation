<html>
<head>

  <title>WorkStation::Page Editor</title>
  <link type="text/css" rel="stylesheet" href="../Theme/dark/Style_Admin_PageEdit.css" /> 
  <script src="../Javascript/Admin_PageEdit_v3.js"></script>
  <script>
    function drag_start(event) // call it when start dragging
    {
    var style = window.getComputedStyle(event.target, null);
    var str = (parseInt(style.getPropertyValue("left")) - event.clientX) + ',' + (parseInt(style.getPropertyValue("top")) - event.clientY)+ ',' + event.target.id;
    event.dataTransfer.setData("Text",str);
    } 
  </script>
  
  <span id="PageScript" class="invisible"></span>
  <span id="PageStyle"></span>
  
</head>

<body>
<?php 
    $Title=$_GET['Title'];
	$Id=$_GET['Id'];
	$Date=$_GET['Date'];
	$Time=$_GET['Time'];
	$Mapping=$_GET['Mapping'];
	$StatusOfPage=$_GET['StatusOfPage'];
	$Name="";
	
	if($StatusOfPage=="Completed")
	{
	   $Name=$Title;
	}
	else
	{
	$Name=$Title."_".$Id."_".$Date."_".$Time;
	}
	
	if($Mapping=="SingleFileFormat")
	{
	    $PagePath="../CustomPages/".$Id."/".$Name.".php";
		$WholePage=file_get_contents($PagePath,FILE_USE_INCLUDE_PATH);
	}
    else
    {
	    $CssPath="../CustomPages/".$Id."/CSS/".$Name.".css";
		$JsPath="../CustomPages/".$Id."/JavaScript/".$Name.".js";
		$HTMLPath="../CustomPages/".$Id."/".$Name.".php";
	    $WholePage="<style>".file_get_contents($CssPath,FILE_USE_INCLUDE_PATH)."</style>".
					"<script>".file_get_contents($JsPath,FILE_USE_INCLUDE_PATH)."</script>".
					file_get_contents($HTMLPath,FILE_USE_INCLUDE_PATH);
	}
	echo "<textarea class='invisible' id='WholePage'>".$WholePage."</textarea>";

?>


<form enctype="multipart/form-data" method="POST" action="Admin_CreatePage _v3.php" >
  <?php 
   	echo "<input class='invisible' type='text' name='Time' value='".$Time."' />";
	echo "<input class='invisible' type='text' name='Date' value='".$Date."' />";
	?>
    <div id="Entire">
      <div id="PageLayout" ></div>
	  <div id="PageLayout_info" class="invisible">This is where you will make your page</div>

      <div id="Tools">
        <div id="Html_Tools" class="visible">
			<div id="Html_Tools_Add">
				<table>
					<tr>
						<th>PageTitle :</th><th><input type="text" id="PageTitle" name="PageTitle" value="<?php echo $Title; ?>" /></th>
					</tr>
					<tr>				
						<th colspan="2" class="default">Add Component :</th>
					</tr>
					<tr>		
						<th><input type="button" id="Paragraph" value="Paragraph" /></th>
						<th><input type="text" id="Paragraph_Text" value="Paragraph" /></th>
					</tr>
					<tr>	
						<th><input type="button" id="Heading" value="Heading" /></th>
						<th><input type="text" id="Heading_Text" value="Heading(H1)" /></th>
					</tr>
					<tr>					
						<th><input type="button" id="Button" value="Button" /></th>
						<th><input type="text" id="Button_Text" value="Button" /></th>
					</tr>
					<tr>
						<th><input type="button" id="Link" value="Link" /></th>
						<th><input type="text" id="Link_Text" value="Link" /></th>
					</tr>
					<tr>
						<th><input type="button" id="Input" value="Input" /></th>
						<th><input type="text" id="Input_Text" value="Input" /></th>
					</tr>
					<tr>					
						<th><input type="button" id="Division" value="Division" /></th>
						<th><input type="text" id="Division_Text" value="Division" /></th>
					</tr>			
				</table>
			</div>	
            <div id="Html_Tools_Added">
			    <table id="ComponentArea">
				    <tr>
					    <th> Id </th><th>Type</th><th>InnerText</th>
					</tr>	
				</table>
            </div>			
	    </div>
	  
	    <div id="Css_Tools" class="invisible">
		  <table class="border">
		      <tr>
				<th colspan="2" class="default">Colors</th>
			  </tr>
              <tr>			  
				<th>Text-color:</th><th><input type="text" id="Css_Tools_Color" value="#000000"></th>
			  </tr>
              <tr>			  
				<th>Background-color:</th><th><input type="text" id="Css_Tools_Background_Color" value="#FFFFFF"></th>
			  </tr>
              <tr>			  
				<th colspan="2" class="default">Size Of Element</th>
			  </tr>
              <tr>			  
				<th>Height:</th><th><input type="text" id="Css_Tools_Size_Height" value="null"></th>
			  </tr>
              <tr>			  
				<th>Width:</th><th><input type="text" id="Css_Tools_Size_Width" value="null"></th>
              </tr>	
              <tr>			  
				<th colspan="2" class="default">Position</th>
			  </tr>
              <tr>			  
				<th>Type:</th><th><input type="text" id="Css_Tools_Position" value="absolute"></th>
			  </tr>
              <tr>			  
				<th>Top:</th><th><input type="text" id="Css_Tools_Position_Top" value="0px"></th>
			  </tr>
              <tr> 			  
				<th>Left:</th><th><input type="text" id="Css_Tools_Position_Left" value="0px"></th>
			  </tr>
              <tr>			  
				<th>Opacity:</th><th><input type="text" id="Css_Tools_Opacity" value="1"></th>
			  </tr>
              <tr>			  
				<th>Visibility:</th><th><input type="text" id="Css_Tools_Visibility" value="Visible"></th>
			  </tr>	
			  <tr>			  
				<th colspan="2" class="default">Spacing</th>
			  </tr>
              <tr>			  
				<th>Padding:</th><th><input type="text" id="Css_Tools_Padding" value="0px"></th>
			  </tr>	
              <tr>			  
				<th>Margin:</th><th><input type="text" id="Css_Tools_Margin" value="0px"></th>
			  </tr>	
              <tr>			  
				<th>Border-Width:</th><th><input type="text" id="Css_Tools_BorderWidth" value="0px"></th>
			  </tr>	
              <tr>			  
				<th>Border-Color:</th><th><input type="text" id="Css_Tools_BorderColor" value="#FFFFFF"></th>
			  </tr>
              <tr>			  
				<th>Border-Type:</th><th><input type="text" id="Css_Tools_BorderStyle" value="solid"></th>
			  </tr>			  
              <tr>
			    <th colspan="2" class="default">Inner Text</th>
              </tr>			  
              <tr>			  
				<th>Content:</th><th><input type="text" id="Css_Tools_Content" value="default"></th>
			  </tr>	
              <tr>			  
				<th>Alignment:</th><th><input type="text" id="Css_Tools_Alingment" value="default"></th>
			  </tr>	
              <tr>			  
				<th>Font Size:</th><th><input type="text" id="Css_Tools_FontSize" value="default"></th>
			  </tr>		
              <tr>			  
				<th>Font Family:</th><th><input type="text" id="Css_Tools_FontFamily" value="default"></th>
			  </tr>		
              <tr>			  
				<th>Text Decoration:</th><th><input type="text" id="Css_Tools_TextDecoration" value="none"></th>
			  </tr>				  
		  </table>	
			
		</div>
	  
	    <div id="Js_Tools" class="invisible">JS is Active
		</div>
		
		<div id="Save_Tools" class="invisible">
			<table>
			   <tr>
			       <th>Type Of Mapping :</th> <th><select name="mapping"><option value="<?php if($Mapping=="SingleFileFormat"){echo "Single File Format";}
																								else {echo "Multi File Format";}?>">
																						<?php if($Mapping=="SingleFileFormat"){echo "Single File Format";}
																						else {echo "Multi File Format";}?>						
				                                                         </option>
				    </th>
					</tr>
					<tr>
				   <th>Status Of Page :</th><th><select name="StatusOfPage"><option value="<?php if($StatusOfPage=="Completed"){echo "Completed";}
																								else {echo "NotCompleted";}?>">
																						<?php if($StatusOfPage=="Completed"){echo "Completed";}
																								else {echo "NotCompleted";}?>					
				                                                         </option>
				    </th> 
			   </tr>
			</table>		
		    <input type="Submit" id="SaveButton" value="SAVE" class="Submit" />
		</div>
		
	    <div id="Help_Tools" class="invisible">
		</div>
	  
      </div>
	  <div id="Tools_tab" class="visible"><input type="button" id="Html" class="Active" value="HTML" />
	                                      <input type="button" id="Css" class="inActive" value="CSS " />
										  <input type="button" id="Help" class="inActive" value="?" />
										  <input type="button" id="Save" class="inActive" value="SAVE" />
											  
	 </div>		
	 <div id="CodeArea" class="CodeArea_default">
			<span id="Head_HTMLCode">HTML</span><span id="Head_CssCode">CSS</span><span id="Head_JsCode">JS</span><span><input type="button" id="moveup" value="~"></span>
			<span id="KeyCode"><input type="text" id="KeyCodeIn" /><input type="text" id="KeyCodeOut"/></span>
			
				<textarea id="HTMLCodeFormed" rows="30" cols="60" name="HTMLCode"></textarea>
				<textarea id="CssCodeFormed" rows="30" cols="60" name="CSSCode"></textarea>
				<textarea id="JsCodeFormedNoE" rows="30" cols="60" name="JSCode"></textarea>
				
			
     </div> 			
   </div>
   </form>
 <textarea id="JsCodeFormed" rows="30" cols="60"></textarea> 	  
</body>