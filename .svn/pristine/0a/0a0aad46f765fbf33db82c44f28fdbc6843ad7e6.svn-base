<?php

/**
 * This is the model class for table "tbl_paypal_transaction_people".
 *
 * The followings are the available columns in table 'tbl_paypal_transaction_people':
 * @property string $idPPTransaction
 * @property string $idUser
 * @property string $method
 * @property string $token
 * @property string $correlationID
 * @property string $payerID
 * @property string $email
 * @property string $payerstatus
 * @property string $firstName
 * @property string $lastName
 * @property string $countryCode
 * @property string $currencyCode
 * @property double $amt
 * @property double $itemAmt
 * @property double $shippingAmt
 * @property double $handlingAmt
 * @property double $taxAmt
 * @property string $desc
 * @property string $notifyurl
 * @property double $insuranceAmt
 * @property double $shipdiscAmt
 * @property string $lname0
 * @property double $lNumber0
 * @property integer $lQty0
 * @property double $lTaxAmt0
 * @property double $lAmt0
 * @property string $lDesc0
 * @property string $lItemWeightValue0
 * @property string $lItemLenghtValue0
 * @property string $lItemWidthValue0
 * @property string $lItemHeightValue0
 * @property string $lItemCategory0
 * @property string $pr0currencyCode
 * @property double $pr0Amt
 * @property double $pr0ItemAmt
 * @property double $pr0shippingAmt
 * @property double $pr0handlingAmt
 * @property double $pr0taxAmt
 * @property string $pr0desc
 * @property string $pr0notifyurl
 * @property double $pr0insuranceAmt
 * @property double $pr0shipDiscAmt
 * @property string $pr0insuranceOptionOfferred
 * @property string $lpr0name0
 * @property double $lprNumber0
 * @property integer $lprQty0
 * @property double $lprTaxAmt0
 * @property double $lprAmt0
 * @property string $lprDesc0
 * @property string $lprItemWeightValue0
 * @property string $lprItemLenghtValue0
 * @property string $lprItemWidthValue0
 * @property string $lprItemHeightValue0
 * @property string $lprItemCategory0
 * @property string $pri0ErrorCode0
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property PaypalTransactionFlow $idPPTransaction0
 */
