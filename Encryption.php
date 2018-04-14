<?php
function Encrypt(&$text,$Key)
                          {
                            $i=0;
							while($i<strlen($text))
							    {
					        	  $text[$i]=($Key+$i)+$text[$i];
								  $i=$i+1;
								}
                          }

function Decrypt(&$text,$Key)
                         {
							$i=0;
							while($i<strlen($text))
								{
					        	  $text[$i]=$text[$i]-($Key+$i);
								  $i=$i+1;
								}
		                   }	
						  
?>		

<?php
     $string='hello World';
	 Encrypt($string,'k');
	 echo $string.'<br\>';
	 Decrypt($string,'k');
	 echo $string;
	 
?>			  