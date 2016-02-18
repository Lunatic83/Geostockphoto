<!-- <div class="photo">
	<IMG id='img_photo' SRC='<?php //echo $model->getUrl(430)?>' alt='<?php //echo $model->title?>'/>
</div> -->

<div class="tabs">
	<ul class="labels clearfix">
	<li id="tab_photo" class="active" onclick="js:tabClick('photo')">Photo</li>
	<li id="tab_info" onclick="js:tabClick('info')">Information</li>
	<li id="tab_price" onclick="js:tabClick('price')">Price</li>
	</ul>
	<div class="cb"></div>
	<ul class="contents">
	<li id="cont_photo" class="active" style="text-align: center">
		<IMG id='img_photo' SRC='<?php echo $model->getUrl(430)?>' alt='<?php echo $model->title?>'/>
	</li>
	<li id="cont_info">
		<p><?php echo $model->title?></p>
		<dl>
			<dt>By:</dt>
			<dd><?php echo $model->idUser0->printLink()?></dd>

			<dt>Categories:</dt>
			<dd><?php echo $model->photoPrePost->idCategory10->name;
				if($model->photoPrePost->idCategory20)
					echo " - ".$model->photoPrePost->idCategory20->name;
			?></dd>

			<?php if ($model->idProductStatus!=6){?>
			<dt>Size:</dt>
			<dd>
				<?php if(count($size)>0){
					$k=0;
					foreach($size as $size_value){
						if(isset($size_value)){
							if($k!=0) echo " - ";
							echo $size_value;
							$k++;
						}
					}
				}?>
			</dd>

			<dt>Licenses:</dt>
			<dd>
				<?php if(count($license)>0){
					for($k=0; $k<count($license); $k++){
						if($license[$k]->idLicense0->printName){
							if($k!=0) echo " - ";
							echo $license[$k]->idLicense0->printName;
						}
					}
				}?>
			</dd>
			<?php }?>
		</dl>
	</li>
	<li id="cont_price">
		<?php $this->widget('application.components.widgets.ShoppingOptTbl', array(
			'licenseType'=>$model->shoppingPhotoType->licenseType,
			'idProduct'=>$model->idProduct
		));?>
	</li>
	</ul>
</div>
 