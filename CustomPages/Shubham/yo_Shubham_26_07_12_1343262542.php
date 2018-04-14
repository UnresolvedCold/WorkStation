<html><head><title>yo</title><style>#Id_0
{
color:black;
background-color:#EEEEEE;
position:absolute;
top:45px;
left:387px;
}


</style><script></script><script>function drag_start(event) // call it when start dragging
					{
					var style = window.getComputedStyle(event.target, null);
					var str = (parseInt(style.getPropertyValue("left")) - event.clientX) + "," + (parseInt(style.getPropertyValue("top")) - event.clientY)+ "," + event.target.id;
					event.dataTransfer.setData("Text",str);
					}  
							</script></head><body>
<h1 id="Id_0" draggable="true" ondragstart="drag_start(event)">
Heading(H1)
</h1>
</body></html>