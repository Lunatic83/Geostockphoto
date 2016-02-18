<?php

/**
 * This is the model class for table "tbl_own_coupon".
 *
 * The followings are the available columns in table 'tbl_own_coupon':
 * @property integer $idCoupon
 * @property integer $idUser
 * @property integer $used
 * @property string $insert_timestamp
 * @property string $update_timestamp
 */
class OwnCoupon extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OwnCoupon the static model class
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
		return 'tbl_own_coupon';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCoupon, idUser', 'required'),
			array('idCoupon, idUser, used', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idCoupon, idUser, used, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'coupon' => array(self::BELONGS_TO, 'ConfCoupon', 'idCoupon'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCoupon' => 'Id Coupon',
			'idUser' => 'Id User',
			'used' => 'Used',
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
		$criteria->compare('idUser',$this->idUser);
		$criteria->compare('used',$this->used);
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