<?php

/**
 * This is the model class for table "tbl_conf_roles".
 *
 * The followings are the available columns in table 'tbl_conf_roles':
 * @property integer $idRole
 * @property string $name
 * @property string $insert_timestamp
 * @property string $update_timestamp
 */
class ConfRoles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ConfRoles the static model class
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
		return 'tbl_conf_roles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, insert_timestamp, update_timestamp', 'required'),
			array('name', 'length', 'max'=>24),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idRole, name, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idRole' => 'Id Role',
			'name' => 'Name',
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

		$criteria->compare('idRole',$this->idRole);
		$criteria->compare('name',$this->name,true);
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