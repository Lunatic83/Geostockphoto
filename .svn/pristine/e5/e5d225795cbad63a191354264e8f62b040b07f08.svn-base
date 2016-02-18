<script type="text/javascript">
var id_checked_old = new Array();
<?php 
	for($i=0; $i<count($data); $i++){
		if(isset($data[$i]->rowSelected)){
			echo "id_checked_old['".$data[$i]->idProduct."[]']=new Array();";
			echo "id_checked_old['".$data[$i]->idProduct."[]']['".$data[$i]->idProduct."_".$data[$i]->rowSelected."']=true;";
		}
	}
?>
</SCRIPT>

<?php if(count($data)>0){
	$this->widget('application.components.widgets.ProductInfo',
		array('id'=>$data[0]->idProduct, 'zoom'=>true, 'refreshSC'=>true));?>

	<div id="left-panel" class="form well gsp-txt-color background_box">
	    <div class="wrapper">
			<?php for($i=0; $i<count($data); $i++){
				if(isset($data[$i])){
					$idProduct=$data[$i]->idProduct;
					$lat=$data[$i]->idProduct0->photoPrePost->lat;
					$lng=$data[$i]->idProduct0->photoPrePost->lng;
					$ratio=$data[$i]->idProduct0->photoPrePost->ratio;
					if($ratio>1)
						$margin_top=60-60/$ratio;
					else
						$margin_top="";?>
						
	    			<input type="hidden" id="idSelected" value="<?php echo $idProduct?>" />
		
					<div class="view" id="view<?php echo $idProduct?>">
						<?php if($i==0) $border="border:3px solid #FFC345;"; else $border="";?>
						<div class="view_inner" style='margin-top:<?php echo $margin_top?>px'>
						<?php
							$img = "<img class='photo' src='".$data[$i]->idProduct0->getUrl(120)."' style='".$border."' alt='' id='id".$idProduct."'/>";
							$function = 'moveAndSelect('.$idProduct.');
								ajaxFunctionProductInfo(
									\''.Yii::app()->createAbsoluteUrl('photo/showInfoPhoto').'/id/'.$idProduct.'/refreshSC/1\','.
									$idProduct.','.
									$lat.','.
									$lng.',
									\'null\');';
							echo CHtml::link(
								  $img,
								  '',
								  array('onclick' => $function, 'style'=>'cursor: pointer')
							);
						?>
						</div>
					</div>
				<?php }
			}?>
		</div>
	</div>
<?php }?>
	
		
	
<div class="margin-top-bottom container-fixed-margin">
<div class="well background_box container" style="width: 710px">
	<?php if(count($data)>0){?>
		<input type="hidden" id="userCreditsAmount" value="<?php echo $userCreditsAmount?>" />
		
		<div style='width: 640px; text-align: center; margin: auto'>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'shopping-opt-form',
				'action'=>Yii::app()->createUrl('shopping_cart/buy'),
				'htmlOptions'=>array(
			        'onSubmit'=>'js: return false;'
			    )
			));?>
				
				<?php for($i=0; $i<count($data); $i++){
					if(isset($data[$i])){
						if(isset($data[$i]->idDuration))
							$idDuration = $data[$i]->idDuration;
						else 
							$idDuration = 0;
						if($i==0) echo "<div class='well' id='SO_".$data[$i]->idProduct."'>";
						else echo "<div class='well' style='display: none' id='SO_".$data[$i]->idProduct."'>";
						echo "<h4 class='darkblue' style='margin-bottom: 0px'>ID Photo ".$data[$i]->idProduct."</h4>";
						echo "Select the License you want to buy.";
						$this->widget('application.components.widgets.ShoppingOptTbl', array(
							'licenseType'=>$data[$i]->idProduct0->shoppingPhotoType->licenseType,
							'idProduct'=>$data[$i]->idProduct,
							'buyColumn'=>true,
							'form'=>$form,
							'index'=>$i,
							'idDuration'=>$idDuration
						));
						echo "</div>";
					}
				}?>
				
				
				<div class="well">
					<!-- <div style="margin-bottom: 10px">You have <b><?php //echo $data[0]->idUser0->credits?></b> credits.</div> -->
					<h4>Shopping Cart Summary</h4>
					<table class="table table-bordered table-striped table-condensed" style="width: 100%; margin-top: 10px">
						<thead>
							<tr>
								<td>ID Photo</td>
								<td>Size</td>
								<td>License</td>
								<td>Credits</td>
							</tr>
						</thead>
						<?php for($i=0; $i<count($data); $i++){
							if(isset($data[$i])){?>
								<tr id="cartSum_<?php echo $data[$i]->idProduct?>[]" style="display: <?php if(!isset($data[$i]->rowSelected)) echo "none"?>">
									<?php
										$function = 'moveAndSelect('.$data[$i]->idProduct.');
											ajaxFunctionProductInfo(
												\''.Yii::app()->createUrl('photo/showInfoPhoto').'/id/'.$data[$i]->idProduct.'/refreshSC/1\','.
												$data[$i]->idProduct.','.
												$data[$i]->idProduct0->photoPrePost->lat.','.
												$data[$i]->idProduct0->photoPrePost->lng.',
												\'null\');';
										$link = CHtml::link(
											  $data[$i]->idProduct,
											  '',
											  array('onclick' => $function, 'style'=>'cursor: pointer')
										);
									?>
									<td style="text-align: center"><?php echo $link?></td>
									<td id="cartSum_size_<?php echo $data[$i]->idProduct?>[]" style="text-align: center"><?php echo $data[$i]->optSel['size']?></td>
									<td style="text-align: center"><?php echo $data[$i]->idProduct0->shoppingPhotoType->licenseType?></td>
									<td id="cartSum_price_<?php echo $data[$i]->idProduct?>[]" style="text-align: center"><?php echo $data[$i]->optSel['price']?></td>
								</tr>
							<?php }
						}?>
					</table>
					
					<div>
						N&deg photos: 
						<?php echo CHtml::textField('cntPhotos', $nPhotos, array('size'=>4, 'id'=>'cntPhotos', 'readOnly'=>'true',
							'style'=>'margin-top: 7px; margin-right: 5px; width:40px; font-weight: bold;')); // border:none; background:white;?>
						&nbsp;&nbsp;&nbsp;
						Total credits due:
						<?php echo CHtml::textField('totPrice', $totPrice, array('size'=>4, 'id'=>'totPrice', 'readOnly'=>'true',
							'style'=>'margin-top: 7px; margin-right: 5px; width:40px; font-weight: bold;')); // border:none; background:white;?>
						&nbsp;&nbsp;&nbsp;
						Your credits:
						<?php echo CHtml::textField('myCredits', $data[0]->idUser0->credits, array('size'=>4, 'id'=>'myCredits', 'readOnly'=>'true',
							'style'=>'margin-top: 7px; margin-right: 5px; width:40px; font-weight: bold;')); // border:none; background:white;?>
					</div>
					
					<?php if($discount>0){?>
						<div id="msg_success" class="alert in alert-success">
							COUPON: You have a discount of 
							<span id="discount"><?php echo $discount*100;?></span>&#37;
							on your first purchase.
						</div>
					<?php }?>
						
					<?php if($enableSales){?>
						<div id="buttonBuy" style="display: <?php if($nPhotos==0 || $modelConfBuyCredits->shoppingCartCreditsAmount>0) echo "none"?>">
							<?php echo CHtml::ajaxSubmitButton(
								"Buy photo(s)!",
								array('shopping_cart/buy'),
								array('beforeSend' => "js:function(){
										document.getElementById('msg_error').style.display='none';
									}",
									'complete'=>"js: function(xhr){submitted(xhr, '".CController::createUrl('photo/purchased')."', 'msg_error', 'null')}"
								),
								array('class'=>'btn btn-primary')
							);?>
						</div>
					<?php }else{?>
						<div style="margin-top: 10px" class="darkblue"><b>Sales will open soon. Stay tuned!</b></div>
					<?php }?>
				</div>
			<?php $this->endWidget();?>
					
			<?php if($enableSales){?>
				<div id="buy_credits" style="display: <?php if($nPhotos==0 || $modelConfBuyCredits->shoppingCartCreditsAmount==0) echo "none"?>">
					<?php $this->renderPartial('buyCreditsCart',array(
						'modelConfBuyCredits'=>$modelConfBuyCredits
					));?>
				</div>
			<?php }?>
			
			<div id="msg_error" class="alert in alert-error" style="display:none"></div>
		</div>
		
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'shopping-opt-form-paypal',
			'action'=>Yii::app()->createUrl('paypal/buyCreditsCart'),
			
		)); ?>
			<?php echo CHtml::textField('shoppingCartCreditsAmount','0',array('size'=>4, 'id'=>'shoppingCartCreditsAmount', 'readOnly'=>'true', 'style'=>'border:none; background:white; font-weight: bold; display:none;'));?>
			
		<?php $this->endWidget();?>
		
	<?php }else{ ?>
		<div>
			You do not have any photos in your Shopping Cart.<br>
			Go to our <a href="<?php echo Yii::app()->createUrl('photo/index')?>">Map</a> and see how many beautiful pictures you can find.
		</div>
	<?php }?>
</div></div>