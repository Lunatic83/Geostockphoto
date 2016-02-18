<?php

/**
 * This is the model class for table "tbl_photo_request".
 *
 * The followings are the available columns in table 'tbl_photo_request':
 * @property integer $idPhotoRequest
 * @property integer $idUser
 * @property integer $idCategory
 * @property string $lat
 * @property string $lng
 * @property integer $minSize
 * @property integer $minRate
 * @property integer $nPhotos
 * @property string $description
 * @property string $expiration_timestamp
 * @property string $maxPrice
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property ConfCategory $idCategory0
 * @property ConfSize $minSize0
 * @property User $idUser0
 */
class PhotoRequest extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return PhotoRequest the static model class
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
		return 'tbl_photo_request';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lat, lng, minSize, nPhotos, expiration_timestamp', 'required'),
			array('idPhotoRequest, idUser, idCategory, minSize, minRate, nPhotos', 'numerical', 'integerOnly'=>true),
			array('lat, lng', 'length', 'max'=>10),
			array('description', 'length', 'max'=>512),
			array('maxPrice', 'length', 'max'=>6),
			array('price', 'numerical', 'min'=>0.5),
			array('nPhotos, minRate', 'numerical', 'min'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPhotoRequest, idUser, idCategory, lat, lng, minSize, minRate, nPhotos, description, expiration_timestamp, maxPrice, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'idCategory0' => array(self::BELONGS_TO, 'ConfCategory', 'idCategory'),
			'minSize0' => array(self::BELONGS_TO, 'ConfSize', 'minSize'),
			'idUser0' => array(self::BELONGS_TO, 'User', 'idUser'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPhotoRequest' => 'Id Photo Request',
			'idUser' => 'Id User',
			'idCategory' => 'Id Category',
			'lat' => 'Lat',
			'lng' => 'Lng',
			'minSize' => 'Min Size',
			'minRate' => 'Min Rate',
			'nPhotos' => 'N Photos',
			'description' => 'Description',
			'expiration_timestamp' => 'Expiration Timestamp',
			'maxPrice' => 'Price',
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

		$criteria->compare('idPhotoRequest',$this->idPhotoRequest);
		$criteria->compare('idUser',$this->idUser);
		$criteria->compare('idCategory',$this->idCategory);
		$criteria->compare('lat',$this->lat,true);
		$criteria->compare('lng',$this->lng,true);
		$criteria->compare('minSize',$this->minSize);
		$criteria->compare('minRate',$this->minRate);
		$criteria->compare('nPhotos',$this->nPhotos);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('expiration_timestamp',$this->expiration_timestamp,true);
		$criteria->compare('maxPrice',$this->maxPrice,true);
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