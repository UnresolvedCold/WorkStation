
window.onload=init;

function init()
{
   GetReady();
   for(var i=0;i<6;i++)
      {
       Tabs[i].onclick=function()
              {
                var block;
                if(i<3 && i>=0){block=document.getElementById("Id_14");}
                if(i<6 && i>=3){block=document.getElementById("Id_15");} 
                 var message="";
                 switch(i)
                  {
                   case 0:message="Yo";break;
                   case 1:message="Yo";break;
                   case 2:message="Yo";break;
                   case 3:message="Yo";break;
                   case 4:message="Yo";break;
                   case 5:message="Yo";break;
                  }
                  block.innerHTML=message;
              }
      }
}

function GetReady()
{
  for(var i=0;i<6;i++)
     {
      tabs[i]=document.getElementById("Id_"+(i+8));
     }
}