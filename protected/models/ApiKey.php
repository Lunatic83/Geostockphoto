<?php

/**
 * This is the model class for table "tbl_api_key".
 *
 * The followings are the available columns in table 'tbl_api_key':
 * @property integer $idUser
 * @property integer $apiKey
 * @property string $link1
 * @property integer $acceptTerms
 * @property integer $isPartner
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property User $idUser0
 */
class ApiKey extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ApiKey the static model class
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
		return 'tbl_api_key';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('acceptTerms, isPartner', 'required'),
			array('idUser, acceptTerms, isPartner', 'numerical', 'integerOnly'=>true),
			array('link1', 'length', 'max'=>128),
			array('apiKey', 'length', 'max'=>8),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idUser, apiKey, link1, acceptTerms, isPartner, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'idUser' => 'Id User',
			'apiKey' => 'Api Key',
			'link1' => 'Link1',
			'acceptTerms' => 'Accept Terms',
			'isPartner' => 'Is Partner',
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
		$criteria->compare('apiKey',$this->apiKey);
		$criteria->compare('link1',$this->link1,true);
		$criteria->compare('acceptTerms',$this->acceptTerms);
		$criteria->compare('isPartner',$this->isPartner);
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