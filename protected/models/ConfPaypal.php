<?php

/**
 * This is the model class for table "tbl_conf_paypal".
 *
 * The followings are the available columns in table 'tbl_conf_paypal':
 * @property string $environment
 * @property string $apiUserName
 * @property string $apiPassword
 * @property string $apiSignature
 * @property string $version
 * @property string $endPoint
 * @property string $redirectUrl
 * @property string $urlJSdigitalGoods
 * @property string $insert_timestamp
 * @property string $update_timestamp
 */
class ConfPaypal extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ConfPaypal the static model class
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
		return 'tbl_conf_paypal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('environment, apiUserName, apiPassword, apiSignature, version, endPoint, redirectUrl, urlJSdigitalGoods, insert_timestamp', 'required'),
			array('environment', 'length', 'max'=>10),
			array('apiUserName, apiSignature', 'length', 'max'=>100),
			array('apiPassword', 'length', 'max'=>20),
			array('version', 'length', 'max'=>5),
			array('endPoint , redirectUrl, urlJSdigitalGoods', 'length', 'max'=>150),
			array('update_timestamp', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('environment, apiUserName, apiPassword, apiSignature, version, endPoint, redirectUrl, , insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'environment' => 'Environment',
			'apiUserName' => 'Api User Name',
			'apiPassword' => 'Api Password',
			'apiSignature' => 'Api Signature',
			'version' => 'Version',
			'endPoint' => 'Endpoint',
			'redirectUrl' => 'Redirect Url',
			'urlJSdigitalGoods' => 'Url JS Dogital Goods',
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

		$criteria->compare('environment',$this->environment,true);
		$criteria->compare('apiUserName',$this->apiUserName,true);
		$criteria->compare('apiPassword',$this->apiPassword,true);
		$criteria->compare('apiSignature',$this->apiSignature,true);
		$criteria->compare('version',$this->version,true);
		$criteria->compare('endpoint',$this->endpoint,true);
		$criteria->compare('redirecturl',$this->redirecturl,true);
		$criteria->compare('urlJSdigitalGoods',$this->redirecturl,true);
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