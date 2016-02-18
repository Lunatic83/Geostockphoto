<?php

/**
 * This is the model class for table "tbl_shopping_cart".
 *
 * The followings are the available columns in table 'tbl_shopping_cart':
 * @property string $idUser
 * @property string $idProduct
 * @property string $insert_timestamp
 * @property string $update_timestamp
 */
class ShoppingCart extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ShoppingCart the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_shopping_cart';
	}
	
	public function getOptSel(){
		if(!isset($this->rowSelected))
			return array('price'=>'', 'size'=>'');
		
		$criteria=new CDbCriteria;
		$criteria->condition='idProduct=:idProduct';
		$criteria->params=array(':idProduct'=>$this->idProduct);
		$licenseType=$this->idProduct0->shoppingPhotoType->licenseType;
		if($licenseType=='RF'){
			//$shoppingOptPhoto_str_tbl='ShoppingOptPhoto';
			$dataShoppingOptPhoto = ShoppingOptPhoto::model()->findAll($criteria);
			$multFact=1;
		}else if($licenseType=='RM'){
			//$shoppingOptPhoto_str_tbl='ShoppingOptPhotoRm';
			$dataShoppingOptPhoto = ShoppingOptPhotoRm::model()->findAll($criteria);
			if(isset($this->idDuration0))
				$multFact = $this->idDuration0->multFact;
			else 
				$multFact=1;
		}
		//$dataShoppingOptPhoto = new CActiveDataProvider($shoppingOptPhoto_str_tbl, array('criteria'=>$criteria));
		//return $dataShoppingOptPhoto[$this->rowSelected]->price2dec;
		return array('price'=>$dataShoppingOptPhoto[$this->rowSelected]->price2dec*$multFact, 'size'=>$dataShoppingOptPhoto[$this->rowSelected]->idSize0->code);
	}
	
	/*public function primaryKey()
	{
	    return array('idUser', 'idProduct');
	}*/

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idUser, idProduct', 'required'),
			array('idUser, idProduct', 'length', 'max'=>10),
			array('update_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idUser, idProduct, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idProduct0' => array(self::BELONGS_TO, 'ProductPrePost', 'idProduct'),
			'idUser0' => array(self::BELONGS_TO, 'User', 'idUser'),
			'idDuration0' => array(self::BELONGS_TO, 'ConfDurationRm', 'idDuration'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idUser' => 'Id User',
			'idProduct' => 'Id Product',
			'insert_timestamp' => 'Insert Timestamp',
			'update_timestamp' => 'Update Timestamp',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idUser',$this->idUser,true);
		$criteria->compare('idProduct',$this->idProduct,true);
		$criteria->compare('insert_timestamp',$this->insert_timestamp,true);
		$criteria->compare('update_timestamp',$this->update_timestamp,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function checkPresence()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;
		$criteria->condition='idProduct=:idProduct AND idUser=:idUser';
		$criteria->params=array(':idProduct'=>$this->idProduct, ':idUser'=>Yii::app()->user->id);
		$criteria->select='idProduct';
		$dataProviderPhoto = new CActiveDataProvider('ShoppingCart', array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>1)
		));
		$dataSC=$dataProviderPhoto->getData();
		return count($dataSC);
	}

	public function behaviors(){
		return array(
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
				'createAttribute' =>  'insert_timestamp',
				'updateAttribute' =>  'update_timestamp',
				'setUpdateOnCreate' => true,
			),
		);
	}
}