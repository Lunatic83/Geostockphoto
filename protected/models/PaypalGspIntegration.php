<?php

/**
 * This is the model class for table "tbl_paypal_gsp_integration".
 *
 * The followings are the available columns in table 'tbl_paypal_gsp_integration':
 * @property string $token
 * @property integer $idTransaction
 * @property integer $idCreditsPacket
 * @property string $idUser
 * @property double $pi0Amt
 * @property string $payerID
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property User $idUser0
 */
class PaypalGspIntegration extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return PaypalGspIntegration the static model class
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
		return 'tbl_paypal_gsp_integration';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idTransaction, idCreditsPacket', 'numerical', 'integerOnly'=>true),
			array('pi0Amt', 'numerical'),
			array('idUser', 'length', 'max'=>10),
			array('update_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('token, idTransaction, idCreditsPacket, idUser, pi0Amt, payerID, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'token' => 'Token',
			'idTransaction' => 'Id Transaction',
			'idCreditsPacket' => 'Id Credits Packet',
			'idUser' => 'Id User',
			'pi0Amt' => 'Pi0 Amt',
			'payerID' => 'Payer',
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

		$criteria->compare('token',$this->token,true);
		$criteria->compare('idTransaction',$this->idTransaction);
		$criteria->compare('idCreditsPacket',$this->idCreditsPacket);
		$criteria->compare('idUser',$this->idUser,true);
		$criteria->compare('pi0Amt',$this->pi0Amt);
		$criteria->compare('payerID',$this->payerID,true);
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