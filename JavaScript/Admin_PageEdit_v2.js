function init()
{
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// 1       Algorithm            Right Side Tabs Active-Inactive Property

     var Layout=document.getElementById("PageLayout");         //Init Layout Reference                                  ref
	 var Tabs=["Html","Css","Js","Save","Help"];               //Tabs Dictionary                                                     dic             
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
				
				var PageStyle=document.getElementById("PageStyle");
				var newStyle="#Id_"+No+
							 "{"+
							 "color:black;"+"background-color:white;"+
							 "border:black solid 1px;"+
							 "position:absolute;top:0px;left:0px;"+
							 "}";
				PageStyle.innerHTML=PageStyle.innerHTML+newStyle;			 
				
			    element.setAttribute("id","Id_"+No);            //Give the element a unique Id              Id_<--NUM-->                                                        
				element.setAttribute("draggable","true");       //Make The Elemnt Draggable
				
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
				selectedElement=document.getElementById("Id_"+No);
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
	 var selectedElement;	//To get theelement
	 var target;			//to get the modified css
	 

// 3            Function

	function  ReadyForEdit()
	   {
	    for(var i=0;i<No;i++)
         {
		    var ele=document.getElementById("Id_"+i);
			var ele_sty=document.getElementById("PageStyle").innerHTML; //acess style sheet
			var styArr=ele_sty.split("#Id_");      //get array of all styles
			ele_style="";

			ele.onclick=selectIt;
			var htmltab_ele=document.getElementById("Id_ComponentArea_"+i);
			htmltab_ele.onclick=selectIt;
			
			
			for(var j=0;j<PropertyRef.length;j++)
			{
			    PropertyRef[j].onkeypress=ChangeIt;
				document.getElementById("Css_Tools_Content").onkeypress=ChangeIt;
			}
         }

		 ShowAll();
		 
		function selectIt()                                                //Select Element and Style
			 {
				selectedElement=this;
				for(var i=0;i<PropertyRef.length;i++)
				   {
					   if(this==document.getElementById("Id_"+i))
						{
						  target=i;
						}
						else
						if(this==document.getElementById("Id_ComponentArea_"+i))
						{
						  target=i;
						  selectedElement=document.getElementById("Id_"+i);
						}
				   }
				GetValues();
				return false;
			 }
			 
		function ChangeIt(e)
			 {
			 if(e.keyCode===13)
					{
					  styArr[target]= "{"+
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
		
		              UpdateCSS();
                      PutInnerHtml(selectedElement);
					  PutInnerHtmlInTab(selectedElement);
					} 
			 }

		
		function UpdateCSS()         //Css code update
			{
			ele_sty="";
			for(var i=0;i<No;i++)
				{
					ele_sty=ele_sty+"#Id_"+i+styArr[i];
				}
			  document.getElementById("PageStyle").innerHTML=ele_sty;
			}
			 
			 
		function GetValues()  //Modify dic at 1 and 2  // Change lines at 96 and 142                                           
			 {
				ele_sty=document.getElementById("PageStyle").innerHTML;
				styArr=ele_sty.split("#Id_");
                
				raw_Property=styArr[target+1];
				
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
		    		   
	   }
	   
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// 4                 Algorithm                  Working of save button and Showing The formed HTML
       document.getElementById("SaveButton").onclick=ShowAll;
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
					var int1=HTMLCode.split("");
					
					document.getElementById("HTMLCodeFormed").innerHTML=HTMLCode;
					
				}
				
			function ShowCSS()
				{
					var CSSCode="";	
					
					CSSCode=CSSCode+document.getElementById("PageStyle").innerHTML;
					var notreqCSSCode=CSSCode.split("#Id_");
					CSSCode="";
					
					for(var i=1;i<notreqCSSCode.length;i++)
					{
					    CSSCode=CSSCode+"#Id_"+notreqCSSCode[i];
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
						
						   CSSCode=CSSCode+CodeArray2[i]+"} \n\n";
						}
					
					var CodeArray3=CSSCode.split("{");
					CSSCode="";
					for(var i=0;i<CodeArray3.length;i++)
						{
						   CSSCode=CSSCode+CodeArray3[i]+"{ \n";
						}	
					
					document.getElementById("CssCodeFormed").innerHTML=CSSCode;
				}
			function ShowJS()
				{
				}
				
			}
	  function ModifyAll()
			{
			    setTimeout(Modify,10);
				function Modify()
					{
						//document.getElementById("PageLayout").innerHTML=document.getElementById("HTMLCodeFormed").innerHTML;
						//document.getElementById("Head").innerHTML=document.getElementById("CssCodeFormed").innerHTML;
					}
			}
			

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function ShowItIsWorking(e)
	  {  
	     document.getElementById("Help_Tools").innerHTML=e;
	  }
	  
//End Of INIT();	 
}
window.onload=init;