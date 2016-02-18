<div class="container-central-form" style='margin-left: 100px; margin-right: 100px; text-align: center'>
<div class="well background_box">
	<h3 class="darkblue">Create a group on GeoStockPhoto</h3>
	
	<div>
		<div class="alert in alert-success" style="width: 490px; float: left; margin-top: 15px; margin-bottom: 0px">
			<b>What is GeoStockPhoto?</b>
			It's a unique marketplace for geotagged photos that allows its members to set prices and fix the license sale.
			GeoStockPhoto is also the marketplace where photographers can earn up to 85% of each photograph sold.
		</div>
		<div style="width: 150px; float: right">
			<img src="<?php echo Yii::app()->baseUrl?>/images/geotag_notext.jpg"/>
		</div>
	</div>
	
	<div>
		<div style="width: 150px; float: left; margin-top: 15px">
			<img src="<?php echo Yii::app()->baseUrl?>/images/community.jpg"/>
		</div>
		<div class="alert in alert-success" style="width: 490px; float: right; margin-top: 15px">
			<!-- <b>Cos'&egrave un Gruppo su GeoStockPhoto?</b> -->
			Are you in charge of a <b>Group</b> of photographers? <br> Bring them on GeoStockPhoto: the gain is double! <br>
			You can increase the <b>visibility</b> of the group and its members,<br>
			and receive an <b>extra percentage from the sales</b> of your associates.
		</div>
	</div>
	
	<div style="clear: both; margin-bottom: 20px; margin-top: 40px">
		See our group page as a demo:<br>
		<?php echo CHtml::link('GeoStockPhoto Group', Yii::app()->createUrl('/groups')."/GeoStockPhoto")?>
	</div>
	
	<div style="clear: both; margin-bottom: 20px">
		You can also choose to create a group with <b>public</b> access (for all GeoStockPhoto users)
		or set a <b>private</b> access (only the users you want can be part of it). <br>
		Remember though that group's page is always visible to everyone.
	</div>
	
	<div style="margin-bottom: 20px">
		<b>Sale commissions</b> assigned to the administrator of the group are calculated as a percentage of the net that GeoStockPhoto gains
		from each sale. These have a duration of five years from when the user has joined the group.
		<a name="commissions" class="anchor">&nbsp;</a>
		<table class="table table-bordered table-striped table-condensed" style="width:700px; margin-top: 10px">
			<thead>
				<tr>
					<td></td>
					<td><b>1&deg; year</b></td>
					<td><b>2&deg; year</b></td>
					<td><b>3&deg; year</b></td>
					<td><b>4&deg; year</b></td>
					<td><b>5&deg; year</b></td>
				</tr>
			</thead>
			<tr>
				<td style="text-align: center"><b>Commission</b></td>
				<td style="text-align: center">10%</td>
				<td style="text-align: center">8%</td>
				<td style="text-align: center">6%</td>
				<td style="text-align: center">4%</td>
				<td style="text-align: center">2%</td>
			</tr>
		</table>
	</div>
	
	<div style="clear: both; margin-bottom: 20px">
		For more information, please refer to
		<?php echo CHtml::link('Terms e Conditions', Yii::app()->createUrl('/group-terms'));?>.<br>
		For any further questions, please do not hesitate to contact us at our email address <?php echo CHtml::mailto("info@geostockphoto.com"); ?>
	</div>
	
	<?php if(Yii::app()->user->isGuest){?>
		<div style="margin-bottom: 20px">
			Ask for the creation of a Group on GeoStockPhoto!
			<div style="margin: 5px">
				<a href="<?php echo urldecode($fbLoginUrl); ?>"><img src='<?php echo Yii::app()->baseUrl; ?>/images/fb-connect-button-sm_transp.png' alt='' /></a>
				 - O -  
				<a class="btn btn-large btn-primary" href="<?php echo Yii::app()->createAbsoluteUrl('user/create', array('landing'=>true))?>">Register for Free</a>
			</div>
			<div>Already registered? <a class="darkblue" href="<?php echo Yii::app()->createAbsoluteUrl('site/login')?>">Login</a></div>
		</div>
	<?php }else{?>
		<div style="margin-bottom: 20px">
			Fill in this form to request the <b>creation of a new Group</b> on GeoStockPhoto. <br>
			A member of our staff will contact you as soon as possible.
		</div>
		
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'group-form',
			'enableAjaxValidation'=>false,
			'htmlOptions'=>array(
		        'onSubmit'=>'js: return false;'
		    )
		)); ?>
		<div style="clear: both">
			<div>
				Name of the Group
				<div>
					<?php echo $form->textField($modelGroup,'name',array('size'=>32,'maxlength'=>32)); ?>
				</div>		
			</div>
		
			<div class="control-group">
				<div>Access</div>
				<select style="width: 120px" name='ConfGroups[isReserved]'>
				  <option value="0">Public</option>
				  <option value="1">Private</option>
				</select>
			</div>
		
			<div style="text-align:center">
				<div>	
					<?php echo "Accept ".CHtml::link('Terms and Conditions', Yii::app()->createUrl('/group-terms'));?>
					<?php echo $form->checkBox($modelGroup,'acceptTerms',array('style'=>'margin-top:0px')); ?>
				</div>
			</div>
			
			<div class="buttons" style="text-align: center">
				<?php
					//echo CHtml::submitButton('Invio',array('class'=>'btn btn-primary','style'=>'margin: 15px 0 5px 0'));
					echo CHtml::ajaxSubmitButton(
						"Send Request",
						array('user/ajaxCreateGroup'),
						array('beforeSend' => "js:function(){
								document.getElementById('msg_success').style.display='none';
								document.getElementById('msg_error').style.display='none';
							}",
							'complete'=>"js: function(xhr){submitted(xhr, 'null', 'msg_error', 'msg_success')}"
						),
						array('class'=>'btn btn-primary', 'style'=>'margin: 15px 5px 0 0')
					);
					//echo CHtml::resetButton('Cancel',array('class'=>'btn', 'style'=>'margin: 15px 0 0 5px')); ?>
			</div>
		</div>
		<br>
		<div id="msg_error" class="alert in alert-error" style="display: none"></div>
		<div id="msg_success" class="alert in alert-success" style="display: none">
			Your request has been sent. <br>
			A member of our staff will contact you soon.
		</div>
		<?php $this->endWidget();
	}?>

</div><!-- form -->
</div>