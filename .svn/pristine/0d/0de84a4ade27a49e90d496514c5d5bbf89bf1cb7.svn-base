<?php
 
class ProductInfo extends CWidget
{
	var $id;
	var $zoom;
	var $vote=false;
	var $showOuter=true;
	var $showArrow=false;
	var $refreshSC=false;
	var $btnDetails=true;
	var $class="right-panel";
	
    public function run(){
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile(Yii::app()->baseUrl.'/js/controller/photo/utilAjaxDivUpdate.js', CClientScript::POS_HEAD);
		
		$modelProductPp=ProductPrePost::model()->findByPk($this->id);
		
		// Opzioni comuni a tutte le seguenti ricerche
		$criteria=new CDbCriteria;
		$criteria->condition='idProduct=:idProduct';
		$criteria->params=array(':idProduct'=>$this->id);
		
		$license=null;
		$shoppingOptPhoto=null;
		$sizeIcon=null;
		$size=array();
		$minPrice=null;
		$maxPrice=null;
		if($modelProductPp->idProductStatus!=6){
			if($modelProductPp->shoppingPhotoType->licenseType=='RF'){
				$criteria->order='idSize ASC';
				$shoppingOptPhoto=ShoppingOptPhoto::model()->findAll($criteria);
				
				$criteria->select='idLicense';
				$criteria->group='idLicense';
				$criteria->order='';
				$license=ShoppingOptPhoto::model()->findAll($criteria);
			}else if($modelProductPp->shoppingPhotoType->licenseType=='RM'){
				$criteria->order='idSize ASC';
				$shoppingOptPhoto=ShoppingOptPhotoRm::model()->findAll($criteria);
				
				$license[0]->idLicense0->iconSrc=Yii::app()->baseUrl."/images/icon-rm-small.png";
				$license[0]->idLicense0->printName="<span style='color: red'>RM</span>";
			}
			
			$maxPrice = $shoppingOptPhoto[0]->price2dec;
			array_push($size, $shoppingOptPhoto[0]->idSize0->code);
			$minPrice = $maxPrice;
			for($i=1; $i<count($shoppingOptPhoto); $i++){
				if($shoppingOptPhoto[$i]->price > $maxPrice)
					$maxPrice = $shoppingOptPhoto[$i]->price2dec;
				elseif($shoppingOptPhoto[$i]->price < $minPrice)
					$minPrice = $shoppingOptPhoto[$i]->price2dec;
				array_push($size, $shoppingOptPhoto[$i]->idSize0->code);
			}
			$size=array_unique($size);
			$sizeIcon=$shoppingOptPhoto[0]->idSize0->iconSrc;
		}
		
		// ADD MOTIVATIONS of rejection
		$motivations=array();
		if($modelProductPp->idProductStatus==4){
			if(isset($modelProductPp->reviews)){
				for($i=0; $i<count($modelProductPp->reviews); $i++){
					if(isset($modelProductPp->reviews[0]->reviewMotivations)){
						for($j=0; $j<count($modelProductPp->reviews[$i]->reviewMotivations); $j++){
							//$motivations=$modelProductPp->reviews[$i]->reviewMotivations[$j]->idMotivation0->motivation;
							array_push($motivations, $modelProductPp->reviews[$i]->reviewMotivations[$j]->idMotivation0->motivation);
						}
					}
				}
				$motivations=array_unique($motivations); 
			}
			$this->btnDetails=false;
		}
		
		// ADD (OR REMOVE) TO (FROM) SHOPPING CART
		//$icon='';
		$linkSC='';
		$textSC="Add to Shopping Cart";
		$classSC='btn btn-primary';
		//$isInShoppingCart=false;
		if($modelProductPp->idProductStatus==3){
			if(Yii::app()->user->isGuest){
				$linkSC="location.href='".Yii::app()->createUrl('site/login')."'";
			}else{
				$modelSC = new ShoppingCart;
				$modelSC->idProduct = $this->id;
				//$isInShoppingCart = $modelSC->checkPresence();
				if($modelSC->checkPresence()){
					$textSC="Remove from Cart";
					$classSC='btn';
				}
				if($this->refreshSC){
					$linkSC="ajaxFunctionGeneric('".Yii::app()->createUrl('shopping_cart/addRemove',
						array('idProduct'=>$modelProductPp->idProduct))."', 'shopping_cart', '".Yii::app()->createUrl('shopping_cart/index')."')";
				}else{
					$linkSC="ajaxFunctionGeneric('".Yii::app()->createUrl('shopping_cart/addRemove', array('idProduct'=>$modelProductPp->idProduct))."', 'shopping_cart')";
				}
			}
		}
			
        $this->render('productInfo2', array(
			'model'=>$modelProductPp,
			'linkSC'=>$linkSC,
        	'textSC'=>$textSC,
        	'classSC'=>$classSC,
			'sizeIcon'=>$sizeIcon,
        	'size'=>$size,
			'minPrice'=>$minPrice,
			'maxPrice'=>$maxPrice,
			'license'=>$license,
        	'zoom'=>$this->zoom,
        	'vote'=>$this->vote,
        	'motivations'=>$motivations,
        	'showOuter'=>$this->showOuter,
        	'showArrow'=>$this->showArrow,
        	'class'=>$this->class,
        	'btnDetails'=>$this->btnDetails,
        	'gspAccuracy'=>$modelProductPp->idUser0->GpsAccuracy
		));
    }
}