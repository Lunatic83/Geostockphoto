<?php

/**
 * This is the model class for table "tbl_shopping_photo_type".
 *
 * The followings are the available columns in table 'tbl_shopping_photo_type':
 * @property string $idProduct
 * @property string $licenseType
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property ShoppingOptPhoto[] $shoppingOptPhotos
 * @property ShoppingOptPhotoRm[] $shoppingOptPhotoRms
 * @property ProductPrePost $idProduct0
 * @property ConfLicenseType $licenseType0
 */
class ShoppingPhotoType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ShoppingPhotoType the static model class
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
		return 'tbl_shopping_photo_type';
	}
	
	public function getRowSelected(){
		$criteria=new CDbCriteria;
		$criteria->condition='idUser='.Yii::app()->user->id.' and idProduct='.$this->idProduct;
		$shoppingCart=ShoppingCart::model()->find($criteria);
		return $shoppingCart->rowSelected;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('licenseType', 'required'),
			array('idProduct', 'length', 'max'=>10),
			array('licenseType', 'length', 'max'=>30),
			array('update_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idProduct, licenseType, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'shoppingOptPhotos' => array(self::HAS_MANY, 'ShoppingOptPhoto', 'idProduct'),
			'shoppingOptPhotosRm' => array(self::HAS_MANY, 'ShoppingOptPhotoRm', 'idProduct'),
			'idProduct01' => array(self::BELONGS_TO, 'ProductPrePost', 'idProduct'),
			'licenseType0' => array(self::BELONGS_TO, 'ConfLicenseType', 'licenseType'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idProduct' => 'Id Product',
			'licenseType' => 'License Type',
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
		$criteria->compare('licenseType',$this->licenseType,true);
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