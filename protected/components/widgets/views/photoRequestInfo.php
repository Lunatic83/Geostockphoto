<?php if($showOuter){?>
	<div id="<?php echo $class?>" class="form well gsp-txt-color background_box">
		<div class="wrapper">
        <div style="margin-bottom: 0px" id="map_canvas_small"></div>

	    <ul class="margin0">
	    	<div class="tooltipClass" id="info_photo">
        
<?php }?>
	
<?php
// DISPLAY PHOTO
/*$img = "<IMG style='float: left; margin: 3px 10px 0 0'
	class='photo' id='img_photo' SRC='".$model->getPhotoUrl(120)."' alt='".$model->username."'/>";
$link = Yii::app()->createUrl('user/view').'/'.$model->username;
echo CHtml::link(
	$img,
	$link
);*/

// ID
echo "<li style='margin-top:10px' class='no_point'><a href='#' rel='tooltip' title='ID Photo'>#".$model->idPhotoRequest."</a></li>";
// USERNAME
/*echo "<li class='no_point' style='color:black'>".$model->username."</li>";
// NAME
if(isset($model->name)){
	echo "<li class='no_point'>Name: <a style='color:black' href='#' rel='tooltip' title='Name'>".$model->name."</a></li>";
}
// SURNAME
if(isset($model->surname)){
	echo "<li class='no_point'>Surname: <a style='color:black' href='#' rel='tooltip' title='Surname'>".$model->surname."</a></li>";
}*/
?>

<div style="clear: both; margin-bottom: 20px">
	<?php
	// RATE
	if(isset($model->minRate)){
		for($i=1; $i<=$model->minRate; $i++){
			echo "<img class='icon_22 icon' src='".Yii::app()->baseUrl."/images/star_yellow.png' />";
		}
	}?>
	
	<!-- MIN SIZE --> 
	<li class='no_point'>Min Size:
		<a style='color:black' href='#' rel='tooltip' title='Min Size'>
			<?php echo $model->minSize0->code; ?>
		</a>
	</li>

	<?php // CATEGORIES
	if(isset($model->idCategory))
		echo "<li class='no_point'>Category: <a style='color:black' href='#' rel='tooltip' title='Category'>".$model->idCategory0->name."</a>";
	echo "</li>";?>
	
	<!-- N. PHOTOS --> 
	<li class='no_point'>Number of photos:
		<a style='color:black' href='#' rel='tooltip' title='Number of photos'>
			<?php echo $model->nPhotos; ?>
		</a>
	</li>
	
	<!-- MAX PRICE --> 
	<li class='no_point'>Max price (per photo):
		<a style='color:black' href='#' rel='tooltip' title='Max price'>
			<?php echo $model->maxPrice; ?>
		</a> credits
	</li>
	
	<!-- DESCRIPTION --> 
	<li class='no_point'>Description:
		<a style='color:black' href='#' rel='tooltip' title='Description'>
			<?php echo $model->description; ?>
		</a>
	</li>
	
	<!-- EXPIRATION --> 
	<li class='no_point'>Expire on: <span style="color: black"><?php if($model->expiration_timestamp!=null)
			echo Yii::app()->dateFormatter->format('dd/MMM/yyyy - HH:mm', $model->expiration_timestamp);
		else 
			echo "---";
		?></span>
	</li>
</div>

<?php if($showOuter){?>
            </div>
		</ul>
		</div></div>
<?php }?>