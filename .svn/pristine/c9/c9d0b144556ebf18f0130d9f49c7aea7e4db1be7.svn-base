<?php $util = new Util(); ?>
<script type="text/javascript">
	$(function(){
		$('a.lightbox').lightBox();
	})

	function activeLightBox(){
		$('#Enlarge').click();
	}
</script>

<?php if($showOuter){?>
	<div id="<?php echo $class?>" class="form well gsp-txt-color background_box">
		<div class="wrapper">
        <div style="margin-bottom: 0px" id="map_canvas_small"></div>

	    <ul class="margin0">
	    	<div class="tooltipClass" id="info_photo">
        
<?php }?>

<!-- <input type="hidden" id="idSelected" value="<?php //echo $model->idProduct?>" /> -->
	
<?php 
if($gspAccuracy>=95)
	$color="green";
elseif($gspAccuracy<=50)
	$color="red";
else
	$color="#FF6600";
?>
<div class="tooltipClass" style="width: 100%; margin: 0 10px 10px 0; text-align: center">
	<a href='#' rel='tooltip' title='Correct positions/Submitted photos'>
		Accuracy of the photographer: <span style="color: <?php echo $color?>"><?php echo $gspAccuracy;?>%</span>
	</a>
</div>
	
<?php
// DISPLAY PHOTO
$img = "<IMG style='float: left; margin: 0 10px 0 0; cursor: pointer;' class='photo' id='img_photo' SRC='".$model->getUrl(120)."' alt='".$model->title."' onclick='js: activeLightBox()'/>";

if(isset($model->product)){
	/*echo CHtml::link(
		  $img,
		  $link
	);*/
	echo $img;
}else
	echo $img;

 
// ID
echo "<li class='no_point'><a href='#' rel='tooltip' title='ID Photo'>#".$model->idProduct."</a></li>";
// TITLE
if($model->title)
	echo "<li class='no_point' style='color:black'>".$util->shortlabel($model->title,20)."</li>";
// AUTHOR
if(!$vote || Yii::app()->user->isAdministrator())
	echo "<li class='no_point'>by ".$model->idUser0->printLink()."</li>";

$link = $model->linkViewPage;
?>


