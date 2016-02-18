<div><b>Level:</b> <?php echo $modelUser->idUserProfile0->name; ?></div>
<div><b><?php echo CHtml::link('Portfolio', Yii::app()->createUrl('/portfolio/'.$modelUser->username));?>:</b> <?php echo $nPhotos; ?> photos</div>
<?php //$this->gspLog("info", "START RATE");?>
<div><b>Average rate:</b>
	<?php
		for($i=1; $i<=$modelUser->rate; $i++){
			echo "<img class='icon_22 icon' src='".Yii::app()->baseUrl."/images/star_yellow.png' />";
		}
	?>
</div>
<?php //$this->gspLog("info", "START Categories");?>
<div><b>Categories:</b> <?php if(isset($modelUser->categories[0])) echo $modelUser->categories[0]; 
if(isset($modelUser->categories[1])) echo " - ".$modelUser->categories[1];?></div>
<!-- <div><b>2&deg; Category:</b> <?php //if(isset($categories[1])) echo $categories[1]; ?></div> -->

<?php $this->gspLog("info", "START Equipments");?>
<div><b>Equipment(s):</b><br>
	<?php
		$equipments=$modelUser->equipments;
		$maxEqpm=min(4, count($equipments));
		for($k=0; $k<$maxEqpm; $k++){
			echo $equipments[$k]->description."<br>";
		}
		if(count($equipments)-$maxEqpm>0){
			echo "<div style='display: none' id='eqpm'>";
			for($k=$maxEqpm; $k<count($equipments); $k++){
				echo $equipments[$k]->description."<br>";
			}
			echo "</div><a id='linkEqpm' style='cursor: pointer' onClick='js: displayMore(\"eqpm\", \"linkEqpm\")'>see more...</a>";
		}
	?>
</div>