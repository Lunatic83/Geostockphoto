<?php if($modelProductPp!=null){
	$this->widget('application.components.widgets.ProductInfo',
		array('id'=>$modelProductPp->idProduct, 'zoom'=>false));
		
	if($modelProductPp->photoPrePost->ratio>1){
		$width=430;
		$height=(int)(430/$modelProductPp->photoPrePost->ratio);
	}else{
		$height=430;
		$width=(int)(430*$modelProductPp->photoPrePost->ratio);
	}
	?>
	
	<div class="container margin-top-bottom">
	<div class="well" style="width:710px; margin-left:auto; margin-right:auto"">
		<div style="float:left; width:450px; min-height:400px; text-align:center">
			<img class="photo" id="view_photo" style="margin-right:20px"
				onmouseover="this.style.cursor='url(<?php echo Yii::app()->baseUrl?>/images/zoom_in_rid.png), pointer'"
				onclick="crop(event, <?php echo $modelProductPp->idProduct?>)"
				src='<?php echo $modelProductPp->getUrl(430)?>'
				width='<?php echo $width?>px'
				height='<?php echo $height?>px'
			/>
			<div class="alert in alert-info" style="width:384px; margin-top:20px; text-align:left; background: #EEEEEE;">
				<b>Camera: </b><?php echo $modelProductPp->equipment->description;?><br>
				<b>Exposure Time: </b><?php echo $modelProductPp->photoPrePost->exposureTime;?>s&nbsp;&nbsp;&nbsp;&nbsp;
				<b>Aperture: </b>f/<?php echo $modelProductPp->photoPrePost->aperture;?>&nbsp;&nbsp;&nbsp;&nbsp;
				<b>ISO: </b><?php echo $modelProductPp->photoPrePost->iso;?><br>
				<b>Shooting Date: </b><?php echo Yii::app()->dateFormatter->format('dd/MMM/yyyy - hh:mm', $modelProductPp->photoPrePost->shootingDate);?><br>
				<?php if($modelProductPp->photoPrePost->approvedDate!=null){?>
					<b>Approved Date: </b><?php echo Yii::app()->dateFormatter->format('dd/MMM/yyyy - hh:mm', $modelProductPp->photoPrePost->approvedDate);?><br>
				<?php }?>
			</div>
		</div>
		
		<div id="crop_photo" style="float:left; width:256px; height:256px;">
			<IMG id="crop_img"
				SRC="<?php /*echo Yii::app()->createUrl('photo/crop',
					array('idProduct'=>$modelProductPp->idProduct,
						'x'=>(int)$width/2,
						'y'=>(int)$height/2)
					)*/
					echo Yii::app()->baseUrl?>/images/crop.jpg
				"
				style="width:256px; height:256px; border: black 1px solid; margin-bottom:10px";
			/>
			
			<?php $this->widget('application.components.widgets.Histogram', array('histogram'=>$modelProductPp->photoPrePost->histogram));?>
		</div>
 
		<?php
			$this->widget('application.components.widgets.ShoppingOptTbl', array(
				'licenseType'=>$modelProductPp->shoppingPhotoType->licenseType,
				'idProduct'=>$modelProductPp->idProduct
			));
		?>
		
		
			
		<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'review-form',
				'action'=>Yii::app()->createUrl('photo/reviewed'),
				'enableAjaxValidation'=>false,
		));
			echo $form->errorSummary($reviewedPhoto); ?>
			
			<div class="alert in alert-info" style="background: #EEEEEE;">
				
				<div style="display:none">
					<?php
						echo $form->textField($reviewedPhoto,'rate',array('size'=>15,'maxlength'=>10));
						echo $form->error($reviewedPhoto,'rate');
						echo $form->textField($reviewedPhoto,'idProduct',array('size'=>15,'maxlength'=>10));
						echo $form->error($reviewedPhoto,'idProduct');
					?>
				</div>
			
				<div class="checkboxgroup">
					<span style="float:left; margin-right:20px"><b>What's wrong?</b></span>
					<?php echo $form->checkBoxList($reviewedPhoto,'motivationIds',
							CHtml::listData($motivations,'idMotivation','motivation'),
							array('separator'=>'')
					); ?>
				</div>
				
				<div style="margin-top:5px; margin-left:160px">
					<table>
						<tr>
							<td style="cursor: pointer;" onMouseOver="changeImg(-5)" onMouseOut="changeImg_mouseOut()" onClick="done(-5)"><img src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name="vote-stella-5"></td>
							<td style="cursor: pointer;" onMouseOver="changeImg(-4)" onMouseOut="changeImg_mouseOut()" onClick="done(-4)"><img src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name="vote-stella-4"></td>
							<td style="cursor: pointer;" onMouseOver="changeImg(-3)" onMouseOut="changeImg_mouseOut()" onClick="done(-3)"><img src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name="vote-stella-3"></td>
							<td style="cursor: pointer;" onMouseOver="changeImg(-2)" onMouseOut="changeImg_mouseOut()" onClick="done(-2)"><img src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name="vote-stella-2"></td>
							<td style="cursor: pointer;" onMouseOver="changeImg(-1)" onMouseOut="changeImg_mouseOut()" onClick="done(-1)"><img src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name="vote-stella-1"></td>
							<td style="cursor: pointer;" onMouseOver="changeImg(1)" onMouseOut="changeImg_mouseOut()" onClick="done(1)"><img src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name="vote-stella1"></td>
							<td style="cursor: pointer;" onMouseOver="changeImg(2)" onMouseOut="changeImg_mouseOut()" onClick="done(2)"><img src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name="vote-stella2"></td>
							<td style="cursor: pointer;" onMouseOver="changeImg(3)" onMouseOut="changeImg_mouseOut()" onClick="done(3)"><img src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name="vote-stella3"></td>
							<td style="cursor: pointer;" onMouseOver="changeImg(4)" onMouseOut="changeImg_mouseOut()" onClick="done(4)"><img src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name="vote-stella4"></td>
							<td style="cursor: pointer;" onMouseOver="changeImg(5)" onMouseOut="changeImg_mouseOut()" onClick="done(5)"><img src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name="vote-stella5"></td>
							<td>
								<?php
									echo CHtml::submitButton(
										"Vote",
										array('submit'=>CController::createUrl('photo/reviewed'),
											'class'=>'btn btn-small btn-primary',
											'style'=>'margin-left:20px'
											//'style'=>'float:right'
										)
									);
								?>
							</td>
						</tr>
					</table>
				</div>
			</div>
		<?php $this->endWidget();?>
		
		<div style="text-align:right; font-size:12px">
		<?php
			//if(!Yii::app()->user->isGuest) 
				//echo CHtml::link('Report abuse?', Yii::app()->createUrl('/photo/reportAbuse/'.$modelProductPp->idProduct));
		?>
		</div>
		
	</div>
	</div>
	
	<!-- <div id="photo-line">
		<?php /*$this->renderPartial('topTen', array(
			'topten'=>$data,
			), false, true);*/
		?>
	</div> -->

<?php }else
	echo "There are no photos that you can review at this moment.<br>Try again later!";
?>
