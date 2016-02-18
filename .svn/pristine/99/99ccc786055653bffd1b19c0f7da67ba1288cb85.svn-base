<?php

/**
 * This is the model class for table "tbl_shopping_opt_photo_rm".
 *
 * The followings are the available columns in table 'tbl_shopping_opt_photo_rm':
 * @property string $idProduct
 * @property string $idRMdetails
 * @property string $idSize
 * @property double $price
 * @property string $idDuration
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property ShoppingPhotoType $idProduct0
 * @property ConfLicenseRmDetails $idRMdetails0
 * @property ConfSize $idSize0
 * @property ConfDurationRm $idDuration0
 */
class ShoppingOptPhotoRm extends CActiveRecord
{
	public function getWidth(){
		$ratio = $this->idProduct0->idProduct01->photoPrePost->ratio;
		if($ratio >= 1){
			if($this->idSize==0)
				return $this->idProduct0->idProduct01->photoPrePost->maxSize;
			else
				return $this->idSize0->maxSize;
		}else{
			if($this->idSize==0)
				return (int)($this->idProduct0->idProduct01->photoPrePost->maxSize*$ratio);
			else
				return (int)($this->idSize0->maxSize*$ratio);
		}
	}
	public function getHeight(){
		$ratio = $this->idProduct0->idProduct01->photoPrePost->ratio;
		if($ratio <= 1){
			if($this->idSize==0)
				return $this->idProduct0->idProduct01->photoPrePost->maxSize;
			else
				return $this->idSize0->maxSize;
		}else{
			if($this->idSize==0)
				return (int)($this->idProduct0->idProduct01->photoPrePost->maxSize/$ratio);
			else
				return (int)($this->idSize0->maxSize/$ratio);
		}
	}
	public function getWidthCm(){
		return round($this->width/$this->dpi*2.54, 1);
	}
	public function getHeightCm(){
		return round($this->height/$this->dpi*2.54, 1);
	}
	public function getDpi(){
		if($this->idSize<=2 && $this->idSize!=0)
			return 72;
		else
			return 300;
	}
	public function getPrice2dec(){
		return number_format($this->price, 2, '.', '');
	}
	public function getPriceMultFact(){
		return number_format($this->price, 2, '.', '')*$this->multFact;
	}
	public function getMultFact(){
		if(isset($this->modelDuration))
			return $this->modelDuration->idDuration0->multFact;
		else 
			return 1;
	}
	public function getduration(){
		if(isset($this->modelDuration))
			return $this->modelDuration->idDuration0->idDuration;
		else 
			return null;
	}
	public function getModelDuration(){
		$criteria=new CDbCriteria;
		$criteria->condition='idUser='.Yii::app()->user->id.' and idProduct='.$this->idProduct.
			' and idDuration is not null';
		$modelSC=ShoppingCart::model()->find($criteria);
		return $modelSC;
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return ShoppingOptPhotoRm the static model class
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
		return 'tbl_shopping_opt_photo_rm';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('price, idDuration', 'required'),
			array('price', 'numerical', 'min'=>0.5),
			array('idProduct, idRMdetails, idSize, idDuration', 'length', 'max'=>10),
			array('update_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idProduct, idRMdetails, idSize, price, idDuration, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'idProduct0' => array(self::BELONGS_TO, 'ShoppingPhotoType', 'idProduct'),
			'idRMdetails0' => array(self::BELONGS_TO, 'ConfLicenseRmDetails', 'idRMdetails'),
			'idSize0' => array(self::BELONGS_TO, 'ConfSize', 'idSize'),
			'idDuration0' => array(self::BELONGS_TO, 'ConfDurationRm', 'idDuration'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idProduct' => 'Id Product',
			'idRMdetails' => 'Id Rmdetails',
			'idSize' => 'Id Size',
			'price' => 'Price',
			'idDuration' => 'Id Duration',
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

		$criteria->compare('idProduct',$this->idProduct,true);
		$criteria->compare('idRMdetails',$this->idRMdetails,true);
		$criteria->compare('idSize',$this->idSize,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('idDuration',$this->idDuration,true);
		$criteria->compare('insert_timestamp',$this->insert_timestamp,true);
		$criteria->compare('update_timestamp',$this->update_timestamp,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
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
	}}