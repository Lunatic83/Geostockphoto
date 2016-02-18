<?php
	$cs=Yii::app()->clientScript;
	$cs->registerScriptFile('http://maps.google.com/maps/api/js?sensor=false', CClientScript::POS_HEAD);
	$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/photo/map_edit.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/photo/utilAjaxDivUpdate.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/photo/multi_sel.js', CClientScript::POS_HEAD);
?>

<div id="right_sidebar">
	<div id="right-panel" class="form well gsp-txt-color background_box">
		<div class="right-panel-content" style="padding: 10px">
			<div id="right-panel-content">
				<div id='edit_photo'>
					<div class="orange-button-small gsp-txt-color"><p>Submit</p></div>
					<?php if($firstModel!=null){?>
						<div style="padding: 3px 5px 3px 5px; width:145px; float: left; margin-bottom: 10px" class="alert in alert-info"><span id="cnt_img_selected">1</span> image(s) selected.</div>
					<?php }?>
					<div id="msg_error" class="alert in alert-error" style="display:none; width:215px; clear: both"></div>
					<div id="msg_success" class="alert in alert-success" style="display:none; width:215px; clear: both">Form has been saved.</div>
					<div id="msg_submit_success" class="alert in alert-success" style="display:<?php echo $displaySubmitSuccess?>; width:215px; clear: both">
						Photo(s) submitted and <a href="<?php echo Yii::app()->createUrl('photo/status')?>">waiting for review</a>.
						<!-- <a style="margin-top:5px" class="close icon-remove" data-dismiss="alert"></a> -->
					</div>
					<?php
						if($firstModel!=null){
							$this->renderPartial('_editProduct', array(
								'model'=>$firstModel,
								'categories'=>$categories,
								//'photoType'=>$photoType,
								//'categoriesBN'=>$categoriesBN,
								'selectedPhoto'=>$selectedPhoto,
								'idUserSlave'=>$id
							));
						}else
							echo "<br><br>No photos uploaded yet. Start now in the Upload section of this page!";
					?>
				</div>
				<?php
					if($firstModel!=null){?>
						Click on the map to insert position.
						<input class="search" type="text" size="20" id="address" name="address" style="color:grey; width: 192px" onKeyPress="return submitenter(event, codeAddress, this.value)" placeholder="Search location...">
						<a style="margin-bottom: 10px" class="btn" onClick="js: codeAddress(document.getElementById('address').value)">GO!</a>
						<div style="border: 1px solid black; height: 250px" id="map_canvas_small" <?php if($firstModel==null) echo 'display:none';?>">
						</div>
				<?php }?>
			</div>
			<div id='hidden_edit_photo' style='display:none'>No photos selected.</div>
		</div>
	</div>
</div>


<div id="left-panel" class="well gsp-txt-color background_box">
	<div class="orange-button-small gsp-txt-color"><p>Upload</p></div>
	<p>The minimum size of uploaded images is 4MP.
		We only accept JPEG format. Please, take few minutes to read our 
		<a target="_blank" href="<?php echo Yii::app()->createAbsoluteUrl('photo/guidelines')?>">guidelines</a>.
	</p>
	<?php $this->widget('bootstrap.widgets.TbTabs', array(
	    'type'=>'tabs',
	    'placement'=>'above', // 'above', 'right', 'below' or 'left'
		'htmlOptions'=>array('style'=>'color:#778899'),
	    'tabs'=>array(
	        array('label'=>'Html', 'content'=>$this->renderPartial('_upload', array('items'=>$items), true), 'active'=>true),
	        array('label'=>'Plugin', 'content'=>$this->renderPartial('_xUpload', array(), true)),
	        array('label'=>'FTP', 'content'=>$this->renderPartial('_ftpUpload', array('ftpAccount'=>$ftpAccount), true)),
	    ),
	)); ?>
</div>


<div class="margin-top-bottom container-fixed-margin gsp-txt-color" style="margin-left: 350px; margin-right: 350px">
<div class="container-fluid well background_box">
	<div class="orange-button-large gsp-txt-color"><p>Select Photos</p></div>

	<?php if(Yii::app()->user->isRoleAdmin() || Yii::app()->user->isRoleEditor()){?> 
	<!-- START SLAVE SELECTION INPUTS -->
	<div>		
		<?php 
			$url="'".Yii::app()->createUrl('/')."'";
			echo CHtml::dropDownList('userSlave','idUserSlave',
			CHtml::listData($dataOwnSwitchUser,'idUserSlave','idUserSlave0.username'),
			array('class'=>'span3', 'empty'=>'you','onchange'=>"selectSlaveUser(".$url.")",'options' =>array($id=>array('selected'=>true)),)
			); 
			?>
	</div>
	<!-- END SLAVE SELECTION INPUTS -->
	<?php }?>
	
	<?php if($firstModel!=null){?>
		<div class="alert in fade alert-success" style="width:390px; display: <?php echo $displayUploadSuccess?>">
			One or more photos have just been added. Thank you!<a style="margin-top:5px" class="close icon-remove" data-dismiss="alert"></a>
		</div>
		<div class="alert in fade alert-error" style="width:425px; display: <?php echo $displayUploadError?>">
			Sorry, something went wrong while uploading your photos.<a style="margin-top:5px" class="close icon-remove" data-dismiss="alert"></a>
		</div>
		
		<input id="multi_selection" type="checkbox" style="margin-right:5px; margin-top: 0px;" onClick="deselectAll()">Multi Selection</input>
				
		<div style='float:left; margin-right:10px'>
			
			<?php $form_all=$this->beginWidget('CActiveForm', array(
				'id'=>'photo-form-remove',
				//'enableAjaxValidation'=>false,
			));
				for($i=1; $i<=$selectedPhoto_all->count; $i++){ ?>
					<div style='display:none'>
						<?php echo $form_all->textField($selectedPhoto_all,'selection['.$i.']',array('size'=>2,'maxlength'=>2, 'id'=>'SelectedPhoto_image_all'.$i)); ?>
					</div>
				<?php } ?>
				<div class="btn-group">
					<?php
						$fuction = "editSelectionJson('".Yii::app()->createUrl('photo/editSelectionJson')."', null, null)";
						echo CHtml::button(
							'Select All',
							array('onclick' => $fuction, 'class'=>'btn btn-primary btn-small')
						); 
						echo CHtml::ajaxButton(
							'Deselect All',
							array('#'),
							array('afterSend' => "js: deselectAll()"),
							array('class'=>'btn btn-primary btn-small')
						);
					?>
				</div>
			<?php $this->endWidget(); ?>
		</div>
				
		<?php
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view_submit',
			'enablePagination'=>true,
			'ajaxUpdate'=>false,
			"template" => "{summary}{pager}{items}",
		));
	}else{
		echo "No photos uploaded yet.<br>Start now in the Upload section of this page!";
	}?>
</div></div>