<?php

/**
 * This is the model class for table "tbl_album".
 *
 * The followings are the available columns in table 'tbl_album':
 * @property integer $idAlbum
 * @property string $title
 * @property integer $idUser
 * @property string $expiration_datetime
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property User $idUser0
 * @property ProductPrePost[] $tblProductPrePosts
 */
class Album extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Album the static model class
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
		return 'tbl_album';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, idUser, insert_timestamp, update_timestamp', 'required'),
			array('idUser', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>32),
			array('expiration_datetime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idAlbum, title, idUser, expiration_datetime, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'idUser0' => array(self::BELONGS_TO, 'User', 'idUser'),
			'tblProductPrePosts' => array(self::MANY_MANY, 'ProductPrePost', 'tbl_album_photo(idAlbum, idProduct)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idAlbum' => 'Id Album',
			'title' => 'Title',
			'idUser' => 'Id User',
			'expiration_datetime' => 'Expiration Datetime',
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

		$criteria->compare('idAlbum',$this->idAlbum);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('idUser',$this->idUser);
		$criteria->compare('expiration_datetime',$this->expiration_datetime,true);
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