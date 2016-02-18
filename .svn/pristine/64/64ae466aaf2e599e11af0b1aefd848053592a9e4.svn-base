<?php

/**
 * This is the model class for table "tbl_own_user_contacts".
 *
 * The followings are the available columns in table 'tbl_own_user_contacts':
 * @property integer $idUser
 * @property integer $idUserContactType
 * @property string $uri
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property ConfUserContactType $idUserContactType0
 * @property User $idUser0
 */
class OwnUserContacts extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OwnUserContacts the static model class
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
		return 'tbl_own_user_contacts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idUser, idUserContactType, uri', 'required'),
			array('idUser, idUserContactType', 'numerical', 'integerOnly'=>true),
			array('uri', 'length', 'max'=>200),
			array('uri', 'uriCheck'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idUser, idUserContactType, uri, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'idUserContactType0' => array(self::BELONGS_TO, 'ConfUserContactType', 'idUserContactType'),
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
			'idUserContactType' => 'Id User Contact Type',
			'uri' => 'Uri',
			'insert_timestamp' => 'Insert Timestamp',
			'update_timestamp' => 'Update Timestamp',
		);
	}


	public function uriCheck($attribute,$params)
	{
	    if(!preg_match($this->idUserContactType0->regexpr, $this->$attribute))
	      $this->addError($this->idUserContactType0->name, 'Your '.$this->idUserContactType0->name.' uri "'.$this->$attribute.'" is not right!' );
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
		$criteria->compare('idUserContactType',$this->idUserContactType);
		$criteria->compare('uri',$this->uri,true);
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