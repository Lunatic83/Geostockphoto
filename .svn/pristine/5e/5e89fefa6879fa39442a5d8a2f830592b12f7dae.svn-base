<?php

/**
 * This is the model class for table "tbl_paypal_transaction_flow".
 *
 * The followings are the available columns in table 'tbl_paypal_transaction_flow':
 * @property string $idPPTransaction
 * @property string $idUser
 * @property string $method
 * @property string $token
 * @property string $correlationID
 * @property string $payerID
 * @property string $ack
 * @property string $returnUrl
 * @property string $cancelUrl
 * @property string $version
 * @property string $build
 * @property string $checkOutStatus
 * @property string $pr0NotifyUrl
 * @property string $pr0CurrencyCode
 * @property double $pr0Amt
 * @property double $pr0ItemAmt
 * @property double $pr0TaxAmt
 * @property string $pr0Desc
 * @property string $pr0PaymentAction
 * @property string $lpr0ItemCategory0
 * @property string $lpr0Name0
 * @property double $lpr0Number0
 * @property integer $lpr0Qty0
 * @property double $lpr0TaxAmt0
 * @property double $lpr0Amt0
 * @property string $lpr0Desc
 * @property string $landingPage 
 * @property string $solutionType
 * @property string $ppTimestamp
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property PaypalTransactionFail $paypalTransactionFail
 * @property PaypalTransactionFinal $paypalTransactionFinal
 * @property User $idUser0
 * @property PaypalTransactionPeople $paypalTransactionPeople
 */
class PaypalTransactionFlow extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return PaypalTransactionFlow the static model class
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
		return 'tbl_paypal_transaction_flow';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('idUser, method, insert_timestamp', 'required'),
			array('lpr0Qty0', 'numerical', 'integerOnly'=>true),
			array('pr0Amt, pr0ItemAmt, pr0TaxAmt, lpr0Number0, lpr0TaxAmt0, lpr0Amt0', 'numerical'),
			array('idUser, build', 'length', 'max'=>10),
			array('method, checkOutStatus, pr0Desc, lpr0Desc, landingPage, solutionType, ppTimestamp', 'length', 'max'=>50),
			//array('token, correlationID, payerID, ack, pr0PaymentAction, lpr0ItemCategory0', 'length', 'max'=>20),
			array('returnUrl, cancelUrl, pr0NotifyUrl, lpr0Name0', 'length', 'max'=>150),
			array('version', 'length', 'max'=>5),
			array('pr0CurrencyCode', 'length', 'max'=>3),
			array('update_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPPTransaction, idUser, method, token, correlationID, payerID, ack, returnUrl, cancelUrl, version, build, checkOutStatus, pr0NotifyUrl, pr0CurrencyCode, pr0Amt, pr0ItemAmt, pr0TaxAmt, pr0Desc, pr0PaymentAction, lpr0ItemCategory0, lpr0Name0, lpr0Number0, lpr0Qty0, lpr0TaxAmt0, lpr0Amt0, lpr0Desc, landingPage, solutionType ppTimestamp, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'paypalTransactionFail' => array(self::HAS_ONE, 'PaypalTransactionFail', 'idPPTransaction'),
			'paypalTransactionFinal' => array(self::HAS_ONE, 'PaypalTransactionFinal', 'idPPTransaction'),
			'idUser0' => array(self::BELONGS_TO, 'User', 'idUser'),
			'paypalTransactionPeople' => array(self::HAS_ONE, 'PaypalTransactionPeople', 'idPPTransaction'),
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
			'returnUrl' => 'Return Url',
			'cancelUrl' => 'Cancel Url',
			'version' => 'Version',
			'build' => 'Build',
			'checkOutStatus' => 'Check Out Status',
			'pr0NotifyUrl' => 'Pr0 Notify Url',
			'pr0CurrencyCode' => 'Pr0 Currency Code',
			'pr0Amt' => 'Pr0 Amt',
			'pr0ItemAmt' => 'Pr0 Item Amt',
			'pr0TaxAmt' => 'Pr0 Tax Amt',
			'pr0Desc' => 'Pr0 Desc',
			'pr0PaymentAction' => 'Pr0 Payment Action',
			'lpr0ItemCategory0' => 'Lpr0 Item Category0',
			'lpr0Name0' => 'Lpr0 Name0',
			'lpr0Number0' => 'Lpr0 Number0',
			'lpr0Qty0' => 'Lpr0 Qty0',
			'lpr0TaxAmt0' => 'Lpr0 Tax Amt0',
			'lpr0Amt0' => 'Lpr0 Amt0',
			'lpr0Desc' => 'Lpr0 Desc',
			'landingoPage' => 'Landing Page',
			'solutionType' => 'Solution Type',
			'ppTimestamp' => 'Pp Timestamp',
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
		$criteria->compare('returnUrl',$this->returnUrl,true);
		$criteria->compare('cancelUrl',$this->cancelUrl,true);
		$criteria->compare('version',$this->version,true);
		$criteria->compare('build',$this->build,true);
		$criteria->compare('checkOutStatus',$this->checkOutStatus,true);
		$criteria->compare('pr0NotifyUrl',$this->pr0NotifyUrl,true);
		$criteria->compare('pr0CurrencyCode',$this->pr0CurrencyCode,true);
		$criteria->compare('pr0Amt',$this->pr0Amt);
		$criteria->compare('pr0ItemAmt',$this->pr0ItemAmt);
		$criteria->compare('pr0TaxAmt',$this->pr0TaxAmt);
		$criteria->compare('pr0Desc',$this->pr0Desc,true);
		$criteria->compare('pr0PaymentAction',$this->pr0PaymentAction,true);
		$criteria->compare('lpr0ItemCategory0',$this->lpr0ItemCategory0,true);
		$criteria->compare('lpr0Name0',$this->lpr0Name0,true);
		$criteria->compare('lpr0Number0',$this->lpr0Number0);
		$criteria->compare('lpr0Qty0',$this->lpr0Qty0);
		$criteria->compare('lpr0TaxAmt0',$this->lpr0TaxAmt0);
		$criteria->compare('lpr0Amt0',$this->lpr0Amt0);
		$criteria->compare('lpr0Desc',$this->lpr0Desc,true);
		$criteria->compare('landingPage',$this->lpr0Desc,true);
		$criteria->compare('solutionType',$this->lpr0Desc,true);
		$criteria->compare('ppTimestamp',$this->ppTimestamp,true);
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