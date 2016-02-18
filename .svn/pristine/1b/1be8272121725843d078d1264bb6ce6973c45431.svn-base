<?php

/**
 * This is the model class for table "tbl_you_do_nothing".
 *
 * The followings are the available columns in table 'tbl_you_do_nothing':
 * @property integer $idUser
 * @property integer $nPhotos
 * @property string $link1
 * @property string $link2
 * @property integer $flagCategory
 * @property integer $flagPosition
 * @property integer $upperBound
 * @property string $device
 * @property string $confCode
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property User $idUser0
 */
class YouDoNothing extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return YouDoNothing the static model class
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
		return 'tbl_you_do_nothing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nPhotos, link1, device, acceptTerms', 'required'),
			array('acceptTerms', 'boolean', 'falseValue'=>'true', 'message'=>'You must accept the Terms and Conditions'),
			array('idUser, nPhotos, flagCategory, flagPosition, upperBound', 'numerical', 'integerOnly'=>true),
			array('nPhotos', 'numerical', 'min'=>100),
			array('link1, link2', 'length', 'max'=>128),
			//array('link1, link2', 'url'),
			array('device', 'length', 'max'=>32),
			array('flagSendBackDevice, acceptTerms', 'length', 'max'=>1),
			array('confCode', 'length', 'max'=>8),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idUser, nPhotos, link1, link2, flagCategory, flagPosition, upperBound, device, confCode, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idUser' => 'Id User',
			'nPhotos' => 'Number of Photos',
			'link1' => 'Link1',
			'link2' => 'Link2',
			'flagCategory' => 'Flag Category',
			'flagPosition' => 'Flag Position',
			'upperBound' => 'Upper Bound',
			'device' => 'Device',
			'confCode' => 'Conf Code',
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

		$criteria->compare('idUser',$this->idUser);
		$criteria->compare('nPhotos',$this->nPhotos);
		$criteria->compare('link1',$this->link1,true);
		$criteria->compare('link2',$this->link2,true);
		$criteria->compare('flagCategory',$this->flagCategory);
		$criteria->compare('flagPosition',$this->flagPosition);
		$criteria->compare('upperBound',$this->upperBound);
		$criteria->compare('device',$this->device,true);
		$criteria->compare('confCode',$this->confCode,true);
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