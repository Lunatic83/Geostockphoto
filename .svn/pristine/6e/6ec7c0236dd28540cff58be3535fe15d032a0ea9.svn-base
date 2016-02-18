<?php

/**
 * This is the model class for table "tbl_transaction".
 *
 * The followings are the available columns in table 'tbl_transaction':
 * @property string $idTransaction
 * @property string $idTransactionType
 * @property string $idUser
 * @property double $total
 * @property string $pending
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property User $idUser0
 * @property ConfTransactionType $idTransactionType0
 * @property TransactionPhoto[] $transactionPhotos
 */
class Transaction extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Transaction the static model class
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
		return 'tbl_transaction';
	}
	
	public function getData(){
		return Yii::app()->dateFormatter->format('dd/MMM/yyyy - HH:mm', $this->insert_timestamp);
	}
	
	public function getStatus(){
		if($this->pending)
			return "Pending";
		else 
			return "Approved";
	}
	
	public function getPromoNote(){
		if($this->promoCode!=null)
			return "Promo: ".$this->promoCode;
		else
			return $this->note;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idTransactionType, idUser, credits', 'required'),
			array('credits', 'numerical'),
			array('idTransactionType, idUser', 'length', 'max'=>10),
			array('pending', 'length', 'max'=>1),
			array('update_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idTransaction, idTransactionType, idUser, total, pending, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'idUser0' => array(self::BELONGS_TO, 'User', 'idUser'),
			'idTransactionType0' => array(self::BELONGS_TO, 'ConfTransactionType', 'idTransactionType'),
			'transactionPhoto' => array(self::HAS_MANY, 'TransactionPhoto', 'idTransaction'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idTransaction' => 'Id Transaction',
			'idTransactionType' => 'Id Transaction Type',
			'idUser' => 'Id User',
			'credits' => 'Credits',
			'pending' => 'Pending',
			'price' => 'Price',
			'promoCode' => 'Promo Code',
			'note' => 'note',
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

		$criteria->compare('idTransaction',$this->idTransaction,true);
		$criteria->compare('idTransactionType',$this->idTransactionType,true);
		$criteria->compare('idUser',$this->idUser,true);
		$criteria->compare('total',$this->total);
		$criteria->compare('pending',$this->pending,true);
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