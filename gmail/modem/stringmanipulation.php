<?php
include("db.php");


function removefirsttwoindex($lines)
{
            unset($lines[0]);
			unset($lines[1]);
			$lines = array_values($lines);
           
           for($i=0; $i<count($lines); $i++)
			{
				if($lines[$i]=='')
				{
					unset($lines[$i]);
					$lines = array_values($lines);
				}
			}
			
            $len = count($lines);
			
			unset($lines[$len-1]);
			$lines = array_values($lines);
			

			//print_r($lines);
			
        
            return $lines;
        
        
        
}

function pushintodb($lines)
{
    		for($i=0; $i<count($lines); $i=$i+2)
			{
			
			$str= $lines[$i];
			$str.=$lines[$i+1];
			
			//echo $str.'<br>';
			
			$str=strafter($str,',');
			$str=strafter($str,',');
			
		 $phone=strbefore($str,','); 		//"923122077722"
		 $phone = strafter($phone , '"'); 	//923122077722"
		 $phone=strbefore($phone,'"');      	// 923122077722
		 
				
				//echo $phone;
						
			$str= $lines[$i];
			$str.=$lines[$i+1];
			
			
			for($j=0; $j<3; $j++)
			{
				$str = strafter($str,',');
			}
			
			$str=substr($str, 4);
			$dateTime=strbefore($str,'"');
		
			$messageText=strafter($str,'"');
			
			insert($phone,$dateTime,$messageText);
			
		}
		
		echo "records inserted successfully";
}


?>