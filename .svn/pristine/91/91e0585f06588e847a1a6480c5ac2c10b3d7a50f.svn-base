<script type="text/javascript">
function displayMore(div, link) {
	var div = document.getElementById(div);
	div.style.display="";
	var div = document.getElementById(link);
	div.style.display="none";
}
</SCRIPT>

<div class="container margin-top-bottom" style="text-align: center">	
	<div class="column3 well background_box">
		<div class="">
			<?php echo "<img style='max-height: 260px; max-width: 260px'
				src='".$modelGroup->getPhotoUrl()."' alt='".$modelGroup->name."' />";?>
		</div>
	</div>
	<div class="column3 well background_box" style="margin-left:20px; margin-right:20px">
		<h4 class="blue"><span class="orange"><?php echo CHtml::encode($modelGroup->name); ?></span> Group</h4>
		<!-- <div>
			<span class="gsp-txt-color"><?php //echo CHtml::encode($modelGroup->getAttributeLabel('name')); ?>:</span>
			<?php //echo CHtml::encode($modelGroup->name); ?>
		</div> -->
		<div>
			<span class="gsp-txt-color"><?php echo CHtml::encode($modelGroup->getAttributeLabel('town')); ?>:</span>
			<?php echo CHtml::encode($modelGroup->town); ?>
		</div>
		<div>
			<span class="gsp-txt-color"><?php echo CHtml::encode($modelGroup->getAttributeLabel('country')); ?>:</span>
			<?php echo CHtml::encode($modelGroup->country); ?>
		</div>
		<div style="text-align: justify; margin-top: 5px">
			<!-- <span class="gsp-txt-color"><?php //echo CHtml::encode($modelGroup->getAttributeLabel('description')); ?>:</span><br> -->
			<?php echo CHtml::encode($modelGroup->description); ?>
		</div>
	</div>
	<div class="column3_map well background_box" style="padding: 2px">
		<div id="map_canvas_small" style="width: 100%; height: 100%;"></div>
	</div>

	
	<div class="column3 well background_box">
		<h4 class="orange">GeoStockPhoto Statistics</h4>
		<?php 
			if($modelGroup->nPhotos>=20){
				echo $this->renderPartial('_viewGspGroup',
					array('modelGroup'=>$modelGroup)
				);
			}else{
				echo "<div class='darkblue'>In order to get visible the information on this block,
					the photographers still have to upload and get accepted <b>".(100-$modelGroup->nPhotos)."</b> photos.</div>";
			}
		?>
	</div>
	<div class="column3 well background_box" style="margin-left:20px; margin-right:20px">
		<h4 class="orange">Group History</h4>
		<?php if($modelGroup->nPhotos>=1000){?>
			<div class='darkblue'>Under construction.</div>
			<!-- <div style="text-align: justify">
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
				} else echo "The administrator has not inserted this information yet.";?>
			</div> -->
		<?php }else{
			echo "<div class='darkblue'>In order to get visible the information on this block,
				the photographers still have to upload and get accepted <br><b>".(1000-$modelGroup->nPhotos)."</b> photos.</div>";
		}?>
	</div>
	<div class="column3 well background_box">
		<h4 class="orange">Group Contacts</h4>
		<?php if($modelGroup->nPhotos>=10000){?>
			<div class='darkblue'>Under construction.</div>
			<!-- <div>
				<span class="gsp-txt-color"><?php //echo CHtml::encode($modelGroup->getAttributeLabel('mobilePhone')); ?>:</span>
				<?php //echo CHtml::encode($modelGroup->mobilePhone); ?>
			</div> -->
		<?php }else{
			echo "<div class='darkblue'>In order to get visible the information on this block,
				the photographers still have to upload and get accepted <br><b>".(10000-$modelGroup->nPhotos)."</b> photos.</div>";
		}?>
	</div>
	
	<div>	
		<?php
		if(!Yii::app()->user->isGuest){
			if($isAdmin){
				echo CHtml::link('Modify Group Info', Yii::app()->createUrl('/user/modify_group/', array('idGroup'=>$modelGroup->idGroup)),
					array('class'=>'btn btn btn-primary', 'style'=>'margin-bottom:20px'));
			}elseif($alreadyRegistered){
				echo "<div style='text-align: right; font-size: 90%'>";
				echo "You are registered in this group. ";
				echo CHtml::link('Leave it.', Yii::app()->createUrl('/user/leave_group/', array('idGroup'=>$modelGroup->idGroup)));
				echo "</div>";
			}elseif(!$modelGroup->isReserved || $verified){
				echo CHtml::link('Join Group', Yii::app()->createUrl('/user/join_group/', array('idGroup'=>$modelGroup->idGroup)), array('class'=>'btn btn-large btn-primary', 'style'=>'margin-bottom:20px'));
			}else{
				echo "<div style='text-align: right; font-size: 90%'>";
				echo "This group is reserved.";
				echo "</div>";
			}
		}
		?>
	</div>
</div>


<!-- <div id="photo-line">
</div> -->