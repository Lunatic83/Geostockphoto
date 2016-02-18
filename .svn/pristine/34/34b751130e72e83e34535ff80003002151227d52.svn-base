<?php

/**
 * This is the model class for table "tbl_album_photo".
 *
 * The followings are the available columns in table 'tbl_album_photo':
 * @property integer $idAlbum
 * @property integer $idProduct
 * @property string $insert_timestamp
 * @property string $update_timestamp
 */
class AlbumPhoto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AlbumPhoto the static model class
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
		return 'tbl_album_photo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idAlbum, idProduct, insert_timestamp, update_timestamp', 'required'),
			array('idAlbum, idProduct', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idAlbum, idProduct, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idAlbum' => 'Id Album',
			'idProduct' => 'Id Product',
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
		$criteria->compare('idProduct',$this->idProduct);
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