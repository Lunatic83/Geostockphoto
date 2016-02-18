<?php

/**
 * This is the model class for table "tbl_shopping_opt_user_default_rf".
 *
 * The followings are the available columns in table 'tbl_shopping_opt_user_default_rf':
 * @property string $idUser
 * @property string $idLicense
 * @property string $idSize
 * @property double $price
 * @property string $insert_timestamp
 * @property string $update_timestamp
 */
class ShoppingOptUserDefaultRf extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ConfShoppingOptDefaultGsp the static model class
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
		return 'tbl_shopping_opt_user_default_rf';
	}

	public function getPrice2dec(){
		return number_format($this->price, 2, '.', '');
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idUser, idLicense, idSize', 'required'),
			array('idUser, idLicense, idSize', 'length', 'max'=>10),
			array('update_timestamp', 'safe'),
			array('price', 'numerical', 'min'=>0.5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idUser, idLicense, idSize, price, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'idLicense0' => array(self::BELONGS_TO, 'ConfLicense', 'idLicense'),
			'idSize0' => array(self::BELONGS_TO, 'ConfSize', 'idSize'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idUser' => 'User',
			'idLicense' => 'License',
			'idSize' => 'Size',
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

		$criteria->compare('idUser',$this->idUser);
		$criteria->compare('idLicense',$this->idLicense);
		$criteria->compare('idSize',$this->idSize);
		$criteria->compare('price',$this->price);
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