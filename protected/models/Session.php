<?php

/**
 * This is the model class for table "tbl_session".
 *
 * The followings are the available columns in table 'tbl_session':
 * @property string $idSession
 * @property string $route
 * @property string $idUser
 * @property string $isAjaxRequest
 * @property string $insert_timestamp
 *
 * The followings are the available model relations:
 * @property Error[] $errors
 * @property Log[] $logs
 * @property User $idUser0
 */
class Session extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Session the static model class
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
		return 'tbl_session';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('route', 'required'),
			array('route', 'length', 'max'=>128),
			array('idUser', 'length', 'max'=>10),
			array('isAjaxRequest', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idSession, route, idUser, isAjaxRequest, insert_timestamp', 'safe', 'on'=>'search'),
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
			'errors' => array(self::HAS_MANY, 'Error', 'idSession'),
			'logs' => array(self::HAS_MANY, 'Log', 'idSession'),
			'idUser0' => array(self::BELONGS_TO, 'User', 'idUser'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idSession' => 'Id Session',
			'route' => 'Route',
			'idUser' => 'Id User',
			'isAjaxRequest' => 'Is Ajax Request',
			'insert_timestamp' => 'Insert Timestamp',
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

		$criteria->compare('idSession',$this->idSession,true);
		$criteria->compare('route',$this->route,true);
		$criteria->compare('idUser',$this->idUser,true);
		$criteria->compare('isAjaxRequest',$this->isAjaxRequest,true);
		$criteria->compare('insert_timestamp',$this->insert_timestamp,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function behaviors(){
		return array(
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
				'createAttribute' => 'insert_timestamp',
				'updateAttribute' =>  'update_timestamp',
			)
		);
	}
}