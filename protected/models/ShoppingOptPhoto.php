<?php

/**
 * This is the model class for table "tbl_shopping_opt_photo". For RF 
 *
 * The followings are the available columns in table 'tbl_shopping_opt_photo':
 * @property string $idProduct
 * @property string $idLicense
 * @property string $idSize
 * @property double $price
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property ProductPrePost $idProduct0
 * @property ConfLicense $idLicense0
 * @property ConfSize $idSize0
 */
class ShoppingOptPhoto extends CActiveRecord
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
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return ShoppingOptPhoto the static model class
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
		return 'tbl_shopping_opt_photo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('idSize, idLicense, price', 'required'),
			array('price', 'numerical', 'min'=>0.5),
			array('idProduct, idLicense, idSize', 'length', 'max'=>10),
			array('update_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idProduct, idLicense, idSize, price, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'idLicense0' => array(self::BELONGS_TO, 'ConfLicense', 'idLicense'),
			'idSize0' => array(self::BELONGS_TO, 'ConfSize', 'idSize'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idProduct' => 'Id Product',
			'idLicense' => 'License',
			'idSize' => 'Size',
			'price' => 'Price',
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
		$criteria->compare('idLicense',$this->idLicense,true);
		$criteria->compare('idSize',$this->idSize,true);
		$criteria->compare('price',$this->price);
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
	}
}