<div style="clear: both; margin-bottom: 20px">
	<?php if($zoom){?>
		<li class='no_point'>
		<a id="Enlarge" class="lightbox" href="<?php echo $model->getUrl(430)?>"
			title="<?php echo $util->shortlabel($model->title,20) ?><br> <a style='font-size: 13px;' target='_blank' href='<?php echo $link?>'>Go to details page >></a>" onclick="js: viewIncrementCount('<?php echo Yii::app()->createAbsoluteUrl('')?>','<?php echo $model->idProduct?>');">
			</a>
	<?php }
	if ($model->idUser==Yii::app()->user->id && $model->idProductStatus==3){
		if(!$zoom) echo "<li class='no_point'>"; else echo "   ";
		?>
		<a href="<?php echo Yii::app()->createUrl('photo/edit', array('idProduct'=>$model->idProduct))?>">Edit</a>
	<?php }
	if($zoom || ($model->idUser==Yii::app()->user->id && $model->idProductStatus==3)) echo "</li>";

	// RATE
	if(!$vote){
		if ($model->idProductStatus==3){
			if(isset($model->product->photo->rate)){
				$rate=$model->product->photo->rate;
				for($i=1; $i<=$rate; $i++){
					echo "<img class='icon_22 icon' src='".Yii::app()->baseUrl."/images/star_yellow.png' />";
				}
			}
		}elseif ($model->idProductStatus==4){ // ELSE IF (rifiutata) visualizza votazione negativa e motivazioni
			if(isset($model->photoPrePost->rate)){
				$rate=$model->photoPrePost->rate;
				for($i=-1; $i>=$rate; $i--){
					echo "<img class='icon_22 icon' src='".Yii::app()->baseUrl."/images/star_red.png' />";
				}
			}
		}
	}
	
	// DESCRIPTION
	/*if(isset($model->description)){
		echo "<li class='no_point'><a href='#' rel='tooltip' title='Description'>".$model->description."</a></li>";
	}*/

	// CATEGORIES
	if($model->photoPrePost->idCategory10)
		echo "<li class='no_point'>Categories: <a style='color:black' href='#' rel='tooltip' title='1&deg Category'>".$model->photoPrePost->idCategory10->name."</a>";
	if($model->photoPrePost->idCategory20)
		echo " - <a style='color:black' href='#' rel='tooltip' title='2&deg Category'>".$model->photoPrePost->idCategory20->name."</a>";
	echo "</li>";
	
	// SIZES AND LICENSES
	if ($model->idProductStatus!=6){
		if(count($size)>0){
			echo "<li class='no_point'>Size: <a style='color:black' href='#' rel='tooltip' title='Size of the photo'>";
				$k=0;
				foreach($size as $size_value){
					if(isset($size_value)){
						if($k!=0) echo " - ";
						echo $size_value;
						$k++;
					}
				}
			echo "</a></li>";
		}
		if(count($license)>0){
			echo "Licenses: <a style='color:black' href='#' rel='tooltip' title='License(s)'>";
				for($k=0; $k<count($license); $k++){
					if($license[$k]->idLicense0->printName){
						if($k!=0) echo " - ";
						echo $license[$k]->idLicense0->printName;
					}
				}
			echo "</a></li>";
		}
	}
	
	// PRICES
	if ($model->idProductStatus==3){
		echo "<li class='no_point'><a href='#' rel='tooltip' title='1Credit=1Euro'>
			Price: from <span style='color: black'>".$minPrice."</span> to <span style='color: black'>".$maxPrice."</span> credits
		</a></li>";
	}
	
	// DOWNLOADS and VISITS
	if ($model->idProductStatus==3){
		echo "<li class='no_point' style='text-align: center'><a href='#' rel='tooltip' title='Downloads'>".$model->downloadsNumber.
			"<IMG class='icon icon_20 right-margin' SRC='".Yii::app()->baseUrl."/images/download_blue_23.png'></a>";
		echo "<a href='#' rel='tooltip' title='Views'><span id='photo-views-count'>".$model->visits.
			"</span><IMG class='icon icon_20 right-margin' SRC='".Yii::app()->baseUrl."/images/view.png'></a></li>";
	}
	
	// WHAT'S WRONG
	if($model->idUser==Yii::app()->user->id){
		if(isset($motivations)){
			if(count($motivations)>0){
				echo "<li class='no_point'><a href='#' rel='tooltip' title='Only authors can see this information'>";
				echo "What's wrong: ";
				//for($i=0; $i<count($motivations); $i++){
				$i=0;
				foreach ($motivations as $motivation){
					if($i!=0)
						echo " - ";
					echo $motivation;
					$i++;
				}
				echo "</li>";
			}
		}
	}?>
	
	<div id="shopping_cart" class="btn-group" style="text-align: center; margin: 0 10px 0 0">
	<?php if ($model->idProductStatus==3){?>
			<?php
			echo CHtml::button(
				$textSC,
				array('onclick'=>$linkSC, 'class'=>$classSC, 'style'=>'height: 30px')
			); ?>
	<?php }
	$viewDetails = CHtml::link('Details', $link, array('class'=>'btn'));
	if(isset($model->product) && $btnDetails){
		echo $viewDetails;
	}
	?>
	</div>
</div>

<?php if($showOuter){?>
            </div>
		</ul>
		</div>
	
	<?php if($showArrow){?>
	<img class="arrow-button"
		src="<?php echo Yii::app()->baseUrl?>/images/right_grey.png"
		width="15"
		height="15"
	>
<?php }}?>


<?php if($showOuter){?></div><?php }?>