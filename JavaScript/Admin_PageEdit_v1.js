function init()
{
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// 1       Algorithm            Right Side Tabs Active-Inactive Property

     var Layout=document.getElementById("PageLayout");         //Init Layout Reference                                  ref
	 var Tabs=["Html","Css","Save","Help"];               //Tabs Dictionary                                                     dic             
	 var Tab=[];                                               //Tabs                                                   ref
	 var ToolsUnderTab=[];                                     //Tab Tools                                              ref
     for(var i=0;i<Tabs.length;i++)                            //Init Tab and ToolsUnderTab
	 {
	   Tab[i]=document.getElementById(Tabs[i]);
	   ToolsUnderTab[i]=document.getElementById(Tabs[i]+"_Tools")
	   Tab[i].onclick=Switch;                                  
	 }
	 
// 1        Function

	function Switch(e)                                         //Switch Tabs On-Off
		{
          for(var i=0;i<Tabs.length;i++)
		  {
		    if(this==Tab[i])
			{
			  Tab[i].setAttribute("class","Active");
			  ToolsUnderTab[i].setAttribute("class","visible");
			}
			else
			{
			  Tab[i].setAttribute("class","inActive");
			  ToolsUnderTab[i].setAttribute("class","invisible");
			}
		  }
		}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	 

// 2 	     Algorithm                Adding Component When Usr Clicks on an Item

	 var AvailableTags=["Paragraph","Heading","Button","Link",          //All the Tags which usr can Add                                dic
	                    "Input","Division"]; 
	 var AvailableTagsHTMLStyle=["p","h1","button","a","input",         //Tags parsed by HTML                                           dic 
	                            "div"]; 
								
	 var AvailableTagsRef=[];                                           //Tags Reference                                     ref
     var No=0;                                                   //Keep Track Of Total Components (Tag) Added By Usr                              int

	 for(var i=0;i<AvailableTags.length;i++)                     //Init AvailableTagsRef  
	 {
	   AvailableTagsRef[i]=document.getElementById(AvailableTags[i]);
	   AvailableTagsRef[i].onclick=AddComponent;
     }
	 

//2           Function
	function AddComponent()
		{
		   var TagName="";                                  
		   for(var i=0;i<AvailableTags.length;i++)
		   {
              if(this==AvailableTagsRef[i])                     //Check if it is valid Tag
			  {                                                                   
			    TagName=AvailableTagsHTMLStyle[i];              //Assigning Ref to a smaller word
				var element=document.createElement(TagName);    //create element with name = Tag
			    var textNode=document.createTextNode(document.getElementById(AvailableTags[i]+"_Text").value); //Create Text inside Tags
			    element.appendChild(textNode);                  //Add Text to Element           
				var style=document.createElement("style");      //Create a new element for Styling
				style.setAttribute("type","text/css");          //And Styling is Css
				style.setAttribute("id","Style_Id_"+No);        //Give All Style element a particular Id    Style_Id_<--NUM-->
				document.getElementById("PageStyle").appendChild(style);       
				
				value="#Id_"+No+                                //A default style                                                           dic            2
				      "{color:black;background-color:#EEEEEE;"
				       +"position:absolute;top:100px;left:200px;"
                       +"}";					   
				style.innerHTML=style.innerHTML+value;          //Add the default style
			    element.setAttribute("id","Id_"+No);            //Give the element a unique Id              Id_<--NUM-->                                                        
				element.setAttribute("draggable","true");       //Make The Elemnt Draggable
				element.setAttribute("ondragstart","drag_start(event)"); 
				
				if(AvailableTagsHTMLStyle[i]=="a")              //Links Must Have A Link
				{
				  var href="../custom/pages/Link.html";
				  element.setAttribute("href",href);
				}
				
			    document.getElementById("PageLayout").appendChild(element); //Element Created in Layout
				
			//The Down area is for showing the element in tab of html
				//////////////////////////////////////////////////////////
				
				var AddedComponentArea=document.getElementById("ComponentArea");   //This is where Files will be shown
							
                var cmp_tr=document.createElement("tr");         //Create a tr element
				cmp_tr.setAttribute("Id","Id_ComponentArea_"+No); // Create its Id
				AddedComponentArea.appendChild(cmp_tr);          //Insert the tr Element
				
				var Id=document.createTextNode("Id_"+No);        //Id textNode
				var Type=document.createTextNode(AvailableTags[i]);              //Type textNode
				var InnerText=document.createTextNode(document.getElementById(AvailableTags[i]+"_Text").value);              //inner text textNode
				
				var cmp_th_Id=document.createElement("th");   //create th elements for Id
				cmp_th_Id.appendChild(Id);                    //load its value
				cmp_th_Id.setAttribute("Id","th_Id"+No);      //set an Id for further access
				document.getElementById("Id_ComponentArea_"+No).appendChild(cmp_th_Id); //Append it
				
				var cmp_th_Type=document.createElement("th");   //create th elements for Type
				cmp_th_Type.appendChild(Type);                  //load its value
				cmp_th_Type.setAttribute("Id","th_Type"+No);    //set an Id for further access 
				document.getElementById("Id_ComponentArea_"+No).appendChild(cmp_th_Type);	//Append it		

				var cmp_th_InnerText=document.createElement("th");   //create th elements for Type
				cmp_th_InnerText.appendChild(InnerText);                    //load its value
				cmp_th_InnerText.setAttribute("Id","th_InnerText"+No);    //set an Id for further access 
				document.getElementById("Id_ComponentArea_"+No).appendChild(cmp_th_InnerText);	//Append it					
				

				//////////////////////////////////////////////////////////			
				
				No++;	
				ShowAll();	

			  }
		   }

		}	 

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	 

// 3              Algorithm              Modifying The Created Element

     var Property=[                                           //Css Styles                                                                dic                 1
	               "Color","Background_Color","Position","Position_Top","Position_Left","Size_Height","Size_Width","Opacity",
                   "Visibility","Alingment","FontSize","FontFamily","Padding","Margin","BorderWidth","BorderColor","BorderStyle"				   
				  ];                                         
	 var PropertyRef=[];                                      //Reference to Styles                                            ref
	 for(var i=0;i<Property.length;i++)                       //Init Reference
	    {
		    PropertyRef[i]=document.getElementById("Css_Tools_"+Property[i]);
		}	
     document.getElementById("Entire").onmouseover=ReadyForEdit;
	 var selectedElement;
	 var selectedElementStyle;
	 var target;	 
	 

// 3            Function

	function  ReadyForEdit()
	   {
	    for(var i=0;i<No;i++)
         {
		    var ele=document.getElementById("Id_"+i);
			var ele_sty=document.getElementById("Style_Id_"+i);
			ele.onclick=selectIt;
			var htmltab_ele=document.getElementById("Id_ComponentArea_"+i);
			htmltab_ele.onclick=selectIt;
			
			
			for(var j=0;j<PropertyRef.length;j++)
			{
			    PropertyRef[j].onkeypress=ChangeIt;
				document.getElementById("Css_Tools_Content").onkeypress=ChangeIt;
			}
         }

		 
		 
		function selectIt()                                                //Select Element and Style
			 {
				selectedElement=this;
				for(var i=0;i<PropertyRef.length;i++)
				   {
					   if(this==document.getElementById("Id_"+i))
						{
						  selectedElementStyle=document.getElementById("Style_Id_"+i);
						  target=i;
						  
						}
						else
						if(this==document.getElementById("Id_ComponentArea_"+i))
						{
						  selectedElementStyle=document.getElementById("Style_Id_"+i);
						  target=i;
						  selectedElement=document.getElementById("Id_"+i);
						  
						}
						
				   }
				   
				   for(var i=0;i<No;i++)
					 {
						if(i==target)
						{
						   document.getElementById("th_Id"+i).setAttribute("class","Selected");
						   document.getElementById("th_Type"+i).setAttribute("class","Selected");
						   document.getElementById("th_InnerText"+i).setAttribute("class","Selected");
						}
						else
						{
						  document.getElementById("th_Id"+i).setAttribute("class","notSelected");
						   document.getElementById("th_Type"+i).setAttribute("class","notSelected");
						   document.getElementById("th_InnerText"+i).setAttribute("class","notSelected");						  
						}
					 }
				GetValues();
				return false;
			 }
			 
		function ChangeIt(e)
			 {
			 if(e.keyCode===13)
					{
					  selectedElementStyle.innerHTML="#Id_"+target+
										 "{"+
										 "color:"+PropertyRef[0].value+";"+
										 "background-color:"+PropertyRef[1].value+";"+
										 "position:"+PropertyRef[2].value+";"+
										 "top:"+PropertyRef[3].value+";"+
										 "left:"+PropertyRef[4].value+";"+
										 "height:"+PropertyRef[5].value+";"+
										 "width:"+PropertyRef[6].value+";"+
										 "opacity:"+PropertyRef[7].value+";"+
										 "visibility:"+PropertyRef[8].value+";"+
										 "text-align:"+PropertyRef[9].value+";"+
										 "font-size:"+PropertyRef[10].value+";"+
										 "font-family:"+PropertyRef[11].value+";"+
										 "padding:"+PropertyRef[12].value+";"+
										 "margin:"+PropertyRef[13].value+";"+
										 "border-width:"+PropertyRef[14].value+";"+
										 "border-color:"+PropertyRef[15].value+";"+
										 "border-style:"+PropertyRef[16].value+";"+
										 "}";
                      PutInnerHtml(selectedElement);
					  PutInnerHtmlInTab(selectedElement);
					} 
			 }
			 
		function GetValues()  //Modify dic at 1 and 2  // Change lines at 96 and 142                                           
			 {
				raw_Property=selectedElementStyle.innerHTML;
				var int_1=raw_Property.split("{");
				var int_2=int_1[1].split("}");
				var int_3=int_2[0].split(";");
				//color | background-color | position | top |left |height|width|opacity|visibility|Alingment|FontSize|Padding|Margin|Border
				for(var k=0;k<int_3.length-1;k++)
				{
				   var int_4=int_3[k].split(":");
				   PropertyRef[k].value=int_4[1];
				}
				GetInnerHtml(selectedElement);
			 }
			 
		function GetInnerHtml(e)
		   {
               document.getElementById("Css_Tools_Content").value=e.innerHTML;
		   }	
        
        function PutInnerHtml(e)
           {
		     e.innerHTML=document.getElementById("Css_Tools_Content").value;
           }	
		   
        function PutInnerHtmlInTab(e)
          {	
		     for(var i=0;i<PropertyRef.length;i++)
			  {
			     if(e==document.getElementById("Id_"+i))
				 {
				    document.getElementById("th_InnerText"+i).innerHTML=e.innerHTML;
				 }
			  }
          }	
		 
		ShowAll();	
		    		   
	   }
	   
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// 4                 Algorithm                  Showing The formed WebPage and Modifying
       ShowAll();
	   document.getElementById("HTMLCodeFormed").onkeypress=ModifyAll;
	   document.getElementById("CssCodeFormed").onkeypress=ModifyAll;
	   document.getElementById("JsCodeFormed").onkeypress=ModifyAll;
  
//4                  Function
      function ShowAll()
			{
			ShowHTML();
			ShowCSS();
			ShowJS();
			function ShowHTML()
				{
					var HTMLCode=document.getElementById("PageLayout").innerHTML;
					var int1=HTMLCode.split(">");
					var int2="";
					for(var i=0;i<int1.length;i++)
					{
					    if(i==0)
						{
						int2=int2+int1[i];
						}
						else
						{
					    int2=int2+">\n"+int1[i];
						}
					}
					
					var int3=int2.split("<");
					var int4="";
					for(var i=0;i<int3.length;i++)
					{
					    if(i==0)
						{
						int4=int4+int3[i];
						}
						else
						{
					    int4=int4+"\n"+"<"+int3[i];
						}
					}

					document.getElementById("HTMLCodeFormed").value=int4;
					
				}
				
			function ShowCSS()
				{
					var CSSCode="";
					
					for(var i=0;i<document.getElementsByTagName("style").length;i++)
						{					
							CSSCode=CSSCode+document.getElementsByTagName("style")[i].innerHTML;
						}

					var notreqCSSCode=CSSCode.split("#Id");
					CSSCode="";
					
					for(var i=1;i<notreqCSSCode.length;i++)
					{
					    CSSCode=CSSCode+"#Id"+notreqCSSCode[i];
					}
					
					var CodeArray=CSSCode.split(";");
					CSSCode="";
					for(var i=0;i<CodeArray.length;i++)
						{
						 if(i==CodeArray.length-1)
							 {
								CSSCode=CSSCode+CodeArray[i]+"\n";
							 }
						 else
							 {
								CSSCode=CSSCode+CodeArray[i]+";\n";
							 }
						}
						
					var CodeArray2=CSSCode.split("}");
					CSSCode="";
					for(var i=0;i<CodeArray2.length;i++)
						{
						   if(i==0)
						   {
						   CSSCode=CSSCode+CodeArray2[i];
						   }
						   else
						   {
						   CSSCode=CSSCode+"}\n"+"\n"+CodeArray2[i];
						   }
						}
					
					var CodeArray3=CSSCode.split("{");
					CSSCode="";
					for(var i=0;i<CodeArray3.length;i++)
						{
						   if(i==0)
						   {
						   CSSCode=CSSCode+CodeArray3[i];
						   }
						   else
						   {
						   CSSCode=CSSCode+"\n"+"{"+"\n"+CodeArray3[i];
						   }
						}	
					
					document.getElementById("CssCodeFormed").value=CSSCode;
				}
			function ShowJS()
				{
				//No Need To Show
				}
				
			}
	  function ModifyAll(e)
			{
			setTimeout(Modify,10);
			
				function Modify()
					{
					    //HTML COde Modification
						HTMLCode=document.getElementById("HTMLCodeFormed").value;
		                HTMLCodeSplit=HTMLCode.split("\n")
						HTMLCode="";
						for(var i=0;i<HTMLCodeSplit.length;i++)
						   {
						      HTMLCode=HTMLCode+HTMLCodeSplit[i];
						   }						
						document.getElementById("PageLayout").innerHTML=HTMLCode;
						//CSS Code Modification
						document.getElementById("PageStyle").innerHTML="";
						var CssCode=document.getElementById("CssCodeFormed").value;
						var i=0;
		                CssCodeSplit=CssCode.split("\n");
						CssCode="";
						for(var i=0;i<CssCodeSplit.length;i++)
						   {
						      CssCode=CssCode+CssCodeSplit[i];
						   }
					    CssCodeSplit=CssCode.split("#Id_");
						CssCode="";
						for(var i=1;i<CssCodeSplit.length;i++)
							{
							   CssCode=CssCode+"<style type=text/css id="+"Style_Id_"+(i-1)+">#Id_"+CssCodeSplit[i]+"</style>"
							}
						document.getElementById("PageStyle").innerHTML=CssCode;
						//JavaScript Code Modification
						document.getElementById("JsCodeFormedNoE").value=document.getElementById("JsCodeFormed").value;
						AddComponentOnWriting(e);
					}
			}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// 5                 Algorithm                   Functioning of CodeUp Button
   // var buttonUp=document.getElementById("moveup");
	//var CodeScreen=document.getElementById("CodeArea");
	//buttonUp.onclick=ChangePositionOfCodeScreen;
	var a=0;
//  5                Function
    
    function ChangePositionOfCodeScreen()
		{
		    if(a==0)
			{
			   a=1;
			   CodeScreen.setAttribute("class","CodeArea_MovedUp");
			}
			else
			if(a==1)
			{
			   a=0;
			   CodeScreen.setAttribute("class","CodeArea_default");
			}
		}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// 6                  Algorithm                    Draging the element on the screen

	document.getElementById("PageLayout").ondrop=drop;	
	document.getElementById("PageLayout").ondragover=drag_over;	
	
		
// 6	             Function
		
  /*  function drag_start(event) // call it when start dragging
    {
    var style = window.getComputedStyle(event.target, null);
    var str = (parseInt(style.getPropertyValue("left")) - event.clientX) + ',' + (parseInt(style.getPropertyValue("top")) - event.clientY)+ ',' + event.target.id;
    event.dataTransfer.setData("Text",str);
	
    } */

    function drop(event)      //get the values and parse it in the format
    {
		var offset = event.dataTransfer.getData("Text").split(',');
		var dm = document.getElementById(offset[2]);
		dm.style.left = (event.clientX + parseInt(offset[0],10)) + 'px';
		dm.style.top = (event.clientY + parseInt(offset[1],10)) + 'px';
		
		var selEle=dm.getAttribute("Id").split("Id_");
		for(var i=0;i<No;i++)
		{
		   if(i==selEle[1])
		   {
		    document.getElementById("Id_"+i).click();
		   
			var sty=document.getElementById("Style_Id_"+i).innerHTML;
			var arrsty1=sty.split("top:");
			var int1=arrsty1[1];
			var arrsty2=int1.split(";");
			var int2=arrsty2[0];
			int2=dm.style.top;
			var sty_1=arrsty1[0]+"top:"+int2;
			for(var j=1;j<arrsty2.length;j++)
				{
					 sty_1=sty_1+";"+arrsty2[j];
				}
			
			var arrsty3=sty_1.split("left:");
			var int3=arrsty3[1];
			var arrsty4=int3.split(";");
			var int4=arrsty4[0];
			int4=dm.style.left;
			var sty_2=arrsty3[0]+"left:"+int4;
			for(var j=1;j<arrsty4.length;j++)
				{
					 sty_2=sty_2+";"+arrsty4[j];
				}
			
			document.getElementById("Style_Id_"+i).innerHTML=sty_2;	
			var styl=dm.getAttributeNode("style");
			dm.removeAttributeNode(styl);
		   }
		}
	event.preventDefault();
	return false;
    }

    function drag_over(event)  // reset
    {
    event.preventDefault();
    return false;
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// 7           Algorithm           Check For Title before submiting the form
   document.getElementById("SaveButton").onclick=CheckForTitle;

// 7            Function
   function CheckForTitle()
	{
	   
	    if(document.getElementById("PageTitle").value=="")
		{
		  return false;
		}
		else
		{
		   return true;
		}
	}
 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// 8            Function         Add a component if User Writes the Element Tag
function AddComponentOnWriting(e)
{
 if(e.keyCode===32)
	{
		var WordHTML=document.getElementById("HTMLCodeFormed").value;   //get the code
		var WordHTMLint_1=WordHTML.split("<");
		var lastWordint=WordHTMLint_1[WordHTMLint_1.length-1];
		var lastWord=lastWordint.split(" ")[0];

		for(var j=0;j<AvailableTags.length;j++)
		{
			if(lastWord==AvailableTagsHTMLStyle[j])
			{
				AvailableTagsRef[j].click();
			}
		}
	}		
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// 9              Algorithm          Deleting a element Tag

// 9              Function

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	document.getElementById("PageScript").innerHTML="window.onload=init;"+"function init()"+"{\n}"; // Default value of Js Code
	

	
	document.getElementById("KeyCodeIn").onkeydown=ShowKeyCode;
	document.getElementById("JsCodeFormed").onkeydown=ShowKeyCode;
	document.getElementById("HTMLCodeFormed").onkeydown=ShowKeyCode;
	document.getElementById("CssCodeFormed").onkeydown=ShowKeyCode;
	function ShowKeyCode(e)
	  {  
	    document.getElementById("KeyCodeOut").value=e.keyCode;
	  }
	  
//End Of INIT();	 
}
window.onload=init;