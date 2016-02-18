<?php
 
class Header extends CWidget
{
	var $idPhotoType;
	var $user;
	var $route;
	
    public function run(){
		//$modelUser=User::model()->findByPk(Yii::app()->user->id);
		
		$visibleSwitch=false;
		$items=array();
		if(!Yii::app()->user->isGuest){
			$criteria = new CDbCriteria;
			$criteria->condition='idUserMaster='.Yii::app()->user->id.' and idRole=1';
			$modelSlave=OwnSwitchUser::model()->findAll($criteria);
			if(count($modelSlave)>0){
				$visibleSwitch=true;
				for($i=0; $i<count($modelSlave); $i++){
					array_push($items,
						array('label'=>$modelSlave[$i]->idUserSlave0->username,
							'url'=>Yii::app()->createUrl('user/switchuser', array('id'=>$modelSlave[$i]->idUserSlave0->idUser))
						)
					);
				}
			}
		}
		$switchItems = array('label'=>'Switch to', 'url'=>'#', 'visible'=>$visibleSwitch, 'items'=>$items);
		
		$visibleReportAuthor=false;
		$criteria=new CDbCriteria;
		$criteria->condition='idUserSlave=:idUserSlave and idRole=2';
		$criteria->params=array(':idUserSlave'=>Yii::app()->user->id);
		if(OwnSwitchUser::model()->exists($criteria))
			$visibleReportAuthor=true;
			
		$visibleReportEditor=false;
		$criteria=new CDbCriteria;
		$criteria->condition='idUserMaster=:idUserMaster';
		$criteria->params=array(':idUserMaster'=>Yii::app()->user->id);
		if(OwnSwitchUser::model()->exists($criteria))
			$visibleReportEditor=true;
		
		$this->render('header',
			array(
				'idPhotoType'=>$this->idPhotoType,
				'user'=>$this->user,
				'route'=>$this->route,
				'switchItems'=>$switchItems,
				'visibleReportAuthor'=>$visibleReportAuthor,
				'visibleReportEditor'=>$visibleReportEditor
			)
		);
    }
}