<?php if($modelProductPp!=null){
	$this->widget('application.components.widgets.ProductInfo',
		array('id'=>$modelProductPp->idProduct,
			'zoom'=>false,
			'vote'=>$vote
		)
	);?>
	
	<div id="left-panel" class="form well gsp-txt-color background_box" style="padding:10px 10px 10px 10px;">
	    <div class="wrapper">
			Camera: <span style="color: black"><?php echo $modelProductPp->getEquipment('camera')?></span><br>
			Lens: <span style="color: black"><?php echo $modelProductPp->getEquipment('lens')?></span><br>
			Shot at: <span style="color: black"><?php if($modelProductPp->photoPrePost->focalLength!=null) echo $modelProductPp->photoPrePost->focalLength."mm"; else echo "---"?></span><br>
			<br>
			Exposure Time: <span style="color: black"><?php if($modelProductPp->photoPrePost->exposureTime!=null) echo $modelProductPp->photoPrePost->exposureTime.'s'; else echo " ---"?></span><br>
			Aperture: <span style="color: black"><?php if($modelProductPp->photoPrePost->aperture!=null) echo 'f/'.(number_format($modelProductPp->photoPrePost->aperture, 2)*100)/100; else echo " ---"?></span><br>
			ISO: <span style="color: black"><?php if($modelProductPp->photoPrePost->iso!=null) echo $modelProductPp->photoPrePost->iso; else echo " ---"?></span><br>
			<br>
			Taken on: <span style="color: black"><?php if($modelProductPp->photoPrePost->shootingDate!=null)
					echo Yii::app()->dateFormatter->format('dd/MMM/yyyy - HH:mm', $modelProductPp->photoPrePost->shootingDate);
				else 
					echo "---";
				?></span><br>
			<?php 
			if(isset($modelProductPp->product->photo))
				if($modelProductPp->product->photo->approvedDate!=null){?>
					Approved on: <span style="color: black"><?php echo Yii::app()->dateFormatter->format('dd/MMM/yyyy - HH:mm', $modelProductPp->product->photo->approvedDate);?></span><br>
				<?php }?>
			<div style="margin-top:10px; margin-bottom:10px; margin-left:5px">
				Histogram
				<?php $this->widget('application.components.widgets.Histogram', array('histogram'=>$modelProductPp->photoPrePost->histogram));?>
			</div>
		</div>
	</div>
<?php }?>

<div class="margin-top-bottom container-fixed-margin">
<div itemscope itemtype="http://schema.org/Product" class="well background_box container" style="width:710px">
<?php if(isset($modelProductPp->ticket) && $modelProductPp->idProductStatus!=7 && Yii::app()->user->isAdministrator() && $modelProductPp->hasReportAbusedOpen()){?>
	<div id="report-abuse" class="alert alert-error ">
		<?php
			$isAbuseReported=false;
			if($n=count($modelProductPp->ticket))
			for($k=0; $k<$n; $k++){
				$ticket = $modelProductPp->ticket[$k];
				if($ticket->idTicketType==1 && $ticket->idTicketStatus!=3){ 
					$userLink = Yii::app()->createAbsoluteUrl('user/view').'/'.$ticket->idUser0->username;
					?>		
					<p>User <?php echo  CHtml::link($ticket->idUser0->username, $userLink) ?> has submitted a report abuse with the following message</p>
					<p><i><?php echo $ticket->message; ?></i></p>
				<?php 
					$isAbuseReported=true;
				}
			}	

			if($isAbuseReported){
				$modelTicket = new Ticket();
				$form=$this->beginWidget('CActiveForm', array(
						'id'=>'report-abuse-resolve-form',
						'action'=>Yii::app()->createUrl('photo/acceptReportAbuse/idProduct').'/'.$modelProductPp->idProduct,
						)); 
					echo $form->label($modelTicket,'messageResponse',array('class'=>'', 'style'=>''));
					echo $form->textArea($modelTicket,'messageResponse',array('style'=>'width: 100%'));
					echo CHtml::submitButton('Accept and Close Abuse',array('class'=>'btn btn-danger','style'=>'margin: 15px 0 5px 0'));
					$rejectLink = Yii::app()->createAbsoluteUrl('photo/rejectReportAbuse').'/idProduct/'.$modelProductPp->idProduct;
				echo CHtml::link('Reject and Close Abuse', $rejectLink,array('class'=>'btn btn-success','style'=>'margin: 15px 0 5px 30px'));
				$this->endWidget();
				
			}
		?>

	</div>	
<?php }?>

