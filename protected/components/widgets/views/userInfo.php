<?php if($showOuter){?>
	<div id="<?php echo $class?>" class="form well gsp-txt-color background_box">
		<div class="wrapper">
        <div style="margin-bottom: 0px" id="map_canvas_small"></div>

	    <ul class="margin0">
	    	<div class="tooltipClass" id="info_photo">
        
<?php }?>
	
<?php
// DISPLAY PHOTO
$img = "<IMG style='float: left; margin: 3px 10px 0 0'
	class='photo' id='img_photo' SRC='".$model->getPhotoUrl(120)."' alt='".$model->username."'/>";
$link = Yii::app()->createUrl('user/view').'/'.$model->username;
echo CHtml::link(
	$img,
	$link
);

// ID
echo "<li style='margin-top:10px' class='no_point'><a href='#' rel='tooltip' title='ID Photo'>#".$model->idUser."</a></li>";
// USERNAME
echo "<li class='no_point' style='color:black'>".$model->username."</li>";
// NAME
if(isset($model->name)){
	echo "<li class='no_point'>Name: <a style='color:black' href='#' rel='tooltip' title='Name'>".$model->name."</a></li>";
}
// SURNAME
if(isset($model->surname)){
	echo "<li class='no_point'>Surname: <a style='color:black' href='#' rel='tooltip' title='Surname'>".$model->surname."</a></li>";
}
?>

<div style="clear: both; margin-bottom: 20px">
	<?php
	// RATE
	if(isset($model->rate)){
		for($i=1; $i<=$model->rate; $i++){
			echo "<img class='icon_22 icon' src='".Yii::app()->baseUrl."/images/star_yellow.png' />";
		}
	}?>
	
	<!-- LEVEL --> 
	<li class='no_point'>Level:
		<a style='color:black' href='#' rel='tooltip' title='Level'>
			<?php echo $model->idUserProfile0->name; ?>
		</a>
	</li>
	
	<!-- Portfolio --> 
	<li class='no_point'>
		<?php echo CHtml::link('Portfolio', Yii::app()->createUrl('/portfolio/'.$model->username)).": ";?>
		<span style="color: black"><?php echo $model->nPhotos; ?> photos</span>
	</li>

	<?php // CATEGORIES
	if($model->categories[0])
		echo "<li class='no_point'>Categories: <a style='color:black' href='#' rel='tooltip' title='1&deg Category'>".$model->categories[0]."</a>";
	if($model->categories[1])
		echo " - <a style='color:black' href='#' rel='tooltip' title='2&deg Category'>".$model->categories[1]."</a>";
	echo "</li>";?>
</div>

<?php if($showOuter){?>
            </div>
		</ul>
		</div></div>
<?php }?>