<?php

/**
 * This is the model class for table "tbl_paypal_transaction_final".
 *
 * The followings are the available columns in table 'tbl_paypal_transaction_final':
 * @property string $idPPTransaction
 * @property string $idUser
 * @property string $method
 * @property string $token
 * @property string $correlationID
 * @property string $payerID
 * @property string $ack
 * @property string $successPageRedirectRequested
 * @property string $ppTimestamp
 * @property string $version
 * @property string $build
 * @property string $insuranceOptionSelected
 * @property string $shoppingOptionIsDefault
 * @property string $pi0TransactionID
 * @property string $pi0TransactionType
 * @property string $pi0PaymentType
 * @property string $pi0OrderType
 * @property double $pi0Amt
 * @property double $pi0TaxAmt
 * @property string $pi0CurrencyCode
 * @property string $pi0PaymentStatus
 * @property string $pi0PendingReason
 * @property string $pi0ReasonCode
 * @property string $pi0ProtectionElegibility
 * @property string $pi0ProtectionElegibilityType
 * @property string $pi0SecureMerchantAccountID
 * @property string $pi0ErrorCode
 * @property string $pi0Ack
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property PaypalTransactionFlow $idPPTransaction0
 */
class PaypalTransactionFinal extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return PaypalTransactionFinal the static model class
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
		return 'tbl_paypal_transaction_final';
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
			array('pi0Amt, pi0TaxAmt', 'numerical'),
			array('idPPTransaction, idUser, build, insuranceOptionSelected, shoppingOptionIsDefault', 'length', 'max'=>10),
			array('method, ppTimestamp, pi0OrderType', 'length', 'max'=>50),
			array('token, correlationID, payerID, ack, pi0TransactionID, pi0TransactionType, pi0PaymentType, pi0PaymentStatus, pi0PendingReason, pi0ReasonCode, pi0ProtectionElegibility, pi0ProtectionElegibilityType, pi0SecureMerchantAccountID, pi0ErrorCode, pi0Ack', 'length', 'max'=>20),
			array('successPageRedirectRequested', 'length', 'max'=>150),
			array('version', 'length', 'max'=>5),
			array('pi0CurrencyCode', 'length', 'max'=>3),
			array('update_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPPTransaction, idUser, method, token, correlationID, payerID, ack, successPageRedirectRequested, ppTimestamp, version, build, insuranceOptionSelected, shoppingOptionIsDefault, pi0TransactionID, pi0TransactionType, pi0PaymentType, pi0OrderType, pi0Amt, pi0TaxAmt, pi0CurrencyCode, pi0PaymentStatus, pi0PendingReason, pi0ReasonCode, pi0ProtectionElegibility, pi0ProtectionElegibilityType, pi0SecureMerchantAccountID, pi0ErrorCode, pi0Ack, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'ack' => 'Ack',
			'successPageRedirectRequested' => 'Success Page Redirect Requested',
			'ppTimestamp' => 'Pp Timestamp',
			'version' => 'Version',
			'build' => 'Build',
			'insuranceOptionSelected' => 'Insurance Option Selected',
			'shoppingOptionIsDefault' => 'Shopping Option Is Default',
			'pi0TransactionID' => 'Pi0 Transaction',
			'pi0TransactionType' => 'Pi0 Transaction Type',
			'pi0PaymentType' => 'Pi0 Payment Type',
			'pi0OrderType' => 'Pi0 Order Type',
			'pi0Amt' => 'Pi0 Amt',
			'pi0TaxAmt' => 'Pi0 Tax Amt',
			'pi0CurrencyCode' => 'Pi0 Currency Code',
			'pi0PaymentStatus' => 'Pi0 Payment Status',
			'pi0PendingReason' => 'Pi0 Pending Reason',
			'pi0ReasonCode' => 'Pi0 Reason Code',
			'pi0ProtectionElegibility' => 'Pi0 Protection Elegibility',
			'pi0ProtectionElegibilityType' => 'Pi0 Protection Elegibility Type',
			'pi0SecureMerchantAccountID' => 'Pi0 Secure Merchant Account',
			'pi0ErrorCode' => 'Pi0 Error Code',
			'pi0Ack' => 'Pi0 Ack',
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
		$criteria->compare('ack',$this->ack,true);
		$criteria->compare('successPageRedirectRequested',$this->successPageRedirectRequested,true);
		$criteria->compare('ppTimestamp',$this->ppTimestamp,true);
		$criteria->compare('version',$this->version,true);
		$criteria->compare('build',$this->build,true);
		$criteria->compare('insuranceOptionSelected',$this->insuranceOptionSelected,true);
		$criteria->compare('shoppingOptionIsDefault',$this->shoppingOptionIsDefault,true);
		$criteria->compare('pi0TransactionID',$this->pi0TransactionID,true);
		$criteria->compare('pi0TransactionType',$this->pi0TransactionType,true);
		$criteria->compare('pi0PaymentType',$this->pi0PaymentType,true);
		$criteria->compare('pi0OrderType',$this->pi0OrderType,true);
		$criteria->compare('pi0Amt',$this->pi0Amt);
		$criteria->compare('pi0TaxAmt',$this->pi0TaxAmt);
		$criteria->compare('pi0CurrencyCode',$this->pi0CurrencyCode,true);
		$criteria->compare('pi0PaymentStatus',$this->pi0PaymentStatus,true);
		$criteria->compare('pi0PendingReason',$this->pi0PendingReason,true);
		$criteria->compare('pi0ReasonCode',$this->pi0ReasonCode,true);
		$criteria->compare('pi0ProtectionElegibility',$this->pi0ProtectionElegibility,true);
		$criteria->compare('pi0ProtectionElegibilityType',$this->pi0ProtectionElegibilityType,true);
		$criteria->compare('pi0SecureMerchantAccountID',$this->pi0SecureMerchantAccountID,true);
		$criteria->compare('pi0ErrorCode',$this->pi0ErrorCode,true);
		$criteria->compare('pi0Ack',$this->pi0Ack,true);
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