<?php

/**
 * This is the model class for table "tbl_own_user_promotions".
 *
 * The followings are the available columns in table 'tbl_own_user_promotions':
 * @property integer $idUser
 * @property integer $idPromotion
 * @property string $start_timestamp
 * @property string $end_timestamp
 * @property string $insert_timestamp
 * @property string $update_timestamp
 */
class OwnUserPromotions extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OwnUserPromotions the static model class
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
		return 'tbl_own_user_promotions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idUser, idPromotion, start_timestamp, end_timestamp', 'required'),
			array('idUser, idPromotion', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idUser, idPromotion, start_timestamp, end_timestamp, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'idUser'),
			'promotion' => array(self::BELONGS_TO, 'ConfPromotions', 'idPromotion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idUser' => 'Id User',
			'idPromotion' => 'Id Promotion',
			'start_timestamp' => 'Start Timestamp',
			'end_timestamp' => 'End Timestamp',
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

		$criteria->compare('idUser',$this->idUser);
		$criteria->compare('idPromotion',$this->idPromotion);
		$criteria->compare('start_timestamp',$this->start_timestamp,true);
		$criteria->compare('end_timestamp',$this->end_timestamp,true);
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