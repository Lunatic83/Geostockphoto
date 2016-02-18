<?php

/**
 * PhotoMobileForm class.
 * PhotoMobileForm is the data structure for upload breaking news photo from mobile
 */
class PhotoMobileForm extends CFormModel
{
	public $title;
	public $image;
	public $idCategory1;
	public $lat;
	public $lng;
	

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('title, image, idCategory1, lat, lng ', 'required'),
			array('title', 'length', 'max'=>32),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			
		);
	}

	
}
