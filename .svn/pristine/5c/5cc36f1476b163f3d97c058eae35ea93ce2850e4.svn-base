<div style='width: <?php echo (256*$barwidth)?>px; height:120px; border: 1px solid; background:white'>
<?php for ($index=0; $index<=255; $index++){
	if($max!=0)
		$h=(( $histo["RGB"][0][$index]/$max )*$maxheight);
	else 
		$h=0;
    echo "<img src=\"".Yii::app()->baseUrl."/images/pixel_blue.gif\" style=\"vertical-align:bottom; width:".$barwidth."px; height:".number_format($h)."px\">";
}?>
</div>