<div id="photo-info-container">
<?php if($modelProductPp!=null){
	if($modelProductPp->photoPrePost->ratio>1){
		$width=430;
		$height=(int)(430/$modelProductPp->photoPrePost->ratio);
	}else{
		$height=430;
		$width=(int)(430*$modelProductPp->photoPrePost->ratio);
	}
	?>
	
	<?php if($vote){?>
		<div style="margin-bottom:10px">
			Please, take few minutes to read our 
			<a target="_blank" href="<?php echo Yii::app()->createAbsoluteUrl('photo/guidelines')?>">guidelines</a> and evaluate this photo.
			<!-- Geostockphoto believes and relies on the contribution of its community.
			We ask you to take the utmost rigor in assessing the photo, to the best of your skills,
			with respect to the following parameters: Technical, Communicational, Commercial, Information, etc... -->
			Or you can <a href="<?php echo Yii::app()->createAbsoluteUrl('photo/vote')?>">skip it</a>.
		</div>
	<?php }?>
	
	<div style="float:left; width:450px; min-height:260px; text-align:center; margin-bottom:10px">
		<img itemprop="image" class="photo" id="view_photo" style="margin:0 20px 5px 0"
			onmouseover="this.style.cursor='url(<?php echo Yii::app()->baseUrl?>/images/zoom_in_rid.png), pointer'"
			onclick="crop(event, <?php echo $modelProductPp->idProduct?>)"
			src='<?php echo $modelProductPp->getUrl(430)?>'
			width='<?php echo $width?>px'
			height='<?php echo $height?>px'
			alt='<?php echo $modelProductPp->title?>'
		/>
		
		<?php if(!$vote){
				
			Yii::app()->facebook->ogTags['og:title'] = "GeoStockPhoto - ".$modelProductPp->title;
			Yii::app()->facebook->ogTags['og:description'] = $modelProductPp->description;
			Yii::app()->facebook->ogTags['og:image'] = $modelProductPp->getUrl(430);
			Yii::app()->facebook->ogTags['og:type'] = 'geostockphoto:photo';
			Yii::app()->facebook->ogTags['og:author'] = $modelProductPp->idUser0->username;
			$this->widget('ext.yii-facebook-opengraph.plugins.LikeButton', array(
				//'href' => 'YOUR_URL', // if omitted Facebook will use the OG meta tag
				'show_faces'=>true,
				'send' => true,
				'font' => 'lucida grande'
			));?>

			<div style="margin: 5px 0 0 0; text-align: left">
				<?php $link = 'http://www.geostockphoto.com'.Yii::app()->createUrl('photo/view').'/'.$modelProductPp->idProduct.'/'.$modelProductPp->urlTitle;?>
				<a data-pin-config="beside" target="_blank"
					href="//pinterest.com/pin/create/button/?url=<?php echo urlencode($link)?>&media=<?php echo urlencode($modelProductPp->getUrl(430))?>&description=<?php echo urlencode($modelProductPp->title)?>"
					data-pin-do="buttonPin" ><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" />
				</a>
			</div>
	
			<div style='width: 710px'>
				<h1 itemprop="name" class='title_view_photo'><?php echo $modelProductPp->title?></h1>
				<h2 itemprop="description" class='description_view_photo'><?php echo $modelProductPp->description?></h2>
			</div>
			
		<?php } ?>
	</div>
	
	<div id="crop_photo" style="float:left; width:256px; height:256px;">
		<IMG id="crop_img"
			SRC="<?php echo Yii::app()->baseUrl?>/images/crop.jpg"
			style="width:256px; height:256px; border: black 1px solid";
		/>
	</div>
 
 	<?php if($modelProductPp->shoppingPhotoType->licenseType=='RM'){?>
 		<div style="width: 450px; margin-left: 130px">
 	<?php }else{?>
 		<div>
 	<?php }
	$this->widget('application.components.widgets.ShoppingOptTbl', array(
		'licenseType'=>$modelProductPp->shoppingPhotoType->licenseType,
		'idProduct'=>$modelProductPp->idProduct
	));?>
	</div>
			
	<?php if($vote){
		$form=$this->beginWidget('CActiveForm', array(
				'id'=>'review-form',
				'action'=>Yii::app()->createUrl('photo/reviewed'),
				//'enableAjaxValidation'=>true,
				//'enableClientValidation'=>true,
   				//'clientOptions'=>array('validateOnSubmit'=>true)
		));?>
			
			<div class="alert in alert-info" style="background: #EEEEEE; text-align: center">
				
				<div style="display: none">
					<?php
						echo $form->checkBox($reviewedPhoto,'checkCrop');
						echo $form->textField($reviewedPhoto,'rate');
						echo $form->textField($reviewedPhoto,'idProduct');
					?>
				</div>
			
				<div>
					<div style="text-align: center">
						<div><b>Is there something wrong?</b></div>
						<div class="checkboxgroup" style="text-align: center; margin-left: 35px">
							<input id="ytReviews_motivationIds" type="hidden" value="" name="Reviews[motivationIds]">
							<input id="Reviews_motivationIds_0" value="1" type="checkbox" name="Reviews[motivationIds][]">
							<label for="Reviews_motivationIds_0">Composition</label>
							<input id="Reviews_motivationIds_1" value="2" type="checkbox" name="Reviews[motivationIds][]">
							<label for="Reviews_motivationIds_1">Noise</label>
							<input id="Reviews_motivationIds_2" value="4" type="checkbox" name="Reviews[motivationIds][]">
							<label for="Reviews_motivationIds_2">Focus</label>
							<input id="Reviews_motivationIds_3" value="6" type="checkbox" name="Reviews[motivationIds][]">
							<label for="Reviews_motivationIds_3">Lighting</label>
							<input id="Reviews_motivationIds_4" value="5" type="checkbox" name="Reviews[motivationIds][]">
							<label for="Reviews_motivationIds_4">Trademark</label>
							<input id="Reviews_motivationIds_5" value="3" type="checkbox" name="Reviews[motivationIds][]">
							<label for="Reviews_motivationIds_5">Information</label>
							<input id="Reviews_motivationIds_6" value="7" type="checkbox" name="Reviews[motivationIds][]">
							<label for="Reviews_motivationIds_6">Position</label>
						</div>
						<div class="checkboxgroup" style="text-align: center; float: right; margin-right: 90px">
							<input id="Reviews_motivationIds_7" value="8" type="checkbox" name="Reviews[motivationIds][]">
							<label for="Reviews_motivationIds_7">Dust/Sensor spots</label>
							<input id="Reviews_motivationIds_8" value="9" type="checkbox" name="Reviews[motivationIds][]">
							<label for="Reviews_motivationIds_8">CA/Fringing</label>
							<input id="Reviews_motivationIds_9" value="10" type="checkbox" name="Reviews[motivationIds][]">
							<label for="Reviews_motivationIds_9">Overfiltered/Overprocessed</label>
						</div>
						<!-- <div style="margin-left: 25px; text-align: center">
							<?php //$motivationsArray=CHtml::listData($motivations,'idMotivation','motivation');?>
							<?php /*echo $form->checkBoxList($reviewedPhoto, 'motivationIds',
								array(1=>$motivationsArray[1], 2=>$motivationsArray[2], 4=>$motivationsArray[4], 6=>$motivationsArray[6],
								5=>$motivationsArray[5], 3=>$motivationsArray[3], 7=>$motivationsArray[7],
								8=>$motivationsArray[8], 9=>$motivationsArray[9], 10=>$motivationsArray[10]
								),
								array('separator'=>'')
							);*/?>
						</div> -->
					</div>
				</div>
				<div style="clear: both"> </div>
				<div style="margin-top:5px; text-align:center">
					<span style="margin-right:5px">Very Bad</span>
					<img class="icon_22" src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name="vote-stella-5" style="cursor: pointer;" onMouseOver="changeImg(-5)" onMouseOut="changeImg_mouseOut()" onClick="done(-5)">
					<img class="icon_22" src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name="vote-stella-4" style="cursor: pointer;" onMouseOver="changeImg(-4)" onMouseOut="changeImg_mouseOut()" onClick="done(-4)">
					<img class="icon_22" src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name="vote-stella-3" style="cursor: pointer;" onMouseOver="changeImg(-3)" onMouseOut="changeImg_mouseOut()" onClick="done(-3)">
					<img class="icon_22" src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name="vote-stella-2" style="cursor: pointer;" onMouseOver="changeImg(-2)" onMouseOut="changeImg_mouseOut()" onClick="done(-2)">
					<img class="icon_22" src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name="vote-stella-1" style="cursor: pointer;" onMouseOver="changeImg(-1)" onMouseOut="changeImg_mouseOut()" onClick="done(-1)">
					<img class="icon_22" src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name="vote-stella1" style="cursor: pointer;" onMouseOver="changeImg(1)" onMouseOut="changeImg_mouseOut()" onClick="done(1)">
					<img class="icon_22" src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name="vote-stella2" style="cursor: pointer;" onMouseOver="changeImg(2)" onMouseOut="changeImg_mouseOut()" onClick="done(2)">
					<img class="icon_22" src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name="vote-stella3" style="cursor: pointer;" onMouseOver="changeImg(3)" onMouseOut="changeImg_mouseOut()" onClick="done(3)">
					<img class="icon_22" src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name="vote-stella4" style="cursor: pointer;" onMouseOver="changeImg(4)" onMouseOut="changeImg_mouseOut()" onClick="done(4)">
					<img class="icon_22" src='<?php echo Yii::app()->baseUrl?>/images/star_grey.png' name="vote-stella5" style="cursor: pointer;" onMouseOver="changeImg(5)" onMouseOut="changeImg_mouseOut()" onClick="done(5)">
					<span style="margin-left:5px">Very Good</span>
				</div>
				<div style="text-align:center; margin-top:10px">
					<?php
						/*echo CHtml::submitButton(
							"Vote",
							array('submit'=>CController::createUrl('photo/reviewed'),
								'class'=>'btn btn-small btn-primary',
								'style'=>'margin-left:20px'
							)
						);*/
						echo CHtml::ajaxSubmitButton(
							"Vote",
							array('photo/reviewed'),
							array(
								'beforeSend' => "js:function(){
									document.getElementById('msg_error').style.display='none';
								}",
								'complete'=>"js: function(xhr){
									submitted(xhr,
										'".CController::createUrl('photo/vote')."',
										'msg_error'
									)
								}"
							),
							array('class'=>'btn btn-big btn-primary')
						);
					?>
				</div>
			</div>
			<div id="msg_error" class="alert in alert-error" style="display: none; width:660px"></div>
		<?php $this->endWidget();
	}?>
	
	<?php if($modelProductPp->idProductStatus==7 && count($modelProductPp->ticket)>0){?>
		<div id="report-abuse" class="alert alert-error ">
			<p>This photo was reported for the following reason:</p>
			<p><i><?php 
				echo $modelProductPp->ticket[0]->messageResponse;
			?></i></p>
		</div>
	<?php }else{ ?>
		<div style="text-align:right; font-size:12px; margin-right: 5px">
			<?php echo CHtml::link('Report abuse', Yii::app()->createUrl('/photo/reportAbuse/', array('id'=>$modelProductPp->idProduct)));?>
		</div>	
	<?php }?>
		
	<div class="tabs_author" style="margin-top: 10px">
		<p>Take a look around!</p>
	</div>
	<div id="map_canvas" style="width: 100%; min-height: 250px !important; border: 2px black solid">
	</div>

<?php }else
	if($vote)
		echo "No photos can be evaluated at this time. Please try again later.";
	else
		throw new CHttpException(404, 'View photo: something went wrong while showing this page.');
?>
		
</div>
</div>
</div>

<?php if(!$vote){?>
	<div class="tabs_author">
		<p>Portfolio of <?php echo $modelProductPp->idUser0->printLink()?></p>
	</div>
	<div id="photo-line">
	</div>
<?php }?>