class PaypalTransactionPeople extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return PaypalTransactionPeople the static model class
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
		return 'tbl_paypal_transaction_people';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('idPPTransaction, idUser, method, email, insert_timestamp', 'required'),
			array('lQty0, lprQty0', 'numerical', 'integerOnly'=>true),
			array('amt, itemAmt, shippingAmt, handlingAmt, taxAmt, insuranceAmt, shipdiscAmt, lNumber0, lTaxAmt0, lAmt0, pr0Amt, pr0ItemAmt, pr0shippingAmt, pr0handlingAmt, pr0taxAmt, pr0insuranceAmt, pr0shipDiscAmt, lprNumber0, lprTaxAmt0, lprAmt0', 'numerical'),
			array('idPPTransaction, idUser, pr0insuranceOptionOfferred, pri0ErrorCode0', 'length', 'max'=>10),
			array('method, firstName, lastName, desc, lname0, lDesc0, lItemWeightValue0, lItemLenghtValue0, lItemWidthValue0, lItemHeightValue0, lItemCategory0, pr0desc, lpr0name0, lprDesc0, lprItemWeightValue0, lprItemLenghtValue0, lprItemWidthValue0, lprItemHeightValue0, lprItemCategory0', 'length', 'max'=>50),
			array('token, correlationID, payerID, payerstatus', 'length', 'max'=>20),
			array('email', 'length', 'max'=>100),
			array('countryCode', 'length', 'max'=>2),
			array('currencyCode, pr0currencyCode', 'length', 'max'=>3),
			array('notifyurl, pr0notifyurl', 'length', 'max'=>150),
			array('update_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPPTransaction, idUser, method, token, correlationID, payerID, email, payerstatus, firstName, lastName, countryCode, currencyCode, amt, itemAmt, shippingAmt, handlingAmt, taxAmt, desc, notifyurl, insuranceAmt, shipdiscAmt, lname0, lNumber0, lQty0, lTaxAmt0, lAmt0, lDesc0, lItemWeightValue0, lItemLenghtValue0, lItemWidthValue0, lItemHeightValue0, lItemCategory0, pr0currencyCode, pr0Amt, pr0ItemAmt, pr0shippingAmt, pr0handlingAmt, pr0taxAmt, pr0desc, pr0notifyurl, pr0insuranceAmt, pr0shipDiscAmt, pr0insuranceOptionOfferred, lpr0name0, lprNumber0, lprQty0, lprTaxAmt0, lprAmt0, lprDesc0, lprItemWeightValue0, lprItemLenghtValue0, lprItemWidthValue0, lprItemHeightValue0, lprItemCategory0, pri0ErrorCode0, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'email' => 'Email',
			'payerstatus' => 'Payerstatus',
			'firstName' => 'First Name',
			'lastName' => 'Last Name',
			'countryCode' => 'Country Code',
			'currencyCode' => 'Currency Code',
			'amt' => 'Amt',
			'itemAmt' => 'Item Amt',
			'shippingAmt' => 'Shipping Amt',
			'handlingAmt' => 'Handling Amt',
			'taxAmt' => 'Tax Amt',
			'desc' => 'Desc',
			'notifyurl' => 'Notifyurl',
			'insuranceAmt' => 'Insurance Amt',
			'shipdiscAmt' => 'Shipdisc Amt',
			'lname0' => 'Lname0',
			'lNumber0' => 'L Number0',
			'lQty0' => 'L Qty0',
			'lTaxAmt0' => 'L Tax Amt0',
			'lAmt0' => 'L Amt0',
			'lDesc0' => 'L Desc0',
			'lItemWeightValue0' => 'L Item Weight Value0',
			'lItemLenghtValue0' => 'L Item Lenght Value0',
			'lItemWidthValue0' => 'L Item Width Value0',
			'lItemHeightValue0' => 'L Item Height Value0',
			'lItemCategory0' => 'L Item Category0',
			'pr0currencyCode' => 'Pr0currency Code',
			'pr0Amt' => 'Pr0 Amt',
			'pr0ItemAmt' => 'Pr0 Item Amt',
			'pr0shippingAmt' => 'Pr0shipping Amt',
			'pr0handlingAmt' => 'Pr0handling Amt',
			'pr0taxAmt' => 'Pr0tax Amt',
			'pr0desc' => 'Pr0desc',
			'pr0notifyurl' => 'Pr0notifyurl',
			'pr0insuranceAmt' => 'Pr0insurance Amt',
			'pr0shipDiscAmt' => 'Pr0ship Disc Amt',
			'pr0insuranceOptionOfferred' => 'Pr0insurance Option Offerred',
			'lpr0name0' => 'Lpr0name0',
			'lprNumber0' => 'Lpr Number0',
			'lprQty0' => 'Lpr Qty0',
			'lprTaxAmt0' => 'Lpr Tax Amt0',
			'lprAmt0' => 'Lpr Amt0',
			'lprDesc0' => 'Lpr Desc0',
			'lprItemWeightValue0' => 'Lpr Item Weight Value0',
			'lprItemLenghtValue0' => 'Lpr Item Lenght Value0',
			'lprItemWidthValue0' => 'Lpr Item Width Value0',
			'lprItemHeightValue0' => 'Lpr Item Height Value0',
			'lprItemCategory0' => 'Lpr Item Category0',
			'pri0ErrorCode0' => 'Pri0 Error Code0',
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('payerstatus',$this->payerstatus,true);
		$criteria->compare('firstName',$this->firstName,true);
		$criteria->compare('lastName',$this->lastName,true);
		$criteria->compare('countryCode',$this->countryCode,true);
		$criteria->compare('currencyCode',$this->currencyCode,true);
		$criteria->compare('amt',$this->amt);
		$criteria->compare('itemAmt',$this->itemAmt);
		$criteria->compare('shippingAmt',$this->shippingAmt);
		$criteria->compare('handlingAmt',$this->handlingAmt);
		$criteria->compare('taxAmt',$this->taxAmt);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('notifyurl',$this->notifyurl,true);
		$criteria->compare('insuranceAmt',$this->insuranceAmt);
		$criteria->compare('shipdiscAmt',$this->shipdiscAmt);
		$criteria->compare('lname0',$this->lname0,true);
		$criteria->compare('lNumber0',$this->lNumber0);
		$criteria->compare('lQty0',$this->lQty0);
		$criteria->compare('lTaxAmt0',$this->lTaxAmt0);
		$criteria->compare('lAmt0',$this->lAmt0);
		$criteria->compare('lDesc0',$this->lDesc0,true);
		$criteria->compare('lItemWeightValue0',$this->lItemWeightValue0,true);
		$criteria->compare('lItemLenghtValue0',$this->lItemLenghtValue0,true);
		$criteria->compare('lItemWidthValue0',$this->lItemWidthValue0,true);
		$criteria->compare('lItemHeightValue0',$this->lItemHeightValue0,true);
		$criteria->compare('lItemCategory0',$this->lItemCategory0,true);
		$criteria->compare('pr0currencyCode',$this->pr0currencyCode,true);
		$criteria->compare('pr0Amt',$this->pr0Amt);
		$criteria->compare('pr0ItemAmt',$this->pr0ItemAmt);
		$criteria->compare('pr0shippingAmt',$this->pr0shippingAmt);
		$criteria->compare('pr0handlingAmt',$this->pr0handlingAmt);
		$criteria->compare('pr0taxAmt',$this->pr0taxAmt);
		$criteria->compare('pr0desc',$this->pr0desc,true);
		$criteria->compare('pr0notifyurl',$this->pr0notifyurl,true);
		$criteria->compare('pr0insuranceAmt',$this->pr0insuranceAmt);
		$criteria->compare('pr0shipDiscAmt',$this->pr0shipDiscAmt);
		$criteria->compare('pr0insuranceOptionOfferred',$this->pr0insuranceOptionOfferred,true);
		$criteria->compare('lpr0name0',$this->lpr0name0,true);
		$criteria->compare('lprNumber0',$this->lprNumber0);
		$criteria->compare('lprQty0',$this->lprQty0);
		$criteria->compare('lprTaxAmt0',$this->lprTaxAmt0);
		$criteria->compare('lprAmt0',$this->lprAmt0);
		$criteria->compare('lprDesc0',$this->lprDesc0,true);
		$criteria->compare('lprItemWeightValue0',$this->lprItemWeightValue0,true);
		$criteria->compare('lprItemLenghtValue0',$this->lprItemLenghtValue0,true);
		$criteria->compare('lprItemWidthValue0',$this->lprItemWidthValue0,true);
		$criteria->compare('lprItemHeightValue0',$this->lprItemHeightValue0,true);
		$criteria->compare('lprItemCategory0',$this->lprItemCategory0,true);
		$criteria->compare('pri0ErrorCode0',$this->pri0ErrorCode0,true);
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