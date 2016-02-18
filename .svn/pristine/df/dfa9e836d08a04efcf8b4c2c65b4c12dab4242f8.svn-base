<?php

/**
 * This is the model class for table "tbl_conf_groups".
 *
 * The followings are the available columns in table 'tbl_conf_groups':
 * @property integer $idGroup
 * @property string $name
 * @property integer $photoProfile
 * @property string $lat
 * @property string $lng
 * @property string $town
 * @property string $country
 * @property string $description
 * @property string $commission
 * @property integer $idUserAdmin
 * @property integer $idPromotion
 * @property integer $isReserved
 * @property string $insert_timestamp
 * @property string $update_timestamp
 *
 * The followings are the available model relations:
 * @property User[] $tblUsers
 * @property ConfPromotions $idPromotion0
 * @property User $idUserAdmin0
 */
class ConfGroups extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ConfGroups the static model class
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
		return 'tbl_conf_groups';
	}
	
	public function getNPhotographers(){
		return count($this->tblUsers);
	}
	
	public function getNPhotos(){
		$nPhotos=0;
		for($i=0; $i<$this->nPhotographers; $i++){
			$nPhotos=$nPhotos+count($this->tblUsers[$i]->products);
		}
		return $nPhotos;
	}
	
	public function getRate(){
		$nPhotos=$this->nPhotos;
		if($nPhotos==0)
			return 0;
		
		for($i=1; $i<=5; $i++){
			$criteria=new CDbCriteria;
			$criteria->with['photo']['condition']="rate=".$i;
			$criteria->with['idUser0']['with']['userGroups']['condition']="userGroups.idGroup=".$this->idGroup;
			$rate[$i] = Product::model()->count($criteria);
		}
		return ceil(($rate[1]+$rate[2]*2+$rate[3]*3+$rate[4]*4+$rate[5]*5)/$nPhotos);
	}
	
	public function getCategories(){
		$nPhotos=$this->nPhotos;
		if($nPhotos==0)
			return 0;
			
		$criteria=new CDbCriteria;
		$criteria->condition='idPhotoType=1';
		$categories=ConfCategory::model()->findAll($criteria);
		
		for($i=0; $i<count($categories); $i++){
			$criteria=new CDbCriteria;
			$criteria->with['photo']['condition']="idCategory1=".$categories[$i]->idCategory;
			$criteria->with['idUser0']['with']['userGroups']['condition']="userGroups.idGroup=".$this->idGroup;
			$totCategories[$categories[$i]->name] = Product::model()->count($criteria);
		}
		arsort($totCategories);
		
		return array_keys($totCategories);
	}
	
	public function getTop5Photographers(){
		$nPhotographers=$this->nPhotographers;
		if($nPhotographers==0)
			return 0;
		
		// Attualmente ritorna chi ha caricato più foto
		$criteria=new CDbCriteria;
		$criteria->select="t.idUser, t.username";
		$criteria->group="t.idUser, t.username";
		$criteria->having="t.idUser in (SELECT a.idUser FROM tbl_user_groups a where idGroup=".$this->idGroup.")";// and count(p.idProduct)>0";
		$criteria->join="LEFT JOIN tbl_product p ON p.idUser=t.idUSer";
		$criteria->order="count(p.idProduct) DESC";
		$criteria->limit=5;
		$top5Photographers = User::model()->findAll($criteria);
		
		return $top5Photographers;
	}

	private function createUserBlobClient(){
		$blobStorageClient = new Microsoft_WindowsAzure_Storage_Blob(
			'blob.core.windows.net',
			STORAGE_ACCOUNT_NAME,
			STORAGE_ACCOUNT_KEY
		);
		return $blobStorageClient;
	}

	public function readBlobUrl($container, $filename){
		$blobStorageClient=$this->createUserBlobClient();
		$blob=$blobStorageClient->getBlobInstance($container, $filename);
		return $blob->url;
	}

	public function getPhotoUrl(){
		if($this->photoProfile==1){
	    	if(Yii::app()->params['useBlob'])
	    		return $this->readBlobUrl('groups', $this->idGroup.".jpg");
	    	else
	    		return Yii::app()->baseUrl."/images/groups/".$this->idGroup.".jpg";
		}else{
			return Yii::app()->baseUrl."/images/logo_gsp_group.png";
		}
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, acceptTerms', 'required'),
			array('name', 'unique'),
			array('acceptTerms', 'boolean', 'falseValue'=>'true', 'message'=>'You must accept the Terms and Conditions'),
			array('photoProfile, idUserAdmin, idPromotion, isReserved', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>64),
			//array('lat, lng', 'length', 'max'=>10),
			array('town, country', 'length', 'max'=>30),
			array('description', 'length', 'max'=>256),
			array('commission', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idGroup, name, photoProfile, lat, lng, town, country, description, commission, idUserAdmin, idPromotion, isReserved, insert_timestamp, update_timestamp', 'safe', 'on'=>'search'),
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
			'tblUsers' => array(self::MANY_MANY, 'User', 'tbl_user_groups(idGroup, idUser)'),
			'idPromotion0' => array(self::BELONGS_TO, 'ConfPromotions', 'idPromotion'),
			'idUserAdmin0' => array(self::BELONGS_TO, 'User', 'idUserAdmin'),
			'idReviewer0' => array(self::BELONGS_TO, 'User', 'idReviewer'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idGroup' => 'Id Group',
			'name' => 'Group Name',
			'photoProfile' => 'Photo Profile',
			'lat' => 'Lat',
			'lng' => 'Lng',
			'town' => 'Town',
			'country' => 'Country',
			'description' => 'Description',
			'commission' => 'Commission',
			'idUserAdmin' => 'Id User Admin',
			'idPromotion' => 'Id Promotion',
			'isReserved' => 'Is Reserved',
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

		$criteria->compare('idGroup',$this->idGroup);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('photoProfile',$this->photoProfile);
		$criteria->compare('lat',$this->lat,true);
		$criteria->compare('lng',$this->lng,true);
		$criteria->compare('town',$this->town,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('commission',$this->commission,true);
		$criteria->compare('idUserAdmin',$this->idUserAdmin);
		$criteria->compare('idPromotion',$this->idPromotion);
		$criteria->compare('isReserved',$this->isReserved);
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