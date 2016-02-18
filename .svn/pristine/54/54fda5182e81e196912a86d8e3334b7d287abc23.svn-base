<?php

/**
 * This is the model class for table "tbl_conf_promotions".
 *
 * The followings are the available columns in table 'tbl_conf_promotions':
 * @property integer $idPromotion
 * @property string $name
 * @property string $feePromotion
 * @property string $duration
 * @property integer $enable
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property User[] $tblUsers
 */
class ConfPromotions extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ConfPromotions the static model class
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
		return 'tbl_conf_promotions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, feePromotion, enable, insert_timestamp, update_timestamp', 'required'),
			array('enable', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('feePromotion', 'length', 'max'=>3),
			array('duration', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPromotion, name, feePromotion, duration, enable, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'idUserAdmin0' => array(self::BELONGS_TO, 'User', 'idUserAdmin'),
			'tblUsers' => array(self::MANY_MANY, 'User', 'tbl_own_user_promotions(idPromotion, idUser)'),
			'promotion' => array(self::HAS_MANY, 'OwnUserPromotions', 'idPromotion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPromotion' => 'Id Promotion',
			'name' => 'Name',
			'feePromotion' => 'Fee Promotion',
			'duration' => 'Duration',
			'enable' => 'Enable',
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

		$criteria->compare('idPromotion',$this->idPromotion);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('feePromotion',$this->feePromotion,true);
		$criteria->compare('duration',$this->duration,true);
		$criteria->compare('enable',$this->enable);
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