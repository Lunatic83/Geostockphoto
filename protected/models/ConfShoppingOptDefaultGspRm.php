<?php

/**
 * This is the model class for table "tbl_conf_shopping_opt_default_gsp_rm".
 *
 * The followings are the available columns in table 'tbl_conf_shopping_opt_default_gsp_rm':
 * @property integer $idRMdetails
 * @property integer $idSize
 * @property integer $idDuration
 * @property string $price
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property ConfDurationRm $idDuration0
 * @property ConfLicenseRmDetails $idRMdetails0
 * @property ConfSize $idSize0
 */
class ConfShoppingOptDefaultGspRm extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ConfShoppingOptDefaultGspRm the static model class
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
		return 'tbl_conf_shopping_opt_default_gsp_rm';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idRMdetails, idSize, idDuration, insert_timestamp, update_timestamp', 'required'),
			array('idRMdetails, idSize, idDuration', 'numerical', 'integerOnly'=>true),
			array('price', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idRMdetails, idSize, idDuration, price, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'idDuration0' => array(self::BELONGS_TO, 'ConfDurationRm', 'idDuration'),
			'idRMdetails0' => array(self::BELONGS_TO, 'ConfLicenseRmDetails', 'idRMdetails'),
			'idSize0' => array(self::BELONGS_TO, 'ConfSize', 'idSize'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idRMdetails' => 'Id Rmdetails',
			'idSize' => 'Id Size',
			'idDuration' => 'Id Duration',
			'price' => 'Price',
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

		$criteria->compare('idRMdetails',$this->idRMdetails);
		$criteria->compare('idSize',$this->idSize);
		$criteria->compare('idDuration',$this->idDuration);
		$criteria->compare('price',$this->price,true);
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