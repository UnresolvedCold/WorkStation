<html><head><title>HomePage</title><link type='text/css' rel='stylesheet' href='CSS/HomePage_Shubham_12_07_17_1499886321.css' /><script src='JavaScript/HomePage_Shubham_12_07_17_1499886321.js'></script><script>function drag_start(event) // call it when start dragging
					{
					var style = window.getComputedStyle(event.target, null);
					var str = (parseInt(style.getPropertyValue("left")) - event.clientX) + "," + (parseInt(style.getPropertyValue("top")) - event.clientY)+ "," + event.target.id;
					event.dataTransfer.setData("Text",str);
					}  
							</script></head><body>
<div id="Id_0" draggable="true" ondragstart="drag_start(event)">

</div>

<a id="Id_1" draggable="true" ondragstart="drag_start(event)" href="AllWorks.php">
AllWorks
</a>

<a id="Id_2" draggable="true" ondragstart="drag_start(event)" href="CreateNewWork.php">
CreateNewWork
</a>

<a id="Id_3" draggable="true" ondragstart="drag_start(event)" href="Message.php">
Message
</a>

<a id="Id_4" draggable="true" ondragstart="drag_start(event)" href="Blog.php">
Blog
</a>

<a id="Id_5" draggable="true" ondragstart="drag_start(event)" href="LogOut.php">
LogOut
</a>

<div id="Id_6" draggable="true" ondragstart="drag_start(event)">

</div>

<a id="Id_7" draggable="true" ondragstart="drag_start(event)" href="../custom/pages/Link.html">
Settings
</a>

<button id="Id_8" draggable="true" ondragstart="drag_start(event)">
Study Section
</button>

<button id="Id_9" draggable="true" ondragstart="drag_start(event)">
Scientific Stuffs
</button>

<button id="Id_10" draggable="true" ondragstart="drag_start(event)">
Entertainment
</button>

<button id="Id_11" draggable="true" ondragstart="drag_start(event)">
Philosophy
</button>

<button id="Id_12" draggable="true" ondragstart="drag_start(event)">
Misc
</button>

<button id="Id_13" draggable="true" ondragstart="drag_start(event)">
My Stuffs
</button>

<div id="Id_14" draggable="true" ondragstart="drag_start(event)">

</div>

<div id="Id_15" draggable="true" ondragstart="drag_start(event)">

</div>
 </body></html>