<?php

/**
 * This is the model class for table "tbl_photographer".
 *
 * The followings are the available columns in table 'tbl_photographer':
 * @property string $idUser
 * @property string $CVSummary
 * @property string $insert_timestamp
 * @property string $update_timestamp
 * @property string $awards_publications
 *
 * The followings are the available model relations:
 * @property User $idUser0
 */
class Photographer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Photographer the static model class
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
		return 'tbl_photographer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idUser', 'required'),
			array('idUser', 'length', 'max'=>10),
			array('update_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idUser, CVSummary, insert_timestamp, update_timestamp, awards_publications', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'idUser'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idUser' => 'Id User',
			'CVSummary' => 'CVSummary',
			'insert_timestamp' => 'Insert Timestamp',
			'update_timestamp' => 'Update Timestamp',
			'awards_publications' => 'Awards Publications',
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
		$criteria->compare('CVSummary',$this->CVSummary,true);
		$criteria->compare('insert_timestamp',$this->insert_timestamp,true);
		$criteria->compare('update_timestamp',$this->update_timestamp,true);
		$criteria->compare('awards_publications',$this->awards_publications,true);

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