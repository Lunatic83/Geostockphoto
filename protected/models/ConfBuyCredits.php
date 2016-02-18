<?php

/**
 * This is the model class for table "tbl_conf_buy_credits".
 *
 * The followings are the available columns in table 'tbl_conf_buy_credits':
 * @property string $idCreditsPacket
 * @property string $description
 * @property double $amount
 * @property string $insert_timestamp
 * @property string $update_timestamp
 */
class ConfBuyCredits extends CActiveRecord
{
	
	public $shoppingCartCreditsAmount;
	
	public function getPacketDescription(){
		return $this->description." - ".$this->amount;
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return ConfBuyCredits the static model class
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
		return 'tbl_conf_buy_credits';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCreditsPacket, description, amount, insert_timestamp', 'required'),
			array('idCreditsPacket, amount', 'numerical'),
			array('idCreditsPacket', 'length', 'max'=>6),
			array('description', 'length', 'max'=>50),
			array('update_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idCreditsPacket, description, amount, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCreditsPacket' => 'Id Credits Packet',
			'description' => 'Description',
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

		$criteria->compare('idCreditsPacket',$this->idCreditsPacket,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('insert_timestamp',$this->insert_timestamp,true);
		$criteria->compare('update_timestamp',$this->update_timestamp,true);
		$criteria->order='idCreditsPacket asc';
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