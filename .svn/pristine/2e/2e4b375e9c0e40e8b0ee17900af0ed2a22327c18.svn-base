<?php

/**
 * This is the model class for table "tbl_conf_size".
 *
 * The followings are the available columns in table 'tbl_conf_size':
 * @property string $idSize
 * @property string $code
 * @property string $maxSize
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property ConfLicense[] $tblConfLicenses
 * @property ShoppingOptPhoto[] $shoppingOptPhotos
 * @property ShoppingOptUser[] $shoppingOptUsers
 */
class ConfSize extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ConfSize the static model class
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
		return 'tbl_conf_size';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('maxSize, insert_timestamp', 'required'),
			array('code', 'length', 'max'=>10),
			array('maxSize', 'length', 'max'=>6),
			array('update_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idSize, code, maxSize, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'tblConfLicenses' => array(self::MANY_MANY, 'ConfLicense', 'tbl_conf_shopping_opt_default_gsp(idSize, idLicense)'),
			'shoppingOptPhotos' => array(self::HAS_MANY, 'ShoppingOptPhoto', 'idSize'),
			'transactionPhotos' => array(self::HAS_MANY, 'TransactionPhoto', 'idSize'),
			'transactionPhotosRm' => array(self::HAS_MANY, 'TransactionPhotoRm', 'idSize'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idSize' => 'Id Size',
			'code' => 'Code',
			'maxSize' => 'Max Size',
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

		$criteria->compare('idSize',$this->idSize);
		$criteria->compare('code',$this->code);
		$criteria->compare('maxSize',$this->maxSize);
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
	
	public function getIconSrc(){
		return Yii::app()->baseUrl."/images/icon_".$this->code.".png";
	}
}