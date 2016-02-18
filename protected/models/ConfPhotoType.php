<?php

/**
 * This is the model class for table "tbl_conf_photo_type".
 *
 * The followings are the available columns in table 'tbl_conf_photo_type':
 * @property string $idPhotoType
 * @property string $name
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property ConfCategory[] $confCategories
 * @property Photo[] $photos
 * @property PhotoPrePost[] $photoPrePosts
 */
class ConfPhotoType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ConfPhotoType the static model class
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
		return 'tbl_conf_photo_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, insert_timestamp', 'required'),
			array('name', 'length', 'max'=>24),
			array('update_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPhotoType, name, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'confCategories' => array(self::HAS_MANY, 'ConfCategory', 'idPhotoType'),
			'photos' => array(self::HAS_MANY, 'Photo', 'idPhotoType'),
			'photoPrePosts' => array(self::HAS_MANY, 'PhotoPrePost', 'idPhotoType'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPhotoType' => 'Id Photo Type',
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

		$criteria->compare('idPhotoType',$this->idPhotoType);
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
				'createAttribute' =>  'insert_timestamp',
				'updateAttribute' =>  'update_timestamp',
				'setUpdateOnCreate' => true,
			),
		);
	}
}