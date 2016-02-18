<?php

/**
 * This is the model class for table "tbl_conf_coupon".
 *
 * The followings are the available columns in table 'tbl_conf_coupon':
 * @property integer $idCoupon
 * @property string $name
 * @property string $code
 * @property string $discount
 * @property string $expiration_datetime
 * @property string $insert_timestamp
 * @property string $update_timestamp
 */
class ConfCoupon extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ConfCoupon the static model class
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
		return 'tbl_conf_coupon';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, code, discount', 'required'),
			array('name', 'length', 'max'=>32),
			array('code', 'length', 'max'=>8),
			array('discount', 'length', 'max'=>3),
			array('expiration_datetime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idCoupon, name, code, discount, expiration_datetime, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'idCoupon' => 'Id Coupon',
			'name' => 'Name',
			'code' => 'Code',
			'discount' => 'Discount',
			'expiration_datetime' => 'Expiration Datetime',
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

		$criteria->compare('idCoupon',$this->idCoupon);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('discount',$this->discount,true);
		$criteria->compare('expiration_datetime',$this->expiration_datetime,true);
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
				'createAttribute' =>  null,
				'updateAttribute' => 'update_timestamp',
			)
		);
	}
}