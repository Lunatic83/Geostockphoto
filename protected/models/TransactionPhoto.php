<?php

/**
 * This is the model class for table "tbl_transaction_photo".
 *
 * The followings are the available columns in table 'tbl_transaction_photo':
 * @property string $idTransactionPhoto
 * @property string $idTransaction
 * @property string $idProduct
 * @property string $licenseType
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property Transaction $idTransaction0
 * @property ProductPrePost $idProduct0
 * @property ConfLicenseType $licenseType0
 * @property TransactionPhotoRf[] $transactionPhotoRves
 * @property TransactionPhotoRm[] $transactionPhotoRms
 */
class TransactionPhoto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TransactionPhoto the static model class
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
		return 'tbl_transaction_photo';
	}
	
	public function getModelLicense()
	{
		if($this->licenseType=='RM')
			return $this->transactionPhotoRms;
	}
	
	public function getPrice(){
		if($this->licenseType=="RF")
			return number_format($this->transactionPhotoRfs->price, 2, '.', '');
		elseif($this->licenseType=="RM")
			return number_format($this->transactionPhotoRms->price, 2, '.', '');
	}
	
	public function getEarnedByUser(){
		return number_format($this->creditsToUser, 2, '.', '');
	}
	
	public function getSize(){
		if($this->licenseType=="RF")
			return $this->transactionPhotoRfs->idSize0->code;
		elseif($this->licenseType=="RM")
			return $this->transactionPhotoRms->idSize0->code;
	}
	
	public function getData(){
		return Yii::app()->dateFormatter->format('dd/MMM/yyyy - HH:mm', $this->insert_timestamp);
	}
	
	public function getLink(){
		$function =
			'ajaxFunctionProductInfo(
				\''.Yii::app()->createUrl('photo/showInfoPhoto').'/id/'.$this->idProduct.'\','.
				$this->idProduct.','.
				$this->idProduct0->photoPrePost->lat.','.
				$this->idProduct0->photoPrePost->lng.',
				\'null\');';
		return CHtml::link(
			  $this->idProduct,
			  '',
			  array('onclick' => $function, 'style'=>'cursor: pointer')
		);
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
			array('idTransaction, idProduct', 'length', 'max'=>10),
			array('licenseType', 'length', 'max'=>30),
			array('update_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idTransactionPhoto, idTransaction, idProduct, licenseType, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'idTransaction0' => array(self::BELONGS_TO, 'Transaction', 'idTransaction'),
			'idProduct0' => array(self::BELONGS_TO, 'ProductPrePost', 'idProduct'),
			'licenseType0' => array(self::BELONGS_TO, 'ConfLicenseType', 'licenseType'),
			'transactionPhotoRfs' => array(self::HAS_ONE, 'TransactionPhotoRf', 'idTransactionPhoto'),
			'transactionPhotoRms' => array(self::HAS_ONE, 'TransactionPhotoRm', 'idTransactionPhoto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idTransactionPhoto' => 'Id Transaction Photo',
			'idTransaction' => 'Id Transaction',
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

		$criteria->compare('idTransactionPhoto',$this->idTransactionPhoto,true);
		$criteria->compare('idTransaction',$this->idTransaction,true);
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
	}}