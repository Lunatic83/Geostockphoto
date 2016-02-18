<?php

/**
 * This is the model class for table "tbl_user_pilot".
 *
 * The followings are the available columns in table 'tbl_user_pilot':
 * @property integer $idUserPilot
 * @property integer $idUser
 * @property string $verCode
 * @property integer $freeCredits
 * @property string $name
 * @property string $contact
 * @property string $insert_timestamp
 * @property string $update_timestamp
 * @property integer $msgSent
 * @property string $language
 * @property string $state
 * @property string $business
 * @property string $url
 *
 * The followings are the available model relations:
 * @property User $idUser0
 */
class UserPilot extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return UserPilot the static model class
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
		return 'tbl_user_pilot';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('freeCredits', 'required'),
			array('idUser, freeCredits, msgSent', 'numerical', 'integerOnly'=>true),
			array('verCode, name', 'length', 'max'=>32),
			array('url', 'url'),
			array('contact', 'length', 'max'=>128),
			array('language, state, business, url', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idUserPilot, idUser, verCode, freeCredits, name, contact, insert_timestamp, update_timestamp, msgSent, language, state, business, url', 'safe', 'on'=>'search'),
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
			'idUserPilot' => 'Id User Pilot',
			'idUser' => 'Id User',
			'verCode' => 'Ver Code',
			'freeCredits' => 'Free Credits',
			'name' => 'Name',
			'contact' => 'Contact',
			'insert_timestamp' => 'Insert Timestamp',
			'update_timestamp' => 'Update Timestamp',
			'msgSent' => 'Msg Sent',
			'language' => 'Language',
			'state' => 'State',
			'business' => 'Business',
			'url' => 'Url',
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

		$criteria->compare('idUserPilot',$this->idUserPilot);
		$criteria->compare('idUser',$this->idUser);
		$criteria->compare('verCode',$this->verCode,true);
		$criteria->compare('freeCredits',$this->freeCredits);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('insert_timestamp',$this->insert_timestamp,true);
		$criteria->compare('update_timestamp',$this->update_timestamp,true);
		$criteria->compare('msgSent',$this->msgSent);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('business',$this->business,true);
		$criteria->compare('url',$this->url,true);

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