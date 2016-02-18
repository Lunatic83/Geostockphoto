<?php

/**
 * This is the model class for table "tbl_ticket".
 *
 * The followings are the available columns in table 'tbl_ticket':
 * @property string $idTicket
 * @property string $idUser
 * @property string $idProduct
 * @property string $idTicketType
 * @property string $idTicketStatus
 * @property string $sourceActor
 * @property string $subject
 * @property string $message
 * @property string $insert_timestamp
 * @property string $update_timestamp
 * @property string $messageResponse
 *
 * The followings are the available model relations:
 * @property Errors $errors
 * @property User $idUser0
 * @property ConfTicketType $idTicketType0
 * @property ConfTicketStatus $idTicketStatus0
 */
class Ticket extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ticket the static model class
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
		return 'tbl_ticket';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idTicketType, idTicketStatus, sourceActor, subject, message', 'required'),
			array('idUser, idProduct, idTicketType, idTicketStatus', 'length', 'max'=>10),
			array('sourceActor, subject', 'length', 'max'=>24),
			array('update_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idTicket, idUser, idProduct, idTicketType, idTicketStatus, sourceActor, subject, message, insert_timestamp, update_timestamp, messageResponse', 'safe', 'on'=>'search'),
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
			'errors' => array(self::HAS_ONE, 'Errors', 'idTicket'),
			'idUser0' => array(self::BELONGS_TO, 'User', 'idUser'),
			'idProduct0' => array(self::BELONGS_TO, 'ProductPrePost', 'idProduct'),
			'idTicketType0' => array(self::BELONGS_TO, 'ConfTicketType', 'idTicketType'),
			'idTicketStatus0' => array(self::BELONGS_TO, 'ConfTicketStatus', 'idTicketStatus'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idTicket' => 'Id Ticket',
			'idUser' => 'Id User',
			'idProduct' => 'Id Product',
			'idTicketType' => 'Id Ticket Type',
			'idTicketStatus' => 'Id Ticket Status',
			'sourceActor' => 'Source Actor',
			'subject' => 'Subject',
			'message' => 'Message',
			'insert_timestamp' => 'Insert Timestamp',
			'update_timestamp' => 'Update Timestamp',
			'messageResponse' => 'Message Response'
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

		$criteria->compare('idTicket',$this->idTicket,true);
		$criteria->compare('idUser',$this->idUser,true);
		$criteria->compare('idProduct',$this->idProduct,true);
		$criteria->compare('idTicketType',$this->idTicketType,true);
		$criteria->compare('idTicketStatus',$this->idTicketStatus,true);
		$criteria->compare('sourceActor',$this->sourceActor,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('insert_timestamp',$this->insert_timestamp,true);
		$criteria->compare('update_timestamp',$this->update_timestamp,true);
		$criteria->compare('messageResponse',$this->messageResponse,true);

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
	}}
