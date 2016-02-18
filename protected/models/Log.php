<?php

/**
 * This is the model class for table "tbl_log".
 *
 * The followings are the available columns in table 'tbl_log':
 * @property string $idLog
 * @property string $idSession
 * @property string $level
 * @property string $message
 * @property string $log_timestamp
 *
 * The followings are the available model relations:
 * @property Session $idSession0
 */
class Log extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Log the static model class
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
		return 'tbl_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idSession, level, message', 'required'),
			array('idSession', 'length', 'max'=>20),
			array('level', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idLog, idSession, level, message, log_timestamp', 'safe', 'on'=>'search'),
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
			'idSession0' => array(self::BELONGS_TO, 'Session', 'idSession'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idLog' => 'Id Log',
			'idSession' => 'Id Session',
			'level' => 'Level',
			'message' => 'Message',
			'log_timestamp' => 'Log Timestamp',
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

		$criteria->compare('idLog',$this->idLog,true);
		$criteria->compare('idSession',$this->idSession,true);
		$criteria->compare('level',$this->level,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('log_timestamp',$this->log_timestamp,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function behaviors(){
		return array(
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
				'createAttribute' => 'log_timestamp',
				'updateAttribute' =>  'log_timestamp',
			)
		);
	}
}