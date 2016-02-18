<?php

/**
 * This is the model class for table "tbl_conf_category".
 *
 * The followings are the available columns in table 'tbl_conf_category':
 * @property string $idCategory
 * @property string $name
 * @property string $idPhotoType
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property ConfPhotoType $idPhotoType0
 * @property Photo[] $photos
 * @property Photo[] $photos1
 * @property PhotoPrePost[] $photoPrePosts
 * @property PhotoPrePost[] $photoPrePosts1
 * @property Photographer[] $photographers
 * @property Photographer[] $photographers1
 */
class ConfCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ConfCategory the static model class
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
		return 'tbl_conf_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCategory', 'required', 'on'=>'submit'),
			array('name', 'length', 'max'=>24),
			array('idPhotoType', 'length', 'max'=>10),
			array('update_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idCategory, name, idPhotoType, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'idPhotoType0' => array(self::BELONGS_TO, 'ConfPhotoType', 'idPhotoType'),
			'photos' => array(self::HAS_MANY, 'Photo', 'idCategory1'),
			'photos1' => array(self::HAS_MANY, 'Photo', 'idCategory2'),
			'photoPrePosts' => array(self::HAS_MANY, 'PhotoPrePost', 'idCategory1'),
			'photoPrePosts1' => array(self::HAS_MANY, 'PhotoPrePost', 'idCategory2'),
			'photographers' => array(self::HAS_MANY, 'Photographer', 'idCategory1'),
			'photographers1' => array(self::HAS_MANY, 'Photographer', 'idCategory2'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCategory' => 'Id Category',
			'name' => 'Name',
			'idPhotoType' => 'Id Photo Type',
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

		$criteria->compare('idCategory',$this->idCategory);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('idPhotoType',$this->idPhotoType);
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