<?php

/**
 * This is the model class for table "tbl_conf_license".
 *
 * The followings are the available columns in table 'tbl_conf_license':
 * @property string $idLicense
 * @property string $licenseType
 * @property string $name
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property ConfLicenseType $licenseType0
 * @property ConfSize[] $tblConfSizes
 * @property ShoppingOptPhoto[] $shoppingOptPhotos
 * @property TransactionPhoto[] $transactionPhotos
 */
class ConfLicense extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ConfLicense the static model class
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
		return 'tbl_conf_license';
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
			array('licenseType, name', 'length', 'max'=>30),
			array('update_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idLicense, licenseType, name, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'licenseType0' => array(self::BELONGS_TO, 'ConfLicenseType', 'licenseType'),
			'tblConfSizes' => array(self::MANY_MANY, 'ConfSize', 'tbl_conf_shopping_opt_default_gsp(idLicense, idSize)'),
			'shoppingOptPhotos' => array(self::HAS_MANY, 'ShoppingOptPhoto', 'idLicense'),
			'transactionPhotos' => array(self::HAS_MANY, 'TransactionPhoto', 'idLicense'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idLicense' => 'Id License',
			'licenseType' => 'License Type',
			'name' => 'Name',
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

		$criteria->compare('idLicense',$this->idLicense,true);
		$criteria->compare('licenseType',$this->licenseType,true);
		$criteria->compare('name',$this->name,true);
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
	
	public function getIconSrc(){
		if($this->idLicense==1)
			return Yii::app()->baseUrl."/images/icon-rfs-small.png";
		else if($this->idLicense==2)
			return Yii::app()->baseUrl."/images/icon-rfe-small.png";
		else
			throw new CHttpException(404,'An error occured while reading the source of a license icon.');
	}
	
	public function getPrintName(){
		if($this->idLicense==1)
			return "<span style='color: #F88017'>RFs</span>";
		else if($this->idLicense==2)
			return "<span style='color: green'>RFe</span>";
		else
			throw new CHttpException(404,'An error occured while reading the source of a license icon.');
	}
}