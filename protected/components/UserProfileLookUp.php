<?php

class UserProfileLookUp{
      const ADMIN = 1;
      const USER = 2;
      const NEWBIE_PHOTOGRAPHER  = 3;
	  const PROFESSIONAL_PHOTOGRAPHER  = 4;
	  
	  protected $_model;
	  
      // For CGridView, CListView Purposes
      public static function getLabel( $userProfile ){
          if($userProfile == self::ADMIN)
             return 'Administrator';
          if($userProfile == self::USER)
             return 'User';
          if($userProfile == self::NEWBIE_PHOTOGRAPHER)
             return 'Newbie Photographer';
		  if($userProfile == self::PROFESSIONAL_PHOTOGRAPHER)
             return 'Professional Photographer';
		  return false;
      }
      // for dropdown lists purposes
      public static function getUserProfileList(){
          return array(
          	 	self::ADMIN=>'Admininistrator',
                 self::USER=>'User',
                 self::NEWBIE_PHOTOGRAPHER=>'Newbie Photographer',
				 self::PROFESSIONAL_PHOTOGRAPHER=>'Professional Photographer'
			);
      }
	  
	  //TODO modificare la classe in modo tale che venga interrogato dinamicamente la TblConfUserProfile
}