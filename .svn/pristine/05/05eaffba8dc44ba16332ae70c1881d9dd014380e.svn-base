<script type="text/javascript">
function displayMore(div, link) {
	var div = document.getElementById(div);
	div.style.display="";
	var div = document.getElementById(link);
	div.style.display="none";
}
</SCRIPT>

<div class="container margin-top-bottom" style="text-align: center">
	<div>	
		<?php if($viewhimself){
			echo CHtml::link('Modify your profile', Yii::app()->createUrl('/user/modify/'), array('class'=>'btn btn btn-primary', 'style'=>'margin-bottom: 10px'));
			if($modelUser->photoProfile==0 || $modelUser->lat==null){?>
				<div style="margin: 0 10px 10px 0" class="alert in alert-error">
					<span style="font-weight: bold">Don't miss this: </span>insert a photo and your position, customers will find you
					on our <a href="<?php echo Yii::app()->createUrl('user/map')?>">map with all our photographers</a>.<br>
					<span style="font-size: 90%">(You also need to have at least one photo in your portfolio. Soon customers will be able to request photos on-demand.)</span>
				</div>
			<?php }
		}?>
	</div>
	
	<div class="column3 well background_box">
		<div class="">
			<?php echo "<img style='max-height: 260px; max-width: 260px'
				src='".$modelUser->getPhotoUrl()."' alt='".$modelUser->username."' />";?>
		</div>
	</div>
	<div class="column3 well background_box" style="margin-left:15px; margin-right:15px"> <!-- margin should be 20 -->
		<h4 class="orange">Personal Info</h4>
			<b>Username:</b> <?php echo $modelUser->username; ?>
		<div>
			<b><?php echo CHtml::encode($modelUser->getAttributeLabel('name')); ?>:</b>
			<?php echo CHtml::encode($modelUser->name); ?>
		</div>
		<div>
			<b><?php echo CHtml::encode($modelUser->getAttributeLabel('surname')); ?>:</b>
			<?php echo CHtml::encode($modelUser->surname); ?>
		</div>
		<div>
			<b><?php echo CHtml::encode($modelUser->getAttributeLabel('birthdate')); ?>:</b>
			<?php
				$parse=CDateTimeParser::parse($modelUser->birthdate, 'yyyy-MM-dd');
				if($parse){
					$birthdate=Yii::app()->dateFormatter->format(
						'dd/MM/yyyy',
						$parse
					);
					echo CHtml::encode($birthdate);
				}
			?>
		</div>
		<div>
			<b><?php echo CHtml::encode($modelUser->getAttributeLabel('town')); ?>:</b>
			<?php echo CHtml::encode($modelUser->town); ?>
		</div>
		<div>
			<b><?php echo CHtml::encode($modelUser->getAttributeLabel('country')); ?>:</b>
			<?php echo CHtml::encode($modelUser->country); ?>
		</div>
		<!-- <div>
			<?php //echo $modelUser->fee." - ".$modelUser->realFee; ?>
		</div> -->
	</div>
	<div class="column3_map well background_box" style="padding: 2px">
		<div id="map_canvas_small" style="width: 100%; height: 100%;"></div>
	</div>

	
	<div class="column3 well background_box">
		<h4 class="orange">GeoStockPhoto Statistics</h4>
		<?php 
			if($modelUser->nPhotos>=$personalStatisticsInfoThreshold){
				echo $this->renderPartial('_viewGspPhotographer',
					array('modelUser'=>$modelUser,
						'nPhotos'=>$modelUser->nPhotos
					)
				);
			}else{
				if($viewhimself){
					echo "<a href=".Yii::app()->createUrl('photo/submit')."><div>In order to get visible the information on this block,
						you still have to upload and get accepted <b>".(10-$modelUser->nPhotos)."</b> photos.</div></a>";
				}else{
					echo "<div class='darkblue'>In order to get visible the information on this block,
						the photographer still have to upload and get accepted <br><b>".(10-$modelUser->nPhotos)."</b> photos.</div>";
				}
			}
		?>
	</div>
	<div class="column3 well background_box" style="margin-left:15px; margin-right:15px">
		<h4 class="orange">Photographer Info</h4>
		<?php if($modelUser->nPhotos>=$personalInfoThreshold){?>
			<!-- <div class='darkblue'>Under construction.</div> -->
			<div style="text-align: justify">
				<?php if($CVSummary_start!=""){
					echo $CVSummary_start;
					if($CVSummary_end!=""){?>
						<span id='linkBio'>
							... [<a style='cursor: pointer' onClick="js: displayMore('bio', 'linkBio')">read more</a>]
						</span>
						<span style='display: none' id='bio'>
							<?php echo $CVSummary_end?>
						</span>
					<?php }
				} else echo "The photographer has not inserted his bio yet.";?>
			</div>
		<?php }else{
			if($viewhimself){
				echo "<a href=".Yii::app()->createUrl('photo/submit')."><div>In order to get visible the information on this block,
					you still have to upload and get accepted <b>".($personalInfoThreshold-$modelUser->nPhotos)."</b> photos.</div></a>";
			}else{
				echo "<div class='darkblue'>In order to get visible the information on this block,
					the photographer still have to upload and get accepted <br><b>".($personalInfoThreshold-$modelUser->nPhotos)."</b> photos.</div>";
			}
		}?>
	</div>
	<div class="column3 well background_box">
		<h4 class="orange">Personal Contacts</h4>
		<?php if($modelUser->nPhotos>=$personalContactsThreshold){?>
			<?php
			if($n=count($modelUser->ownUserContacts)){
				?><diV class="row-float" id="social-container">  <?php
				for($k=0; $k<$n; $k++){
					if(preg_match("/[a-zA-Z0-9-]{1,}@([a-zA-Z\.])?[a-zA-Z]{1,}\.[a-zA-Z]{1,4}/i", $modelUser->ownUserContacts[$k]->uri)){ //Solo se è una email cambio il link
						echo '<a href="mailto:'.$modelUser->ownUserContacts[$k]->uri.'"><img  style="margin-right:5px; margin-top: 5px;" src="'.Yii::app()->baseUrl.'/images/personalcontacts/'.$modelUser->ownUserContacts[$k]->idUserContactType0->name.'.png" border="0" height="48"  width="48" alt="'.$modelUser->ownUserContacts[$k]->uri.'"></a>';
					}else {
						$http='';
						if(!preg_match("/(https?:\/\/)/i", $modelUser->ownUserContacts[$k]->uri)){
							$http='http://';
						}
						echo '<a href="'.$http.$modelUser->ownUserContacts[$k]->uri.'" target="_blank"><img  style="margin-right:5px; margin-top: 5px;" src="'.Yii::app()->baseUrl.'/images/personalcontacts/'.$modelUser->ownUserContacts[$k]->idUserContactType0->name.'.png" border="0" height="48"  width="48" alt="'.$modelUser->ownUserContacts[$k]->uri.'"></a>';
					}
				}
				?></diV>  <?php
			} else {?>
				<div class='darkblue'>There are no personal contacts.</div>
			<?php } ?>
			<!-- <div>
				<b><?php //echo CHtml::encode($modelUser->getAttributeLabel('mobilePhone')); ?>:</b>
				<?php //echo CHtml::encode($modelUser->mobilePhone); ?>
			</div> -->
		<?php }else{
			if($viewhimself){
				echo "<a href=".Yii::app()->createUrl('photo/submit')."><div>In order to get visible the information on this block,
					you still have to upload and get accepted <b>".($personalContactsThreshold-$modelUser->nPhotos)."</b> photos.</div></a>";
			}else{
				echo "<div class='darkblue'>In order to get visible the information on this block,
					the photographer still have to upload and get accepted <br><b>".($personalContactsThreshold-$modelUser->nPhotos)."</b> photos.</div>";
			}
		}?>
	</div>
</div>

<div class="tabs">
	<a onclick="<?php echo $modelUser->getUrlTopPhotosUser(0, 'best')?>">
		<div class="left tab_active"><p>BEST</p></div>
	</a>
	<a onclick="<?php echo $modelUser->getUrlTopPhotosUser(0, 'last')?>">
		<div class="right tab_no_active"><p>LAST</p></div>
	</a>
</div>
<div id="photo-line">
</div>