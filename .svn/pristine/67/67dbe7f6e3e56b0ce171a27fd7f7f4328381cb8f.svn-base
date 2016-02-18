
<?php

if($result==true){
	if(count($statisticsResultSetrows)>0){
		echo "<div id='yw0' class='grid-view'>";
			echo "<div class='summary'></div>";
			echo "<table class='items' border='0' cellspacing='5' cellpadding='5'>";
			echo "<thead>";
				echo "<tr><th  id='yw0_c0'>Data</th> <th id='yw0_c1'>Number of Photos</th><th id='yw0_c2'>Total</th></tr>";
				echo "</thead>";
				$totalPhoto=0;
				$totalSum=0;
				$firstData="";
				$isFirstData=true;
				$lastData="";
				
				$count=0;
			    foreach ($statisticsResultSetrows as $statisticsRow)
			    {
			            // The problem is here: how to copy a line (how can I iterate over a model object so that I can copy the relation's column specified it in the criteria ?)
			            //$modelAttrs = $value->attributes;
			           //print_r($statisticsRow);
			           $rowType="";
			           (($count%2)==1 ? $rowType="odd": $rowType="even");
			           
					   $count++;
					   
			           if($isFirstData){$firstData=$statisticsRow['data']; $isFirstData=false;}
					   echo "<tbody>";
					   echo "<tr class='".$rowType."' style='border-bottom: 1px dotted #B7D6E7;'><td>".$statisticsRow['data']."</td><td>".$statisticsRow['nphoto']."</td><td>".$statisticsRow['partialSum']."</td></tr>";
					   $totalPhoto+=$statisticsRow['nphoto'];
					   $totalSum+=$statisticsRow['partialSum'];
					   $lastData=$statisticsRow['data'];
					   
			    }
				
				echo "<tr style='background-color: #B7D6E7;'><td>".$lastData." ... ".$firstData."</td><td>".$totalPhoto."</td><td>".$totalSum."</td></tr>";
				echo "</tbody>";
				echo "</table>";
			echo "</div>";
	}else{
		echo CHtml::label('There is no transaction for this selection',null);	
	}
}else{
	echo CHtml::label('Please take care to fill every form fields correctly',null);
}
?>