<?php

/**
 * This is the model class for table "tbl_conf_user_profile".
 *
 * The followings are the available columns in table 'tbl_conf_user_profile':
 * @property string $idUserProfile
 * @property string $name
 * @property double $multiplication_factor_sb
 * @property double $weight_review
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property LandingPage[] $landingPages
 * @property User[] $users
 */
class ConfUserProfile extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ConfUserProfile the static model class
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
		return 'tbl_conf_user_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, multiplication_factor_sb, weight_review, insert_timestamp', 'required'),
			array('multiplication_factor_sb, weight_review', 'numerical'),
			array('name', 'length', 'max'=>50),
			array('update_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idUserProfile, name, multiplication_factor_sb, weight_review, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'landingPages' => array(self::HAS_MANY, 'LandingPage', 'idUserProfile'),
			'users' => array(self::HAS_MANY, 'User', 'idUserProfile'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idUserProfile' => 'Id User Profile',
			'name' => 'Name',
			'multiplication_factor_sb' => 'Multiplication Factor Sb',
			'weight_review' => 'Weight Review',
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

		$criteria->compare('idUserProfile',$this->idUserProfile,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('multiplication_factor_sb',$this->multiplication_factor_sb);
		$criteria->compare('weight_review',$this->weight_review);
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