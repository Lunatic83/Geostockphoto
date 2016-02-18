<?php

/**
 * This is the model class for table "tbl_gsp_profit".
 *
 * The followings are the available columns in table 'tbl_gsp_profit':
 * @property string $idProfit
 * @property string $idUser
 * @property string $idTransaction
 * @property string $idTransactionPhoto
 * @property double $amount
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property User $idUser0
 * @property Transaction $idTransaction0
 * @property TransactionPhoto $idTransactionPhoto0
 */
class GspProfit extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return GspProfit the static model class
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
		return 'tbl_gsp_profit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idUser, idTransaction, amount, insert_timestamp', 'required'),
			array('amount', 'numerical'),
			array('idUser, idTransaction, idTransactionPhoto', 'length', 'max'=>10),
			array('update_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idProfit, idUser, idTransaction, idTransactionPhoto, amount, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'idTransaction0' => array(self::BELONGS_TO, 'Transaction', 'idTransaction'),
			'idTransactionPhoto0' => array(self::BELONGS_TO, 'TransactionPhoto', 'idTransactionPhoto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idProfit' => 'Id Profit',
			'idUser' => 'Id User',
			'idTransaction' => 'Id Transaction',
			'idTransactionPhoto' => 'Id Transaction Photo',
			'amount' => 'Amount',
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

		$criteria->compare('idProfit',$this->idProfit,true);
		$criteria->compare('idUser',$this->idUser,true);
		$criteria->compare('idTransaction',$this->idTransaction,true);
		$criteria->compare('idTransactionPhoto',$this->idTransactionPhoto,true);
		$criteria->compare('amount',$this->amount);
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