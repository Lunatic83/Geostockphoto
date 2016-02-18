<?php

/**
 * This is the model class for table "tbl_transaction_photo_rf".
 *
 * The followings are the available columns in table 'tbl_transaction_photo_rf':
 * @property string $idTransactionPhoto
 * @property string $idSize
 * @property string $idLicense
 * @property double $price
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property TransactionPhoto $idTransactionPhoto0
 * @property ConfSize $idSize0
 * @property ConfLicense $idLicense0
 */
class TransactionPhotoRf extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TransactionPhotoRf the static model class
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
		return 'tbl_transaction_photo_rf';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('price', 'required'),
			array('price', 'numerical'),
			array('idTransactionPhoto, idSize, idLicense', 'length', 'max'=>10),
			array('update_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idTransactionPhoto, idSize, idLicense, price, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'idTransactionPhoto0' => array(self::BELONGS_TO, 'TransactionPhoto', 'idTransactionPhoto'),
			'idSize0' => array(self::BELONGS_TO, 'ConfSize', 'idSize'),
			'idLicense0' => array(self::BELONGS_TO, 'ConfLicense', 'idLicense'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idTransactionPhoto' => 'Id Transaction Photo',
			'idSize' => 'Id Size',
			'idLicense' => 'Id License',
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

		$criteria->compare('idTransactionPhoto',$this->idTransactionPhoto,true);
		$criteria->compare('idSize',$this->idSize,true);
		$criteria->compare('idLicense',$this->idLicense,true);
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
	}}