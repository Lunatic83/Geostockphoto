<?php

/**
 * This is the model class for table "tbl_product".
 *
 * The followings are the available columns in table 'tbl_product':
 * @property string $idProduct
 * @property string $idUser
 * @property string $title
 * @property string $description
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property Photo $photo
 * @property ProductPrePost $idProduct0
 * @property User $idUser0
 */
class Product extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Product the static model class
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
		return 'tbl_product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idProduct, idUser, title, insert_timestamp', 'required'),
			array('idProduct, idUser', 'length', 'max'=>10),
			array('title,description', 'length', 'max'=>128),
			array('update_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idProduct, idUser, title, description, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'photo' => array(self::HAS_ONE, 'Photo', 'idProduct'),
			'idProduct0' => array(self::BELONGS_TO, 'ProductPrePost', 'idProduct'),
			'idUser0' => array(self::BELONGS_TO, 'User', 'idUser'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idProduct' => 'Id Product',
			'idUser' => 'Id User',
			'title' => 'Title',
			'description' => 'Description',
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

		$criteria->compare('idProduct',$this->idProduct);
		$criteria->compare('idUser',$this->idUser);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
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