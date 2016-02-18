<?php

/**
 * This is the model class for table "tbl_error".
 *
 * The followings are the available columns in table 'tbl_error':
 * @property string $idError
 * @property string $idSession
 * @property string $idTicket
 * @property string $type
 * @property string $message
 * @property string $filepath
 * @property string $line
 * @property string $trace
 * @property string $source
 * @property string $isAjaxRequest
 * @property string $insert_timestamp
 *
 * The followings are the available model relations:
 * @property Ticket $idTicket0
 * @property Session $idSession0
 */
class Error extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Error the static model class
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
		return 'tbl_error';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('idError', 'length', 'max'=>20),
			array('idSession', 'length', 'max'=>20),
			array('idTicket', 'length', 'max'=>10),
			array('type', 'length', 'max'=>24),
			array('filepath', 'length', 'max'=>128),
			array('line', 'length', 'max'=>6),
			array('isAjaxRequest', 'length', 'max'=>1),
			array('message, trace, source', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idError, idSession, idTicket, type, message, filepath, line, trace, source, isAjaxRequest, insert_timestamp', 'safe', 'on'=>'search'),
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
			'idTicket0' => array(self::BELONGS_TO, 'Ticket', 'idTicket'),
			'idSession0' => array(self::BELONGS_TO, 'Session', 'idSession'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idError' => 'Id Error',
			'idSession' => 'Id Session',
			'idTicket' => 'Id Ticket',
			'type' => 'Type',
			'message' => 'Message',
			'filepath' => 'Filepath',
			'line' => 'Line',
			'trace' => 'Trace',
			'source' => 'Source',
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

		$criteria->compare('idError',$this->idError,true);
		$criteria->compare('idSession',$this->idSession,true);
		$criteria->compare('idTicket',$this->idTicket,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('filepath',$this->filepath,true);
		$criteria->compare('line',$this->line,true);
		$criteria->compare('trace',$this->trace,true);
		$criteria->compare('source',$this->source,true);
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
				'createAttribute' =>  'insert_timestamp',
			),
		);
	}
}