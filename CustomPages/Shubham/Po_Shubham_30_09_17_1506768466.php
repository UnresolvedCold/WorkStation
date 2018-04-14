<html><head><title>Po</title><style>#Id_0
{
color:black;
background-color:black;
position:absolute;
top:0;
left:0;
height:600;
width:1024;
opacity:1;
visibility:Visible;
text-align:default;
font-size:default;
font-family:default;
padding:0px;
margin:0px;
border-width:0px;
border-color:#FFFFFF;
border-style:solid;
}


</style><script></script><script>function drag_start(event) // call it when start dragging
					{
					var style = window.getComputedStyle(event.target, null);
					var str = (parseInt(style.getPropertyValue("left")) - event.clientX) + "," + (parseInt(style.getPropertyValue("top")) - event.clientY)+ "," + event.target.id;
					event.dataTransfer.setData("Text",str);
					}  
							</script></head><body>
<div id="Id_0" draggable="true" ondragstart="drag_start(event)">

</div>
</body></html>