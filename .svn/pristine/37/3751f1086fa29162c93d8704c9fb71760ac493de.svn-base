<?php

/**
 * This is the model class for table "tbl_photo".
 *
 * The followings are the available columns in table 'tbl_photo':
 * @property string $idProduct
 * @property string $idCategory1
 * @property string $idCategory2
 * @property double $lat
 * @property double $lng
 * @property double $ratio
 * @property string $maxSize
 * @property integer $rate
 * @property string $nVotes
 * @property string $idPhotoType
 * @property string $shootingDate
 * @property string $approvedDate
 * @property string $isExclusive
 * @property string $exposureTime
 * @property string $aperture
 * @property string $iso
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property ConfCategory $idCategory10
 * @property ConfCategory $idCategory20
 * @property Product $idProduct0
 * @property ConfPhotoType $idPhotoType0
 */
class Photo extends CActiveRecord
{
	public function getSizes(){
		if($this->ratio>=1){
			$w=$this->maxSize;
			$h=$w/$this->ratio;
		}else{
			$h=$this->maxSize;
			$w=$h*$this->ratio;
		}
		return array('w'=>$w, 'h'=>$h);
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return Photo the static model class
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
		return 'tbl_photo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idProduct, idCategory1, lat, lng, ratio, maxSize, insert_timestamp', 'required'),
			array('rate', 'numerical', 'integerOnly'=>true),
			array('lat, lng, ratio', 'numerical'),
			array('idProduct, idCategory1, idCategory2, nVotes, idPhotoType, exposureTime, aperture, iso', 'length', 'max'=>10),
			array('maxSize', 'length', 'max'=>6),
			array('isExclusive', 'length', 'max'=>1),
			array('shootingDate, approvedDate, update_timestamp, histogram', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idProduct, idCategory1, idCategory2, lat, lng, ratio, maxSize, rate, nVotes, idPhotoType, shootingDate, approvedDate, isExclusive, exposureTime, aperture, iso, histogram, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'idCategory10' => array(self::BELONGS_TO, 'ConfCategory', 'idCategory1'),
			'idCategory20' => array(self::BELONGS_TO, 'ConfCategory', 'idCategory2'),
			'product' => array(self::BELONGS_TO, 'Product', 'idProduct'),
			'idPhotoType0' => array(self::BELONGS_TO, 'ConfPhotoType', 'idPhotoType'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idProduct' => 'Id Product',
			'idCategory1' => 'Id Category1',
			'idCategory2' => 'Id Category2',
			'lat' => 'Lat',
			'lng' => 'Lng',
			'ratio' => 'Ratio',
			'maxSize' => 'Max Size',
			'rate' => 'Rate',
			'nVotes' => 'N Votes',
			'idPhotoType' => 'Id Photo Type',
			'shootingDate' => 'Shooting Date',
			'approvedDate' => 'Approved Date',
			'isExclusive' => 'Is Exclusive',
			'exposureTime' => 'Exposure Time',
			'aperture' => 'Aperture',
			'iso' => 'Iso',
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
		$criteria->compare('idCategory1',$this->idCategory1);
		$criteria->compare('idCategory2',$this->idCategory2);
		$criteria->compare('lat',$this->lat);
		$criteria->compare('lng',$this->lng);
		$criteria->compare('ratio',$this->ratio);
		$criteria->compare('maxSize',$this->maxSize);
		$criteria->compare('rate',$this->rate);
		$criteria->compare('nVotes',$this->nVotes);
		$criteria->compare('idPhotoType',$this->idPhotoType);
		$criteria->compare('shootingDate',$this->shootingDate);
		$criteria->compare('approvedDate',$this->approvedDate);
		$criteria->compare('isExclusive',$this->isExclusive);
		$criteria->compare('exposureTime',$this->exposureTime,true);
		$criteria->compare('aperture',$this->aperture,true);
		$criteria->compare('iso',$this->iso,true);
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