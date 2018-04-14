//Global Variables
var obj=["Science","EngineeringSc","Mathematics","Philosophy","Misc","MyBooks","Links","Tools"];
var originalInnerHTML="";
var i=0;
var totalObj=obj.length;

//Main function
function init()
{ 
	for(i=0;i<=totalObj;i++){Info(obj[i]);}
}
		 
window.onload = init;		 


//User Defined Functions
function Info(object)
{
	var obj=document.getElementById(object);
	
	obj.onmouseout=HideInfo;
	obj.onmouseover=ShowInfo;
	  function ShowInfo()
			{
			  var obj=document.getElementById(object+"_info");
			  obj.setAttribute("class","visible");
			 
			}	
	  function HideInfo()
			{
			  var obj=document.getElementById(object+"_info");
			  obj.setAttribute("class","invisible");
			}		
}
	 
		
