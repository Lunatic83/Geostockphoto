<?php

/**
 * This is the model class for table "tbl_own_switch_user".
 *
 * The followings are the available columns in table 'tbl_own_switch_user':
 * @property integer $idUserMaster
 * @property integer $idUserSlave
 * @property string $insert_timestamp
 * @property string $update_timestamp
 * @property integer $idRole
 *
 * The followings are the available model relations:
 * @property User $idUserMaster0
 * @property User $idUserSlave0
 * 
 */
class OwnSwitchUser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OwnSwitchUser the static model class
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
		return 'tbl_own_switch_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idUserMaster, idUserSlave, insert_timestamp, update_timestamp', 'required'),
			array('idUserMaster, idUserSlave', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idUserMaster, idUserSlave, insert_timestamp, update_timestamp, idRole', 'safe', 'on'=>'search'),
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
			'idUserMaster0' => array(self::BELONGS_TO, 'User', 'idUserMaster'),
			'idUserSlave0' => array(self::BELONGS_TO, 'User', 'idUserSlave'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idUserMaster' => 'Id User Master',
			'idUserSlave' => 'Id User Slave',
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

		$criteria->compare('idUserMaster',$this->idUserMaster);
		$criteria->compare('idUserSlave',$this->idUserSlave);
		$criteria->compare('insert_timestamp',$this->insert_timestamp,true);
		$criteria->compare('update_timestamp',$this->update_timestamp,true);
		$criteria->compare('idRole',$this->idRole,true);

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