<div><span class="gsp-txt-color">Registered Users:</span> <?php echo $modelGroup->nPhotographers; ?></div>
<div><span class="gsp-txt-color">Portfolio:</span> <?php echo $modelGroup->nPhotos; ?> photos</div>
<div><span class="gsp-txt-color">Average rate:</span>
	<?php
		for($i=1; $i<=$modelGroup->rate; $i++){
			echo "<img class='icon_22 icon' src='".Yii::app()->baseUrl."/images/star_yellow.png' />";
		}
	?>
</div>
<?php $categories=$modelGroup->categories;?>
<div><span class="gsp-txt-color">Categories:</span> <?php if(isset($categories[0])) echo $categories[0]; 
if(isset($categories[1])) echo " - ".$categories[1];?></div>

<div><span class="gsp-txt-color">Top Photographer(s):</span><br>
	<?php
		$top5Photographers=$modelGroup->top5Photographers;
		for($k=0; $k<count($top5Photographers); $k++){
			echo $top5Photographers[$k]->printLink()."<br>";
		}
	?>
</div>