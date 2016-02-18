<?php

/**
 * This is the model class for table "tbl_paypal_transaction_failure".
 *
 * The followings are the available columns in table 'tbl_paypal_transaction_failure':
 * @property string $idPPTransaction
 * @property string $idUser
 * @property string $method
 * @property string $token
 * @property string $correlationID
 * @property string $payerID
 * @property string $ppTimestamp
 * @property string $lErrorCode0
 * @property string $lShortMessage0
 * @property string $lLongMessage0
 * @property string $lSeverityCode0
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property PaypalTransactionFlow $idPPTransaction0
 */
class PaypalTransactionFailure extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return PaypalTransactionFailure the static model class
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
		return 'tbl_paypal_transaction_failure';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('idPPTransaction, idUser, method, insert_timestamp', 'required'),
			//array('idPPTransaction, idUser, lErrorCode0', 'length', 'max'=>10),
			array('method, ppTimestamp, lShortMessage0', 'length', 'max'=>50),
			array('token, correlationID, payerID, lSeverityCode0', 'length', 'max'=>20),
			array('lLongMessage0, update_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPPTransaction, idUser, method, token, correlationID, payerID, ppTimestamp, lErrorCode0, lShortMessage0, lLongMessage0, lSeverityCode0, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'idPPTransaction0' => array(self::BELONGS_TO, 'PaypalTransactionFlow', 'idPPTransaction'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPPTransaction' => 'Id Pptransaction',
			'idUser' => 'Id User',
			'method' => 'Method',
			'token' => 'Token',
			'correlationID' => 'Correlation',
			'payerID' => 'Payer',
			'ppTimestamp' => 'Pp Timestamp',
			'lErrorCode0' => 'L Error Code0',
			'lShortMessage0' => 'L Short Message0',
			'lLongMessage0' => 'L Long Message0',
			'lSeverityCode0' => 'L Severity Code0',
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

		$criteria->compare('idPPTransaction',$this->idPPTransaction,true);
		$criteria->compare('idUser',$this->idUser,true);
		$criteria->compare('method',$this->method,true);
		$criteria->compare('token',$this->token,true);
		$criteria->compare('correlationID',$this->correlationID,true);
		$criteria->compare('payerID',$this->payerID,true);
		$criteria->compare('ppTimestamp',$this->ppTimestamp,true);
		$criteria->compare('lErrorCode0',$this->lErrorCode0,true);
		$criteria->compare('lShortMessage0',$this->lShortMessage0,true);
		$criteria->compare('lLongMessage0',$this->lLongMessage0,true);
		$criteria->compare('lSeverityCode0',$this->lSeverityCode0,true);
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