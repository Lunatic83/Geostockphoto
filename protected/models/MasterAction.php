<?php

/**
 * This is the model class for table "tbl_master_action".
 *
 * The followings are the available columns in table 'tbl_master_action':
 * @property integer $idMasterAction
 * @property integer $idUserMaster
 * @property integer $idProduct
 * @property string $title
 * @property integer $idCategory1
 * @property string $lat
 * @property string $lng
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property ConfCategory $idCategory10
 * @property ProductPrePost $idProduct0
 * @property User $idUserMaster0
 */
class MasterAction extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return MasterAction the static model class
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
		return 'tbl_master_action';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idUserMaster, idProduct', 'required'),
			array('idUserMaster, idProduct, idCategory1', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>64),
			//array('lat, lng', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idMasterAction, idUserMaster, idProduct, title, idCategory1, lat, lng, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'idProduct0' => array(self::BELONGS_TO, 'ProductPrePost', 'idProduct'),
			'idUserMaster0' => array(self::BELONGS_TO, 'User', 'idUserMaster'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idMasterAction' => 'Id Master Action',
			'idUserMaster' => 'Id User Master',
			'idProduct' => 'Id Product',
			'title' => 'Title',
			'idCategory1' => 'Id Category1',
			'lat' => 'Lat',
			'lng' => 'Lng',
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

		$criteria->compare('idMasterAction',$this->idMasterAction);
		$criteria->compare('idUserMaster',$this->idUserMaster);
		$criteria->compare('idProduct',$this->idProduct);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('idCategory1',$this->idCategory1);
		$criteria->compare('lat',$this->lat,true);
		$criteria->compare('lng',$this->lng,true);
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