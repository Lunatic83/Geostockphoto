<?php
 
class ShoppingOptTbl extends CWidget{
	
	var $buyColumn=false;
	var $idProduct;
	var $licenseType;
	var $form=false;
	var $index;
	var $idDuration=0;
	
    public function run(){
		$criteria=new CDbCriteria;
		$criteria->condition='idProduct=:idProduct';
		$criteria->params=array(':idProduct'=>$this->idProduct);
		if($this->licenseType=='RF')
			$shoppingOptPhoto_str_tbl='ShoppingOptPhoto';
		else if($this->licenseType=='RM')
			$shoppingOptPhoto_str_tbl='ShoppingOptPhotoRm';
		$dataShoppingOptPhoto = new CActiveDataProvider($shoppingOptPhoto_str_tbl, array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>30),
		));
		
		//Se lo sposto dopo la tabella il check "Buy this" non funziona a causa di un conflitto id ID
		if($this->form){
			$shoppingOptPhoto=$dataShoppingOptPhoto->getData();
			echo "<div style='display: none'>";
			$index=$this->index;
			echo $this->form->textField($shoppingOptPhoto[0]->idProduct0,'licenseType',array('name'=>'PhotoType['.$index.']', 'size'=>1));
			for($k=0; $k<count($shoppingOptPhoto); $k++){
				echo $this->form->textField($shoppingOptPhoto[$k],'idProduct',array('name'=>'ShoppingOptPhoto[idProduct]['.$index.']['.$k.']', 'size'=>10,'maxlength'=>10));
				echo $this->form->textField($shoppingOptPhoto[$k],'idSize',array('name'=>'ShoppingOptPhoto[idSize]['.$index.']['.$k.']', 'size'=>1));
				if($this->licenseType=='RF'){
					echo $this->form->textField($shoppingOptPhoto[$k],'price',array('name'=>'ShoppingOptPhoto[price]['.$index.']['.$k.']', 'id'=>$this->idProduct.'_'.$k, 'size'=>5,'maxlength'=>5));
					echo $this->form->textField($shoppingOptPhoto[$k],'idLicense',array('name'=>'ShoppingOptPhoto[idLicense]['.$index.']['.$k.']', 'size'=>1));
				}else{
					echo $this->form->textField($shoppingOptPhoto[$k],'priceMultFact',array('name'=>'ShoppingOptPhoto[price]['.$index.']['.$k.']', 'id'=>$this->idProduct.'_'.$k, 'size'=>5,'maxlength'=>5));
					echo $this->form->textField($shoppingOptPhoto[$k],'idRMdetails',array('name'=>'ShoppingOptPhoto[idRMdetails]['.$index.']['.$k.']', 'size'=>1));
					echo $this->form->textField($shoppingOptPhoto[$k],'duration',array('name'=>'ShoppingOptPhoto[idDuration]['.$index.']['.$k.']', 'size'=>1));
				}
			}
			echo "</div>";
		}
		
		if($this->licenseType=='RM'){
			$multFact=1;
			if($this->buyColumn){
				$stringPrice='$data->priceMultFact';
			}else{
				$stringPrice='$data->price2dec';
			}
			$column=array(
				/*array( 
			      'name'=>'idSize',
			      'value'=> '$data->idSize0->code',
			      'htmlOptions'=>array('width'=>'10px', 'style'=>'text-align: center', 'id'=>'size'), 
			    ),
			     array( 
			      'header'=>'Pixel',
			      'value'=> '$data->width." x ".$data->height',
			      'htmlOptions'=>array('width'=>'60px', 'style'=>'text-align: center'), 
			    ),
			     array( 
			      'header'=>'Cm',
			      'value'=> '$data->widthCm." x ".$data->heightCm." (".$data->dpi."dpi)"',
			      'htmlOptions'=>array('width'=>'100px', 'style'=>'text-align: center'), 
			    ),*/
			     array(
			      'name'=>'Industry', 
			      'value'=> '$data->idRMdetails0->idRMtype0->nameRMtype',
			      'htmlOptions'=>array('width'=>'10', 'style'=>'text-align: center'), 
			    ),
			     array( 
			      'name'=>'Use',
			      'value'=> '$data->idRMdetails0->nameRMdetails',
			      'htmlOptions'=>array('width'=>'10', 'style'=>'text-align: center'), 
			    ),
			     array( 
			      'name'=>'Credits',
			      'value'=> $stringPrice,
			      'htmlOptions'=>array('width'=>'10px', 'style'=>'text-align: center', 'id'=>'price'), 
			    )
			);
		}else{
			$column=array(
				array( 
			      'name'=>'idSize',
			      'value'=> '$data->idSize0->code',
			      'htmlOptions'=>array('width'=>'10px', 'style'=>'text-align: center', 'id'=>'size'), 
			    ),
			     array( 
			      'header'=>'Pixel',
			      'value'=> '$data->width." x ".$data->height',
			      'htmlOptions'=>array('width'=>'60px', 'style'=>'text-align: center'), 
			    ),
			     array( 
			      'header'=>'Cm',
			      'value'=> '$data->widthCm." x ".$data->heightCm." (".$data->dpi."dpi)"',
			      'htmlOptions'=>array('width'=>'100px', 'style'=>'text-align: center'), 
			    ),
			    array( 
			      'name'=>'idLicense', 
			      'value'=> '$data->idLicense0->name',
			      'htmlOptions'=>array('width'=>'10px', 'style'=>'text-align: center'), 
			    ),
			     array( 
			      'name'=>'Credits',
			      'value'=> '$data->price2dec',
			      'htmlOptions'=>array('width'=>'10px', 'style'=>'text-align: center', 'id'=>'price'), 
			    )
			);
		}
		if($this->buyColumn){
			if($this->licenseType=='RM'){
				$indice_buy=3;
			}else{
				$indice_buy=5;
			}
	        $column[$indice_buy]=array( 
	          'header'=>'Buy this!',
		      'class'=>'CCheckBoxColumn',
		      'value'=>'$row',
		      'id'=>$this->idProduct,
	          'checked'=>'$row==$data->idProduct0->rowSelected && $data->idProduct0->rowSelected!=null',
	          'htmlOptions'=>array('width'=>'5', 'style'=>'text-align: center', 'onClick'=>"selectOption(this);"),
	        );
        }
		$this->widget('zii.widgets.grid.CGridView', array(
		    'dataProvider'=>$dataShoppingOptPhoto,
		    'columns'=>$column,
		    'selectableRows'=>'1', // Riportare a zero per poter selezionare più opzioni <<<<<<<<<<<<
		    'summaryText'=>'',
		    'enableSorting'=>false,
		    //'enablePagination'=>false
		));
		
		if($this->licenseType=='RM'){
			$data=$dataShoppingOptPhoto->getData();
			echo "<div class='alert in alert-warning' style='text-align: center'>
				Any RM license comes with the original file of the photo.<br>
				Pixel: ".$data[0]->width."x".$data[0]->height." - Cm ".
				$data[0]->widthCm."x".$data[0]->heightCm." (".$data[0]->dpi."dpi)<br>";
			if($this->buyColumn){
				echo "Duration of the license<br>";
				$dataDurations = ConfDurationRm::model()->findAll();
				echo $this->form->dropDownList($data[0],'duration',
					CHtml::listData($dataDurations,'idDuration','duration'),
					array('class'=>'span2',
						'onChange'=>'saveDuration(this, '.$data[0]->idProduct.',
							"'.Yii::app()->createUrl('shopping_cart/saveDuration').'")')
				);
			}else{
				echo "Prices above are for licenses expiring in 3 months.<br>
					Increase them up to 3 years while purchasing the license.";
			}
			echo "</div>";
		}
    }
}